# Verzenden via REST

SMTPeter heeft een betrouwbare REST API die gebruik maakt van het HTTPS 
protocol.Om toegang te krijgen tot de REST API heb je een een *API access token* 
nodig. Deze vind je terug in het SMTPeter dashboard. De REST API stelt je in staat
om gemakkelijk e-mail te versturen en tegelijkertijd geavanceerde toepassingen te 
injecteren in je e-mails. Door middel van een HTTP POST request kun je aangeven 
dat je gebruik wilt maken van de send method en kun je al bijna je eerste 
e-mail versturen:

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


## Verken de andere toepassingen

De REST API is uitgebreid en geeft je vrijheid in het maken van keuzes:

* [MIME data versturen](rest-mime)
* [MIME data door SMTPeter laten versturen](rest-send-json)
* [Versturen op basis van een template](rest-send-template)
* [Geavanceerde verzendopties](rest-send-advanced)
* [Terugkoppeling](rest-api-reaction)