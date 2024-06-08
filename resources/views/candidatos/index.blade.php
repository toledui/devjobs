<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Candidatos Vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center mb-10">Mostrando los candidatos a la vacante: {{$vacante->titulo}}</h1>
                    <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-300 w-full">
                            @forelse ($vacante->candidatos as $candidato)
                                <li class="p-3 flex items-center">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-800 dark:text-white">{{$candidato->user->name}}</p>
                                        <p class="text-sm text-gray-600">{{$candidato->user->email}}</p>
                                        <p class="text-sm font-medium text-gray-600">Se postuló: <span class="font-normal">{{$candidato->created_at->diffForHumans()}}</span></p>
                                    </div>
                                    <div>
                                        <a class="inline-flex items-center shadow-sm px-5 py-8.5 border-gray-500 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white dark:hover:text-white hover:bg-gray-300 dark:hover:bg-indigo-500"
                                         href="{{asset('storage/cv/' . $candidato->cv)}}" target="_blank" rel="noreferrer noopener">
                                            Ver CV
                                        </a>
                                    </div>
                                </li>
                            @empty
                            <p class="p-3 text-center text-sm ">No hay candidatos postulados a esta vacante aún</p>
                            @endforelse
                        </ul>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>