# JSON naar MIME conversie

Email berichten gebruiken het speciale formaat MIME. Als je emails wilt 
creëren moet je deze formuleren als een single nested multipart mime 
string. Deze bevat onder andere het onderwerp, de text en html versies, 
verzender en zender adressen, DKIM ondertekeningen, bijlages en andere 
instellingen. Je kunt deze MIME string zelf maken met het onderstaande 
voorbeeld, maar er zal zo uitgelegd worden waarom dit niet altijd nodig is.

````
From: Peter <peter@smtpeter.com>
To: John Doe <johndoe@example.com>
Subect: This is an example message
MIME-Version: 1.0
Message-id: <example@example>
Date: Sun, 20 Mar 2016 13:00:00 GMT
Content-Type: multipart/alternative; boundary="---my-boundary---"

This is a multipart MIME message

---my-boundary---
Content-Type: text/plain
Content-Transfer-Encoding: quoted-printable

Dit is de text versie van de mail
---my-boundary---
Content-Type: text/html
Content-Transfer-Encoding: quoted-printable

<html>=0A    <body>=0A        Dit is de HTML versie van de mail=0A    </=
body>=0A</html>

---my-boundary-----
````
Het is niet altijd makkelijk om deze berichten aan te maken. MIME bestaat 
al lang en inmiddels zijn er veel simpelere technologieën om data te 
structureren. Het is je vast al opgevallen dat SMTPeter een mime artiest is.
Hij kan daarom ook MIME berichten voor je maken!

Je kunt in de SMTPeter REST API traditionele MIME geformatteerde emails 
injecteren, maar je kunt ook berichten in JSON formaat sturen:

````
{
    "from": "Peter <peter@smtpeter.com>",
    "to": "John Doe <joendoe@example.com>",
    "subject": "This is an example message",
    "text": "This is the text version of the mail",
    "html": "<html><body>This is the HTML version of the mail</body></html>"
}
````

Het bovenstaande bericht is qua betekenis gelijk aan de eerder getoonde 
MIME geformatteerde mail. De SMTPeter REST API kan gebruikt worden om 
emails te injecteren in beide formaten. Je kunt zelfs JSON gebruiken voor 
bijlages en afbeeldingen in de mail.
