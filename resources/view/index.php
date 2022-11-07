<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Camps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    if (isset($_GET['failed']) && $_GET['failed'] == 'endpoint_params') {
        echo "
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Parametros do endpoint não foram passados ou estão incorretos, tente novamente!',
      })
      </script>
    ";
    }
    ?>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a id="crud-user" class="nav-link active" data-bs-toggle="collapse" href="#crudUser" role="button" aria-expanded="false" aria-controls="crudUser" aria-current="page" href="#">Crud Usuário</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#crudProduts" role="button" aria-expanded="false" aria-controls="crudProduts" aria-current="page" href="#">Listar Produtos</a>
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
                    <p>Endpoint para verificar o produto fica em:</p>
                    <p><b>GET: {your_host}/endpoint/{email}/{password}</b></p>
                    <p>verifique se existe os dados no banco antes de continuar!</p>

                    <h5>ROTAS DOS SISTEMA:</h5>
                    <ul>
                        <li>GET: /list-usuario</li>
                        <li>POST: /update-usuario</li>
                        <li>POST: /delete-usuario</li>
                        <li>POST: /create-user</li>
                    </ul>



                </div>
            </div>
        </section>
    </div>
</body>

</html>