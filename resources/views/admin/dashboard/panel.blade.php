@extends('layouts.app')

@section('title', 'Painel')

@section('content')
<div class="container-fluid dashboard">
    <div class="row mb-4">
        <div class="col-md-6 mb-4">
            <div class="card text-dark border-dark shadow">
                <div class="card-header text-light text-uppercase bg-dark font-weight-bold">Aniversariantes do dia</div>
                @if ($data['birthdayToDay'])
                    <div class="card-body py-0 px-0">
                        <div class="table-responsive">
                            <table class="table table-sm table-borderless table-hover mb-0">
                                <tbody>
                                    @foreach ($data['birthdayToDay'] as $birthdayToDay)
                                        <tr>
                                            <td class="py-3">
                                                {{ $birthdayToDay->present()->getFullName }}
                                            </td>
                                            <td class="py-3">
                                                {{ $birthdayToDay->present()->getBirthDay('string') }}
                                            </td>
                                            <td class="py-3 align-middle">
                                                @if ($birthdayToDay->phone2)
                                                    <a class="text-danger" href="https://api.whatsapp.com/send?phone=55{{ $birthdayToDay->phone2 }}&text=Feliz aniversário {{ $birthdayToDay->first_name }}, tudo de bom para você, comemore seu aniversário fazendo uma nova tattoo e ganhe 10% de desconto." target="_blank" data-toggle="tooltip" data-placement="bottom" title="Envie uma mensagem de parabéns"><i class="fas fa-gift"></i> Dê os parabéns</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="card-body text-center">
                        Nenhum Aniversariante do dia!
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-dark border-dark shadow">
                <div class="card-header text-light text-uppercase bg-dark font-weight-bold">Aniversariantes do Mês</div>
                @if ($data['birthdayToWeek'])
                    <div class="card-body py-0 px-0">
                        <div class="table-responsive">
                            <table class="table table-sm table-borderless table-hover mb-0">
                                <tbody>
                                    @foreach ($data['birthdayToWeek'] as $birthdayToWeek)
                                        <tr>
                                            <td class="py-3">
                                                {{ $birthdayToWeek->present()->getFullName }}
                                            </td>
                                            <td class="py-3">
                                                {{ $birthdayToWeek->present()->getBirthDay('string') }}
                                            </td>
                                            <td class="py-3 align-middle">
                                                @if ($birthdayToWeek->phone2)
                                                    <a class="text-danger" href="https://api.whatsapp.com/send?phone=55{{ $birthdayToWeek->phone2 }}&text=Feliz aniversário {{ $birthdayToWeek->first_name }}, tudo de bom para você, comemore seu aniversário fazendo uma nova tattoo e ganhe 10% de desconto." target="_blank" data-toggle="tooltip" data-placement="bottom" title="Envie uma mensagem de parabéns"><i class="fas fa-gift"></i> Dê os parabéns</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="card-body text-center">
                        Nenhum Aniversariante na semana!
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card text-dark border-dark shadow">
                <div class="card-header text-light text-uppercase bg-dark font-weight-bold">Agenda do dia</div>
                @if ($data['sessionDay'])
                    <div class="card-body py-0 px-0">
                        <div class="table-responsive">
                            <table class="table table-sm table-borderless table-hover mb-0">
                                <tbody>
                                    @foreach ($data['sessionDay'] as $sessionDay)
                                        <tr>
                                            <td class="py-3">
                                                {{ $sessionDay->present()->getFullName }}<br />
                                                {{ $sessionDay->email }}
                                            </td>
                                            <td class="py-3">
                                                {{ $sessionDay->present()->getPhone(1) }}<br />
                                                {{ $sessionDay->present()->getPhone(2) }}
                                            </td>
                                            <td class="py-3 align-middle">
                                                {{ $sessionDay->sessions->last()->present()->getDate() }}
                                            </td>
                                            <td class="py-3 align-middle">
                                                @if ($sessionDay->phone2)
                                                    <a class="text-success" href="https://api.whatsapp.com/send?phone=55{{ $sessionDay->phone2 }}&text=Olá {{ $sessionDay->first_name }}, tudo bem? Tudo confirmado para nossa sessão de {{ $sessionDay->sessions->last()->present()->getDate() }}?" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Confirmar via Whatsapp"><i class="fab fa-whatsapp"></i> Confirmar</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="card-body text-center">
                        Nenhuma Sessão no dia!
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card text-dark border-dark shadow">
                <div class="card-header text-light text-uppercase bg-dark font-weight-bold">Agenda Semana</div>
                @if ($data['sessionWeek'])
                    <div class="card-body py-0 px-0">
                        <div class="table-responsive">
                            <table class="table table-sm table-borderless table-hover mb-0">
                                <tbody>
                                    @foreach ($data['sessionWeek'] as $sessionWeek)
                                        <tr>
                                            <td class="py-3">
                                                {{ $sessionWeek->present()->getFullName }}<br />
                                                {{ $sessionWeek->email }}
                                            </td>
                                            <td class="py-3">
                                                {{ $sessionWeek->present()->getPhone(1) }}<br />
                                                {{ $sessionWeek->present()->getPhone(2) }}
                                            </td>
                                            <td class="py-3 align-middle">
                                                {{ $sessionWeek->sessions->last()->present()->getDate() }}
                                            </td>
                                            <td class="py-3 align-middle">
                                                @if ($sessionWeek->phone2)
                                                    <a class="text-success" href="https://api.whatsapp.com/send?phone=55{{ $sessionWeek->phone2 }}&text=Olá {{ $sessionWeek->first_name }}, tudo bem? Tudo confirmado para nossa sessão de {{ $sessionWeek->sessions->last()->present()->getDate() }}?" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Confirmar via Whatsapp"><i class="fab fa-whatsapp"></i> Confirmar</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="card-body text-center">
                        Nenhuma Sessão na Semana!
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
