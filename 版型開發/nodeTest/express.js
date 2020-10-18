const express = require('express');
const app = express();
const bodyParser = require('body-parser')

//設置URL解析器
var urlencodedParser = bodyParser.urlencoded({ extended: false })

app.get('/', function (req, res) {
  res.send(`First Name:${req.query.first_name}</br>Last Name:${req.query.last_name}`);
})

app.post('/', urlencodedParser, function (req, res) {
  let response = {
    FirstName: req.body.first_name,
    LastName: req.body.last_name
  };
  res.send(JSON.stringify(response));
})

var server = app.listen(8081, function () {

  var host = "localhost";
  var port = 8081;

  console.log("Example app listening at http://%s:%s", host, port)

})

