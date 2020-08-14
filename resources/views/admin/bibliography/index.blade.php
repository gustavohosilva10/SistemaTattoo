
@extends('layouts.app')

@section('title', 'Bibliografia')
@section('content')

<!doctype html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card text-dark bg-secondary border-dark shadow-lg mb-5">
                    <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                        <i class="fas fa-camera"></i> Configure sua Landing page
                    </div>
                    <div class="card-body py-5">
    
          <h1 class="jumbotron-heading">Bibliografia</h1>
          <form method="POST" action="/bibliography/index"name enctype="multipart/form-data">
            @csrf

            <div class="form-group text-left">
              <label for="name_perfil">Nome</label>
              <input class="form-control" id="name_perfil" name="name_perfil" rows="3"></input>
            </div>
            <div class="row">
            <div class="form-group  col-md-3 ">
              <label for="telephone_bibliography">Telefone (dd + numero)</label>
              <input class="form-control" id="telephone_bibliography" name="telephone_bibliography" rows="3" required maxlength="11"></input>
            </div>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="img_profile" name="img_profile">
              <label class="custom-file-label" for="img_profile">Escolha uma imagem (Tamanho recomendado 500X400)</label>
            </div>
            <div class="form-group text-left">
              <label for="text_perfil">Sobre</label>
              <input class="form-control" id="text_perfil" name="text_perfil" rows="3"></input>
            </div>
            <p>
              <button type="submit" class="btn btn-primary my-2">Enviar</button>
              <button type="reset" class="btn btn-danger">Cancelar</button>
            </p>
          </form>
        </div>
      </section>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card text-dark bg-secondary border-dark shadow-lg mb-5">
              <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                  <i class="fas fa-file"></i> Exibição
              </div>
              
              <div class="album py-5 bg-light">
                <div class="container">
                  <div class="row">
            @foreach($bibliography as $bibliography)
                <div class="col-md-4">
                  <div class="card mb-4 shadow-sm">
                    <p class="card-text">Nome : {{ $bibliography->name_perfil }}</p>
                    <img class="card-img-top figure-img img-fluid rounded" src="/storage/{{ $bibliography->img_profile }}">
                    <div class="card-body">
                    <p class="card-text">Telefone:{{ $bibliography->telephone_bibliography}}</p>
                      <p class="card-text">Sobre : {{ $bibliography->text_perfil }}</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <form action="/bibliography/index/{{ $bibliography->id }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-danger">Apagar</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
          </div>
        </div>
      </div>

    </main>

</body>
</html>

@stop