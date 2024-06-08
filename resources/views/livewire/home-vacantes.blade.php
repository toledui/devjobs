<div>
    <livewire:filtrar-vacantes></livewire:filtrar-vacantes>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="text-4xl font-extrabold mb-12 text-gray-600 dark:text-gray-300" >Nuestras vacantes disponibles</h3>
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 divide-y divide-gray-300 dark:divide-gray-600">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a href="{{route('vacantes.show', $vacante->id)}}" class="text-3xl font-extrabold text-gray-600 dark:text-gray-300">
                                {{$vacante->titulo}}
                            </a>
                            <p class="dark:text-gray-300 text-base text-gray-600 mb-1">{{$vacante->empresa}}</p>
                            <p class="font-bold text-xs text-gray-600 dark:text-gray-300 ">Categoría: <span class="font-normal">{{$vacante->categoria->categoria}}</span></p>
                            <p class="font-bold text-xs text-gray-600 dark:text-gray-300 ">Salario: <span class="font-normal">{{$vacante->salario->salario}}</span></p>
                            <p class="font-bold text-xs text-gray-600 dark:text-gray-300 ">Último día para postularse: <span class="font-normal">{{$vacante->ultimo_dia->format('d/m/Y')}}</span></p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a href="{{route('vacantes.show', $vacante->id)}}" class="bg-indigo-600 hover:bg-indigo-700 p-3 text-sm uppercase font-bold text-white rounded-lg block text-center">Ver vacante</a>
                        </div>

                    </div>
                @empty
                    <p class="p3 text-center dark:text-gray-300 text-sm">No hay vacanstes aún.</p>
                @endforelse
            </div>
            <div class="mt-5">
                {{$vacantes->links()}}
            </div>
            
        </div>
    </div>
</div> 