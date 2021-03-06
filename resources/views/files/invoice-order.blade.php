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
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="ibox-content p-xl">
                    <div class="row">
                        <div class="col-sm-6">

                            <address>
                               <h3><strong>{{env("company_name")}}</strong><br></h3>
                                <div class="italic">{{env("company_label")}}</div>
                                <p class="adresse">{{env("company_address")}}</p>
                                <abbr title="Phone">Tel:</abbr> {{env("company_tel")}}<br>
                                <abbr title="Fax">Fax:</abbr> {{env("company_fax")}}<br>
                                <abbr title="Banque">BC:</abbr> {{env("company_account")}}<br>
                                <abbr title="TVA">TVA/BTW:</abbr> {{env("company_tva")}}<br>
                            </address>
                        </div>

                        <div class="col-sm-6 text-right">
                            <h4>Facture No.</h4>
                            <h4 class="text-navy">{{$invoice['number']}}</h4>
                            <p>
                                <span><strong>Date:</strong> {{$invoice['created_at']}} </span><br>
                            </p>
                            <address>
                                <h4><strong>{{strtoupper($order['client']['firstname']).' '.strtoupper($order['client']['lastname'])}}</strong></h4>
                                {{$order['client']['street']}}, <br>
                                {{$order['client']['postal_code']}}, {{$order['client']['city']}}<br>
                                <abbr title="telephone">TEL:</abbr> @if(isset($order['client']['mobile'])) {{$order['client']['mobile']}}@elseif(isset($order['client']['office'])) {{$order['client']['office']}} @endif
                                <br>
                                <abbr title="tva">TVA:</abbr> @if(isset($order['client']['vat'])) {{$order['client']['vat']}} @endif
                            </address>

                        </div>
                    </div>

                    <div class="table-responsive m-t">
                        <table class="table invoice-table">
                            <thead>
                            <tr>
                                <th>Articles</th>
                                <th>Quantité</th>
                                <th>Prix/u</th>
                                <th>Tva ({{$order['part_vat'].'%'}})</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order['order']['details'] as $detail)
                                <tr>
                                    <td><div><strong>{{$detail['article']['description']}}</strong></div>
                                        <small>{{$detail['article']['reference']}}</small></td>
                                    <td>{{$detail['quantity']}}</td>
                                    <td>{{$detail['price']}}</td>
                                    <td>{{$detail['price'] * $order['part_vat'] /100}}</td>
                                    <td>{{$detail['quantity'] * $detail['price'] * (1+ ($order['part_vat'] /100) )}}</td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div><!-- /table-responsive -->

                    <table class="table invoice-total">
                        <tbody>
                        <tr>
                            <td><strong>Total HTVA :</strong></td>
                            <td>€ {{ round($order['part_amount']  - ($order['part_amount'] *($order['part_vat'] /100)),2)  }}</td>
                        </tr>
                        <tr>
                            <td><strong>TOTAL TVA :</strong></td>
                            <td>€ {{round($order['part_amount'] * $order['part_vat'] /100,2)   }}</td>
                        </tr>
                        <tr>
                            <td><strong>Acompte :</strong></td>
                            <td> €{{$order['advance_amount']}}</td>
                        </tr>
                        <tr>
                            <td><strong>TOTAL TVAC :</strong></td>
                            <td>€ {{$order['part_amount']}}</td>
                        </tr>
                        </tbody>
                    </table>


                    <div class="well m-t"><strong>PAIEMENT :</strong> A LA RECEPTION DE LA FACTURE</div>
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
                    'url' : '/invoice/order/{{$order->id}}',
                    'data' : '_action=sendmail',
                    'dataType' : 'json',
                    'type' : 'GET',
                    'beforeSend' : function()
                    {
                         client = {!! json_encode($order['client']) !!};
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