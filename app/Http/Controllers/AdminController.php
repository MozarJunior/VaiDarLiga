<?php

namespace App\Http\Controllers;
use App\Models\{
    Admin,
    User,
    Aposta,
    Jogo
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function create_admin()
    {
         $user = Admin::whereEmail($request->email)->first();
         if ($usuario)
             return back()->withErrors(["cadastro" => "E-mail já cadastrado!"]);
 
         // verificar se as senhas combinam.
         if ($request->password !== $request->confirma_senha)
             return back()->withErrors(["cadastro" => "Senha e Confirmar Senha não combinam!"]);
 
         // salvar usuário.
         $user = new Admin();
         $user->nome = $request->nome;
         $user->email = $request->email;
         $user->password = Hash::make($request->password);
         $user->save();
 
         return back()->with('cadastro', 'Cadastro realizado com sucesso, agora faça o login para continuar');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            
            // return redirect()->back();
            return redirect()->route('index.admin');
        }

        return back()->withErrors(['login' => 'Email ou senha incorretos.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('welcome');
    }

    public function index(){
        return view('admin.index');
    }

    public function login_admin(){
        if(Auth::guard('admin')->check()){
            return redirect()->route('index.admin');
        }

        return view('admin.login');
    }
    
    public function update_user($id){
        return view('users.update', compact('id'));
    }

    public function update_jogos($id){
        return view('jogos.update', compact('id'));
    }

    public function create_jogos(){
        return view('jogos.create');
    }

    public function create_users(){
        return view('users.create');
    }
    
}
