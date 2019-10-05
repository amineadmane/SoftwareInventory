<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CasaClos</title>
    <link rel="stylesheet" href="{{asset('css/Acceuil.css')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrapcss/bootstrap.css')}}">
    <link href="{{asset('/Fontawesome/css/all.css')}}" rel="stylesheet">
    <!-- Fonts -->
    <link href="{{asset('css/tableaustyle.css')}}" rel="stylesheet">
</head>
<nav>
    @include('Navigation')
</nav>
<body>
<div class="container">
    <div class="col-md-12">
    <h3 class="titre" style="position: relative; top:50px;font-weight: bold;"> {{$structname}}</h3>
        <div class="row">
            <div class="col-md-3">
                <a href="{{ url('/NewApp')}}" style="margin-bottom :30px;" > <button style="margin-bottom :30px; position: relative;top:85px" class="btn btn-lg btn-info"><i class="fa fa-plus-square"></i> Nouvelle</button> </a>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-7">
                <div class="row"  style="position: relative;top:85px;">
                    <input type="text" class="form-control col-md-5" style="border-top-right-radius: 0; border-bottom-right-radius: 0;" id="myInput" onkeyup="recherche()" placeholder="Rechercher">
                    <button  class="btn btn-outline-info" style="border-top-left-radius: 0 ; border-bottom-left-radius : 0"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
        <div id="table-wrapper" style="margin-top: 10%">
            <div id="table-scroll">
        <div class="ttable">
        <table class="table" id="myTable">
            <thead  style ="background-color:#5BC0DE;" class="entet">
            <tr>
                <th scope="col" style="text-align: center;">id</th>
                <th scope="col" style="text-align: center;">Nom</th>
                <th scope="col" style="text-align: center;">N° Version</th>
                <th scope="col" style="text-align: center;">Adresse IP</th>
                <th scope="col" style="text-align: center;">Système d'exploitation</th>
                <th scope="col" style="text-align: center;">Base de données</th>
                <th scope="col" style="text-align: center;">Responsable</th>
                <th scope="col" style="text-align: center;">Dernière MAJ</th>
            </tr>
            </thead>
            <tbody>
            @foreach($applications as $app)
             <tr  onclick="location.href= '{{ url('/FichApp/'.$app->id) }}'" style="cursor: pointer ; " class="lien" >
                 <td scope="row">{{$app->id}}</td>
                <td style="text-align: center;">{{$app->nom}}</td>
                <td style="text-align: center;">{{$app->Nver}}</td>
                <td style="text-align: center;">{{$app->adressIP}}</td>
                <td style="text-align: center;">{{$app->OS}}</td>
                <td style="text-align: center;">{{$app->DB}}</td>
                <td style="text-align: center;">{{$app->username.' '.$app->prenom}}</td>
                <td style="text-align: center;">{{$app->DDM}}</td>
             </tr>
             @endforeach
             </tbody>
        </table>
        </div>
            </div>
    </div>
    </div>
</div>
</div>
 </body>
<script>
    function recherche() {
        // Declare variables
        var input, filter, table, tr, td, i, j,bool;
        input = document.getElementById("myInput");
        filter = input.value.toLowerCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");


        for (i=1; i< tr.length; i++) {
            bool = 0;
            for (j = 0; j < 6; j++) {
                td = $('tr:eq(' + i + ')').find('td:eq(' + j + ')');
                if (td) {
                    if (td.text().toLowerCase().replace("<span style='color:red;'>", "").replace("<span>", "").indexOf(filter.toLowerCase()) > -1) {
                        var str = $('tr:eq(' + i + ')').find('td:eq(' + j + ')').text().toLowerCase();
                        var mouloud = str.replace(filter.toLowerCase(), "<span style=' text-decoration: underline; background: #5bc0de; color:white;'>" + filter + "</span>");
                        $('tr:eq(' + i + ')').find('td:eq(' + j + ')').empty();
                        $('tr:eq(' + i + ')').find('td:eq(' + j + ')').append(mouloud);
                        tr[i].style.display = "";
                        bool = 1;
                    } else {
                        var str = $('tr:eq(' + i + ')').find('td:eq(' + j + ')').text();
                        var mouloud = str.replace("<span style=' text-decoration: underline; background: #5bc0de; color:white;'>", "");
                        mouloud.replace("</span>", "");
                        $('tr:eq(' + i + ')').find('td:eq(' + j + ')').empty();
                        $('tr:eq(' + i + ')').find('td:eq(' + j + ')').append(mouloud);
                        if (j == 5 && bool == 0)
                            tr[i].style.display = "none";
                    }
                }
            }
        }
    }
</script>
</html>






