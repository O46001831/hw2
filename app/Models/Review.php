<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Review extends Model{
    protected $table = "reviews";

    protected $fillable = [
        "id_prodotto",
        "nome_utente",
        "commento",
    ];

    protected $casts = [
        "created_at" => "datetime:d/m/Y H:i:s"
    ];

    public function product(){
        return $this->belongsTo("App\Product");
    }


}


?>