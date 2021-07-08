<?php
use App\Models\User;
use App\Models\Element;
use App\Models\Order;
use Illuminate\Routing\Controller as BaseController;

class CarrelloController extends BaseController
{
    public function carrello(){
        $user = session('user_id');
        if(session('user_id') == null){
            return redirect('welcome');
        }
        return view('carrello')->with('nome', $user);
    }

    public function caricaCarrello(){
        $user = session('user_id');
        $carrello = Element::where('nome_utente', $user)->get();
        if($carrello !== null){
            return $carrello;
        }
        else return -1;
        
    }

    public function rimuoviDalCarrello($id){        
        $user = session('user_id');
        $elemento = Element::where('nome_utente', $user)->where('id_prodotto', $id)->first();
        $old_quantita = $elemento->quantita;
        if($old_quantita === 1){
            //se avevo solo uno, rimuovo il record dalla tabella:
            $remove = Element::where('nome_utente', $user)->where('id_prodotto', $id)->delete();
            return 1;
        }
        else if($old_quantita > 1){
            //se ho più di un prodotto di quel tipo nel carrello:
            $old_prezzo = $elemento->prezzo;
            $new_quantita = $old_quantita -1;
            $new_prezzo = ($old_prezzo / $old_quantita) * $new_quantita;
            $query_quantita = Element::where('nome_utente', $user)->where('id_prodotto', $id)->update(['quantita' => $new_quantita]);
            $query_prezzo = Element::where('nome_utente', $user)->where('id_prodotto', $id)->update(['prezzo' => $new_prezzo]);
            return 1;

        }
        else return -1; //in caso di errore.
    }

    public function conferma($cTot){        
        $user = session('user_id');
        $ordine = Element::where('nome_utente', $user)->get();
        //CALCOLO IL NUMERO DELL'ORDINE:        
        $n_ordine_old = Order::where('nome_utente', $user)->get();
        if($n_ordine_old !== null){
            //mi devo calcolare quale sarà il nuovo numero dell'ordine:
            $n_ordine_old = Order::where('nome_utente', $user)->max('n_ordine');
            $n_ordine = $n_ordine_old +1;
        }
        else {
            //non ho ordini prima di questo:
            $n_ordine = 1;
        }
        //Carichiamo i prodotti nell'ordine:
        for($i=0; $i<$ordine->count(); $i = $i + 1){

            $id_prodotto = $ordine[$i]->id_prodotto;
            $link_immagine = $ordine[$i]->link_immagine;
            $quantita = $ordine[$i]->quantita;
            $titolo = $ordine[$i]->titolo;
            //faccio l'insert e se riesce rimuovo i record dalla tabella ordini:
            $insert = Order::create([
                'nome_utente' => $user,
                'id_prodotto' => $id_prodotto,
                'link_immagine' => $link_immagine,
                'n_ordine' => $n_ordine,
                'prezzo_tot' => $cTot,
                'quantita' => $quantita,
                'titolo' => $titolo,
            ]);
            if($insert !== NULL){
                $prodotto = Element::where('id_prodotto', $id_prodotto)->delete();
            }
            else return -1;
        }
        return $n_ordine;
        //return $n_ordine_old;
    }
}
?>