# Responsive Email integration

Copernica, the company that develops MailerQ, also operates an online service 
to create responsive emails based on JSON input: 
[responsiveemail.com](https://www.responsiveemail.com). The algorithm to transform 
JSON into responsive emails has been embedded in MailerQ. If you feed MailerQ 
JSON (instead of MIME), it will be converted into valid email messages.

````
{
    "envelope": "sender@example.com",
    "recipient": "receiver@example.com",
    "mime": {
        "from": {
            "name": "John Doe",
            "address": "sender@example.com",
        },
        "subject": "Example email",
        "text": "Text version",
        "background": {
            "color": "white"
        },
        "content": {
            "blocks": [{
                "type": "html",
                "content": "<p>Example content</p>"
            }, {
                "type": "button",
                "label": "click here"
            }]
        }
    }    
}
````

MailerQ reads JSON objects from the RabbitMQ "outbox" queue. These JSON
objects hold properties like "envelope", "recipient" and "mime", where the
"mime" property is normally set to a string holding the full message source
in MIME format. However, you can also assign a nested JSON object to this
"mime" property (see above example). This nested object is processed by 
MailerQ and transformed into a MIME message.

There are many nested properties that are supported by the algorithm,
which are all documented on the [ResponsiveEmail.com website](https://www.responsiveemail.com/support/json/introduction).
Note that the properties that are described as top-level properties
on the responsiveemail.com website, are (of course) nested properties inside 
the "mime" property of the object that is processed by MailerQ.


## Writing your own HTML code

The ResponsiveEmail algorithm reads in a JSON object in which the texts, 
buttons and images are defined, and generates the HTML and MIME 
content based on that input. This means that you do not have to write the
message source (HTML, CSS and MIME) yourself, or worry about the tricks 
to make your message compatible with all the various email clients. 

However, if you do want to take care of the HTML yourself, you can also use
the ResponsiveEmail algorithm for just the HTML-to-MIME conversion. In that
case you just specify the header properties (from and to address, subject line)
and the HTML and text source of your message, and rely on MailerQ to turn
this into a valid MIME message:

````
{
    "envelope": "sender@example.com",
    "recipient": "receiver@example.com",
    "mime": {
        "from": {
            "name": "John Doe",
            "address": "sender@example.com",
        },
        "to": {
            "name": "Mister Receiver",
            "address": "receiver@example.com",
        },
        "cc": {
            "name": "Someone Else",
            "address": "randomguy@example.com",
        },
        "subject": "Example email",
        "headers": {
            "list-unsubscribe": "<mailto:unsubscribe@example.com>"
        },
        "text": "This is the pure text version of the email",
        "content": "<html><head> ..... </body></html>",
        "attachments": [ {
            "url": "http://www.example.com/document.pdf"
        } ]
    }
}
````

If you use the full ResponsiveEmail algorithm (where you do not have to
write the HTML code yourself), you assign a deeply nested JSON object to the 
"content" property. Inside this "content" object you specify the images, texts, 
buttons and other elements that you want to include in your email. MailerQ 
turns this content into a responsive email message. However, in the above example
we assigned a string to the "content" property. By doing this, MailerQ creates 
a MIME property with exactly the text and HTML that you've set in the JSON.


## Config file variables

### Cache

When emails are generated, MailerQ sometimes has to download resources 
from the internet to find out the dimensions of images and to fetch attachments. To 
prevent that the same resources are downloaded over and over again, MailerQ 
can be configured to use a cache. In the configuration file you can set 
the address of this cache:

````
download-cache:         directory:///path/to/dir
download-ttl:           3600
````

The "download-cache" property holds the address of the cache. The format of
this address is the same as the [message-store-options](message-store-options)
variable, and can refer to a directory (like we did above) or a nosql database
if you use an address that starts with "mongodb://" or "couchbase://".

MailerQ inspects the 'cache-control' and 'expires' headers in the HTTP response
to decide for how long a resource can be stored in the cache. With the 'download-ttl'
config file variable you can set the upper limit for this. If you set it to 3600, 
downloaded files will stay for at most one hour (3600 seconds) in the cache, even 
if the HTTP response headers allowed a longer cache time.


### User Agent

For the downloads, a custom user agent can be supplied. By default, the user agent
mailerq uses is 'MailerQ <version>'. This will be set in the header of all download
requests MailerQ performs. This can be very useful for statistical purposes, where
you want to keep track of all the requests that were made by MailerQ. Another example
usecase is for basic authentication, however keep in mind that it is sent along with
_all_ requests to all downloaded URLs.

```
download-user-agent:    My custom user agent
```


### Firewall bypass

Many users run MailerQ on a server with unrestricted access to the local network. 
MailerQ is then not only capable of fetching resources from the internet, but 
also directly from servers inside this local network. This makes it, for example, 
possible to use attachment URL's like "http://192.168.0.22/attachment.pdf". This 
could be a security risk, especially if the attachment and image URL's in your 
mails can be entered by third parties.

To prevent such internal downloads, you can use the config file variables 
"download-blacklist" and "download-whitelist" to limit the IP addresses to
which MailerQ can connect.

````
download-blacklist:     192.168.0.0/16,127.0.0.1
download-whitelist:     192.168.0.30/32:80
````

Downloads from IP address on the blacklist are forbidden, unless the IP is also
included in the whitelist. The above configuration prevents that MailerQ can 
connect to servers on the local network, with an exception for port 80 of IP 
192.168.0.30.

### Proxy server

It is possible that the server cannot access the internet, except through a proxy. That
is why there is a config option to set up either a SOCKS or an HTTP proxy for downloads.
For the proxy URI format, see proxy settings in [other options](other-configuration "Other configuration options").
If unset, the global `proxy-server` variable will be the fallback.

````
download-proxy:    <proxy URI> (empty by default)
````
