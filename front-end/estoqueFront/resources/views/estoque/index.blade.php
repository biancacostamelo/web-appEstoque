@extends('layouts.estrutura')
@section('content')
<a href="{{route('estoque.create') }}" class="btn m-4 btn-primary"> Adicionar um produto </a>
    @if(count($produtos)) 
    <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Vencimento</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Status</th>
                    <th scope="col">lifo</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <th scope="row">{{$produto['id']}}</th>
                        <td>{{$produto['nome']}}</td>
                        <td>{{$produto['data_vencimento']}}</td>
                        <td>{{$produto['estoque_total']}}</td>
                        <td>{{$produto['categoria_id']}}</td>
                        <td class='status-estoque'>
                            @if($produto['estoque_total'] > 0)
                                <span class="badge p-2 px-3 bg-sucesso">Em estoque</span>
                            @else
                                <span class="badge p-2 px-3 bg-falhou">Fora de estoque</span>
                                @endif
                        </td>
                        <td>
                            @if($produto['data_vencimento'] < now())
                                <span class="badge p-2 px-3 bg-falhou">Vencido</span>
                            @else
                                <span class="badge p-2 px-3 bg-sucesso">Dentro da validade</span>
                            @endif
                        </td>



                       <td><a href="{{route('estoque.edit', $produto['id']) }}" class=' px-3 btn bg-editar btn-sm'> Editar Produto </a></td>

                       <td><a href="{{route('estoque.destroy', $produto['id']) }}" class='px-3 btn btn-danger fw-600 btn-sm' onclick="return confirm('tem certeza?')"> Excluir Produto</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Não há estoque de produtos</p>
    @endif
@endsection