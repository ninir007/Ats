@extends('template')

@section('content')
    <h1>DASHBOARD</h1>

    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Liste réparations à faire</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-hover no-margins">
                        <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Client</th>
                            <th class="text-center">Tech</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($files['repair_to_do']))
                            @if(!empty($files['repair_to_do']))
                                @foreach($files['repair_to_do'] as $file)
                                    @if($file['type'] == 'REPAIR')
                                    <tr>
                                        <td class="text-center text-navy" ><a class="text-center text-navy" target="_blank" href="/file/repair/{{$file['id']}}">{{$file['id'].'R'.$file['client_id']}}</a></td>
                                        <td class="text-center"><small><span class="label label-primary" >{{$file['laststatus'][0]['code']['label']}}</span></small></td>
                                        <td class="text-center"><i class="fa fa-clock-o"></i> {{$file['laststatus'][0]['created_at']}}</td>
                                        <td class="text-center">{{$file['client']['firstname'].' '.$file['client']['lastname']}}</td>
                                        <td class="text-center">{{$file['laststatus'][0]['technicien']['name']}}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            @endif

                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Client à aviser</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-hover margin bottom">
                        <thead>
                        <tr>
                            <th style="width: 1%" class="text-center">No.</th>
                            <th class="text-center">Statut</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Client</th>
                            <th class="text-center">Tech</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($files['aviser']))
                            @if(!empty($files['aviser']))
                                @foreach($files['aviser'] as $file)
                                    <tr>
                                        <td class="text-center text-danger" ><a class="text-center text-danger" target="_blank" @if($file['type'] == 'ORDER') href="/file/order/{{$file['id']}}" @else href="/file/repair/{{$file['id']}}"@endif > @if($file['type'] == 'ORDER'){{$file['id'].'O'.$file['client_id']}} @else {{$file['id'].'R'.$file['client_id']}} @endif  </a></td>
                                        <td class="text-center"><small><span class="label label-danger">{{$file['laststatus'][0]['code']['label']}}</span></small></td>
                                        <td class="text-center"><i class="fa fa-clock-o"></i> {{$file['laststatus'][0]['created_at']}}</td>
                                        <td class="text-center">{{$file['client']['firstname'].' '.$file['client']['lastname']}}</td>
                                        <td class="text-center">{{$file['laststatus'][0]['technicien']['name']}}</td>
                                    </tr>

                                @endforeach
                            @endif

                        @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Liste de Commandes à faire</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>

                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-hover margin bottom">
                        <thead>
                        <tr>
                            <th style="width: 1%" class="text-center">No.</th>
                            <th class="text-center">Statut</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Client</th>
                            <th class="text-center">Tech</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($files['order_to_do']))
                            @if(!empty($files['order_to_do']))
                                @foreach($files['order_to_do'] as $file)
                                    <tr>
                                        <td class="text-center text-navy" ><a class="text-center text-navy" target="_blank" @if($file['type'] == 'ORDER') href="/file/order/{{$file['id']}}" @else href="/file/repair/{{$file['id']}}"@endif > @if($file['type'] == 'ORDER'){{$file['id'].'O'.$file['client_id']}} @else {{$file['id'].'R'.$file['client_id']}} @endif  </a></td>

                                        <td class="text-center"><small><span class="label label-primary">{{$file['laststatus'][0]['code']['label']}}</span></small></td>
                                        <td class="text-center"><i class="fa fa-clock-o"></i> {{$file['laststatus'][0]['created_at']}}</td>
                                        <td class="text-center">{{$file['client']['firstname'].' '.$file['client']['lastname']}}</td>
                                        <td class="text-center">{{$file['laststatus'][0]['technicien']['name']}}</td>
                                    </tr>

                                @endforeach
                            @endif

                        @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop
