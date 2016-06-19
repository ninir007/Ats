@extends('template')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInUp">

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Liste des Fiches</h5>
                        <div class="ibox-tools">
                            <button data-toggle="modal" data-target="#modalCreateFileByClient" class="btn btn-primary btn-xs">Nouvelle fiche</button>
                        </div>
                    </div>


                    <div class="ibox-content">

                        <div class="project-list">

                            <table class="footable table table-hover">
                                <thead>

                                <tr>


                                    <th style="text-align:center;"> #</th>
                                    <th style="text-align:center;"> Titre</th>
                                    <th style="text-align:center;"> Achèvement</th>
                                    <th style="text-align:center;"> Client</th>
                                    <th style="text-align:right;"> Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($files as $file)
                                    @if($file->type == 'REPAIR' )
                                        <tr class="repair">
                                            <td class="project-status">
                                                <span class="label label-primary"> {{$file->id.'R'.$file->client->id}} </span>
                                            </td>
                                            <td class="project-title">
                                                <a href="/file/repair/{{$file->id}}">Réparation de : @foreach($repairs as $repair) @if($repair->file_id == $file->id) {{$repair->device->modele->name}} - ({{$repair->device->modele->category->name}} - {{$repair->device->modele->brand->name}}) @endif @endforeach</a>
                                                <br>
                                                <small>Créé {{ $file->created_at }}</small>
                                            </td>
                                            <td class="project-completion">
                                                <small>Completion with: 48%</small>
                                                <div class="progress progress-mini">
                                                    <div style="width: 48%;" class="progress-bar"></div>
                                                </div>
                                            </td>
                                            <td class="project-people"  style="text-align:center;">
                                                <p>{{$file->client->lastname}} {{$file->client->firstname}}</p>
                                            </td>
                                            <td class="project-actions" >
                                                <a href="/file/repair/{{$file->id}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                            </td>
                                        </tr>

                                    @else
                                        <tr class="order">
                                            <td class="project-status">
                                                <span class="label label-primary"> {{$file->id.'O'.$file->client->id}} </span>
                                            </td>
                                            <td class="project-title">
                                                <a href="/file/order/{{$file->id}}">Commande de : @foreach($orders as $order) @if($order->file_id == $file->id) {{$order->total_details_amount}} €  @endif @endforeach</a>
                                                <br>
                                                <small>Créé {{ $file->created_at }}</small>
                                            </td>
                                            <td class="project-completion">
                                                <small>Completion with: 48%</small>
                                                <div class="progress progress-mini">
                                                    <div style="width: 48%;" class="progress-bar"></div>
                                                </div>
                                            </td>
                                            <td class="project-people"  style="text-align:center;">
                                                <p>{{$file->client->lastname}} {{$file->client->firstname}}</p>
                                            </td>
                                            <td class="project-actions" >
                                                <a href="/file/order/{{$file->id}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                            </td>
                                        </tr>
                                    @endif

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="modalCreateFileByClient" class="modal inmodal fade in" >
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" role="form" autocomplete="off" id="formCreateFileByClient">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Client :</h4>
                    </div>
                    <div class="modal-body">
                        <div id="returnmsg"></div>
                        <div class="row">
                            <div class="col-lg-4">

                                <div class="form-group">
                                    <label>Filtre :</label>
                                    <select name="_filtertype" id="_filtertype" class="form-control">
                                        <option value="lastname">Nom</option>
                                        <option value="firstname">Prénom</option>
                                        <option value="email">Email</option>
                                        <option value="mobile">Mobile</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Recherche :</label>
                                    <input id="clientkeyword" type="text" class="form-control" name="_name" required="" autofocus="" autocomplete="off">
                                    <div id="autoclient-result-list"></div>
                                    <input type="hidden" name="client_id" id="client_id" value="">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="_action" value="Album">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" id="btnSubmitFormAddGenre" class="btn btn-primary">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@stop


@section('script.files')
    <script type="text/javascript">

//        $('.footable').footable();
        $(document).ready(function(){

            $('#loading-example-btn').click(function () {
                btn = $(this);
                simpleLoad(btn, true);

                simpleLoad(btn, false);
            });
            handleAutocomplete('clientkeyword','_filtertype','client_id');
            handlerCreateFileByClient();

        });

        function handlerCreateFileByClient()
        {
            $("#formCreateFileByClient" ).submit(function(e) {
                e.preventDefault();
                var id = $("#client_id" ).val();
                if( id.length > 0)  {
                    var href = "/create/file/"+id;
                    setTimeout(function(){
                        window.location.href = href;
                    },1000);
                }
                else {
                    $('#returnmsg' ).html("<div class='alert alert-danger'>Erreur : veuiller selectionner un client !</div>");
                    setTimeout(function(){
                        $('#returnmsg' ).html("");
                    },3000);
                }
            });


        }

        function simpleLoad(btn, state) {
            if (state) {
                btn.children().addClass('fa-spin');
                btn.contents().last().replaceWith(" Patienter");
            } else {
                setTimeout(function () {
                    btn.children().removeClass('fa-spin');
                    btn.contents().last().replaceWith(" Rafraichir");
                }, 2000);
            }
        }


        function handleAutocomplete(input,inputtype,inputuid)
        {

            var input_keyword = $('#'+input);
            var input_uid = $('#'+inputuid);

            input_keyword.blur(function() {
                if(input_keyword.val() == '') {
                    input_uid.val('');
                }
            });

            input_keyword.autocomplete({
                appendTo: '#autoclient-result-list',
                source: function( request, response) {
                    $.ajax({
                        url: '/autocomplete',
                        dataType: 'json',
                        type: 'POST',
                        data: {
                            keyword: request.term,
                            table: 'clients' ,
                            restrict: $('#'+inputtype).val()
                        },
                        beforeSend: function(){

                            input_keyword.prev().html('<small>Recherche en cours...</small>');
                        },
                        success: function( xhr) {
                            input_keyword.prev().html('');
                            response(xhr);
                            input_keyword.prev().html(xhr.length);

                        },
                        error: function( xhr) {
                            input_keyword.prev().html('<small>Pas de resultats !</small>');
                            $("#client_id").val("")
                        }
                    });
                },

                minLength: 3,

                focus : function(event, ui) {
                    setTimeout(function() {
                        input_keyword.val(ui.item.label);
                    },50);
                },
                select : function(event, ui) {
                    console.log(ui);
                    setTimeout(function() {
                        input_keyword.val(ui.item.label);
                    },50);
                    input_uid.val(ui.item.value);
                }
            });
        }
    </script>

@stop
