@extends('template')

@section('content')

        <div class="row">
            {{$files}}|||<br>
            {{$repairs}}
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
                                        <dt>Client:</dt> <dd><a href="/clients" class="text-navy"> {{ $files["client"]["lastname"].' '. $files["client"]["firstname"] }}</a> </dd>

                                    </dl>
                                </div>
                                <div class="col-lg-7">
                                    <dl class="dl-horizontal">

                                        <dt>Modifié le:</dt> <dd class="updt-time">	{{$files['updated_at']}}</dd>
                                        <dt>Créé le:</dt> <dd> 	{{$files['created_at']}} </dd>
                                    </dl>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">

                                        <dt>Marque:</dt> <dd>{{$repairs["modele"]['brand']['name']}}</dd>
                                        <dt>Categorie:</dt> <dd>{{ $repairs["modele"]['category']['name'] }}</dd>
                                        <dt>Accessoire:</dt> <dd>{{ $repairs["accessory"] == '1' ? 'oui' : 'non' }}</dd>

                                    </dl>
                                </div>
                                <div class="col-lg-7">
                                    <dl class="dl-horizontal">
                                        <dt>Modéle:</dt> <dd>	{{$repairs["modele"]['name']}}</dd>
                                        <dt>N° Serie:</dt> <dd> {{$repairs["device"]['serial_number']}} </dd>
                                        <dt>Etat:</dt> <dd> {{$repairs['description']}} </dd>
                                    </dl>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <form id="editRapport">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Rapport Interne </label>
                                            <textarea rows="4" cols="20" class="form-control inputreport" name="intern_report">{{$files['intern_report']}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Rapport Client </label>
                                            <textarea rows="4" cols="20" class="form-control inputreport" name="client_report">{{$files['client_report']}}</textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                    <div class="panel blank-panel">
                                        <div class="panel-heading">
                                            <div class="panel-options">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#tab-order-details" data-toggle="tab">Articles</a></li>
                                                    <li class=""><a href="#tab-2" data-toggle="tab">Historique</a></li>
                                                    <li class=""><a href="#tab-facturation" data-toggle="tab">Facturation</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">

                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab-order-details">
                                                    <div class="feed-activity-list">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row" style="text-align: center;">
                                                                    <div class="form-group">
                                                                        <label class="col-lg-2 control-label"></label>
                                                                        <label class="col-lg-4 control-label">Article</label>
                                                                        <label class="col-lg-2 control-label">Prix</label>
                                                                        <label class="col-lg-2 control-label">Qte</label>
                                                                        <label class="col-lg-2 control-label center-mytitle">Action</label>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <form id="formOrder">

                                                                    <div class="form-group">
                                                                        <div class="col-md-2">
                                                                        </div>
                                                                        <div class="col-md-4">

                                                                            <select class="form-control order-clear " name="article" data-placeholder="Article" id="article-sel" required >

                                                                                @if(isset($repairs['modele']['articles']))
                                                                                    <option value="" disabled selected></option>
                                                                                    @foreach($repairs['modele']['articles'] as $art)
                                                                                        <option value="{{ $art->id }}" data-price="{{$art->standard_price}}" > {{ $art->reference }}</option>
                                                                                    @endforeach
                                                                                @endif
                                                                            </select>
                                                                            <input id="hiddenarticle" type="hidden" name="article_id[]" value="" readonly required>

                                                                        </div>
                                                                        <div class="col-md-2"><input id="price" type="number" step="any" min="0" value="" name="price" class=" order-clear form-control"></div>
                                                                        <div class="col-md-2"><input id="quantity" type="number" step="any" min="0" value="" name="quantity" class=" order-clear form-control"></div>
                                                                        <div class="col-md-2" style="text-align: center;"><button class="btn btn-xs btn-primary " id="order-list-add"><i class="fa fa-plus"></i></button></div>
                                                                    </div>
                                                                </form>
                                                                <span id="orderError" class="label label-danger error-order-selection" >Erreur encodage</span>
                                                            </div>

                                                        </div>
                                                        <form id="updateOrderDetails" action="/file/repair/{{$files->id}}" method="POST">
                                                            <div id="mydivider" class="hr-line-solid"></div>
                                                            @if(isset($repairs['repair_details']))
                                                                @foreach($repairs['repair_details'] as $order)

                                                                    <div class="row" id="{{'art-'.$order['article']['id'] }}" data-id="{{$order['id']}}">
                                                                        <div class="hr-line-dashed"></div>
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <div class="col-md-2"></div>
                                                                                <div class="col-md-4">
                                                                                    <select class="form-control" name="article_id[]" data-placeholder="Article" disabled required >
                                                                                        @if(isset($articles))
                                                                                            @foreach($articles as $article)
                                                                                                <option value="{{ $article->id }}" @if($article->id == $order['article']['id']) selected @endif> {{ $article->reference }}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                    <input type="hidden" name="article_id[]" value="{{$order['article']['id']}}" readonly required>

                                                                                </div>
                                                                                <div class="col-md-2"><input name="price[]" step="any" type="number" min="0" value="{{$order['price']}}"  class="form-control"></div>
                                                                                <div class="col-md-2"><input name="quantity[]" type="number" min="0" value="{{$order['quantity']}}"  class="form-control"></div>
                                                                                <div class="col-md-2" style="text-align: center;"><button class='btn-del-order-node btn btn-xs btn-danger'><i class='fa fa-times-circle'></i></button></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif

                                                            <div class="hr-line-solid"></div>

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    {{csrf_field()}}
                                                                    <button type="submit" class="btn btn-xs btn-primary">Sauver modif. (<small class="updt-time">{{$files['updated_at']}}</small>)</button>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <span class="product-price" style="position: relative;top: 0;float: right;font-size: 12px;">Total HTVA € <span id="total-order">{{$repairs['total_details_amount']}}</span></span>
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
                                                <div class="tab-pane " id="tab-facturation">
                                                    <form id="invoiceSetting" class="form-horizontal">

                                                        <div class="form-group">
                                                            <div class="col-lg-8"></div>
                                                            <label class="col-lg-1 control-label">Acompte</label>
                                                            <div class="form-group has-success">
                                                                <div class="col-lg-3">
                                                                    <div class="input-group m-b">
                                                                        <input name="advance_amount" type="number" step="0.01" min="0" value="{{$files['advance_amount']}}" class="form-control"><span class="input-group-addon">€</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label">Déplacement</label>
                                                            <div class="col-lg-3">
                                                                <input name="shifting_amount" id="invoice-shifting-amount" type="number" step="0.01" min="0" value="{{$files['shifting_amount']}}" class="form-control" >
                                                            </div>
                                                            <label class="col-lg-1 control-label">TVA</label>
                                                            <div class="col-lg-2">
                                                                <div class="input-group m-b">
                                                                    <input name="shifting_vat" id="invoice-shifting-vat" type="number" step="0.01" min="0" max="100" value="{{$files['shifting_vat']}}" class="form-control"><span class="input-group-addon">%</span>
                                                                </div>
                                                            </div>
                                                            <label class="col-lg-1 control-label">TVAC</label>
                                                            <div class="form-group has-success">
                                                                <div class="col-lg-3">
                                                                    <input id="invoice-shifting-total" type="number" step="0.01" min="0" value="{{$files['shifting_amount'] * (1+ $files['shifting_vat']/100)}}" readonly class="form-control ">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label">Main d'oeuvre</label>
                                                            <div class="col-lg-3">
                                                                <input name="labor_amount" id="invoice-labor-amount" type="number" step="0.01" min="0" value="{{$files['labor_amount']}}"  class="form-control" >
                                                            </div>
                                                            <label class="col-lg-1 control-label">TVA</label>
                                                            <div class="col-lg-2">
                                                                <div class="input-group m-b">
                                                                    <input name="labor_vat" id="invoice-labor-vat" type="number" step="0.01" min="0" max="100"  value="{{$files['labor_vat']}}" class="form-control" ><span class="input-group-addon">%</span>
                                                                </div>
                                                            </div>
                                                            <label class="col-lg-1 control-label">TVAC</label>
                                                            <div class="form-group has-success">
                                                                <div class="col-lg-3">
                                                                    <input type="number" id="invoice-labor-total" step="0.01" min="0" value="{{$files['labor_amount'] * (1+ $files['labor_vat']/100)}}" readonly class="form-control ">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label">Pieces</label>
                                                            <div class="col-lg-3">
                                                                <input name="part_amount" id="invoice-part-amount" type="number"  step="0.01" min="0" value="{{$files['part_amount']}}" class="form-control">
                                                            </div>
                                                            <label class="col-lg-1 control-label">TVA</label>
                                                            <div class="col-lg-2">
                                                                <div class="input-group m-b">
                                                                    <input name="part_vat" id="invoice-part-vat" type="number"  step="0.01" min="0" max="100" value="{{$files['part_vat']}}" class="form-control"><span class="input-group-addon">%</span>
                                                                </div>
                                                            </div>
                                                            <label class="col-lg-1 control-label">TVAC</label>
                                                            <div class="form-group has-success">
                                                                <div class="col-lg-3">
                                                                    <input id="invoice-part-total" type="number" step="0.01" min="0" value="{{$files['part_amount'] * (1+ $files['part_vat']/100)}}" readonly class="form-control ">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="hr-line-dashed"></div>
                                                        <div class="form-group">
                                                            <div class="col-lg-8"></div>

                                                            <label class="col-lg-1 control-label">Total TVAC</label>
                                                            <div class="form-group has-success">
                                                                <div class="col-lg-3">
                                                                    <div class="input-group m-b">
                                                                        <input id="total-due" type="number" step="0.01" min="0" value="{{($files['shifting_amount'] * (1+ $files['shifting_vat']/100)) + ($files['labor_amount'] * (1+ $files['labor_vat']/100)) +($files['part_amount'] * (1+ $files['part_vat']/100))}}" readonly class="form-control"><span class="input-group-addon">€</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-lg-8"></div>

                                                            <label class="col-lg-1 control-label">Restant</label>
                                                            <div class="form-group has-success">
                                                                <div class="col-lg-3">
                                                                    <div class="input-group m-b">
                                                                        <input id="remaining-due" readonly type="number" step="0.01" min="0" value="{{($files['shifting_amount'] * (1+ $files['shifting_vat']/100)) + ($files['labor_amount'] * (1+ $files['labor_vat']/100)) +($files['part_amount'] * (1+ $files['part_vat']/100)) - $files['advance_amount']}}"  class="form-control"><span class="input-group-addon">€</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <div class="col-lg-offset-2 col-lg-10">
                                                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Calculer</strong></button>
                                                            </div>
                                                        </div>

                                                    </form>
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
                                <li><a id="generateInvoice" class="invoice-print" data-isvat="{{$files["client"]['vat']}}" target="_blank" href="/invoice/repair/{{$files->id}}"><i class="fa fa-file"></i> Facture</a></li>
                                <li><a href=""><i class="fa fa-file"></i> Bon de Réparation</a></li>
                                <li><a href=""><i class="fa fa-file"></i> Note d'envoi</a></li>
                                <li><a href=""><i class="fa fa-file"></i> Devis</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--CLONE AND APPEND-->
        <div class="row toclone" id="">
            <div class="hr-line-dashed"></div>
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <select class="form-control setarticle" name="article_id[]" data-placeholder="Article" disabled required >
                            @if(isset($articles))
                                <option value="" disabled></option>
                                @foreach($articles as $article)
                                    <option value="{{ $article->id }}" > {{ $article->reference }}</option>
                                @endforeach
                            @endif
                        </select>
                        <input id="hiddenarticletoset" type="hidden" name="article_id[]" value="" readonly required>

                    </div>
                    <div class="col-md-2"><input name="price[]" type="number" step="any" min="0" value=""  class="form-control setprice"></div>
                    <div class="col-md-2"><input name="quantity[]" type="number" step="any" min="0" value=""  class="form-control setqte"></div>
                    <div class="col-md-2" style="text-align: center;"><button class='btn-del-order-node btn btn-xs btn-danger'><i class='fa fa-times-circle'></i></button></div>
                </div>
            </div>
        </div>
@stop


@section('javascript')
    <script type="text/javascript">

        $(document).ready(function() {
            handleArticleSupplier();
            handleOrderCart();
            deleteOrder();
            handleOrderUpdate();
            handleInvoiceSubmit();
            handleReportsUpdate();
            onInvoiceGeneration();
            /*



            onOrderFormGeneration();*/
        });


        function onInvoiceGeneration() {
            $("#generateInvoice" ).click(function(e) {


                var hasvat = $(this ).data('isvat');
                console.log(hasvat);
                if (hasvat.length > 3) {

                }
                else {
                    $.gritter.add({
                        title: 'Attention, une erreur est survenue !',
                        text: "Generation de facture impossible sans TVA client"
                    });
                    e.preventDefault() ;
                }
            });
        }

        function handleArticleSupplier() {
            $('#article-sel').on('change', function() {
                var selected = $( "#article-sel option:selected" ),
                        $thisID = $(selected[0]).val(),
                        price_selected = $(selected[0]).data('price');
                $('#price' ).val(price_selected);
                $('#hiddenarticle' ).val($thisID);
            });

        }

        function validateOrder($list) {
            var error = false;

            if($list.length < 3) { error = true; }

            $.each($list, function(key, data) {
                if(data['value'] == '' || data['value'] == undefined || data['value'] <= 0) {error = true; }
            });

            return error;
        }
        function handleOrderCart() {

            $("#order-list-add" ).on("click", function(e) {
                e.preventDefault();

                var arti = $("#article-sel option:selected" ).text();

                var inputs = $('#formOrder').serializeArray();
                var error = validateOrder(inputs);

                var idtocompare = "art-"+inputs[0]['value'];
                var unik = $('#'+idtocompare);

                if(unik.length > 0){
                    error = true;
                }


                if(error) {
                    $("#orderError" ).show();
                    setTimeout(function(){
                        $("#orderError" ).hide();
                    }, 2000);
                }
                else {
                    var toInsert = $(".toclone" ).clone();
                    toInsert.removeClass('toclone');
                    toInsert.attr('id', idtocompare);
                    toInsert.find(".setarticle" ).val(inputs[0]['value']);
                    toInsert.find('#hiddenarticletoset' ).val(inputs[0]['value']);
                    toInsert.find(".setprice" ).val(inputs[2]['value']);
                    toInsert.find(".setqte" ).val(inputs[3]['value']);
                    toInsert.insertAfter( "#mydivider" );


//                    refreshSupplier(four,inputs[0]['value'] );
                    clearOrderCart();
                }
            });
        }

        function clearOrderCart() {
            $(".order-clear" ).val("");
        }


        function deleteOrder() {
            $(document).on("click", ".btn-del-order-node", function(e) {
                e.preventDefault();
                $this = $(this);

                var todelete = $this.parents( "div.row:first" ),
                        id= $(todelete).data('id');

                $.ajax({
                    'url' : '/file/repair/{{$files->id}}',
                    'data' : 'repair_detail_id='+id,
                    'dataType' : 'json',
                    'type' : 'delete',
                    'beforeSend' : function()  {

                    },
                    'complete' : function(xhr) {
                        if(xhr.status == '200')
                        {
                            var response = JSON.parse( xhr.responseText );
                            if(response.status == 'success')
                            {
                                todelete.remove();
                                $.gritter.add({
                                    title: 'Succès !',
                                    text: 'Suppression article effectuée !'
                                });
                                $(".updt-time").html(response.stamp);
                                $('#total-order' ).html(response.sum);
                                $('#invoice-part-amount' ).val(response.sum);

                                $('#invoiceSetting' ).submit();

                            }
                            else
                            {
                                $.gritter.add({
                                    title: 'Attention, une erreur est survenue !',
                                    text: "Erreur DB : suppression échouée !"
                                });
                            }

                            return false;
                        }
                        else {
                            $.gritter.add({
                                title: 'Attention, une erreur est survenue !',
                                text: "Erreur DB : suppression échouée !"
                            });
                        }
                        return false;
                    }
                });

            });
        }

        function handleOrderUpdate() {
            $("#updateOrderDetails" ).submit(function(e) {

                e.preventDefault();
                $.ajax({
                    'url' : '/file/repair/{{$files->id}}',
                    'data' : $(this).serialize(),
                    'dataType' : 'json',
                    'type' : 'POST',
                    'beforeSend' : function()
                    {

                    },
                    'complete' : function(xhr) {
                        if(xhr.status == '200')
                        {
                            var response = JSON.parse( xhr.responseText );
                            if(response.status == 'success')
                            {
                                $.gritter.add({
                                    title: 'Succès !',
                                    text: 'Validation commande effectuée !'
                                });
                                $(".updt-time").html(response.stamp);
                                $('#total-order' ).html(response.sum);
                                $('#invoice-part-amount' ).val(response.sum);

                                $.each(response.new, function(key, data) {
                                    var unik = $('#'+key);
                                    if(unik.length > 0) {
                                        unik.attr('data-id', data);
                                    }

                                });
                                $('#invoiceSetting' ).submit();

                            }
                            else
                            {
                                $.gritter.add({
                                    title: 'Attention, une erreur est survenue !',
                                    text: "Validation échouée !"
                                });
                            }
                            return false;
                        }
                        else {
                            $.gritter.add({
                                title: 'Attention, une erreur est survenue !',
                                text: "Erreur DB : validation échouée !"
                            });
                        }
                        return false;
                    }
                });

            });
        }

        function handleInvoiceSubmit()  {
            $("#invoiceSetting" ).submit(function(e){
                e.preventDefault();

                $.ajax({
                    url: '/file/{{$files->id}}',
                    data: '_action=calculateInvoice&'+$(this).serialize(),
                    dataType: 'json',
                    type: 'POST',
                    complete: function (xhr) {
                        var response = JSON.parse( xhr.responseText );
                        if(response.status == 'success') {
                            $.gritter.add({
                                title: 'Succès !',
                                text: 'Facture mise à jour'
                            });
                            console.log(response.invoice);
                            $("#total-due" ).val(response.invoice.total);
                            $("#invoice-part-total" ).val(response.invoice.part);
                            $("#invoice-labor-total" ).val(response.invoice.labor);
                            $("#invoice-shifting-total" ).val(response.invoice.shifting);
                            $("#remaining-due" ).val(response.invoice.remaining);
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
            });
        }

        function handleReportsUpdate()
        {
            $('.inputreport').blur(function() {

                $.ajax({
                    url: '/file/{{$files->id}}',
                    data: '_action=updateFile&'+$("#editRapport").serialize(),
                    dataType: 'json',
                    type: 'POST',
                    complete: function (xhr) {
                        var response = JSON.parse( xhr.responseText );
                        if(response.status == 'success') {
                            $.gritter.add({
                                title: 'Succès !',
                                text: 'Rapports mis à jour'
                            });
                            $(".updt-time").html(response.stamp);
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
            });
        }
    </script>
@stop