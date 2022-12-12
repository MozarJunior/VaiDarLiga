<?php

namespace App\Http\Controllers;

use App\Models\{
    User,
    Aposta,
    Jogo
};
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $usuario = User::whereEmail($request->email)->first();
        if ($usuario)
            return back()->withErrors(["cadastro" => "E-mail já cadastrado!"]);

        if ($request->password !== $request->confirma_senha)
            return back()->withErrors(["cadastro" => "Senha e Confirmar Senha não combinam!"]);

        $usuario = new User();
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        return back()->with('cadastro', 'Cadastro realizado com sucesso, agora faça o login para continuar');
    }

    public function show()
    {
        $users = User::get();
        $apostas = Aposta::get();

        return view('users.show', compact('users', 'apostas'));
    }

    public function delete($id)
    {
        if(!$user = User::find($id))
            return redirect()->route('show.users');
        
        $user->delete();

        return redirect()->route('show.users');
    }

    public function update(Request $request, $id)
    {

        if(!$user = User::find($id))
            return redirect()->route('show.users');

        $users = User::whereEmail($request->email)->first();
        if ($users)
            return back()->withErrors(["Atualização" => "E-mail já cadastrado!"]);
        if ($request->password !== $request->confirma_senha)
            return back()->withErrors(["Atualização" => "Senha e Confirmar Senha não combinam!"]);
        
        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->update();

        return redirect()->route('show.users');
    }
}
