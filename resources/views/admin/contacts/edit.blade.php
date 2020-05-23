@extends('layouts.app')

@section('title', 'Editar Contato')
<!-- Scripts -->
@include('layouts.scripts.validate')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @include('flash::message')

            {!! Form::model($contact, [
                'method' => 'put',
                'route' => ['admin.contacts.update', $contact->id],
                'files' => true,
                'class' => 'form-horizontal',
                'id' => 'needs-validation',
                'novalidate' => ''
            ]) !!}

                @include('admin.contacts.partials.contactForm')

                <div class="text-right">
                    <a href="javascript:history.go(-1)" class="btn btn-danger">Cancelar</a>
                    {!! Form::submit('Alterar', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
