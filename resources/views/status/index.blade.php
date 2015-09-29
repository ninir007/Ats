@extends('template')

@section('content')
    <div class="row" >

        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-warning" id="stat-cat">{{ isset($categories) ? count($categories) : 0 }}</span>
                    <h5> &nbsp; Groupes</h5>
                    <div class="ibox-tools">
                        <a href="#modalAddGroup" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-plus-circle"></i></a>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                    <div class="ibox-content no-padding">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>

                            <tr>


                                <th style="text-align:center;"></th>
                                <th style="text-align:center;"> Label</th>


                            </tr>
                            </thead>
                            <tbody id="groups-content">
                            @if(isset($groups))
                                @foreach($groups as $statu)
                                    <tr>
                                        <td style="text-align:center;"><button class="btn btn-xs btn-primary editrecord" rel="{{ $statu->id }}/{{ $statu->label }}"><i class="fa fa-pencil"></i></button></td>
                                        <td style="text-align:center;">{{ $statu->label }}</td>
                                    </tr>

                                @endforeach

                                <div class="form-horizontal" id="formEditGroups" style="display: none">
                                    <form method="post" autocomplete="off" id="formEditGroup" role="form" >
                                        <div class="input-group m-b"><span class="input-group-btn ">
                                            <button type="submit" class="btn btn-warning" >Editer</button> </span> <input id="group_status_label" type="text" class="form-control"><input id="group_status_id" class="form-control" type="hidden"  >
                                        </div>
                                    </form>
                                </div>

                            @else <tr>Pas d'enregistrements</tr>
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>






    <div id="modalAddGroup" class="modal fade" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="contentCategory">
                <form method="post" autocomplete="off" id="formaddGroup" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Ajouter un nouveau groupe</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div id="contentreturnmsggroup"></div>
                            <div class="col-lg-8 col-sm-8">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                        <input type="text" class="form-control input-sm " id="group_label" placeholder="Groupe" name="label" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSubmitFormAddGroup" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('script.status')

    <script type="text/javascript">
        $(document).ready(function(){

            initFormEditGroupStatus();

            handleFormEditGroupStatus();



        });
        function handleFormEditGroupStatus()
        {
            $('#formEditGroup').submit(function(e){
                e.preventDefault();
                alert('ajax');
            });
        }
        function initFormEditGroupStatus()
        {
            $('.editrecord').click(function(){
                var res = $(this).attr('rel');
                var entity_id = res.split("/");

                var entity = entity_id[1];
                var uid = entity_id[0];

                $('#group_status_label').val(entity);
                $('#group_status_id').val(uid);

                $('#formEditGroups').show();
            });
        }
    </script>
@stop