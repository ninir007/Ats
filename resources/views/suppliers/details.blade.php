@extends('template')


@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="ibox float-e-margins" >
                <div class="ibox-title">
                    <span class="label label-warning" id="model-stat">{{ isset($articles_supplier) ? count($articles_supplier) : 0 }}</span>
                    <h5> &nbsp; Articles <small>- Liste</small> </h5>
                    <div class="ibox-tools">
                        <button data-target="#modalAddArticler" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-plus-circle"></i></button>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </div>
                    <div class="ibox-content no-padding customheight" id="content_models">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>

                            <tr>
                                <th style="text-align:center;"> Description</th>
                                <th style="text-align:center;"> Reference</th>
                                <th style="text-align:center;"> Prix standard</th>
                            </tr>
                            </thead>
                            <tbody class="center-my-tab" id="articles-detail-content">
                            @if(isset($articles_supplier))
                                @foreach($articles_supplier as $art)
                                    <tr>
                                        <td>{{ $art['description'] }}</td>
                                        <td>{{ $art['reference'] }}</td>
                                        <td>{{ $art['standard_price'] }}</td>
                                    </tr>
                                @endforeach
                            @else <tr><td class="">Pas d'enregistrements</td></tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="row">
                <div class="ibox float-e-margins" >
                    <div class="ibox-title">
                        <span class="label label-warning" id="model-stat"></span>
                        <h5> &nbsp; Fournisseur <small>- details</small> </h5>
                        <div class="ibox-tools">
                            <button class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                        <div class="ibox-content">

                            <form id="formSupplier" role="form" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nom :</label>
                                            <input class="form-control" value="{{$supp->name}}" disabled="" name="name" required autofocus/>
                                        </div>
                                        <div class="form-group">
                                            <label>Adresse :</label>
                                            <input class="form-control" value="{{$supp->street}}" disabled="" name="street" required/>

                                        </div>
                                        <div class="form-group">
                                            <label>Code Postal :</label>
                                            <input class="form-control" value="{{$supp->postal_code}}" disabled="" name="postal_code" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Ville :</label>
                                            <input class="form-control" value="{{$supp->city}}" disabled="" name="city" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Pays :</label>
                                            <input class="form-control" value="{{$supp->country}}" disabled="" name="country" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact :</label>
                                            <input class="form-control" value="{{$supp->contact}}" disabled="" name="contact" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Email :</label>
                                            <input class="form-control" value="{{$supp->email}}" disabled="" type="email" name="email" required/>
                                        </div>
                                        <div class="form-group">
                                            <label> Mobile:</label>
                                            <input class="form-control" value="{{$supp->mobile}}" disabled="" name="mobile" />
                                        </div>
                                        <div class="form-group">
                                            <label>Bureau :</label>
                                            <input class="form-control" value="{{$supp->office}}" disabled="" name="office" />
                                        </div>
                                        <div class="form-group">
                                            <label>Fax :</label>
                                            <input class="form-control" value="{{$supp->fax}}" disabled="" name="fax" />
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


    </div>
    </div>

    <div id="modalAddArticler" class="modal inmodal fade in" >
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formAddArt" method="post" role="form"  >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h5 class="modal-title">Articles :</h5>
                    </div>
                    <div class="modal-body">

                        <div id="returnmsg"></div>
                        <div class="row">

                            <div class="form-group">
                                <label>Reference : </label> <small>3 min.</small>
                                <input class="form-control" type="text" id="reference" name="reference" pattern=".{3,}" autofocus required/>
                            </div>
                            <div class="form-group">
                                <label>Description :</label>
                                <input class="form-control" type="text" id="description" name="description" />
                            </div>

                        </div>
                        <div class="row" style="margin-top: 7px">
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>Prix :</label>
                                    <input type="number" step="any" min="0" name="standard_price" id="standard_price" class="form-control" required/>
                                </div>
                                <div class="col-lg-6"></div>
                            </div>
                        </div>

                        <div id="wait_addarticles"></div>

                    </div>
                    <div class="modal-footer">
                        <input type="text" value="{{$supp->id}}" name="supplier_id" hidden>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Ajouter</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@stop


