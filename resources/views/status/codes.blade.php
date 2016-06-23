
@inject('steps','App\Http\Utilities\Steps')

@extends('template')

@section('content')
    <div class="row">
        <div class="col-sm-5">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-warning" id="stat-grp">{{ isset($codes) ? count($codes) : 0 }}</span>
                    <h5> &nbsp; Codes</h5>
                    <div class="ibox-tools">
                        <a href="#modalAddCode" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-plus-circle"></i></a>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                    <div class="ibox-content no-padding customheight">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>

                            <tr>


                                <th style="text-align:center;">#</th>
                                <th style="text-align:center;">Statut</th>
                                <th style="text-align:center;"> Groupe</th>
                                <th style="text-align:center;"> Etape</th>
                                <th style="text-align:center;">Description</th>

                            </tr>
                            </thead>
                            <tbody id="code-status-content">
                            @if(isset($codes))
                                @foreach($codes as $code)
                                    <tr>
                                        <td><button class="btn btn-xs btn-primary editcodestatus" data-group-id="{{ $code->group->id }}" data-id="{{ $code->id }}" data-label="{{ $code->label }}" data-step="{{ $code->step }}"  data-description="{{ $code->description }}" ><i class="fa fa-pencil"></i></button></td>
                                        <td style="text-align:center;">{{ $code->label }}</td>
                                        <td style="text-align:center;">{{ $code->group->label }}</td>
                                        <td style="text-align:center;">{{ $code->step }}</td>
                                        <td style="text-align:center;">{{ $code->description }}</td>
                                    </tr>
                                @endforeach
                            @else <tr><td>Pas d'enregistrements</td></tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal add codes -->
    <div id="modalAddCode" class="modal fade" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!--Modal Content-->
            <div class="modal-content">
                <form method="post" role="form" autocomplete="off" id="formAddCode">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">x</span></button>
                        <h4 class="modal-title" > Ajout Code Statut</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Statut :</label>
                                    <input class="form-control" id="label" name="label"  autofocus required/>
                                </div>
                                <div class="form-group">
                                    <label>Groupe :</label>
                                    <select name="group_status_id" id="group_status_id" class="form-control" required>
                                        <option value="" selected disabled="">--</option>
                                        @if(isset($groupes))
                                            @foreach($groupes as $group)
                                                <option value="{{ $group->id }}"> {{ $group->label }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Etape :</label>
                                    <select name="step" id="step" class="form-control" required>
                                        <option value="" selected disabled="">--</option>
                                        @foreach($steps::getBig() as $step)
                                        <option value="{{ $step }}"> {{ $step }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description :</label>
                                    <textarea rows="5" cols="30" class="form-control" id="description" name="description" required ></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Etape_Etape :</label>
                                    <select name="step_step" id="step_step" class="form-control" required>
                                        <option value="" selected disabled="">--</option>
                                        @foreach($steps::getDetails() as $step)
                                            <option value="{{ $step }}"> {{ $step }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="_action" value="addCode" />
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" id="btnSubmitFormEditClient" class="btn btn-info">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal edit codes -->
    <div id="modalEditCode" class="modal fade" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!--Modal Content-->
            <div class="modal-content">
                <form method="post" role="form" autocomplete="off" id="formEditCode">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">x</span></button>
                        <h4 class="modal-title" > Modification Code Statut</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Statut :</label>
                                    <input class="form-control" id="editlabel" name="label"  autofocus required/>
                                </div>
                                <div class="form-group">
                                    <label>Groupe :</label>
                                    <select name="group_status_id" id="editgroup_status_id" class="form-control" required>
                                        <option value="" selected disabled="">--</option>
                                        @if(isset($groupes))
                                            @foreach($groupes as $group)
                                                <option value="{{ $group->id }}"> {{ $group->label }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Etape :</label>
                                    <select name="step" id="editstep" class="form-control" required>
                                        <option value="" selected disabled="">--</option>
                                        @foreach($steps::getBig() as $step)
                                        <option value="{{ $step }}"> {{ $step }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description :</label>
                                    <textarea rows="5" cols="30" class="form-control" id="editdescription" name="description" required ></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Etape_Etape :</label>
                                    <select name="step_step" id="editstep_step" class="form-control" required>
                                        <option value="" selected disabled="">--</option>
                                        @foreach($steps::getDetails() as $step)
                                            <option value="{{ $step }}"> {{ $step }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="_action" value="editCode" />
                        <input type="hidden" name="editid" id="editid" value="" />
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" id="btnSubmitFormEditCode" class="btn btn-info">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop


@section('script.codes')
    <script type="text/javascript">
        $(document).ready(function(){
           // loadCurrentArtistPart();
            $('.editcodestatus').click(function(){
                var label = $(this).data('label'),
                 group = $(this).data('group-id'),
                 step = $(this).data('step'),
                 desc = $(this).data('description'),
                 step_step = $(this).data('detailstep'),
                 id = $(this).data('id');
console.log(id);

                $('#editlabel').val(label);
                $('#editgroup_status_id').val(group);
                $('#editstep').val(step);
                $('#editdescription').text(desc);
                $('#editstep_step').val(step_step);
                $('#editid').val(id);

                $('#modalEditCode').modal('toggle');

            });
        });


        function loadCurrentArtistPart()
        {
            var container = $('#content_list');

            container.load('./status/codes', function( response, status, xhr) {
                if (status == 'error')
                {
                    $.gritter.add({
                        title: 'Attention, an error has occured !',
                        text: 'Content can\'t be loaded, please try again or contact an administrator !'
                    });
                }
            });

        }
    </script>
@stop