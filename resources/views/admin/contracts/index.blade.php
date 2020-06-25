@extends('layouts.app')

@section('title', 'Contrato')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-dark bg-secondary border-dark shadow-lg mb-5">
                <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                    <i class="fas fa-file"></i> Contrato
                    <span class="float-right">
                        <a href="/contracts/contract/novo" class="btn py-0 px-0" data-toggle="tooltip"
                            data-placement="bottom" title="Adicionar Contrato">
                            <i class="fas fa-plus-square" style="color:#fff;"></i>
                        </a>
                    </span>
                </div>
                <div class="card-body">

                    @if (Session::has('mensagem_sucesso'))
                    <div class="alert alert-success" role="alert" style="color:#000 !important;">
                        {{ Session::get('mensagem_sucesso') }}
                    </div>
                    @endif
                    @if (Session::has('mensagem_erro'))
                    <div class="alert alert-danger" role="alert" style="color:#000 !important;">
                        {{ Session::get('mensagem_erro') }}
                    </div>
                    @endif

                    <table class="table table-bordered" id="tableDefault" style="width:100%">

                        <thead>
                            <tr>
                                <th>Contrato</th>
                                <td class="align-middle">
                                    <a href="/contracts/contract/novo" data-toggle="tooltip"
                                        data-placement="bottom" title="Editar contato">
                                        <i class="fas fa-pen-square text-warning" style="font-size:1.5em"></i>
                                    </a>
                                </td>
                            </tr>
                        </thead>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
$(function() {

    var table = $('#tableDefault').DataTable({
        "dom": "'B'" + "<'row'<'col-xs-6'l><'col-xs-6'f>>\
        <'row'<'col-xs-12'<'table-responsive't>r>>\
        <'row'<'col-xs-5'i><'col-xs-12'p>>",
        buttons: [
            @can('datas-vencimento-criar')

            {
                text: '<i class="fas fa-plus"></i>',
                action: function() {
                    window.location.replace('/admin/contracts/contract/novo')
                },
                titleAttr: 'Adicionar contrato'
            },
            @endcan {
                text: '<i class="fas fa-sync"></i>',
                action: function() {
                    window.location.reload()
                },
                titleAttr: 'Atualizar tela'
            },

        ],
        lengthChange: false,
        autoFill: true,
        select: {
            style: 'multi'
        },
        processing: true,
        serverSide: true,
        ajax: '/admin/contracts/contract/lista',
        columns: [{
            data: 'text_contract',
            name: 'text_contract'
        }, ],
        "columnDefs": [

            {
                "targets": 1,
                "render": function(data, type, row) {

                    let btn_editar =
                        "@can('contract-editar')<a href='contracts/" +
                        row.id +
                        "/editar' class='btn btn-xs btn-default'><i class='fas fa-edit'></i> </a>@endcan";
                    let btn_deletar =
                        "@can('datas-vencimento-deletar')<a href='#' class='btn btn-xs btn-danger' onclick='deleteThis(" +
                        row.id + ");' ><i class='fas fa-trash'></i> </a>@endcan";

                    return btn_editar + " " + btn_deletar;
                }
            }
        ],
        'language': {
            "lengthMenu": "_MENU_ p/ página",
            "search": "Buscar: ",
            "loadingRecords": "Aguarde, carregando...",
            "processing": "Aguarde, carregando...",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ data de vencimento",
            "paginate": {
                "first": "Primeiro",
                "last": "Último",
                "next": "Próximo",
                "previous": "Anterior"
            },
            "zeroRecords": "Opa, nenhuma data de vencimento foi localizada.",
        },
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
    });
});


function deleteThis(id) {

    $.confirm({
        title: 'Confirmação',
        content: 'Deseja mesmo deletar essa data?',
        dragWindowBorder: true,
        animationBounce: 1.5,
        theme: 'modern',
        buttons: {
            Cancelar: {
                btnClass: 'btn-green',
                keys: ['enter', 'space'],
                action: function() {
                    console.log('Cancelado')
                }
            },
            Deletar: {
                btnClass: 'btn-red',
                keys: ['enter', 'space'],
                action: function() {

                    $.LoadingOverlay('show');

                    var token = $('.btn-delete').data("token");

                    $.post({
                        url: 'datas-vencimento/' + id + '/delete',
                        method: "delete",
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'id': id,
                        },
                        success: function(data) {
                            $.LoadingOverlay("hide");

                            console.log(data);
                            if (data) {
                                $.confirm({
                                    title: 'Tudo certo',
                                    content: 'A data foi deletada com sucesso',
                                    icon: 'fas fa-warning',
                                    type: 'green',
                                    typeAnimated: true,
                                    buttons: {
                                        Ok: {
                                            text: 'OK',
                                            btnClass: 'btn-gray',
                                            action: function() {
                                                window.location.reload();
                                            }
                                        },
                                    }
                                });

                            }
                        },
                        error: function(error) {
                            console.log(error);

                            $.LoadingOverlay("hide");

                            $.confirm({
                                title: 'Erro ao processar',
                                content: 'Houve erros ao processar sua solicitação',
                                type: 'red',
                                icon: 'fas fa-warning',
                                typeAnimated: true,
                                buttons: {
                                    tryAgain: {
                                        text: 'Tentar novamente',
                                        btnClass: 'btn-gray',
                                        action: function() {}
                                    },
                                    Sair: function() {
                                        window.location.reload();
                                    }
                                }
                            });
                            alert('Houve erros ao processar a solicitação, consulte o console.log' +
                                data);

                        },
                    });
                }
            }
        }
    });

}
</script>
@stop