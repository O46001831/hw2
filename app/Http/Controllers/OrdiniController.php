<?php
use App\Models\Order;
use Illuminate\Routing\Controller as BaseController;

class OrdiniController extends BaseController
{
    public function ordini(){
        $user = session('user_id');
        if(session('user_id') == null){
            return redirect('welcome');
        }
        return view('ordini')->with('nome', $user);
    }

    public function check(){
        $user = session('user_id');
        $ordini = Order::where('nome_utente',$user)->get();
        return $ordini;
    }

    public function conta(){
        $user = session('user_id');
        $max_n_ordine = Order::where('nome_utente', $user)->max('n_ordine');
        return $max_n_ordine;
    }
}
?>