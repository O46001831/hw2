<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    protected $table = "orders";

    protected $fillable = [
        "nome_utente",
        "n_ordine",
        "prezzo_tot",
        "id_prodotto",
        "titolo",
        "link_immagine",        
        "quantita",
    ];

    protected $casts = [
        "created_at" => "datetime:d/m/Y H:i:s"
    ];
    
    public function user(){
        return $this->belongsTo("App\Users");
    }
}
?>