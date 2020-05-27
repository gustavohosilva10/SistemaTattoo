@extends('pdfs.pdftemplate')
@section('title')
    Proposta Comercial - {{ $quote->code }} - {{ $company->name }}
@endsection
@section('css')
<style>

    @page {
        size: A4;
        margin: 0px 0px 0px 0px !important;
        padding: 0px 0px 0px 0px !important;
    }
    *{
        margin: 0px;
        padding: 0px;
    }

    body {
        font-family: 'Segoe UI', sans-serif;
        display: block;
        padding: 0;
        background: #f5f5f5;
        color: #282828;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
    }
    .container-one{
        width: 209.5mm;
        height: 297mm;
        color: #000;
    }

    .container-two{
        width: 209mm;
        height: 291mm;
        color: #000;
    }

    .container-three{
        width: 209.5mm;
        height: 291mm;
        color: #000;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        padding: 5px;
    }

    .top{
        margin-bottom: 10px;
    }

    .top th {
        text-align: right;
        color: #000;
        background-color: #fff !important;
        border: 0px;
    }

    .dados_pessoais .dados_veiculo td, th {
        text-align: left;
    }

    .bg_cinza {
        color: #fff;
        background-color: @if($cms['color_default']) {{ $cms['color_default'] }} @else #f26921 @endif !important;
    }

    .dados_pessoais{
        margin-top: 90px;
    }

    .dados_veiculo{
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .produtos{
        margin-top:30px;
    }

    .badge-light {
        color: #212529;
        background-color: #f1eeee;
    }

    hr{
        margin: 3px !important;
        color:#fff;
        border:0px;
    }

    .logo_default{
        padding-top:10px;
        padding-left:10px
    }

    .table-round-corner {
        border-spacing: 0px;
        padding: 0px;
        overflow:hidden;
        border: 0px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
                border-radius: 10px;
    }
</style>
@endsection

@section('content')
<div class="container-two" id="page2">
    <div style="padding:10px;">
        <div>
            <table>
                <tr style="height:90px !important;">
                    <th style="padding:0px;margin-left:0px;"> 
                    @if(!empty(isset($company->base64_img_company)))
                        <img src="{{$company->base64_img_company}}" alt="{{ $company->name }}" style="float:left;max-width:170px !important; min-height:90px !important;">
                    @else
                        <img src="{{$company->address_site}}/{{$company->logo}}" alt="{{ $company->name }}" style="float:left; max-width:170px !important; min-height:90px !important;">
                    @endif                    
                    </th>
                    <th>
                        <span style="float:right"> {{ $company->name }}
                        <br />
                        <small> Proposta válida por @if(!empty($company->day_expires_quote)) {{ $company->day_expires_quote }} @else 30 @endif dias <br />
                        Protocolo: {{ $quote->code }} </small>
                        </span>
                    </th>
                </tr>
            </table>
        </div>

        <div class="dados_pessoais table-round-corner">
            <table>
                <tr class="bg_cinza">
                    <td colspan="4" style="border-bottom:1px solid #ccc">DETALHES SOLICITANTE</td>
                </tr>
                <tr class="bg_cinza">
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Criada em</th>
                </tr>
                <tr>
                    <td style="width:30%">{{ $quote->name }}</td>
                    <td style="width:20%">{{ $quote->telephone }}</td>
                    <td style="width:25%;">{{ $quote->email }}</td>
                    <td style="width:30%;">{{ date('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td colspan="4"><br /></td>
                </tr>
            </table>
            <table class="table-round-corner">
                <tr class="bg_cinza">
                    <td colspan="4" style="border-bottom:1px solid #ccc">INFORMAÇÕES DO CONSULTOR</td>
                </tr>
                <tr class="bg_cinza">
                    <th>Nome</th>
                    <th>WhatsApp</th>
                    <th>E-mail</th>
                    <th>Cidade</th>
                </tr>
                <tr>
                    <td style="width:30%">{{ $quote->consult->name }}</td>
                    <td style="width:20%">{{ $quote->consult->telephone }}</td>
                    <td style="width:25%">{{ $quote->consult->email }}</td>
                    <td style="width:30%">{{ $quote->consult->city }}</td>
                </tr>
            </table>
        </div>

        <div class="dados_veiculo">

            <table>
                <tr>
                    <td style="padding:0px; vertical-align: baseline;">
                        <table class="table-round-corner" style="margin-top:10px;">
                            <tr class="bg_cinza">
                                <td style="border-bottom:1px solid #ccc"> DETALHES VEÍCULO </td>
                            </tr>
                            <tr>
                                <td><strong> Categoria: </strong>{{ $quote->type_vehicle }}</td>
                            </tr>
                        <tr>
                                <td><strong> Marca: </strong>{{ $quote->manufacturer }}</td>
                            </tr>
                            <tr>
                                <td><strong> Modelo: </strong> {{ $quote->model }}</td>
                            </tr>
                            <tr>
                                <td><strong> Ano/Combustível: </strong> {{ $quote->year }}</td>
                            </tr>
                            @if( ($company->hide_fipe_quote === 0) || ($quote->consult->hide_fipe_quote === 0) )
                                <tr>
                                    <td><strong> FIPE: </strong> @php setlocale(LC_MONETARY, 'pt_BR'); @endphp {{ 'R$ '.number_format($quote->value_fipe, 2, ',', '.') }} </td>
                                </tr>
                            @endif
                        </table>

                    </td>

                    <td style="padding:0px; vertical-align: baseline;">

                        <table class="table-round-corner" style="margin-left:10px;margin-top:10px;">
                            <tr class="bg_cinza">
                                <td> DETALHES DO PLANO ESCOLHIDO</td>
                            </tr>
                            <tr>
                                <td><strong>Plano:</strong> {{ $quote->plan->name }} </td>
                            </tr>
                            <tr>
                                <td><strong>Valor médio: </strong> {{ 'R$ '.number_format($quote->value_protection, 2, ',', '.') }} </td>
                            </tr>
                            @if(isset($quote->tx_additional))
                            <tr>
                                <td><strong>Taxa adicional: </strong> {{ 'R$ '.number_format($quote->tx_additional, 2, ',', '.') }} </td>
                            </tr>
                            @endif
                            @if($quote->consult->show_tx_adesion == 0)
                            <tr>
                                <td><strong>Taxa adesão: </strong>{{ isset($quote->tx_adesion) ? ('R$ ' . number_format($quote->tx_adesion, 2, ',', '.')) : $quote->tx_adesion_string }}</td>
                            </tr>
                            @endif
                            @if($quote->adesion_discount > 0)
                                <tr><td><strong>Desconto na adesão: </strong> {{ 'R$ '.number_format($quote->adesion_discount, 2, ',', '.') }} </td></tr>
                            @endif
                            @if($quote->pa_negotiated)
                            <tr>
                                <td><strong>Participação negociada: </strong> {{ 'R$ '.number_format($quote->pa_negotiated, 2, ',', '.') }} </td>
                            </tr>
                            @else
                                @php
                                    $pa = floatVal($quote->plan->co_participation / 100 * $quote->value_fipe);
                                    ($pa >= $quote->plan->min_participation) ? $pa = $pa : $pa = $quote->plan->min_participation;
                                @endphp
                                <tr><td><strong>Participação: </strong> @php setlocale(LC_MONETARY, 'pt_BR'); @endphp {{ 'R$ '.number_format($pa, 2, ',', '.') }} ({{ floatVal($quote->plan->co_participation) }}% FIPE) </th></tr>
                            @endif
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                        </table>

                    </td>
                </tr>
                </table>

        </div>

        <div>
            <table class="table-round-corner">
                <tr class="bg_cinza">
                    <td>COBERTURAS INCLUSAS NO PLANO </td>
                </tr>
                <tr>
                    <td style="tex-align:center;padding-left:0px !important;padding-top:10px !important;">
                        <div style="display:none">{{ $teste = 0 }} </div>
                            @forelse($quote->plan->beneficities as $beneficities)
                                <span style="border-radius:30px !important">
                                    <span style="font-size:12px;">{{ $beneficities->name}}</span>
                                </span>
                                <div style="display:none">
                                    {{ $teste++ }}
                                </div>
                                @empty
                            @endforelse
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="produtos">
            <table class="table-round-corner">
                <tr class="bg_cinza">
                    <td colspan="3">COBERTURAS ADICIONAIS SELECIONADAS</td>
                </tr>
                @forelse ($quote->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ 'R$ '.number_format($product->value, 2, ',', '.') }} </td>
                    </tr>
                @empty
                    <td colspan=3> NENHUMA COBERTURA ADICIONAL SELECIONADA</td>
                @endforelse
            </table>
        </div>
    </div>
</div>
@endsection
