     

function  fun3() {
    var temp_id = document.getElementById("table_selection");
    var tbl = temp_id.value;
    var temp_user_val = document.getElementById("user_input");
    var usr_inp = temp_user_val.value;
    if ((temp_user_val.value == "") || (temp_user_val.value >= 150))
    {
        alert("please enter a valid input");
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
            }
        };
        xhttp.open("GET", "get_information1.php?tbl=" + tbl + "&usr_inp=" + usr_inp, true);
        xhttp.send();
    }
}
function fun2(val) {

    var temp_id = document.getElementById("val_in");
    if (val == "heartbit")
    {

        temp_id.value = "bits/min"
    }
    if (val == "body_temperature")
    {

        temp_id.value = String.fromCharCode(176) + "C";
    }

    if (val == "humadity")
    {

        temp_id.value = "%"
    }
    if (val == "So2" || val == "Co2")
    {
        temp_id.value = "ppm"

    }

}
function load_file() {
    $("#header").load("header.php");
    $("footer").load("footer.html");
}
                              