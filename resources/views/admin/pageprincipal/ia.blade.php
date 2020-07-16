@extends('layouts.app')

@section('title', 'Landing page')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-dark bg-secondary border-dark shadow-lg mb-5">
                <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                    <i class="fas fa-file"></i> Página
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
                                <td><b>Foto principal</b>
                                    <p>{!!$pageprincipal->base64_photo_principal!!}</p>
                                    <br>
                                    <td>
                                    <label><b>Titulo de boas  vindas</b></label>
                                    <p>{!!$pageprincipal->text_welcome_title!!}</p>
                                    <label><b>Texto de boas vindas</b></label>
                                    <p>{!!$pageprincipal->text_welcome!!}</p>
                                </td>
                                </td>
                                
                                <td class="align-middle">
                                    <a href="/contracts/contract/novo" data-toggle="tooltip"
                                        data-placement="bottom" title="Editar contato">
                                        <i class="fas fa-pen-square text-warning" style="font-size:1.5em"></i>
                                    </a>
                                </td>
                            </tr>
                        </thead>

                    </table>

                    <table class="table table-bordered" id="tableDefault" style="width:100%">

                        <thead>
                            <tr>
                                <td>
                                        <label><b>Book de fotos</b></label>
                                        <p>{!!$pageprincipal->base64_image!!}</p>
                                    
                                    <td class="align-middle">
                                        <a href="/contracts/contract/novo" data-toggle="tooltip"
                                            data-placement="bottom" title="Editar contato">
                                            <i class="fas fa-pen-square text-warning" style="font-size:1.5em"></i>
                                        </a>
                                    </td>
                                </td>
                            </tr>
                        </thead>
                    </table>

                    <table class="table table-bordered" id="tableDefault" style="width:100%">

                        <thead>
                            <tr>
                                <td>
                                        <label><b>Informações pessoais</b></label>
                                        <p>{!!$pageprincipal->base64_photo_perfil!!}</p>
                                        <td>
                                            <label><b>Nome</b></label>
                                            <p>{!!$pageprincipal->name_perfil!!}</p>
                                            <label><b>Bibliografia</b></label>
                                            <p>{!!$pageprincipal->text_perfil!!}</p>
                                        </td>
                                    <td class="align-middle">
                                        <a href="/contracts/contract/novo" data-toggle="tooltip"
                                            data-placement="bottom" title="Editar contato">
                                            <i class="fas fa-pen-square text-warning" style="font-size:1.5em"></i>
                                        </a>
                                    </td>
                                </td>
                            </tr>
                        </thead>
                    </table>
                    
                    <table class="table table-bordered" id="tableDefault" style="width:100%">
                        <tr>
                            <td>
                                <label><b>Promoções</b></label>
                                <br>
                                <label>Promoção 1</label>
                                <p>{!!$pageprincipal->base64_promocao1!!}</p>
                                <label>Promoção 2</label>
                                <p>{!!$pageprincipal->base64_promocao2!!}</p>
                                <label>Promoção 3</label>
                                <p>{!!$pageprincipal->base64_promocao3!!}</p>
                                <td>
                                    <label><b>Descrição 1</b></label>
                                    <p>{!!$pageprincipal->description1!!}</p>
                                    <label><b>Descrição 2</b></label>
                                    <p>{!!$pageprincipal->description2!!}</p>
                                    <label><b>Descrição 3</b></label>
                                    <p>{!!$pageprincipal->description3!!}</p>
                                </td>
                            </td>
                            <td class="align-middle">
                                <a href="/contracts/contract/novo" data-toggle="tooltip"
                                    data-placement="bottom" title="Editar contato">
                                    <i class="fas fa-pen-square text-warning" style="font-size:1.5em"></i>
                                </a>
                            </td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@stop
