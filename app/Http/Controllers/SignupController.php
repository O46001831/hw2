<?php 

use Illuminate\Routing\Controller;
use App\Models\User;

class SignupController extends Controller{
    public function signup(){
        if(session('user_id') != null){
            return redirect('home');
        }
        else{
            //verifichiamo se c'è un errore nel login:
            $old_username = Request::old('username');
            $old_nome = Request::old('nome');
            $old_cognome = Request::old('cognome');
            $old_indirizzo = Request::old('indirizzo');
            $old_cellulare = Request::old('cellulare');
            return view('signup')
            ->with('csrf_token', csrf_token())
            ->with('old_nome', $old_nome)
            ->with('old_cognome', $old_cognome)
            ->with('old_indirizzo', $old_indirizzo)
            ->with('old_cellulare', $old_cellulare)
            ->with('old_username', $old_username);
        }   
    }

    public function aggiungi(){
        $request = request();

        if (!User::where('username', $request->username)->first()){
            //se lo username non esiste:
            $user = User::create([
                'nome' => $request->nome,
                'cognome' => $request->cognome,
                'indirizzo' => $request->indirizzo,
                'cellulare' => $request->cellulare,
                'username' => $request->username,
                //'password' => Hash::make($request->password),
                'password' => $request->password,
            ]);
            if($user !== NULL){
                return view('conferma'); 
            }
        }
        else{
            $old_username = $request->username;
            $old_nome = $request->nome;
            $old_cognome = $request->cognome;
            $old_indirizzo = $request->indirizzo;
            $old_cellulare = $request->cellulare;
            return view('signup')
            ->with('csrf_token', csrf_token())
            ->with('old_nome', $old_nome)
            ->with('old_cognome', $old_cognome)
            ->with('old_indirizzo', $old_indirizzo)
            ->with('old_cellulare', $old_cellulare)
            ->with('old_username', $old_username);
        } 
            
    }
}
?>