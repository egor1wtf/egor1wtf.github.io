    function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll("table tr");
    var z = 1;
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        for (var j = 0; j < cols.length; j++) {
            row.push(cols[j].innerText); 
            if(j == cols.length-3 && i != 0)
                 row.push(document.getElementById(i).value);
        }
        csv.push(row.join(","));        
    }

    downloadCSV(csv.join("\n"), filename);
}

function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;
    csvFile = new Blob([csv], {type: "text/csv"});
    downloadLink = document.createElement("a");
    downloadLink.download = filename;
    downloadLink.href = window.URL.createObjectURL(csvFile);
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
    downloadLink.click();
}   
