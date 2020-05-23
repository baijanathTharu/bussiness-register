var hideCont = document.querySelector("#hide-container");

// hideCont.style.display = "none";

function showDetails(sum, year, day, month) {
    var xhttp = new XMLHttpRequest();
    if (sum != "") {
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 & this.status == 200) {
                hideCont.innerHTML = this.responseText;
                window.scrollTo(0, 720);
            }
        }
        xhttp.open("GET", `./show-table.php?sum=` + sum + `&m_id=` + month + `&y=` + year + `&d_id=` + day, true);
        hideCont.style.display = 'grid';
        hideCont.innerHTML = "<h1>Loading</h1><img src='loader/ld.gif'";
        xhttp.send();
    }

    // console.log("Date Clicked: " + sum);
    // console.log("Date year: " + year);
    // console.log("Date day: " + day);
    // console.log("Date month: " + month);
}

function recordDateId(sum, year, day, month) {
    window.scrollTo(0, 720);
    document.getElementById("record-date-id").value = sum;
    document.getElementById("deal-details").innerHTML = '<h1>Bussiness Record of: ' + year + '/' + month + '/' + day + '</h1>';
    hideForm.style.display = "flex";
    hideForm.style.flexDirection = "column";
    // console.log("sum: " + sum);
}

// Ajax function for delete and edit

function ajaxCall(id, opr) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 & this.status == 200) {
            window.scrollTo(0, 0);
            document.getElementById("display-message").innerHTML = this.responseText;
        }
    }
    xhttp.open("GET", "./operation.php?r_id=" + id + "&opr=" + opr, true);
    console.log("ajax start");
    xhttp.send();
}

// Edit record
// function editRecord(rId) {
//     ajaxCall(rId, "edit");
//     console.log("This " + rId + " has to be edited.");
// }
// Delete record
function deleteRecord(rId) {
    var res = confirm("Do you want to delete this item?");
    if (!res) {
        return;
    }
    hideCont.style.display = "none";
    ajaxCall(rId, "del");
    console.log("This " + rId + " has to be deleted.");
}