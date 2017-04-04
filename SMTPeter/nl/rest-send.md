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

## Minimale aantal 'properties'

Je hebt tenminste twee properties nodig om een email te kunnen versturen. Het
'recipient' adres dat gebruikt gaat worden in het 'RCPT TO' gedeelte van de SMTP
protocol en de algehele 'MIME' data.

```json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
```
Om alles leesbaar te maken, hebben we het merendeel van de 'MIME' code van het 
voorbeeld verwijderd. Als je zelf geen 'MIME' bericht wil maken, kan je de 
'property' weglaten. Gebruik dan wel de '[special MIME properties](rest-mime)' 
zoals 'subject', 'text' en 'html' zodat SMTPeter de mime data kan aanmaken.

Je hoeft enkel en alleen een 'recipient' adress aan te leveren om een email te
versturen. Echter, als je bekend bent met het SMTP protocol weet je dat dat je
normaal gesproken ook een 'envelope address' moet opgeven. Dit 'envelope address' 
is het adres waar 'bounces' of momenteel-niet-op-kantoor 'replies' naartoe
worden verstuurd. SMTPeter neemt alle zorgen weg omtrent het afhandelen van die 
'bounces' en daarom hoe je in dit geval geen 'envelope address' op te geven. 
SMTPeter doet dit proces helemaal zelfstandig.

Het is ook mogelijk om zelf 'bounces' af te handelen. Dit doe je door een extra 
'envelope' adres toe te voegen aan de 'input data'. Naast dit 'envelope' adres
is het wellicht ook interessant om een ['dsn' property](rest-dsn) toe te voegen.
Hiermee kan je aangeven welke soort berichten je over de 'bounces' wilt ontvangen.

```json
{
    "recipient":    "john@doe.com",
    "envelope":     "myaddress@example.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
```


## Het gebruik van 'templates'

Er zijn tot nu toe een aantal voorbeelden gegeven van hoe je data naar SMTPeter stuurt.
Hierbij is het nodig om telkens de hele email te versturen naar SMTPeter. Of als een 
'MIME' string of als individuele tekst en html 'properties'. Het is ook mogelijk om 
gebruik te maken van vooraf-opgestelde 'templates'. Dit is handig, omdat je dan alleen
personalisatie velden mee hoeft te geven bij het versturen van data naar de REST API. 
Vanaf daar neemt SMTPeter het over, door de mail te construeren met de gepersonaliseerde 
data. 

In het SMTPeter 'dashboard' heb je toegang tot de uitgebreide 'drag-and-drop' editor.
Hier kun je 'responsive email templates' maken, bewerken en beheren. Elke 'template'
krijgt een eigen 'id' die je kunt gebruiken om email te versturen via de REST API.
Het is ook mogelijk om een gehele string of object in te voeren als 'email template'. 


```json
{
    "recipient":    "john@doe.com",
    "template":     12 | **or string/object**,
    "data": {
        "firstname":    "John",
        "lastname":     "Doe"
    }
}
```
Je kunt dus '[personalization data](personalization)' meegeven aan de REST 'call', 
zodat de email wordt gepersonaliseerd. Bovenstaand voorbeeld stuurt 'template' #12
naar john@doe.com, met de variabelen {$firstname} en {$lastname}. Dit wordt in de 
uiteindelijke email weergegeven als 'John Doe'.


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


## Speciale toepassingen

Door speciale 'properties' toe te voegen aan de input van de JSON, kun je bepaalde
toepassingen van SMTPeter aan of uitzetten. Zo kun je bijvoorbeeld het aantal 'clicks', 
'opens' en 'bounces' nagaan. Ook kun je bijvoorbeeld aangeven dat je wilt dat SMTPeter 
de CSS code 'inline' zet.

```json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "inlinecss":    true,
    "trackclicks":  true,
    "trackopens":   false,
    "trackbounces": true,
    "preventscam":  true
}
```

### Zet CSS 'inline'

