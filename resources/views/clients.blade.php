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
                            <span class="pull-right small text-muted">1406 Elements</span>
                            <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> Particulier</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase"></i> Société</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="full-height-scroll">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                            <tr>
                                                <td class="client-avatar"><img alt="image" src="img/a2.jpg"> </td>
                                                <td><a data-toggle="tab" href="#contact-1" class="client-link">Anthony Jackson</a></td>
                                                <td> Tellus Institute</td>
                                                <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                <td> gravida@rbisit.com</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><img alt="image" src="img/a3.jpg"> </td>
                                                <td><a data-toggle="tab" href="#contact-2" class="client-link">Rooney Lindsay</a></td>
                                                <td>Proin Limited</td>
                                                <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                <td> rooney@proin.com</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><img alt="image" src="img/a4.jpg"> </td>
                                                <td><a data-toggle="tab" href="#contact-3" class="client-link">Lionel Mcmillan</a></td>
                                                <td>Et Industries</td>
                                                <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                <td> +432 955 908</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><a href=""><img alt="image" src="img/a5.jpg"></a> </td>
                                                <td><a data-toggle="tab" href="#contact-4" class="client-link">Edan Randall</a></td>
                                                <td>Integer Sem Corp.</td>
                                                <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                <td> +422 600 213</td>
                                                <td class="client-status"><span class="label label-warning">Waiting</span></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><a href=""><img alt="image" src="img/a6.jpg"></a> </td>
                                                <td><a data-toggle="tab" href="#contact-2" class="client-link">Jasper Carson</a></td>
                                                <td>Mone Industries</td>
                                                <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                <td> +400 468 921</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><a href=""><img alt="image" src="img/a7.jpg"></a> </td>
                                                <td><a data-toggle="tab" href="#contact-3" class="client-link">Reuben Pacheco</a></td>
                                                <td>Magna Associates</td>
                                                <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                <td> pacheco@manga.com</td>
                                                <td class="client-status"><span class="label label-info">Phoned</span></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><a href=""><img alt="image" src="img/a1.jpg"></a> </td>
                                                <td><a data-toggle="tab" href="#contact-1" class="client-link">Simon Carson</a></td>
                                                <td>Erat Corp.</td>
                                                <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                <td> Simon@erta.com</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><a href=""><img alt="image" src="img/a3.jpg"></a> </td>
                                                <td><a data-toggle="tab" href="#contact-2" class="client-link">Rooney Lindsay</a></td>
                                                <td>Proin Limited</td>
                                                <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                <td> rooney@proin.com</td>
                                                <td class="client-status"><span class="label label-warning">Waiting</span></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><a href=""><img alt="image" src="img/a4.jpg"></a> </td>
                                                <td><a data-toggle="tab" href="#contact-3" class="client-link">Lionel Mcmillan</a></td>
                                                <td>Et Industries</td>
                                                <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                <td> +432 955 908</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><a href=""><img alt="image" src="img/a5.jpg"></a> </td>
                                                <td><a data-toggle="tab" href="#contact-4" class="client-link">Edan Randall</a></td>
                                                <td>Integer Sem Corp.</td>
                                                <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                <td> +422 600 213</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><a href=""><img alt="image" src="img/a2.jpg"></a> </td>
                                                <td><a data-toggle="tab" href="#contact-1" class="client-link">Anthony Jackson</a></td>
                                                <td> Tellus Institute</td>
                                                <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                <td> gravida@rbisit.com</td>
                                                <td class="client-status"><span class="label label-danger">Deleted</span></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><a href=""><img alt="image" src="img/a7.jpg"></a> </td>
                                                <td><a data-toggle="tab" href="#contact-2" class="client-link">Reuben Pacheco</a></td>
                                                <td>Magna Associates</td>
                                                <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                <td> pacheco@manga.com</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><a href=""><img alt="image" src="img/a5.jpg"></a> </td>
                                                <td><a data-toggle="tab" href="#contact-3" class="client-link">Edan Randall</a></td>
                                                <td>Integer Sem Corp.</td>
                                                <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                <td> +422 600 213</td>
                                                <td class="client-status"><span class="label label-info">Phoned</span></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><a href=""><img alt="image" src="img/a6.jpg"></a> </td>
                                                <td><a data-toggle="tab" href="#contact-4" class="client-link">Jasper Carson</a></td>
                                                <td>Mone Industries</td>
                                                <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                <td> +400 468 921</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><a href=""><img alt="image" src="img/a7.jpg"></a> </td>
                                                <td><a data-toggle="tab" href="#contact-2" class="client-link">Reuben Pacheco</a></td>
                                                <td>Magna Associates</td>
                                                <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                <td> pacheco@manga.com</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><a href=""><img alt="image" src="img/a1.jpg"></a> </td>
                                                <td><a data-toggle="tab" href="#contact-1" class="client-link">Simon Carson</a></td>
                                                <td>Erat Corp.</td>
                                                <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                <td> Simon@erta.com</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><a href=""><img alt="image" src="img/a3.jpg"></a> </td>
                                                <td><a data-toggle="tab" href="#contact-3" class="client-link">Rooney Lindsay</a></td>
                                                <td>Proin Limited</td>
                                                <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                <td> rooney@proin.com</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><a href=""><img alt="image" src="img/a4.jpg"></a> </td>
                                                <td><a data-toggle="tab" href="#contact-4" class="client-link">Lionel Mcmillan</a></td>
                                                <td>Et Industries</td>
                                                <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                <td> +432 955 908</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><a href=""><img alt="image" src="img/a5.jpg"></a> </td>
                                                <td><a data-toggle="tab" href="#contact-1" class="client-link">Edan Randall</a></td>
                                                <td>Integer Sem Corp.</td>
                                                <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                <td> +422 600 213</td>
                                                <td class="client-status"><span class="label label-info">Phoned</span></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><a href=""><img alt="image" src="img/a2.jpg"></a> </td>
                                                <td><a data-toggle="tab" href="#contact-2" class="client-link">Anthony Jackson</a></td>
                                                <td> Tellus Institute</td>
                                                <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                <td> gravida@rbisit.com</td>
                                                <td class="client-status"><span class="label label-warning">Waiting</span></td>
                                            </tr>
                                            <tr>
                                                <td class="client-avatar"><a href=""><img alt="image" src="img/a7.jpg"></a> </td>
                                                <td><a data-toggle="tab" href="#contact-4" class="client-link">Reuben Pacheco</a></td>
                                                <td>Magna Associates</td>
                                                <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                <td> pacheco@manga.com</td>
                                                <td class="client-status"></td>
                                            </tr>
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
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-1" class="client-link">Tellus Institute</a></td>
                                                <td>Rexton</td>
                                                <td><i class="fa fa-flag"></i> Angola</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-2" class="client-link">Velit Industries</a></td>
                                                <td>Maglie</td>
                                                <td><i class="fa fa-flag"></i> Luxembourg</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-3" class="client-link">Art Limited</a></td>
                                                <td>Sooke</td>
                                                <td><i class="fa fa-flag"></i> Philippines</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-1" class="client-link">Tempor Arcu Corp.</a></td>
                                                <td>Eisden</td>
                                                <td><i class="fa fa-flag"></i> Korea, North</td>
                                                <td class="client-status"><span class="label label-warning">Waiting</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-2" class="client-link">Penatibus Consulting</a></td>
                                                <td>Tribogna</td>
                                                <td><i class="fa fa-flag"></i> Montserrat</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-3" class="client-link"> Ultrices Incorporated</a></td>
                                                <td>Basingstoke</td>
                                                <td><i class="fa fa-flag"></i> Tunisia</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-2" class="client-link">Et Arcu Inc.</a></td>
                                                <td>Sioux City</td>
                                                <td><i class="fa fa-flag"></i> Burundi</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-1" class="client-link">Tellus Institute</a></td>
                                                <td>Rexton</td>
                                                <td><i class="fa fa-flag"></i> Angola</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-2" class="client-link">Velit Industries</a></td>
                                                <td>Maglie</td>
                                                <td><i class="fa fa-flag"></i> Luxembourg</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-3" class="client-link">Art Limited</a></td>
                                                <td>Sooke</td>
                                                <td><i class="fa fa-flag"></i> Philippines</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-1" class="client-link">Tempor Arcu Corp.</a></td>
                                                <td>Eisden</td>
                                                <td><i class="fa fa-flag"></i> Korea, North</td>
                                                <td class="client-status"><span class="label label-warning">Waiting</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-2" class="client-link">Penatibus Consulting</a></td>
                                                <td>Tribogna</td>
                                                <td><i class="fa fa-flag"></i> Montserrat</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-3" class="client-link"> Ultrices Incorporated</a></td>
                                                <td>Basingstoke</td>
                                                <td><i class="fa fa-flag"></i> Tunisia</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-2" class="client-link">Et Arcu Inc.</a></td>
                                                <td>Sioux City</td>
                                                <td><i class="fa fa-flag"></i> Burundi</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-1" class="client-link">Tellus Institute</a></td>
                                                <td>Rexton</td>
                                                <td><i class="fa fa-flag"></i> Angola</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-2" class="client-link">Velit Industries</a></td>
                                                <td>Maglie</td>
                                                <td><i class="fa fa-flag"></i> Luxembourg</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-3" class="client-link">Art Limited</a></td>
                                                <td>Sooke</td>
                                                <td><i class="fa fa-flag"></i> Philippines</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-1" class="client-link">Tempor Arcu Corp.</a></td>
                                                <td>Eisden</td>
                                                <td><i class="fa fa-flag"></i> Korea, North</td>
                                                <td class="client-status"><span class="label label-warning">Waiting</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-2" class="client-link">Penatibus Consulting</a></td>
                                                <td>Tribogna</td>
                                                <td><i class="fa fa-flag"></i> Montserrat</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-3" class="client-link"> Ultrices Incorporated</a></td>
                                                <td>Basingstoke</td>
                                                <td><i class="fa fa-flag"></i> Tunisia</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-2" class="client-link">Et Arcu Inc.</a></td>
                                                <td>Sioux City</td>
                                                <td><i class="fa fa-flag"></i> Burundi</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
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
                    <div class="tab-content">
                        <div id="contact-1" class="tab-pane active">
                            <div class="row m-b-lg">
                                <div class="col-lg-4 text-center">
                                    <h2>Nicki Smith</h2>

                                    <div class="m-b-sm">
                                        <img alt="image" class="img-circle" src="img/a2.jpg" style="width: 62px">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <strong>
                                        About me
                                    </strong>

                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                    <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message
                                    </button>
                                </div>
                            </div>
                            <div class="client-detail">
                                <div class="full-height-scroll">

                                    <strong>Last activity</strong>

                                    <ul class="list-group clear-list">
                                        <li class="list-group-item fist-item">
                                            <span class="pull-right"> 09:00 pm </span>
                                            Please contact me
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> 10:16 am </span>
                                            Sign a contract
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> 08:22 pm </span>
                                            Open new shop
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> 11:06 pm </span>
                                            Call back to Sylvia
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> 12:00 am </span>
                                            Write a letter to Sandra
                                        </li>
                                    </ul>
                                    <strong>Notes</strong>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                    <hr>
                                    <strong>Timeline activity</strong>
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
                        <div id="contact-2" class="tab-pane">
                            <div class="row m-b-lg">
                                <div class="col-lg-4 text-center">
                                    <h2>Edan Randall</h2>

                                    <div class="m-b-sm">
                                        <img alt="image" class="img-circle" src="img/a3.jpg" style="width: 62px">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <strong>
                                        About me
                                    </strong>

                                    <p>
                                        Many desktop publishing packages and web page editors now use Lorem Ipsum as their default tempor incididunt model text.
                                    </p>
                                    <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message
                                    </button>
                                </div>
                            </div>
                            <div class="client-detail">
                                <div class="full-height-scroll">

                                    <strong>Last activity</strong>

                                    <ul class="list-group clear-list">
                                        <li class="list-group-item fist-item">
                                            <span class="pull-right"> 09:00 pm </span>
                                            Lorem Ipsum available
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> 10:16 am </span>
                                            Latin words, combined
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> 08:22 pm </span>
                                            Open new shop
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> 11:06 pm </span>
                                            The generated Lorem Ipsum
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> 12:00 am </span>
                                            Content here, content here
                                        </li>
                                    </ul>
                                    <strong>Notes</strong>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.
                                    </p>
                                    <hr>
                                    <strong>Timeline activity</strong>
                                    <div id="vertical-timeline" class="vertical-container dark-timeline">
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
                        <div id="contact-3" class="tab-pane">
                            <div class="row m-b-lg">
                                <div class="col-lg-4 text-center">
                                    <h2>Jasper Carson</h2>

                                    <div class="m-b-sm">
                                        <img alt="image" class="img-circle" src="img/a4.jpg" style="width: 62px">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <strong>
                                        About me
                                    </strong>

                                    <p>
                                        Latin professor at Hampden-Sydney College in Virginia, looked  embarrassing hidden in the middle.
                                    </p>
                                    <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message
                                    </button>
                                </div>
                            </div>
                            <div class="client-detail">
                                <div class="full-height-scroll">

                                    <strong>Last activity</strong>

                                    <ul class="list-group clear-list">
                                        <li class="list-group-item fist-item">
                                            <span class="pull-right"> 09:00 pm </span>
                                            Aldus PageMaker including
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> 10:16 am </span>
                                            Finibus Bonorum et Malorum
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> 08:22 pm </span>
                                            Write a letter to Sandra
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> 11:06 pm </span>
                                            Standard chunk of Lorem
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> 12:00 am </span>
                                            Open new shop
                                        </li>
                                    </ul>
                                    <strong>Notes</strong>
                                    <p>
                                        Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.
                                    </p>
                                    <hr>
                                    <strong>Timeline activity</strong>
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
                        <div id="contact-4" class="tab-pane">
                            <div class="row m-b-lg">
                                <div class="col-lg-4 text-center">
                                    <h2>Reuben Pacheco</h2>

                                    <div class="m-b-sm">
                                        <img alt="image" class="img-circle" src="img/a5.jpg" style="width: 62px">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <strong>
                                        About me
                                    </strong>

                                    <p>
                                        Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero,written in 45 BC. This book is a treatise on.
                                    </p>
                                    <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message
                                    </button>
                                </div>
                            </div>
                            <div class="client-detail">
                                <div class="full-height-scroll">

                                    <strong>Last activity</strong>

                                    <ul class="list-group clear-list">
                                        <li class="list-group-item fist-item">
                                            <span class="pull-right"> 09:00 pm </span>
                                            The point of using
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> 10:16 am </span>
                                            Lorem Ipsum is that it has
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> 08:22 pm </span>
                                            Text, and a search for 'lorem ipsum'
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> 11:06 pm </span>
                                            Passages of Lorem Ipsum
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> 12:00 am </span>
                                            If you are going
                                        </li>
                                    </ul>
                                    <strong>Notes</strong>
                                    <p>
                                        Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                                    </p>
                                    <hr>
                                    <strong>Timeline activity</strong>
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
                        <div id="company-1" class="tab-pane">
                            <div class="m-b-lg">
                                <h2>Tellus Institute</h2>

                                <p>
                                    Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero,written in 45 BC. This book is a treatise on.
                                </p>
                                <div>
                                    <small>Active project completion with: 48%</small>
                                    <div class="progress progress-mini">
                                        <div style="width: 48%;" class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="client-detail">
                                <div class="full-height-scroll">

                                    <strong>Last activity</strong>

                                    <ul class="list-group clear-list">
                                        <li class="list-group-item fist-item">
                                            <span class="pull-right"> <span class="label label-primary">NEW</span> </span>
                                            The point of using
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> <span class="label label-warning">WAITING</span></span>
                                            Lorem Ipsum is that it has
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> <span class="label label-danger">BLOCKED</span> </span>
                                            If you are going
                                        </li>
                                    </ul>
                                    <strong>Notes</strong>
                                    <p>
                                        Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                                    </p>
                                    <hr>
                                    <strong>Timeline activity</strong>
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
                        <div id="company-2" class="tab-pane">
                            <div class="m-b-lg">
                                <h2>Penatibus Consulting</h2>

                                <p>
                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some.
                                </p>
                                <div>
                                    <small>Active project completion with: 22%</small>
                                    <div class="progress progress-mini">
                                        <div style="width: 22%;" class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="client-detail">
                                <div class="full-height-scroll">

                                    <strong>Last activity</strong>

                                    <ul class="list-group clear-list">
                                        <li class="list-group-item fist-item">
                                            <span class="pull-right"> <span class="label label-warning">WAITING</span> </span>
                                            Aldus PageMaker
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"><span class="label label-primary">NEW</span> </span>
                                            Lorem Ipsum, you need to be sure
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> <span class="label label-danger">BLOCKED</span> </span>
                                            The generated Lorem Ipsum
                                        </li>
                                    </ul>
                                    <strong>Notes</strong>
                                    <p>
                                        Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                                    </p>
                                    <hr>
                                    <strong>Timeline activity</strong>
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
                        <div id="company-3" class="tab-pane">
                            <div class="m-b-lg">
                                <h2>Ultrices Incorporated</h2>

                                <p>
                                    Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.
                                </p>
                                <div>
                                    <small>Active project completion with: 72%</small>
                                    <div class="progress progress-mini">
                                        <div style="width: 72%;" class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="client-detail">
                                <div class="full-height-scroll">

                                    <strong>Last activity</strong>

                                    <ul class="list-group clear-list">
                                        <li class="list-group-item fist-item">
                                            <span class="pull-right"> <span class="label label-danger">BLOCKED</span> </span>
                                            Hidden in the middle of text
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"><span class="label label-primary">NEW</span> </span>
                                            Non-characteristic words etc.
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right">  <span class="label label-warning">WAITING</span> </span>
                                            Bonorum et Malorum
                                        </li>
                                    </ul>
                                    <strong>Notes</strong>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.
                                    </p>
                                    <hr>
                                    <strong>Timeline activity</strong>
                                    <div id="vertical-timeline" class="vertical-container dark-timeline">
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


@stop
