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
        <div class="wrapper wrapper-content animated fadeInRight " style="    padding-bottom: 0;">
            <div class="ibox-content p-xl my-page">
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
                        <h4>Facture No. <div class="text-navy">{{$invoice['number']}}</div></h4>
                        <p>
                            <span><strong>Date:</strong> {{$invoice['created_at']}} </span><br>
                        </p>
                        <address>
                            <h4><strong>{{strtoupper($repair['client']['firstname']).' '.strtoupper($repair['client']['lastname'])}}</strong></h4>
                            {{$repair['client']['street']}}, <br>
                            {{$repair['client']['postal_code']}}, {{$repair['client']['city']}}<br>
                            <abbr title="telephone">TEL:</abbr> @if(isset($repair['client']['mobile'])) {{$repair['client']['mobile']}}@elseif(isset($repair['client']['office'])) {{$repair['client']['office']}} @endif
                            <br>
                            <abbr title="tva">TVA:</abbr> @if(isset($repair['client']['vat'])) {{$repair['client']['vat']}} @endif
                        </address>

                    </div>
                </div>


                <table class="table-principal">
                    <thead>

                    <th></th>
                    <th></th>

                    </thead>
                    <tbody>

                    <tr>
                        <td>
                            <table class="table-a">
                                <tbody>
                                <tr>
                                    <th>#Fiche</th>
                                    <th class="text-navy"> <strong>@if($repair['type'] == 'REPAIR'){{$repair['id'].'R'.$repair['client_id']}} @else {{$repair['id'].'R'.$repair['client_id']}} @endif</strong></th>
                                </tr>
                                <tr>
                                    <th>Modele</th>
                                    <th>{{$repair['repair']['device']['modele']['name']}}</th>
                                </tr>
                                <tr>
                                    <th>Marque</th>
                                    <th>{{$repair['repair']['device']['modele']['brand']['name']}}</th>
                                </tr>
                                <tr>
                                    <th>Categorie</th>
                                    <th>{{$repair['repair']['device']['modele']['category']['name']}}</th>

                                </tr>
                                <tr>
                                    <th>N° Serie</th>
                                    <th>{{$repair['repair']['device']['serial_number']}}</th>

                                </tr>
                                </tbody>
                            </table>
                        </td>
                        <td class="td-rapport">
                            <label class="label-rapport">Rapport Client:</label>
                            <textarea class="" id="" cols="50" rows="10">{{$repair['client_report']}}</textarea>

                        </td>
                    </tr>


                    </tbody>
                </table>


                <table class="table-b">

                    <tbody>
                    <tr>
                        <td><strong>Acompte</strong></td>
                        <td>{{$repair["advance_amount"]}}</td>
                    </tr>
                    <tr>
                        <td><strong>Deplacement :</strong></td>
                        <td>€ {{ $repair['shifting_amount']  }}</td>
                        <td><strong>TVA ({{$repair['shifting_vat']}}%) :</strong></td>
                        <td>€ {{ round($repair['shifting_amount'] * ($repair['shifting_vat'] /100),2)  }}</td>
                        <td><strong>TVAC :</strong></td>
                        <td>€ {{ round($repair['shifting_amount']  * (1 +($repair['shifting_vat'] /100)),2)  }}</td>
                    </tr>
                    <tr>
                        <td><strong>Main d'oeuvre</strong></td>
                        <td>€ {{ $repair['labor_amount']  }}</td>
                        <td><strong>TVA ({{$repair['labor_vat']}}%) :</strong></td>
                        <td>€ {{ round($repair['labor_amount'] * ($repair['labor_vat'] /100),2)  }}</td>
                        <td><strong>TVAC :</strong></td>
                        <td>€ {{ round($repair['labor_amount']  * (1 +($repair['labor_vat'] /100)),2)  }}</td>
                    </tr>
                    <tr>
                        <td><strong>Piece</strong></td>
                        <td>€ {{ $repair['part_amount']  }}</td>
                        <td><strong>TVA ({{$repair['part_vat']}}%) :</strong></td>
                        <td>€ {{ round($repair['part_amount'] * ($repair['part_vat'] /100),2)  }}</td>
                        <td><strong>TVAC :</strong></td>
                        <td>€ {{ round($repair['part_amount']  * (1 +($repair['part_vat'] /100)),2)  }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>TOTAL TVAC :</strong></td>
                        <td>€ {{$repair['sum_amount']}}</td>
                    </tr>
                    </tbody>
                </table>

                <div class="well m-t terme"><strong>PAIEMENT :</strong> A LA RECEPTION DE LA FACTURE</div>
                <table class="table-open">
                    <tbody>
                    <tr>
                        <td>
                            Ouvert du Lundi au Vendredi de 10h à 12h et de 13h à 18h.
                        </td>
                        <td>
                            FERME LE LUNDI
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Samedi de 10h à 14h.
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>