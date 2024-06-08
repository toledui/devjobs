<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithPagination;

class HomeVacantes extends Component
{
    public $termino;
    public $salario;
    public $categoria;

    use WithPagination;

    protected $listeners = [
        'terminosBusqueda' => 'buscar'
    ];

    public function buscar($termino, $categoria, $salario)
    {
        $this->categoria = $categoria;
        $this->salario = $salario;
        $this->termino = $termino;
    }

    public function render()
    {
        // $vacantes = Vacante::all();
        $vacantes = Vacante::when($this->termino, function($query){
            $query->where('titulo', 'LIKE', "%" . $this->termino . "%");
        })
        ->when($this->termino, function($query){
            $query->orWhere('empresa', 'LIKE', "%" . $this->termino . "%");
        })
        ->when($this->categoria, function($query){
            $query->where('categoria_id', $this->categoria);
        })
        ->when($this->salario, function($query){
            $query->where('salario_id', $this->salario);
        })
        ->paginate(5);

        return view('livewire.home-vacantes', compact('vacantes'));
    }
}
