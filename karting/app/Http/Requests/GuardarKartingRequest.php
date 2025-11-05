<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarKartingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:20|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'vueltas' => 'required|integer|min:1|max:50',
            'tiempo' => 'required|numeric|min:0|max:100',
            'categoria' => 'nullable|string|max:10|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'fecha_carrera' => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del karting es obligatorio.',
            'nombre.max' => 'El nombre no puede superar los 20 caracteres.',
            'nombre.regex' => 'El nombre solo puede contener letras y espacios.',

            'vueltas.required' => 'Debe ingresar la cantidad de vueltas.',
            'vueltas.integer' => 'Las vueltas deben ser un número entero.',
            'vueltas.min' => 'Debe haber al menos una vuelta.',
            'vueltas.max' => 'No puede tener más de 50 vueltas.',

            'tiempo.required' => 'Debe ingresar el tiempo del karting.',
            'tiempo.numeric' => 'El tiempo debe ser un número válido.',
            'tiempo.max' => 'El tiempo no puede ser mayor a 100.',

            'categoria.max' => 'La categoría no puede tener más de 10 caracteres.',
            'categoria.regex' => 'La categoría solo puede contener letras y espacios.',

            'fecha_carrera.date' => 'La fecha debe tener un formato válido.',
        ];
    }
}
