@extends('layouts.estrutura')

@section('content')
    <h1>Editar Produto</h1>

    <form method="POST" action="{{route('estoque.update', $produto['id']) }}" >
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto['nome'] }}" required>
        </div>
        <div class="mb-3">
            <label for="data_vencimento" class="form-label">Vencimento</label>
            <input type="date" class="form-control" id="data_vencimento" name="data_vencimento" value="{{ $produto['data_vencimento'] }}" required>
        </div>
        <div class="mb-3">
            <label for="estoque_total" class="form-label">Estoque</label>
            <input type="number" class="form-control" id="estoque_total" name="estoque_total" value="{{ $produto['estoque_total'] }}" required>
        </div>
        </div>
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Id Categoria</label>
            <input type="number" class="form-control" id="categoria_id" name="categoria_id" value="{{ $produto['categoria_id'] }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Alterar</button>
        <a href="{{route('estoque.index')}}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection