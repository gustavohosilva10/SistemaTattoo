
@extends('layouts.app')

@section('title', 'Promoções')
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
    
          <h1 class="jumbotron-heading">Promoções</h1>
          <form method="POST" action="/postes/index" enctype="multipart/form-data">
            @csrf
            <div class="form-group text-left">
              <label for="desciption_promotion" required>Descrição</label>
              <input type="text" class="form-control" id="desciption_promotion" name="desciption_promotion"  required></textarea>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="arquivo" name="arquivo" required>
              <label class="custom-file-label" id="arquivo" for="arquivo" >Escolha uma imagem (Tamanho recomendado 500X400)</label>
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
            @foreach($posts as $post)
                <div class="col-md-4">
                  <div class="card mb-4 shadow-sm">
                    <img class="card-img-top figure-img img-fluid rounded" src="/storage/{{ $post->arquivo }}">
                    <div class="card-body">
                      <p class="card-text">Descrição: {{ $post->desciption_promotion }}</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <!--button type="button" class="btn btn-sm btn-outline-secondary">Download</button-->
                          <a type="button" class="btn btn-primary" href="/download/{{$post->id}}">Download</a>
                          <form action="/postes/index/{{ $post->id }}" method="POST">
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