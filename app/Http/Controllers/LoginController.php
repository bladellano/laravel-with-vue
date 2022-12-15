<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        switch ($request->get('erro')) {
            case 1:
                $erro = 'Usuário ou senha não existe.';
                break;

            case 2:
                $erro = 'Necessário realizar login para ter acesso a página.';
                break;

            default:
                $erro = '';
                break;
        }

        return view('site.login', ['titulo'=>'Login','erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'usuario' => 'email',
            'senha' => 'required',
        ];

        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório',
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if ($usuario):
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.clientes');

        else:
            return redirect()->route('site.login', ['erro'=> 1]);
        endif;
    }
}
