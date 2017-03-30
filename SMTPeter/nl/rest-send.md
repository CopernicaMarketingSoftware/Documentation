# REST API method: send

Om SMTPeter een email te laten versturen hoef je alleen maar met een
HTTP POST 'request' aan te geven welk   dat je gebruik wil maken van 
de 'send method':

```text
https://www.smtpeter.com/v1/send
```
De 'body' moet het emailbericht bevatten dat je wilt versturen, tezamen
met de SMTPeter mogelijkheden die je wilt activeren. De email kan vervolgens
worden aangeleverd in vele verschillende formaten. Bijvoorbeeld door 
middel vna een 'raw MIME string' of als individuele 'property', zodat SMTPeter
de mime kan opbouwen:

```text
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 246

{
    "recipient":    "john@doe.com",
    "subject":      "This is the subject",
    "html":         "This is example content",
    "from":         "info@example.com",
    "to":           "john@doe.com"
}
```
Bovenstaand voorbeeld van een 'call' demonstreert een van de vele manieren om 
email te versturen met de REST API. Net zoals alle andere API 'calls' kan je
data meesturen als een 'application/json' JSON string of als een reguliere 
'application/x-www-form-encoded' HTTP POST data. In bovenstaand voorbeeld 
(en alle andere voorbeelden op deze pagina) gebruiken we JSON omdat het veel
makkelijke te lezen is.

In het voorbeeld hebben we geen 'raw MIME message' meegegeven naar SMTPeter.
We gaven individueel 'subject', 'html', 'from' en 'to' properties op. SMTPeter 
gebruikt deze properties om een email te construeren nog voordat de email
wordt verstuurd naar de ontvanger(s). Dit betekent dat je geen complexe 
'MIME message' hoeft op te bouwen voor SMTPeter. Dit is natuurlijk optioneel.
Je kan ook handmatig een 'MIME' string meegeven naar de REST API. Dit wordt
verder in het artikel nader uitgelegd. 

Hierboven hebben we en een 'recipient' en een 'to' field gebruikt. Het 'recipient' 
veld bevat de adressen waarnaar de email wordt verstuurd. Het 'to' veld bevat 
het veld dat daadwerkelijk in de email wordt weergegeven als het 'to' adres.
Voor de meeste emails zijn deze twee adressen identiek. Echter, het is ook
volkomen legaal om emails te versturen naar adressen die niet zijn weergegeven 
in het 'to' veld. Dit is namelijk precies hoe 'BCC' werkt: emails worden afgeleverd
bij adressen die niet zijn vermeld in de 'to' header.


## Teruggeven van waardes

Na het succesvol versturen van je 'request', stuurt SMTPeter een JSON object terug
met daarin een unieke 'identifier' voor elke ontvanger waarnaar de email verstuurd
gaat worden.

````json
{
    "id1" : "recipient1@example.com",
    "id2" : "recipient2@example.com"
}
````
De geretourneerde id's kunnen worden gebruikt om informatie te verkrijgen middels 
andere methodes van de REST API. Omdat je emails kunt versturen naar meerdere ontvangers
met een slechts een 'call', bevat de geretourneerde waarde wellicht meerdere id's 
en 'recipients'.

## Minimale aantal properties

Je hebt tenminste twee properties nodig om een email te kunnen versturen. Het
'recipient' adres dat gebruikt gaat worden in het 'RCPT TO' gedeelte van de SMTP
protocol en de algehele 'MIME' data.

````json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
````
Om alles leesbaar te maken, hebben we het merendeel van de 'MIME' code van het 
voorbeeld verwijderd. Als je zelf geen 'MIME' bericht wil maken, kan je de 
'property' weglaten. Gebruik dan wel de '[special MIME properties](rest-mime)' 
zoals 'subject', 'text' en 'html' zodat SMTPeter de mime data kan aanmaken.

Je hoet enkel en alleen een 'recipient' adress aan te leveren om een email te
versturen. Echter, als je bekend bent met het SMTP protocol weet je dat dat je
normaal gesproken ook een 'envelope address' moet opgeven. Dit 'envelope address' 
is het adres waar 'bounces' of momenteel-niet-op-kantoor 'replies' naartoe
worden verstuurd. SMTPeter neemt alle zorgen weg omtrent het afhandelen van die 
'bounces' en daarom hoe je in dit geval geen 'envelope address' op te geven. 
SMTPeter doet dit proces helemaal zelfstandig.

If you want to handle the bounces yourself, you can add an extra "envelope" address
to the input data. Besides this envelope address, you might also be interested 
in adding a ["dsn" property](rest-dsn) to specify the type of bounce messages 
you want to receive.

