@extends('template')


@section('content')
    <div class="row">

        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Client</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link" id="btn_collapse_formsearch">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form id="formClient" role="form" autocomplete="off">
                        <div class="row">

                            <div class="col-lg-8">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control input-sm" value=" {{$client->LastName.' '. $client->FirstName}}" autocomplete="off" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">%</span>
                                        <input type="text" class="form-control input-sm " value="{{$client->Tva}}" placeholder="TVA" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope-square"></i></span>
                                        <input type="text" class="form-control input-sm" value="{{$client->Email}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <div class="input-group">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
                                        <input type="text" class="form-control input-sm " placeholder="Mobile" value="{{$client->Mobile}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                        <input type="text" class="form-control input-sm " placeholder="Bureau"  value="{{$client->Office}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-fax"></i></span>
                                        <input type="text" class="form-control input-sm " placeholder="Fax"  value="{{$client->Fax}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <div class="input-group">
                                        <textarea rows="5" cols="50" placeholder="Adresse" disabled>{{ $client->Address }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Appareil</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link" >
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form id="formDevice" role="form" autocomplete="off">
                        <div class="row">

                            <div class="col-lg-8">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                        <input type="text" class="form-control input-sm" placeholder="numero de serie" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <select name="model_id" id="model_id" class="form-control" required>
                                        <option value="" selected disabled="">Modéles</option>
                                        @if(isset($modeles))
                                            @foreach($modeles as $mod)
                                                <option value="{{ $mod->id }}"> {{ $mod->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Accessoires ?</label>
                                    <div data-toggle="buttons">
                                        <label class="btn btn-outline btn-info btn-circle dim "><input type="radio" name="accessory" value="1"><i class="fa fa-check"></i></label>
                                        <label class="btn btn-outline btn-danger btn-circle dim "><input type="radio" name="accessory" value="0" checked="checked"><i class="fa fa-times"></i></label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group" id="data_3">
                                    <label>Date Achat</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Description :</label>
                                    <textarea rows="5" cols="20" class="form-control" name="address"></textarea>
                                </div>
                            </div>
                        </div>


                    </form>



                </div>
            </div>
        </div>


    </div>

@stop




@section('script.files')
    <script>
        $(document).ready(function(){
            $('#data_3 .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "dd/mm/yyyy"
            });


        });


    </script>
@stop