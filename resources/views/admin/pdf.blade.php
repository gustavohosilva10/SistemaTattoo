<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrato</title>
</head>
    <style>
      
        * {
            margin: 5px;
            padding: 0px;
            table-layout:fixed;
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
            color: #000;
        }
        p{
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
            word-wrap:break-word;
        }
    </style>

        <table cellspacing="0" cellpadding="0" class="table-round-corner" id="cliente" style="background-color: #000;">
            <tr>
                <th colspan=3 id="cliente" style="color: #fff">DADOS DO CLIENTE</th>

            </tr>
        </table>
        
        <div class="pessoal">
            <table cellspacing="0" cellpadding="0" class="table-round-corner">
                <tr>
                    <th valign="top">
                        <table cellspacing="0" cellpadding="0" >
                            <tr>
                                <td class="w_40"> Nome : </td>
                                <td> {{!! $contact->first_name !!}} </td>
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


        <table cellspacing="0" cellpadding="0" class="table-round-corner" style="margin-top:50px; background-color: #000;">
            <tr class="bg_cinza">
                <th colspan=3  style="color: #fff">CONTRATO</th>
                <p style="  word-wrap: break-word;">{!!$contract->text_contract!!}</p>
            </tr>
        </table>
    
        <table cellspacing="0" cellpadding="0" style="position:absolute; bottom:100px;">
            <tr style="text-align:center">
                <td> _________________________________ </td>
                <td> _________________________________  </td>
            </tr>
            <tr style="text-align:center">
                <td style="font-size:12px;"> <br /> Assinatura responsável </td>
                <td style="font-size:12px;">  <br /> Assinatura do tatuador </td>
            </tr>

</body>
</html>