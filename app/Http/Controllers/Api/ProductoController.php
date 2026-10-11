<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(10);

        return response()->json([
            'success' => true,
            'data'    => $productos
        ], 200);
    }

    public function store(StoreProductoRequest $request)
    {
        $datosValidados = $request->validated();
        $nuevoProducto = Producto::create($datosValidados);

        return response()->json([
            'success' => true,
            'message' => 'Producto registrado exitosamente.',
            'data'    => $nuevoProducto
        ], 201);
    }

    public function show(Producto $producto)
    {
        return response()->json([
            'success' => true,
            'data'    => $producto
        ], 200);
    }

    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $datosActualizados = $request->validated();
        $producto->update($datosActualizados);

        return response()->json([
            'success' => true,
            'message' => 'Los datos del producto han sido actualizados.',
            'data'    => $producto
        ], 200);
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return response()->json([
            'success' => true,
            'message' => 'El producto se eliminó correctamente del sistema.'
        ], 200);
    }
}