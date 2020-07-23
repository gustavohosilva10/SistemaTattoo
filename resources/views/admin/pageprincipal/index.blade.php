@extends('layouts.app')

@section('title', 'Landing page')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-dark bg-secondary border-dark shadow-lg mb-5">
                <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                    <i class="fas fa-file"></i> Configure sua Landing page
                </div>
                <div class="card-body py-5">
                    <div class="card text-dark bg-secondary border-dark shadow-lg mb-5">
                        <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                            <i class="fas fa-file"></i> Inicio
                            <span class="float-right">
                                <a href="/contracts/contract/novo" class="btn py-0 px-0" data-toggle="tooltip"
                                    data-placement="bottom" title="Adicionar Contrato">
                                    <i class="fas fa-pen-square text-warning"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                    
                    <div class="card text-dark bg-secondary border-dark shadow-lg mb-5">
                        <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                            <i class="fas fa-camera"></i> Fotos
                            <span class="float-right">
                                <a href="/contracts/contract/novo" class="btn py-0 px-0" data-toggle="tooltip"
                                    data-placement="bottom" title="Adicionar Contrato">
                                    <i class="fas fa-pen-square text-warning"></i>
                                </a>
                            </span>
                        </div>
                    </div>

                    <div class="card text-dark bg-secondary border-dark shadow-lg mb-5">
                        <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                            <i class="fas fa-file"> </i>  <i class="fas fa-camera"></i> Bibliografia
                            <span class="float-right">
                                <a href="/bibliography/index" class="btn py-0 px-0" data-toggle="tooltip"
                                    data-placement="bottom" title="Adicionar Contrato">
                                    <i class="fas fa-pen-square text-warning"></i>
                                </a>
                            </span>
                        </div>
                    </div>

                    <div class="card text-dark bg-secondary border-dark shadow-lg mb-5">
                        <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                            <i class="fas fa-file"></i>  <i class="fas fa-camera"></i> Promoções
                            <span class="float-right">
                                <a href="/postes/index" class="btn py-0 px-0" data-toggle="tooltip"
                                    data-placement="bottom" title="Adicionar Contrato">
                                    <i class="fas fa-pen-square text-warning"></i>
                                </a>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop
