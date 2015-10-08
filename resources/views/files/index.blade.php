@extends('template')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInUp">

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Liste des Fiches</h5>
                        <div class="ibox-tools">
                            <a href="/new-file" class="btn btn-primary btn-xs">Nouvelle fiche</a>
                        </div>
                    </div>
                    <div class="row">

                        @foreach ($files as $file)
                            <p>
                            {{$file}}
                            </p>
                        @endforeach

                    </div>
                    <div class="row">

                        @foreach ($list as $file)
                            <p>
                            {{$file->represent}}
                            </p>
                        @endforeach

                    </div>

                    <div class="ibox-content">
                        <div class="row m-b-sm m-t-sm">
                            <div class="col-md-1">
                                <button type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> Rafraicir</button>
                            </div>
                            <div class="col-md-11">
                                <div class="input-group">
                                    <input type="text" placeholder="Search" class="input-sm form-control">
                                    <span class="input-group-btn"> <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                            </div>
                        </div>

                        <div class="project-list">

                            <table class="footable table table-hover">
                                <thead>

                                <tr>


                                    <th style="text-align:center;"> #</th>
                                    <th style="text-align:center;"> Titre</th>
                                    <th style="text-align:center;"> Achèvement</th>
                                    <th style="text-align:center;"> Client</th>
                                    <th style="text-align:center;"> Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop


@section('script.files')
    <script type="text/javascript">

        $('.footable').footable();
        $(document).ready(function(){

            $('#loading-example-btn').click(function () {
                btn = $(this);
                simpleLoad(btn, true);

                simpleLoad(btn, false);
            });


        });


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
    </script>

@stop
