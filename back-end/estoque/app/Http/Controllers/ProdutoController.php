<?php

namespace App\Http\Controllers;

use App\Models\Produto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        $contador = $produtos->count();
        if (!$contador > 0) {
            return Response() -> json([
                'message' => 'Nenhum produto encontrado'
            ], 404);
            echo('nao tem nada aqui');
        }else{
            return Response() -> json([
                'message' => 'Lista de produtos',
                'produtos' => $produtos
            ], 200);
        }
    }

    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'data_vencimento' => 'required|date',
            'estoque_total' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        if ($validator->fails()) {
            return response() -> json([
                'message' => 'Erro de validação',
                'errors' => $validator -> errors()
            ], 400);
        }

       
            $produto = Produto::create($request->all());
            
            if ($produto) {
                return response() -> json([
                'message' => 'Produto criado com sucesso',
                'produto' => $produto
            ], 201);
               
            }else {
                return response() -> json([
               'message' => 'Erro ao criar produto'
           ], 500);
                
            }
  
        
    }


    public function show(string $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json([
                'message' => 'Produto não encontrado'
            ], 404);
        }

        return response()->json([
            'message' => 'Produto encontrado',
            'produto' => $produto
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'data_vencimento' => 'required|date',
            'estoque_total' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Erro de validação',
                'errors' => $validator->errors()
            ], 400);
        }

        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json([
                'message' => 'Produto não encontrado'
            ], 404);
        }



        $produto->update($validator->validated());

        return response()->json([
            'message' => 'Produto atualizado com sucesso',
            'produto' => $produto
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json([
                'message' => 'Produto não encontrado'
            ], 404);
        }

        $produto->delete();

        return response()->json([
            'message' => 'Produto deletado com sucesso'
        ], 200);
    }
}
