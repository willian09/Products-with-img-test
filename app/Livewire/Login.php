<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;

    public function loginUser(Request $request)
    {
        $validated=$this->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255'
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            
            return $this->redirect('/home', navigate:true);
        }

        $this->addError('email', 'The password provided does not match the email');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
