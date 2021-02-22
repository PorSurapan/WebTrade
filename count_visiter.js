var http = require('http');
var url = require('url');
var fs = require('fs');

http.createServer(function (req, res) {
    res.writeHead(200, {'Content-Type': 'text/html'});
    if(!req.url.match("/favicon.ico") ) {
        var urlObj = url.parse(req.url, true);
        var data = urlObj.query;
        var currentName = data.file1;
        var newName = data.file2;

        console.log('file1 = ', currentName);
        console.log('file2 = ', newName);

        fs.rename(currentName, newName, function (err) {
            if (err) throw err;
            console.log('File Renamed!');
        });

        res.end();
    }
}).listen(3306);