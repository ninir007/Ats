<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link media="all" href="{{url('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link media="all" href="/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr media="all" style -->
    <link media="all" href="/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- FooTable media="all" -->
    <link media="all" href="/css/plugins/footable/footable.core.css" rel="stylesheet">
    <!-- Chosen media="all" -->
    <link media="all" href="/css/plugins/chosen/chosen.css" rel="stylesheet">
    <!-- Gritter media="all" -->
    <link media="all" href="/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link media="all" href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link media="all" href="/css/animate.css" rel="stylesheet">
    <link media="all" href="{{url('/css/style.css')}}" rel="stylesheet">

    <!-- Data media="all" Tables -->
    <link media="all" href="/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link media="all" href="/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link media="all" href="/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <!-- ATS media="all" Custom -->
    <link media="all" href="/css/ats.css" rel="stylesheet">
</head>
<body>
<div id='toprint' class="row">

    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="ibox-content p-lg">
                <div class="row">
                    <div class="enligne col-lg-12 center" >
                        <div class="col-lg-4 enligne"><abbr class="enligne" >Tel:</abbr> {{env("company_tel")}}</div>
                        <div class="col-lg-4 enligne"><abbr class="enligne" >Fax:</abbr> {{env("company_fax")}}</div>
                        <div class="col-lg-4 pull-right"><strong>{{env("company_email")}}</strong></div>
                    </div>
                    <div  class="col-lg-12">
                        <h2 class="center"><strong>{{env("company_name")}}</strong><br></h2>
                        <h3 class="center">Bon de commande</h3>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">

                        <h3>Fiche No. {{$order['id'].'O'.$order['client']['id']}}</h3>

                    </div>


                    <div class="col-sm-6 text-right">
                        <p>
                            <span><strong>Date in:</strong> {{$order['created_at']}} </span><br>
                        </p>
                        <address>
                            <h4><strong>{{strtoupper($order['client']['firstname']).' '.strtoupper($order['client']['lastname'])}}</strong></h4>
                            {{$order['client']['street']}}, <br>
                            {{$order['client']['postal_code']}}, {{$order['client']['city']}}<br>
                            <abbr>TEL:</abbr> @if(isset($order['client']['mobile'])) {{$order['client']['mobile']}}@elseif(isset($order['client']['office'])) {{$order['client']['office']}} @endif
                            <br>
                            <abbr>TVA:</abbr> @if(isset($order['client']['vat'])) {{$order['client']['vat']}} @endif
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


                <div class="well m-t"><div class="text-left">Conditions générales au Comptoire</div> </div>
                <div class="text-right"><div>Ouvert du mardi au vendredi de 10h à 12h et de 13h à 18h.</div><h3><strong>FERME LE LUNDI</strong></h3></div>
                <div class="hr-line-solid"></div>
                <div class="enligne">
                    <div class="text-left enligne">
                        <div class="italic">{{env("company_label")}}</div>
                        <p class="adresse">{{env("company_address")}}</p>
                    </div>
                    <div class="text-right enligne">
                        <abbr>BC:</abbr> {{env("company_account")}}<br>
                        <abbr>TVA/BTW:</abbr> {{env("company_tva")}}
                    </div>
                </div>

                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>