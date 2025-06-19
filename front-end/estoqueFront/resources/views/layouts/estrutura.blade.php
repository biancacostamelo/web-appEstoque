<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>estoque</title>
    <style>
        .bg-falhou{
            background-color: #f55333;
            border-radius: 15px;
            color: rgb(31, 34, 43) !important;
        }
        .bg-sucesso{
            background-color: #00d495;
            border-radius: 15px;
            color: rgb(31, 34, 43) !important;
        }
        .bg-editar{
            background-color: #efc341;
            color: rgb(31, 34, 43) !important;
            font-weight: 600;
        }
        .fw-600{
            font-weight: 600;
        }
        body{
            background-color:#1f222b;
        }
        a,p,label,h1,h2,h3,td,span, th,hr{
            color:rgba(255, 255, 255, 0.72) !important;
        }
        input{
            background-color: transparent !important;
            border: 1px rgba(255, 255, 255, 0.25) solid;
            color: rgba(255, 255, 255, 0.72) !important;
        }
        .formulario{
            background-color: rgb(46, 50, 65);
            width: fit-content;
            padding: 50px;
            border-radius: 15px;
        }
        .formularioEditar{
            background-color: #2e3241;
            padding: 50px;
            border-radius: 15px;
            width: 40%;
            margin: auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .login{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 90vh;
        }
        .home{
            padding-left: 50px;
            padding-right: 50px;
            margin-bottom: 50px;
        }
        .tabela{
            background-color: rgb(46, 50, 65);
            border-radius: 20px;
        }
    </style>
</head>
<body class="d-flex flex-column justify-content-between" style="height: 100vh">
    
    <div>
        @yield('content')
    </div>

    <footer>
        <hr>
        <p>Controle de Estoque</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>