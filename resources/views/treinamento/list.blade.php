<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Consultar Treinamentos</title>
</head>
<body>

    <main>

        <section class="window-basico">

            <h1>Consultar Treinamentos</h1>

            <a class="botao-basico" href="{{ route('treinamento.add') }}">Adicionar Treinamento</a><br><br>

            @if($allData['mensagem'] != '')
                <p>{{$allData['mensagem']}}</p>
            @endif

            <div class="filter">
                <form action="{{ route('treinamento.list') }}" method="get" id="filtro">
                    <table style='width: 60%;'>
                        <tr>
                            <th><label for="id">ID</label></th>
                            <th><label for="titulo">Título</label></th>
                            <th><label for="area_id">Area</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" id="id" name="id" value={{ $allData['formData']['id'] }}></td>
                            <td><input type="text" id="titulo" name="titulo" value={{ $allData['formData']['titulo'] }}></td>

                            <td>
                            <select name="area_id" id="area_id">
                                <option value="" select></option>
                                @foreach ($allData['areaData'] as $key => $value)
                                    @if($key == $allData['formData']['area_id'])
                                        <option value="{{$key}}" selected>{{$value}}</option>
                                    @else
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endif
                                @endforeach
                            </select>
                            </td>

                        </tr>
                        <tr>
                            <th><label for="celulas">Celula</label></th>
                            <th><label for="validade_de">Validade De</label></th>
                            <th><label for="validade_ate">Validade Até</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" id="celulas" name="celulas" value={{ $allData['formData']['celulas'] }}></td>
                            <td><input type="date" id="validade_de" name="validade_de" value={{ $allData['formData']['validade_de'] }}></td>
                            <td><input type="date" id="validade_ate" name="validade_ate" value={{ $allData['formData']['validade_ate'] }}></td>
                        </tr>
                        <tr>
                            <th><label for="order">Ordenação</label></th>
                        </tr>
                        <tr>
                            <td>
                                <select name="order" id="order">
                                    <option value="" select></option>
                                    @foreach ($allData['orderList'] as $key => $value)
                                        @if($key == $allData['formData']['order'])
                                            <option value="{{$key}}" selected>{{$value}}</option>
                                        @else
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>

                            <td><button type="submit" form="filtro" value="Filtrar">Filtrar</button></td>
                        </tr>

                    </table>
                </form>
            </div>
            
            @if(count($allData['treinamentoData']) > 0)
                <table>
                    <tr class="cabecalho">
                        <th>Opções</th>
                        <th>ID</th>
                        <th>titulo</th>
                        <th>area_id</th>
                        <th>validade</th>
                        <th>celulas</th>
                    </tr>

                    @foreach ($allData['treinamentoData'] as $treinamento)
                        <tr>
                        <td>
                            <a href="{{ route('treinamento.view', ['id' => $treinamento['id']]) }}"><span class="material-icons">view_headline</span></a>
                            <a href="{{ route('treinamento.edit', ['id' => $treinamento['id']]) }}"><span class="material-icons">edit</span></a>
                            <a href="{{ route('treinamento.remove', ['id' => $treinamento['id']]) }}"><span class="material-icons">delete</span></a>
                        </td>
                        <td>{{$treinamento['id']}}</td>
                        <td>{{$treinamento['titulo']}}</td>
                        <td>{{$treinamento['area_id'].' - '.$allData['areaData'][$treinamento['area_id']]}}</td>
                        <td>{{$treinamento['validade']}}</td>
                        <td>{{$treinamento['celulas']}}</td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>Nada foi encontrado.</p>
            @endif

        </section>

    </main>
    
</body>
</html>