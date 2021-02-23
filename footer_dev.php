<style>
    body {margin:0;}

    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #333;
        color: white;
        text-align: center;
    }
  
</style>

<script>
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        //alert(this.responseText);
        uObj = JSON.parse(this.responseText);
        var txt = "©TRADE | Welcome " + uObj[0] + " | บทบาท: " + uObj[1] + " | สถานะบัญชี: " + uObj[2];
        document.getElementById("data").innerHTML = txt;
        }
    };
    xmlHttp.open("GET", "data.php", true);
    xmlHttp.send();
</script>

<div class="footer">
    <p id="data">©TRADE</p>
</div>