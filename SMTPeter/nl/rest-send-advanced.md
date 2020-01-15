# Geavanceerde verzendopties

Door speciale properties toe te voegen aan de input van de JSON, kun je bepaalde
properties van SMTPeter aan- of uitzetten. Zo kun je bijvoorbeeld het aantal clicks, 
opens en bounces nagaan. Ook kun je bijvoorbeeld aangeven dat je wilt dat SMTPeter 
de CSS code inline zet.

```json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "inlinecss":    true,
    "trackclicks":  true,
    "trackopens":   false,
    "trackbounces": true,
    "preventscam":  true,
    "tags": [
        "tag1",
        "tag2"
    ],
    "maxdelivertime": "YYYY-MM-DD hh:mm:ss"
}
```

## Zet CSS inline

Door de "inlinecss" variabele op true te zetten, activeer je de toepassing
die ervoor zorgt dat *CSS stylesheets* uit de *header* worden omgezet naar
inline attributen in de HTML code.


## Het nagaan van clicks, opens en bounces

SMTPeter vervangt automatisch alle hyperlinks in je e-mails met eigen URLs.
Op deze manier kunnen de verschillende events worden nagegaan. Het *envelope
address* van de e-mails wordt ook automatisch omgezet naar een SMTPeter adres. Nu 
kan SMTPeter ook die events afhandelen. Je kunt deze toepassingen gemakkelijk
uitzetten. Zie onderstaande JSON data:

```json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "trackclicks":  false,
    "trackopens":   false,
    "trackbounces": false
}
```
De *click tracking* is automatisch geactiveerd. Dit betekent dat alle hyperlinks
zijn ingesteld om clicks te traceren en na te gaan. Echter, sommige *e-mail clients*
tonen een waarschuwing aan de gebruiks op het moment dat links zijn bewerkt. 
Dit is in sterkere mate het geval wanneer de link waarop geklikt kan worden,
niet overeenkomt met de hyperlink. In dat geval kun je altijd de "preventscam"
property opgeven, waardoor SMTPeter van de links afblijft en ze dus niet bewerkt:

```json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "trackclicks":  true,
    "preventscam":  true
}
```
De "preventscam" optie voorkomt dus de door SMTPeter bewerkte hyperlinks, zoals:

```html
<a href="http://www.example.com">www.example.com</>
```


## Instellingen voor Delivery Status Notifications

SMTPeter kan bounces voor je nagaan. Deze worden gestuurd naar jouw
envelope adres. Je kunt deze toepassing aanzetten door het envelope
address toe te voegen aan de JSON:

```json
{
    "envelope": "your@address.com",
    "recipient": "john@doe.com",
    "mime": "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "trackbounces": false
}
```
De bovenstaande JSON instrueert SMTPeter om geen bounces na te gaan.
In dit geval geeft de JSON aan dat jouw eigen e-mailadres wordt gebruikt
om berichten naar te sturen met betrekking tot de niet geleverde e-mails.
Wees ervan bewust dat je ook een envelope adres moet toevoegen als je 
wel bounces wilt ontvangen.

Met de optionele DSN property kun je verder finetunen wat voor soort 
*Delivery Status Notification* berichten je wilt ontvangen. De DSN variabele 
accepteert een JSON object met vier optionele velden:

```json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "trackclicks":  true,
    "preventscam":  true,
    "dsn": {
        "notify":           "FAILURE",
        "ret":              "FULL",
        "envid":            "your-identifier",
        "orcpt":            "original@recipient.address.com"
    }
}
```

De "notify" property is de allerbelangrijkste. Je kunt specificeren voor welke
soorten events een e-mail notificatie moet worden getriggerd. Mogelijke waardes
zijn "NEVER", "FAILURE", "SUCCESS" of "DELAY". Een kommagescheiden lijst met 
waardes wordt ook ondersteund. 

De "ret" waarde kan de waardes "FULL" of "HDRS" bevatten om te specificeren of de 
notificatie de gehele e-mail moet bevatten of slechts de headers. 

De "envid" and "orcpt" velden kunnen worden gebruikt als je volledige controle wilt
hebben over de extra data die meegestuurd wordt in de notificaties. De waarde van 
"envid" wordt bijgevoegd in de "original-envelope-id" property van het teruggestuurde
status bericht. De "orcpt" waarde wordt gekopierd naar de "original-recipient" property.


## Instelling voor embedded images

Het hebben van *embedded* [afbeeldingen](./images) in je MIME kan soms wat problemen geven.
SMTPeter kan de embedded afbeeldingen uit je MIME halen, hosten, en vervolgens
de links herschrijven in het "html" gedeelte van de MIME naar de oorspronkelijke locatie.
De optie kan worden geactiveerd door in de JSON op de "image" property een waarde mee 
te geven, genaamd: "hosted". De "default" waarde doet vanzelfsprekend niets.

```json
{
    /* ..., */
    "images": "hosted"|"default"
}
```

## Een e-mail taggen

Het is mogelijk om één of meerdere tags aan een mail te hangen. Deze tags
kunnen vervolgens worden gebruikt om bijvoorbeeld clicks of opens te filteren.
Stel, je stuurt een speciale e-mail over een kortingsactie die te maken heeft
met het warme weer in de zomer. Je wilt uiteindelijk weten hoeveel clicks
en opens deze actie oplevert. Elke e-mail voor deze zomeractie tag je bijvoorbeeld
met de tag: "zomerActie2016". Vervolgens kun je de opens en clicks eenvoudig filteren 
aan de hand van de "zomerActie2016" tag om te zien hoeveel opens en clicks de actie
heeft opgeleverd. Tags kunnen als array via de `tags` property toegevoegd worden aan 
de json:

```json
{
    ...,
    "tags" : [
        "tag1",
        "tag2",
        ...
    ],
    ...
}
```
Een tag mag geen *whitespace* of puntkomma's bevatten.

## Zet een aflevertijd

Het afleveren van e-mails gebeurt niet altijd direct. Zo kan bijvoorbeeld een 
e-mail server van de ontvangende partij tijdelijk offline zijn. Als je niet wil
dat een e-mail na een bepaalde tijd nog afgeleverd wordt, kan je de maxdeliverytime
property met een datum en tijdstip toevoegen aan de json:

```json
{
    ...,
    "maxdelivertime" : "YYYY-MM-DD hh:mm:ss",
    ...
}
```
Merk op dat de datum en tijd nauw luistert, een ander formaat dan hierboven werkt
niet. Als de maxdelivertime is verstreken wordt het berichtje nooit afgeleverd.
Je kan dit soort berichten terugvinden in de failure.logs. Merk op dat SMTPeter
als standaard een bericht maximaal maar een dag probeert af te leveren.


## Meer informatie

* [REST API](./rest-api)
* [Verzenden van MIME data](./rest-mime)
* [Aanmaken van MIME data met SMTPeter](./rest-send-json)
* [Afbeeldingen met SMTPeter](./images)
* [Inline CSS](./inline-css)
