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
            "email": "sender@example.com",
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
            }]
        }
    }    
}
````

Normally, the JSON messages that are read from the outbox queue contain
a "mime" property that holds a string value . However, you can also assign a
nested JSON object, as we did in the example above. This nested object
is processed by the ResponsiveEmail engine inside MailerQ, and transformed
into the actual MIME message that gets delivered.

There are many nested properties that are supported by the algorithm,
which are all documented on the [ResponsiveEmail.com website](https://www.responsiveemail.com/support/json/introduction).

The algorithm is embedded in the MailerQ process that runs on your server, and 
although we sometimes call it the "ResponsiveEmail.com" algorithm, MailerQ does
not connect to this online service. It runs completely on your own servers.


## Regular emails

The ResponsiveEmail module can also be used to create regular (non-responsive)
emails based on JSON input. If you do not want to create MIME strings yourself
(which we understand, generating MIME strings can be complex), you can feed 
MailerQ with all the properties of your email, and let MailerQ take care of 
generating the MIME.

````
{
    "envelope": "sender@example.com",
    "recipient": "receiver@example.com",
    "mime": {
        "from": {
            "name": "John Doe",
            "email": "sender@example.com",
        },
        "to": {
            "name": "Mister Receiver",
            "email": "receiver@example.com",
        },
        "cc": {
            "name": "Someone Else",
            "email": "randomguy@example.com",
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

If you use the full blown ResponsiveEmail.com algorithm, you assign a 
nested JSON object to the "content" property. Inside this nested object you 
specify the images, texts, buttons and other elements that you want to include 
in your email. The ResponsiveEmail algorithm turns this content into a 
responsive email message. However, in the above JSON we assigned a string to 
the "content" property. By doing this, the ResponsiveEmail algorithm gets 
by-passed, and MailerQ creates a MIME property with exactly the text and HTML 
that you've set in the JSON. 


## Config file variables

When responsive emails are generated, MailerQ downloads resources from the 
internet to find out the dimensions of images and to fetch attachments. To 
prevent that the same resources are downloaded over and over again, MailerQ 
can be configured to use a cache. In the global configuration file you can set 
the address of this cache:

````
download-cache:         directory:///path/to/dir
download-ttl:           3600
````

The "download-cache" property holds the address of the cache. The format of
this address is the same as the [message-store-options](message-store-options)
variable, and can refer to a directory (like we did above) or a nosql database
if you use an address that starts with "mongodb://" or "couchbase://".

MailerQ inspects the 'cache-control' and 'expires' headers to decide how long
a resource will be stored in the cache. With the 'download-ttl' config file
variable you can set the upper limit for this. If you set this to 3600, downloaded
files will stay for at most one hour in the cache, even if the http response 
headers allow a longer cache time.


## Firewall bypass

Most users run MailerQ in a local network. MailerQ is then not only capable of 
fetching resources from the internet, but also directly from servers inside this
local network. It is, for example, possible to use attachment
URL's like "http://192.168.0.22/attachment.pdf". This could be a security risk,
especially if the attachment and image URL's in your mails can be entered by 
third parties.

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
