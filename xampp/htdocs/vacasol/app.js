var http = require('http');
var url = require('url');
var mandrill = require('mandrill-api/mandrill');
var mandrill_client = new mandrill.Mandrill('SAMCBFVD5NEqlo8gRTidSw');
var vasacol=http.createServer(function (request, response) {
var query = url.parse(request.url,true).query;
var template_name = "Test sign-up confirm";
var template_content = [{}];
var message = {
    "from_email": "quyenla@your.rentals",
    "from_name": "Luu Anh Quyen",
    "to": [{
            "email": query.email,
            "name": query.username,
            "type": "to"
        }],
    "headers": {
        "Reply-To": "quyenla@your.rentals"
    },
    "global_merge_vars": [
                {
                    "name": "var1",
                    "content": "Global Value 1"
                }
            ],
            "merge_vars": [
                {
                    "rcpt": query.email,
                    "vars": [
                        {
                            "name": "USER_NAME",
                            "content": query.username
                        },
                        {
                            "name": "USER_EMAIL",
                            "content": query.email
                        }
                    ]
                }
            ]
};
var async = false;
var ip_pool = "Main Pool";

mandrill_client.messages.sendTemplate({"template_name": template_name, "template_content": template_content, "message": message, "async": async, "ip_pool": ip_pool}, function(result) {
  console.log("SENT TO"+query.email); 
  response.writeHead(200, {'Content-Type': 'text/plain'});
  response.end("true");
}, function(e) {
    console.log('A mandrill error occurred: ' + e.name + ' - ' + e.message);
     response.writeHead(200, {'Content-Type': 'text/plain'});
    response.end("false");
});
}).listen(3000);
vasacol.on('connect', function(req, cltSocket, head) {
  // connect to an origin server
  console.log("mother fucker");
});
console.log('Server running at http://127.0.0.1:3000/');