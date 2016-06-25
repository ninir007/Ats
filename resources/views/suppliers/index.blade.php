@extends('template')


@section('content')

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Liste des fournisseurs</h5>
                <div class="ibox-tools">
                    <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalAddSupplier"> <i class="fa fa-wrench"></i> Créer</a>
                </div>

            </div>
            <div class="ibox-content">
                <div class="col-lg-12 right" style="margin-bottom: 10px; text-align: right">
                    <span style=""><strong>Filtres:</strong></span>
                    <a href="#" data-column="0" class="toggle-vis btn btn-primary btn-xs">Nom</a>
                    <a href="#" data-column="1" class="toggle-vis btn btn-primary btn-xs">Contact</a>
                    <a href="#" data-column="2" class="toggle-vis btn btn-primary btn-xs">Adresse</a>
                    <a href="#" data-column="3" class="toggle-vis btn btn-primary btn-xs">Code postal</a>
                    <a href="#" data-column="4" class="toggle-vis btn btn-primary btn-xs">Ville</a>
                    <a href="#" data-column="5" class="toggle-vis btn btn-primary btn-xs">Tva</a>
                    <a href="#" data-column="6" class="toggle-vis btn btn-primary btn-xs">Email</a>
                    <a href="#" data-column="7" class="toggle-vis btn btn-primary btn-xs">Mobile</a>
                    <a href="#" data-column="8" class="toggle-vis btn btn-primary btn-xs">Bureau</a>
                    <a href="#" data-column="9" class="toggle-vis btn btn-primary btn-xs">Fax</a>
                    <a href="#" data-column="10" class="toggle-vis btn btn-primary btn-xs">créé le</a>
                    <a href="#" data-column="11" class="toggle-vis btn btn-primary btn-xs">modifié le</a>
                </div>

                <div class="table">
                    <table class="table table-striped table-bordered table-hover dataTables-providers">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Contact</th>
                            <th>Adresse</th>
                            <th>Code postal</th>
                            <th>Ville</th>
                            <th>Tva</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Bureau</th>
                            <th>Fax</th>
                            <th>créé le</th>
                            <th>modifié le</th>
                            <th>Articles</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($suppliers))
                            @foreach($suppliers as $supp)
                                <tr class="provider-entity" data-id="{{$supp['id']}}" >
                                    <td>{{$supp['name']}}</td>
                                    <td>{{$supp['contact']}}</td>
                                    <td>{{$supp['street']}}</td>
                                    <td>{{$supp['postal_code']}}</td>
                                    <td>{{$supp['city']}}</td>
                                    <td>{{$supp['vat']}}</td>
                                    <td>{{$supp['email']}}</td>
                                    <td>{{$supp['mobile']}}</td>
                                    <td>{{$supp['office']}}</td>
                                    <td>{{$supp['fax']}}</td>
                                    <td>{{$supp['created_at']}}</td>
                                    <td>{{$supp['updated_at']}}</td>
                                    <td><a href="/suppliers/{{$supp['id']}}" class="btn btn-xs btn-primary"><i class="fa fa-list" aria-hidden="true"></i></a></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Contact</th>
                            <th>Adresse</th>
                            <th>Code postal</th>
                            <th>Ville</th>
                            <th>Pays</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Bureau</th>
                            <th>Fax</th>
                            <th>créé le</th>
                            <th>modifié le</th>
                            <th>Articles</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>


    <div id="modalAddSupplier" class="modal fade" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!--Modal Content-->
            <div class="modal-content">
                <form method="post" role="form" autocomplete="off" id="formAddSupplier">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">x</span></button>
                        <h4 class="modal-title">Nouveau fournisseur</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nom :</label>
                                    <input class="form-control" name="name" required autofocus/>
                                </div>
                                <div class="form-group">
                                    <label>Adresse :</label>
                                    <input class="form-control" name="street" required/>

                                </div>
                                <div class="form-group">
                                    <label>Code Postal :</label>
                                    <input class="form-control" name="postal_code" required>
                                </div>
                                <div class="form-group">
                                    <label>Ville :</label>
                                    <input class="form-control" name="city" required>
                                </div>
                                <div class="form-group">
                                    <label>Tva :</label>
                                    <input class="form-control" name="vat" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contact :</label>
                                    <input class="form-control" name="contact" required/>
                                </div>
                                <div class="form-group">
                                    <label>Email :</label>
                                    <input class="form-control" type="email" name="email" required/>
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
                        <input type="hidden" name="_action" value="createSupplier" />
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" id="btnSubmitFormAddClient" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="modalSupplierArticle" class="modal fade" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!--Modal Content-->
            <div class="modal-content">
                <form method="post" role="form" autocomplete="off" id="form">
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

@section('javascript')
    <<script src="/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            initDataTables();
        });

        function initDataTables()
        {
            var table = $('.dataTables-providers').DataTable({
                "language" : {
                    "url":"/js/plugins/dataTables/i18n/fr_fr.lang"
                }
            });

            $('a.toggle-vis').on( 'click', function (e) {
                e.preventDefault();

                // Get the column API object
                var column = table.column( $(this).attr('data-column') );

                // Toggle the visibility
                column.visible( ! column.visible() );
            } );
        }

    </script>
@stop