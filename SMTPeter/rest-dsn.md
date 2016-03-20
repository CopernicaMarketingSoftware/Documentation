# REST and Delivery Status Notifications

If you use the REST API to send email, you're probably doing this to 
send out email from your website or app, and you do not want to process 
bounces yourself. However, if you do want to receive bounces, you should
add an "envelope" property with the address to which the bounces should
be sent.

````json
{
    "envelope":     "youraddress@yourdomain.com",
    "recipient":    "example@example.com",
    "mime":         "...."
}
````

## Custom DSN properties

With the "dsn" variable you can set when and what kind of delivery 
notifications you like to receive. These notification messages will be 
sent to the email address set in the "envelope" variable.

````json
{
    "envelope":     "youraddress@yourdomain.com",
    "recipient":    "example@example.com",
    "mime":         "....",
    "dsn": {
        "notify":   "FAILURE",
        "ret":      "HDRS"
    }
}
````

With the "notify" field you set when you want to get an email 
notification. You can set it to either "SUCCESS" or "FAILURE" to request
a bounce on a successful delivery or on a failure. If you want to
receive bounces in both cases, use "SUCCESS,FAILURE". The default value
is "FAILURE".

With the "ret" field you specify if you want to receive the full original
email in the bounce, or just the headers. Possible values are "FULL" and 
"HDRS". Default is "HDRS".

Please keep in mind that if you send email to a lot of recipients at the 
same time the DSN messages could fill up the mail box that you set in 
"envelope" quite quickly.

