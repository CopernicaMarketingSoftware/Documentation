# DNS informatie opvragen

Nadat je tenminste een afzenderdomein hebt opgezet moet je je DNS records 
updaten om ervoor te zorgen dat je public keys voor DKIM ondertekening en 
je SPF en DMARC instellingen opgevraagd kunnen worden door email ontvangers.

SMTPeter host alle DNS records onder zijn eigen DNS domein, zodat je 
alleen CNAME records aan hoeft te maken die doorverwijzen naar SMTPeters 
DNS records. Hier is een API call voor: "/dns". Deze geeft een lijst terug 
van alle aanbevolen DNS records die op je DNS server moeten staan.

```txt
(1) https://www.smtpeter.com/v1/dns/yourdomain.com/recommended
(2) https://www.smtpeter.com/v1/dns/yourdomain.com/selfhosted
(3) https://www.smtpeter.com/v1/dns/yourdomain.com/status
```

Wij ondersteunen drie API calls: een om de aanbevolen DNS configuratie 
op te vragen, een om de DNS configuratie in te stellen als je geen gebruik 
wil maken van CNAME records en een API call om te checken of alles correct 
is ingesteld.

## DNS aanbevelingen

SMTPeter kan jouw DNS records niet aanpassen omdat we geen toegang hebben 
tot jouw DNS server. We kunnen je echter wel aanbevelen hoe je je domein 
opzet. De API calls naar methode (1) en (2) geven een JSON object terug in 
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

De JSON bevat dus een array met DNS records die jij op je server moet zetten. 
Zoals je ziet bestaat het grootste gedeelte hiervan uit CNAME records die 
verwijzen naar het domein van SMTPeter. Als je alles correct instelt 
verwijzen jouw DNS records dus eigenlijk naar de onze. Het voordeel hiervan 
is dat we zo jouw DKIM keys kunnen roteren en langzaam je DMARC beleid 
kunnen uitrollen zonder dat je ooit je DNS aan hoeft te passen.

Als je echter zelf de volledige controle wil behouden kun je ook API call 
(2) gebruiken om de records te krijgen zonder CNAME's.

## DNS status

Wanneer je de aanbevolen DNS records hebt geinstalleerd kun je checken of 
alles correct ingesteld is met de volgende API methode:

```txt
https://www.smtpeter.com/v1/dns/yourdomain.com/status
```

Wanneer je deze methode aanroept vraagt SMTpeter je DNS records op en 
worden deze vergeleken met de aanbevolen instellingen. Als er iets niet 
klopt aan je instellingen rapporteert SMTPeter dit. De output voor deze 
REST calls ziet er ongeveer zo uit:

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

Zoals je kunt zien in het voorbeeld zijn er drie mogelijke waarden: "perfect", 
"ok" en "error". De status zou perfect moeten zijn als je onze suggesties hebt 
gevolgd. Over het algemeen hoef je records niet meer aan te passen als ze 
"perfect" zijn. Als je niet onze aanbevolen instellingen hebt gebruikt maar 
de records wel valide zijn zal je status op "ok" staan. Dit gebeurt bijvoorbeeld 
als je geen CNAME records hebt gebruikt voor het klik domein maar wel het 
juiste IP adres hebt ingesteld.

Als een instelling niet op "perfect" staat wordt de eigenschap remarks 
toegevoegd met suggesties om je records te verbeteren.

## Meer informatie

- [Direct aan de slag met SMTPeter](./introduction)
