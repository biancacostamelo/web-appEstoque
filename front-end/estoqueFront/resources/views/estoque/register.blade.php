@extends('layouts.estrutura')

@section('content')
   <div class="login">
        <h2>Cadastro de usuário</h2>
        @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ route('register')}}" class="formulario">
            @csrf
            <div class="d-flex flex-column">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="d-flex flex-column">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="d-flex flex-column">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="d-flex flex-column">
                <label for="password_confirmation">Confirmação de Senha:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-light mt-3 mb-3">Cadastrar</button>
            <p>Já tem uma conta? <a href="{{ route('estoque.login') }}">Faça login aqui</a></p>
        </form>
   </div>