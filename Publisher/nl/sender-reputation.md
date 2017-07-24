# Sender Reputation

De *sender reputation* spreekt min of meer voor zich. Het is een indicator
die aangeeft hoe sterk je reputatie is met betrekking tot je verstuurde
e-mails. Het opstellen van een reputatie wordt voornamelijk bepaald aan
de hand van *engagement* (opens, clicks etc.) en reputatie (spam complaints, 
unknown users, spam traps etc.). Een [sender domain](./sender-domains) is 
cruciaal; Deze laat zien dat jij bent wie je zegt dat je bent. Omdat deze 
verplicht is bij Copernica gaan we er vanuit dat je deze al ingesteld hebt 
in dit artikel.

## Externe actoren beïnvloeden

Er zijn een aantal vooraf te treffen maatregelen waardoor je e-mails een 
betere kans van slagen hebben. Hierdoor blijft je reputatie sterk.

### Database

Allereerst kun je ervoor zorgen dat je database goed is ingericht. 
Profieldata komt vaak van gebruikers zelf, maar niet alle 
informatie is relevant en correct. Het is slecht voor je
reputatie als een e-mail niet aankomt of als spam wordt 
gemarkeerd. Daarom is het [onderhoud van je database](./database-introduction) 
zeer belangrijk.

### Bounce handling

Bounce handling heeft tenslotte ook een sterk effect op je reputatie. Een incorrect
of verkeerd gespeld e-mailadress zorgt ervoor dat een e-mail niet
wordt afgeleverd. [Automatisch bounces afhandelen](./automatically-process-bounces) 
zorgt ervoor dat je database en reputatie op het juiste niveau blijven.

### Certificering

Via Copernica kun je een aanvraag indienen om gecertificeerd verzender te
worden. Wanneer je aan de regels voldoet om hiervoor in aanmerking te
komen en na positieve controle van Return Path, een bedrijf gespecialiseerd 
in emailrepuatie, ontvangt u het certificaat. Met Return Path Sender 
Certification wordt je op de beste whitelists geplaatst, waardoor je 
reputatie bij emailclienten omhoog gaat. Daarnaast worden afbeeldingen 
makkelijker getoond en links eerder geactiveerd.

### Pic-server

Een pic-server domein wordt gebruikt om bijvoorbeeld kliks en opens te 
tracken. Copernica biedt een aantal standaard pic-server domeinen aan, 
maar helaas zijn er ook gebruikers die onbetrouwbare email versturen via 
Copernica en hierom hebben deze domeinen niet altijd een goede reputatie. 
Zo kunnen anderen die zich misdragen invloed hebben op jouw reputatie. 

Gelukkig is het makkelijk zelf een pic-register domein op te zetten om 
je reputatie te beschermen. Je kan er een aanmaken op je eigen domein, 
bijvoorbeeld *nieuwsbrief.jouwbedrijf.com*. Verwijs naar het (sub)domein 
pic.vicinity.com met een CNAME in je [DNS](./dns). Voeg vervolgens 
het nieuwe domein toe onder de pic-register instellingen in je account.

## E-mailinhoud

Ook de inhoud van je email is heel belangrijk en heeft invloed op je 
reputatie. Met de onde

### Spamscore
 
Elke e-mail ontvangt een spamscore, die je makkelijk zelf kunt beïnvloeden 
om je reputatie schoon te houden. Je kunt onder andere een tekstversie toevoegen, 
spamwoorden vermijden en je HTML schoonhouden om deze score te verlagen. 
Er is ook een artikel geheel gewijd aan het [verlagen van je spamscore](./some-tips-to-lower-your-email-spam-score).

### Relevantie

Zorg er ook voor dat je e-mail relevant is. Door [personalisatie](./personalization) 
te gebruiken kun je bijvoorbeeld je inhoud relevanter maken. E-mails die voor de
lezers interessant zijn worden logischerwijs niet als spam aangemerkt. Ook 
is het verstandig split-run te testen: Dit doe je door twee versies van 
een email te versturen en te evalueren welk van deze opties beter presteert. 
Probeer hier zoveel mogelijk van te leren.

### Uitschrijflink

Ontvangers moeten zich altijd uit kunnen schrijven van een nieuwsbrief. 
Een uitschrijflink maakt dit mogelijk. Door het aanbieden van een uitschrijflink
komt een onderneming betrouwbaar over en worden je e-mails minder snel als spam
gemarkeerd. Je kunt het [uitschrijfgedrag](database-unsubscribe-behavior) ook
zelf instellen.

Om ervoor te zorgen dat all je abonnees je emails willen ontvangen en 
een geldig emailadres gebruiken kun je een [dubbele opt-in aanmaken](create-a-double-optin-for-new-subscribers).

### Weergave

Met [Litmus](./litmus) previews kun je checken of je email er goed 
uitziet in elke omgeving. Als een email onleesbaar wordt binnen een 
bepaalde omgeving kan het zomaar gebeuren dat deze als spam wordt 
gemarkeerd door de ontvanger.

## Meer informatie

* [Uitschrijfgedrag](database-unsubscribe-behavior) 
* [Spamscore verlagen](./some-tips-to-lower-your-email-spam-score)
* [Deliverability](./deliverability)
