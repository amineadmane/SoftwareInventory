<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CasaClos</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrapcss/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/Acceuil.css')}}">
    <link href="{{asset('css/formulairestyle.css')}}" rel="stylesheet">
    <link href="{{asset('/Fontawesome/css/all.css')}}" rel="stylesheet">
    <!-- Fonts -->
</head>
<nav>
    @include('Navigation')
</nav>
<body>
<div class="container">
    <div class="row" >
        <div class="col-md-12" >
            <h4 style="margin-top: 3%;font-weight: bold;font-family: 'Segoe UI',sans-serif;padding-bottom:6px;border-bottom-style:solid;border-color:#FFDEAD;font-size: 30px;">Nouvelle Application</h4><br>
            @if(Session::has('Erreur'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('Erreur') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form  method="post" action="{{url('/CreateNewApp/')}}" enctype="multipart/form-data" >
                @csrf
                <div class="form-row fform">
                    <h4 style ="border-top-left-radius:15px; border-top-right-radius:15px;background-color:#F5B041;padding-bottom:5px;font-size:20px;text-align: center; color: white;"  class="col-md-12 "><strong>Informations Sur L'application</strong></h4>
                    <div class="form-group col-md-4">
                        <label for="nom" style="font-weight: bold;">Nom d'application</label>
                        <input type="text" class="form-control formu1" id="nom" value="" name="nom" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Version" style="font-weight: bold;"> N° Version</label>
                        <input type="text" class="form-control formu1" id="Version" name="Nver" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Editeur" style="font-weight: bold;">Editeur</label>
                        <input type="text" class="form-control formu1" id="Editeur"  name="editeur" required>
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="DMP" style="font-weight: bold;">Date de mise en place</label>
                        <input type="date" id="DMP" class="form-control formul" name="DMP" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nomserveur" style="font-weight: bold;">Nom du serveur</label>
                        <input type="text" class="form-control formu1" id="nomserveur"  name="nomserveur" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="adressIP" style="font-weight: bold;">Adresse IP</label>
                        <input type="text" class="form-control formu1" id="adressIP"  name="adressIP" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="OS" style="font-weight: bold;">Système d'exploitation</label>
                        <input type="text" class="form-control formu1" id="OS"  name="OS" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="verOS" style="font-weight: bold;">Version OS</label>
                        <input type="text" class="form-control formu1" id="verOS"  name="verOS" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="DB" style="font-weight: bold;">Base de données</label>
                        <input type="text" class="form-control formu1" id="DB" name="DB" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="verDB" style="font-weight: bold;">Version BD</label>
                        <input type="text" class="form-control formu1" id="verDB" name="verDB" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="typeapp" style="font-weight: bold;">Type Application</label>
                        <input type="text" class="form-control formu1" id="typeapp"  name="typeapp" required>
                    </div>

                    <div class="form-group col-md-11">
                        <label for="description" style="font-weight: bold;">Déscription</label>
                        <textarea class="form-control formu1" id="description"  rows="3" cols="25" name="description" ></textarea>
                    </div>
                </div>
                <div class="form-row fform">
                    <h4 class="col-md-12" style ="border-top-left-radius:15px;color: white; border-top-right-radius:15px;background-color:#F5B041;padding-bottom:5px;font-size:20px;text-align: center;"><strong>Hierarchie</strong></h4>

                    <div class="form-group col-md-6">
                        <label for="admetier" style="font-weight: bold;">Administrateur Métier</label>
                        <input type="text" class="form-control formu1" id="admetier"  name="admetier" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="adbd" style="font-weight: bold;">Administrateur BD</label>
                        <input type="text" class="form-control formu1" id="adbd"  name="adbd" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="adsys" style="font-weight: bold;">Administrateur Système</label>
                        <input type="text" class="form-control formu1" id="adsys"  name="adsys" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark Enregistrer" style=" position: relative;left: 820px;top:-30px">Soummetre</button>
            </form>
            <a href="{{url('/')}}"><button  class="btn btn-outline-danger retour " style=" position: relative;left:730px; top:-68px">Retour</button></a>
        </div>
    </div>
</div>
</body>
</html>