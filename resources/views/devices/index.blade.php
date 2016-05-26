@extends('template')


@section('content')

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Liste d'appareils</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="ibox-content">

                <div class="table">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th>Categorie</th>
                            <th>Marque</th>
                            <th>Modele</th>
                            <th>Numero De Serie</th>
                            <th>Date D'Achat</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($devices))
                            @foreach($devices as $device)
                                <tr class="">
                                    <td>{{$device['modele']['category']['name']}}</td>
                                    <td>{{$device['modele']['brand']['name']}}</td>
                                    <td>{{$device['modele']['name']}}</td>
                                    <td>{{$device['serial_number']}}</td>
                                    <td>{{$device['purchased_at']}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Categorie</th>
                            <th>Marque</th>
                            <th>Modele</th>
                            <th>Numero De Serie</th>
                            <th>Date D'Achat</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
@stop

@section('javascript')
    <<script src="/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="/js/plugins/dataTables/dataTables.tableTools.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $( '.dataTables-example' ).DataTable({
                "language" : {
                    "url":"/js/plugins/dataTables/i18n/fr_fr.lang"
                }
            });


        });
    </script>
@stop