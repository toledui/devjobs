<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('¿Olvidaste tu contraseña? Sin problema. Solo necesitamos que nos proporciones tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña, que te permitirá elegir una nueva.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="flex justify-between my-5">
            <x-link :href="route('login')">
                Iniciar Sesión
            </x-link>
            <x-link :href="route('register')">
                ¿No tienes cuenta?
            </x-link>

        </div>

            <x-primary-button class="w-full justify-center">
                {{ __('Enviar Instrucciones') }}
            </x-primary-button>
    </form>
</x-guest-layout>
