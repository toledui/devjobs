<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
            <div class="p-6 text-gray-900 dark:text-gray-100 md:flex md:justify-between md:itemes-center">
                <div class="space-y-3">
                    <a href="{{route('vacantes.show', $vacante)}}" class="text-xl font-bold">{{$vacante->titulo}}</a>
                    <p class="text-sm text-gray-600 dark:text-gray-400 font-bold">{{$vacante->empresa}}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Último Día: {{$vacante->ultimo_dia->format('d/m/Y')}}</p>
                </div>
                <div class="flex flex-col md:flex-row gap-3 items-stretch md:items-center mt-5 md:mt-0">
                    <a href="{{route('candidatos.index', $vacante)}}" class="bg-slate-800 dark:bg-indigo-600 py-4 md:py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        {{$vacante->candidatos->count()}} Candidatos
                    </a>
                    <a href="{{route('vacantes.edit', $vacante->id)}}" class="bg-blue-700 py-4 md:py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Editar
                    </a>
                    <button wire:click="$dispatch('mostrarAlerta', {vacante_id: {{$vacante->id}}})" class="bg-red-600 py-4 md:py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Eliminar
                    </button>
                </div>
            </div>
        @empty
                <p class="p-3 text-center text-sm text-gray-600 dark:text-gray-300">No hay vacantes que mostrar.</p>
        @endforelse

    </div>
    <div class="mt-5">
        {{$vacantes->links()}}
    </div>
    
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('mostrarAlerta', vacante_id => {
                Swal.fire({
                title: "¿Eliminar vacante?",
                text: "Una vacante eliminada no se puede recuperar!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, Eliminar!",
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    // Eliminar la vacante desde el servidor
                    Livewire.dispatch('eliminarVacante', {vacante: vacante_id.vacante_id});
                    Swal.fire({
                    title: "Elimininada!",
                    text: "Tu vacante ha sido eliminada.",
                    icon: "success"
                    });
                }
            });
        });
    </script>
@endpush