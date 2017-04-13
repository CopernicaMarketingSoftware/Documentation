# Bepaal de methode

Om SMTPeter een e-mail te laten versturen hoef je alleen maar met een
HTTP POST request aan te geven dat je gebruik wilt maken van 
de send method:

```text
https://www.smtpeter.com/v1/send
```

De body moet het e-mailbericht bevatten dat je wilt versturen, tezamen
met de SMTPeter mogelijkheden die je wilt activeren. De e-mail kan vervolgens
worden aangeleverd in vele verschillende formaten. Bijvoorbeeld door 
middel van een *raw MIME* string of als individuele *property*, zodat SMTPeter
de mime kan opbouwen:

```text
POST /v1/send?access_token={YOUR_API_TOKEN} 
HTTP/1.0
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

Bovenstaand voorbeeld van een call demonstreert een van de vele manieren om 
e-mail te versturen met de REST API. Net zoals alle andere API calls kun je
data meesturen als een "application/json" JSON string of als een reguliere 
"application/x-www-form-encoded" HTTP POST data. In bovenstaand voorbeeld
(en alle andere voorbeelden op deze website) gebruiken we JSON omdat het 
veel makkelijker te lezen is.

In het voorbeeld hebben we geen raw MIME bericht meegegeven naar SMTPeter.
We gaven individueel "subject", "html", "from" en "to" properties op. SMTPeter 
gebruikt deze properties om een e-mail te construeren nog voordat de e-mail
wordt verstuurd naar de ontvanger(s). Dit betekent dat je geen complex 
MIME-bericht hoeft op te bouwen voor SMTPeter. Dit is natuurlijk optioneel.
Je kunt ook handmatig een MIME string meegeven naar de REST API. Dit wordt
verder in het artikel nader uitgelegd. 

Hierboven hebben we en een "recipient" en een "to" field gebruikt. Het "recipient" 
veld bevat de adressen waarnaar de e-mail wordt verstuurd. Het "to" veld bevat 
het veld dat daadwerkelijk in de e-mail wordt weergegeven als het "to" adres.
Voor de meeste e-mails zijn deze twee adressen identiek. Het is echter ook
volkomen legaal om e-mails te versturen naar adressen die niet zijn weergegeven 
in het "to" veld. Dit is namelijk precies hoe *BCC* werkt: e-mails worden 
afgeleverd bij adressen die niet zijn vermeld in de "to" header.

## Meerdere ontvangers

Het is natuurlijk ook mogelijk om een mail te versturen naar meerdere ontvangers.
Dit doe je door het "recipient" veld te verwijderen en te vervangen door "recipients".
Hierin plaats je vervolgens een array met alle e-mailadressen die je een e-mail wilt 
versturen. Dit ziet er als volgt uit:

```json
{
    "recipients":   [ "john@doe.com", "someone@else.com" ],
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
```

Alleen bestaande e-mailadressen worden ondersteund. Het is niet toegestaan om 
*display names* of adressen in blokhaken te gebruiken. SMTPeter geeft
bij het versturen van e-mail naar meerdere ontvangers ook meerdere identifiers
terug.
