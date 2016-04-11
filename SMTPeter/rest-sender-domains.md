# Sender domains

You can set, update, delete or get information about your sender domains 
via the REST API by using the following methods:

(1) https://www.smtpeter.com/v1/domains?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/domain/NAME?access_token=YOUR_API_TOKEN
(3) https://www.smtpeter.com/v1/domain/ID?access_token=YOUR_API_TOKEN


## Obtain sender domain information

If you want to get information about your used sender domains you can make
a GET call to:

```txt
https://www.smtpeter.com/v1/domains?access_token=YOUR_API_TOKEN
```

You will receive an array with JSON objects holding the following information:
```JSON
{
    'name':        "yoursenderdomain.com",
    'id':          123
    'bounces':     "bounces.yoursenderdomain.com",
    'tracking':    "tracking.yoursenderdomain.com",
    'ips':         ["1.2.3.4", "2.3.4.5"]
}
```
In this JSON, the "name" property holds the name of your sender domain and the
"id" holds the id of the domain. The "bounces" and  "tracking"
properties hold the names of the bounces and tracking domains for the
sender domain. The "ips" property holds a vector with the ip addresses
used for the sender domain. Where the ip addresses are listed as strings.

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
    "name":     "example.com",
    "bounces":  "bounces.example.com",
    "tracking": "clicks.example.com"
}
```
The "name" property contains the domain name for which you want to create or update
the sender domain. The "bounces" property is optional and it contains the domain
name that tracks the bounces that your mailing generate. The "tracking"
property is also optional. This property contains the name of the tracking
domain.


## Deleting a sender domain

To delete a sender domain you do a DELETE call to
```txt
https://www.smtpeter.com/v1/domain/NAME?access_token=YOUR_API_TOKEN
```
where NAME is the name of the sender domain you want to delete.
