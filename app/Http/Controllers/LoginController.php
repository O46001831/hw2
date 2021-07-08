<?php
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;

class LoginController extends BaseController
{
    public function login(){
        //Verifichiamo se l'utente ha gia effettuato il login:
        if(session('user_id') != null){
            return redirect('home');
        }
        else{
            //verifichiamo se c'è un errore nel login:
            $old_username = Request::old('username');
            return view('login')
            ->with('csrf_token', csrf_token())
            ->with('old_username', $old_username);
        }   
    }

    public function checkLogin(){
        //verifichiamo che l'utente esista:
        //$user = DB::select('SELECT * FROM users WHERE username = ? AND password = ?', [request('username'), request('password')]);
        $user = User::where('username', request('username'))->where('password', request('password'))->first();
        //print_r($user);
        if(isset($user)){
            //credenziali valide
            Session::put("user_id", $user->username);
            return redirect('home');
        }
        else{
            //Credenziali non valide
            return redirect('login')->withInput();
        }
    }

    public function logout(){
        //Eliminiamo i dati di sessione e torniamo al login:
        Session::flush();
        return redirect('login');
    }
}
