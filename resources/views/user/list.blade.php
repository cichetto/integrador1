<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Consultar Usuários</title>
</head>
<body>

    <main>

        <section class="window-basico">

            <h1>Consultar Usuários</h1>

            <a class="botao-basico" href="{{ route('user.add') }}">Adicionar Usuário</a><br><br>

            @if($allData['mensagem'] != '')
                <p>{{$allData['mensagem']}}</p>
            @endif

            <div class="filter">
                <form action="{{ route('user.list') }}" method="get" id="filtro">
                    <table>
                        <tr>
                            <th><label for="id">ID</label></th>
                            <th><label for="login">Login</label></th>
                            <th><label for="cadastro">Cadastro</label></th>
                            <th><label for="nome">Nome</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" id="id" name="id" value={{ $allData['formData']['id'] }}></td>
                            <td><input type="text" id="login" name="login" value={{ $allData['formData']['login'] }}></td>
                            <td><input type="text" id="cadastro" name="cadastro" value={{ $allData['formData']['cadastro'] }}></td>
                            <td><input type="text" id="nome" name="nome" value={{ $allData['formData']['nome'] }}></td>
                        </tr>
                        <tr>
                            <th><label for="grupo_id">Grupo</label></th>
                            <th><label for="area_id">Area</label></th>
                            <th><label for="tipo">Tipo</label></th>
                            <th><label for="order">Ordenação</label></th>
                        </tr>
                        <tr>
                            <td>
                            <select name="grupo_id" id="grupo_id">
                                <option value="" select></option>
                                @foreach ($allData['grupoData'] as $key => $value)
                                    @if($key == $allData['formData']['grupo_id'])
                                        <option value="{{$key}}" selected>{{$value}}</option>
                                    @else
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endif
                                @endforeach

                            </select>
                            </td>
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
                            <td>
                                <select name="tipo" id="tipo">
                                    <option value="" select></option>
                                    @foreach ($allData['tiposData'] as $key => $value)
                                        @if($key == $allData['formData']['tipo'])
                                            <option value="{{$key}}" selected>{{$value}}</option>
                                        @else
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
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
            
            @if(count($allData['userData']) > 0)
                <table>
                    <tr class="cabecalho">
                        <th>Opções</th>
                        <th>ID</th>
                        <th>Login</th>
                        <th>Cadastro</th>
                        <th>Nome</th>
                        <th>Grupo</th>
                        <th>Area</th>
                        <th>Tipo</th>
                    </tr>

                    @foreach ($allData['userData'] as $user)
                        <tr>
                        <td>
                            <a href="{{ route('user.view', ['id' => $user['id']]) }}"><span class="material-icons">view_headline</span></a>
                            <a href="{{ route('user.edit', ['id' => $user['id']]) }}"><span class="material-icons">edit</span></a>
                            <a href="{{ route('user.remove', ['id' => $user['id']]) }}"><span class="material-icons">delete</span></a>
                        </td>
                        <td>{{$user['id']}}</td>
                        <td>{{$user['login']}}</td>
                        <td>{{$user['cadastro']}}</td>
                        <td>{{$user['nome']}}</td>
                        <td>{{$user['grupo_id'].' - '.$allData['grupoData'][$user['grupo_id']]}}</td>
                        <td>{{$user['area_id'].' - '.$allData['areaData'][$user['area_id']]}}</td>
                        <td>{{$allData['tiposData'][$user['tipo']]}}</td>
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