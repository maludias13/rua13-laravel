<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Email</title>
</head>
<body>
    <x admin-sidebar/>
    <div class="email-container" x-data="emailForm">

       <form method="POST" action="{{ route('admin.email.send') }}" @submit="prepararEnvio">
        @csrf
         <div class="titulo-email">
            <h1>Enviar E-mail</h1>
        </div>
        <div class="subtitulo-saverascunho">
        <p>Enviar um e-mail para um usuário da plataforma</p>
        <button>Salvar Rascunho</button>
        </div>
        <div class="destinatario-email">
            <label for="">Destinatário</label>
                <select name="user_id"  x-model="destinatarioNome" @change="atualizarDestinatario($event)">
                    <option value="">Selecione um Usuário</option>
                    @foreach ($users as $user)
                                <option value="{{ $user->id }}" data-email="{{ $user->email }}">{{ $user->name }}</option>
                    @endforeach
                    @error('user_id')
                        <span class="error">{{$message}}</span>
                    @enderror
                </select>
        </div>
        <div class="assunto">
            <label for="">Assunto</label>
            <input type="text" name="subject" placeholder="Digite aqui o assunto" x-model="assunto">
            @error('subject')
            <span class="error">{{$message}}</span>
            @enderror
        </div>
       </form>
    </div>
</body>
</html>