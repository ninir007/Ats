@extends('template')

@section('content')
    <div class="row">
        <div class="col-sm-8">
            <div class="ibox">
                <div class="ibox-content">
                    <span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span>
                    <h2>Clients</h2>
                    <button type="button" name="createclient" class="btn btn-info btn-xs m-l-sm" data-toggle="modal" data-target="#modalAddClient">Créer</button>


                    <div class="input-group" style="padding-top: 5px">
                        <input type="text" placeholder="Search client " class="input form-control">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Search</button>
                                </span>
                    </div>
                    <div class="clients-list">
                        <ul class="nav nav-tabs">
                            <span class="pull-right small text-muted">{{ count($clients) }} Elements</span>
                            <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> Particulier</a></li>
                        </ul>
                        <div class="tab-content ">
                            <div id="tab-1" class="tab-pane active">
                                <div class="full-height-scroll">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                            @if(isset($clients))

                                                @foreach($clients as $client)

                                                    <tr>
                                                        <td class="client-avatar"><img alt="image" src="img/img_generic_person.jpg"> </td>
                                                        <td><a data-toggle="tab" rel="{{$client->id}}" class="client-link">{{$client->lastname}} {{$client->firstname}}</a></td>
                                                        <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                        <td> {{$client->mobile}}</td>
                                                        <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                        <td> {{$client->email}}</td>
                                                        <td class="client-status"><span class="label label-info">Actif</span></td>
                                                    </tr>

                                                @endforeach

                                            @else    <tr><th colspan="5" style="text-align: center">Pas d'enregistrement!</th></tr>
                                            @endif


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="ibox ">

                <div class="ibox-content">
                    <div class="tab-content clientdetails">
                            <!--//FILLED DYNAMICALLY BY THE AJAX RESPONSE-->
                                    <div id="tab-pane" class="tab-pane">
                                        <div class="row m-b-lg">
                                            <div class="col-lg-4 text-center">
                                                <h2 id="details-name"></h2>

                                                <div class="m-b-sm">
                                                    <img id="details-pic" alt="image" class="img-circle" src="" style="width: 62px">
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <strong>
                                                    Email
                                                </strong>

                                                <p id="detail-mail">

                                                </p>
                                                <a type="button" id="details-mail" class="btn btn-primary btn-sm btn-block" href=""><i class="fa fa-envelope"></i> Mail
                                                </a>
                                                <a id="new-file" class="btn btn-success btn-sm btn-block" href=""><i class="fa fa-th-large"></i>  Créer Fiche </a>

                                                <a id="details-id" class="btn btn-warning btn-sm btn-block editClient" data-toggle="modal" data-target="#modalEditClient"><i class="fa fa-pencil"></i> Editer </a>
                                                <small id="details-updt" ></small>
                                            </div>
                                        </div>
                                        <div class="client-detail">
                                            <div class="full-height-scroll">

                                                <h3 style="color: #1ab394;text-decoration: underline;"><strong>Détails</strong></h3>

                                                <ul class="list-group clear-list">
                                                    <li class="list-group-item fist-item">
                                                        <span id="details-creation" class="pull-right">  </span>
                                                        <strong>Création : </strong>
                                                    </li>
                                                    <li class="list-group-item details-tva" style="display: none">
                                                        <span id="details-tva" class="pull-right"></span>
                                                        <strong>TVA : </strong>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span id="details-address" class="pull-right"></span>
                                                        <strong>Adresse : </strong>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span id="details-mobile" class="pull-right"> </span>
                                                        <strong>Mobile : </strong>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span id="details-office" class="pull-right">  </span>
                                                        <strong>Bureau : </strong>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span id="details-fax" class="pull-right"> </span>
                                                        <strong>Fax : </strong>
                                                    </li>

                                                </ul>

                                                <hr>
                                                <strong>Historique d'activités</strong>
                                                <div id="vertical-timeline" class="vertical-container dark-timeline files-history">

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal add clients -->
    <div id="modalAddClient" class="modal fade" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!--Modal Content-->
            <div class="modal-content">
                <form method="post" role="form" autocomplete="off" id="formAddClient">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">x</span></button>
                        <h4 class="modal-title">Nouveau client</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nom :</label>
                                    <input class="form-control" name="lastname" required autofocus/>
                                </div>
                                <div class="form-group">
                                    <label>Prénom :</label>
                                    <input class="form-control" name="firstname" required/>
                                </div>
                                <div class="form-group">
                                    <label>Email :</label>
                                    <input class="form-control" type="email" name="email" required/>
                                </div>
                                <div class="form-group">
                                    <label>Rue :</label>
                                    <textarea rows="5" cols="30" class="form-control" name="street"  required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Code Postal :</label>
                                    <input class="form-control"  name="postal_code" required/>
                                </div>


                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ville :</label>
                                    <input class="form-control"  name="city" required/>
                                </div>
                                <div class="form-group">
                                    <label> Mobile:</label>
                                    <input class="form-control" name="mobile"  required />
                                </div>


                                <div class="form-group">
                                    <label>Bureau :</label>
                                    <input class="form-control" name="office"  placeholder="( facultatif)"/>
                                </div>
                                <div class="form-group">
                                    <label>Fax :</label>
                                    <input class="form-control" name="fax"  placeholder="( facultatif)"/>
                                </div>
                                <div class="form-group">
                                    <label>TVA :</label>
                                    <input class="form-control" name="vat"  placeholder="( facultatif) "/>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="_action" value="createClient" />
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" id="btnSubmitFormAddClient" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal edit clients -->
    <div id="modalEditClient" class="modal fade" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!--Modal Content-->
            <div class="modal-content">
                <form method="post" role="form" autocomplete="off" id="formEditClient">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">x</span></button>
                        <h4 class="modal-title" >Modification</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nom :</label>
                                    <input class="form-control" id="editlastname" name="lastname"  autofocus/>
                                </div>
                                <div class="form-group">
                                    <label>Prénom :</label>
                                    <input class="form-control" id="editfirstname" name="firstname" />
                                </div>
                                <div class="form-group">
                                    <label>Email :</label>
                                    <input class="form-control" type="email" id="editemail" name="email" />
                                </div>

                                <div class="form-group">
                                    <label>Rue :</label>
                                    <textarea rows="5" cols="30" class="form-control" id="editstreet" name="street"  required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Code Postal :</label>
                                    <input class="form-control" id="editpostal" name="postal_code" required/>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ville :</label>
                                    <input class="form-control" id="editcity" name="city" required/>
                                </div>

                                <div class="form-group">
                                    <label> Mobile:</label>
                                    <input class="form-control" id="editmobile" name="mobile"  />
                                </div>
                                <div class="form-group">
                                    <label>Bureau :</label>
                                    <input class="form-control" id="editoffice" name="office"  />
                                </div>
                                <div class="form-group">
                                    <label>Fax :</label>
                                    <input class="form-control" id="editfax" name="fax"  />
                                </div>
                                <div class="form-group">
                                    <label>TVA :</label>
                                    <input class="form-control" id="edittva" name="tva"  />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="_action" value="editClient" />
                        <input type="hidden" id="id-edit" name="id" />
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" id="btnSubmitFormEditClient" class="btn btn-warning">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

