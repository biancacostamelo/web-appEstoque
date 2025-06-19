<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('estoque.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $apiKey = env('FIREBASE_API_KEY');
        $response = Http::post("https://identitytoolkit.googleapis.com/v1/accounts:signInWithPassword?key={$apiKey}", [
            'email' => $request->email,
            'password' => $request->password,
            'returnSecureToken' => true,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            Session::put('firebase_user', [
                'idToken' => $data['idToken'],
                'email' => $data['email'],
                'uid' => $data['localId'],
            ]);
            return redirect('/home')->with('message', 'Login successful!');
        }
        return redirect()->back()->withErrors(['email' => 'Credienciais invalidas.']);
    }

    public function home()
    {
        return view('estoque.index');
    }

    public function logout()
    {
        Session::forget('firebase_user');
        return redirect('/login')->with('message', 'Logout successful!');
    }

    public function showRegisterForm()
    {
        return view('estoque.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $apiKey = env('FIREBASE_API_KEY');
        $response = Http::post("https://identitytoolkit.googleapis.com/v1/accounts:signUp?key={$apiKey}", [
            'email' => $request->email,
            'password' => $request->password,
            'returnSecureToken' => true,
        ]);
        if ($response->successful()) {
            $data = $response->json();
            Session::put('firebase_user', [
                'idToken' => $data['idToken'],
                'email' => $data['email'],
                'uid' => $data['localId'],
            ]);
            return redirect('/home')->with('message', 'Registration successful!');
        }

        return redirect()->back()->withErrors(['email' => 'Erro ao cadastrar. Talves o e-mail já está em uso']);
    }
}