````json
{
    "recipient":    "john@doe.com",
    "envelope":     "myaddress@example.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
````


## Using templates

In all of the examples that we gave so far, we required you to send the full
message to SMTPeter - either as a MIME string or as individual "text" and 
"html" properties. But you can also make use of pre-stored templates so that
you only have to send personalization data to the REST API. SMTPeter 
constructs the email message based on the earlier created template and 
personalizes it with the supplied data.

Via the SMTPeter dashboard you have access to a powerful drag-and-drop editor
to manage, edit and create responsive email templates. Every template has a 
unique numeric identifier that you can use in the REST API to send out email.
Instead of using a numeric identifier for an email template, it is also possible
to fill in the json code of a template in the format of a string or object.


````json
{
    "recipient":    "john@doe.com",
    "template":     12,
    "data": {
        "firstname":    "John",
        "lastname":     "Doe"
    }
}
````

You can pass [personalization data](personalization) to the REST call, so 
that the mail gets personalized. The above example will send template #12 to
john@doe.com, with the variables {$firstname} and {$lastname} replaced with 
John Doe's name.


## Multiple recipients

To send a single message to multiple recipients, remove the "recipient"
propery, and replace it with a "recipients" property holding an array
of email addresses:

````json
{
    "recipients":   [ "john@doe.com", "someone@else.com" ],
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
````

Only pure email addresses are supported. It is not permitted to use display 
names or to put the addresses inside angle brackets.

If you send a message to multiple recipients, SMTPeter will also return
multiple identifiers.



## Personalization

You can add personal data to the recipient or recipients. This data can be
used to [personalize the mail](personalization). If you have one
recipient, you can add the personal data with property "data".

```json
{
    "recipient": "john@doe.com",
    "mime": "....",
    "data"     : {
        "firstname"  : "John",
        "familyname" : "Doe"
    },
}
```

If you have multiple recipients, the data can be passed as follows:

```json
{   
    "recipients" : {
        "jane@doe.com": {
            "firsname": "Jane",
            "familyname": "Doe"
        },
        "john@doe.com": {
            "firstname": "John",
            "familyname": "Doe"
        }
    },
    "mime": "....",
}
```

Inside the MIME string, or inside the "text" or "html" properties, you can
use [personalization variables](personalization) like {$firstname} and 
{$lastname} that will be filled in by SMTPeter.



## Special features

By adding special properties to the input JSON you can enable or disable specific
SMTPeter features. You can for example enable click, open and bounce tracking,
or you can tell SMTPeter to inlinize your CSS code.

````json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "inlinecss":    true,
    "trackclicks":  true,
    "trackopens":   false,
    "trackbounces": true,
    "preventscam":  true
}
````

### Inlinize CSS code

By setting the "inlinecss" variable to true you enable the feature that 
CSS stylesheets in the header of your email are converted into inline style
attributes in the HTML code.


### Tracking clicks, opens and bounces

SMTPeter automatically replaces all hyperlinks in your messages with its
own URLs so that it can track clicks and opens. The envelope address
of the mailing will also be set to a SMTPeter address, so that all
bounces and out-of-office replies are tracked by SMTPeter. If you
want to disable these tracking settings, you can include the 
"trackclicks", "trackopens" and "trackbounces" options, and set them 
to false:

````json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "trackclicks":  false,
    "trackopens":   false,
    "trackbounces": false
}
````

When click-tracking is enabled (which is the default), *all* hyperlinks in
your email are modified to track the clicks. However, some email programs
show a warning to the user when links are modified. This is especially the
case if a link is modified in such a way that the clickable text does
not match the actual hyperlink. You can add a "preventscam" property to
tell SMTPeter not to modify these type of links:

````json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "trackclicks":  true,
    "preventscam":  true
}
````

The preventscam option prevents that SMTPeter modified hyperlinks like
&lt;a href="http://www.example.com"&gt;www.example.com&lt;/a&gt;.


### Settings for Delivery Status Notifications

If you do not want SMTPeter to track bounces for you, all bounces are sent
sent back to your envelope address. If you want this, you must add the
"envelope" address to the JSON too:

````json
{
    "envelope":     "your@address.com",
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "trackbounces": false
}
````

The above JSON instructs SMTPeter to not track bounces, but to use your
envelope for messages that could not be delivered. Be aware that you must
add an envelope address to the JSON too to receive bounces!

With the optional "dsn" property you can further finetune what kind of Delivery 
Status Notification messages you want to receive. The "dsn" variable accepts a 
JSON object with four (optional) fields:

````json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "trackclicks":  true,
    "preventscam":  true,
    "dsn": {
        "notify": ,         "FAILURE",
        "ret":              "FULL",
        "envid":            "your-identifier",
        "orcpt":            "original@recipient.address.com"
    }
}
````

The "notify" property is the most important one: you can specify what kind of events 
should trigger an email notification. Possible values are "NEVER", "FAILURE", 
"SUCCESS" or "DELAY". A comma seperated list of values is also supported.

The "ret" value may hold the values "FULL" or "HDRS" to specify whether the
notification should hold the full original email, or just the headers.

The "envid" and "orcpt" fields can be used if you want to control what extra
data will be included in the notifications. The value of the "envid" will 
be included in the "original-envelope-id" property of the returned status
message, and the "orcpt" value is copied to the "original-recipient" 
property.

### Setting for embedded images

Having embedded images in your mime may give some [issues](images). SMTPeter
can subtract the embedded images from your mime, host them, and rewrite
the links in the HTML part of the mime to the remote location.
The option can be enabled to set the "images" property in the JSON to
"hosted". The default is "default", which simply does nothing.

```json
{
    ...,
    "images": "hosted"|"default"
}

```