@section('script.articles')

    <script type="text/javascript">

        $(document).ready(function(){

            $('#formAddArt').submit(function(){
                handleSubmitFormAddArt();
                return false;
            });



        });

        function handleSubmitFormAddArt()
        {
            description = $.trim($("#description").val());
            ref = $.trim($("#reference").val());

            standard_price = $("#standard_price" ).val();
            var mesg = $('#returnmsg');
            $.ajax({
                'url' : '/suppliers',
                'data' : '_action=addArt&'+$('#formAddArt').serialize(),
                'dataType' : 'json',
                'type' : 'POST',
                'beforeSend' : function()
                {
                    mesg.html('<p><small class="alert alert-info"><i class="fa fa-spinner fa-pulse"></i> Patienter...</small></p>');
                    if( ref.length < 1)
                    {
                        mesg.html('<div class="alert alert-danger">Erreur ! Specifier une reference !</div>');
                        setTimeout(function(){
                            mesg.html('');
                        },2000);
                        return false;
                    }
                    else if(description.length < 1) {
                        mesg.html('<div class="alert alert-danger">Erreur ! Specifier une description !</div>');
                        setTimeout(function(){
                            mesg.html('');
                        },2000);
                        return false;
                    }
                },
                'complete' : function(xhr) {
                    setTimeout(function(){
                        mesg.html('');
                    },1000);

                    if(xhr.status == '200')
                    {
                        var response = JSON.parse( xhr.responseText );
                        if(response.status != 'undefined' && response.status == 'success')
                        {
                            var toappend = "<tr> <td>"+description+"</td> <td>"+ref+"</td> <td>"+standard_price+"</td> </tr>";
                            $("#articles-detail-content" ).append(toappend);
                            mesg.html("<div class='alert alert-success'>l'ajout a été effectué !</div>");
                            setTimeout(function(){
                                mesg.html('');
                            },3000);
                        }
                       // window.location.reload();
                        return false;
                    }
                    else if(xhr.status == '500')
                    {
                        mesg.html("<div class='alert alert-danger'>Enregistrement déjà existant !</div>");
                        setTimeout(function(){
                            mesg.html('');
                        },3000);
                    }
                    else {

                        mesg.html("<div class='alert alert-danger'>Attention, une erreur est survenue !</div>");
                        setTimeout(function(){
                            mesg.html('');
                        },3000);
                    }
                    return false;
                }
            });
            return false;
        }






        function handleSubmitFormAddArticle()
        {
            $.ajax({
                'url' : './articles',
                'data' : '_action=addArticle&'+$('#formAddArticle').serialize(),
                'dataType' : 'json',
                'type' : 'POST',
                'beforeSend' : function()
                {
                    var inpt = $.trim($("#reference").val());
                    if( inpt.length < 1)
                    {
                        $('#wait_addarticle').html('<p><small class="alert alert-danger">Erreur : entrer une référence valide !</small></p>');
                        setTimeout(function(){
                            $('#wait_addarticle').html('');
                        },2000);
                        return false;
                    }
                    else {
                        $('#wait_addarticle').html('<p><small class="alert alert-info"><i class="fa fa-spinner fa-pulse"></i> Patienter...</small></p>');
                    }
                },
                'complete' : function(xhr) {
                    $('#wait_addarticle').html('');
                    if(xhr.status == '200')
                    {
                        var response = JSON.parse( xhr.responseText );
                        if(response.status != 'undefined' && response.status == 'success')
                        {
                            $.gritter.add({
                                title: 'Succes !',
                                text: 'Votre ajout a été effectué !'
                            });
                        }
                        window.location.reload();
                        return false;

                    }
                    else {
                        $.gritter.add({
                            title: 'Attention, une erreur est survenue !',
                            text: "L'ajout article n'est pas sauvé !"
                        });
                    }
                    return false;
                }
            });
            return false;
        }
    </script>

@stop