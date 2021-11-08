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

            @if($allData['mensagem'] != '')
                <p>{{$allData['mensagem']}}</p>
            @endif

            <div class="filter">
                <form action="{{ route('user.list') }}" method="get" id="filtro">
                    <table>
                        <tr>
                            <td><label for="id">ID</label></td>
                            <td><label for="login">Login</label></td>
                            <td><label for="cadastro">Cadastro</label></td>
                            <td><label for="nome">Nome</label></td>
                        </tr>
                        <tr>
                            <td><input type="text" id="id" name="id"></td>
                            <td><input type="text" id="login" name="login"></td>
                            <td><input type="text" id="cadastro" name="cadastro"></td>
                            <td><input type="text" id="nome" name="nome"></td>
                        </tr>
                        <tr>
                            <td><label for="grupo_id">Grupo</label></td>
                            <td><label for="area_id">Area</label></td>
                            <td><label for="tipo">Tipo</label></td>
                            <td><label for="order">Ordenação</label></td>
                        </tr>
                        <tr>
                            <td><input type="text" id="grupo_id" name="grupo_id"></td>
                            <td><input type="text" id="area_id" name="area_id"></td>
                            <td><input type="text" id="tipo" name="tipo"></td>
                            <td><input type="text" id="order" name="order"></td>
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
                        <th>login</th>
                        <th>cadastro</th>
                        <th>nome</th>
                        <th>grupo_id</th>
                        <th>area_id</th>
                        <th>tipo</th>
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
                        <td>{{$user['grupo_id']}}</td>
                        <td>{{$user['area_id']}}</td>
                        <td>{{$user['tipo']}}</td>
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