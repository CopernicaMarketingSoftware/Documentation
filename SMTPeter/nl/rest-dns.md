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
        "value": "dkimX2.smtpeter.com",
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
vergeleken met de aanbevolen instellingen. SMTPeter rapporteert je als er iets niet 
klopt aan je instellingen. De output voor deze REST calls ziet er ongeveer zo uit:

```json
{
    "dmarc":    "ok",
    "dkim":     "perfect",
    "spf":      "perfect",
    "mx":       "error",
    "a":        "perfect",
    "remarks": {
        "dmarc": "DMARC record not redirected to ours",
        "mx":    "Bounce domain is not pointing to mail.smtpeter.com"
    }
}
```

Je kunt zo makkelijk voor elke eigenschap zien of deze juist geconfigureerd 
zijn.

Zoals je in kunt zien in het voorbeeld, zijn er drie mogelijke waarden: "perfect", 
"ok" en "error". De status moet natuurlijk perfect zijn als je onze suggesties 
hebt gevolgd. Over het algemeen hoef je records niet meer aan te passen als ze
eenmaal "perfect" zijn. Gebruik je niet onze aanbevolen instellingen en zijn de 
records wel valide?? Dan staat je status op "ok". Dit gebeurt bijvoorbeeld 
als je geen CNAME records hebt gebruikt voor het click domein, maar wel het 
juiste IP adres hebt ingesteld.

Tot slot, de eigenschap remarks wordt toegevoegd als een instelling niet op 
"perfect" staat. Hierin vind je suggesties om je records te verbeteren.

## Meer informatie

- [Direct aan de slag met SMTPeter](./introduction)
* [Afzenderdomeinen](./sender-domains)
* [SPF validatie](./spf-validation)
* [DKIM signing](./dkim-signing)
* [DMARC deployment](./dmarc-deployment)
