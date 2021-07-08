<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model{
    protected $table = "users";

    protected $fillable = [
        "nome",
        "cognome",
        "indirizzo",
        "cellulare",
        "username",
        "password"
    ];

    protected $casts = [
        "created_at" => "datetime:d/m/Y H:i:s"
    ];

    //protected $hidden = ['user_id', 'password'];
    //public $timestamps = false;
    
    /*public function review(){
        return $this->hasMany("App\Review");
    }*/

    public function element(){
        return $this->hasMany("App\Element");
    }
}
?>