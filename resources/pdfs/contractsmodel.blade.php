@extends('pdfs.pdftemplate')
@section('title')
    Contrato PPV - {{ $contract->code }}
@endsection
@section('css')
    <style>
        @page {
            size: A4;
            margin: 0px 0px 0px 0px !important;
            padding: 0px 0px 0px 0px !important;
        }

        * {
            margin: 0px;
            padding: 0px;
        }

        html,
        body {
            font-family: 'Segoe UI', sans-serif;
            display: block;
            margin-left: 2px;
            padding: 0;
            background: #f5f5f5;
            color: #282828;
            font-style: normal;
            font-weight: normal;
            font-size: 16px;
        }

        .container-one {
            width: 204mm;
            height: 297mm;
            color: #000;
        }

        .container-two {
            width: 204mm;
            height: 291mm;
            color: #000;
            padding-top: 10px;
            padding-left: 10px;
        }

        .container-three {
            width: 204mm;
            height: 291mm;
            color: #000;
            padding-top: 10px;
            padding-left: 10px;
        }

        #page2 {
            background: url("/var/html/backoffice/public/images/contratos/page_2.png");
            background-repeat: no-repeat;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            border: none;
        }

        td, th {
            padding: 5px;
            width: 60%;
            font-weight: light;
            border: none;
            border-collapse: collapse;
        }

        .top {
            padding-top: 30px;
        }

        .top th {
            text-align: right;
            color: #000;
            background-color: #fff !important;
            border: 0px;
        }

        .dados_pessoais .dados_veiculo td,
        th {
            text-align: left;
            font-size: 0.8em;
        }

        .dados_plano .dados_veiculo td,
        th {
            text-align: left;
            font-size: 0.8em;
        }

        .dados_cobranca .dados_veiculo td,
        th {
            text-align: left;
            font-size: 0.8em;
        }

        .bg_cinza {
            color: #fff;
            background-color: @if($cms->color_default) {{ $cms->color_default }} @else #f26921 @endif !important;
        }

        .dados_veiculo td, th {
            padding: 5px;
        }

        .produtos td, th {
            padding: 5px;
        }

        .dados_pessoais {
            margin-bottom: 10px;
        }

        .dados_planos {
            margin-bottom: 10px;
        }

        .dados_cobranca {
            margin-bottom: 10px;
        }

        .dados_coberturas {
            margin-bottom: 10px;
        }

        .dados_veiculo {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .badge-light {
            color: #212529;
            background-color: #f1eeee;
        }

        hr {
            margin: 3px !important;
            color: #fff;
            border: 0px;
        }

        .logo_default {
            padding-top: 10px;
            padding-left: 10px
        }
        table td, table td * {
            vertical-align: top;
        }
        .w_40{
            width:30%;
            font-weight: bold;
        }
        .page_break {
            page-break-before: always;
        }
        .table-round-corner {
            border-spacing: 0px;
            padding: 0px;
            overflow:hidden;
            border: 0px;
            border-radius: 10px;
        }
        p{
            font-size: 11px;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
@endsection

@section('content')

<div class="container-two" id="page2">

        <table cellspacing="0" cellpadding="0">
            <tr>
                <td style="padding:0px;margin-left:0px;border:0px;border-color:#fff;"> 
                @if(!empty(isset($company->base64_img_company))) 
                    <img src="{{$company->base64_img_company}}" alt="PROTEÇÃO VEICULAR" style="float:left;min-height:70px !important;"/> 
                @else 
                    <img src="{{$company->address_site}}/{{$company->logo}}" alt="PROTEÇÃO VEICULAR" style="float:left;min-height:70px !important;"/> 
                @endif
                </td>
                <td style="float:left;">
                    <p style="font-size:10px;color:red;"> - Este é o seu token: {{ env('ID_CLIENTE').$contract->code }} </p>
                    <p style="font-size:10px;color:red;"> - Fique atento aos benefícios inclusos no plano </p>
                    <p style="font-size:10px;color:red;"> - Fique atento a data de vencimento e valor protegido </p>
                    <p style="font-size:10px;color:red;"> - Verifique com atenção as informações inseridas </p>
                    <p style="font-size:10px;color:red;"> - Dúvidas: {{$company->address_site}} </p>
                </td>
                <td style="text-align:center;height:90px">
                    <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(90)->margin(0)->generate($company->address_site.'/contratos/'.$contract->code.'.pdf')) }}" style="float:right" />
                </td>
            </tr>
        </table>

        <!-- DADOS DO CONTRATANTE -->
        <table cellspacing="0" cellpadding="0" class="table-round-corner">
            <tr class="bg_cinza">
                <th colspan=3>DADOS DO CONTRATANTE PPV</th>
            </tr>
        </table>

        <div class="dados_pessoais">
            <table cellspacing="0" cellpadding="0" class="table-round-corner">
                <tr>
                    <th valign="top">
                        <table cellspacing="0" cellpadding="0" >
                            <tr>
                                <td class="w_40"> Entidade: </td>
                                <td>
                                    @if($associated->type === 0)
                                        PESSOA FÍSICA
                                        @else
                                        PESSOA JURÍDICA
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Nome completo: </td>
                                <td> {{ $associated->name }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Telefone fixo: </td>
                                <td> {{ $associated->telephone1 }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> E-mail: </td>
                                <td> {{ $associated->email }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> CPF/CNPJ: </td>
                                <td>
                                    @if( $associated->cpf )
                                    {{ $associated->cpf }}
                                    @else
                                        {{ $associated->cnpj }}
                                        @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Nascimento: </td>
                                <td> {{ date('d/m/Y', strtotime($associated->birth_dt)) }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Gênero: </td>
                                <td > {{ $associated->genere }} </td>
                            </tr>
                        </table>
                    </th>
                    <th valign="top">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="w_40"> CNH: </td>
                                <td> {{ $associated->cnh }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Identidade (RG): </td>
                                <td> {{ $associated->rg }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Org. expedidor: </td>
                                <td> {{ $associated->organ_dt_expedition }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Dat. expedição: </td>
                                <td> {{ date('d/m/Y', strtotime($associated->rg_dt_expedition)) }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Data 1º CNH: </td>
                                <td> {{ date('d/m/Y', strtotime($associated->cnh_dt_fist)) }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Vencimento CNH: </td>
                                <td>
                                    {{ date('d/m/Y', strtotime($associated->cnh_dt_expire)) }} </td>
                                </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Cadastrado: </td>
                                <td> {{ date('d/m/Y H:i:s', strtotime($associated->created_at)) }} </td>
                            </tr>
                        </table>
                    </th>
                </tr>
            </table>
        </div>
        <!-- FIM -->

        <!-- DADOS DA COBRANÇA -->
        <table cellspacing="0" cellpadding="0" class="table-round-corner">
            <tr class="bg_cinza">
                <th colspan=3>DADOS DE COBRANÇA</th>
            </tr>
        </table>

        <div class="dados_cobranca">
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <th valign="top">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="w_40"> WhatsApp: </td>
                                <td> {{ $associated->cellphone2 }} </td>
                                <tr>
                                <td class="w_40"> CEP: </td>
                                <td> {{ $associated->cep }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Rua: </td>
                                <td> {{ $associated->street }}, {{ $associated->number }} </td>
                        </table>
                    </th>
                    <th valign="top">
                        <table cellspacing="0" cellpadding="0">
                            <tr style="border-bottom:1px solid #ccc">
                                <td class="w_40"> Bairro: </td>
                                <td> {{ $associated->neighborhood }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Cidade: </td>
                                <td> {{ $associated->city }} </td>
                            <tr>
                                <td class="w_40"> Estado: </td>
                                <td> {{ $associated->state }} </td>
                            </tr>
                        </table>
                    </th>
                </tr>
            </table>
        </div>
        <!-- FIM -->

        <!-- DADOS DO CONSULTOR -->
        <table cellspacing="0" cellpadding="0" class="table-round-corner">
            <tr class="bg_cinza">
                <th colspan=3>DADOS DO CONSULTOR</th>
            </tr>
        </table>

        <div class="dados_cobranca">
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <th valign="top">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="w_40"> Nome completo: </td>
                                <td> {{ $consult->name }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> WhatsApp: </td>
                                <td> {{ $consult->telephone }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> E-mail: </td>
                                <td> {{ $consult->email }} </td>
                            </tr>
                        </table>
                    </th>
                    <th valign="top">
                        <table cellspacing="0" cellpadding="0">
                            @if($consult->id_manager)
                            <tr>
                                <td class="w_40"> Nome gerente: </td>
                                <td> @php $user = \App\Models\User::find( $consult->id_manager ); @endphp {{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td class="w_40"> Reclamações: </td>
                                <td> {{ \App\Models\User::find( $consult->id_manager )->telephone }} </td>
                            </tr>
                            @else
                            <tr>
                                <td class="w_40"> Bairro: </td>
                                <td> {{ $consult->neighborhood }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Estado: </td>
                                <td> {{ $consult->state }} </td>
                            </tr>
                            @endif
                            <tr>
                                <td class="w_40"> Cidade: </td>
                                <td> {{ $consult->city }} </td>
                            </tr>
                        </table>
                    </th>
                </tr>
            </table>
        </div>
        <!-- FIM -->

        <!-- DADOS DO VEICULO -->
        <table cellspacing="0" cellpadding="0" class="table-round-corner">
            <tr class="bg_cinza">
                <th colspan=3>DADOS DO VEÍCULO PROTEGIDO</th>
            </tr>
        </table>

        <div class="dados_pessoais">
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <th valign="top">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="w_40"> Categoria: </td>
                                <td> {{ $vehicle->tag->name }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Chassi: </td>
                                <td> {{ $vehicle->chassi }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Placa: </td>
                                <td> {{ $vehicle->plate }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Renavam: </td>
                                <td> {{ $vehicle->renavam }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Fabricante: </td>
                                <td> {{ $vehicle->manufacturer }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Modelo </td>
                                <td> {{ $vehicle->model }} / {{ $vehicle->year_model }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Combustível: </td>
                                <td> {{ $vehicle->fuel }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Cor: </td>
                                <td> {{ $vehicle->color }} </td>
                            </tr>
                        </table>
                    </th>
                    <th valign="top">
                        <table cellspacing="0" cellpadding="0">
                            @if($company->display_value === 0)
                                <tr>
                                    <td class="w_40"> Valor FIPE: </td>
                                    <td> {{ 'R$ '.number_format($vehicle->value_fipe, 2, ',', '.') }} </td>
                                </tr>
                                <tr>
                                    <td class="w_40"> Protegido: </td>
                                    <td> {{ $vehicle->percent_protected }}% </td>
                                </tr>
                                <tr>
                                    <td class="w_40"> Valor proteg.: </td>
                                    <td> {{ 'R$ '.number_format($vehicle->value_protected, 2, ',', '.') }} </td>
                                </tr>
                            @endif
                            <tr>
                                <td class="w_40"> Nacionalidade: </td>
                                <td> {{ $vehicle->nationality }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> 2 motoristas: </td>
                                <td> {{ $vehicle->more_drive }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Leilão: </td>
                                <td> {{ $vehicle->auction }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Alugado: </td>
                                <td> {{ $vehicle->rental }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Alienado: </td>
                                <td> {{ $vehicle->aligned }} </td>
                            </tr>
                        </table>
                    </th>
                </tr>
            </table>
        </div>
        <!-- FIM -->

        <!-- DADOS DO PLANO -->
        <table cellspacing="0" cellpadding="0" class="table-round-corner">
            <tr class="bg_cinza">
                <th colspan=3>DADOS DO PLANO ESCOLHIDO</th>
            </tr>
        </table>

        <div class="dados_coberturas">
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <th valign="top">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="w_40"> Plano </td>
                                <td> {{ $contract->withPlan()->first()->name }} </td>
                            <tr>
                                <td class="w_40"> Descrição </td>
                                <td> {{ $contract->withPlan()->first()->description }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Condição de pag. </td>
                                <td> {{ $formpayment->name }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Descrição pag. </td>
                                <td> {{ $formpayment->description }} </td>
                            </tr>
                        </table>
                    </th>
                    <th valign="top">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="w_40"> Desconto </td>
                                <td> {{ $formpayment->percent_discount }}% </td>
                            <tr>
                                <td class="w_40"> Desconto extra </td>
                                <td> {{ 'R$ '.number_format($contract->applied_discount, 2, ',', '.') }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Mensalidade </td>
                                <td> {{ 'R$ '.number_format($contract->value_protect, 2, ',', '.') }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Dia de vencimento </td>
                                <td> {{ $contract->day_expires }} </td>
                            </tr>
                        </table>
                    </th>
                </tr>
            </table>
        </div>
        <!-- FIM -->

    <!-- DADOS DO PLANO -->
    <table cellspacing="0" cellpadding="0" style="padding-top:10px;" class="table-round-corner">
        <tr class="bg_cinza">
            <th colspan=3>COBERTURAS INCLUSAS NO PLANO</th>
        </tr>
    </table>

    <div class="dados_plano" style="height:50px;">
        <table cellspacing="0" cellpadding="0" class="table-round-corner">
            <tr>
                <th valign="top">
                    @forelse($beneficities as $beneficit)
                    <span style="font-size:12px;"> {{ $beneficit->name }} </span>
                    @empty
                    @endforelse
                </th>
            </tr>
        </table>
    </div>
    <!-- FIM -->

    <!-- DADOS DA OBSERVACAO -->
    <div style="padding-top:10px">
        <table cellspacing="0" cellpadding="0" class="table-round-corner">
            <tr class="bg_cinza">
                <th >OBSERVAÇÕES GERAIS DO CONTRATO</th>
            </tr>
            <tr>
                <th>
                    {{ $contract->obs_contract }}
                </th>
            </tr>
        </table>
    </div>
    <!-- FIM -->

    <!-- DADOS DOS ADICIONAIS -->
    <div class="produtos" style="padding-top:20px">
        <table cellspacing="0" cellpadding="0" class="table-round-corner">
            <tr class="bg_cinza">
                <th colspan=3>COBERTURAS ADICIONAIS ESCOLHIDAS</th>
            </tr>
            @forelse($productscontract as $productcontract)
            <tr>
                <th> {{ $productcontract->name }} </th>
                <th> {{ $productcontract->description }} </th>
                <td> {{ 'R$ '.number_format($productcontract->value, 2, ',', '.') }} </td>
            </tr>
            @empty
            <tr>
                <th colspan="3"> NENHUMA COBERTURA ADICIONAL FOI ESCOLHIDA </th>
            </tr>
            @endif
        </table>
    </div>
    <!-- FIM -->

    <!-- DADOS DA OBSERVACAO -->
    <div class="dados_obs" style="padding-top:20px">
        <table cellspacing="0" cellpadding="0" class="table-round-corner">
            <tr class="bg_cinza">
                <th>REGULAMENTO DA ASSOCIAÇÃO *Leia com atenção todos os detalhes abaixo</th>
            </tr>
        </table>
        <p style="font-size:11px;margin-top:10px;">{!! $company->text_contract !!} </p>
        @if($contract->signatureBase64)
        <table cellspacing="0" cellpadding="0" style="position:absolute; bottom:180px;margin-left:-400px;">
            <tr style="text-align:center">
                <td>
                    <img src='data:image/png;base64,{{$contract->signatureBase64}}' style="position:relative;width:200px" />
                </td>
            </tr>
        </table>
        @endif
        @if($consult->signature)
        <table cellspacing="0" cellpadding="0" style="position:absolute; bottom:110px;margin-right:-400px;">
            <tr style="text-align:center">
                <td>
                    <img src='data:image/png;base64,{{$consult->signature}}' style="position:relative;width:200px" />
                </td>
            </tr>
        </table>
        @endif
        <table cellspacing="0" cellpadding="0" style="position:absolute; bottom:100px;">
            <tr style="text-align:center">
                <td> _________________________________ </td>
                <td> _________________________________  </td>
            </tr>
            <tr style="text-align:center">
                <td style="font-size:12px;"> {{ $associated->name}} <br /> Associado responsável </td>
                <td style="font-size:12px;"> {{ $consult->name}} <br /> Consultor responsável </td>
            </tr>
        </table>
    </div>
    <!-- FIM -->

</div>
@endsection
