<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        $contador = $categorias->count();

        if ($contador > 0) {
            return response()->json([
                'message' => 'Lista de categorias',
                'categorias' => $categorias
            ], 200);
        } else {
            return response()->json([
                'message' => 'Nenhuma categoria encontrada'
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'subcategoria' => 'nullable|string|max:255',
            'data_cadastro' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Erro de validação',
                'errors' => $validator->errors()
            ], 400);
        }

        $categoria = Categoria::create($request->all());

        if (!$categoria) {
            return response()->json([
                'message' => 'Erro ao criar categoria'
            ], 500);
        }else{
             return response()->json([
            'message' => 'Categoria criada com sucesso',
            'categoria' => $categoria
        ], 201);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json([
                'message' => 'Categoria não encontrada'
            ], 404);
        }

        return response()->json([
            'message' => 'Categoria encontrada',
            'categoria' => $categoria
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'sometimes|required|string|max:255',
            'subcategoria' => 'nullable|string|max:255',
            'data_cadastro' => 'sometimes|required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Erro de validação',
                'errors' => $validator->errors()
            ], 400);
        }

        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json([
                'message' => 'Categoria não encontrada'
            ], 404);
        }

        $categoria->update($request->all());

        return response()->json([
            'message' => 'Categoria atualizada com sucesso',
            'categoria' => $categoria
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json([
                'message' => 'Categoria não encontrada'
            ], 404);
        }

        $categoria->delete();

        return response()->json([
            'message' => 'Categoria deletada com sucesso'
        ], 200);
    }
}
