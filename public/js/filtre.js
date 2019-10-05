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

