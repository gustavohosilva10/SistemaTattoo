@extends('layouts.app')

@section('title', 'Importar Contatos')
<!-- Scripts -->
@include('layouts.scripts.validate')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-dark bg-secondary border-dark shadow-lg mb-5">
                <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                    <i class="fas fa-file"></i> Importar Contatos
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-5">
                            {!! Form::open([
                                'method' => 'post',
                                'route' => 'admin.contacts.parse',
                                'class' => 'form-horizontal',
                                'id' => 'needs-validation',
                                'enctype' => 'multipart/form-data',
                                'novalidate' => ''
                            ]) !!}
                                <div class="form-group">
                                    <div class="custom-file">
                                        {!! Form::file('csv_file', [
                                            'class' => $errors->has('csv_file') ? 'custom-file-input form-control is-invalid' : 'custom-file-input form-control',
                                            'id' => 'csv_file',
                                            'required' => ''
                                        ]) !!}
                                        {!! Form::label('csv_file', 'Escolha o arquivo...', [
                                            'class' => 'custom-file-label'
                                        ]) !!}
                                        <span class="invalid-feedback">
                                            <strong>
                                                @if ($errors->has('csv_file'))
                                                    {{ $errors->first('csv_file') }}
                                                @else
                                                    O campo csv file é obrigatório.
                                                @endif
                                            </strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    {!! Form::submit('Importar', ['class' => 'btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-7">
                            <p>Envie o arquivo no formato csv com os seguintes campos:</p>
                            <ul>
                                <li><strong>Nome: </strong><i>first_name - <strong>Texto</strong></i></li>
                                <li><strong>Nome do Meio: </strong><i>middle_name - <strong>Texto</strong></i></li>
                                <li><strong>Último Nome: </strong><i>last_name - <strong>Texto</strong></i></li>
                                <li><strong>Foto: </strong><i>avatar - <strong>Caminho da Foto ou vazio</strong></i></li>
                                <li><strong>Data de Nascimento: </strong><i>birthday - <strong>Data no formato 2000-12-20</strong></i></li>
                                <li><strong>Sexo: </strong><i>gender - <strong>Texto M ou F</strong></i></li>
                                <li><strong>Email: </strong><i>email - <strong>Email válido</strong></i></li>
                                <li><strong>Telefone: </strong><i>phone1 - <strong>Texto</strong></i></li>
                                <li><strong>Celular: </strong><i>phone2 - <strong>Texto</strong></i></li>
                                <li><strong>CEP: </strong><i>zip_code - <strong>Texto 00000-000</strong></i></li>
                                <li><strong>Rua: </strong><i>address - <strong>Texto</strong></i></li>
                                <li><strong>Complemento: </strong><i>complement - <strong>Texto</strong></i></li>
                                <li><strong>Bairro: </strong><i>strict - <strong>Texto</strong></i></li>
                                <li><strong>Cidade: </strong><i>city - <strong>Texto</strong></i></li>
                                <li><strong>Estado: </strong><i>state - <strong>Texto</strong></i></li>
                                <li><strong>Número: </strong><i>number - <strong>Texto 10A</strong></i></li>
                                <li><strong>Data do Cadastro: </strong><i>register - <strong>Data no formato 2000-12-20</strong></i></li>
                                <li><strong>Acceite os Termos: </strong><i>agree - <strong>1 para sim 0 para não</strong></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
