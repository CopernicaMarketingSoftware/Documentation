# OAuth authenticatie

De authorisatie voor de Copernica REST API gaat met behulp van het OAuth2
authenticatiesysteem. Dit is een krachtig authenticatiesysteem waarbij
onderscheid wordt gemaakt tussen (1) applicaties die toegang hebben tot
de REST API, en (2) de accounts waar een applicatie toegang toe heeft.

Je moet dus, om toegang tot de REST API te krijgen, twee dingen doen: je moet
jouw website of app als applicatie bij Copernica aanmelden, en je moet de 
applicatie vervolgens toegang geven tot jouw account. Als je beide stappen 
hebt doorlopen (dit kan via het [dashboard op www.copernica.com](/nl/applications))
krijg je een *access key* die je kunt gebruiken voor de REST API.

Maar je kunt veel meer het OAuth2 protocol. Je kent het OAuth2 protocol 
waarschijnlijk van de "log in met Facebook" buttons die je vindt op veel
websites. Als je op een dergelijke button klikt word je doorverwezen 
naar Facebook, en krijg je een tekst te zien als: "Website X wil toegang tot
jouw e-mailadres, vriendenlijst, enzovoort. Vind je dat goed?" Als je akkoord
gaat keer je terug naar de oorspronkelijke website, die nu toegang heeft tot
jouw gegevens van Facebook. Iets dergelijks kan ook met Copernica.


## Wanneer heb je dit nodig?

Voordat je verder leest, moet je goed bedenken of je deze functionaliteit
echt nodig hebt. Als je de REST API alleen maar wilt inzetten om gegevens 
van je eigen account uit te lezen of bij te werken, dan is een dergelijke
complexe koppeling nergens voor nodig. Je hebt dan genoeg aan een access key 
die je via het dashboard op copernica.com kunt aanmaken. Voor verreweg de 
meeste gebruikers van de REST API is dit meer dan voldoende.

De OAuth2 functies komen pas van pas als je een applicatie maakt die je aan 
heel veel Copernica accounts wilt koppelen, ook aan accounts van andere 
bedrijven. Laten we een voorbeeld geven. Veronderstel dat je een website
hebt gemaakt die met behulp van kunstmatige intelligentie Copernica-databases 
kan analyseren en selecties kan optimaliseren. Deze tool is handig voor jezelf,
maar ook voor anderen. Je kunt dan een button op jouw website plaatsen: 
"klik hier om ook jouw Copernica database te analyseren". Als iemand op de 
button klikt, wordt hij automatisch doorverwezen naar Copernica.com, en wordt 
een vraag gesteld zoals: "De database-analyzer wil toegang tot jouw account om 
je database te analyseren. Vind je dat goed?".

![](../images/oauth-copernica.png)


## Applicatie aanmelden

De hierboven beschreven koppeling kun je met OAuth2 maken. Om te beginnen 
moet je je applicatie aanmelden via het [dashboard op www.copernica.com](/nl/applications).
Je moet hierbij een naam en omschrijving van je applicatie opgeven. Zorg dat
dit een duidelijke naam en omschrijving is, want deze gegevens krijgen mensen 
te zien als ze op de pagina "applicatie X wil graag toegang tot jouw gegevens"
komen.

Nadat je de applicatie hebt aangemeld, ontvang je een *client_key* en *client_secret*.
Dit is de logincode en het wachtwoord dat je later moet doorgeven aan Copernica
om toegang te krijgen tot andere accounts. Let op dat je de waarde van *client_secret*
geheim houdt. Alleen jij mag toegang hebben tot deze data.


## Button of hyperlink plaatsen

Met de logingegevens van je applicatie (de *client_key* en *client_secret*) kun 
je een link of button op je website plaatsen. Als mensen deze link aanklikken
worden ze doorverwezen naar Copernica.com alwaar ze hun account toegankelijk
kunnen maken voor jouw applicatie. De link moet verwijzen naar de volgende URL:

`https://www.copernica.com/nl/authorize?client_id=XXX&redirect_uri=XXX&state=XXX&response_type=code`

