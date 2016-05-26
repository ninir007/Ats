@extends('template')

@section('content')

        <div class="row">
            <pre>{{$files}}</pre></h2>
            <pre>{{$repairs}}</pre>
            <div class="col-lg-9">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <a href="#" class="btn btn-white btn-xs pull-right">Edit project</a>
                                        <h2 style="font-weight: 700;">Réparation: {{$files->id.'R'.$files["client"]["id"]}}</h2>

                                    </div>
                                    <div class="col-lg-2">
                                        <dl class="dl-horizontal">
                                            <dt>Statut actuel:</dt> <dd><span class="label label-primary">Active</span></dd>
                                        </dl>
                                    </div>
                                    <div class="col-lg-10">
                                        <dl class="dl-horizontal">
                                            <dt>Completed:</dt>
                                            <dd>
                                                <div class="progress progress-striped active m-b-sm">
                                                    <div style="width: 60%;" class="progress-bar"></div>
                                                </div>
                                                <small>Project completed in <strong>60%</strong>. Remaining close the project, sign a contract and invoice.</small>
                                            </dd>
                                        </dl>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">

                                        <dt>Technicien:</dt> <dd>{{$files["technicien"]["name"]}}</dd>
                                        <dt>Client:</dt> <dd><a href="/clients" class="text-navy"> {{ $files["client"]["LastName"].' '. $files["client"]["FirstName"] }}</a> </dd>

                                    </dl>
                                </div>
                                <div class="col-lg-7">
                                    <dl class="dl-horizontal">

                                        <dt>Modifié le:</dt> <dd>	{{$files['updated_at']}}</dd>
                                        <dt>Créé le:</dt> <dd> 	{{$files['created_at']}} </dd>
                                    </dl>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">

                                        <dt>Marque:</dt> <dd>{{$repairs["modele"][0]['brand']['name']}}</dd>
                                        <dt>Categorie:</dt> <dd>{{ $repairs["modele"][0]['category']['name'] }}</dd>
                                        <dt>Accessoire:</dt> <dd>{{ $repairs["accessory"] == '1' ? 'oui' : 'non' }}</dd>

                                    </dl>
                                </div>
                                <div class="col-lg-7">
                                    <dl class="dl-horizontal">
                                        <dt>Modéle:</dt> <dd>	{{$repairs["modele"][0]['name']}}</dd>
                                        <dt>N° Serie:</dt> <dd> {{$repairs["device"]['serial_number']}} </dd>
                                        <dt>Etat:</dt> <dd> {{$repairs["device"]['description']}} </dd>
                                    </dl>
                                </div>
                            </div>

                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                    <div class="panel blank-panel">
                                        <div class="panel-heading">
                                            <div class="panel-options">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#tab-1" data-toggle="tab">Users messages</a></li>
                                                    <li class=""><a href="#tab-2" data-toggle="tab">Historique</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">

                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab-1">
                                                    <div class="feed-activity-list">
                                                        <div class="feed-element">
                                                            <a href="#" class="pull-left">
                                                                <img alt="image" class="img-circle" src="img/a2.jpg">
                                                            </a>
                                                            <div class="media-body ">
                                                                <small class="pull-right">2h ago</small>
                                                                <strong>Mark Johnson</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                                                <small class="text-muted">Today 2:10 pm - 12.06.2014</small>
                                                                <div class="well">
                                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                                    Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="feed-element">
                                                            <a href="#" class="pull-left">
                                                                <img alt="image" class="img-circle" src="img/a3.jpg">
                                                            </a>
                                                            <div class="media-body ">
                                                                <small class="pull-right">2h ago</small>
                                                                <strong>Janet Rosowski</strong> add 1 photo on <strong>Monica Smith</strong>. <br>
                                                                <small class="text-muted">2 days ago at 8:30am</small>
                                                            </div>
                                                        </div>
                                                        <div class="feed-element">
                                                            <a href="#" class="pull-left">
                                                                <img alt="image" class="img-circle" src="img/a4.jpg">
                                                            </a>
                                                            <div class="media-body ">
                                                                <small class="pull-right text-navy">5h ago</small>
                                                                <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                                                <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                                                <div class="actions">
                                                                    <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                                                    <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="feed-element">
                                                            <a href="#" class="pull-left">
                                                                <img alt="image" class="img-circle" src="img/a5.jpg">
                                                            </a>
                                                            <div class="media-body ">
                                                                <small class="pull-right">2h ago</small>
                                                                <strong>Kim Smith</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                                                <small class="text-muted">Yesterday 5:20 pm - 12.06.2014</small>
                                                                <div class="well">
                                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                                    Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="feed-element">
                                                            <a href="#" class="pull-left">
                                                                <img alt="image" class="img-circle" src="img/profile.jpg">
                                                            </a>
                                                            <div class="media-body ">
                                                                <small class="pull-right">23h ago</small>
                                                                <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                                                <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                                            </div>
                                                        </div>
                                                        <div class="feed-element">
                                                            <a href="#" class="pull-left">
                                                                <img alt="image" class="img-circle" src="img/a7.jpg">
                                                            </a>
                                                            <div class="media-body ">
                                                                <small class="pull-right">46h ago</small>
                                                                <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                                                <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="tab-2">

                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Status</th>
                                                            <th>Title</th>
                                                            <th>Start Time</th>
                                                            <th>End Time</th>
                                                            <th>Comments</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i class="fa fa-check"></i> Completed</span>
                                                            </td>
                                                            <td>
                                                                Create project in webapp
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable.
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i class="fa fa-check"></i> Accepted</span>
                                                            </td>
                                                            <td>
                                                                Various versions
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i class="fa fa-check"></i> Sent</span>
                                                            </td>
                                                            <td>
                                                                There are many variations
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i class="fa fa-check"></i> Reported</span>
                                                            </td>
                                                            <td>
                                                                Latin words
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    Latin words, combined with a handful of model sentence structures
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i class="fa fa-check"></i> Accepted</span>
                                                            </td>
                                                            <td>
                                                                The generated Lorem
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i class="fa fa-check"></i> Sent</span>
                                                            </td>
                                                            <td>
                                                                The first line
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i class="fa fa-check"></i> Reported</span>
                                                            </td>
                                                            <td>
                                                                The standard chunk
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i class="fa fa-check"></i> Completed</span>
                                                            </td>
                                                            <td>
                                                                Lorem Ipsum is that
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable.
                                                                </p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="label label-primary"><i class="fa fa-check"></i> Sent</span>
                                                            </td>
                                                            <td>
                                                                Contrary to popular
                                                            </td>
                                                            <td>
                                                                12.07.2014 10:10:1
                                                            </td>
                                                            <td>
                                                                14.07.2014 10:16:36
                                                            </td>
                                                            <td>
                                                                <p class="small">
                                                                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                                                                </p>
                                                            </td>

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
                </div>
            </div>
            <div class="col-lg-3">
                <div class="wrapper wrapper-content project-manager">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h3>Statuts</h3>

                            <p class="small">
                              debug :  en cas d'erreur
                            </p>

                            <div class="form-group">
                                <label>Code statut</label>
                                <select name="code_status" id="code_status_id" class="form-control" required>
                                    @if(isset($code_status))
                                        @foreach($code_status as $code)
                                            <option value="{{ $code->id }}" > {{ $code->label }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Commentaires</label>
                                <textarea class="form-control" placeholder="note relative au statut" rows="3"></textarea>
                            </div>
                            <button class="btn btn-primary btn-block"><i class="fa fa-check" aria-hidden="true"></i></button>

                        </div>
                    </div>



                    <div class="ibox">
                        <div class="ibox-content">
                            <h3>Documents</h3>
                            <ul class="list-unstyled file-list">
                                <li><a href=""><i class="fa fa-file"></i> Facture</a></li>
                                <li><a href=""><i class="fa fa-file"></i> Bon de Réparation</a></li>
                                <li><a href=""><i class="fa fa-file"></i> Note d'envoi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@stop