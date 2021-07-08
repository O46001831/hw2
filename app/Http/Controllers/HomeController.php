<?php

use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function home(){
        $user = session('user_id');
        if(session('user_id') == null){
            return redirect('welcome');
        }
        return view('home')->with('nome', $user);
    }
}
?>