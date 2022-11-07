<?php
require_once 'app/controller/UsuarioController.php';

use App\Controller\UsuarioController;

$_usuario = new UsuarioController();

$data = $_usuario->index();
?>
<div>
    <div class="row">
        <div class="col-6 col-md-4 col-lg-3">
            <button class="  btn btn-success" data-toggle="collapse" href="#create-user" role="button" aria-expanded="false" aria-controls="create-user">
                <i class=" fa-solid fa-circle-plus"></i> Criar novo usuário
            </button>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <button class=" btn btn-warning" data-toggle="collapse" id="btn-edit" href="#edit-user" role="button" aria-expanded="false" aria-controls="edit-user">
                <i class=" fa-solid fa-pen-to-square "></i> Editar usuário
            </button>
        </div>
        <div class="col-12 mt-3">
            <div class="collapse" id="create-user">
                <div id='create-row' class="card card-body">
                    <form>
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8 col-lg-5 border border-1 p-3 rounded    ">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control create-nome" id="create-nome" placeholder="Nome">
                                </div>
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control create-cpf" id="create-cpf" placeholder="CPF">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control create-email" id="create-email" aria-describedby="emailHelp" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <label for="senha">Password</label>
                                    <input type="password" class="form-control create-senha" id="create-senha" placeholder="Senha">
                                </div>
                                <button onclick="create(event)" class="btn btn-primary mt-3">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3">
            <div class="collapse" id="edit-user">
                <div id='edit-row' class="card card-body">
                    <div>
                        <h2>Selecione um usuário para editar</h2>
                        <select id="select-user-edit" class="form-select" aria-label="Select padrão">
                            <option hidden>Selecione um usuário </option>
                        </select>
                    </div>
                    <form class="d-none edit-form mt-3">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8 col-lg-5 border border-1 p-3 rounded    ">
                                <div class="form-group">
                                    <label for="nome">Código</label>
                                    <input type="text" class="form-control edit-id" value="{{id}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control edit-nome" id="nome" value="{{nome}}">
                                </div>
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control edit-cpf" id="cpf" value="{{cpf}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control edit-email" id="email" aria-describedby="emailHelp" value="{{email}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="senha">Password</label>
                                    <input type="password" class="form-control edit-senha" id="senha" value="{{senha}}">
                                </div>
                                <button id='submit-edit' type="submit" onclick="update(event)" class="btn btn-primary mt-3">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Email</th>
            <th scope="col">Senha</th>
            <th scope="col">Atualizado em</th>
            <th scope="col">apagar</th>
        </tr>
    </thead>
    <tbody id="tbody-user">
    </tbody>
</table>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    var $listUser
    $('#crud-user').click(() => {
        Swal.fire({
            title: 'Carregando...',
            timer: 1000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
            },
        })
        this.getUsers()
    })

    function getUsers() {
        $listUser = $.get("/list-usuario", ($data) => { //teste
            $data = JSON.parse($data)
            this.listUser = $data
            $("#tbody-user tr").empty()

            $data.map((x, y) => {
                $('#tbody-user').append(`
                <tr key=${y}>
                    <td id='id' >${x.id}</td>
                    <td id='nome'>${x.nome}</td>
                    <td id='cpf' >${x.cpf}</td>
                    <td id='email' >${x.email}</td>
                    <td id='senha' >${x.senha}</td>
                    <td id='update_at' >${x.update_at}</td>
                    <td>
                        <button onclick="remove(event, '${x.id}')" title="deletar"  class="rounded-4 bg-danger border border-0  delete-btn crud-user ">
                            <i class=" btn fa-solid fa-trash "></i>
                        </button>
                    </td>
                </tr>
                `);
            })
        });
    }

    $('#btn-edit').click(() => {
        {
            var users = JSON.parse($listUser.responseText)
            users.map((x, y) => {
                $('#select-user-edit').append(`
                    <option key=${y} value="${x.id}">${x.nome}</option>
                `)
            })

        }
    })

    $('#select-user-edit').change(function() {
        var users = JSON.parse($listUser.responseText)
        let id = $(this).val()
        let user = users.find(user => user.id == id)
        $('.edit-form').removeClass('d-none')
        $('.edit-id').val(user.id)
        $('.edit-nome').val(user.nome)
        $('.edit-cpf').val(user.cpf)
        $('.edit-email').val(user.email)
        $('.edit-senha').val(user.senha)
    })

    function update(event) {
        event.preventDefault();
        $data = {
            'id': $('.edit-id').val(),
            'nome': $('.edit-nome').val(),
            'email': $('.edit-email').val(),
            'cpf': $('.edit-cpf').val(),
            'senha': $('.edit-senha').val()
        }
        axios.post('/update-usuario', $data) //teste
            .then(function(response) {
                Toast.fire({
                    icon: 'success',
                    title: 'Atualização concluída'
                })
                getUsers()
            })
            .catch(function(error) {
                Toast.fire({
                    icon: 'error',
                    title: 'Falha ao atualizar dados'
                })
            });
    }

    function create(event) {
        event.preventDefault();
        $data = {
            'nome': $('.create-nome').val(),
            'email': $('.create-email').val(),
            'cpf': $('.create-cpf').val(),
            'senha': $('.create-senha').val()
        }
        axios.post('/create-usuario', $data) //teste
            .then(function(response) {
                Toast.fire({
                    icon: 'success',
                    title: 'Usuário criado!'
                })
                getUsers()
            })
            .catch(function(error) {
                Toast.fire({
                    icon: 'error',
                    title: 'Falha ao criar usuario'
                })
            });
    }


    function remove(event, id) {
        event.preventDefault();
        $data = {
            'id': id
        }
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Você tem certeza que deseja remover?',
            text: "Não é possivel desfazer depois!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, deletar!',
            cancelButtonText: 'Não, cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/delete-usuario', $data) //teste
                    .then(function(response) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Usuário deletado!'
                        })
                        getUsers()
                    })
                    .catch(function(error) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Falha ao criar usuario'
                        })
                    });
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'Você evitou perder seus dados :)',
                    'error'
                )
            }
        })
    }
</script>
<style>
    button.swal2-cancel.btn.btn-danger {
        margin: 0 12px;
    }
</style>