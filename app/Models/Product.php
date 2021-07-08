<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    protected $table = "products";

    protected $fillable = [
        "titolo",
        "link_immagine",
        "prezzo",
        "descrizione"
    ];

    protected $casts = [
        "created_at" => "datetime:d/m/Y H:i:s"
    ];

    protected $hidden = ['user_id', 'password'];
    //public $timestamps = false;
    
    public function review(){
        return $this->hasMany("App\Review");
    }
}
?>