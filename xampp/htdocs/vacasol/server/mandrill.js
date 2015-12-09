var mandrill = require('mandrill-api/mandrill');
var mandrill_client = new mandrill.Mandrill('SAMCBFVD5NEqlo8gRTidSw');
var template_content = [{}];
exports.sendMail = function (params) {
    var issend="";
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
        issend=result[0].status;
    }, function (e) {
        issend="error";
    });
    return issend;
}