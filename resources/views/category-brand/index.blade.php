@extends('template')

@section('content')

<div class="row">
    <div class="col-sm-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-warning" id="stat-cat">{{ isset($categories) ? count($categories) : 0 }}</span>
                <h5> &nbsp; Catégories</h5>
                <div class="ibox-tools">
                    <a href="#modalAddCategory" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-plus-circle"></i></a>
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
                <div class="ibox-content no-padding customheight" >
                    <table class="table table-bordered table-striped table-hover">
                        <tbody id="content_categories">
                        @if(isset($categories))
                            @foreach($categories as $cate)
                                <tr><td>{{ $cate->name }}</td></tr>
                            @endforeach
                        @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-warning" id="stat-brand">{{ isset($brands) ? count($brands) : 0 }}</span>
                <h5> &nbsp; Marques</h5>
                <div class="ibox-tools">
                    <a href="#modalAddBrand" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-plus-circle"></i></a>
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
                <div class="ibox-content no-padding customheight" >
                    <table class="table table-bordered table-striped table-hover">
                        <tbody id="content_brands">
                    @if(isset($brands))
                        @foreach($brands as $brand)
                            <tr><td>{{ $brand->name }}</td></tr>
                        @endforeach
                    @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



    <!--MODALS-->

<div id="modalAddCategory" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="contentCategory">
            <form method="post" autocomplete="off" id="formaddCategory" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Ajouter une nouvelle catégorie</h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div id="contentreturnmsgcategory"></div>
                        <div class="col-lg-8 col-sm-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                    <input type="text" class="form-control input-sm " id="category_name" placeholder="Categorie" name="name" autocomplete="off">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnSubmitFormAddCategory" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="modalAddBrand" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="contentBrand">
            <form method="post" autocomplete="off" id="formaddBrand" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Ajouter une nouvelle marque</h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div id="contentreturnmsgbrand"></div>
                        <div class="col-lg-8 col-sm-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                    <input type="text" class="form-control input-sm " id="brand_name" placeholder="Marque" name="name" autocomplete="off">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnSubmitFormAddMarque" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop


@section('script.category')
    <script type="text/javascript">
        $(document).ready(function(){

            handleFormAddCategory();
            handleFormAddBrand();

        });

        function handleFormAddBrand()
        {
            $('#formaddBrand').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: './category-model',
                    dataType: 'html',

                    data: '_action=addBrand&'+$('#formaddBrand').serialize(),
                    type: 'POST',
                    'beforeSend' : function() {
                        var inpt =$.trim($("#brand_name").val());

                        if( inpt.length < 1)
                        {
                            $('#contentreturnmsgbrand').html('<div class="alert alert-danger">Erreur ! Specifier un nom !</div>');
                            setTimeout(function(){
                                $('#contentreturnmsgbrand').html('');
                            },3000);
                            return false;
                        }

                        $('#contentreturnmsgbrand').html('<div class="alert alert-info">Traitement en cours...</div>');
                    },
                    'complete' : function(xhr) {
                        var response = JSON.parse( xhr.responseText );
                        if(response.status != 'success' || typeof response.status == 'undefined')   {
                            $('#contentreturnmsgbrand').html('<div class="alert alert-danger">Error !'+response.name+'</div>');
                            setTimeout(function(){
                                $('#contentreturnmsgbrand').html('');
                            },3000);

                        }
                        else {
                            $('#contentreturnmsgbrand').html('<div class="alert alert-success">Marque créé avec succés ! </div>');
                            setTimeout(function(){
                                $('#contentreturnmsgbrand').html('');
                            },3000);
                            //update the VIEW
                            $stat = parseInt($('#stat-brand').text());
                            $stat += 1;

                            var newrecord = "<tr><td>"+ $("#brand_name").val().toUpperCase() +"</td></tr>";
                            $('#content_brands').append(newrecord);
                            $('#stat-brand').text($stat);

                            $("#brand_name").val('');
                            $("#brand_name").focus();
                        }
                        return false;
                    }
                });
            });
        }
        function handleFormAddCategory()
        {
            $('#formaddCategory').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: './category-model',
                    dataType: 'html',

                    data: '_action=addCategory&'+$('#formaddCategory').serialize(),
                    type: 'POST',
                    'beforeSend' : function() {
                        var inpt =$.trim($("#category_name").val());

                        if( inpt.length < 1)
                        {
                            $('#contentreturnmsgcategory').html('<div class="alert alert-danger">Erreur ! Specifier un nom !</div>');
                            setTimeout(function(){
                                $('#contentreturnmsgcategory').html('');
                            },3000);
                            return false;
                        }

                        $('#returnmsginfluences').html('<div class="alert alert-info">Traitement en cours...</div>');
                    },
                    'complete' : function(xhr) {
                        var response = JSON.parse( xhr.responseText );
                        if(response.status != 'success')   {
                            $('#contentreturnmsgcategory').html('<div class="alert alert-danger">Error !'+response.name+'</div>');
                            setTimeout(function(){
                                $('#contentreturnmsgcategory').html('');
                            },3000);

                        }
                        else {
                            $('#contentreturnmsgcategory').html('<div class="alert alert-success">Catégorie créée avec succés ! </div>');
                            setTimeout(function(){
                                $('#contentreturnmsgcategory').html('');
                            },3000);
                            //update the VIEW
                            $stat = parseInt($('#stat-cat').text());
                            $stat += 1;

                            var newrecord = "<tr><td>"+ $("#category_name").val().toUpperCase() +"</td></tr>";
                            $('#content_categories').append(newrecord);
                            $('#stat-cat').text($stat);

                            $("#category_name").val('');
                            $("#category_name").focus();
                        }
                        return false;
                    }
                });
            });
        }
    </script>
@stop