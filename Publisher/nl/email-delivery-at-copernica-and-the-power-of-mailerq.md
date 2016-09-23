Een paar maanden geleden gaven wij aan dat de [verzending van e-mail
vanuit Copernica overgezet is naar
MailerQ](https://www.copernica.com/nl/blog/mailerq-verstuurt-vanaf-vandaag-alle-e-mails-van-copernica-gebruikers/),
onze nieuwe Mail Transfer Agent (MTA). Veel gebruikers vroegen ons naar
de voordelen van MailerQ. Met de feestdagen in volle gang is dit het
ideale moment om te laten zien wat
[MailerQ](https://www.mailerq.com/ "MailerQ Website") doet voor de
aflevering van e-mail met Copernica.

De wetenschap achter e-mailaflevering
-------------------------------------

Het verzenden van e-mail is makkelijk, met een druk op de knop is de
e-mail verzonden en heb je er geen zorgen meer aan. Het afleveren van
miljoenen e-mailberichten is echter precisiewerk. Iedere ISP (Hotmail,
Gmail, Yahoo, etc.) heeft andere regels voor het accepteren van
e-mailberichten. Gmail accepteert bijvoorbeeld duizenden non-spam
berichten per minuut van een zender met een goede reputatie, maar andere
ISPs zijn niet zo soepel in het accepteren van grote hoeveelheden
e-mail. Met duizenden kleine en grote ISPs is het afleveren van e-mail
een ingewikkelde taak. \
\
 MailerQ geeft ons de middelen om de e-mailberichten van
Copernica-gebruikers goed af te leveren, zelfs bij ISPs die geen grote
hoeveelheden e-mail accepteren. Neem een kijkje onder de motorkap van de
e-mailaflevering van Copernica.

Intelligente aflevering
-----------------------

MailerQ is een slimme MTA: het probeert e-mailberichten die in eerste
instantie niet afgeleverd kunnen worden automatisch opnieuw af te
leveren, het verstuurt geen e-mail waarvaan het weet dat het niet
afgeleverd kan worden en past de verzendsnelheid aan op basis van de
capaciteit van de ontvangende mailserver. Dit betekent dat wanneer een
bericht afgeleverd kan worden, MailerQ het ook daadwerkelijk aflevert. \
\
 Naast de automatische 'retries' en aanpassen van de verzendsnelheid
monitoren wij ook constant de aflevering van e-mailberichten. Wij
gebruiken onze ervaring om deze aflevering real-time te verbeteren en
instellingen aan te passen waar dat nodig is. In de MailerQ
web-interface reageren wij snel op fouten van ontvangende mailservers en
stellen automatische reacties in om e-mailaflevering nog verder te
verbeteren. Wij houden onze e-mailaflevering 24/7 in de gaten en zitten
altijd boven op de aflevering van de e-mails van onze gebruikers.

Copernica en e-mailaflevering
-----------------------------

Bij Copernica draaien meerdere instanties van MailerQ, de meeste
instanties zijn 'bulkverzenders'. Deze verzenden nieuwsbrieven en andere
grote mailings. Daarnaast hebben we ook een 'enkele mailserver'. Deze
instantie van MailerQ doet precies wat de naam aangeeft: het verzend
e-mailberichten gericht op één ontvanger. Dit zijn je
verlatenwinkelwagencampagnes en andere automatische campagnes. Zo staan
automatische campagnes nooit in dezelfde verzendrij als de
bulkverzendingen en worden ze altijd direct verstuurd. \
 \
 Om te laten zien wat er precies gebeurt wanneer een gebruiker op de
verzendknop drukt nemen we een kijkje in de management console van
MailerQ.

![](MailerQ-Management-Console.png "MailerQ Management Console")\
 *Figuur 1: MailerQ management console*\
\

In Figuur 1 zie je de aflevergrafiek van één van onze MailerQ
instanties. De cijfers:

*29088 messages processed*\
 Dit is het aantal e-mailberichten dat MailerQ verwerkt heeft in de
laatste 60 seconden. MailerQ pakt niet alle berichten in één keer uit de
verzendrij omdat dit de ontvangende mailservers overbelast en de extra
berichten toch niet afgeleverd kunnen worden.

*28752 delivery attempts*\
 Het aantal berichten dat MailerQ daadwerkelijk heeft geprobeerd af te
leveren. MailerQ probeert berichten waarvan het weet dat ze niet
afgeleverd kunnen worden niet af te leveren. Deze teller is daarom ook
lager dan het aantal 'processed messages' omdat bijvoorbeeld de
aflevering naar een bepaald domein gepauzeerd is.

*27737 delivered*\
 Het aantal berichten dat MailerQ heeft afgeleverd.

*1027 Failures*\
 Berichten die MailerQ in eerste instantie niet af kon leveren.
Aflevering kan falen om verschillende redenen, vaak zijn dit fouten van
de ontvangende mailservers. Een 'failure' geeft MailerQ informatie over
de status van de ontvangende mail server. Deze berichten worden opnieuw
geprobeerd na vooraf ingestelde intervallen. Als de fout tijdelijk is
zal MailerQ deze berichten opnieuw proberen af te leveren na
vastgestelde intervallen tot het bericht afgeleverd kan worden.\
 Dit zijn geen hardbounces, maar grotendeels fouten van de ontvangende
mailserver

*176 Not tried*\
 De berichten die MailerQ niet heeft geprobeerd af te leveren. MailerQ
onthoud de 'laatst bekende' status van een ontvangende mailserver en zal
de verzending naar servers die geen mail accepteren tijdelijk stoppen.
Zodra de mailserver weer beschikbaar is verzendt MailerQ deze berichten
alsnog.

Wat betekent dit voor de aflevering van e-mail van Copernica-gebruikers?
------------------------------------------------------------------------

Cijfers zijn leuk, maar wat beteken deze cijfers nu precies voor onze
gebruikers? Door de verzendsnelheid aan te passen aan de ontvangende
mailserver zorgt MailerQ ervoor dat het deze servers niet overbelast en
behaalt zo de maximale afleversnelheid. De automatische 'retries' zorgen
er daarnaast voor dat een bericht dat in eerste instantie niet
afgeleverd kan worden, toch afgeleverd wordt wanneer de ontvangende
mailservers weer beschikbaar zijn. Zo wordt e-mail zo snel mogelijk
afgeleverd, zonder dat de reputatie van de verzender in het geding komt.
\
\
 In theorie zou MailerQ deze e-mails 20+ keer zo snel kunnen versturen.
Dit zou echter voor problemen zorgen bij de ontvangende mailservers en
het aantal e-mails die daadwerkelijk afgeleverd wordt ernstig verlagen.

Verbeter zelf je deliverability
-------------------------------

Wij zorgen ervoor dat je e-mail zo snel mogelijk wordt afgeleverd. Wij
houden de aflevering van e-mail 24/7 in de gaten en als een
e-mailbericht afgeleverd kan worden, wordt deze ook afgeleverd. Er zijn
echter een aantal aspecten van deliverability waar je zelf iets voor
moet doen. Zo zorg je ervoor dat een e-mail door ons afgeleverd kan
worden:

### 1. Houd je database schoon

Een schone database zonder dubbele profielen en met goed ingestelde
bounce management is de fundering voor het verzende van goede, relevante
en afleverbare e-mailberichten. Lees onze [databasebeheer
documentatie](https://www.copernica.com/nl/blog/databasebeheer/ "”databasebeheer”")
voor meer informatie.

### 2. Versleutel je e-mail met DKIM

[Het opzetten van een DKIM
record](https://www.copernica.com/nl/blog/e-mails-versleutelen-met-dkim/ "”e-mails")
voor je account is aanbevolen. Het laat zien dat een bericht van het
bedrijf komt en niet van Copernica. Veel grote mailservers gebruiken
DKIM voor het filteren van spamberichten.

### 3. Stel een Sender ID in

[Het instellen van een Sender
ID](https://www.copernica.com/nl/blog/sender-id-instellen-op-je-afzenderdomein/ "”sender")
helpt grote mailservers zoals Hotmail en Yahoo bij het bevestigen dat
e-mails ook daadwerkelijk vanuit het bedrijf komen dat wordt
weergegeven. Net als DKIM wordt dit gebruikt bij het detecteren van
spam.

### 4. Houd je spamscore laag

In Copernica testen wij de spamscore van een e-mail. Deze score wordt
bepaald door een groot aantal checks op de content van je e-mail en een
aantal DNS checks. Hoe lager de spamscore, hoe hoger de kans dat een
e-mail wordt afgeleverd. [Lees meer over het verlagen van je
spamscore](https://www.copernica.com/nl/blog/some-tips-to-lower-your-email-spam-score/ "”tips").

### 5. Stel het uitschrijfgedrag van je database in

Het opzetten van uitschrijfgedrag is belangrijk. Als je ontvangers zich
niet kunnen uitschrijven voor je nieuwsbrief wordt dit als spam gezien.
[Lees hoe je uitschrijfgedrag instelt in
Copernica](https://www.copernica.com/nl/blog/uitschrijfgedrag-instellen-op-database-of-collectie "”Het").

### 6. Stel een dubbele opt-in in

Het instellen van een dubblele opt-in is niet verplicht, maar heeft wel
een aantal voordelen ten opzichte van een enkele opt-in. [Lees meer over
het instellen van een dubbele opt-in in
Copernica](https://www.copernica.com/nl/blog/nieuwbriefinschrijvingen-laten-verlopen-via-dubbele-optin/ "”Het").

*Dit is nog maar het tipje van de sluier, als je verdere vragen hebt
over MailerQ, deliverability of deze post, stuur ons dan een bericht of
reageer hieronder.*
