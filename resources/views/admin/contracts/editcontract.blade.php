@extends('layouts.app')

@section('title', 'Contrato')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-dark bg-secondary border-dark shadow-lg mb-5">
                <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                    <i class="fas fa-file"></i> Defina o seu contrato
                </div>
                <div class="card-body">
                
                {{ Form::open(array('url' => '/contracts/editcontract/{{$contract->id}}')) }}
                   
                <div class="form-group col-md-12">
                    
                    <legend> Regulamento do tatuador </legend>
                    <textarea id="summernote" id="text_contract" name="text_contract">{{$contract->text_contract}}</textarea>
                    
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

    <script>
    $('#summernote').summernote({
        placeholder: 'Digite aqui',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    </script>
    <a href="https://wa.me/55{{ preg_replace('/[^0-9]/', '', trim($company->cellphone)) }}"
        class="whatsapp hvr-pulse" target="_blank"><i class="bx bxl-whatsapp"></i></a>
    @endsection