<x-guest-layout>
         <img src="{{ asset('media/logo-rua13preta.png') }}" alt="Logo Rua 13" class="w-[265px] flex mb-6">
      <h1 class="font-roboto-semibold text-2xl font-bold">SEJA BEM VINDO!</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('NOME')" />
            <x-text-input id="name" class="block mt-1 w-full text-[12px]" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="NOME COMPLETO"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('EMAIL')" />
            <x-text-input id="email" class="block mt-1 w-full text-[12px]" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="EMAIL"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('SENHA')" />

            <x-text-input id="password" class="block mt-1 w-full text-[12px]" 
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="SENHA"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('CONFIRMAR SENHA')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full text-[12px]"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="CONFIRMAR SENHA" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col items-center justify-end mt-4">
          

            <x-primary-button class="text-[15px]">
                {{ __('CRIAR CONTA') }}
            </x-primary-button>

              <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</x-guest-layout>
