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
</body>
</html>