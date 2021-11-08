<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Visualizar Usuário</title>
</head>
<body>

    <main>

        <section class="window-basico">

            <a class="botao-basico" href="{{ route('user.list') }}">Voltar</a><br><br>
            
            <h1>Visualizar Usuário</h1>

            <form action="{{ route('user.add') }}" method="post" id="add" class="form-basico">
                @csrf
                
                <label for="login">ID do cadastro:</label><br>
                <input type="text" id="id" name="id" placeholder="id" value='{{ $allData['userData']['id'] }}' readonly><br><br>

                <label for="login">Nome de usuário:</label><br>
                <input type="text" id="login" name="login" value='{{ $allData['userData']['login'] }}' readonly><br><br>

                <label for="senha">Senha:</label><br>
                <input type="text" id="senha" name="senha" value='{{ $allData['userData']['senha'] }}' readonly><br><br>

                <label for="cadastro">Cadastro:</label><br>
                <input type="text" id="cadastro" name="cadastro" value='{{ $allData['userData']['cadastro'] }}' readonly><br><br>

                <label for="nome">Nome Completo:</label><br>
                <input type="text" id="nome" name="nome" value='{{ $allData['userData']['nome'] }}' readonly><br><br>

                <label for="nome">Grupo:</label><br>
                <input type="text" id="grupo_id" name="grupo_id" value='{{ $allData['grupoData'] }}' readonly><br><br>

                <label for="nome">Area:</label><br>
                <input type="text" id="area_id" name="area_id" value='{{ $allData['areaData'] }}' readonly><br><br>

                <label for="nome">Tipo de usuário:</label><br>
                <input type="text" id="tipo" name="tipo" value='{{ $allData['tiposData'] }}' readonly><br><br>
            
            </form>
        
        </section>

    </main>
    
</body>
</html>