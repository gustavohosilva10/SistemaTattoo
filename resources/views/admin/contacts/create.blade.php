@extends('layouts.app')

@section('title', 'Novo Contato')

@section('content')
<!-- Scripts -->
@include('layouts.scripts.validate')

<div class="container">
    <div class="row">
        <div class="col-12">

            @include('flash::message')

            {!! Form::open([
                'method' => 'post',
                'route' => 'admin.contacts.store',
                'files' => true,
                'class' => 'form-horizontal',
                'id' => 'needs-validation',
                'novalidate' => ''
            ]) !!}
                @include('admin.contacts.partials.contactForm')
                <div class="text-right">
                    <a href="javascript:history.go(-1)" class="btn btn-danger">Cancelar</a>
                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
