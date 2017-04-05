# REST API method: send

Om SMTPeter een email te laten versturen hoef je alleen maar met een
HTTP POST 'request' aan te geven dat je gebruik wilt maken van 
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
(en alle andere voorbeelden op deze website) gebruiken we JSON omdat het veel
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

```json
{
    "id1" : "recipient1@example.com",
    "id2" : "recipient2@example.com"
}
```
De geretourneerde id's kunnen worden gebruikt om informatie te verkrijgen middels 
andere methodes van de REST API. Omdat je emails kunt versturen naar meerdere ontvangers
met een slechts een 'call', bevat de geretourneerde waarde wellicht meerdere id's 
en 'recipients'.

## Meerdere ontvangers

Het is natuurlijk ook mogelijk om een mail te versturen naar meerdere ontvangers.
Dit doe je door het 'recipient' veld te verwijderen en te vervangen door 'recipients'.
Hierin plaats je vervolgens een array met alle emailadressen die je een email wilt 
versturen. Dit ziet er als volgt uit:

```json
{
    "recipients":   [ "john@doe.com", "someone@else.com" ],
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
```

Alleen bestaande emailadressen worden ondersteund. Het is niet toegestaan om 
'display names' of adressen in 'angle brackets' te gebruiken. SMTPeter geeft
bij het versturen van email naar meerdere ontvangers ook meerdere 'identifiers'
terug.

## Personalization

Je kunt gepersonaliseerde data toevoegen aan de 'recipient(s)'. Deze data kan
gebruikt worden om [emails te personaliseren](personalization). De data 'property'
kun je verwijderen als de email naar een enkele 'recipient' wordt verstuurd.

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

Bij meerdere 'recipients' kan de data als volgt worden meegegeven:

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
Binnen de 'MIME' string, tekst of html 'properties' kan je 
'[personalization variables](personalization)' gebruiken, zoals bijvoorbeeld
{$firstname} en {$lastname}. SMTPeter personaliseert de waardes dan zelf bij 
elke email. 
