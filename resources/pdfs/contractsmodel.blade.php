@section('title')
    Contrato 
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

        <!-- DADOS DO CONTRATANTE -->
        <table cellspacing="0" cellpadding="0" class="table-round-corner">
            <tr class="bg_cinza">
                <th colspan=3>DADOS DO CLIENTE</th>
            </tr>
        </table>

        <div class="pessoal">
            <table cellspacing="0" cellpadding="0" class="table-round-corner">
                <tr>
                    <th valign="top">
                        <table cellspacing="0" cellpadding="0" >
                            <tr>
                                <td class="w_40"> Nome : </td>
                                <td> {{ $contact->first_name }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Sobrenome: </td>
                                <td> {{ $contact->last_name }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Nascimento: </td>
                                <td> {{ date('d/m/Y', strtotime($contact->birthday)) }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Gênero: </td>
                                <td > {{ $contact->gender }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> E-mail: </td>
                                <td> {{ $contact->email }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Telefone: </td>
                                <td > {{ $contact->phone1 }} </td>
                            </tr>
                            <tr>
                                <td class="w_40"> Celular: </td>
                                <td > {{ $contact->phone2 }} </td>
                            </tr>
                        </table>
                    </th>
                </div>
            </div>          
        </div>

        <table cellspacing="0" cellpadding="0" class="table-round-corner">
            <tr class="bg_cinza">
                <th colspan=3>CONTRATO</th>
            <p>{!!$contract->text_contract!!}</p>
            </tr>
        </table>
    
        <table cellspacing="0" cellpadding="0" style="position:absolute; bottom:100px;">
            <tr style="text-align:center">
                <td> _________________________________ </td>
                <td> _________________________________  </td>
            </tr>
            <tr style="text-align:center">
                <td style="font-size:12px;"> {{ $associated->name}} <br /> Assinatura responsável </td>
                <td style="font-size:12px;"> {{ $consult->name}} <br /> Assinatura do tatuador </td>
            </tr>
        </table>
    </div>
    <!-- FIM -->

</div>
@endsection
