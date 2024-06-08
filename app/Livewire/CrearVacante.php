<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024',
    ];

    public function crearVacante()
    {
       $datos = $this->validate();

    //    Guardar la imagen
       $imagen = $this->imagen->store('public/vacantes');
       $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);
    //    dd($nombre_imagen);
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,
        ]);

        // Redireccionar y crear mensaje
        session()->flash('mensaje', 'La vacante se publicó correctamente.');

        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        // Consultar la base de datos
        $salarios = Salario::all();

        // Obtener las categorias
        $categorias = Categoria::all();
        return view('livewire.crear-vacante', compact('salarios', 'categorias'));
    }
}
