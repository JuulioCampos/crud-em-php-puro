<?php
require_once 'app/controller/UsuarioController.php';

use App\Controller\UsuarioController;

$_usuario = new UsuarioController();

$data = $_usuario->index();
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Email</th>
            <th scope="col">Senha</th>
            <th scope="col">Atualizado em</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody id="tbody-user">
    </tbody>
</table>
<script>
    var $listUser
    $('#crud-user').click(() => {
        Swal.fire({
            title: 'Carregando...',
            timer: 500,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
            },
        })
        this.getUsers()
    })

    function getUsers() {
        $listUser = $.get("/teste/listUsuario", ($data) => {
            $data = JSON.parse($data)
            this.listUser = $data
            $("#tbody-user tr").empty()

            $data.map((x, y) => {
                $('#tbody-user').append(`
                <tr key=${y}>
                    <td>${x.id}</td>
                    <td>${x.nome}</td>
                    <td>${x.cpf}</td>
                    <td>${x.email}</td>
                    <td>${x.senha}</td>
                    <td>${x.update_at}</td>
                    <td>
                        <button onclick="edit(${x.id})" title="editar" class="rounded-4 bg-warning border border-0  edit-btn crud-user">
                            <i class="border border-0 btn border-none fa-solid fa-pen-to-square "></i>
                        </button>
                        <button onclick="remove(${x.id})" id="delete-user" title="deletar"  class="rounded-4 bg-danger border border-0  delete-btn crud-user ">
                            <i class=" btn fa-solid fa-trash "></i>
                        </button>
                    </td>
                </tr>
                `);
            })
        });
    }

    function edit(id) {
        $data = JSON.parse(this.$listUser.responseText)
        $toEdit = $data.find(data => data.id = id)
    }

    function remove(id) {
        $data = JSON.parse(this.$listUser.responseText)
        $toDelete = $data.find(data => data.id = id)

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
                swalWithBootstrapButtons.fire(
                    'Foi quase',
                    'Não podemos fazer isso agora :(',
                    'error'
                )
            } else if (
                /* Read more about handling dismissals below */
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