@section('script.client')
    <script type="text/javascript">
        client='';
        $('.client-link').click(function() {

          var idclient = $(this).attr('rel');
            var x = $.ajax({
                url: './clients',
                dataType: 'json',
                type: 'POST',
                data: '_action=getClientByID&_uid='+idclient,

                'complete' : function(xhr) {
                    var response = JSON.parse( xhr.responseText );

                    if(response.status == 'success')
                    {
                        console.log(response);
                        detailclient = response.client;

                        // set the href button for new file creation
                       // $('#new-file').attr('href', "/new-file/"+detailclient.id);
                        $('#new-file').attr('href', "/create/file/"+detailclient.id);

                        //set the new details field
                        $('#details-name').text( detailclient.firstname+ " " +detailclient.lastname);
                        $('#details-pic').attr('src', 'img/img_generic_person.jpg');
                        $('#details-mail').attr('href', "mailto:"+detailclient.email+"?subject=ATS Repair Center&amp;body=Bonjour");
                        $('#detail-mail').text( detailclient.email);
                        $('#details-updt').text( "Derniére modification: "+detailclient.updated_at);
                        $('#details-creation').text( detailclient.created_at);
                        $('#details-address').text( detailclient.street + ', ' +detailclient.postal_code+ ' ' +detailclient.city);
                        $('#details-mobile').text( detailclient.mobile);
                        $('#details-office').text( detailclient.office);
                        $('#details-fax').text( detailclient.fax);
                        $('.details-tva').hide();
                            if(detailclient.vat != '')
                            {
                                $('#details-tva').text( detailclient.vat);
                                $('.details-tva').show();
                            }

                        //set the file history part
                        var files = detailclient.files;
                        var template = "";
                        $.each(files, function(key, data){

                            var temp1 =  "<div class='vertical-timeline-block'><div class='vertical-timeline-icon navy-bg'>";
                            var icone = (data.type == 'REPAIR') ? "<i class='fa fa-wrench'></i>" : "<i class='fa fa-file-text'></i>";
                            var temp2= "</div><div class='vertical-timeline-content project-title'><p>";
                            var cont = "<a href='/file/repair/"+data.id+"'>Fiche #" + data.id + "</a><br>" + data.intern_report;
                            var temp3= "</p><span class='vertical-date small text-muted'>";
                            var dtime = data.created_at;
                            var temp4 = "</span></div></div>";
                            template += temp1+ icone+ temp2+ cont+ temp3+ dtime+ temp4;
                        });

                        $('.files-history').html(template);

            //reveal the side panel
            $('#tab-pane').show();

                        // set the form edit fields
                        $('#editfirstname').val(detailclient.firstname);
                        $('#id-edit').val(detailclient.id);
                        $('#editlastname').val( detailclient.lastname);
                        $('#edittva').val( detailclient.vat);
                        $('#editemail').val( detailclient.email);
                        $('#editmobile').val( detailclient.mobile);
                        $('#editoffice').val( detailclient.office);
                        $('#editfax').val( detailclient.fax);
                        $('#editcity').val( detailclient.city);
                        $('#editpostal').val( detailclient.postal_code);
                        $('#editstreet').text( detailclient.street);

                    }
                    else
                    {
                        alert('erreur DB !');
                    }
                    return true;
                }
            });

        });
    </script>
@stop
