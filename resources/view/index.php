<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Camps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="collapse" href="#crudUser" role="button" aria-expanded="false" aria-controls="crudUser" aria-current="page" href="#">Crud Usuário</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#crudProduts" role="button" aria-expanded="false" aria-controls="crudProduts" aria-current="page" href="#">Crud Produto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#listProdutos" role="button" aria-expanded="false" aria-controls="listProdutos" aria-current="page" href="#">Endpoint</a>
                    </li>
                </ul>
            </div>
        </nav>
        <section>
            <div class="collapse mt-3" id="crudUser">
                <div class="card card-body">
                    <?php require_once 'crudUser.php' ?>
                </div>
            </div>
            <div class="collapse mt-3" id="crudProduts">
                <div class="card card-body">
                    <?php require_once 'crudProduto.php' ?>
                </div>
            </div>
            <div class="collapse mt-3" id="listProdutos">
                <div class="card card-body">
                    <?php require_once 'listProdutos.php' ?>
                </div>
            </div>
        </section>
    </div>
</body>

</html>