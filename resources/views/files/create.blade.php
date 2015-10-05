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
                                    <input type="hidden" class="form-control input-sm" name="client_id" value="{{$client->id}}" disabled>

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
                    <form id="formDevice" method="post" autocomplete="off" role="form">
                        <div class="row">

                            <div class="col-lg-8">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                        <input type="text" class="form-control input-sm" placeholder="numero de serie" autocomplete="off" name="serial_number" id="serial_number" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description </label>
                                    <textarea rows="4" cols="20" class="form-control" name="description" id="description"></textarea>
                                </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Accessoires ?</label>
                                            <div data-toggle="buttons">
                                                <label class="btn btn-outline btn-info btn-circle dim "><input type="radio" name="accessory" value="1"><i class="fa fa-check"></i></label>
                                                <label class="btn btn-outline btn-danger btn-circle dim "><input type="radio" name="accessory" value="0" checked="checked"><i class="fa fa-times"></i></label>
                                            </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group" id="data_3">
                                            <label>Date Achat</label>
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="text" class="form-control" name="purchased_at" value="">
                                            </div>
                                        </div>
                                    </div>

                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Categorie</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>
                                        <input type="text" id="categorie" class="form-control" value="" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Marque</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-television"></i></span>
                                        <input type="text" id="marque" class="form-control" value="" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select name="model_id" id="model_select" class="form-control" required>
                                        <option value="" selected disabled="">Modéles</option>
                                        @if(isset($modeles))
                                            @foreach($modeles as $mod)
                                                <option value="{{ $mod->id }}" data-cat="{{$mod->category->name}}" data-brand="{{$mod->brand->name}}"> {{ $mod->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">

                                    <div class="input-group date">
                                        <button type="submit" id="validation-device-btn" class="btn btn-w-m btn-primary"><i class="fa fa-refresh"></i> Valider</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>



                </div>
            </div>
        </div>


    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Details</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link" >
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form id="form" role="form" autocomplete="off">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Rapport Interne </label>
                                    <textarea rows="4" cols="20" class="form-control" name="intern_report"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Rapport Client </label>
                                    <textarea rows="4" cols="20" class="form-control" name="client_report"></textarea>
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


            handlePurchasedCalendar();
            handleSelectModele();

            $('#formDevice').submit(function(){
                handleSubmitFormDeviceValidation();
                return false;
            });


        });

        function handleSubmitFormDeviceValidation()
        {
            $.ajax({
                'url' : './devices',
                'data' : '_action=addDevice&'+$('#formDevice').serialize(),
                'dataType' : 'json',
                'type' : 'POST',
                'beforeSend' : function()
                {
                    simpleLoad(true);
                },
                'complete' : function(xhr) {
                    simpleLoad(false);
                    if(xhr.status == '200')
                    {
                        var response = JSON.parse( xhr.responseText );
                        if(response.status == 'success')
                        {
                            $.gritter.add({
                                title: 'Succes !',
                                text: 'Votre ajout a été effectué !'
                            });
                        }
                        //window.location.reload();
                        return false;

                    }
                    else {
                        $.gritter.add({
                            title: 'Attention, une erreur est survenue !',
                            text: "Validation échouée !"
                        });
                    }
                    return false;
                }
            });
            return false;
        }

        function simpleLoad( state) {
            var btn = $('#validation-device-btn');
            if (state)
            {
                btn.children().addClass('fa-spin');
                btn.contents().last().replaceWith(" Patienter");
            }
            else
            {
                btn.children().removeClass('fa-spin');
                btn.contents().last().replaceWith(" Valider");
            }
        }
        function  handlePurchasedCalendar()
        {
            var today = new Date();
            $('#data_3 .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                endDate: today,
                format: "dd/mm/yyyy"
            });
        }
        function handleSelectModele()
        {
            /*$( "#model_select" ).change(function () {
                var str = "";
                var cat = $(this).data('cat').text();
                var brand = $(this).data('brand');
                alert(brand);

             });*/

            $('#model_select').on('change', function() {
                $( "#model_select option:selected" ).each(function() {
                    var str = $( this ).data('brand');
                    $( "#marque" ).val( str );

                    str= $( this ).data('cat');
                    $( "#categorie" ).val( str );
                });
                /*var brand = $(this).data('brand');
                console.log($(this));*/
                //alert( brand );
            });
        }


    </script>
@stop