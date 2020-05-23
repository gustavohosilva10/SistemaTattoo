@extends('layouts.app')

@section('title', 'Atualizar Contato')
<!-- Scripts -->
@include('layouts.scripts.validate')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="text-center">
                    <img src="{{ asset('images/logo-trusttattoo.png') }}" alt="Trust Tattoo" class="mt-3 mb-5" />
                </div>

                @include('flash::message')

                <div class="card text-dark bg-secondary border-dark shadow-lg mb-3">
                    <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                        <i class="fas fa-envelope"></i> Confirme seu e-mail
                    </div>
                    <div class="card-body py-5">
                        <p>
                            Olá <strong>{{ $contact['fullname'] }}</strong> tudo bom?<br />
                            Estamos atualizando nosso sistema, e seria bacana se você nos ajudasse atualizando suas informações, para isso confirme seu e-mail para poder atualizar todas outras informações.<br />
                            Com esses dados atualizados iremos começar a criar promoções e vantagens para nossos clientes.<br />
                            Obrigado pela ajuda!
                        </p>

                        {!! Form::open([
                            'method' => 'get',
                            'route' => ['client.edit', $contact['id'], $contact['name']],
                            'files' => true,
                            'class' => 'form-horizontal',
                            'id' => 'needs-validation',
                            'novalidate' => ''
                        ]) !!}

                            {!! Form::label('email', 'Seu e-mail*', null, ['class' => 'control-label']) !!}
                            <div class="input-group">
                                {!! Form::text('email', null, [
                                    'class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control',
                                    'required' => ''
                                ]) !!}
                                <div class="input-group-append">
                                    {!! Form::submit('Verificar', ['class' => 'btn btn-primary']) !!}
                                </div>
                                <span class="invalid-feedback">
                                    <strong>
                                        @if ($errors->has('email'))
                                            {{ $errors->first('email') }}
                                        @else
                                            O campo Seu e-mail é obrigatório!
                                        @endif
                                    </strong>
                                </span>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
