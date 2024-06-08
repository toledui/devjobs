<div class="bg-gray-100 dark:bg-gray-700 dark:text-gray-200 p-5 mt-10 flex justify-center flex-col items-center">
    <h3 class="text-center text-2xl font-bold my4">Postularme a esta vacante</h3>
    @if(session()->has('mensaje'))
    <div class="uppercase border border-green-600 bg-green-100 text-green-600 p-2 font-bold my-5">
        {{session('mensaje')}}
    </div>
    @else
        <form action="" class="w-96 mt-5" wire:submit.prevent="postularme">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum o Hoja de Vida')"/>
                <x-text-input id="cv" type="file" accept=".pdf" wire:model="cv" class="block mt-1 w-full"/>
                @error('cv')
                <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
                @enderror
            </div>

                {{-- Botón de envíar --}}
        <x-primary-button class="w-full justify-center mt-5">
            {{ __('Postular a esta Vacante') }}
        </x-primary-button>
        </form>
    @endif
</div>
