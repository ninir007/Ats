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
                            <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase"></i> Société</a></li>
                        </ul>
                        <div class="tab-content ">
                            <div id="tab-1" class="tab-pane active">
                                <div class="full-height-scroll">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                            @if(isset($clients))

                                                @foreach($clients as $client)
                                                    @if(($client->Tva) == '')
                                                    <tr>
                                                        <td class="client-avatar"><img alt="image" src="img/img_generic_person.jpg"> </td>
                                                        <td><a data-toggle="tab" rel="{{$client->id}}" class="client-link">{{$client->LastName}} {{$client->FirstName}}</a></td>
                                                        <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                        <td> {{$client->Mobile}}</td>
                                                        <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                        <td> {{$client->Email}}</td>
                                                        <td class="client-status"><span class="label label-info">Actif</span></td>
                                                    </tr>
                                                    @endif
                                                @endforeach

                                            @else    <tr><th colspan="5" style="text-align: center">Pas d'enregistrement!</th></tr>
                                            @endif


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="full-height-scroll">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                            @if(isset($clients))
                                                    @foreach($clients as $client)
                                                        @if(($client->Tva) != '')
                                                        <tr>
                                                            <td class="client-avatar"><img alt="image" src="img/briefcase-logo.JPG"> </td>
                                                            <td><a data-toggle="tab" rel="{{$client->id}}" href="#company-{{$client->id}}" class="client-link">{{$client->LastName}} {{$client->FirstName}}</a></td>
                                                            <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                            <td> {{$client->Office}}</td>
                                                            <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                            <td> {{$client->Email}}</td>
                                                            <td class="client-status"><span class="label label-info">Actif</span></td>
                                                        </tr>
                                                        @endif

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
                                                <div id="vertical-timeline" class="vertical-container dark-timeline">
                                                    <div class="vertical-timeline-block">
                                                        <div class="vertical-timeline-icon gray-bg">
                                                            <i class="fa fa-coffee"></i>
                                                        </div>
                                                        <div class="vertical-timeline-content">
                                                            <p>Conference on the sales results for the previous year.
                                                            </p>
                                                            <span class="vertical-date small text-muted"> 2:10 pm - 12.06.2014 </span>
                                                        </div>
                                                    </div>
                                                    <div class="vertical-timeline-block">
                                                        <div class="vertical-timeline-icon gray-bg">
                                                            <i class="fa fa-briefcase"></i>
                                                        </div>
                                                        <div class="vertical-timeline-content">
                                                            <p>Many desktop publishing packages and web page editors now use Lorem.
                                                            </p>
                                                            <span class="vertical-date small text-muted"> 4:20 pm - 10.05.2014 </span>
                                                        </div>
                                                    </div>
                                                    <div class="vertical-timeline-block">
                                                        <div class="vertical-timeline-icon gray-bg">
                                                            <i class="fa fa-bolt"></i>
                                                        </div>
                                                        <div class="vertical-timeline-content">
                                                            <p>There are many variations of passages of Lorem Ipsum available.
                                                            </p>
                                                            <span class="vertical-date small text-muted"> 06:10 pm - 11.03.2014 </span>
                                                        </div>
                                                    </div>
                                                    <div class="vertical-timeline-block">
                                                        <div class="vertical-timeline-icon navy-bg">
                                                            <i class="fa fa-warning"></i>
                                                        </div>
                                                        <div class="vertical-timeline-content">
                                                            <p>The generated Lorem Ipsum is therefore.
                                                            </p>
                                                            <span class="vertical-date small text-muted"> 02:50 pm - 03.10.2014 </span>
                                                        </div>
                                                    </div>
                                                    <div class="vertical-timeline-block">
                                                        <div class="vertical-timeline-icon gray-bg">
                                                            <i class="fa fa-coffee"></i>
                                                        </div>
                                                        <div class="vertical-timeline-content">
                                                            <p>Conference on the sales results for the previous year.
                                                            </p>
                                                            <span class="vertical-date small text-muted"> 2:10 pm - 12.06.2014 </span>
                                                        </div>
                                                    </div>
                                                    <div class="vertical-timeline-block">
                                                        <div class="vertical-timeline-icon gray-bg">
                                                            <i class="fa fa-briefcase"></i>
                                                        </div>
                                                        <div class="vertical-timeline-content">
                                                            <p>Many desktop publishing packages and web page editors now use Lorem.
                                                            </p>
                                                            <span class="vertical-date small text-muted"> 4:20 pm - 10.05.2014 </span>
                                                        </div>
                                                    </div>
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
                                    <label>Adresse :</label>
                                    <textarea rows="5" cols="30" class="form-control" name="address" placeholder="Adresse valable du client" required></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>TVA :</label>
                                    <input class="form-control" name="tva"  placeholder="( facultatif) "/>
                                </div>
                                <div class="form-group">
                                    <label> Mobile:</label>
                                    <input class="form-control" name="mobile"  placeholder="( facultatif)"/>
                                </div>
                                <div class="form-group">
                                    <label>Bureau :</label>
                                    <input class="form-control" name="office"  placeholder="( facultatif)"/>
                                </div>
                                <div class="form-group">
                                    <label>Fax :</label>
                                    <input class="form-control" name="fax"  placeholder="( facultatif)"/>
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
                                    <label>Adresse :</label>
                                    <textarea rows="5" cols="30" class="form-control" id="editaddress" name="address" ></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>TVA :</label>
                                    <input class="form-control" id="edittva" name="tva"  />
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
                        detailclient = response.client[0];



                        // set the href button for new file creation
                        $('#new-file').attr('href', "/new-file/"+detailclient.id);



                        //set the new details field

                        $('#details-name').text( detailclient.FirstName+ " " +detailclient.LastName);
                        $('#details-pic').attr('src', 'img/img_generic_person.jpg');
                        $('#details-mail').attr('href', "mailto:"+detailclient.Email+"?subject=ATS Repair Center&amp;body=Bonjour");
                        $('#detail-mail').text( detailclient.Email);
                        $('#details-updt').text( "Derniére modification: "+detailclient.updated_at);
                        $('#details-creation').text( detailclient.created_at);
                        $('#details-address').text( detailclient.Address);
                        $('#details-mobile').text( detailclient.Mobile);
                        $('#details-office').text( detailclient.Office);
                        $('#details-fax').text( detailclient.Fax);
                        $('.details-tva').hide();
                            if(detailclient.Tva != '')
                            {
                                $('#details-pic').attr('src',  'img/briefcase-logo.JPG');

                                $('#details-tva').text( detailclient.Tva);
                                $('.details-tva').show();
                            }
                            $('#tab-pane').show();



                        // set the form edit fields

                        $('#editfirstname').val(detailclient.FirstName);
                        $('#id-edit').val(detailclient.id);
                        $('#editlastname').val( detailclient.LastName);
                        $('#editaddress').text( detailclient.Address);
                        $('#edittva').val( detailclient.Tva);
                        $('#editemail').val( detailclient.Email);
                        $('#editmobile').val( detailclient.Mobile);
                        $('#editoffice').val( detailclient.Office);
                        $('#editfax').val( detailclient.Fax);
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
