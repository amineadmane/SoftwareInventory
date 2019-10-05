<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Software Inventory</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrapcss/bootstrap.css')}}">
    <link href="{{asset('/Fontawesome/css/all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/Firstlogin.css')}}">
    <script src="{{asset('js/jquery-3.4.1.js')}}"></script>
</head>
<body>

<div class="container-fluid register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src={{asset('Images/Elbaraka.png')}} alt=""/>
            <h2 style="font-family: 'Segoe UI Emoji',serif;font-weight: bold;">Utilitaire de premiere connexion</h2>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Creer Un compte Administrateur</h3>
                    <form method="post" action="{{url('/firstadmin')}}" class="register-form">
                        @csrf
                        <div class="form-group">
                            <input name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Username">
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <input name="nom" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" placeholder="Nom">
                            @if ($errors->has('nom'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('nom') }}</strong>
                                </span>
                            @endif
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <input name="prenom" class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" placeholder="Prenom">
                            @if ($errors->has('prenom'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('prenom') }}</strong>
                                </span>
                            @endif
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <input name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" type="password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <input name="Verify" type="password" class="form-control{{ $errors->has('Verify') ? ' is-invalid' : '' }}" placeholder="Retaper mot de passe" ><br>
                            @if ($errors->has('Verify'))
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('Verify') }}</strong>
                            </span>
                            @endif
                        </div> <!-- form-group// -->
                        <input type="submit" class="btnRegister"  value="Register"/>
                    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>