@extends('template')


@section('content')

    <div class="row">

        <div class="col-lg-2">
            <button type="button" data-toggle="modal" data-target="#modalAddNote" class="btn btn-primary btn-lg"><i class="fa fa-envelope-o"></i> Nouvelle note</button>
        </div>

        <div class="col-xs-1">
            <text type="text" class="btn btn-primary btn-lg">{{ isset($countnote) ? $countnote.' notes' : '0 notes'  }}</text>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInUp">
                <ul class="notes">
                    @if(isset($notes))
                        @foreach($notes as $note)
                            @if($note['scope'] == 'PRIVATE' && $note['user_id'] ==  Auth::user()['id']  )
                                <li>
                                    <div style="word-wrap: break-word;">
                                        <small>Privée: {{ $note->created_at }}</small>
                                        <h4>{{ $note->title }}</h4>
                                        <p>{{ $note->content }}</p>
                                        <label class="text-right">{{ $note->technicien->name }}</label>
                                        <a href="" rel="{{ $note->id }}" class="btndeletenote"><i class="fa fa-trash-o "></i></a>
                                    </div>
                                </li>
                            @elseif($note['scope'] == 'PUBLIC')
                                <li>
                                    <div style="word-wrap: break-word;">
                                        <small>Publique: {{ $note->created_at }}</small>
                                        <h4>{{ $note->title }}</h4>
                                        <p>{{ $note->content }}</p>
                                        <label class="text-right">{{ $note->technicien->name }}</label>
                                        <a href="" rel="{{ $note->id }}" class="btndeletenote"><i class="fa fa-trash-o "></i></a>
                                    </div>
                                </li>
                            @else
                            @endif
                        @endforeach
                    @else
                    @endif
                </ul>
            </div>
        </div>
    </div>




    <!-- MODAL-->

    <div id="modalAddNote" class="modal fade" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="contentNote">
                <form method="post" autocomplete="off" id="formAddNote" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Nouvelle note</h4>
                    </div>
                    <div class="modal-body">
                        <div id="returnmsgnote"></div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Titre :</label>
                                    <input class="form-control" name="title" id="title" required autofocus/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <label>
                                        <input type="radio" checked="" value="yes" id="optionsRadios1" name="private" required> private
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        <input type="radio" value="no" id="optionsRadios2" name="private" required> public
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Contenu :</label>
                                    <textarea rows="10" cols="30" class="form-control" name="content" id="content"  required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" id="user_id" name="user_id" value="{!! Auth::user()['id'] !!}" />

                        <button type="submit" id="btnSubmitFormAddNote" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('script.notes')
    <script type="text/javascript">
        $(document).ready(function(){

            $('#formAddNote').submit(function(e){
                handleFormAddNote();
                return false;
            });
            $('.btndeletenote').click(function(e){
                var ref = $(this).attr('rel');
                quickDeleteNote(ref);

            });

        });

        function quickDeleteNote(ref)
        {
            $.ajax({
                'url' : '/technicien/notes',
                'data' : '_action=deleteNote&id='+ref,
                'dataType' : 'json',
                'type' : 'POST',

                'complete' : function(xhr) {
                    if(xhr.status == '200')
                    {
                        var response = JSON.parse( xhr.responseText );
                        if(response.status == 'success')
                        {
                            $.gritter.add({
                                title: 'Succes !',
                                text: 'Suppression effectuée !'
                            });
                            window.location.reload();
                        }
                        else
                        {
                            $.gritter.add({
                                title: 'Attention, une erreur est survenue !',
                                text: "Erreur DB !"
                            });

                        }

                        return false;

                    }
                    else {
                        $.gritter.add({
                            title: 'Attention, une erreur est survenue !',
                            text: "Suppression annulée !"
                        });
                    }
                    return false;
                }
            });
            return false;
        }
        function handleFormAddNote()
        {
            $.ajax({
                'url' : '/technicien/notes',
                'data' : '_action=addNote&'+$('#formAddNote').serialize(),
                'dataType' : 'json',
                'type' : 'POST',
                'beforeSend' : function()
                {

                    var inpt = $.trim($("#title").val());
                    if( inpt.length < 1)
                    {
                        $('#returnmsgnote').html('<p><small class="alert alert-danger">Erreur : entrer un titre !</small></p>');
                        setTimeout(function(){
                            $('#returnmsgnote').html('');
                        },2000);
                        return false;
                    }

                    inpt = $.trim($("#content").val());
                    if(inpt.length <1)
                    {
                        $('#returnmsgnote').html('<p><small class="alert alert-danger">Erreur : entrer un contenu valide !</small></p>');
                        setTimeout(function(){
                            $('#returnmsgnote').html('');
                        },2000);
                        return false;
                    }
                    $('#returnmsgnote').html('<p><small class="alert alert-info"><i class="fa fa-spinner fa-pulse"></i> Patienter...</small></p>');

                },
                'complete' : function(xhr) {
                    $('#returnmsgnote').html('');
                    if(xhr.status == '200')
                    {
                        var response = JSON.parse( xhr.responseText );
                        if(response.status == 'success')
                        {
                            $.gritter.add({
                                title: 'Succes !',
                                text: 'Votre ajout a été effectué !'
                            });
                            window.location.reload();
                        }
                        else
                        {
                            $.gritter.add({
                            title: 'Attention, une erreur est survenue !',
                            text: "Erreur DB !"
                             });

                        }

                        return false;

                    }
                    else {
                        $.gritter.add({
                            title: 'Attention, une erreur est survenue !',
                            text: "L'ajout de la note n'est pas sauvé !"
                        });
                    }
                    return false;
                }
            });
            return false;
        }

    </script>
@stop