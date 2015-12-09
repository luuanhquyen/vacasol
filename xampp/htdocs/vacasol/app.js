var http = require('http');
var url = require('url');
var express = require("express");
var vasacol=http.createServer(function (request, response) {
var query = url.parse(request.url,true).query;
var mandrill = require(__dirname +"/mandrill.js");
var params={"template_name":"Test sign-up confirm","email":query.email,"username":query.username};
    mandrill.sendMail(params);
}).listen(3000);