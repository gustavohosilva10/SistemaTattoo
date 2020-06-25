@extends('layouts.app')

@section('title', 'Contrato')
<!-- Scripts -->

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
                <legend> Regulamento do tatuador </legend>
                    <div id="summernote"id="text_contract"
                    name="text_contract">{{@$company->text_contract}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right">
                    <a href="javascript:history.go(-1)" class="btn btn-danger">Cancelar</a>
                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                </div>
    <script>
    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    </script>
    @endsection