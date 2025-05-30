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
        }
        .bg-sucesso{
            background-color: #00d495;
            border-radius: 15px;
            color: #000
        }
        .bg-editar{
            background-color: #efc341;
            color: #fff;
            font-weight: 600;
        }
        .fw-600{
            font-weight: 600;
        }
    </style>
</head>
<body>
    <header>
        <h3>Visualização de produtos</h3>
    </header>
    
    <div>
        @yield('content')
    </div>

    <footer>
        <p>Controle de Estoque</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>