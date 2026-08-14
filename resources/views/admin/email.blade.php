<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Email</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
</head>
<body>
     <div class="titulo-email">
            <h1>Enviar E-mail</h1>
        </div>
        <div class="subtitulo-saverascunho">
        <p>Enviar um e-mail para um usuário da plataforma</p>
        <button>Salvar Rascunho</button>
        </div>
    <div class="email-container" x-data="emailForm">
       <form method="POST" action="{{ route('admin.email.send') }}" @submit="prepararEnvio">
        @csrf
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
        <div class="mensagem-email">
            <label for="">Mensagem</label>
             <div id="editor" style="height: 200px;"></div>
                <input type="hidden" name="body" x-ref="bodyInput" placeholder="Escreva a sua mensagem aqui...">
                @error('body')
                    <span class="erro">{{ $message }}</span>
                @enderror
        </div>
        <div class="botoes-email">
                    <button type="button" @click="limpar">LIMPAR</button>
                    <button type="submit">ENVIAR E-MAIL</button>
        </div>
       </form>
       <div class="preview-email">
                <h3>Pré-visualização</h3>
                <p>Para: <span x-text="destinatarioEmail || 'usuario@email.com'"></span></p>
                <p>Assunto: <span x-text="assunto || 'Assunto do e-mail'"></span></p>

                <div class="preview-conteudo">
                    <h2>RUA13</h2>
                    <p>Olá,</p>
                    <div x-html="mensagemHtml"></div>
                    <p>Atenciosamente,<br>Equipe RUA13</p>
                </div>
        </div>
           <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script>
        function emailForm() {
            return {
                destinatarioNome: '',
                destinatarioEmail: '',
                assunto: '',
                mensagemHtml: '',
                quill: null,
             init() {
                    this.quill = new Quill('#editor', { theme: 'snow' });
                    this.quill.on('text-change', () => {
                        this.mensagemHtml = this.quill.root.innerHTML;
                    });
            },
            atualizarDestinatario(event) {
                    const option = event.target.options[event.target.selectedIndex];
                    this.destinatarioEmail = option.dataset.email || '';
            },
            prepararEnvio() {
                    this.$refs.bodyInput.value = this.quill.root.innerHTML;
            },

            limpar() {
                    this.destinatarioNome = '';
                    this.destinatarioEmail = '';
                    this.assunto = '';
                    this.quill.setContents([]);
                    this.mensagemHtml = '';
                },
            };
        }
    </script>
    </div>

</body>
</html>