In de URL staan een aantal variabelen op de waarde XXX. Deze variabelen moet je
invullen met waardes die voor jou relevant zijn:

* **client_id**: de waarde van de *client_key* van je applicatie
* **redirect_uri**: het volledige adres (url) van de pagina op jouw website waar de gebruiker naar wordt terugverwezen nadat hij toegang heeft verleend
* **state**: een moeilijk te raden random string die je zelf hebt gegenereerd (dit moet telkens een andere waarde zijn!)
* **response_type**: dit moet de waarde *code* hebben


## De terugkeerpagina

Ook moet je een terugkeerpagina maken. Nadat iemand op de link op je website heeft
geklikt en op de Copernica.com jouw applicatie toegang heeft gegeven tot zijn 
accountgegevens, keert hij terug naar deze pagina. Copernica voegt twee variabelen
toe aan de URL van de terugkeerpagina: de variabelen *state* en de variabele *code*.

Op de terugkeerpagina moet je twee dingen doen. Ten eerste moet je controleren 
of de waarde van de variabele *state* overeenkomt met de waarde die je in de 
oorspronkelijke link had gezet. Als dat niet het geval is, is er iets vreemds
aan de hand (misbruik!) en hoef je dus niks meer te doen.

Als de *state* variabele in orde is, kun je de REST API gebruiken om de *access key*
te downloaden. Gebruik hiervoor de volgende URL:

`https://api.copernica.com/token?client_id=XXX&client_secret=XXX&redirect_uri=XXX&code=XXX`

Ook hier moet je de XXX waarden weer vervangen door je eigen variabelen:

* **client_id**: de waarde van de *client_key* van je applicatie
* **client_secren**: de waarde van de *client_secret* van je applicatie
* **redirect_uri**: precies hetzelfde adres als in de oorspronkelijke link
* **code**: de waarde van de *code* variabele die was meegegeven aan de redirect url

Voor de duidelijkheid: de URL is dus een REST API adres. Deze URL moet je niet aan
de gebruiker tonen, en je hoeft hem of haar er ook niet naar door te verwijzen.
Het is de bedoeling dat je vanaf jouw server een HTTP GET request naar de API 
server van Copernica stuurt.

De *redirect_url* parameter in de URL wordt overigens niet meer gebruikt. Er zal 
geen gebruiker meer worden doorverwezen. De parameter is alleen nodig zodat 
Copernica kan controleren dat het request afkomstig is van hetzelfde adres als 
de oorspronkelijke call.

Als alles goed gaat, dan krijg je als resultaat van deze API call een 
*access_token* terug. Dit token kan je vervolgens gebruiken om API calls te
doen, en de gegevens in het desbetreffende account op te vragen.





The Copernica REST API allows you to create applications that can access
and modify all data in a Copernica account, and for example start
campaigns.

The methods in the Copernica REST API are only accessible if you have an
access token. There are two ways to get such a token: via the access
token generator in the Copernica.com dashboard, and via the official
OAuth procedure.

As said, the Copernica API is implemented according to the OAuth 2.0
Authorization protocol, also utilized by Google, Facebook, Linkedin and
other major web applications. So if you're already familiar with those,
you will have your connection up and running within any minutes from
now.


This graph depicts the procedure to link an external application to
Copernica using the OAuth 2.0 protocol

Let's get started
-----------------

In order to make authorized calls, your application must obtain an
access token on behalf of a Copernica account. If you do not have
Copernica account yet, you can register your free account on
Copernica.com to get started.

In this example we'll be using a fictional external application
example.com. The goal is to enable users with an example.com account to
give this site access to their data in Copernica.

Registering your application
----------------------------

Before you can even start implementing the OAuth protocol, you need to
[register your
application](./register-your-app-on-copernica-com.md)
on the Copernica.com dashboard. By registering your application you will
obtain the **client key** and **secret key**. This basically is the
login and password of your application. Both are needed for your
application to authenticate itself to Copernica.

Go to your dashboard on Copernica.com. Go to the developers section to
retrieve the **client\_key** and the **client\_secret**

