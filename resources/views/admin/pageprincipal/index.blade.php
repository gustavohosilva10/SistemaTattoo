@extends('layouts.app')

@section('title', 'Landing page')

@section('content')
{{ Form::open(array('url' => '/pageprincipal/pageprincipal/salvar', 'enctype' => "multipart/form-data")) }}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          
            <div class="card text-dark bg-secondary border-dark shadow-lg mb-3">
                <div class="card-header text-light text-uppercase bg-dark font-weight-bold"><i
                        class="fas fa-camera"></i> Foto</div>
                <div class="card-body py-5">
                    {!! Form::label('base64_photo_principal', 'Foto principal ', null, ['class' => 'control-label']) !!}
                    <div class="fileinput-new row" data-provides="fileinput">
                        <div class="col-sm-12 col-lg-10 col-xl-10 input-group">

                            <div class="form-control" data-trigger="fileinput">
                                <i class="fas fa-file-image fileinput-exists"></i> <span
                                    class="fileinput-filename"></span>
                            </div>
                            <span class="input-group-addon btn btn-primary btn-file">
                                <span class="fileinput-new">Escolha a foto</span>
                                <span class="fileinput-exists">Troque a foto</span>
                                {!! Form::file('base64_photo_principal', [
                                'class' => $errors->has('base64_photo_principal') ? 'custom-file-input form-control
                                is-invalid' : 'custom-file-input form-control',
                                'id' => 'base64_photo_principal'
                                ]) !!}
                                <span class="invalid-feedback">
                                    <strong>
                                        @if ($errors->has('base64_photo_principal'))
                                        {{ $errors->first('base64_photo_principal') }}
                                        @endif
                                    </strong>
                                </span>
                            </span>
                            <a href="#" class="input-group-addon btn btn-danger fileinput-exists"
                                data-dismiss="fileinput">Remova a foto</a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card text-dark bg-secondary border-dark shadow-lg mb-3">
                <div class="card-header text-light text-uppercase bg-dark font-weight-bold"><i
                        class="fas fa-address-card"></i> Informações Pessoal</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-12 col-lg-4 col-xl-4 mb-2">
                            {!! Form::label('text_welcome_title', 'Titulo de boas vindas', null, ['class' =>
                            'control-label']) !!}
                            {!! Form::text('text_welcome_title', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-12 col-lg-4 col-xl-4 mb-2">
                            {!! Form::label('text_welcome', 'Texto de boas vindas', null, ['class' => 'control-label'])
                            !!}
                            {!! Form::text('text_welcome', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                <div class="card text-dark bg-secondary border-dark shadow-lg mb-3">
                    <div class="card-header text-light text-uppercase bg-dark font-weight-bold"><i
                            class="fas fa-camera"></i> Book de fotos</div>
                    <div class="card-body py-5">
                        {!! Form::label('base64_image', 'Multiplas fotos (tamanho sugerido 800x533) ', null, ['class' =>
                        'control-label']) !!}
                        <div class="fileinput-new row" data-provides="fileinput">
                            <div class="col-sm-12 col-lg-10 col-xl-10 input-group">

                                <div class="form-control" data-trigger="fileinput">
                                    <i class="fas fa-file-image fileinput-exists"></i> <span
                                        class="fileinput-filename"></span>
                                </div>
                                <span class="input-group-addon btn btn-primary btn-file">
                                    <span class="fileinput-new">Escolha a foto</span>
                                    <span class="fileinput-exists">Troque a foto</span>
                                    {!! Form::file('base64_image[]', [
                                    'class' => $errors->has('base64_image') ? 'custom-file-input form-control
                                    is-invalid' : 'custom-file-input form-control',
                                    'id' => 'base64_image[]',
                                    'accept' => 'image/*',
                                    'multiple' => 'multiple'
                                    ]) !!}
                                    <span class="invalid-feedback">
                                        <strong>
                                            @if ($errors->has('base64_image'))
                                            {{ $errors->first('base64_image') }}
                                            @endif
                                        </strong>
                                    </span>
                                </span>
                                <a href="#" class="input-group-addon btn btn-danger fileinput-exists"
                                    data-dismiss="fileinput">Remova a foto</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card text-dark bg-secondary border-dark shadow-lg mb-3">
    <div class="card-header text-light text-uppercase bg-dark font-weight-bold"><i class="fas fa-address-card"></i>
        Informações Pessoais</div>
    <div class="card-body">


        <div class="card-body py-5 ">
            {!! Form::label('base64_photo_perfil', 'Foto do autor (tamanho sugerido 665x665)', null, ['class' =>
            'control-label']) !!}
            <div class="fileinput-new row" data-provides="fileinput">
                <div class="col-sm-12 col-lg-10 col-xl-10 input-group">

                    <div class="form-control" data-trigger="fileinput">
                        <i class="fas fa-file-image fileinput-exists"></i> <span class="fileinput-filename"></span>
                    </div>
                    <span class="input-group-addon btn btn-primary btn-file">
                        <span class="fileinput-new">Escolha a foto</span>
                        <span class="fileinput-exists">Troque a foto</span>
                        {!! Form::file('base64_photo_perfil', [
                        'class' => $errors->has('base64_photo_perfil') ? 'custom-file-input form-control is-invalid' :
                        'custom-file-input form-control',
                        'id' => 'base64_photo_perfil'
                        ]) !!}
                        <span class="invalid-feedback">
                            <strong>
                                @if ($errors->has('base64_photo_perfil'))
                                {{ $errors->first('base64_photo_perfil') }}
                                @endif
                            </strong>
                        </span>
                    </span>
                    <a href="#" class="input-group-addon btn btn-danger fileinput-exists"
                        data-dismiss="fileinput">Remova a foto</a>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12 col-lg-4 col-xl-4 mb-2">
                    {!! Form::label('name_perfil', 'Nome autor', null, ['class' => 'control-label']) !!}
                    {!! Form::text('name_perfil', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-12 col-lg-4 col-xl-4 mb-2">
                    {!! Form::label('text_perfil', 'Bibliografia', null, ['class' => 'control-label']) !!}
                    {!! Form::text('text_perfil', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
              
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-12">
    <div class="card text-dark bg-secondary border-dark shadow-lg mb-3">
        <div class="card-header text-light text-uppercase bg-dark font-weight-bold"><i
                class="fas fa-address-card"></i>Promoções </div>
        <div class="card-body py-5 ">
            {!! Form::label('base64_promocao1', 'Imagem da promoção 1 (tamanho sugerido 500x400)', null, ['class' =>
            'control-label']) !!}
            <div class="fileinput-new row" data-provides="fileinput">
                <div class="col-sm-12 col-lg-10 col-xl-10 input-group">

                    <div class="form-control" data-trigger="fileinput">
                        <i class="fas fa-file-image fileinput-exists"></i> <span class="fileinput-filename"></span>
                    </div>
                    <span class="input-group-addon btn btn-primary btn-file">
                        <span class="fileinput-new">Escolha a foto</span>
                        <span class="fileinput-exists">Troque a foto</span>
                        {!! Form::file('base64_promocao1', [
                        'class' => $errors->has('base64_promocao1') ? 'custom-file-input form-control is-invalid' :
                        'custom-file-input form-control',
                        'id' => 'base64_promocao1'
                        ]) !!}
                        <span class="invalid-feedback">
                            <strong>
                                @if ($errors->has('base64_promocao1'))
                                {{ $errors->first('base64_promocao1') }}
                                @endif
                            </strong>
                        </span>
                    </span>
                    <a href="#" class="input-group-addon btn btn-danger fileinput-exists"
                        data-dismiss="fileinput">Remova a foto</a>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12 col-lg-10">
                    {!! Form::label('description1', 'Descrição ', null, ['class' => 'control-label']) !!}
                    {!! Form::text('description1', null, ['class' => 'form-control']) !!}
                </div>

                <div class="card-body py-5 ">
                    {!! Form::label('base64_promocao2', 'Imagem da promoção 2 (tamanho sugerido 500x400)', null,
                    ['class' => 'control-label']) !!}
                    <div class="fileinput-new row" data-provides="fileinput">
                        <div class="col-sm-12 col-lg-10 col-xl-10 input-group">

                            <div class="form-control" data-trigger="fileinput">
                                <i class="fas fa-file-image fileinput-exists"></i> <span
                                    class="fileinput-filename"></span>
                            </div>
                            <span class="input-group-addon btn btn-primary btn-file">
                                <span class="fileinput-new">Escolha a foto</span>
                                <span class="fileinput-exists">Troque a foto</span>
                                {!! Form::file('base64_promocao2', [
                                'class' => $errors->has('base64_promocao2') ? 'custom-file-input form-control
                                is-invalid' : 'custom-file-input form-control',
                                'id' => 'base64_promocao2'
                                ]) !!}
                                <span class="invalid-feedback">
                                    <strong>
                                        @if ($errors->has('base64_promocao2'))
                                        {{ $errors->first('base64_promocao2') }}
                                        @endif
                                    </strong>
                                </span>
                            </span>
                            <a href="#" class="input-group-addon btn btn-danger fileinput-exists"
                                data-dismiss="fileinput">Remova a foto</a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-lg-10">
                            {!! Form::label('description2', 'Descrição ', null, ['class' => 'control-label']) !!}
                            {!! Form::text('description2', null, ['class' => 'form-control']) !!}
                        </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-lg-10">
                            {!! Form::label('name_perfil', 'Descrição ', null, ['class' => 'control-label']) !!}
                            {!! Form::text('name_perfil', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="card-body py-5 ">
                            {!! Form::label('base64_promocao3', 'Imagem da promoção 3 (tamanho sugerido 500x400)', null,
                            ['class' => 'control-label']) !!}
                            <div class="fileinput-new row" data-provides="fileinput">
                                <div class="col-sm-12 col-lg-10 col-xl-10 input-group">

                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="fas fa-file-image fileinput-exists"></i> <span
                                            class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-primary btn-file">
                                        <span class="fileinput-new">Escolha a foto</span>
                                        <span class="fileinput-exists">Troque a foto</span>
                                        {!! Form::file('base64_promocao2', [
                                        'class' => $errors->has('base64_promocao3') ? 'custom-file-input form-control
                                        is-invalid' : 'custom-file-input form-control',
                                        'id' => 'base64_promocao1'
                                        ]) !!}
                                        <span class="invalid-feedback">
                                            <strong>
                                                @if ($errors->has('base64_promocao3'))
                                                {{ $errors->first('base64_promocao3') }}
                                                @endif
                                            </strong>
                                        </span>
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-danger fileinput-exists"
                                        data-dismiss="fileinput">Remova a foto</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-lg-10">
                                    {!! Form::label('name_perfil', 'Descrição ', null, ['class' => 'control-label']) !!}
                                    {!! Form::text('name_perfil', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <div class="card text-dark bg-secondary border-dark shadow-lg mb-3">
        <div class="card-header text-light text-uppercase bg-dark font-weight-bold"><i class="fas fa-address-card"></i>
            Perguntas frequentes</div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-sm-12 col-lg-4 col-xl-4 mb-2">
                    {!! Form::label('question1', 'Pergunta 1 ', null, ['class' => 'control-label']) !!}
                    {!! Form::text('question1', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-12 col-lg-4 col-xl-4 mb-2">
                    {!! Form::label('answer1', 'Resposta', null, ['class' => 'control-label']) !!}
                    {!! Form::text('answer1', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-12 col-lg-4 col-xl-4 mb-2">
                    {!! Form::label('question2', 'Pergunta 2 ', null, ['class' => 'control-label']) !!}
                    {!! Form::text('question2', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-12 col-lg-4 col-xl-4 mb-2">
                    {!! Form::label('answer2', 'Resposta', null, ['class' => 'control-label']) !!}
                    {!! Form::text('answer2', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-12 col-lg-4 col-xl-4 mb-2">
                    {!! Form::label('question3', 'Pergunta 3 ', null, ['class' => 'control-label']) !!}
                    {!! Form::text('question3', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-12 col-lg-4 col-xl-4 mb-2">
                    {!! Form::label('answer3', 'Resposta', null, ['class' => 'control-label']) !!}
                    {!! Form::text('answer3', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<div class="text-right">
    <a href="javascript:history.go(-1)" class="btn btn-danger">Cancelar</a>
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    {{ Form::close() }}
</div>

@endsection