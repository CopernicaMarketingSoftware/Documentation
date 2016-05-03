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
        'policy':      "none|quarantine|reject"
        'percentage':  100,
        'enddate':     "2016-01-18"
    },
    {
        'name':        "example.com",
        'id':          124,
        'bounces':     "bounces.example.com",
        'tracking':    "tracking.example.com",
        'ips':         ["1.2.3.4", "2.3.4.5"]
        'policy':      "none|quarantine|reject"
        'percentage':  50,
        'enddate':     "2016-06-14" 
    }
]
```

In this JSON, the "name" property holds the name of your sender domain and the
"id" the unique identifier of the domain. The "bounces" and "tracking"
properties hold the names of the bounces and tracking domains for the
sender domain. The property "ips" contains an array with the ip addresses
used for the sender domain. The properties 'policy' and 'percentage' are
your current DMARC settings that are used if you use our standard DNS
configuration suggestions. The 'enddate' property holds the information
at which date the percentage of your DMARC will reach 100.

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
    "tracking":     "clicks.example.com",
    "policy":       "none|quarantine|reject",
    "enddate":      "2016-05-21"
}
```
The "name" property is mandatory and should contain the sender domain name
that you want to create or update. The "bounces" and "tracking" properties are optional.
With these properties you can set the domain that handles the bounces and the
domain that handles your tracking of clicks and opens. If you do
not include these properties while creating a sender domain, the domains
are set to "bounce.yourdomain.com" and "clicks.smtpeter.com" respectively.
With properties "policy" and "enddate" you can control your [DMARC deployment](dmarc-deployment).
With the "policy" property you can set the DMARC policy that you want to use.
With the "enddate" property you specify the date after which you want to
have a percentage of 100. SMTPeter will increase the percentage over time
to reach this percentage at the given date. Both fields are optional and
if not provided they are set to "none" and today. 

After setting up a sender domain, it is your own responsibility to update
your DNS records. The REST API has a [couple of methods](rest-dns) to
help you with this. Note that properties "policy" and "enddate" only have
an effect if you use our standard suggested DNS settings. If you chose to
use custom DNS settings, you have to set the policy and percentage yourself.


## Deleting a sender domain

To delete a sender domain you can make a DELETE call to

```txt
https://www.smtpeter.com/v1/domain/NAME?access_token=YOUR_API_TOKEN
```

where NAME is the name of the sender domain you want to delete.
