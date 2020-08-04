
@extends('layouts.app')

@section('title', 'Inicio')
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
    
          <h1 class="jumbotron-heading">Inicio</h1>
          <form method="POST" action="/welcome/index" >
            @csrf
            <div class="form-group text-left">
              <label for="text_welcome_title" required>Titulo</label>
              <input class="form-control" id="text_welcome_title" name="text_welcome_title" rows="3" required></input>
            </div>
         
            <div class="form-group text-left">
              <label for="text_welcome"required>Texto de boas vindas</label>
              <input class="form-control" id="text_welcome" name="text_welcome" rows="3" required></input>
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
              <div class="card-body py-5">
      
            @foreach($welcome as $welcome)
                <div class="col-md-4">
                  <div class="card mb-4 shadow-sm">
                    <h4>Titulo : {{ $welcome->text_welcome_title }}</h4>
                    <h4>Texto : {{ $welcome->text_welcome }}</h4>
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <form action="/welcome/index/{{ $welcome->id }}" method="POST">
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

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>

@stop