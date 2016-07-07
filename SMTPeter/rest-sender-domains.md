# Sender domains

All email that flows through SMTPeter is processed based on the sender
domain settings stored in SMTPeter. When SMTPeter processes an email
message, it extracts the hostname from the "from" address (the sender domain), and looks
up the domain settings to decide how to handle the message.

You can create a different configuration for each domain that you use in
the "from" header of your mail. Besides the dashboard to do this manually,
you can use the REST API for this too. The following methods
are available:

````text
(1) https://www.smtpeter.com/v1/domains
(2) https://www.smtpeter.com/v1/domain/NAME
````

## Creating and updating sender domains

You can create a sender domain by posting a call of the form:

```text
POST /v1/domain/yourdomain.com?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
```
Where "yourdomain.com" is the name of your sender domain. After posting the
call you receive a JSON of the form:

```json
{
    "name": "smtpeter-sadfszmnzdhnz.example.com,
    "type": "TXT",
    "value:" "asdfwer598459sdFiOTIzYzY5YjVmNDFkYmZlYzBkYjkyYjMzZGRhMDcyMTcxNjAxYwxx"
}
```
SMTPeter wants to validate that you control the sender domain before you can
use it. The validation runs via the DNS records. and the returne JSON holds
the information on how you have to adjust the. The "name" property holds
the name of the DNS record that you have to create, the "type" property
holdst the DNS type. The "value" property contains the value that you have
to include in the DNS record. After you have added the information to your
DNS records, you can make again the same call and your sender domain will
be approved.

Yet, in the second call you can also add extra information to directly set
up the sender domain to your wishes. The POST call you can make has should
have the following form:

```text
POST /v1/domain/yourdomain.com?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length:

{
    "bounces":      "bounces.yourdomain.com",
    "tracking":     "clicks.yourdomain.com",
    "https":        true,
    "policy":       "none|quarantine|reject",
    "percentage":   100,
    "startdate":    "2016-07-01",
    "enddate":      "2016-08-01"
}
```
the different properties that you can POST are discussed below. It is not
necessary to set them all. If you leave some out, they will get a default
value.


### Bounce and tracking domains

The "bounces" and "tracking" properties hold the names of the bounces and 
tracking hostnames for the sender domain. Email messages that flow through
SMTPeter are rewritten: all hyperlinks are modified to track the clicks,
and the envelope address is changed to track bounces and out-of-office
replies. The "bounces" and "tracking" properties define the domain names
that are used for the modified addresses. SMTPeter requires that the
domains given for bounces and tracking share the organization domain with
the sender domain. If you leave these properties out they will get default
prefixes "bounces" and "clicks" respectively. Besides setting the "bounces"
and "tracking" property, you can set the "https" property (true|false). This
sets whether the rewritten URLS should use HTTPS connections or not.


### DMARC settings

SMTPeter hosts your DMARC, DKIM and SPF settings in DNS to ensure that all mails
are sent from valid IP addresses and have valid DKIM signatures. However, if 
you also send out mails yourself that do not pass through SMTPeter, you run 
the risk that some mails are sent from IP addresses that are not listed in 
DNS, or that some of your messages do not have valid DKIM signatures. 

With the "policy" parameter you instruct email receivers (like gmail.com and 
yahoo.com) how to handle such invalid messages. This policy is published in
a DNS record, so that all email receivers can lookup your policy and
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
to the percentage you want it to be on "enddate". Thus, if the property "percentage"
is set to "100%", and the "begindate" to the first of january and "enddate" 
to the first day of february, SMTPeter will make sure that the percentage
in your DNS record slowly goes up from 0% up to 100% during the month
of january.


## Obtain sender domain information

All the properties that you can set for a sender domain can also be requested
with a "GET" call:

```txt
https://www.smtpeter.com/v1/domain/example.com
```

You will then receive a single JSON object:

```JSON
{
    "name":         "example.com",
    "approved":     true,
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
The properties in the JSON object are identical as the one discussed above
plus one extra "ips". This property contains an array with the ip addresses used for the 
sender domain. These are addresseses that SMTPeter assigned to your domain
and that will be used to send out your messages from.

If you want to get a list of all domains for which SMTPeter has configuration
settings, use the following API GET call:

```txt
https://www.smtpeter.com/v1/domains
```

You will receive an array with JSON objects holding the following information:

```JSON
[
    {
        "name":         "yoursenderdomain.com",
        "approved":     true,
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
        "approved":     true,
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

## Deleting a sender domain

To delete a sender domain you can make a DELETE call to

```txt
https://www.smtpeter.com/v1/domain/yourdomain.com
```

