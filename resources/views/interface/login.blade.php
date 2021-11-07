<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Fazer Login</title>
</head>
<body>

    <section class="login-box">
        
        <div class="login">
            <img src="{{asset('img/user.png')}}" alt="Icone usuário">
            <form action="" method="get" id="formlogin">
                <input type="text" id="username" name="username" placeholder="Nome de usuário"><br>
                <input type="password" id="password" name="password" placeholder="Senha"><br><br>
                <button type="submit" form="formlogin" value="Entrar">Entrar</button>
            </form>
            <p>Novo membro? <a href="">Solicitar login ao administrador.</a></p>
        </div>
        
    </section>
    
</body>
</html>