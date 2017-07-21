# Sender domains

Tegenwoordig is het onzettend ingewikkeld om email te versturen. Er is 
hier echter wel een goede reden voor: Emails met een vals "from" adres, 
die ontzettend schadelijk kunnen zijn voor de reputatie van je bedrijf. 
Copernica kan daarom ook niet zomaar email vanaf jouw naam gaan versturen. 
Eerst moet je je DNS configureren, wat een ingewikkelde taak kan zijn. 
Copernica maakt dit echter simpel met **sender domains**. De sender domain 
regelt ingewikkelde zaken als [MX](./mx.md), [SPF](./spf.md), 
[DKIM](./dkim.md) en [DMARC](./dmarc.md), zodat Copernica email voor je kan versturen. 
Deze sender domains zijn dan ook verplicht. Wij maken de DNS records aan 
en jij verwijst naar onze DNS server.

Dat is alles. In onze [snelle start gids](./quick-sender-domain-guide.md) 
vindt je de instructies om een sender domain in te stellen. In dit artikel 
gaan we dieper in op de geavanceerde mogelijkheden van sender domains.

## Subdomein of hoofddomein?

Bij het opzetten van een sender domain kun je tussen twee opties kiezen. 
Je kunt of een hoofddomein aanmaken zoals *example.com* of een subdomein
zoals *newsletter.example.com*.  Het hoofddomein komt logischerwijs het 
beste over wanneer je e-mails naar je klanten verstuurt. Je reguliere 
e-mails worden waarschijnlijk al verstuurd vanuit het hoofddomein en 
dus staan de DNS instellingen daarop ingesteld. 
Laat je deze instellingen liever intact? Dan kun je het beste gebruik maken van
een subdomein. 

Het versturen vanaf een subdomein is veiliger. Let dus goed op als je 
vanuit het hoofddomein wilt gaan versturen. Het wijzigen/aanmaken
van DMARC records behoeft extra aandacht. Meer vindt je in het 
[artikel over DMARC](./dmarc).

## De verschillende DNS records

De DNS server van Copernica wordt gebruikt om de juiste DNS instellingen in op te
slaan. In je eigen domein hoef je daarom, zoals eerder is aangeven, alleen nog de
alisassen (CNAME records) te plaatsen. De aliassen verwijzen op hun beurt weer terug
naar de instelling op de servers van Copernica. In het dashboard van de Marketing
Suite kun je precies zien welke records je moet aanmaken en aan de andere kant 
ook een waarschuwing gegeven als een record niet helemaal in orde is.

Het komt geregeld voor dat wijzigingen worden doorgevoerd op de DNS servers van 
Copernica. Je merkt niets van deze wijzigingen, omdat de aliassen van jouw domein
verwijzen naar die van Copernica. De doorgevoerde veranderingen worden dus automatisch
bijgewerkt. Er zijn nogal wat records die je aan moet maken. Hieronder een overzicht:

* Een A record om clicks en opens te registreren;
* Een MX record om de bounces en out-of-office replies af te vangen;
* Meerdere DKIM records om e-mails van een digitaal DKIM signature te voorzien;
* Een SPF record om de IP addressen van Copernica toestemming te geven om te mailen;
* Een DMARC record om de DMARC rapportages van ontvangers af te vangen.


```text
    Geadviseerde DNS records die                DNS records op de server
    aan het domein moeten worden                van Copernica, met instellingen
    toegevoegd:                                 van het sender-domain:

    +-------------------+                       +-------------------+
    |   SPF alias       |           --->        |   TXT record      |
    +-------------------+                       +-------------------+
    |   DKIM alias      |           --->        |   TXT record      |
    +-------------------+                       +-------------------+
    |   DMARC alias     |           --->        |   TXT record      |
    +-------------------+                       +-------------------+
    |   Tracking alias  |           --->        |   A record(s)     |
    +-------------------+                       +-------------------+
    |   Bounce alias    |           --->        |   MX record(s)    |
    +-------------------+                       +-------------------+
```

De A, MX en DKIM records zijn vaak makkelijk in te stellen. De DNS standaard 
laat een oneindig nummer van deze records toe, omdat deze niet in conflict 
kunnen zijn met andere records. SPF is ook geen knelpunt omdat we een subdomein 
gebruiken voor het opvangen van bounces. [DMARC](./dmarc) vereist echter wel 
wat extra aandacht, omdat dit een conflict kan veroorzaken.

## Meer informatie

* [Sender domain instellen](./quick-sender-domain-guide)
* [DMARC](./dmarc)
* [DKIM](./dkim)
* [SPF](./spf)
* [MX](./mx)
* [DNS](./dns)
