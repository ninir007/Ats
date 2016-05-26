@extends('template')

@section('content')

        <div class="row">
            <pre>{{$files}}</pre></h2>
            <pre>{{$orders}}</pre>
            <div class="col-lg-9">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <a href="#" class="btn btn-white btn-xs pull-right">Edit project</a>
                                        <h2 style="font-weight: 700;">Commande: {{$files->id.'R'.$files["client"]["id"]}} </h2>
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

                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                    <div class="panel blank-panel">
                                        <div class="panel-heading">
                                            <div class="panel-options">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#form-order-details" data-toggle="tab">Articles</a></li>
                                                    <li class=""><a href="#tab-2" data-toggle="tab">Historique</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">

                                            <div class="tab-content">
                                                <div class="tab-pane active" id="form-order-details">
                                                    <div class="feed-activity-list">
                                                        <form method="post" role="form" id="formUpdateOrderDetails">

                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="row" style="text-align: center;">
                                                                        <div class="form-group">
                                                                            <label class="col-lg-3 control-label">Fournisseur</label>
                                                                            <label class="col-lg-3 control-label">Article</label>
                                                                            <label class="col-lg-2 control-label">Prix</label>
                                                                            <label class="col-lg-2 control-label">Qte</label>
                                                                            <label class="col-lg-2 control-label">Action</label>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @if(isset($orders['details']))
                                                                @foreach($orders['details'] as $order)
                                                                    <div class="hr-line-dashed"></div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" name="supplier" data-placeholder="Fournisseur" id="supplier-sel" required >
                                                                                        @if(isset($suppliers))
                                                                                            <option value="" disabled ></option>
                                                                                            @foreach($suppliers as $supp)
                                                                                                <option value="{{ $supp->id }}" @if($supp->id == $order['supplier_id']) selected @endif> {{ $supp->name }}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <select class="form-control" name="article" data-placeholder="Article" id="article-sel" required >
                                                                                        @if(isset($articles))
                                                                                            <option value="" disabled></option>
                                                                                            @foreach($articles as $article)
                                                                                                <option value="{{ $article->id }}" @if($article->id == $order['article_id']) selected @endif> {{ $article->reference }}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-2"><input type="number" min="0" value="{{$order['price']}}" placeholder=".col-md-2" class="form-control"></div>
                                                                                <div class="col-md-2"><input type="number" min="0" value="{{$order['quantity']}}" placeholder=".col-md-2" class="form-control"></div>
                                                                                <div class="col-md-2" style="text-align: center;"><button class='btn-del-order-node btn btn-xs btn-danger'><i class='fa fa-times-circle'></i></button></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif

                                                            <div class="hr-line-solid"></div>



                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <input type="hidden" name="_uid" value="514517CD-99F5-D3C0-8D67-57635339C83A">
                                                                    <input type="hidden" name="_action" value="saveArtistDetails">
                                                                    <button type="submit" class="btn btn-xs btn-primary">Save Modifications <small>17/05/2016 11:18:02</small></button>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                </div>
                                                            </div>

                                                        </form>
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