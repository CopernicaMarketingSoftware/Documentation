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
        "name":         "yoursenderdomain.com",
        "bounces":      "bounces.yoursenderdomain.com",
        "tracking":     "tracking.yoursenderdomain.com",
        "https":        true,
        "ips":          ["1.2.3.4", "2.3.4.5"]
        "policy":       "none|quarantine|reject"
        "percentage":   100,
        "startdate":    "2016-01-01",
        "enddate':      "2016-01-18"
    },
    {
        "name":         "example.com",
        "bounces":      "bounces.example.com",
        "tracking":     "tracking.example.com",
        "https":        false,
        "ips":          ["1.2.3.4", "2.3.4.5"]
        "policy":       "none|quarantine|reject"
        "percentage":   50,
        "startdate":    "2016-06-14",
        "enddate":      "2016-06-14"
    }
]
```

You can also get the information from one specific domain. This can be
done with the single "/domain" API call:

```txt
https://www.smtpeter.com/v1/domain/example.com?access_token=YOUR_API_TOKEN
```

You will then receive a single JSON object:

```JSON
{
    "name":         "example.com",
    "bounces":      "bounces.example.com",
    "tracking":     "tracking.example.com",
    "https":        false,
    "ips":          ["1.2.3.4", "2.3.4.5"]
    "policy":       "none|quarantine|reject"
    "percentage":   50,
    "startdate":    "2016-06-14",
    "enddate":      "2016-06-14"
}
```

The "name" property holds the name of the sender-domain. This must match
the domain in the "from" address of your emails.


### Tracking and bounce domains

The "bounces" and "tracking" properties hold the names of the bounces and 
tracking hostnames for the sender domain. Email messages that flow through
SMTPeter are rewritten: all hyperlinks are modified to track the clicks,
and the envelope address is changed to track bounces and out-of-office
replies. The "bounces" amd "tracking" properties define the domain names
that are used for the modified addresses. The "https" property specifies
whether the rewritten URLS should use HTTPS connections or not.


### IP addresses

The property "ips" contains an array with the ip addresses used for the 
sender domain. These are addresseses that SMTPeter assigned to your domain
and that will be used to send out your messages from.


### DMARC settings

SMTPeter hosts your DMARC, DKIM and SPF settings to ensure that all mails
are sent from valid IP addresses and have valid DKIM signatures. However, if 
you also send out mails yourself that do not pass through SMTPeter, you run 
the risk that some mails are sent from IP addresses that are not listed in 
DNS, or that some of your messages do not have valid DKIM signatures. 

With the "policy" parameter you instruct email receivers (like gmail.com and 
yahoo.com) how to handle such invalid messages. This policy is published in
a DNS record, so that all email receivers can look up your policy and
apply it to invalid messages that were sent out of your name.

The "reject" property tells receivers that all invalid messages should 
be rejected, and "quarantine" that invalid messages should be stored in 
some special kind of mailbox or folder (for example the spam box). The
"none" policy means that you want receivers to accept invalid mails anyway.

You can also set a "percentage" property to specify for how many messages
you would like the policy to be applied. For example, if you set the 
policy to "reject", invalid emails are rejected by receivers. If you find
this too scary to start with (it is after all possible that one of your
colleagues is still using a wrong email configuration), you can decide to
start with a "reject" policy, and set the percentage to 1. This instructs
email receivers to only reject 1 percent of the invalid messages.

You can slowly increment this percentage. SMTPeter automatically updates
your percentage in DNS, starting with 0% on "startdate" all the way up
to the percentage you want on "enddata". Thus, if the property "percentage"
is set to "100%", and the "begindate" to the first of january and "enddate" 
to the first day of february, SMTPeter will make sure that the percentage
in your DNS record slowly goes up from 0% percent to 100% during the month
of january.


## Creating and updating sender domains

To create or update a sender domain via the REST API you do a POST call.

```text
POST /v1/domain/yourdomain.com?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length:

{
    "bounces":      "bounces.yourdomain.com",
    "tracking":     "clicks.yourdomain.com",
    "https":        true,
    "policy":       "reject",
    "percentage":   100,
    "startdate":    "2016-07-01",
    "enddate":      "2016-08-01"
}
```

All the properties that you can retrieve with the "GET" calls can also 
be set with the "POST" calls. The exceptions to this rule are the 
"name" and "ips" properties. The list of IP addresses is automatically 
assigned by SMTPeter and can not be modified, and the sender domain
name is set in the URL, and not via one of the POST properties.

All properties are optional. Properties that you do not explicitly set
will get reasonable defaults.

After setting up a sender domain, it is your own responsibility to update
your DNS records. The REST API has a [couple of methods](rest-dns) to
help you with this. 


## Deleting a sender domain

To delete a sender domain you can make a DELETE call to

```txt
https://www.smtpeter.com/v1/domain/yourdomain.com?access_token=YOUR_API_TOKEN
```

