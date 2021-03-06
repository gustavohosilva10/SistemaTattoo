@extends('layouts.app')

@section('title', 'Contrato')
@section('content')
<style>
    *{
        table-layout:fixed;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-dark bg-secondary border-dark shadow-lg mb-5">
                <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                    <i class="fas fa-file"></i> Contrato
                    @if(empty(isset($contract->text_contract)))
                   
                    <span class="float-right">
                        <a href="/contracts/contract/novo" class="btn py-0 px-0" data-toggle="tooltip"
                            data-placement="bottom" title="Adicionar Contrato">
                            <i class="fas fa-plus-square" style="color:#fff;"></i>
                        </a>
                    </span>
                    @else
                    @endif
                </div>
                <div class="card-body" >

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

                    <table class="table table-bordered" id="tableDefault" style="width:100% ">
                        <thead>
                            <tr>
                                <td>Contrato
                                    @if(empty(isset($contract->text_contract)))
                                    <p>Não possui um contrato</p>
                                    @else
                                    <p> {!!$contract->text_contract!!} </p>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if(empty(isset($contract->text_contract)))
                                    @else
                                <form action="/contracts/contract/{{$contract->id}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger">Apagar</button>
                                </form>
                                    @endif
                                </td>
                            </tr>
                        </thead>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#basic-btn tr td").css("white-space","pre-wrap");
</script>
@stop
