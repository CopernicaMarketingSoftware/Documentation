# Processing bounces

Normally, SMTPeter takes care of processing bounces and out-of-office
replies. However, if you do want to receive bounce messages too, you should
pass an extra "envelope" property with each call to the API "/v1/send" method:

```json
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 7391

{
    "recipient":    "john@doe.com",
    "envelope":     "myaddress@example.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
```

The envelope-address should be an working address on your server, and it
helps your deliverability greatly if the envelope domain is aligned with the 
from address of the mail. So if your from-address is info@example.com, your 
envelope address should also be set to something@example.com, using the same
domain. Strictly speaking (and based on your DMARC setting), it often is
sufficient when the envelope address and from address share the same 
organizational domain: subdomain1.example.com is thus aligned with 
subdomein2.example.com.

By adding the envelope address, you instruct SMTPeter not to track bounces,
and deliver the delivery status notification messages to your envelope
address. If you send email to many recipients you may also receive a lot of 
bounces. This could fill up your mailbox quite quickly.


## Custom DSN properties

If you pass your own envelope address, you may also use the optional "dsn"
property to further finetune what type of bounces you're most interested in.

```json
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 7391

{
    "envelope":     "youraddress@yourdomain.com",
    "recipient":    "example@example.com",
    "mime":         "....",
    "dsn": {
        "notify":   "FAILURE",
        "ret":      "HDRS"
    }
}
```

With the "notify" field you set when you want to get an email 
notification. You can set it to either "SUCCESS" or "FAILURE" to request
a bounce on a successful delivery or on a failure. If you want to
receive bounces in both cases, use "SUCCESS,FAILURE". The default value
is "FAILURE".

With the "ret" field you control whether the full original email is
included in the bounce, or just the headers. Possible values are "FULL" 
and "HDRS". Default is "HDRS".


