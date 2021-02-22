var xmlHttp;

function createXMLHttpRequest() {
    if (window.ActiveXObject)
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    else
        xmlHttp = new XMLHttpRequest();
}

function stateChange() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        var allDate = xmlHttp.responseText;
        
        var temp = new Array();
        temp = allDate.split(",");

        var options = '';
        for (var i = 0; i < temp.length; i++) {
            options += '<option value="' + temp[i] + '" />';
        }

        document.getElementById('date').innerHTML = options;
    }
}

function searchDate(str)
{
    createXMLHttpRequest();
    xmlHttp.onreadystatechange = stateChange;
    var url = "dateSearch.php";
    url = url + "?date=" + str;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}