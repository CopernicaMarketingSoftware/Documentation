# Sender domains

Copernica gebruikt het concept van *sender domains* om e-mail simpeler te maken. 
Om de effectiviteit van je mailing te waarborgen moet je een aantal 
[DNS records](./dns.md) aanmaken. Deze records gaan over zaken als
[MX](./mx.md), [SPF](./spf.md), [DKIM](./dkim.md) en [DMARC](./dmarc.md) 
records. Copernica heeft het aanmaken van sender domains zo simpel mogelijk
voor je gemaakt. Dit betekent dat in het dialoogvenster wordt aangegeven
welke aliassen (CNAME records) je toe moet voegen om van onze [DNS server](./dns.md)
gebruik te maken. Dit stelt ontvangers in staat om te zien dat Copernica 
toestemming heeft om vanuit iemand anders naam te e-mailen. Er worden 
significant minder e-mails afgeleverd als je bovenstaand proces overslaat. 


## Subdomein of hoofddomein?

Bij het opzetten van een sender domain kun je tussen twee opties kiezen. 
Je kunt of een hoofddomein aanmaken zoals *example.com* of een subdomein
zoals *newsletter.example.com*. 
Het hoofddomein komt logischerwijs het beste over wanneer je e-mails naar
je klanten verstuurt. Je reguliere e-mails worden waarschijnlijk al verstuurd
vanuit het hoofddomein en dus staan de DNS instellingen daarop ingesteld. 
Laat je deze instellingen liever intact? Dan kun je het beste gebruik maken van
een subdomein. 
Let goed op als je vanuit het hoofddomein wilt gaan versturen. Het wijzigen/aanmaken
van DMARC records behoeft extra aandacht.


## Domeinnaam valideren

Je kunt misbruik van sender domains voorkomen, door te bewijzen dat je echt de 
eigenaar bent van een domein. De Marketing Suite toont je een bericht, zodra je 
een sender domain hebt aangemaakt. Dit is een TXT record dat je toe moet voegen
aan je domein. In dit TXT record zit een speciale code die alleen Copernica
kan ontcijferen. Copernica ziet, nadat je het record aan je domein hebt toegevoegd,
dat je daadwerkelijk de eigenaar van het domein bent. Vervolgens kun je verder 
gaan met het configureren van het domein. 


## De verschillende DNS records

De DNS server van Copernica wordt gebruikt om de juiste DNS instellingen in op te
slaan. In je eigen domein hoef je daarom, zoals eerder is aangeven, alleen nog de
aliassen (CNAME records) te plaatsen. De aliassen verwijzen op hun beurt weer terug
naar de instelling op de servers van Copernica. In het dashboard van de Marketing
Suite kun je precies zien welke records je moet aanmaken en aan de andere kant 
ook een waarschuwing gegeven als een record niet helemaal in orde is.

Het komt geregeld voor dat wijzigingen worden doorgevoerd op de DNS servers van 
Copernica. Je merkt niets van deze wijzigingen, omdat de aliassen van jouw domein
verwijzen naar die van Copernica. De doorgevoerde veranderingen worden dus automatisch
bijgewerkt. Er zijn nogal wat records die je aan moet maken. Hieronder een overzicht:

* Een A record om clicks en opens te registreren;
* Een MX record om de [bounces](./bounces) en out-of-office replies af te vangen;
* Meerdere DKIM records om e-mails van een digitaal DKIM signature te voorzien;
* Een SPF record om de IP adressen van Copernica toestemming te geven om te mailen;
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

Klaar met het instellen van je sender domain? Dan kun je nu e-mails gaan versturen!


## Let op met DMARC

Het wordt wat ingewikkelder met DMARC records. Zeker als je e-mails wilt versturen 
vanuit het hoofddomein. Er kan namelijk maar één DMARC record per (sub)domein worden
aangemaakt en er is een grote kans dat voor jouw hoofddomein een dergelijk record al
bestaat. Dit bestaande record kun je niet zomaar weghalen of overschrijven. Je kunt 
ervoor kiezen om dan toch maar vanuit een subdomein e-mails te versturen. Dit is de 
simpele oplossing. Echter, voor het versturen vanuit het hoofddomein moet je wel 
extra maatregelen treffen. Hoe dat precies werkt leggen kun je teruglezen in het 
artikel: [DMARC configureren](./dmarc.md).


## Meer informatie

* [Sender domain instellen](./quick-sender-domain-guide)
* [DMARC](./dmarc)
* [DKIM](./dkim)
* [SPF](./spf)
* [MX](./mx)
* [DNS](./dns)
