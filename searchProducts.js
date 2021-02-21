var xmlHttp;

function createXMLHttpRequest() {
    if (window.ActiveXObject)
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    else
        xmlHttp = new XMLHttpRequest();
}

function stateChange() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        var allName = xmlHttp.responseText;
        
        var temp = new Array();
        temp = allName.split(",");

        var options = '';
        for (var i = 0; i < temp.length; i++) {
            options += '<option value="' + temp[i] + '" />';
        }

        document.getElementById('name').innerHTML = options;
    }
}

function searchProducts(str)
{
    createXMLHttpRequest();
    xmlHttp.onreadystatechange = stateChange;
    var url = "productSearch.php";
    url = url + "?name=" + str;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}