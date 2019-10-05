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
    <div class="col-md-10" >
        <h4 style="margin-top: 3%;font-weight: bold;font-family: 'Segoe UI',sans-serif;padding-bottom:6px;border-bottom-style:solid;border-color:#FFDEAD;font-size: 30px;"> {{$app->nom}} </h4><br>
        @if(Session::has('Erreur'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('Erreur') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
            @if($admin)
            <form  method="post" action="{{url('/UpApp/'.$app->id)}}" enctype="multipart/form-data" >
                @csrf
                <div class="form-row fform">
                    <h4 style ="border-top-left-radius:15px; border-top-right-radius:15px;background-color:#F5B041;padding-bottom:5px;font-size:20px;text-align: center; color: white;"  class="col-md-12 "><strong>Informations Sur L'application</strong></h4>
                    <div class="form-group col-md-4">
                        <label for="nom" style="font-weight: bold;">Nom d'application</label>
                        <input type="text" class="form-control formu1" id="nom" value="{{$app->nom}}" name="nom" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Version" style="font-weight: bold;"> N° Version</label>
                        <input type="text" class="form-control formu1" id="Version" value="{{$app->Nver}}" name="Nver" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Editeur" style="font-weight: bold;">Editeur</label>
                        <input type="text" class="form-control formu1" id="Editeur" value="{{$app->editeur}}" name="editeur" readonly>
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="DMP" style="font-weight: bold;">Date mise en place</label>
                        <input type="text" id="DMP" class="form-control formul" value="{{$app->DMP}}" readonly name="DMP">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="DDM" style="font-weight: bold;">Dernière MAJ</label>
                        <input type="text" class="form-control formu1" id="DDM" value="{{$app->DDM}}" name="DDM" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Nomserveur" style="font-weight: bold;">Nom du serveur</label>
                        <input type="text" class="form-control formu1" id="nomserveur" value="{{$app->nomserveur}}" name="nomserveur" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="adressIP" style="font-weight: bold;">Adresse IP</label>
                        <input type="text" class="form-control formu1" id="adressIP" value="{{$app->adressIP}}" name="adressIP" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="OS" style="font-weight: bold;">Système d'exploitation</label>
                        <input type="text" class="form-control formu1" id="OS" value="{{$app->OS}}" name="OS" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="verOS" style="font-weight: bold;">Version OS</label>
                        <input type="text" class="form-control formu1" id="verOS" value="{{$app->verOS}}" name="verOS" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="DB" style="font-weight: bold;">Base de données</label>
                        <input type="text" class="form-control formu1" id="DB" value="{{$app->DB}}" name="DB" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="verDB" style="font-weight: bold;">Version BD</label>
                        <input type="text" class="form-control formu1" id="verDB" value="{{$app->verDB}}" name="verDB" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="typeapp" style="font-weight: bold;">Type Application</label>
                        <input type="text" class="form-control formu1" id="typeapp" value="{{$app->typeapp}}" name="typeapp" readonly>
                    </div>

                    <div class="form-group col-md-11">
                        <label for="description" style="font-weight: bold;">Déscription</label>
                        <textarea class="form-control formu1" id="description"  rows="3" cols="25" name="description" readonly>{{$app->description}}</textarea>
                    </div>
                </div>
                <div class="form-row fform">
                    <h4 class="col-md-12" style ="border-top-left-radius:15px;color: white; border-top-right-radius:15px;background-color:#F5B041;padding-bottom:5px;font-size:20px;text-align: center;"><strong>Hierarchie</strong></h4>
                    <div class="form-group col-md-6">
                        <label for="struct" style="font-weight: bold;">Structure</label>
                        <select id="sel_struct"  class="form-control" name="struct_id">
                            <option value="{{$app->struct_id}}">{{$struct->nom}}</option>
                            @foreach($structures as $structure)
                                <option value="{{$structure->id}}">{{$structure->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="adapp" style="font-weight: bold;">Administrateur Application</label>
                        <select id="sel_adapp"  class="form-control" name="user_id" required>
                            <option value="{{$app->user_id}}">{{$user->nom.' '.$user->prenom}}</option>
                            @foreach($depusers as $depuser)
                                <option value="{{$depuser->id}}">{{$depuser->nom.' '.$depuser->prenom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="admetier" style="font-weight: bold;">Administrateur Métier</label>
                        <input type="text" class="form-control formu1" id="admetier" value="{{$app->admetier}}" name="admetier" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="adbd" style="font-weight: bold;">Administrateur BD</label>
                        <input type="text" class="form-control formu1" id="adbd" value="{{$app->adbd}}" name="adbd" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="adsys" style="font-weight: bold;">Administrateur Système</label>
                        <input type="text" class="form-control formu1" id="adsys" value="{{$app->adsys}}" name="adsys" readonly>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark Enregistrer" style=" position: relative;left: 820px;top:-30px">Enregistrer</button>
            </form>
            @else
            @if($Responsable)
        <form  method="post" action="{{url('NewApp/'.$app->id)}}" enctype="multipart/form-data" >
            @csrf
            <div class="form-row fform">
                <h4 style ="border-top-left-radius:15px; border-top-right-radius:15px;background-color:#F5B041;padding-bottom:5px;font-size:20px;text-align: center; color: white;"  class="col-md-12 "><strong>Informations Sur L'application</strong></h4>
                <div class="form-group col-md-4">
                    <label for="nom" style="font-weight: bold;">Nom d'application</label>
                    <input type="text" class="form-control formu1" id="nom" value="{{$app->nom}}" name="nom" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="Version" style="font-weight: bold;"> N° Version</label>
                    <input type="text" class="form-control formu1" id="Version" value="{{$app->Nver}}" name="Nver" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="Editeur" style="font-weight: bold;">Editeur</label>
                    <input type="text" class="form-control formu1" id="Editeur" value="{{$app->editeur}}" name="editeur" readonly>
                </div>
                <div class="form-group  col-md-4">
                    <label for="DMP" style="font-weight: bold;">Date mise en place</label>
                    <input type="date" id="DMP" class="form-control formul" value="{{$app->DMP}}" name="DMP" readonly>
                </div>
                <div class="form-group  col-md-4">
                    <label for="DDM" style="font-weight: bold;">Dernière MAJ</label>
                    <input type="text" class="form-control formu1" id="DDM" value="{{$app->DDM}}" name="DDM" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="Nomserveur" style="font-weight: bold;">Nom du serveur</label>
                    <input type="text" class="form-control formu1" id="nomserveur" value="{{$app->nomserveur}}" name="nomserveur" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="adressIP" style="font-weight: bold;">Adresse IP</label>
                    <input type="text" class="form-control formu1" id="adressIP" value="{{$app->adressIP}}" name="adressIP" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="OS" style="font-weight: bold;">Système d'exploitation</label>
                    <input type="text" class="form-control formu1" id="OS" value="{{$app->OS}}" name="OS" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="verOS" style="font-weight: bold;">Version OS</label>
                    <input type="text" class="form-control formu1" id="verOS" value="{{$app->verOS}}" name="verOS" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="DB" style="font-weight: bold;">Base de données</label>
                    <input type="text" class="form-control formu1" id="DB" value="{{$app->DB}}" name="DB" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="verDB" style="font-weight: bold;">Version BD</label>
                    <input type="text" class="form-control formu1" id="verDB" value="{{$app->verDB}}" name="verDB" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="typeapp" style="font-weight: bold;">Type Application</label>
                    <input type="text" class="form-control formu1" id="typeapp" value="{{$app->typeapp}}" name="typeapp" required>
                </div>

                <div class="form-group col-md-11">
                    <label for="description" style="font-weight: bold;">Déscription</label>
                    <textarea class="form-control formu1" id="description"  rows="3" cols="25" name="description" required>{{$app->description}}</textarea>
                </div>
            </div>
            <div class="form-row fform">
                <h4 class="col-md-12" style ="border-top-left-radius:15px;color: white; border-top-right-radius:15px;background-color:#F5B041;padding-bottom:5px;font-size:20px;text-align: center;"><strong>Hierarchie</strong></h4>
                <div class="form-group col-md-6">
                    <label for="struct" style="font-weight: bold;">Structure</label>
                    <input type="text" class="form-control formu1" id="struct" value="{{$struct->nom}}" name="struct" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="adapp" style="font-weight: bold;">Administrateur Application</label>
                    <input type="text" class="form-control formu1" id="adapp" value="{{$user->nom.' '.$user->prenom}}" name="adapp" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="admetier" style="font-weight: bold;">Administrateur Métier</label>
                    <input type="text" class="form-control formu1" id="admetier" value="{{$app->admetier}}" name="admetier" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="adbd" style="font-weight: bold;">Administrateur BD</label>
                    <input type="text" class="form-control formu1" id="adbd" value="{{$app->adbd}}" name="adbd" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="adsys" style="font-weight: bold;">Administrateur Système</label>
                    <input type="text" class="form-control formu1" id="adsys" value="{{$app->adsys}}" name="adsys" required>
                </div>

            </div>
            <button type="submit" class="btn btn-dark Enregistrer" style=" position: relative;left: 820px;top:-30px">Enregistrer</button>
        </form>
            @else
            <form  method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-row fform">
                    <h4 style ="border-top-left-radius:15px; border-top-right-radius:15px;background-color:#F5B041;padding-bottom:5px;font-size:20px;text-align: center; color: white;"  class="col-md-12 "><strong>Informations Sur L'application</strong></h4>
                    <div class="form-group col-md-4">
                        <label for="nom" style="font-weight: bold;">Nom d'application</label>
                        <input type="text" class="form-control formu1" id="nom" value="{{$app->nom}}" name="nom" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Version" style="font-weight: bold;"> N° Version</label>
                        <input type="text" class="form-control formu1" id="Version" value="{{$app->Nver}}" name="Nver" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Editeur" style="font-weight: bold;">Editeur</label>
                        <input type="text" class="form-control formu1" id="Editeur" value="{{$app->editeur}}" name="editeur" readonly>
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="DMP" style="font-weight: bold;">Date mise en place</label>
                        <input type="datetime-local" id="DMP" class="form-control formul" value="{{$app->DMP}}" readonly>
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="DDM" style="font-weight: bold;">Dernière MAJ</label>
                        <input type="datetime-local" class="form-control formu1" id="DDM" value="{{$app->DDM}}" name="" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Nomserveur" style="font-weight: bold;">Nom du serveur</label>
                        <input type="text" class="form-control formu1" id="Nomserveur" value="{{$app->nomserveur}}" name="nomserveur" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="adressIP" style="font-weight: bold;">Adresse IP</label>
                        <input type="text" class="form-control formu1" id="adressIP" value="{{$app->adressIP}}" name="adressIP" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="OS" style="font-weight: bold;">Système d'exploitation</label>
                        <input type="text" class="form-control formu1" id="OS" value="{{$app->OS}}" name="OS" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="verOS" style="font-weight: bold;">Version OS</label>
                        <input type="text" class="form-control formu1" id="verOS" value="{{$app->verOS}}" name="verOS" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="DB" style="font-weight: bold;">Base de données</label>
                        <input type="text" class="form-control formu1" id="DB" value="{{$app->DB}}" name="DB" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="verDB" style="font-weight: bold;">Version BD</label>
                        <input type="text" class="form-control formu1" id="verDB" value="{{$app->verDB}}" name="verDB" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="typeapp" style="font-weight: bold;">Type Application</label>
                        <input type="text" class="form-control formu1" id="typeapp" value="{{$app->typeapp}}" name="typeapp" readonly>
                    </div>

                    <div class="form-group col-md-11">
                        <label for="description" style="font-weight: bold;">Déscription</label>
                        <textarea class="form-control formu1" id="description"  rows="3" cols="25" name="description" readonly>{{$app->description}}</textarea>
                    </div>
                </div>
                <div class="form-row fform">
                    <h4 class="col-md-12" style ="border-top-left-radius:15px;color: white; border-top-right-radius:15px;background-color:#F5B041;padding-bottom:5px;font-size:20px;text-align: center;"><strong>Hierarchie</strong></h4>
                    <div class="form-group col-md-6">
                        <label for="struct" style="font-weight: bold;">Structure</label>
                        <input type="text" class="form-control formu1" id="struct" value="{{$struct->nom}}" name="struct" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="adapp" style="font-weight: bold;">Administrateur Application</label>
                        <input type="text" class="form-control formu1" id="adapp" value="{{$user->nom.' '.$user->prenom}}" name="adapp" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="admetier" style="font-weight: bold;">Administrateur Métier</label>
                        <input type="text" class="form-control formu1" id="admetier" value="{{$app->admetier}}" name="admetier" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="adbd" style="font-weight: bold;">Administrateur BD</label>
                        <input type="text" class="form-control formu1" id="adbd" value="{{$app->adbd}}" name="adbd" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="adsys" style="font-weight: bold;">Administrateur Système</label>
                        <input type="text" class="form-control formu1" id="adsys" value="{{$app->adsys}}" name="adsys" readonly>
                    </div>
                </div>
            </form>
                @endif
            @endif
        <a href="{{url('/')}}"><button  class="btn btn-outline-danger retour " style=" position: relative;left:730px; top:-68px">Retour</button></a>
    </div>
    <div class="col-md-2">
        <a href="{{ url('/History/'.$app->id) }}" class="btn btn-dark btn-xl btn-circle" style="margin-top: 30%;"><i class="fas fa-history  fa-2x icon" style="position: center;"></i></a>
        <h5>Historique</h5>
        @if($Responsable)
            <a data-toggle="modal" data-target="#erasemodal" data-backdrop="static" data-keyboard="false" href="" class="btn btn-outline-danger btn-xl btn-circle" style="margin-top: 30%;"><i class="fa fa-times fa-2x icon" style="position: center;"></i></a>
            <h5>Supprimer</h5>
            <div class="modal fade" id="erasemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Voulez vous supprimer ce compte?</h4>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                        </div>
                        <div class="modal-body"><span style="color:red">ATTENTION :</span> Voulez vous vraiment supprimer cette application ?</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                            <a class="btn btn-danger" href="{{url('/Deleteapp/'.$app->id)}}" >Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
</div>
</body>
<script type='text/javascript'>

    $(document).ready(function(){

        // Department Change
        $('#sel_struct').change(function(){

            // Department id
            var id = $(this).val();

            // Empty the dropdown
            $('#sel_adapp').empty();

            // AJAX request
            $.ajax({
                url: '{{url('/getusers/')}}'+'/'+id,
                type: 'GET',
                dataType: 'json',
                success: function(response)
                {

                    var len = 0;
                    if(response['data'] != null){// si il ya des utilisateurs
                        len = response['data'].length;
                    }

                        // Read data and create <option >
                        for(var i=0; i<len; i++){

                            var id = response['data'][i].id;
                            var name = response['data'][i].nom;
                            var prenom = response['data'][i].prenom;

                            var option = "<option value='"+id+"'>"+name+' '+prenom+"</option>";

                            $("#sel_adapp").append(option);
                        }
                    },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                }

            });
        });

    });

</script>
</html>