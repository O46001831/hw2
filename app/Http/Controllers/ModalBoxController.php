<?php
use App\Models\Product;
use App\Models\Review;
use Illuminate\Routing\Controller as BaseController;

class ModalBoxController extends BaseController{
    public function riempi($id){
        $json = Product::where('ID', $id)->first();
        return $json;
    }

    public function reviews($id){
        $reviews = Review::where('id_prodotto', $id)->get();
        return $reviews;
    }

    public function addReview($id, $review){
        $user = session('user_id');
        //aggiungo la recensione alla tabella review:
        $query = Review::create([
            'id_prodotto' => $id,
            'nome_utente' => $user,
            'commento' => $review,
        ]);
        if($query === true){
            return 1; //successo
        }
        else return 0; //fallimento
    }
}
?>