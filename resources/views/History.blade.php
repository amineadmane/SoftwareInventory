<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Software Inventory</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrapcss/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/css/History.css')}}">
    <link rel="stylesheet" href="{{asset('/css/Acceuil.css')}}">
    <link href="{{asset('/Fontawesome/css/all.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery-3.4.1.js')}}"></script>
    <script src="{{asset('/js/bootstrapjs/bootstrap.js')}}" ></script>


</head>
<nav>
    @include('Navigation')
</nav>
<body>
<div class="container">
    <div class="page-header">
        <h4 style="margin-top: 3%;font-weight: bold;font-family: 'Segoe UI',sans-serif;padding-bottom:6px;border-bottom-style:solid;border-color:#54AFED;font-size: 30px;">Historique de : {{$app->first()->nom}} </h4><br>

    </div>
    <div id="timeline">
        <div class="row timeline-movement timeline-movement-top">
            <div class="timeline-badge timeline-filter-movement">
                <a href="#">
                    <i class="far fa-clock fa-lg"></i>
                </a>
            </div>

        </div>
        @for($i = $i-1;$i>=2;$i--)
        <div class="row timeline-movement">

            <div class="timeline-badge">
                <div class="Text-Ver">
                    <span class="timeline-balloon-date-day"><strong>{{date('j F',strtotime($ap[$i]->DDM))}}</strong></span>
                </div>
            </div>


            <div class="col-sm-6  timeline-item">
                <div class="row">
                    <div class="col-sm-11">
                        <div class="timeline-panel credits"style="display:{{$left}} ">
                            <ul class="timeline-panel-ul">
                                @if($ap[$i]->nom!=$ap[$i-1]->nom)<li><span class="causale">Nom : {{$ap[$i]->nom}}</span> </li>@endif
                                @if($ap[$i]->Nver!=$ap[$i-1]->Nver)<li><span class="causale">N° Version :{{$ap[$i]->Nver}}</span> </li>@endif
                                @if($ap[$i]->editeur!=$ap[$i-1]->editeur)<li><span class="causale">Editeur : {{$ap[$i]->editeur}}</span> </li>@endif
                                @if($ap[$i]->DMP!=$ap[$i-1]->DMP)<li><span class="causale">Date mise en place : {{$ap[$i]->DMP}}</span> </li>@endif
                                @if($ap[$i]->nomserveur!=$ap[$i-1]->nomserveur)<li><span class="causale">Nom du serveur : {{$ap[$i]->nomserveur}}</span> </li>@endif
                                @if($ap[$i]->adressIP!=$ap[$i-1]->adressIP)<li><span class="causale">Adresse IP : {{$ap[$i]->adressIP}}</span> </li>@endif
                                @if($ap[$i]->OS!=$ap[$i-1]->OS)<li><span class="causale">Système d'exploitation : {{$ap[$i]->OS}}</span> </li>@endif
                                @if($ap[$i]->verOS!=$ap[$i-1]->verOS)<li><span class="causale">Version OS : {{$ap[$i]->verOS}}</span> </li>@endif
                                @if($ap[$i]->DB!=$ap[$i-1]->DB)<li><span class="causale">Base de données : {{$ap[$i]->DB}}</span> </li>@endif
                                @if($ap[$i]->verDB!=$ap[$i-1]->verDB)<li><span class="causale">Version BD : {{$ap[$i]->verDB}}</span> </li>@endif
                                @if($ap[$i]->typeapp!=$ap[$i-1]->typeapp)<li><span class="causale">Type Application : {{$ap[$i]->typeapp}}</span> </li>@endif
                                @if($ap[$i]->description!=$ap[$i-1]->description)<li><span class="causale">Déscription : {{$ap[$i]->description}}</span> </li>@endif
                                @if($ap[$i]->admetier!=$ap[$i-1]->admetier)<li><span class="causale">Administrateur Métier : {{$ap[$i]->admetier}}</span> </li>@endif
                                @if($ap[$i]->adbd!=$ap[$i-1]->adbd)<li><span class="causale">Administrateur BD : {{$ap[$i]->adbd}}</span> </li>@endif
                                @if($ap[$i]->adsys!=$ap[$i-1]->adsys)<li><span class="causale">Administrateur Système : {{$ap[$i]->adsys}}</span> </li>@endif
                                <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>{{$ap[$i]->DDM}}</small></p> </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-6  timeline-item">
                <div class="row">
                    <div class="col-sm-offset-2 col-sm-11" style="display:{{$right}}">
                        <div class="timeline-panel debits">
                            <ul class="timeline-panel-ul">
                                @if($ap[$i]->nom!=$ap[$i-1]->nom)<li><span class="causale">Nom : {{$ap[$i]->nom}}</span> </li>@endif
                                @if($ap[$i]->Nver!=$ap[$i-1]->Nver)<li><span class="causale">N° Version :{{$ap[$i]->Nver}}</span> </li>@endif
                                @if($ap[$i]->editeur!=$ap[$i-1]->editeur)<li><span class="causale">Editeur : {{$ap[$i]->editeur}}</span> </li>@endif
                                @if($ap[$i]->DMP!=$ap[$i-1]->DMP)<li><span class="causale">Date mise en place : {{$ap[$i]->DMP}}</span> </li>@endif
                                @if($ap[$i]->nomserveur!=$ap[$i-1]->nomserveur)<li><span class="causale">Nom du serveur : {{$ap[$i]->nomserveur}}</span> </li>@endif
                                @if($ap[$i]->adressIP!=$ap[$i-1]->adressIP)<li><span class="causale">Adresse IP : {{$ap[$i]->adressIP}}</span> </li>@endif
                                @if($ap[$i]->OS!=$ap[$i-1]->OS)<li><span class="causale">Système d'exploitation : {{$ap[$i]->OS}}</span> </li>@endif
                                @if($ap[$i]->verOS!=$ap[$i-1]->verOS)<li><span class="causale">Version OS : {{$ap[$i]->verOS}}</span> </li>@endif
                                @if($ap[$i]->DB!=$ap[$i-1]->DB)<li><span class="causale">Base de données : {{$ap[$i]->DB}}</span> </li>@endif
                                @if($ap[$i]->verDB!=$ap[$i-1]->verDB)<li><span class="causale">Version BD : {{$ap[$i]->verDB}}</span> </li>@endif
                                @if($ap[$i]->typeapp!=$ap[$i-1]->typeapp)<li><span class="causale">Type Application : {{$ap[$i]->typeapp}}</span> </li>@endif
                                @if($ap[$i]->description!=$ap[$i-1]->description)<li><span class="causale">Déscription : {{$ap[$i]->description}}</span> </li>@endif
                                @if($ap[$i]->admetier!=$ap[$i-1]->admetier)<li><span class="causale">Administrateur Métier : {{$ap[$i]->admetier}}</span> </li>@endif
                                @if($ap[$i]->adbd!=$ap[$i-1]->adbd)<li><span class="causale">Administrateur BD : {{$ap[$i]->adbd}}</span> </li>@endif
                                @if($ap[$i]->adsys!=$ap[$i-1]->adsys)<li><span class="causale">Administrateur Système : {{$ap[$i]->adsys}}</span> </li>@endif
                                <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>{{$ap[$i]->DDM}}</small></p> </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
         <?php
            $env=$left;
            $left=$right;
            $right=$env
            ?>
        @endfor

            <div class="row timeline-movement">

                <div class="timeline-badge">
                    <div class="Text-Ver">
                        <span class="timeline-balloon-date-day"><strong>{{date('j F',strtotime($ap[1]->DDM))}}</strong></span>
                    </div>
                </div>


                <div class="col-sm-6  timeline-item">
                    <div class="row">
                        <div class="col-sm-11">
                            <div class="timeline-panel credits">
                                <ul class="timeline-panel-ul">
                                    <li><span class="causale">Nom : {{$ap[1]->nom}}</span> </li>
                                    <li><span class="causale">N° Version :{{$ap[1]->Nver}}</span> </li>
                                    <li><span class="causale">Editeur : {{$ap[1]->editeur}}</span> </li>
                                    <li><span class="causale">Date mise en place : {{$ap[1]->DMP}}</span> </li>
                                    <li><span class="causale">Nom du serveur : {{$ap[1]->nomserveur}}</span> </li>
                                    <li><span class="causale">Adresse IP : {{$ap[1]->adressIP}}</span> </li>
                                    <li><span class="causale">Système d'exploitation : {{$ap[1]->OS}}</span> </li>
                                    <li><span class="causale">Version OS : {{$ap[1]->verOS}}</span> </li>
                                    <li><span class="causale">Base de données : {{$ap[1]->DB}}</span> </li>
                                    <li><span class="causale">Version BD : {{$ap[1]->verDB}}</span> </li>
                                    <li><span class="causale">Type Application : {{$ap[1]->typeapp}}</span> </li>
                                    <li><span class="causale">Déscription : {{$ap[1]->description}}</span> </li>
                                    <li><span class="causale">Administrateur Métier : {{$ap[1]->admetier}}</span> </li>
                                    <li><span class="causale">Administrateur BD : {{$ap[1]->adbd}}</span> </li>
                                    <li><span class="causale">Administrateur Système : {{$ap[1]->adsys}}</span> </li>

                                    <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>{{$ap[1]->DDM}}</small></p> </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    <a href="{{url('/FichApp/'.$app->first()->id)}}"><button  class="btn btn-outline-danger retour " style=" position: relative;left:87%; top:-57px">Retour</button></a>
</div>
</body>
</html>