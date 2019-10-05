<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Software Inventory</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrapcss/bootstrap.css')}}">
    <link href="{{asset('/Fontawesome/css/all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/Acceuil.css')}}">

    <!-- Fonts -->
    <link href="{{asset('css/tableaustyle.css')}}" rel="stylesheet">
</head>
<nav>
    @include('Navigation')
</nav>
<body>
<div class="container">
    <div class="row">
    <div class="col-md-10">
        <nav class="nav nav-pills" style="margin-top: 2%;margin-right: 5%;">
            <a id="structpill" class="nav-item nav-link" href="#Geststructure" data-toggle="pill" style="color: black;font-weight: bold;">Gestion des structures</a>
            <a id="appill" class="nav-item nav-link" href="#Gestapp" data-toggle="pill" style="color: black;font-weight: bold;">Annuaire des applications</a>
            <a id="userpill" class="nav-item nav-link" href="#Gestuser" data-toggle="pill" style="color: black;font-weight: bold;">Gestion des utilisateurs</a>
        </nav>

        <div class="tab-content">
            <div id="Geststructure" class="tab-pane fade table-wrapper active" style="margin-left: 0px;margin-top: 3%">
                @if(Session::has('message'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div id="newStructure" style="display:none;">
                    <form  method="post" action="{{url('/Createstruct')}}">
                        @csrf
                        <h4 class="col-md-12" style="border-top-left-radius:15px; border-top-right-radius:15px;background-color:#A7E8A7;padding-bottom:5px;font-size:20px;text-align: center; font-weight: bold">Ajouter Une Structure</h4>
                        <div class="form-group" style="margin-left: 2%;margin-right: 2%;">
                            <label for="StrName" style="font-weight: bold;">Nom :</label>
                            <input type="text" class="form-control" id="StrName" placeholder="Nom de la structure" name="nom" required>
                        </div>
                        <button type="submit" class="form-group centrage btn  btn-info" style="float: right;margin-right: 2%;"> Enregistrer</button>
                    </form>
                    <a><button id="cachéSTR" class="btn btn-outline-danger btn-lg btn-circle" style="border-radius:50%;margin-left: 2%;"><i class="fa fa-lg fa-angle-double-up"></i></button></a>
                </div>
                <div class="row">
                    <div class="col-md-3" style="margin-bottom: 2%;height: 45px;">
                        <button id="newStr" class="btn btn-lg btn-info"><i class="fa fa-plus-square"></i> Nouvelle</button>
                    </div>
                </div>
                <div id="table-scroll">
                    <div class="ttable">
                        <table class="table">
                            <thead  style ="background-color:#5BC0DE;" class="entet">
                            <tr>
                                <th scope="col" style="text-align: center;">Nom</th>
                                <th scope="col" style="text-align: center;">Nombre d'utilisateurs</th>
                                <th scope="col" style="text-align: center;">Nombre d'application</th>
                                <th scope="col" style="text-align: center;">Edit</th>
                                <th scope="col" style="text-align: center;">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($structures as $struct)
                                <tr>
                                    <td style="text-align: center;">{{$struct->nom}}</td>
                                    <td style="text-align: center;">{{$struct->nb_users}}</td>
                                    <td style="text-align: center;">{{$struct->nb_app}}</td>
                                    <td style="text-align: center;"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModifModel" data-userid="{{$struct->id}}">Modifier</button></td>
                                    <td style="text-align: center;"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#RemoveModel" data-structid="{{$struct->id}}">Supprimer</button></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ModifModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modifier Structure</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="Modelform" action="{{url('/Modifstruct')}}">
                                @csrf
                                <input type="hidden" id="user_id" name="user_id" value="">
                                <input type="text" name="nom" class="form-control" placeholder="Nouveau nom de structure"><br>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: left;">Close</button>
                                <button type="submit" class="btn btn-success" style="float: right;">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="RemoveModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Supprimer Structure ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{url('/Removestruct')}}">
                                @csrf
                                <input type="hidden" id="struct_id" name="struct_id" value="">
                                <button type="button" class="btn btn-warning" data-dismiss="modal" style="float: left;">Close</button>
                                <button type="submit" class="btn btn-danger" style="float: right;">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <div id="Gestapp" class="tab-pane fade table-wrapper" style="margin-left: 0px;margin-top: 3%">
            <div class="row"  style="margin-left: 0px;margin-top:5%">
                <input type="text" class="form-control col-md-5" style="border-top-right-radius: 0; border-bottom-right-radius: 0;" id="myInputapp" onkeyup="rechercheapp()" placeholder="Rechercher">
                <button  class="btn btn-outline-info" style="border-top-left-radius: 0 ; border-bottom-left-radius : 0"><i class="fa fa-search"></i></button>
            </div>
            <div id="table-scroll" style="margin-top: 2%;">
                <div class="ttable">
                    <table class="table" id="myTableapp">
                        <thead  style ="background-color:#5BC0DE;" class="entet">
                        <tr>
                            <th scope="col" style="text-align: center;">Nom</th>
                            <th scope="col" style="text-align: center;">N° Version</th>
                            <th scope="col" style="text-align: center;">Adresse IP</th>
                            <th scope="col" style="text-align: center;">Système d'exploitation</th>
                            <th scope="col" style="text-align: center;">Base de données</th>
                            <th scope="col" style="text-align: center;">Responsable</th>
                            <th scope="col" style="text-align: center;">Dernière MAJ</th>
                            <th scope="col" style="text-align: center;">Sturcture</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($applications as $application)
                            <tr onclick="location.href='{{url('/FichApp/'.$application->id)}}'" style="cursor: pointer ; " class="lien">
                                <td style="text-align: center;">{{$application-> nom}}</td>
                                <td style="text-align: center;">{{$application-> Nver}}</td>
                                <td style="text-align: center;">{{$application-> id}}</td>
                                <td style="text-align: center;">{{$application-> OS}}</td>
                                <td style="text-align: center;">{{$application-> DB}}</td>
                                <td style="text-align: center;">{{$application->username.' '.$application->prenom}}</td>
                                <td style="text-align: center;">{{$application-> DDM}}</td>
                                <td style="text-align: center;" >{{$application-> Str}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            <div id="Gestuser" class="tab-pane fade table-wrapper" style="margin-left: 0px;margin-top: 3%;width: 100%;">
                <div id="newcompte" style="display:none;">
                    <form  method="post" action="{{url('/createuser')}}">
                        @csrf
                        <h4 class="col-md-12" style="border-top-left-radius:15px; border-top-right-radius:15px;background-color:#A7E8A7;padding-bottom:5px;font-size:20px;text-align: center;" >Ajouter nouveau compte</h4>
                        <div class="form-group" style="margin-left: 2%;margin-right: 2%;">
                            <label for="username" style="font-weight: bold;">Identifiant :</label>
                            <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="username" placeholder="Identifiant" name="username" required>
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group" style="margin-left: 2%;margin-right: 2%;">
                            <label for="nom" style="font-weight: bold;">Nom :</label>
                            <input type="text" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" id="nom" placeholder="Nom" name="nom" required>
                            @if ($errors->has('nom'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('nom') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group" style="margin-left: 2%;margin-right: 2%;">
                            <label for="prenom" style="font-weight: bold;">Prenom :</label>
                            <input type="text" class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" id="prenom" placeholder="Prenom" name="prenom" required>
                            @if ($errors->has('prenom'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('prenom') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group" style="margin-left: 2%;margin-right: 2%;">
                            <label for="Admin" style="font-weight: bold;">Profil :</label>
                            <select id="Admin"  class="form-control" name="Admin">
                                <option value="0">Gestionnaire</option>
                                <option value="1">Administrateur</option>
                            </select>
                        </div>
                        <div class="form-group" style="margin-left: 2%;margin-right: 2%;">
                            <label for="structure" style="font-weight: bold;">Structure :</label>
                            <select id="structure"  class="form-control" name="struct_id">
                                @foreach($structures as $struct)
                                <option value="{{$struct->id}}">{{$struct->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" style="margin-left: 2%;margin-right: 2%;">
                            <label for="pwd" style="font-weight: bold;">Mot de passe :</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="form-group" style="margin-left: 2%;margin-right: 2%;">
                            <label for="Verify" style="font-weight: bold;">Retaper Mot de passe :</label>
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="Verify" placeholder="Password" name="Verify" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="form-group centrage btn  btn-info" style="float: right;margin-right: 2%;"> Enregistrer</button>
                    </form>
                    <a><button id="caché" class="btn btn-outline-danger btn-lg btn-circle" style="border-radius:50%;margin-left: 2%;"><i class="fa fa-lg fa-angle-double-up"></i></button></a>
                </div>
                <button id="new" style="margin-bottom: 2%;" class="btn btn-lg btn-info"><i class="fa fa-plus-square"></i> Nouveau</button><br>
                <div id="table-scroll">
                    <div class="ttable">
                        <table class="table">
                            <thead style ="background-color:#5BC0DE;" class="entet">
                            <tr>

                                <th scope="col">ID</th>
                                <th scope="col">Identifiant</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Structure</th>
                                <th scope="col">Profil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr onclick="location.href='{{url('/UpUser/'.$user->id)}}'" style="cursor: pointer ; " class="lien" >
                                    <th scope="row"> {{$user -> id}} </th>
                                    <td>{{$user -> username}}</td>
                                    <td>{{$user -> nom}}</td>
                                    <td>{{$user -> prenom}}</td>
                                    <td>{{$user -> Str}}</td>
                                    @if($user->Admin)
                                    <td  class="profil">Administrateur</td>
                                     @else
                                        <td  class="profil">Gestionnaire</td>
                                     @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2" style="margin-top: 6%;margin-left: 0px;">
        <a href="{{url('/ExportExcelapps')}}" class="btn btn-success btn-xl btn-circle"><i class="fa fa-file-excel fa-2x icon"></i></a>
        <h5> Exporter Excel </h5>
    </div>
</div>
</div>
</body>
<script>
    function rechercheapp() {
        // Declare variables
        var input, filter, table, tr, td, i, j,bool;
        input = document.getElementById("myInputapp");
        filter = input.value.toLowerCase();
        table = document.getElementById("myTableapp");
        tr = table.getElementsByTagName("tr");


        for (i=0; i< tr.length+1; i++) {
            bool = 0;
            for (j = 0; j < 8; j++) {
                td = tr[i].find('td:eq(' + j + ')');
                alert(td.text());
                if (td) {
                    if (td.text().toLowerCase().indexOf(filter.toLowerCase()) > -1) {
                        var str = tr[i].find('td:eq(' + j + ')').text().toLowerCase();
                        var mouloud = str.replace(filter.toLowerCase(), "<span style=' text-decoration: underline; background: #5bc0de; color:white;'>" + filter + "</span>");
                        tr[i].find('td:eq(' + j + ')').empty();
                        $('tr:eq(' + i + ')').find('td:eq(' + j + ')').append(mouloud);
                        tr[i].style.display = "";
                        bool = 1;
                    } else {
                        var str = tr[i].find('td:eq(' + j + ')').text();
                        var mouloud = str.replace("<span style=' text-decoration: underline; background: #5bc0de; color:white;'>", "");
                        mouloud.replace("</span>", "");
                        $('tr:eq(' + i + ')').find('td:eq(' + j + ')').empty();
                        $('tr:eq(' + i + ')').find('td:eq(' + j + ')').append(mouloud);
                        if (j == 7 && bool == 0)
                        {
                            tr[i].style.display = "none";
                        }

                    }
                }
            }
        }
    }
    $(function(){
        $("#new").click(function(){
            $("#newcompte").slideToggle();
            $("#new").slideToggle();
        });
        $("#caché").click(function(){
            $("#newcompte").slideToggle();
            $("#new").slideToggle();
        });

    });
    $(function(){
        $("#newStr").click(function(){
            $("#newStructure").slideToggle();
            $("#newStr").slideToggle();
        });
        $("#cachéSTR").click(function(){
            $("#newStructure").slideToggle();
            $("#newStr").slideToggle();
        });

    });

    $(document).ready(function(){
        $('[data-userid]').click(function(){
            var userid = $(this).data('userid');
            $('#user_id').attr('value', userid);
        });
        $('[data-structid]').click(function(){
            var structid = $(this).data('structid');
            $('#struct_id').attr('value', structid);
        });
    });

    $(document).ready(function() {
        $( "#structpill" ).click();
    });
</script>
</html>







