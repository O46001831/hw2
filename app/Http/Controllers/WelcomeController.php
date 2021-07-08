<?php

use Illuminate\Routing\Controller as BaseController;

class WelcomeController extends BaseController
{
    public function welcome(){
        //se sei loggato vai alla home
        if(session('user_id') != null){
            return redirect('home');
        }
        //$user = User::find(session("user_id"));
        return view('welcome');
    }
}