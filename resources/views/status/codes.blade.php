
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
                    <div class="ibox-content no-padding">
                        @if( isset($codes) && count($codes) > 1 )
                            @foreach($codes as $code)

                            <p>{{ $code }}</p>
                            @endforeach


                        @else <p>Pas d'enregistrements</p>
                        @endif

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
@stop


@section('script.codes')
    <script type="text/javascript">
        $(document).ready(function(){
           // loadCurrentArtistPart();
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