Door de "inlinecss" variabel op 'true' te zetten activeer je de toepassing
die ervoor zorgt dat 'CSS stylesheets' uit je 'header' worden omgezet naar
'inline' attributen in de html code.


### Het nagaan van 'clicks', 'opens' en 'bounces'

SMTPeter vervangt automatisch alle 'hyperlinks' in je emails met eigen 'URLs'.
Op deze manier kunnen de verschillende 'events' worden nagegaan. Het 'envelope'
adres van de emails wordt ook automatisch omgezet naar een SMTPeter adres. Nu 
kan SMTPeter ook die 'events' afhandelen. Je kunt deze toepassingen gemakkelijk
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
De 'click-tracking' is automatisch geactiveerd. Dit betekent dat *alle* hyperlinks
zijn ingesteld om 'clicks' te traceren en na te gaan. Echter, sommige 'email clients'
tonen een waarschuwing aan de gebruiks op het moment dat links zijn bewerkt. 
Dit is in sterkere mate het geval waneer de link waarop gelikt kan worden,
niet overeenkomt met de 'hyperlink'. In dat geval kan je altijd de "preventscam"
'property' opgeven, waardoor SMTPeter van de links afblijft en ze dus niet bewerkt:

```json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "trackclicks":  true,
    "preventscam":  true
}
```
De "preventscam" optie voorkomt dus de door SMTPeter bewerkte hyperlinks, zoals:
&lt;a href="http://www.example.com"&gt;www.example.com&lt;/a&gt;


### Instellingen voor 'Delivery Status Notifications'

SMTPeter kan 'bounces' voor je nagaan. Deze worden gestuurd naar jouw
'envelope' adres. Je kan deze toepassing aanzetten door het "envelope"
adres toe te voegen aan de JSON:

```json
{
    "envelope":     "your@address.com",
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "trackbounces": false
}
```
De bovenstaande JSON instrueert SMTPeter om geen 'bounces' na te gaan.
In dit geval geeft de JSON aan dat jouw eigen emailadres wordt gebruikt
om berichten naar te sturen met betrekking tot de niet geleverde emails.
Wees ervan bewust dat je ook een 'envelope' adres moet toevoegen als je 
wel 'bounces' wilt ontvangen.

Met de optionele dsn 'property' kan je verder 'finetunen' wat voor soort 
'Delivery Status Notification' berichten je wilt ontvangen. De dsn variabel 
accepteert een JSON objevct met vier optionele velden:

```json
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
```
De "notify" 'property' is de allerbelangrijkste. Je kunt specificeren voor welke
soorten 'events' een email notificatie moet worden getriggerd. Mogelijke waardes
zijn "NEVER", "FAILURE", "SUCCESS" of "DELAY". Een komma gescheiden lijst met 
waardes wordt ook ondersteund. 

De "ret" waarde kan de waardes "FULL" of "HDRS" bevatten om te specificeren of de 
notificatie de gehele email moet bevatten of slechts de 'headers'. 

De "envid" and "orcpt" velden kunnen worden gebruikt als je volledige controle wilt
hebben over de extra data die meegestuurd wordt in de notificaties. De waarde van 
"envid" wordt bijgevoegd in de "original-envelope-id" 'property' van het teruggestuurde
status bericht. De "orcpt" waarde wordt gekopierd naar de "original-recipient" 
'property.


### Instelling voor 'embedded' images

Het hebben van 'embedded' afbeeldingen in je 'MIME' kan soms wat [problemen](images) geven.
SMTPeter kan de 'embedded' afbeeldingen uit je 'MIME' halen, hosten, en vervolgens
de links herschrijven in het html gedeelte van de 'MIME' naar de oorspronkelijke locatie.
De optie kan worden geactiveerd door in de JSON op de "image" 'property' een waarde mee 
te geven, genaamd: "hosted". De "default" waarde doet vanzelfsprekend niets.

```json
{
    ...,
    "images": "hosted"|"default"
}

```
