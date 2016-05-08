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
                                    <tr>
                                        <td class="project-status">
                                            <span class="label label-primary"> {{$file->id}} </span>
                                        </td>
                                    @if( isset($file->id) )

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
                                                <p>{{$file->client->LastName}} {{$file->client->FirstName}}</p>
                                            </td>
                                            <td class="project-actions" >
                                                <a href="/file/repair/{{$file->id}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
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
