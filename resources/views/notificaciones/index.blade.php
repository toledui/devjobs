<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center mb-10">Mis Notificaciones</h1>
                    <div class="md:flex md:justify-center p-5">
                        <div class="divide-y divide-gray-300">
                            @forelse ($notificaciones as $notificacion)
                                <div class="p-5 w-full  md:flex md:justify-between md:items-center">
                                    <div>
                                        <p>Tienes un nuevo candidato en:<br/>
                                            <span class="font-bold">{{$notificacion->data['nombre_vacante']}}</span>
                                        </p>
                                        <p>
                                            <span class="font-bold">{{$notificacion->created_at->diffForHumans()}}</span>
                                        </p>
                                    </div>
                                    <div class="pt-4 md:pt-0 md:ml-8">
                                        <a class="bg-indigo-600 hover:bg-indigo-700 p-3 text-sm uppercase font-bold text-white rounded-lg" href="{{route('candidatos.index', $notificacion->data['id_vacante'])}}">Ver candidatos</a>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center text-gray-600 dark:text-gray-200">No hay notificaciones nuevas!</p>
                            @endforelse
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>