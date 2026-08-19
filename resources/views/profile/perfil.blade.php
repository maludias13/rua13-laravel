<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil - Rua 13</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="perfil-container">
        <h1>Meu Perfil</h1>

        @if (session('status') === 'profile-updated')
            <p class="mensagem-sucesso">Perfil atualizado com sucesso!</p>
        @endif

        <div class="dados-perfil">
            <p><strong>Nome:</strong> {{ $user->name }}</p>
            <p><strong>E-mail:</strong> {{ $user->email }}</p>
            <p><strong>CPF:</strong> {{ $user->cpf ? format_cpf($user->cpf) : 'Não informado' }}</p>
            <p><strong>Telefone:</strong> {{ $user->phone ? format_phone($user->phone) : 'Não informado' }}</p>
            <p><strong>Data de nascimento:</strong> {{ $user->birth_date ? \Carbon\Carbon::parse($user->birth_date)->format('d/m/Y') : 'Não informado' }}</p>
        </div>

        <div class="enderecos-perfil">
            <h3>Endereços</h3>
            @forelse ($user->addresses as $address)
                <p>{{ $address->label ?? 'Endereço' }}: {{ $address->street }}, {{ $address->number }} - {{ $address->neighborhood }}, {{ $address->city }}/{{ $address->state }}</p>
            @empty
                <p>Nenhum endereço cadastrado.</p>
            @endforelse
        </div>

        <div class="botoes-perfil">
            <a href="{{ route('profile.edit') }}"><button type="button">Editar</button></a>
            <a href="{{ route('profile.confirm-delete') }}"><button type="button">Excluir Conta</button></a>
        </div>
    </div>

</body>
</html>