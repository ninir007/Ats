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
                                    <select name="device_id" data-placeholder="Numéro de serie" id="device_select" style="width:350px;" required >
                                        @if(isset($devices))
                                            <option value=""></option>
                                            @foreach($devices as $device)
                                                <option value="{{ $device->id }}" data-modeleid="{{ $device->model_id }}" data-desc="{{ $device->description }}" data-purchased="{{ $device->purchased_at }}" > {{ $device->serial_number }}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="hr-line-dashed"></div>
                            <div class="col-lg-8">

                                <div class="form-group">
                                    <label>Description </label>
                                    <textarea rows="4" cols="20" class="form-control lockable" name="description" id="description_device"></textarea>
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
                                                <input type="text" class="form-control lockable" name="purchased_at" value="" id="purchaseddevice">
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
                                    <select name="model_id" id="model_select" class="form-control lockable" required>
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
                                        <button type="submit" id="validation-device-btn" class="btn btn-w-m btn-primary tourne"><i class="fa fa-refresh"></i> Valider</button>
                                        <button type="submit" id="submitCreationBtn" class="btn btn-w-m btn-primary hidden tourne"><i class="fa fa-refresh" style=""></i> Créer</button>
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
                    <form id="formcreatefile" role="form" autocomplete="off">
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
                        <div class="row">
                            <input type="hidden" val="" name="">
                            <input type="hidden" val="" name="">
                            <input type="hidden" val="" name="">
                            <button type="submit" id="create_file" class="btn btn-w-m btn-primary pull-right"> Créer</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop




@section('script.files')
    <script>
        setSmartSelectionDevice();

        $(document).ready(function(){
            disableInputs();
            handlePurchasedCalendar();
            handleSelectModele();
            handleSelectDevice();


            $('#validation-device-btn').click(function(e){
                e.preventDefault();
                handleSubmitFormDeviceValidation()
            });
            $('#submitCreationBtn').click(function(e) {
                e.preventDefault();

                handleSubmitFormAddDevice()
            });


        });

        function disableInputs()
        {
            $('.lockable').prop('disabled', true);
            $('#validation-device-btn').removeClass('hidden');
            $('#submitCreationBtn').addClass('hidden');
        }
        function enableInputs()
        {
            $('#validation-device-btn').addClass('hidden');
            $('#submitCreationBtn').removeClass('hidden');
            $('.lockable').prop('disabled', false);
            $('.lockable').val('');
        }

        function handleSubmitFormAddDevice()
        {
            alert('koi add ?');
            var newserial = $('#device_select option:selected').text();
            $.ajax({
                'url' : './devices',
                'data' : '_action=addDevice&serial_number='+newserial+'&'+$('#formDevice').serialize(),
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
                                text: 'Appareil ajouté !'
                            });
                        }
                        //window.location.reload();
                        return false;

                    }
                    else {
                        $.gritter.add({
                            title: 'Attention, une erreur est survenue !',
                            text: "Ajout appareil a échoué !"
                        });
                    }
                    return false;
                }
            });
            return false;
        }
        function handleSubmitFormDeviceValidation()
        {
            alert('koi valid  ?');
            var inputs = $('#formDevice').serialize();
            console.log(inputs);
            $.ajax({
                'url' : './devices',
                'data' : '_action=validateDevice&'+$('#formDevice').serialize(),
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
                                text: 'Validation effectuée !'
                            });
                        }
                        else
                        {
                            $.gritter.add({
                                title: 'Attention, une erreur est survenue !',
                                text: "Erreur DB : validation échouée !"
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
            var btn = $('.tourne');
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

            $('#model_select').on('change', function() {
                $( "#model_select option:selected" ).each(function() {
                    var str = $( this ).data('brand');
                    $( "#marque" ).val( str );

                    str= $( this ).data('cat');
                    $( "#categorie" ).val( str );
                });

            });
        }
        function populateLockedField()
        {
            $( "#model_select option:selected" ).each(function() {
                var str = $( this ).data('brand');
                $( "#marque" ).val( str );

                str= $( this ).data('cat');
                $( "#categorie" ).val( str );
            });
        }
        function handleSelectDevice()
        {
            $('#device_select').on('change', function() {
                $( "#device_select option:selected" ).each(function() {
                    if($(this).attr('value') != 'new')
                    {
                        disableInputs();
                        var str = $( this ).data('modeleid');
                        $( "#model_select" ).val( str );
                        str = $( this ).data('desc');
                        $( "#description_device" ).val( str );
                        str = $( this ).data('purchased');
                        $( "#purchaseddevice" ).val( str );
                    }

                    else
                    {
                        enableInputs();
                    }

                    populateLockedField();

                });

            });
        }
        function setSmartSelectionDevice()
        {
            var select, chosen;

            // cache the select element as we'll be using it a few times
                        select = $("#device_select");

            // init the chosen plugin
                        select.chosen({
                            no_results_text: "ya pas ",
                            width: "95%"
                        });

            // get the chosen object
                        chosen = select.data('chosen');

            // Bind the keyup event to the search box input
            chosen.dropdown.find('input').on('keyup', function(e)
            {
                // if we hit Enter and the results list is empty (no matches) add the option
                if (e.which == 13 && chosen.dropdown.find('li.no-results').length > 0)
                {
                    var option = $("<option>").val('new').text(this.value);

                    // add the new option
                    select.prepend(option);
                    // automatically select it
                    select.find(option).prop('selected', true);
                    // trigger the update
                    select.trigger("chosen:updated");

                    $( "#device_select option:selected" ).each(function() {
                        if( $(this).attr('value') == 'new') {
                            populateLockedField();
                            enableInputs()
                        }


                    });
                }


            });

        }



    </script>
@stop