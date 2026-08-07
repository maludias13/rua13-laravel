<x-guest-layout>
     <img src="{{ asset('media/logo-rua13preta.png') }}" alt="Logo Rua 13" class="w-[265px] flex mb-6">
      <h1 class="font-roboto-semibold text-2xl font-bold">RECUPERAR SENHA</h1>
    <div class="mb-4 text-sm text-black">
        {{ __('') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('INFORME SEU E-MAIL PARA RECUPERAR SUA SENHA') " />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="seu@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('RECUPERAR SENHA') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
