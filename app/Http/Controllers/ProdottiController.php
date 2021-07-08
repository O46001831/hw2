<?php
use App\models\Product;
use Illuminate\Routing\Controller as BaseController;

class ProdottiController extends BaseController
{
    public function carica(){
        $json = Product::all();
        return $json;
    }
}
?>