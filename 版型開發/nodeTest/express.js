const express = require('express');
const app = express();
const bodyParser = require('body-parser');
const axios = require('axios');
const qs = require('qs');

//設置URL解析器
var urlencodedParser = bodyParser.urlencoded({ extended: false });

axios.create({
  headers: {
    "Content-Type": "application/x-www-form-urlencoded"
  }
})

axios.post('http://localhost:5500/', qs.stringify({
  first_name: 'ksj;dfksj',
  last_name: 'ksjdlfkjsld'
}))
  .then(res => console.log(res.data))
  .catch(err => console.log(err))

app.get('/', function (req, res) {
  res.send(`First Name:${req.query.first_name}</br>Last Name:${req.query.last_name}`);
})

app.post('/', urlencodedParser, function (req, res) {
  let response = {
    FirstName: req.body.first_name,
    LastName: req.body.last_name
  };
  console.log(req.body);
  res.send(JSON.stringify(response));
})

app.post('/nodeTest/simple.html', urlencodedParser, function (req, res) {
  res.send('sdfsdf');
})

var server = app.listen(5500, function () {

  var host = "localhost";
  var port = 5500;

  console.log("Example app listening at http://%s:%s", host, port)

})

