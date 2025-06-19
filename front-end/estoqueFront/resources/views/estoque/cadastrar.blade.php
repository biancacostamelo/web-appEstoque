@extends('layouts.estrutura')

@section('content')
    <h1 style="text-align: center;" class="mt-5">Novo Produto</h1>
    <form action="{{route('estoque.store')}}" method="POST" class="mt-4 formularioEditar">
        @csrf
        <div>
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div>
            <label for="data_vencimento" class="form-label">Vencimento</label>
            <input type="date" class="form-control" id="data_vencimento" name="data_vencimento" required>
        </div>
        <div>
            <label for="estoque_total" class="form-label">Estoque</label>
            <input type="number" class="form-control" id="estoque_total" name="estoque_total" required>
        </div>
        <div>
            <label for="categoria_id" class="form-label">Id Categoria</label>
            <input type="number" class="form-control" id="categoria_id" name="categoria_id" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <a href="{{route('estoque.index')}}" class="btn btn-secondary">Voltar</a>
    </form>
    @endsection