<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Editar Usuário</title>
</head>
<body>

    <main>

        <section class="window-basico">

            <a class="botao-basico" href="{{ route('user.list') }}">Voltar</a><br><br>
            
            <h1>Editar Usuário</h1>
            
            @if($allData['mensagem'] != '')
                <p>{{$allData['mensagem']}}</p>
            @endif

            <form action="{{ route('user.edit') }}" method="post" id="add" class="form-basico">
                @csrf

                <label for="login">ID do cadastro:</label><br>
                <input type="text" id="id" name="id" placeholder="id" value='{{ $allData['userData']['id'] }}' readonly><br><br>

                <label for="login">Nome de usuário:</label><br>
                <input type="text" id="login" name="login" placeholder="Login" value='{{ $allData['userData']['login'] }}'><br><br>

                <label for="senha">Senha:</label><br>
                <input type="password" id="senha" name="senha" placeholder="Senha" value='{{ $allData['userData']['senha'] }}'><br><br>

                <label for="cadastro">Cadastro:</label><br>
                <input type="text" id="cadastro" name="cadastro" placeholder="Cadastro" value='{{ $allData['userData']['cadastro'] }}'><br><br>

                <label for="nome">Nome Completo:</label><br>
                <input type="text" id="nome" name="nome" placeholder="Nome" value='{{ $allData['userData']['nome'] }}'><br><br>

                <label for="grupo_id">Grupo:</label><br>
                <select name="grupo_id" id="grupo_id">
                     @foreach ($allData['grupoData'] as $key => $value)
                        @if($key == $allData['userData']['grupo_id'])
                            <option value="{{$key}}" selected>{{$value}}</option>
                        @else
                            <option value="{{$key}}">{{$value}}</option>
                        @endif
                    @endforeach
                </select><br><br>

                <label for="area_id">Area:</label><br>
                <select name="area_id" id="area_id">
                     @foreach ($allData['areaData'] as $key => $value)
                        @if($key == $allData['userData']['area_id'])
                            <option value="{{$key}}" selected>{{$value}}</option>
                        @else
                            <option value="{{$key}}">{{$value}}</option>
                        @endif
                    @endforeach
                </select><br><br>

                <label for="tipo">Tipo de usuário:</label><br>
                <select name="tipo" id="tipo">
                    @foreach ($allData['tiposData'] as $key=>$value)
                        @if($key == $allData['userData']['tipo'])
                            <option value="{{$key}}" select>{{$value}}</option>
                        @else
                            <option value="{{$key}}">{{$value}}</option>
                        @endif
                    @endforeach
                </select><br><br>
                
                <button type="submit" form="add" value="Entrar" class="botao-basico">Salvar</button>
            </form>
        
        </section>

    </main>
    
</body>
</html>