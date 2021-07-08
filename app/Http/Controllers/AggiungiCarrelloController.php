<?php
use App\Models\User;
use App\Models\Element;
use App\Models\Product;
use Illuminate\Routing\Controller as BaseController;

class AggiungiCarrelloController extends BaseController{
    public function aggiungi ($id){
        //return $user;
        //una query che controlla se ho già quel prodotto nel mio carrello:
        $user = session('user_id');
        $check = Element::where('nome_utente', $user)->where('id_prodotto', $id)->first();
        //se esiste, lo aumento di uno, se non esiste faccio una insert.
        if ($check == true){
            //se l'elemento è già nel carrello:
            $old_row = Element::where('nome_utente', $user)->where('id_prodotto', $id)->first();
            $old_number = $old_row->quantita;
            $old_price = $old_row->prezzo;
            $new_number = $old_number + 1;
            $new_price = ($old_price / $old_number) * $new_number;
            $query_quantita = Element::where('nome_utente', $user)->where('id_prodotto', $id)->update(['quantita' => $new_number]);
            $query_prezzo = Element::where('nome_utente', $user)->where('id_prodotto', $id)->update(['prezzo' => $new_price]);
            return 2;
        }
        else{
            //se non è nel carrello:
            $info_prodotto = Product::where('ID', $id)->first();
            $titolo = $info_prodotto->titolo;
            $link_immagine = $info_prodotto->link_immagine;
            $prezzo = $info_prodotto->prezzo;
            $elements = Element::create([
                'nome_utente' => $user,
                'id_prodotto' => $id,
                'titolo' => $titolo,
                "link_immagine" => $link_immagine,
                "prezzo" => $prezzo,
                'quantita' => 1
            ]);
            return 0;
        }
    }
}
?>