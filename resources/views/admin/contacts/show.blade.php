@extends('layouts.app')

@section('title', $contact->present()->getFullName)

@section('content')
<!-- Scripts -->
<script type="text/javascript">
    $('#search').val('');
</script>
@include('layouts.scripts.validate')
@include('layouts.scripts.validate1')

<div class="container-fluid">
    <div class="col-12">

        @if (count($errors) > 0)
            <!-- Error Modal Form -->
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-times"></i> Desculpe!</strong> Mas ouve algum problema com o envio das informações, por favor verifique novamente o forumlário que acabou de enviar!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @include('flash::message')

        <div class="card text-dark bg-secondary border-dark shadow-lg mb-5">
            <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                <i class="fas fa-address-card"></i> Contato
                <a class="float-right" href="{{ route('admin.contacts.edit', $contact->id) }}" data-toggle="tooltip" data-placement="bottom" title="Editar contato">
                    <i class="fas fa-pen-square text-light" style="font-size:1.5em"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 text-center align-middle pt-5">
                        @if ($contact->avatar)
                            <img src="{{ url("storage/{$contact->avatar}") }}" alt="{{ $contact->present()->getFullName }}" class="img-fluid rounded-circle thumbnail-show" />
                        @else
                            @if ($contact->gender == 'M')
                                <i class="fas fa-male text-info" style="font-size:15em;""></i>
                            @elseif ($contact->gender == 'F')
                                <i class="fas fa-female text-danger" style="font-size:15em;"></i>
                            @else
                                <i class="fas fa-exclamation-triangle text-warning" style="font-size:15em;"></i>
                            @endif
                        @endif
                    </div>
                    <div class="col-md-9">
                        <h1 class="display-4">
                            {{ $contact->present()->getFullName }}
                            @if ($contact->agree)
                                <a data-toggle="tooltip" data-placement="bottom" title="Termos aceito">
                                    <i class="fas fa-check-square text-success"></i>
                                </a>
                            @else
                                <a data-toggle="tooltip" data-placement="bottom" title="Termos pendente">
                                    <i class="fas fa-window-close text-danger"></i>
                                </a>
                            @endif
                        </h1>
                        <h2>
                            @if($contact->present()->getBirthday('check'))
                                <i class="fas fa-birthday-cake" style="margin-right:8px;"></i>
                            @endif
                            {{ $contact->present()->getBirthday('age') }}
                        </h2>
                        <hr class="my-4">
                        <div class="lead row">
                            <div class="col-md-6">
                                @if ($contact->present()->getBirthday('string'))
                                    <dl class="mb-3">
                                        <dt><i class="fas fa-caret-right"></i> Data de Aniversário</dt>
                                        <dd>{{ $contact->present()->getBirthday('string') }}</dd>
                                    </dl>
                                @endif
                                @if ($contact->email)
                                    <dl class="mb-3">
                                        <dt><i class="fas fa-caret-right"></i> Email</dt>
                                        <dd>{{ $contact->email }}</dd>
                                    </dl>
                                @endif
                                @if ($contact->present()->getPhone(1) and $contact->present()->getPhone(2))
                                <dl class="mb-3">
                                    <dt><i class="fas fa-caret-right"></i> Telefones</dt>
                                    <dd>{{ $contact->present()->getPhone(1) }}</dd>
                                    <dd>{{ $contact->present()->getPhone(2) }}</dd>
                                </dl>
                                @elseif ($contact->present()->getPhone(1))
                                <dl class="mb-3">
                                    <dt><i class="fas fa-caret-right"></i> Telefone</dt>
                                    <dd>{{ $contact->present()->getPhone(1) }}</dd>
                                </dl>
                                @elseif ($contact->present()->getPhone(2))
                                <dl class="mb-3">
                                    <dt><i class="fas fa-caret-right"></i> Telefone</dt>
                                    <dd>{{ $contact->present()->phone(2) }}</dd>
                                </dl>
                                @else
                                @endif
                            </div>
                            <div class="col-md-6">
                                @if ($contact->present()->getAddress)
                                    <dl>
                                        <dt><i class="fas fa-caret-right"></i> Endereço</dt>
                                        <dd>{{ $contact->present()->getAddress }}</dd>
                                    </dl>
                                @endif
                                @if ($contact->present()->getRegister)
                                    <dl>
                                        <dt><i class="fas fa-caret-right"></i> Cadastro</dt>
                                        <dd>{{ $contact->present()->getRegister }}</dd>
                                    </dl>
                                @endif
                            </div>
                        </div>
                        @if($contact->anamnesis->isNotEmpty())
                            <hr class="my-4">
                            <h3><i class="fas fa-briefcase-medical"></i> Informações de Saúde</h3>
                            <div class="lead row">
                                <div class="col-md-6">
                                    <dl class="my-3">
                                        <dt><i class="fas fa-caret-right"></i> Tipo Sanguíneo</dt>
                                        <dd>{{ $contact->anamnesis[0]->description  }}</dd>
                                    </dl>
                                    <dl class="mb-3">
                                        <dt><i class="fas fa-caret-right"></i> Sofre alguma alergia?</dt>
                                        <dd>
                                            {{ $contact->anamnesis[1]->health ? 'Sim: ' . $contact->anamnesis[1]->description : 'Não'  }}
                                        </dd>
                                    </dl>
                                    <dl class="mb-3">
                                        <dt><i class="fas fa-caret-right"></i> Algum problema Dermatológico?</dt>
                                        <dd>
                                            {{ $contact->anamnesis[2]->health ? 'Sim: ' . $contact->anamnesis[2]->description : 'Não'  }}
                                        </dd>
                                    </dl>
                                    <dl class="mb-3">
                                        <dt><i class="fas fa-caret-right"></i> Portador de Hepatites?</dt>
                                        <dd>
                                            {{ $contact->anamnesis[3]->health ? 'Sim: ' . $contact->anamnesis[3]->description : 'Não'  }}
                                        </dd>
                                    </dl>
                                    <dl class="mb-3">
                                        <dt><i class="fas fa-caret-right"></i> Possuí Epilepsia?</dt>
                                        <dd>
                                            {{ $contact->anamnesis[4]->health ? 'Sim: ' . $contact->anamnesis[4]->description : 'Não'  }}
                                        </dd>
                                    </dl>
                                    <dl class="mb-3">
                                        <dt><i class="fas fa-caret-right"></i> Possuí alguma DST?</dt>
                                        <dd>
                                            {{ $contact->anamnesis[5]->health ? 'Sim: ' . $contact->anamnesis[5]->description : 'Não'  }}
                                        </dd>
                                    </dl>
                                </div>
                                <div class="col-md-6">
                                    <dl class="mb-3">
                                        <dt><i class="fas fa-caret-right"></i> Problema Cardíaco / Circulatório?</dt>
                                        <dd>
                                            {{ $contact->anamnesis[6]->health ? 'Sim: ' . $contact->anamnesis[6]->description : 'Não'  }}
                                        </dd>
                                    </dl>
                                    <dl class="mb-3">
                                        <dt><i class="fas fa-caret-right"></i> Usa algum Medicamento?</dt>
                                        <dd>
                                            {{ $contact->anamnesis[7]->health ? 'Sim: ' . $contact->anamnesis[7]->description : 'Não'  }}
                                        </dd>
                                    </dl>
                                    <dl class="mb-3">
                                        <dt><i class="fas fa-caret-right"></i> Fez / faz uso de drogas?</dt>
                                        <dd>
                                            {{ $contact->anamnesis[8]->health ? 'Sim: ' . $contact->anamnesis[8]->description : 'Não'  }}
                                        </dd>
                                    </dl>
                                    <dl class="mb-3">
                                        <dt><i class="fas fa-caret-right"></i> É Gestante?</dt>
                                        <dd>
                                            {{ $contact->anamnesis[9]->health ? 'Sim' : 'Não'  }}
                                        </dd>
                                    </dl>
                                    <dl class="mb-3">
                                        <dt><i class="fas fa-caret-right"></i> Se Alimentou / Hidratou bem?</dt>
                                        <dd>
                                            {{ $contact->anamnesis[10]->health ? 'Sim' : 'Não'  }}
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card text-dark bg-secondary border-dark shadow-lg mb-5">
                    <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                        <span class="float-left">
                            <i class="fas fa-anchor"></i> Tatuagens
                        </span>
                        <span class="float-right">
                            <a class="btn py-0 px-0" data-toggle="tooltip" data-placement="bottom" title="Adicionar Tatuagem">
                                <i class="fas fa-plus-square" data-toggle="modal" data-target="#tattooModalSave"></i>
                            </a>
                        </span>
                    </div>
                    @if (count($contact->tattoos))
                        <div class="card-body py-0 px-0 h-25">
                            <div class="table-responsive">
                                <table class="table table-sm table-borderless table-hover mb-0">
                                    <tbody>
                                        @foreach ($contact->tattoos->sortByDesc('date') as $tattoo)
                                            <tr>
                                                <td class="py-3">{{ $tattoo->name }}</td>
                                                <td class="py-3">{{ $tattoo->status }}</td>
                                                <td class="py-3">{{ $tattoo->present()->getDate }}</td>
                                                <td class="py-3">
                                                    <a href="{{ route('admin.contacts.tattoo.destroyTattoo', ['id' => $tattoo->id, 'contact' => $contact->id]) }}" data-toggle="tooltip" data-placement="bottom" title="Excluir Tatuagem">
                                                        <i class="fas fa-window-close text-danger" style="font-size:1.5em"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="card-body">
                            Nenhuma Tatuagem cadastrada!
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-dark bg-secondary border-dark shadow-lg mb-5">
                    <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
                        <span class="float-left">
                            <i class="fas fa-clock"></i> Sessões
                        </span>
                        <span class="float-right">
                            <a class="btn py-0 px-0" data-toggle="tooltip" data-placement="bottom" title="Adicionar Sessão">
                                <i class="fas fa-plus-square" data-toggle="modal" data-target="#sessionModalSave"></i>
                            </a>
                        </span>
                    </div>
                    @if (count($contact->sessions))
                        <div class="card-body py-0 px-0 h-25">
                            <div class="table-responsive">
                                <table class="table table-sm table-borderless table-hover mb-0">
                                    <tbody>
                                        @foreach ($contact->sessions->sortByDesc('date') as $session)
                                            <tr>
                                                <td class="py-3">{{ $session->present()->getDate }}</td>
                                                <td class="py-3">
                                                    <a href="{{ route('admin.contacts.session.destroySession', ['id' => $session->id, 'contact' => $contact->id]) }}" data-toggle="tooltip" data-placement="bottom" title="Excluir Sessão">
                                                        <i class="fas fa-window-close text-danger" style="font-size:1.5em"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="card-body">
                            Nenhuma Sessão cadastrada!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- TattooModalSave -->
<div class="modal fade" id="tattooModalSave" tabindex="-1" role="dialog" aria-labelledby="tattooModalSaveTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header card-header text-uppercase bg-primary font-weight-bold">
                <h5 class="modal-title text-light" id="exampleModalLongTitle"><i class="fas fa-anchor"></i> Salvar Tatuagem</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @include('admin.contacts.partials.tattooForm')
        </div>
    </div>
</div>

<!-- SessionModalSave -->
<div class="modal fade" id="sessionModalSave" tabindex="-1" role="dialog" aria-labelledby="sessionModalSaveTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header card-header text-uppercase bg-primary font-weight-bold">
                <h5 class="modal-title text-light" id="exampleModalLongTitle"><i class="fas fa-clock"></i> Sessões</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @include('admin.contacts.partials.sessionForm')
        </div>
    </div>
</div>

<!-- Scripts -->
@include('layouts.scripts.date')

@endsection
