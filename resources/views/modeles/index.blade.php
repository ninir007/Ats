@extends('template')

@section('content')
    <div class="row">

        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-warning" id="model-stat">{{ isset($modeles) ? count($modeles) : 0 }}</span>
                    <h5> &nbsp; Modéles</h5>
                    <div class="ibox-tools">
                        <a href="#modalAddModel" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-plus-circle"></i></a>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                    <div class="ibox-content no-padding customheight" id="content_models">
                        <table class="footable table table-bordered table-striped table-hover">
                            <thead>

                            <tr>


                                <th style="text-align:center;">Modele</th>
                                <th style="text-align:center;"> Categorie</th>
                                <th style="text-align:center;"> Marque</th>

                            </tr>
                            </thead>
                            <tbody id="modele-content">
                            @if(isset($modeles))
                                @foreach($modeles as $modele)
                                    <tr>
                                        <td style="text-align:center;">{{ $modele->name }}</td>
                                        <td style="text-align:center;">{{ $modele->category->name }}</td>
                                        <td style="text-align:center;">{{ $modele->brand->name }}</td>
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
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-content">

                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                        <thead>
                            <tr>

                                <th data-toggle="true">Modele</th>
                                <th data-hide="all">Articles</th>

                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($artmod))

                         @foreach($artmod as $mod)
                             <tr>
                                <td>
                                    {{ $mod->name }}
                                </td>
                                <td>
                                    @foreach($mod->articles as $art)
                                        <span class="label label-primary">{{$art->reference}} - {{$art->description}}</span>
                                    @endforeach

                                </td>
                             </tr>
                         @endforeach

                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6">
                                <ul class="pagination pull-right"></ul>
                            </td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>







    <div id="modalAddModel" class="modal fade in">
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

@section('script.modele')
    <script type="text/javascript">

        $('.footable').footable(); //Here otherwise display latency....

        $(document).ready(function(){


            handleFormAddModele();

        });
        function handleFormAddModele()
        {
            $('#formAddModel').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: './modele',
                    dataType: 'html',

                    data: '_action=addModel&'+$('#formAddModel').serialize(),
                    type: 'POST',
                    'beforeSend' : function() {
                        var inpt = $.trim($("#modalinputaddmodele").val());
                        var brand = $( "#brand_model" ).val();
                        var category = $( "#category_model" ).val();

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
                            $stat = parseInt($('#model-stat').text());
                            $stat += 1;

                            var newrecord = "<tr><td style='text-align:center;'>"+$('#modalinputaddmodele').val().toUpperCase()+"</td><td style='text-align:center;'>"+$('#category_model option:selected').text()+"</td><td style='text-align:center;'>"+$('#brand_model option:selected').text()+"</td></tr>";
                            $('#modele-content').append(newrecord);
                            $('#model-stat').text($stat);

                            $("#brand_name").val('');
                            $("#brand_name").focus();
                        }
                        return false;
                    }
                });
            });
        }

    </script>
@stop