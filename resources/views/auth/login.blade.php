<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CasaClos</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrapcss/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/Personalised-Login.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body style="font-family: 'Segoe UI',serif">
<div class="container">
    <div class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src={{asset('Images/Elbaraka.png')}} />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" method="post" action="{{url('/customlog') }}">
            @csrf
            <div class="form-group">
                <input name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{old('username') ? : 'username'}}">
                @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red">{{ $errors->first('username') }}</strong>
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
                <input id="domain" name="domaine" class="form-control{{ $errors->has('domaine') ? ' is-invalid' : '' }}" value="lab-brk" ><br>
                @if ($errors->has('domaine'))
                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('domaine') }}</strong>
                            </span>
                @endif
            </div> <!-- form-group// -->

            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Connexion</button>
        </form><!-- /form -->
        <a href="#" class="forgot-password">
            Forgot the password?
        </a>
    </div><!-- /card-container -->
</div><!-- /container -->
</body>
</html>
