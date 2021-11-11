<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Adicionar Treinamento</title>
</head>
<body>

    <main>

        <section class="window-basico">

            <a class="botao-basico" href="{{ route('treinamento.list') }}">Voltar</a><br><br>
            
            <h1>Adicionar Treinamento</h1>
            
            @if($allData['mensagem'] != '')
                <p>{{$allData['mensagem']}}</p>
            @endif

            <form action="{{ route('treinamento.add') }}" method="post" id="add" class="form-basico">
                @csrf

                <label for="titulo">Título:</label><br>
                <input type="text" id="titulo" name="titulo" placeholder="Título"><br><br>

                <label for="descricao">Descrição:</label><br>
                <input type="text" id="descricao" name="descricao" placeholder="Descrição"><br><br>

                <label for="area_id">Area:</label><br>
                <select name="area_id" id="area_id">
                    @foreach ($allData['areaData'] as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select><br><br>

                <label for="validade">Validade:</label><br>
                <input type="date" id="validade" name="validade"><br><br>

                <label for="celulas">Células:</label><br>
                <input type="text" id="celulas" name="celulas" placeholder="Células"><br><br>

                <label for="anexo">Anexo:</label><br>
                <input type="file" id="anexo" name="anexo" accept=".pdf"><br><br>

                
                <button type="submit" form="add" value="Entrar" class="botao-basico" >Adicionar</button>
            </form>
        
        </section>

    </main>
    
</body>
</html>