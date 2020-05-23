@extends('layouts.app')

@section('title', 'Contatos')

@section('content')
<div class="container-fluid">
    <div class="row">
        @if (count($contacts))
            <div class="col-md-12">

                @include('flash::message')

                <div class="card text-dark bg-secondary border-dark shadow-lg mb-5">
                    <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                        <i class="fas fa-address-card"></i> Contatos
                    </div>
                    <div class="card-body py-0 px-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless table-hover mt-0 mb-0">
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr @if($contact->present()->getBirthday('check')) class="bg-dark text-light" @endif >
                                            <td scope="col" class="align-middle">{{ $contact->id }}</td>
                                            <td class="align-middle text-center">
                                                @if ($contact->avatar)
                                                    <img src="{{ url("storage/{$contact->avatar}") }}" alt="{{ $contact->present()->getFullName }}" class="img-fluid rounded-circle thumbnail-photo-list" />
                                                @else
                                                    @if ($contact->gender == 'M')
                                                        <i class="fas fa-male text-info" style="font-size:3em;"></i>
                                                    @elseif ($contact->gender == 'F')
                                                        <i class="fas fa-female text-danger" style="font-size:3em;"></i>
                                                    @else
                                                        <i class="fas fa-exclamation-triangle text-warning" style="font-size:3em;"></i>
                                                    @endif
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <dl>
                                                    <dt>
                                                        @if ($contact->agree)
                                                            <a data-toggle="tooltip" data-placement="bottom" title="Termos aceito">
                                                                <i class="fas fa-check-square text-success"></i>
                                                            </a>
                                                        @else
                                                            <a data-toggle="tooltip" data-placement="bottom" title="Termos pendente">
                                                                <i class="fas fa-window-close text-danger"></i>
                                                            </a>
                                                        @endif
                                                        {{ $contact->present()->getFullName }}
                                                        <br />
                                                        {{ $contact->present()->getBirthday('age') }}
                                                    </dt>
                                                    <dd>
                                                        {{ $contact->email }}
                                                    </dd>
                                                </dl>
                                            </td>
                                            <td class="align-middle">
                                                <dl>
                                                    @if ($contact->present()->getBirthday('check'))
                                                        <dt>
                                                            <i class="fas fa-birthday-cake" style="font-size:1.5em; margin-right:8px;"></i>  Aniversariante
                                                        </dt>
                                                    @endif
                                                    <dd>
                                                        {{ $contact->present()->getBirthday('string') }}
                                                    </dd>
                                                </dl>
                                            </td>
                                            <td class="align-middle">
                                                <dt>
                                                    <dd>{{ $contact->present()->getPhone(1) }}</dd>
                                                    <dd>{{ $contact->present()->getPhone(2) }}</dd>
                                                </dt>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('admin.contacts.show', $contact->id) }}" data-toggle="tooltip" data-placement="bottom" title="Ver contato">
                                                    <i class="fas fa-caret-square-right text-success" style="font-size:1.5em"></i>
                                                </a>
                                                <a href="{{ route('admin.contacts.edit', $contact->id) }}" data-toggle="tooltip" data-placement="bottom" title="Editar contato">
                                                    <i class="fas fa-pen-square text-warning" style="font-size:1.5em"></i>
                                                </a>
                                                <a href="{{ route('admin.contacts.destroy', ['id' => $contact->id, 'page' => $contacts->currentPage()]) }}" data-toggle="tooltip" data-placement="bottom" title="Excluir contato">
                                                    <i class="fas fa-window-close text-danger" style="font-size:1.5em"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        {!! $contacts->links() !!}
                    </div>
                    <div class="col-md-6 text-right mt-2">
                        <p>
                            Você está na página <strong>{{ $contacts->currentPage() }}</strong>
                             de <strong>{{ $contacts->lastPage() }}</strong>
                             exibindo <strong>{{ $contacts->count() }} Contatos</strong>
                             de <strong>{{ $contacts->total() }}</strong>.
                        </p>
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-12">
                <div class="card text-dark bg-secondary border-dark shadow-lg mb-5">
                    <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                        <i class="fas fa-address-card"></i> Contatos
                    </div>
                    <div class="card-body text-center">
                        Você não possuí contatos cadastrados!
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
