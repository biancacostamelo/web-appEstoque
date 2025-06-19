@extends('layouts.estrutura')

@section('content')
    <h1 style="text-align: center;" class="mt-5">Editar Produto</h1>

    <form method="POST" action="{{route('estoque.update', $produto['id']) }}" class="mt-4 formularioEditar">
        @csrf
        <div>
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto['nome'] }}" required>
        </div>
        <div>
            <label for="data_vencimento">Vencimento</label>
            <input type="date" class="form-control" id="data_vencimento" name="data_vencimento" value="{{ $produto['data_vencimento'] }}" required>
        </div>
        <div>
            <label for="estoque_total">Estoque</label>
            <input type="number" class="form-control" id="estoque_total" name="estoque_total" value="{{ $produto['estoque_total'] }}" required>
        </div>
        <div>
            <label for="categoria_id">Id Categoria</label>
            <input type="number" class="form-control" id="categoria_id" name="categoria_id" value="{{ $produto['categoria_id'] }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Alterar</button>
        <a href="{{route('estoque.index')}}" class="btn btn-secondary">Cancelar</a>
      
    </form>
@endsection