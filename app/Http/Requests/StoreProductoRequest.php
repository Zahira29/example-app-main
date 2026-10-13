<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'      => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string'],
            'precio'      => ['required', 'numeric', 'min:0.01'],
            'stock'       => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El campo nombre del producto es requerido.',
            'precio.required' => 'El precio del producto no puede estar vacío.',
            'precio.min'      => 'El precio debe ser mayor a cero.',
            'stock.required'  => 'El stock del producto es obligatorio.',
        ];
    }
}