-   **client\_key**

Identifies the client that is making the request.

-   **client\_secret**

This is the secret token, so don't share it with anyone you don't trust.

Add a hyperlink to your website
-------------------------------

On your website, make a hyperlink that users can click to connect their
example.com account with their Copernica account. The link should point
to the following location, and includes a bunch of GET parameters. These
parameters are further elaborated below.

The complete authentication URL (for readability, we have not encoded
the variables, although in reality you should of course encode them):

    https://wwww.copernica.com/en/authorize?client_id=client&key&redirect_uri=https://www.example.com/success&state=random string&response_type=code

-   **client\_id** This is the public client key obtained in the first
    step.
-   **state** This is a random session string and can be anything. It is
    used to prevent forgery by malicious users. Therefor this string
    MUST be a 'hard to guess' string. Otherwise the procedure will fail.
    The state value is later matched against the authentication response
    from Copernica. You can for example use a 32 bytes md5 hash string
    that is generated by a script on your server.
-   **redirect\_uri** This is the location on your server where the user
    will be redirected to after he has given access. A typical location
    would be
    [http://www.example.com/success](http://www.example.com/success)
-   **response\_type** This parameter only accepts the value 'code'. So
    this GET parameter is always response\_type=code
-   **scope** In future releases of the API you will be able to
    determine an access scope. This would enable you for example to
    constraint the access to a single database only. Currently scope
    isn't implemented yet, so you're automatically authorizing access to
    all data.

User authorizes application access
----------------------------------

Once a user clicks on your hyperlink to authorize your application, the
user is redirected to a web form on the Copernica.com website to confirm
this access. The user will be asked to enter his login credentials. If
the user has access to more than one account, he will also be asked to
select the account that he would like your application to get access to.

Authorization successful
------------------------

After the user has confirmed access to his account on the Copernica.com
website, he is redirected to the supplied redirect URI. Two extra URI
parameters have been added to this URI: **state** and **code**. The
value of the state is the same string value that you provided in the
first step. The code is a security string that is generated by
Copernica.

Example:

    `https://www.example.com/success?state=[your random string]&code=[unique hash code]`

Is the `code` parameter missing in the redirect URL? Make sure that your
`state` parameter added to your authentication URL is at least a MD5
hash string.

Verify identification
---------------------

Once the user returned to your site, it's it time to convert the code
variable that was supplied in the redirect URL to the access token that
can be used for the API calls.

As we explained above, two parameters were added to the redirect URL.
The **state** parameter holds the same string identifier that you had
set in the first link. It is now up to you to compare if this state
value is indeed identical to the value you had set. If it is not, you
obviously should refuse this request.

The other parameter is the parameter **code**. To convert this code into
an access token, you will have to download the access token from the
api.copernica.com site via the following URL:

    https://api.copernica.com/token?  
        client_id = client_key   
        client_secret =  client_secret   
        redirect_uri = https://www.example.com/success
        code = The security string generated by Copernica

Note that the redirect\_uri parameter is not used, thus no more
redirects will follow. It is only used to verify that the access token
retrieval comes from the same location as the previous redirect.

If the request is accepted, Copernica will send a JSON document that
contains the access token only:

`{ access_token : "ed430a95c58fd7d2830c9dc453396cf5" }`

With this access token you can start doing API calls. You can also store
this token in a database, because it will stay valid until it is
manually revoked by the user.

Creating the API calls
----------------------

You've got everything up and running now and can start making calls to
the Copernica Marketing Software.

The below example shows you how you retrieve data from a profile (a
database record) with its unique ID in Copernica. A call is always
accompanied with the access token as a query string:

    https://api.copernica.com/profile/123456?access_token=ed430a95c58fd7d2830c9dc453396cf5

View our [REST API documentation](./the-copernica-rest-api.md) for in depth
information on making API calls.

Revoking access data
--------------------

Users of Copernica can easily revoke access to your application from
their admin panel in Copernica. The access token will be destroyed and
calls from your application will get an error response from our servers.
