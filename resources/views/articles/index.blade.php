@extends('template')


@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="ibox float-e-margins" >
            <div class="ibox-title">
                <span class="label label-warning" id="model-stat">{{ isset($article_modele) ? count($article_modele) : 0 }}</span>
                <h5> &nbsp; Articles <small>- Liste</small> </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
                <div class="ibox-content no-padding customheight" id="content_models">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>

                        <tr>

                            <th class="mycenter">Modele</th>
                            <th class="mycenter"> Description</th>
                            <th class="mycenter"> Reference</th>
                            <th class="mycenter">Prix</th>
                            <th class="mycenter">Fournisseur</th>


                        </tr>
                        </thead>
                        <tbody id="modele-content">
                        @if(isset($article_modele))
                            @foreach($article_modele as $art)
                                <tr>
                                    <td class="mycenter"><button data-title="{{$art->description.' :: '.$art->reference}}" data-idarticle="{{$art->id}}" class="btnshowmodels btn btn-xs btn-info" data-toggle="modal" data-target="#modalShowModels"><i class="fa fa-arrows-alt"></i></button></td>
                                    <td class="mycenter">{{ $art->description }}</td>
                                    <td class="mycenter">{{ $art->reference }}</td>
                                    <td class="mycenter">{{ $art->standard_price }}</td>
                                    <td class="mycenter"><a href="/suppliers/{{ $art->supplier->id }}" target="_blank" class="text-navy"> {{ $art->supplier->name }}</a></td>
                                </tr>
                            @endforeach
                        @else <tr>Pas d'enregistrements</tr>
                        @endif
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>





    <div class="col-sm-6">
        <div class="row"><div class="ibox float-e-margins" >
                <div class="ibox-title">
                    <span class="label label-warning" id="model-stat"></span>
                    <h5> &nbsp; Articles <small>- Ajout</small> </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                    <div class="ibox-content" id="content_add_article">

                        <form id="formAddArticle" method="post" role="form"  >

                            <div class="form-group">
                                <label>Reference : </label> <small>3 min.</small>
                                <input class="form-control" type="text" id="reference" name="reference" pattern=".{3,}" autofocus required/>
                            </div>
                            <div class="form-group">
                                <label>Description :</label>
                                <input class="form-control" type="text" id="description" name="description" />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="supplier">Fournisseur : </label>
                                <select class="form-control" name="supplier_id" data-placeholder="Fournisseur" id="supplier-sel" required >
                                    @if(isset($suppliers))
                                        <option value="" disabled selected></option>
                                        @foreach($suppliers as $supp)
                                            <option value="{{ $supp->id }}"> {{ $supp->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Prix : </label>
                                <input class="form-control" type="number" name="standard_price" step="any" required/>
                            </div>

                            <div class="form-group pull-right">
                                <button type="submit" class="btn btn-xs btn-success"><i class="fa fa-plus-circle"></i> Ajouter</button>
                            </div>
                            <div id="wait_addarticle"></div>

                        </form>

                    </div>
                </div>
            </div></div>
        <div class="row">
            <div class="ibox float-e-margins" >
                <div class="ibox-title">
                    <span class="label label-warning" ></span>
                    <h5> &nbsp; Articles/Modéles <small>- Ajout</small> </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                    <div class="ibox-content" id="content_add_modarticle">

                        <form id="formAddModArt" method="post" role="form"  >

                            <div class="form-group">
                                <label>Article :</label>
                                <select name="article_id" id="article_id" class="form-control" required>
                                    <option value="" selected disabled="">--</option>
                                    @if(isset($article_modele))
                                        @foreach($article_modele as $mod)
                                            <option value="{{ $mod->id }}"> {{ $mod->reference }} -- {{$mod->description}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Modéle :</label>
                                <select name="model_id" id="model_id" class="form-control" required>
                                    <option value="" selected disabled="">--</option>
                                    @if(isset($modeles))
                                        @foreach($modeles as $mod)
                                            <option value="{{ $mod->id }}"> {{ $mod->name }} ( {{ $mod->category->name }} - {{ $mod->brand->name }} )</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group pull-right">
                                <button type="submit" class="btn btn-xs btn-success"><i class="fa fa-plus-circle"></i> Ajouter</button>
                            </div>
                            <div id="wait_addarticles"></div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>



<div id="modalShowModels" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">x</span></button>
                    <h4 id="modele-array-title" ></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="ibox-content no-padding customheight" id="content_models">
                            <table class="footable table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="mycenter">Modele</th>
                                    <th class="mycenter">Categorie</th>
                                    <th class="mycenter">Marque</th>
                                </tr>
                                </thead>
                                <tbody id="modele-array-content">

                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>

        </div>
    </div>
</div>
@stop


@section('script.articles')

    <script type="text/javascript">

        $(document).ready(function(){
            $('.footable').footable();
            $('#formAddArticle').submit(function(){
                handleSubmitFormAddArticle();
                return false;
            });
            $('#formAddModArt').submit(function(){
                handleSubmitFormAddModArt();
                return false;
            });

            showModels();

        });





        function showModels() {
            $('.btnshowmodels' ).click(function(e) {
                var id = $(this).data("idarticle");
                var label = $(this).data("title");
                $('#modele-array-title' ).html(label);


                $('#modele-array-content').html('<h1 class="modele-array-spinner"><i class="fa fa-spinner fa-pulse"></i></h1>');

//                $('#modalShowModels').modal('show');

                $.ajax({
                    'url' : './articles',
                    'data' : '_action=getModeles&_id='+id,
                    'dataType' : 'html',
                    'type' : 'POST',

                    'complete' : function(xhr) {


                        if(xhr.status == '200') {
                            console.log(xhr);
                            $("#modele-array-content" ).html(xhr.responseText);
                            return false;
                        }
                        else {
                            $('#modalShowModels').modal('hide');
                            $.gritter.add({
                                title: 'Attention, une erreur est survenue !',
                                text: "Impossible de charger les modéles !"
                            });
                        }
                        return false;
                    }
                });

            });


        }





        function handleSubmitFormAddModArt()
        {
            $.ajax({
                'url' : './articles',
                'data' : '_action=addModArt&'+$('#formAddModArt').serialize(),
                'dataType' : 'json',
                'type' : 'POST',
                'beforeSend' : function()
                {
                    $('#wait_addarticles').html('<p><small class="alert alert-info"><i class="fa fa-spinner fa-pulse"></i> Patienter...</small></p>');
                },
                'complete' : function(xhr) {
                    setTimeout(function(){
                        $('#wait_addarticles').html('');
                    },2000);

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
                    else if(xhr.status == '500')
                    {
                        $.gritter.add({
                            title: 'Attention, une erreur est survenue !',
                            text: "Enregistrement déjà existant ! !"
                        });
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
                        if(response.status != 'undefined' && response.status == 'success')  {
                            $.gritter.add({
                                title: 'Succes !',
                                text: 'Votre ajout a été effectué !'
                            });
                        }
                        window.location.reload();
                        return false;

                    }
                    else  {
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