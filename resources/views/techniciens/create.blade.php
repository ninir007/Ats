@extends('template')

@section("content")
    <div class="col-lg-6 col-lg-offset-3">
        <h3>Enregistrement</h3>
        <p>Création d'un compte</p>
        <form class="m-t" id="newuserform" role="form" method="POST" action="/new-user">
            {!! csrf_field() !!}

            <div class="form-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required>
                {!! $errors->first('name', '<small class="help-block alert-danger">:message</small>') !!}
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                {!! $errors->first('email', '<small class="help-block alert-danger">:message</small>') !!}
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                {!! $errors->first('password', '<small class="help-block alert-danger">:message</small>') !!}
            </div>
            <div class="form-group">
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirmer password" required>
                {!! $errors->first('password_confirmation', '<small class="help-block alert-danger">:message</small>') !!}
            </div>

            <button type="submit" class="btn btn-primary block full-width m-b">Créer</button>

        </form>

    </div>

@stop

@section("script")
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

            $("#newuserform").submit(function(e) {
//                e.preventDefault();

//                onTechCreation($(this));
            });

        });

        function onTechCreation(form) {

            $.ajax({
                'url' : '/new-user',
                'data' : form.serialize(),
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
                                text: 'Création effectuée !'
                            });

                        }
                        else
                        {
                            $.gritter.add({
                                title: 'Attention, une erreur est survenue !',
                                text: "Création annulée !"
                            });
                        }

                        return false;

                    }
                    else {
                        $.gritter.add({
                            title: 'Attention, une erreur est survenue !',
                            text: "Erreur DB !"
                        });
                    }
                    return false;
                }
            });
            return false;
        }








    </script>
@stop