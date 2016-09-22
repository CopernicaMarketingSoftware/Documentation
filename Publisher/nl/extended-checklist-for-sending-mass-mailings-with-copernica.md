Om de eerste mailing te versturen is het belangrijk om Copernica goed in
te richten, je document te controleren en te testen. Als je alle
onderstaande stappen hebt doorlopen ben je klaar om te verzenden.

### Inrichten van database

Om jezelf en je collega's in een later stadium veel tijd te besparen,
raden wij aan om in het begin goed na te denken over de structuur en
inrichting van je database. Bedenk goed welke informatie je wilt
opslaan, en op basis van welke gegevens je onderscheid wilt maken tussen
relaties.

### Profielen en selecties

Databases, profielen en selecties beheer je in het onderdeel
**Profielen**. Alle functionaliteiten die betrekking hebben op
databases, vind je in het menu **Databasebeheer**.

Een regel in een database noemen wij een profiel. Een profiel bevat
bijvoorbeeld alle gegevens over een enkele relatie, zoals het
e-mailadres, het geslacht en de naam.

[Aanmaken database en adressen
importeren](./setting-up-your-database-and-import-your-contacts.md)
(lees ook hoe je een [importbestand kan
maken](./the-requirements-for-a-well-formatted-import-file.md))

**Aanmaken velden.** Het aanmaken van databasevelden kan via twee
routes.

1.  **Via import.** Bij het instellen van een import, kan je direct
    nieuwe velden aanmaken en hun
    [eigenschappen](./database-and-collection-field-types.md)
    bewerken.
2.  **Handmatig in de interface.** [Bekijk de video over het aanmaken
    van velden](./profiles-adding-database-fields.md)

Voor het opslaan van e-mailadressen, gebruik je een specifiek veld: het
**e-mailveld**.

### Selecties

Binnen een database kan je onderscheid maken tussen gegevens met behulp
van selecties. Je verstuurt een mailing bijvoorbeeld aan een selectie
waar de uitschrijvers van een nieuwsbrief zijn uitgefilterd.

[Bekijk ook onze instructievideo over profielen en
selecties](./profiles-selections.md)

-   [Nieuwsbriefselectie](./create-a-mailing-list.md)
    - maak in je database een selectie waarin je alleen profielen
    opneemt die zich hebben ingeschreven voor de nieuwbrief.
-   [Testgroep
    selectie](./send-a-test-mail-or-test-mailing.md)
    - maak in je database een selectie over mensen die jouw mailing
    willen controleren, voordat je deze daadwerkelijk gaat versturen. Je
    kan bijvoorbeeld een extra databaseveld aanmaken, waarmee je een
    profiel kan opnemen in een selectie (bijvoorbeeld een veld TESTGROEP
    die de waarde JA moet bevatten).
-   [Het filteren van
    hardbounces](./automatically-process-bounces.md)
    - Om je verzendreputatie hoog te houden, is het belangrijk om
    adressen die persistente fouten opleveren, uit te sluiten van je
    verzendselectie.

### Uitschrijfgedrag en gebruiksmogelijkheden

Voordat je een mailing gaat versturen, heb je het uitschrijfgedrag en de
gebruiksmogelijkheden ingesteld.

1.  [Uitschrijfgedrag
    instellen.](./setting-unsubscribe-behaviour-for-your-database-or-collection.md)
    Wanneer iemand klikt op de {unsubscribe} link, wordt het
    uitschrijfgedrag geactiveerd. [Bekijk ook de
    video](./emailings-unsubscribe-header.md)
    over dit onderwerp.
2.  [Gebruiksmogelijkheden voor selectie
    instellen](./database-intentions-enabling-the-target-for-mass-mailings.md).
    Om te voorkomen dat mailings abusievelijk aan een verkeerde selectie
    wordt gericht, dien je per selectie aan te geven of deze mag worden
    gebruikt voor het versturen van een bulkmailing.

**E-mailings**
--------------

Van het onderdeel Profielen gaan we naar het onderdeel E-mailings. In
dit onderdeel maak en beheer je e-mailings, en kan je ze uiteindelijk
verzenden. We gaan er vanuit dat je al een document hebt. Heb je nog
geen document, dan kan je desgewenst onze [standaardtemplate en document
inladen](./using-the-copernica-default-template.md).

### Controleren van je document en instellingen

Voordat je een mailing verstuurt, controleer je goed of het document en
de instellingen voldoen aan de juiste eisen.

1.  [Sender ID](./setup-sender-id.md) en
    [DKIM](./signing-your-emails-with-dkim.md)
    ingesteld? Dit is niet verplicht, maar wordt wel aangeraden. Het
    instellen van DKIM en Sender ID doe je eenmalig. Doe dit wel ruim
    voordat je een mailing gaat versturen (24 uur).
2.  HTML Check - [controleer je document en template op foutieve
    HTML](./reducing-html-errors.md).
    Fouten in je HTML kunnen onverwachte resultaten geven bij de
    weergave van je nieuwbrief in verschillende e-mailprogramma's
3.  Spamcheck. In hetzelfde dialoogvenster kan je een document
    controleren op spamgevoelige eigenschappen. De beste score is 0, de
    slechtste score is 5. Zorg dat je spamscore zo dicht mogelijk bij 0
    zit.
4.  Geldig afzendadres? Gebruik altijd een afzendadres dat daadwerkelijk
    bestaat (je kunt dus e-mails ontvangen op dit adres).
5.  [Weergavecontrole met
    Litmus.](./litmus-previews-van-e-mail-wat-stuur-ik-uit.md)
    De weergave van HTML e-mails kan per e-mailprogramma wezenlijk
    verschillen. Met de Litmus test kan je screenshots ontvangen van
    jouw e-maildocument in talloze e-mailprogramma's en browsers.

### Testmail versturen

Je kan een testmail sturen naar het profiel dat je hebt ingesteld als
standaardbestemming, of een testmailing sturen naar een groep
ontvangers.

1.  Bekijk de video over het [instellen van de
    standaardbestemming](./emailings-setting-a-test-destination.md)
2.  Of lees het artikel over [het versturen van test
    emails](./send-a-test-mail-or-test-mailing.md)

[Testmail niet
ontvangen?](./heb-je-de-testmail-nog-niet-ontvangen-lees-dit-artikel-dan.md)

### Verzenden

De uiteindelijke stap: het verzenden van de bulkmailing

-   Bekijk onze video over het [instellen en verzenden van een
    bulkmailing](./emailings-sending-an-emailing.md)
-   [Bekijk alle artikelen over het versturen van een
    bulkmailing](./sending-mailings.md)

