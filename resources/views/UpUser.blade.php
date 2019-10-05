<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Software Inventory</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrapcss/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('Fontawesome/css/all.css')}}" >
    <link href="{{asset('css/formulairestyle.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/Acceuil.css')}}">

</head>
<body>
@include('Navigation')

<div class="row">
    <div class="col-md-10" style="margin-top: 3%;">
        <h4 style="margin-left: 2%;font-weight: bold;font-family: 'Segoe UI',sans-serif;padding-bottom:4px;border-bottom-style:solid;border-color:#FFDEAD;"> Modifier Compte : {{$user['username']}} </h4><br>
        @if(Session::has('Erreur'))
            <div class="alert alert-danger" style="margin-left: 2%;" role="alert">
                {{ Session::get('Erreur') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h4  style="margin-left: 2%;font-weight: bold;border-top-left-radius:15px; border-top-right-radius:15px;background-color:#A7E8A7;padding-bottom:5px;font-size:20px;text-align: center;font-family: 'Segoe UI',sans-serif;">Modification </h4>
        <form method="post" action="{{url('/UpUser/'.$user->id)}}">
            @csrf
            <div class="form-row" style="margin-left: 2%;">
                <div class="form-group col-md-6">
                    <label for="name" style="font-weight: bold;font-family: Calibri,serif;font-size: 18px;">Nom :</label>
                    <input type="text" class="form-control" id="name" placeholder="Nom" name="nom" value="{{$user['nom']}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="prenom" style="font-weight: bold;font-family: Calibri,serif;font-size: 18px;">Prenom :</label>
                    <input type="text" class="form-control" id="prenom" placeholder="Prenom User" name="prenom"  value="{{$user['prenom']}}">
                </div>
            </div>
            <div class="form-group" style="margin-left: 2%;">
                <label for="type" style="font-weight: bold;font-family: Calibri,serif;font-size: 18px;">Modifier type de profil :</label>
                <select  class="form-control" name="Admin" id="type" required>
                    @if($user->Admin && $user->id != \Illuminate\Support\Facades\Auth::id() )
                        <option  value=1 class="active">Administrateur</option>
                    @else
                        @if($user->id == \Illuminate\Support\Facades\Auth::id())
                            <option  value=1 class="active">Administrateur</option>
                            <option  value=0>Gestionnaire</option>
                        @else
                            <option  value=0 class="active">Gestionnaire</option>
                            <option  value=1>Administrateur</option>
                        @endif
                    @endif
                </select>

            </div>
            <div class="form-group" style="margin-left: 2%;">
                <label for="struct" style="font-weight: bold;font-family: Calibri,serif;font-size: 18px;">Structure :</label>
                <select  class="form-control" name="struct_id" id="struct" required>
                    <option  value="{{$user -> struct_id}}" class="active">{{$structure -> nom}}</option>
                    @foreach($structures as $structur)
                    <option  value="{{$structur -> id}}" class="active">{{$structur -> nom}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-info btn-lg" style="float: right;">Enregistrer</button>
        </form>
        <a href="{{url('/AcceuilAdmin/')}}"><button class="btn btn-danger btn-lg" style="margin-left: 2%;">Retour</button></a>
    </div>
    <div class="col-md-2" style="margin-top:100px;">
        @if($user->Admin == 0 || $user->id == \Illuminate\Support\Facades\Auth::id())
        <a data-toggle="modal" data-target="#erasemodal" data-backdrop="static" data-keyboard="false" href=""  class="btn btn-outline-danger btn-xl btn-circle"style="border-radius: 50%"><i class="fa fa-times fa-2x icon"></i></a>
        <h5> Supprimer </h5>
        <div class="modal fade" id="erasemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Voulez vous supprimer ce compte?</h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body"><span style="color:red">ATTENTION :</span> Si le compte est supprimé il ne peut plus être récupéré</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                        <a class="btn btn-danger" href="{{url('/DeleteUser/'.$user->id)}}" >Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
</body>
</html>
