<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class estoqueFront extends Controller
{
     private $urlApi = 'https://apiestoque.webapptech.site/api/produtos';
     
     public function index()
    {
        $response = Http::get("$this->urlApi");
        $data = $response->json();
        return 
        view('estoque.index', ['produtos' => $data['produtos'] ?? [], 'message' => $data['message'] ?? '']);
    }

    public function create()
    {
        return view('estoque.cadastrar');
    }

    public function store(Request $request)
    {
        Http::post($this ->urlApi, $request -> only('nome', 'data_vencimento', 'estoque_total', 'categoria_id'));
        return redirect()->route('estoque.index');
    }

    public function edit($id) 
    {
        $response = Http::get("$this->urlApi/$id");
        $produto = $response->json()['produto'] ?? null;  
 
    return view('estoque.editar', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        Http::put("$this->urlApi/$id", $request->only('nome', 'data_vencimento', 'estoque_total', 'categoria_id'));
        return redirect()->route('estoque.index');
    }

    public function destroy($id)
    {
        Http::delete("$this->urlApi/$id");
        return redirect()->route('estoque.index');
    }
}
