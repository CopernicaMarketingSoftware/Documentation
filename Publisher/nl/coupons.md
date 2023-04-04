# Couponsmodule

*Let op: het gebruik van de couponsmodule is enkel mogelijk in drag-and-drop-templates.*

Met de [couponsmodule](https://ms.copernica.com/#/coupons) is het makkelijker gemaakt om coupons te gebruiken binnen je mailings. Coupons zijn actiecodes die bij het versturen van een e-mailing gekoppeld worden aan een ontvanger. Hierdoor krijgt iedere ontvanger een unieke actiecode te zien in de ontvangen mailing. Hiermee is het mogelijk om, bijvoorbeeld bij een verjaardagscampagne, alle jarigen een bepaalde korting te geven op je product. Om gebruik te maken van de couponsmodule, zal je e-commerceplatform de mogelijkheid voor het uitgeven en inwisselen van coupons moeten ondersteunen. 

In dit artikel geven we uitleg over de werking van deze module.

## Couponcampagne
Voordat je coupons kunt inladen moet je een campagne aanmaken.  Dit is mogelijk binnen de [coupons-module](https://ms.copernica.com/#/coupons) onder de knop 'Aanmaken' in de zijbalk of via 'Nieuwe couponcampagne aanmaken' knop.

Naast het opgeven van een naam, bijvoorbeeld 'Zomerkorting', en (eventuele) beschrijving, kun je ook tags of fallback-code toevoegen aan je campagne:
- **Tags**: Steekwoorden (tags) waarmee je aan kunt geven wat de campagne inhoudt. 
- **Fallback-code**: De fallback-code wordt zichtbaar in de e-mail wanneer alle coupons binnen je campagne gebruikt zijn. Dit is een vaste waarde, bijvoorbeeld 'Zomer20procent'.

## Coupons importeren
Binnen je campagne kun je de coupons vanuit je externe systeem importeren door te kiezen voor 'Importeren' in de toolbar. De importeerfunctie ondersteunt CSV- en JSON-bestanden.

Beide bestandsformaten ondersteunen de volgende kolommen:
- code (verplicht)
- validfrom (optioneel)
- validthrough (optioneel)

### CSV-bestand
Het CSV-bestand moet door een tab, komma of puntkomma gescheiden zijn. Na het uploaden heb je de mogelijkheid om de kolommen uit je bestand aan de juist velden in je couponcampagne te koppelen.

### JSON-bestand
Een JSON-bestand heeft geen scheidingsteken. Je kunt direct de JSON-code in je import-bestand plaatsen.

Een voorbeeld vind je hieronder:
```
[{
    "code":"123AA",
    "validfrom":"2023-03-01",
    "validuntil":""
},
{
    "code":"456BB",
    "validfrom":"2023-03-01",
    "validuntil":""
},
{
    "code":"789CC",
    "validfrom":"2023-03-01",
    "validuntil":""
}]
```

## Status van een coupon
Een coupon kan meerdere statussen hebben:
- **Beschikbaar**: de coupon kan nog gebruikt worden in een mailing.
- **Verzonden**: de coupon is verzonden naar een (sub)profiel, maar is nog niet geregistreerd als ingewisseld.
- **Ingewisseld**: de coupon is geregistreerd als ingewisseld. De ontvanger heeft deze coupon gebruikt in de externe webshop voor een bestelling.
- **Verlopen**: de coupon heeft een geldig tot datum die verlopen is.
- **Inactief**: de coupon heeft een geldig vanaf datum die in de toekomst ligt.

## Coupons inladen in je e-mailtemplate
In je drag-and-drop-templates kun je de coupons inladen via Smarty. Hiervoor gebruik je de volgende functie:

```
{coupon campaign="Zomerkorting"}
```

Bij het verzenden van je nieuwsbrief wordt nu voor iedere ontvanger een unieke coupon toegevoegd vanuit de opgegeven campagne.

### Hergebruiken van een coupon
Wanneer een (sub)profiel in een e-mailflow zit waarbij je dezelfde coupon wilt gebruiken, zolang de vorige nog niet als ingewisseld is geregistreerd, kun je gebruik maken van de extra parameter `reuse=true`. Het (sub)profiel krijgt nu exact dezelfde coupon te zien als in zijn vorige e-mail.

Voorbeeld:

```
{coupon campaign="Zomerkorting" reuse=true}
```

*Let op:* als de laatst gebruikte coupon wel geregistreerd is als ingewisseld, krijgt het (sub)profiel een nieuwe coupon.

### Wanneer moet een coupon geregistreerd worden als 'verzonden'? 
Bij het testen van een e-mail waarin je gebruik maakt van coupons, wil je in de meeste gevallen niet dat de ontvangen coupon als 'verzonden' wordt geregistreerd.

In de module, onder 'Configuratie -> Instellingen', heb je de mogelijkheid om aan te geven wanneer je wilt dat een coupon als 'verzonden' wordt geregistreerd. 

De beschikbare opties zijn:
- Coupon nooit registreren als verzonden
- Coupon altijd registreren als verzonden
- Coupons niet als verzonden registreren in testmailings (**default**)

## Coupon registreren als ingewisseld
Zodra een coupon gebruikt is in je webshop, kun je deze met de REST API registreren als ingewisseld (redeemed). 

Hiervoor gebruik je een PUT-request naar het volgende adres:

`https://api.copernica.com/v3/couponcampaign/{$id}/coupons?access_token=xxx`

In de body van je call geef je op welke coupon je als ingewisseld wilt registreren:
```
{
    "source" :[
        {
            "code":"1234AA",
            "redeemed":true
        }
    ]
}
```

De overige API-calls vind je in onze [REST API-documentatie](./restv3/rest-methods).
