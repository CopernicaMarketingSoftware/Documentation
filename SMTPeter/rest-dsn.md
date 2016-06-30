# REST and DSN messages

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

By adding the envelope address, you instruct SMTPeter not to track bounces,
and deliver the delivery status notification messages to your envelope
address.


## Custom DSN properties

With the "dsn" variable you can set when and what kind of delivery 
notifications you like to receive.

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

With the "ret" field you control whether the full original email is
included in the bounce, or just the headers. Possible values are "FULL" 
and "HDRS". Default is "HDRS".

Keep in mind that if you send email to many recipients you may also
receive a lot of bounces. This could fill up your mailbox quite quickly.

