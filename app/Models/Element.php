<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Element extends Model{
    protected $table = "elements";

    protected $fillable = [
        "nome_utente",
        "id_prodotto",
        "titolo",
        "link_immagine",
        "prezzo",
        "quantita",
    ];

    protected $casts = [
        "created_at" => "datetime:d/m/Y H:i:s"
    ];
    
    public function user(){
        return $this->hasMany("App\Users");
    }
}
?>