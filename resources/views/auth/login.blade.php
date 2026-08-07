<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <img src="{{ asset('media/logo-rua13preta.png') }}" alt="Logo Rua 13" class="w-[285px] flex mb-2">
      <h1 class="font-roboto-semibold text-2xl font-bold text-[25px] pb-2">BEM VINDO DE VOLTA!</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('EMAIL')"   />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="seu@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('SENHA')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

       

        <div class="flex flex-col items-end mt-4">
            @if (Route::has('password.request'))
        <a class=" text-sm text-black font-roboto-regular hover:text-gray-900 rounded-md focus:outline-none" href="{{ route('password.request') }}">
            {{ __('ESQUECEU SUA SENHA?') }}
        </a>
            @endif
    </div>
    <div class="mt-4">
        <x-primary-button class="text-[15px]">
        {{ __('ENTRAR') }}
        </x-primary-button>
    </div>
    <div class="mt-4 text-center text-sm  font-roboto-regular text-black">
    NÃO POSSUI CONTA? <a href="{{ route('register') }}" class="">CRIAR CONTA</a>
    </div>
    </form>
</x-guest-layout>
