@extends('layouts.app')

@section('title', 'Cadastro Atualizado')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="text-center">
                    <img src="{{ asset('images/logo-trusttattoo.png') }}" alt="Trust Tattoo" class="mt-3 mb-5" />
                </div>

                <div class="card text-dark bg-secondary border-dark shadow-lg mb-3">
                    <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                        <i class="fas fa-envelope"></i> Cadastro Confirmado
                    </div>
                    <div class="card-body py-5">
                        <p>
                            Parabéns seus dados estão atualizados, obrigado pela ajuda e contamos com sua visita, já está na hora de fazer uma nova tattoo, o que acha?
                        </p>
                        <p>
                            Entre em contato conosco através:<br />
                            <i class="fas fa-phone-square"></i> 11.2768.5706<br />
                            <i class="fab fa-whatsapp-square"></i> 11.98564.5126<br />
                            <i class="fas fa-envelope"></i> beto@trusttattoo.com.br
                        </p>
                        <p>
                            Aguardamos seu contato.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
