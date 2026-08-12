<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = auth()->user()->products()->latest()->get();
        return view('produtos.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('produtos.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'category_id' => 'required|exists:categories,id',
        'photo' => 'required|image|max:2048',
    ]);

    $photoPath = $request->file('photo')->store('products', 'public');

    auth()->user()->products()->create([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'photo' => basename($photoPath),
    ]);

    return redirect()->route('produtos.index')->with('status', 'Produto criado com sucesso!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {   
        if ($product->user_id !== auth()->id()) {
        abort(403, 'Você não tem permissão para editar este produto.');
        }

        $categories = \App\Models\Category::all();

        return view('produtos.edit', [
        'product' => $product,
        'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        if ($product->user_id !== auth()->id()) {
        abort(403, 'Você não tem permissão para editar este produto.');
        }

        $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'category_id' => 'required|exists:categories,id',
        'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price', 'quantity', 'category_id']);

        if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('products', 'public');
        $data['photo'] = basename($photoPath);
        }

        $product->update($data);

        return redirect()->route('produtos.index')->with('status', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function confirmDelete(Product $product)
{
    if ($product->user_id !== auth()->id()) {
        abort(403, 'Você não tem permissão para excluir este produto.');
    }

    return view('produtos.destroy', ['product' => $product]);
}
    public function destroy(Product $product)
{
    if ($product->user_id !== auth()->id()) {
        abort(403, 'Você não tem permissão para excluir este produto.');
    }

    Storage::disk('public')->delete('products/' . $product->photo);

    $product->delete();

    return redirect()->route('produtos.index')->with('status', 'Produto excluído com sucesso!');
}
}
