@extends('template')


@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="ibox float-e-margins" >
            <div class="ibox-title">
                <span class="label label-warning" id="model-stat">{{ isset($articles) ? count($articles) : 0 }}</span>
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


                            <th style="text-align:center;">Modele</th>
                            <th style="text-align:center;"> Description</th>
                            <th style="text-align:center;"> Reference</th>

                        </tr>
                        </thead>
                        <tbody id="modele-content">
                        @if(isset($articles))
                            @foreach($articles as $art)
                                <tr>
                                    <td style="text-align:center;">{{ $art->model->name }}</td>
                                    <td style="text-align:center;">{{ $art->description }}</td>
                                    <td style="text-align:center;">{{ $art->reference }}</td>
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
        <div class="ibox float-e-margins" >
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
                            <label>Modéle :</label>
                            <select name="model_id" id="model_id" class="form-control" required>
                                <option value="" selected disabled="">--</option>
                                @if(isset($modeles))
                                    @foreach($modeles as $mod)
                                        <option value="{{ $mod->id }}"> {{ $mod->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-xs btn-success"><i class="fa fa-plus-circle"></i> Ajouter</button>
                        </div>
                        <div id="wait_addarticle"></div>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@stop


@section('script.articles')

    <script type="text/javascript">

        $(document).ready(function(){

            $('#formAddArticle').submit(function(){
                handleSubmitFormAddArticle();
                return false;
            });

        });

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