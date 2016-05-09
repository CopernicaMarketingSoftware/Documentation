# Managing your SPF record

If you follow our DNS recommendations, email receivers can see in your
DNS records that all your emails are sent out from one of SMTPeter's 
IP addresses, and that messages from other sources should be blocked. 
The easiest way to achieve this is by ensuring that you send all your 
messages right through SMTPeter.com. If all your messages are sent via
SMTPeter.com, you can be sure that all your messages indeed come from 
our IP's.

However, if you are unable to route all your mail through SMTPeter.com,
you must make sure yourself that your IP addresses are also listed
in your SPF record. There are two ways to achieve this:

* Do not follow our SPF recommendation, but set up your own SPF record
* Use our dashboard to add your own IP addresses

The second approach is normally the easier one, because our dashboard
has wizards to help you with adding your own IP addresses. As an 
alternative to the dashboard, the REST API can be used to add your
own IP addresses too.


## Listing SPF rules

There is one API call that can be used to list and update the SPF
mechanisms that are in use for a sender domain:

```txt
https://www.smtpeter.com/v1/spf/yourdomain.com?access_token=YOUR_API_TOKEN
````

This API method is available as GET, POST and DELETE method to list the
current mechanisms, and to add or remove mechanisms. The GET call returns
a list of custom mechanisms:

````json
[ "a:1.2.3.4/24", "mx:mail.example.com" ]
````

The POST and DELETE calls can be used to add or remove mechanisms:

````txt
POST /v1/spf/yourdomain.com?access_token=YOUR_API_TOKEN HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length:

{
    "mechanism":    "a:4.5.6.7/24"
}
````
