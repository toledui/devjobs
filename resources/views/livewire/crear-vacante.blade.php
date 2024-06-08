<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent='crearVacante'>
    <!-- Titulo de la vacante -->
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input 
        id="titulo" 
        class="block mt-1 w-full" 
        type="text" 
        wire:model="titulo" 
        :value="old('titulo')" 
        placeholder="Titulo Vacante"
        />
        @error('titulo')
            <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
        @enderror
    </div>

    <!-- Salario de la vacante -->
    <div class="">
        <x-input-label for="salario" :value="__('Salario Mensual en USD')" />
        <select wire:model="salario" id="salario" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"> 
            <option value="">--Seleccione--</option>
            @foreach ($salarios as $salario)
                <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach
       </select>
       @error('salario')
       <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
        @enderror
    </div>

    <!-- Categoría de la vacante -->
    <div class="">
        <x-input-label for="categoria" :value="__('Categoría')" />
        <select wire:model="categoria" id="categoria" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"> 
            <option value="">--Seleccione una categoría--</option>
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
       </select>
       @error('categoria')
       <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
         @enderror
    </div>

        <!-- Nombre de la empresa -->
        <div>
            <x-input-label for="empresa" :value="__('Empresa')" />
            <x-text-input 
            id="empresa" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="empresa" 
            :value="old('empresa')" 
            placeholder="Empresa ej. Netflix, Uber. Shopify"
            />
            @error('empresa')
            <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
            @enderror
        </div>

        <!-- Fecha ultimo día -->
        <div>
            <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
            <x-text-input 
            id="ultimo_dia" 
            class="block mt-1 w-full" 
            type="date" 
            wire:model="ultimo_dia" 
            :value="old('ultimo_dia')" 
            />
            @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
            @enderror
        </div>

        <!-- Descripción del puesto -->
        <div>
            <x-input-label for="ultimo_dia" :value="__('Descripción del puesto')" />
            <textarea class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            wire:model="descripcion"
            placeholder="Descripción general del puesto"
            id="descripcion" cols="30" rows="10"></textarea>
            @error('descripcion')
            <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
            @enderror
        </div>

        <!-- Imagen -->
        <div>
            <x-input-label for="imagen" :value="__('Imagen')" />
            <x-text-input 
            id="imagen" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model="imagen" 
            accept="image/*"
            />
            <div class="my-5 w-80">
                @if ($imagen) 
                <img src="{{ $imagen->temporaryUrl() }}">
                @endif
            </div>

            @error('imagen')
            <livewire:mostrar-alerta :message="$message"></livewire:mostrar-alerta>
            @enderror
        </div>


    {{-- Botón de envíar --}}
    <x-primary-button class="w-full justify-center mt-5">
        {{ __('Crear Vacante') }}
    </x-primary-button>
</form>
