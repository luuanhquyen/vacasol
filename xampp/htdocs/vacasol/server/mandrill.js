var mandrill = require('mandrill-api/mandrill');
var mandrill_client = new mandrill.Mandrill('SAMCBFVD5NEqlo8gRTidSw');
var template_content = [{}];
exports.sendMail = function (params,response) {
    var message = {
        "to": [{
                "email": params.email,
                "name": params.username,
                "type": "to"
            }],
        "merge_vars": [
            {
                "rcpt": params.email,
                "vars": [
                    {
                        "name": "USER_NAME",
                        "content": params.username
                    },
                    {
                        "name": "USER_EMAIL",
                        "content": params.email
                    }
                ]
            }
        ]
    };
    mandrill_client.messages.sendTemplate({"template_name": params.template_name, "template_content": template_content, "message": message}, function (result) {
        if(result[0].status=="sent")
        {
            response.writeHead(200, {"Content-Type": "application/json"});
            response.write("angular.callbacks._0(");
            response.write(JSON.stringify(result[0]));
            response.write(")");
            response.end();
        }
    }, function (e) {
            response.writeHead(200, {"Content-Type": "application/json"});
            response.write("angular.callbacks._0(");
            response.write(JSON.stringify({}));
            response.write(")");
            response.end();
    });
    
}