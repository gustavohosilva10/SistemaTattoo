@extends('layouts.app')

@section('title', 'Login Sistema')

@section('content')
<!-- Scripts -->
@include('layouts.scripts.validate')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <img src="{{ asset('images/logo-trusttattoo.png') }}" alt="Trust Tattoo" class="mt-5 mb-5" />
            </div>
            <div class="card text-dark bg-secondary border-dark shadow-lg">
                <div class="card-header text-light text-uppercase bg-dark font-weight-bold">Entrar no Sistema</div>

                <div class="card-body pt-5">
                    {!! Form::open([
                        'method' => 'post',
                        'route' => 'login',
                        'class' => 'form-login',
                        'id' => 'needs-validation',
                        'novalidate' => ''
                    ]) !!}
                        <div class="form-group row">
                            {!! Form::label('email', 'Seu E-mail', [
                                'class' => 'col-sm-4 col-form-label text-md-right control-label'
                            ]) !!}
                            <div class="col-md-6">
                                {!! Form::email('email', 'admin@test.com', [
                                    'class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control',
                                    'id' => 'email',
                                    'required' => ''
                                ]) !!}

                                <span class="invalid-feedback">
                                    <strong>
                                        @if ($errors->has('email'))
                                            {{ $errors->first('email') }}
                                        @else
                                            O campo email é obrigatório.
                                        @endif
                                    </strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password', 'Sua Senha', [
                                'class' => 'col-sm-4 col-form-label text-md-right control-label'
                            ]) !!}

                            <div class="col-md-6">
                                {{-- Change for Form::password and remove value --}}
                                {!! Form::text('password', 'TattooTestLaravel', [
                                    'class' => $errors->has('password') ? 'form-control is-invalid' : 'form-control',
                                    'id' => 'password',
                                    'required' => ''
                                ]) !!}

                                <span class="invalid-feedback">
                                    <strong>
                                        @if ($errors->has('password'))
                                            {{ $errors->first('password') }}
                                        @else
                                            O campo senha é obrigatório.
                                        @endif
                                    </strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="custom-control custom-checkbox">
                                    {!! Form::checkbox('remember', null, old('remember') ? 'checked' : '', [
                                        'class' => 'custom-control-input',
                                        'id' => 'remember'
                                    ]) !!}
                                    {!! Form::label('remember', 'Continuar logado', ['class' => 'custom-control-label']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                {!! Form::submit('Entrar', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
