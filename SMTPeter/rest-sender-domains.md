# Sender domains

All email that flows through SMTPeter is processed based on the sender
domain settings stored in SMTPeter. When SMTPeter processes an email
message, it extracts the hostname from the "from" address, and looks
up the domain settings to decide how to handle the message.

You can create a different configuration for each domain that you use in
the "from" header of your mail. Besides the dashboard to do this manually,
you can use the REST API for this too. The following methods
are available:

````text
(1) https://www.smtpeter.com/v1/domains?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/domain/NAME?access_token=YOUR_API_TOKEN
(3) https://www.smtpeter.com/v1/domain/ID?access_token=YOUR_API_TOKEN
````

## Obtain sender domain information

If you want to get a list of all domains for which SMTPeter has configuration
settings, use the following API GET call:

```txt
https://www.smtpeter.com/v1/domains?access_token=YOUR_API_TOKEN
```

You will receive an array with JSON objects holding the following information:

```JSON
[
    {
        'name':        "yoursenderdomain.com",
        'id':          123,
        'bounces':     "bounces.yoursenderdomain.com",
        'tracking':    "tracking.yoursenderdomain.com",
        'ips':         ["1.2.3.4", "2.3.4.5"]
    },
    {
        'name':        "example.com",
        'id':          124,
        'bounces':     "bounces.example.com",
        'tracking':    "tracking.example.com",
        'ips':         ["1.2.3.4", "2.3.4.5"]
    
    }
]
```

In this JSON, the "name" property holds the name of your sender domain and the
"id" the unique identifier of the domain. The "bounces" and "tracking"
properties hold the names of the bounces and tracking domains for the
sender domain. The property "ips" contains an array with the ip addresses
used for the sender domain.

If you want to have the information for one domain only you can make a GET
call to:

```txt
(1) https://www.smtpeter.com/v1/domain/NAME?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/domain/ID?access_token=YOUR_API_TOKEN
```
where "NAME" and "ID are the name and the "ID" of the account you for
which you want the information. The information you receive is identical
to the JSON discussed above.


## Creating or updating a sender domain

To create or update a sender domain via the REST API you do a POST call
of the form:

```text
POST /v1/domain?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length:

{
    "name":         "yourdomain.com",
    "bounces":      "bounces.example.com",
    "tracking":     "clicks.example.com"
}
```
The "name" property is mandatory and should contain the sender domain name
that you want to create or update. The "bounces" and "tracking" properties are optional.
With these properties you can set the domain that handles the bounces and the
domain that handles your tracking of clicks and opens. If you do
not include these properties while creating a sender domain, the domains
are set to "bounce.yourdomain.com" and "clicks.smtpeter.com" respectively.

After setting up a sender domain, you normally also want to make a subsequent
call to the REST API to [create a DKIM key](rest-dkim) for the sender domain.
This DKIM key will be used for signing all messages that flow through SMTPeter.

After setting up a sender domain and the DKIM keys, it is your own responsibility
to update your DNS records. The REST API has a [couple of methods](rest-dns) to
help you with this.


## Deleting a sender domain

To delete a sender domain you can make a DELETE call to

```txt
https://www.smtpeter.com/v1/domain/NAME?access_token=YOUR_API_TOKEN
```

where NAME is the name of the sender domain you want to delete.
