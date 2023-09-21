<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        // Valide os dados do produto
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        // Crie um novo produto
        $product = new Product([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);

        $product->save();

        return response()->json(['message' => 'Produto criado com sucesso'], 201);
    }

    public function index()
    {
        $products = Product::all();

        return response()->json(['data' => $products]);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        return response()->json(['data' => $product]);
    }

    public function update(Request $request, $id)
    {
        // Valide os dados do produto
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $product->name = $request->input('name');
        $product->price = $request->input('price');

        $product->save();

        return response()->json(['message' => 'Produto atualizado com sucesso']);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Produto excluído com sucesso']);
    }
}