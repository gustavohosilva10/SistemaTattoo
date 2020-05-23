@extends('layouts.app')

@section('title', 'Atualizar Contato')
<!-- Scripts -->
@include('layouts.scripts.validate')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('flash::message')

                {!! Form::model($contact, [
                    'method' => 'put',
                    'route' => ['client.update', $contact->id],
                    'files' => true,
                    'class' => 'form-horizontal',
                    'id' => 'needs-validation',
                    'novalidate' => ''
                ]) !!}

                @include('admin.contacts.partials.contactForm')

                <div class="text-right">
                    {!! Form::submit('Alterar', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
