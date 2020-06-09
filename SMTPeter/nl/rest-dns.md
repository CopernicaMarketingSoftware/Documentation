# DNS instellingen

Voor de volledigheid moet je, na het opzetten van je sender domains, de
DNS records updaten om ervoor te zorgen dat je public keys voor DKIM 
ondertekening en je SPF en DMARC instellingen opgevraagd kunnen worden door email ontvangers.

SMTPeter host alle DNS records. Dit betekent dat je alleen CNAME record aan
hoeft te maken die doorverwijst naar de DNS Records van SMTPeter. Hier is 
een API call voor: `/dns`. Deze geeft een lijst terug van alle aanbevolen 
DNS records die op je DNS server moeten staan.

```txt
(1) https://www.smtpeter.com/v1/dns/yourdomain.com/recommended
(2) https://www.smtpeter.com/v1/dns/yourdomain.com/selfhosted
(3) https://www.smtpeter.com/v1/dns/yourdomain.com/status
```

SMTPeter ondersteunt drie API calls: een om de aanbevolen DNS configuratie 
op te vragen, een om de DNS configuratie in te stellen als je geen gebruik 
wilt maken van CNAME records en een API call om te checken of alles correct 
is ingesteld.


## DNS aanbevelingen

SMTPeter kan jouw DNS records niet aanpassen, omdat er geen toegang mogelijk
is tot jouw DNS server. Echter, SMTPeter kan je wel laten zien hoe je een 
domein opzet. De API calls naar methode (1) en (2) geven een JSON object terug in 
het volgende formaat:

```json
[
    {
        "name": "zero._domainkey.example.com",
        "type": "CNAME",
        "value": "dkimX0.smtpeter.com"
    },
    {
        "name": "one._domainkey.example.com",
        "type": "CNAME",
        "value": "dkimX1.smtpeter.com"
    },
    {
        "name": "two._domainkey.example.com",
        "type": "CNAME",
        "value": "dkimX2.smtpeter.com"
    },
    {
        "name": "example.com",
        "type": "MX",
        "value": "0 mail.smtpeter.com"
    },
    {
        "name": "clicks.example.com",
        "type": "CNAME",
        "value": "clicks.smtpeter.com"
    },
    {
        "name": "example.com",
        "type": "TXT",
        "value": "v=spf1 include:spfX.smtpeter.com -all"
    },
    {
        "name": "_dmarc.example.com",
        "type": "CNAME",
        "value": "dmarcX.smtpeter.com"
    }
]
```

De JSON bevat een array met DNS records die jij op je server moet zetten. 
Het grootste gedeelte bestaat uit CNAME records die verwijzen naar het domein 
van SMTPeter. Bij het correct instellen van je DNS Records verwijst het merendeel 
dus naar onze servers. Hierdoor kunnen we je DKIM keys roteren en beginnen met het 
beleid voor een goede DMARC reputatie. Je hoeft nu ook niet eens meer je DNS Records
aan te passen. Je kunt er ook voor kiezen om zelf de volledige controle te behouden.
In dat geval maak je een API call (2) om de records te krijgen zonder CNAME's.


## DNS status
Je kunt checken of alles correct is ingesteld als je de aanbevolen DNS Records hebt 
geïnstalleerd. Je doet dit met de volgende API methode:

```txt
https://www.smtpeter.com/v1/dns/yourdomain.com/status
```

SMTPeter vraagt je DNS Records op als je deze methode aanroept. Daarna worden deze 
vergeleken met de aanbevolen instellingen. De output voor deze REST calls ziet er ongeveer zo uit:

```json
{
    "dmarc":    "ok",
    "dkim":     "error",
    "spf":      "ok",
    "mx":       "ok",
    "a":        "ok",
    "caa":      "ok",
    "validation": "ok"
}
```

De eigenschappen "dmarc", "dkim", "spf" en "caa" geven de status van je DMARC, 
DKIM, SPF en CAA records in je DNS aan. De "mx" en "a" eigenschappen vertellen je of 
de MX en A records correct opgezet zijn. De "validation" eigenschap geeft aan 
of je afzenderdomein correct ingesteld is.

De mogelijke waardes zijn "ok" en "error". De "ok" status geeft aan dat je 
correcte DNS records ingesteld hebt.

## Meer informatie

- [Direct aan de slag met SMTPeter](./introduction)
* [Afzenderdomeinen](./sender-domains)
* [SPF validatie](./spf-validation)
* [DKIM signing](./dkim-signing)
* [DMARC deployment](./dmarc-deployment)
