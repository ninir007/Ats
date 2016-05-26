@extends('template')

@section('content')
    <div class="row">
        <div class="col-lg-5">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Client</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link" id="btn_collapse_formsearch">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <form id="formClient" role="form" autocomplete="off">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control input-sm" value=" {{$client->LastName.' '. $client->FirstName}}" autocomplete="off" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">%</span>
                                        <input type="text" class="form-control input-sm " value="{{$client->Tva}}" placeholder="TVA" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope-square"></i></span>
                                        <input type="text" class="form-control input-sm" value="{{$client->Email}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <div class="input-group">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
                                        <input type="text" class="form-control input-sm " placeholder="Mobile" value="{{$client->Mobile}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                        <input type="text" class="form-control input-sm " placeholder="Bureau"  value="{{$client->Office}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-fax"></i></span>
                                        <input type="text" class="form-control input-sm " placeholder="Fax"  value="{{$client->Fax}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <div class="input-group">
                                        <textarea rows="5" cols="50" placeholder="Adresse" disabled>{{ $client->Address }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="hidden" class="form-control input-sm" name="client_id" value="{{$client->id}}" disabled>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-repair"> Réparation Appareil</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-command"> Commande Client</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab-repair" class="tab-pane active">
                        <div class="panel-body">
                            <div class="row">
                                <div class="tabs-container">
                                    <form id="formDevice" method="post" autocomplete="off" role="form">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <select name="device_id" data-placeholder="Numéro de serie" id="device_select" style="width:350px;" required >
                                                        @if(isset($devices))
                                                            <option value=""></option>
                                                            @foreach($devices as $device)
                                                                <option value="{{ $device->id }}" data-modeleid="{{ $device->model_id }}" data-desc="{{ $device->description }}" data-purchased="{{ $device->purchased_at }}" > {{ $device->serial_number }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Modéle</label>
                                                <button type="button" data-toggle="modal" data-target="#modalNewModel" class="btn btn-outline btn-xs btn-primary" style="margin-left: 5px;margin-bottom: 5px;">+</button>

                                                <select name="model_id" id="model_select" class="form-control lockable" required>
                                                    <option value="" selected disabled="">Modéles</option>
                                                    @if(isset($modeles))
                                                        @foreach($modeles as $mod)
                                                            <option value="{{ $mod->id }}" data-cat="{{$mod->category->name}}" data-brand="{{$mod->brand->name}}"> {{ $mod->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                            <div class="col-lg-8">
                                                <div class="hr-line-dashed"></div>
                                                <div class="form-group">
                                                    <label>Description </label>
                                                    <textarea rows="4" cols="20" class="form-control lockable" name="description" id="description_device"></textarea>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Accessoires ?</label>
                                                        <div data-toggle="buttons">
                                                            <label class="btn btn-outline btn-info btn-circle dim "><input type="radio" name="accessory" value="1"><i class="fa fa-check"></i></label>
                                                            <label class="btn btn-outline btn-danger btn-circle dim "><input type="radio" name="accessory" value="0" checked="checked"><i class="fa fa-times"></i></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group" id="data_3">
                                                        <label>Date Achat</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" class="form-control lockable" name="purchased_at" value="" id="purchaseddevice">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-lg-4">

                                                <div class="form-group">
                                                    <label>Categorie</label>
                                                    <div class="input-group date">
                                                        <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>
                                                        <input type="text" id="categorie" class="form-control" value="" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Marque</label>
                                                    <div class="input-group date">
                                                        <span class="input-group-addon"><i class="fa fa-television"></i></span>
                                                        <input type="text" id="marque" class="form-control" value="" disabled>
                                                    </div>
                                                </div>

                                                <div class="form-group">

                                                    <div class="input-group date">
                                                      <!--  <button type="submit" id="validation-device-btn" class="btn btn-w-m btn-primary tourne"><i class="fa fa-refresh"></i> Valider</button>
                                                      -->
                                                        <button type="submit" id="submitCreationBtn" class="btn btn-w-m btn-primary hidden tourne"><i class="fa fa-refresh" style=""></i> Créer</button>
                                                    </div>
                                                </div>
                                            </div>

                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-command" class="tab-pane">
                        <div class="panel-body">
                            <span id="orderError" class="label label-danger" style="display: none;">Erreur encodage</span>
                            <div id="order-setter" class="row">

                                <form id="formOrder" method="post" autocomplete="off" role="form">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="control-label" for="supplier">Fournisseur</label>
                                            <select class="form-control" name="supplier" data-placeholder="Fournisseur" id="supplier-sel" required >
                                                @if(isset($suppliers))
                                                    <option value="" disabled selected></option>
                                                    @foreach($suppliers as $supp)
                                                        <option value="{{ $supp->id }}"> {{ $supp->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="control-label" for="article">Article</label>
                                            <select class="form-control" name="article" data-placeholder="Article" id="article-sel" required >
                                                @if(isset($articles))
                                                    <option value="" disabled selected></option>
                                                    @foreach($articles as $article)
                                                        <option value="{{ $article->id }}"> {{ $article->reference }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="control-label" for="price">Prix</label>
                                            <input type="number" min="0" id="price" name="price" value="" placeholder="Prix" class="form-control order-clear">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="control-label" for="quantity">Quantité</label>
                                            <input type="number" min="1" id="quantity" name="quantity" value="" placeholder="Quantité" class="form-control order-clear">
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="control-label" for="quantity">Ajouter</label>
                                            <a id="order-list-add" href="" class="form-control btn btn-white btn-bitbucket">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="row">

                                <div class="hr-line-dashed"></div>
                                <div class="tabs-container">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Fournisseur</th>
                                            <th>Article</th>
                                            <th>Prix</th>
                                            <th>Qte</th>
                                            <th><i class="fa fa-trash-o"></i></th>
                                        </tr>
                                        </thead>
                                        <tbody id="order-list-body">


                                        </tbody>
                                    </table>
                                </div>
                                <button id="btn-order-validation" class="btn btn-w-m btn-primary tourne" style="display: none"><i class="fa fa-refresh" ></i> Valider</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row m-t-lg">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Details</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link" >
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form id="formcreatefile" role="form" autocomplete="off">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Rapport Interne </label>
                                    <textarea rows="4" cols="20" class="form-control" name="intern_report"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Rapport Client </label>
                                    <textarea rows="4" cols="20" class="form-control" name="client_report"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Technicien attribué </label>

                                    <select name="user_id" id="select_user" required>
                                        <option value="" selected disabled="">Tech</option>
                                        @if(isset($users))
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" > {{ $user->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <input type="hidden" value="REPAIR" id="type-file" name="type">
                            <input type="hidden" value="{{$client->id}}" name="client_id">
                            <button type="submit" id="create_file" class="btn btn-w-m btn-primary pull-right"> Créer</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>


    <div id="modalNewModel" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" role="form" autocomplete="off" id="formAddModel">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Ajouter un nouveau modéle</h4>
                    </div>
                    <div class="modal-body">
                        <div id="returnmsgmodele"></div>
                        <div class="form-group">
                            <label>Nom :</label>
                            <input id="modalinputaddmodele" type="text" class="form-control" name="name" required autofocus >
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <label>Marque :</label>
                                <div class="form-group">
                                    <select name="brand_id" id="brand_model" class="form-control input-sm">
                                        <option value="0" selected disabled="">--</option>
                                        @if(isset($brands))
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <label>Categorie :</label>
                                <div class="form-group">
                                    <select name="category_id" id="category_model" class="form-control input-sm">
                                        <option value="0" selected="" disabled="">--</option>
                                        @if(isset($categories))
                                            @foreach($categories as $cate)
                                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" id="btnSubmitFormAddModel" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop



@section('script.files')
    <script>
        setSmartSelectionDevice();

        $(document).ready(function(){
            disableInputs();
            handlePurchasedCalendar();
            handleSelectModele();
            handleSelectDevice();
            handleOrderCart();
            handleNewModel();
            deleteOrder();



            $('#submitCreationBtn').click(function(e) {
                e.preventDefault();

                handleSubmitFormAddDevice()
            });

            $('#formcreatefile').submit(function(){
                handleSubmitFormAddFile();
                return false;
            });

            $('#btn-order-validation' ).click(function(e) {
                var orderobject = {orders: []};
                e.preventDefault();

               var orderNodes =  $(".order-node" );
                if(orderNodes.length > 0) {
                    $.each(orderNodes, function(key, data) {
                        var details =  $(data ).children();
                        var fourn = $(details[0] ).data("supplier");
                        var arti = $(details[1] ).data("article");
                        var prix = $(details[2] ).data("price");
                        var qte = $(details[3] ).data("qte");

                        orderobject.orders.push({ supplier_id: fourn, article_id: arti, price: prix, quantity: qte });
                    })
                }

                console.log(orderobject);

                handleSubmitOrder(orderobject)

            });
        });

        function handleNewModel()
        {
            $('#formAddModel' ).submit(function(e){
                e.preventDefault();

                var inpt = $.trim($("#modalinputaddmodele").val());
                var brand = $( "#brand_model" ).val();
                var brand_text = $( "#brand_model option:selected" ).text();
                var category = $( "#category_model" ).val();
                var category_text = $( "#category_model option:selected" ).text();

                $.ajax({
                    url: '/modele',
                    dataType: 'json',
                    data: '_action=addModel&'+$('#formAddModel').serialize(),
                    type: 'POST',
                    'beforeSend' : function() {

                        if( inpt.length < 1)
                        {
                            $('#returnmsgmodele').html('<div class="alert alert-danger">Erreur ! Specifier un nom !</div>');
                            setTimeout(function(){
                                $('#returnmsgmodele').html('');
                            },2000);
                            return false;
                        }
                        if(brand == null)
                        {
                            $('#returnmsgmodele').html('<div class="alert alert-danger">Erreur ! Selectionner une marque !</div>');
                            setTimeout(function(){
                                $('#returnmsgmodele').html('');
                            },2000);
                            return false;
                        }
                        if(category == null)
                        {
                            $('#returnmsgmodele').html('<div class="alert alert-danger">Erreur ! Selectionner une categorie !</div>');
                            setTimeout(function(){
                                $('#returnmsgmodele').html('');
                            },2000);
                            return false;
                        }

                        $('#returnmsgmodele').html('<div class="alert alert-info">Traitement en cours...</div>');
                    },
                    'complete' : function(xhr) {
                        var response = JSON.parse( xhr.responseText );
                        console.log(response);
                        if(response.status != 'success' || typeof response.status == 'undefined')   {
                            $('#returnmsgmodele').html('<div class="alert alert-danger">Error !'+response.name+'</div>');
                            setTimeout(function(){
                                $('#returnmsgmodele').html('');
                            },3000);

                        }
                        else {
                            $('#returnmsgmodele').html('<div class="alert alert-success">Modéle créé avec succés ! </div>');
                            setTimeout(function(){
                                $('#returnmsgmodele').html('');
                            },3000);
                            //update the VIEW
                            var new_id = response.modele_id;
                            $('#model_select' ).val(new_id);

                            $('#modalNewModel').modal('hide');

                            var newrecord = "<option selected value='"+new_id+"' data-brand='"+brand_text+"' data-cat='"+category_text+"'>"+inpt.toUpperCase()+"</option>";
                            $('#model_select').append(newrecord);
                            handleSelectModele();
                            $('#model_select option[value=new_id]').prop('selected', true);
                            $("#categorie" ).val(category_text);
                            $("#marque" ).val(brand_text);
                    console.log('select set');
//                            $("#brand_name").val('');
//                            $("#brand_name").focus();
                        }
                        return false;
                    }
                });
            });
        }

        function deleteOrder()
        {
            $(document).on("click", ".btn-del-order-node", function(e){
                $this = $(this);
                var todelete = $this.parent().parent();
                todelete.remove();

                var cpt = $("#order-list-body").children().length;

                if(! cpt) {
                    $("#btn-order-validation").hide();
                }

            });
        }

        function handleSubmitOrder(orderobject)
        {
            $.ajax({
                'url' : '/create/file',
                'data' : '_action=calculateOrder&_params='+JSON.stringify(orderobject),
                'dataType' : 'json',
                'type' : 'POST',
                'beforeSend' : function()
                {

                },
                'complete' : function(xhr) {
                    if(xhr.status == '200')
                    {
                        var response = JSON.parse( xhr.responseText );
                        if(response.status == 'success')
                        {
                            $.gritter.add({
                                title: 'Succès !',
                                text: 'Validation commande effectuée !'
                            });
                            $('#type-file').val('ORDER');
                            setTimeout(function(){
                                $("#btn-order-validation").replaceWith("<span class='product-price' style='position: relative; top: 0;'>Total TVAC € <span id='total-order'>"+response.total +"</span></span>");

                            },1000);
                        }
                        else
                        {
                            $.gritter.add({
                                title: 'Attention, une erreur est survenue !',
                                text: "Validation échouée !"
                            });
                        }
                        return false;
                    }
                    else {
                        $.gritter.add({
                            title: 'Attention, une erreur est survenue !',
                            text: "Erreur DB : validation échouée !"
                        });
                    }
                    return false;
                }
            });
        }

        function handleOrderCart()
        {
            $("#order-list-add" ).on("click", function(e) {
                e.preventDefault();
                var inputs = $('#formOrder').serializeArray();
                var error = validateOrder(inputs);

                if(error) {
                    $("#orderError" ).show();
                   setTimeout(function(){
                       $("#orderError" ).hide();
                   }, 2000);
                }
                else {
                    var four = $("#supplier-sel option:selected" ).text();
                    var arti = $("#article-sel option:selected" ).text();
                    var row = "<tr class='order-node'><td class='supplierOrder' data-supplier='"+ inputs[0]['value'] +"'>"+four+"</td><td data-article='"+ inputs[1]['value'] +"'>"+arti+"</td><td data-price='"+ inputs[2]['value'] +"' >"+inputs[2]['value']+"</td><td data-qte='"+ inputs[3]['value'] +"' >"+inputs[3]['value']+"</td><td><button class='btn-del-order-node btn btn-xs btn-danger'><i class='fa fa-times-circle'></i></button></td></tr>";
                    $("#order-list-body").append(row);
                    $("#btn-order-validation" ).show();

//                    refreshSupplier(four,inputs[0]['value'] );
                    clearOrderCart();
                }
            });
        }

        function refreshSupplier(name, id) {
            $('.supplierOrder' ).text(name);
            $('.supplierOrder' ).attr('data-supplier', id);
        }

        function clearOrderCart() {
            $("#article-sel" ).val("");
            $(".order-clear" ).val("");
        }

        function validateOrder($list)
        {
            var error = false;
            if($list.length < 4) { error = true; }

            $.each($list, function(key, data) {
               if(data['value'] == '' || data['value'] == undefined || data['value'] < 0) error = true;
            });

            return error;
        }
        function createRepair()
        {
            var inputs = $('#formDevice').serialize();
            $.ajax({
                'url' : '/create/file',
                'data' : '_action=createRepair&'+$('#formcreatefile').serialize()+'&'+inputs,
                'dataType' : 'json',
                'type' : 'POST',
                'beforeSend' : function()
                {
                    //simpleLoad(true);
                },
                'complete' : function(xhr) {
                    if(xhr.status == '200')
                    {
                        var response = JSON.parse( xhr.responseText );
                        if(response.status == 'success')
                        {
                            $.gritter.add({
                                title: 'Succes !',
                                text: 'Validation effectuée !'
                            });
                            setTimeout(function(){
                                window.location.href = "/files";
                            },1700);

                        }
                        else
                        {
                            $.gritter.add({
                                title: 'Attention, une erreur est survenue !',
                                text: "Erreur DB : validation échouée !"
                            });
                        }

                        return false;

                    }
                    else {
                        $.gritter.add({
                            title: 'Attention, une erreur est survenue !',
                            text: "Validation échouée !"
                        });
                    }
                    return false;
                }
            });
        }
        function createOrder()
        {
            console.log($('#formcreatefile').serialize());
            $.ajax({
                'url' : '/create/file',
                'data' : '_action=createOrder&'+$('#formcreatefile').serialize(),
                'dataType' : 'json',
                'type' : 'POST',
                'beforeSend' : function()
                {
                    //simpleLoad(true);
                },
                'complete' : function(xhr) {
                    if(xhr.status == '200')
                    {
                        var response = JSON.parse( xhr.responseText );
                        if(response.status == 'success')
                        {
                            $.gritter.add({
                                title: 'Succes !',
                                text: 'Validation effectuée !'
                            });
                            setTimeout(function(){
                                window.location.href = response.redirect;
                            },1700);

                        }
                        else
                        {
                            $.gritter.add({
                                title: 'Attention, une erreur est survenue !',
                                text: "Erreur DB : validation échouée !"
                            });
                        }

                        return false;

                    }
                    else {
                        $.gritter.add({
                            title: 'Attention, une erreur est survenue !',
                            text: "Validation échouée !"
                        });
                    }
                    return false;
                }
            });
        }

        function handleSubmitFormAddFile()
        {
            var action = $("#type-file" ).val();
            if(action == "REPAIR") createRepair();
            else createOrder();
            return;

            }

        function disableInputs()
        {
            $('.lockable').prop('disabled', true);
            $('#submitCreationBtn').addClass('hidden');
        }
        function enableInputs()
        {
            $('#submitCreationBtn').removeClass('hidden');
            $('.lockable').prop('disabled', false);
            $('.lockable').val('');
        }

        function handleSubmitFormAddDevice()
        {
           // alert('koi add ?');
            var newserial = $('#device_select option:selected').text();
            $.ajax({
                'url' : '/create/file',
                'data' : '_action=addDevice&serial_number='+newserial+'&'+$('#formDevice').serialize(),
                'dataType' : 'json',
                'type' : 'POST',
                'beforeSend' : function()
                {
                    simpleLoad(true);
                },
                'complete' : function(xhr) {
                    simpleLoad(false);
                    if(xhr.status == '200')
                    {
                        var response = JSON.parse( xhr.responseText );
                        if(response.status == 'success')
                        {
                            $.gritter.add({
                                title: 'Succes !',
                                text: 'Appareil ajouté !'
                            });
                            disableInputs();
                            //Complete addfile Form
                            var id = response.new_added_id;
                           $("#device_select option:selected").attr('value', response.new_added_id);
                            $('#type-file').val('REPAIR');
                        }
                        else
                        {
                            $.gritter.add({
                                title: 'Attention, une erreur est survenue !',
                                text: "Erreur DB : ajout échoué !"
                            });
                        }
                        return false;

                    }
                    else {
                        $.gritter.add({
                            title: 'Attention, une erreur est survenue !',
                            text: "Ajout appareil a échoué !"
                        });
                    }
                    return false;
                }
            });
            return false;
        }


        function simpleLoad( state) {
            var btn = $('.tourne');
            if (state)
            {
                btn.children().addClass('fa-spin');
                btn.contents().last().replaceWith(" Patienter");
            }
            else
            {
                btn.children().removeClass('fa-spin');
                btn.contents().last().replaceWith(" Valider");
            }
        }
        function  handlePurchasedCalendar()
        {
            var today = new Date();
            $('#data_3 .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                endDate: today,
                format: "dd/mm/yyyy"
            });
        }
        function handleSelectModele()
        {

            $('#model_select').on('change', function() {
                $( "#model_select option:selected" ).each(function() {
                    var str = $( this ).data('brand');
                    $( "#marque" ).val( str );

                    str= $( this ).data('cat');
                    $( "#categorie" ).val( str );

                });

            });
        }
        function populateLockedField()
        {
            $( "#model_select option:selected" ).each(function() {
                var str = $( this ).data('brand');
                $( "#marque" ).val( str );

                str= $( this ).data('cat');
                $( "#categorie" ).val( str );
            });
        }
        function handleSelectDevice()
        {
            $('#device_select').on('change', function() {
                $( "#device_select option:selected" ).each(function() {
                    if($(this).attr('value') != 'new')
                    {
                        disableInputs();
                        var str = $( this ).data('modeleid');
                        $( "#model_select" ).val( str );
                        str = $( this ).data('desc');
                        $( "#description_device" ).val( str );
                        str = $( this ).data('purchased');
                        $( "#purchaseddevice" ).val( str );
                    }

                    else
                    {
                        enableInputs();
                    }

                    populateLockedField();

                });

            });
        }



        function setSmartSelectionDevice()
        {
            var select, chosen;

            // cache the select element as we'll be using it a few times
            select = $("#device_select");

            // init the chosen plugin
            select.chosen({
                no_results_text: "Tapez ENTER pour créer :  ",
                width: "95%"
            });

            // get the chosen object
            chosen = select.data('chosen');

            // Bind the keyup event to the search box input
            chosen.dropdown.find('input').on('keyup', function(e)
            {
                // if we hit Enter and the results list is empty (no matches) add the option
                if (e.which == 13 && chosen.dropdown.find('li.no-results').length > 0)
                {
                    var option = $("<option>").val('new').text(this.value);

                    // add the new option
                    select.prepend(option);
                    // automatically select it
                    select.find(option).prop('selected', true);
                    // trigger the update
                    select.trigger("chosen:updated");

                    $( "#device_select option:selected" ).each(function() {
                        if( $(this).attr('value') == 'new') {
                            populateLockedField();
                            enableInputs()
                        }
                    });
                }
            });
        }



    </script>
@stop