var express = require('express');
var app = express();
app.use(express.static('public'))
var mysql = require('mysql');

var stdID = new Array();
var fname = new Array();
var lname = new Array();
var major = new Array();


var connection = mysql.createConnection({  
  host     : 'localhost',  
  user     : 'root',  
  password : '',  
  database : 'trader'  
});        

app.get('/dev', function (req, res) {
  connection.connect();

  connection.query('SELECT * FROM developer', function(err, rows, fields)   
  {  
      connection.end();

      if (err) throw err;  

      //res.json(rows);

      for (var i = 0; i < rows.length; i++) {
        stdID[i] = rows[i].sid;
        fname[i] = rows[i].name;
        lname[i] = rows[i].lastname;
        major[i] = rows[i].major;

        console.log(stdID[i]);
        console.log(fname[i]);
        console.log(lname[i]);
        console.log(major[i]);
      }

      res.end("<html>" + 
              "<head>" + 
                  "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'></meta>" + 
                "<title>Trade - ผู้พัฒนา</title>" + 
              "</head>" + 
              "<body>" + 
                  "<table align='center' width='100%'>" + 
                      "<tr align='left' height='50px' style='background-color:#aaaaaa'>" + 
                          "<th>รหัส</th>" + 
                          "<th>ชื่อ</th>" + 
                          "<th>นามสกุล</th>" + 
                          "<th>สาขา</th>" + 
                      "</tr>" + 
                      "<tr height='40px'>" + 
                          "<td>" + stdID[0] + "</td>" + 
                          "<td>" + fname[0] + "</td>" + 
                          "<td>" + lname[0] + "</td>" + 
                          "<td>" + major[0] + "</td>" + 
                      "</tr>" + 
                      "<tr height='40px' style='background-color:#dddddd'>" + 
                          "<td>" + stdID[1] + "</td>" + 
                          "<td>" + fname[1] + "</td>" + 
                          "<td>" + lname[1] + "</td>" + 
                          "<td>" + major[1] + "</td>" + 
                      "</tr>" + 
                      "<tr height='40px'>" + 
                          "<td>" + stdID[2] + "</td>" + 
                          "<td>" + fname[2] + "</td>" + 
                          "<td>" + lname[2] + "</td>" + 
                          "<td>" + major[2] + "</td>" + 
                      "</tr>" + 
                      "<tr height='40px' style='background-color:#dddddd'>" + 
                          "<td>" + stdID[3] + "</td>" + 
                          "<td>" + fname[3] + "</td>" + 
                          "<td>" + lname[3] + "</td>" + 
                          "<td>" + major[3] + "</td>" + 
                      "</tr>" + 
                  "</table>" + 
              "</body>" + 
              "</html>");

  });
});

app.listen(3000, function () {
    console.log('Example app listening on port 3000!');
});