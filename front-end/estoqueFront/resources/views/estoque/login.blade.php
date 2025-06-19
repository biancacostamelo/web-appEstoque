@extends('layouts.estrutura')

@section('content')
    <div class="login">
        <h2>Login</h2>
        @if ($errors->any())
        <p style='color:red;' class="text-danger">{{$errors->first()}}</p>
        @endif
        <form method="POST" action="/login" class="formulario">
            @csrf
            <div class="d-flex flex-column gap-1">
                <div class="d-flex flex-column">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="d-flex flex-column">
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required>
                </div>
            </div>
            <button class="btn btn-light mt-3 mb-3" type="submit">Entrar</button>
            <p>Não tem um conta? <a href="{{ route('register.form') }}">Cadastre-se aqui</a></p>
        </form> 
    </div>