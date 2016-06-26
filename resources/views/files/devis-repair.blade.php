@extends('template')

@section('special-action')
    <div class="col-lg-8"></div>
    <div class="col-lg-4">
        <div class="title-action">
            <a id="action-sendmail" href="" class="btn btn-default"><i class="fa fa-envelope"></i> Email </a>
            <a id="action-print" href="" class="btn btn-primary"><i class="fa fa-print"></i> Imprimer </a>
        </div>
    </div>
@stop

@section('content')

    <div id='toprint' class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInRight " style="    font-family: sans-serif;    padding-bottom: 0;">
                <div class="ibox-content p-xl my-page-h">
                    <table class="table-page">

                        <tr>
                            <td>
                                <table class="table-half-page border-right">

                                    <tr>
                                        <td>Tel: {{env('company_tel')}}  &nbsp;    Fax: {{env('company_fax')}}</td>
                                        <td align=right><strong>{{env('company_email')}}</strong></td>

                                    </tr>
                                    <tr>
                                        <td colspan=3 align=center><h1>{{env('company_name')}}</h1></td>
                                    </tr>
                                    <tr>
                                        <td colspan=3 align=center><h2>Devis</h2></td>

                                    </tr>
                                    <tr>
                                        <td>N° Reparation: </td>
                                        <td class="numrep"> <strong> @if($repair['type'] == 'REPAIR'){{$repair['id'].'R'.$repair['client_id']}} @else {{$repair['id'].'R'.$repair['client_id']}} @endif </strong></td>

                                        <td>Date In : {{$repair['created_at']}}</td>

                                    </tr>
                                    <tr>
                                        <td class="tddesc"><label class="labdesc" >Description:</label> <textarea name="" id="" cols="30" rows="7">{{$repair['client_report']}}</textarea></td>


                                        <td>
                                            <table class="tbaddress">
                                                <tbody>
                                                <tr>
                                                    <th>{{strtoupper($repair['client']['firstname']).' '.strtoupper($repair['client']['lastname'])}}</th>
                                                </tr>
                                                <tr>
                                                    <td> {{$repair['client']['street']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$repair['client']['postal_code']}}, {{$repair['client']['city']}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <table class="tbcoord">
                                                <tbody>
                                                <tr>
                                                    <th>Mobile:</th>
                                                    <td >{{$repair['client']['mobile']}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Bureau:</th>
                                                    <td>{{$repair['client']['office']}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Fax:</th>
                                                    <td>{{$repair['client']['fax']}}</td>
                                                </tr>
                                                <tr>
                                                    <th>TVA:</th>
                                                    <td>{{$repair['client']['vat']}}</td>

                                                </tr>
                                                </tbody>
                                            </table>

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <table class="tbdevice">
                                                <tbody>
                                                <tr>
                                                    <th>Modele</th>
                                                    <td>{{$repair['repair']['device']['modele']['name']}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Marque</th>
                                                    <td>{{$repair['repair']['device']['modele']['brand']['name']}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Categorie</th>
                                                    <td>{{$repair['repair']['device']['modele']['category']['name']}}</td>

                                                </tr>
                                                <tr>
                                                    <th>N° Serie</th>
                                                    <td>{{$repair['repair']['device']['serial_number']}}</td>

                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <table class="tbacc">

                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tdacompte">
                                            <label>Acompte</label> {{$repair['advance_amount']}}€
                                        </td>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td ></td>
                                    </tr>


                                </table>
                            </td>

                            <td>
                                <table class="table-half-page border-right">

                                    <tr>
                                        <td>Tel: {{env('company_tel')}}  &nbsp;    Fax: {{env('company_fax')}}</td>
                                        <td align=right><strong>{{env('company_email')}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan=3 align=center><h1>{{env('company_name')}}</h1></td>
                                    </tr>
                                    <tr>
                                        <td colspan=3 align=center><h2>Devis</h2></td>

                                    </tr>
                                    <tr>
                                        <td>N° Reparation: </td>
                                        <td class="numrep"> <strong> @if($repair['type'] == 'REPAIR'){{$repair['id'].'R'.$repair['client_id']}} @else {{$repair['id'].'R'.$repair['client_id']}} @endif </strong></td>
                                        <td>Date In : {{$repair['created_at']}}</td>

                                    </tr>
                                    <tr>
                                        <td class="tddesc" colspan=3><label class="labdescticket" >Rapport Client:</label> <textarea name="" id="" cols="60" rows="10">{{$repair['client_report']}}</textarea></td>

                                    </tr>
                                    <tr></tr>
                                    <tr>
                                        <td class="tddateout">
                                            <h2>
                                                <strong>Prière de nous communiquer votre décision dans les plus brefs délais.</strong>

                                            </h2>

                                        </td>
                                        <td colspan=2>
                                            <table class="tablefacturedetail">
                                                <tbody>
                                                <tr>
                                                    <th>Pieces:</th>
                                                    <td>{{ $repair['part_amount']  }}€</td>
                                                </tr>
                                                <tr>
                                                    <th>Main D'oeuvre</th>
                                                    <td>{{ $repair['labor_amount']  }}€</td>
                                                </tr>
                                                <tr>
                                                    <th>Deplacement</th>
                                                    <td>{{ $repair['shifting_amount']  }}€</td>

                                                </tr>
                                                <tr class="border-top">
                                                    <th>Total HTVA</th>
                                                    <td>{{ $repair['part_amount']+ $repair['labor_amount']+ $repair['shifting_amount']}}€</td>

                                                </tr>
                                                <tr>
                                                    <th>TVA</th>
                                                    <td>{{ (round($repair['labor_amount'] * ($repair['labor_vat'] /100),2)) +(round($repair['shifting_amount'] * ($repair['shifting_vat'] /100),2)) +(round($repair['part_amount'] * ($repair['part_vat'] /100),2))    }}€</td>

                                                </tr>
                                                <tr class="border-top">
                                                    <th>TOTAL TVAC</th>
                                                    <td>{{$repair['sum_amount']}}€</td>

                                                </tr>
                                                <tr>
                                                    <th>Acompte</th>
                                                    <td>{{$repair['advance_amount']}}€</td>

                                                </tr>
                                                <tr class="border-top">
                                                    <th>Solde à payer</th>
                                                    <td>{{$repair['sum_amount'] - $repair['advance_amount'] }}€</td>

                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <table class="tbacc">
                                            </table>
                                        </td>
                                    </tr>
                                    <tr >


                                    </tr>

                                    <tr>
                                        <td>
                                            <table class="stick-infos">
                                                <tr class="">
                                                    <td>
                                                        Ouvert du Lundi au Vendredi de 10h à 12h et de 13h à 18h.
                                                    </td>
                                                    <td>
                                                        <strong>FERME LE LUNDI</strong>
                                                    </td>
                                                </tr>
                                                <tr class="">
                                                    <td class="paddedbottom">
                                                        Samedi de 10h à 14h.
                                                    </td>
                                                </tr>
                                                <tr class="bordertop"><td>{{env('company_address')}} </td><td>{{env('company_tva')}} </td></tr>
                                                <tr><td>{{env('company_account')}} </td><td>{{env('company_label')}} </td></tr>
                                            </table>
                                        </td>
                                    </tr>

                                </table>
                            </td>


                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script.files')
    <script type="text/javascript">
        $(document ).ready(function() {

           $('#action-print' ).click(function(e) {
               e.preventDefault();
            $('#toprint' ).printThis();
//               var prtContent = document.getElementById("toprint");
//               var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
//               WinPrint.document.write(prtContent.innerHTML);
//               WinPrint.document.close();
//               WinPrint.focus();
//               WinPrint.print();
//               WinPrint.close();

           });

            $('#action-sendmail' ).click(function(e) {
                e.preventDefault();
                $.ajax({
                    'url' : '/devis/repair/{{$repair->id}}',
                    'data' : '_action=sendmail',
                    'dataType' : 'json',
                    'type' : 'GET',
                    'beforeSend' : function()
                    {
                         client = {!! json_encode($repair['client']) !!};
                        if(client.email.length < 10) {
                            $.gritter.add({
                                title: 'Attention, une erreur est survenue !',
                                text: "Email du client non valide  : "+client.email
                            });

                            return false;
                        }
                    },
                    'complete' : function(xhr) {
                        if(xhr.status == '200')
                        {
                            var response = JSON.parse( xhr.responseText );
                            if(response.status == 'success')
                            {
                                $.gritter.add({
                                    title: 'Succès !',
                                    text: 'Email envoyé à '+client.email
                                });

                            }
                            else
                            {
                                $.gritter.add({
                                    title: 'Attention, une erreur est survenue !',
                                    text: "Envoi email échoué !"
                                });
                            }
                            return false;
                        }
                        else {
                            $.gritter.add({
                                title: 'Attention, une erreur est survenue !',
                                text: "Erreur SwiftMail !"
                            });
                        }
                        return false;
                    }
                });
            });
        });
    </script>
@stop