<html>
<head>

    <meta http-equiv="Content-Type" content="text/html;charset=utf8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">



</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">ATS</h1>

        </div>
        <h3>Bienvenue sur ATS pro</h3>
        <p>Authentification requise, veuillez vous connecter.</p>
        <form class="m-t" role="form" method="POST" action="/auth/login">
            {!! csrf_field() !!}
            <div class="form-group">
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <p class="text-muted text-center"><small>Contacter l'admin?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="register">Administrateur</a>
        </form>
        <p class="m-t"> <small>Ats Repair Center © 2015</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="../js/jquery-2.1.1.js"></script>
<script src="../js/bootstrap.min.js"></script>



</body>
</html>