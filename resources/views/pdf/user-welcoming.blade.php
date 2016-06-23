<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>

    <link media="all" href="/css/welcome.css" rel="stylesheet">

</head>

<body>

<table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" class="aligncenter" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-block">
                                        <h2>Bienvenue dans l'equipe ATS CENTER</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody>
                                            <tr>
                                                <td>Vous trouverez ci-dessous les informations necessaire pour accéder à l'interface de travail.<br></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                        <tr>
                                                            <td>Login</td>
                                                            <td class="alignright">{{$nuser['email']}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mot de passe</td>
                                                            <td class="alignright">{{$nuser['password']}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <a href="http://ats.dev/dashboard">Se rendre sur l'application.</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        {{env("company_name")}}<br>
                                        {{env("company_address")}}<br>
                                        {{env("company_tel")}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody></table>
                <div class="footer">

                </div></div>
        </td>
        <td></td>
    </tr>
    </tbody></table>



</body>
</html>