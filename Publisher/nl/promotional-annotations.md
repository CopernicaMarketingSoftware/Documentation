# Promotionele annotations in Gmail
Momenteel werken promotionele annotations alleen in de Android- en iOS-versies van Google. Ook zal Gmail alleen van de bovenste twee e-mails die in de zogenaamde 'promotions tab' van Gmail terecht komen de annotationopmaak laten zien. Welke e-mails bovenaan komen en of ze standaard in de promotions tab terechtkomen wordt bepaald door een algoritme van Google waar voor zover bekend geen invloed op uit te oefenen is. Om deze reden kan het zo zijn dat de annotation bij persoon A wel wordt weergeven maar bij persoon B niet. Om te testen of de annotations goed zijn ingesteld is het het beste om als volgt te werk te gaan.

![](../images/gmail.png)

## Voorbereiding
In Gmail is er een bepaalde groep met e-mailadressen die terug gehouden wordt van het weergeven van annotations. Om zeker te weten dat je annotations kan ontvangen kan je het beste een nieuw e-mailadres aanmaken.

* Maak een e-mail adres aan dat eindigt op [promotabtesting@gmail.com](https://accounts.google.com/signup), bijvoorbeeld [bedrijfsnaam.promotabtesting@gmail.com](https://accounts.google.com/signup).

* Installeer de Android of iOS app van Gmail en log met het zojuist aangemaakte profiel in op de app.

* Voeg dit profiel toe aan een Copernica database en stel deze in als [standaardbestemming](https://www.copernica.com/nl/documentation/emailings-publisher-testing#de-standaardbestemming-instellen).

## Template opzetten
Om eerst te testen of de annotations goed ingesteld staan testen we dit met een standaard formaat. 

* Maak een nieuwe lege template met een document aan.

* Zet de volgende code in het template.

```
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <{'script'} type="application/ld+json">
    [literal]
      [{
        "@context": "http://schema.org/",
        "@type": "Organization",

      // EDIT 1 Logo image
        "logo": "https://pic.vicinity.nl/image/14579894/0ee297827761284dd8f78601d3a1c9f5/image.png"
      },{
        "@context": "http://schema.org/",
        "@type": "EmailMessage",

      // EDIT 2 Alternative subject line for annotations version
        "subjectLine": "Alternative subject line for annotated version"
      },{
        "@context": "http://schema.org/",
        "@type": "DiscountOffer",

      // EDIT 3 Badge discount description
        "description": "20% off",

      // EDIT 4 Discount code
        "discountCode": "PROMO",

      // EDIT 5 Start date
        "availabilityStarts": "YYYY-MM-DDT00:00:00-01:00",

      // EDIT 6 End date
        "availabilityEnds": "YYYY-MM-DDT00:00:00-01:00"
      },{
        "@context": "http://schema.org/",
        "@type": "PromotionCard",

      // EDIT 7 image, 538x138 pixels is best, 3.9 aspect ratio is recommended, use png or jpeg file format
        "image": "https://pic.vicinity.nl/image/14579892/946b36fc985fa49220b501af8fc6aa4c/image.jpeg"
      }]
    [/literal]
  </{'script'}>
  </head>

  <body>
    <p>Email Body</p>
  </body>
</html>
```

* Onder de comments EDIT 5 en EDIT 6 vind je "YYYY-MM-DD". Pas de eerste aan naar 'twee dagen geleden' en de tweede naar 'twee dagen in de toekomst'. 


## Testen
Om te testen of de annotations werken is het belangrijk om het volgende stappenplan nauwkeurig te volgen.

* Verwijder alle e-mails in de promotions tab van Gmail en leeg de prullenbak.
* Verstuur het document naar het zojuist aangemaakte Gmail adres.
* Ga naar de inbox op je Android- of iOS-apparaat.
* Als de mail niet direct in de promotions tab terecht komt, verplaats deze dan handmatig.
* Refresh de promotions tab net zolang totdat de annotation verschijnt.

Mocht dit na meermaals proberen niet lukken raadpleeg dan de [troubleshooting](https://developers.google.com/gmail/promotab/troubleshooting) pagina van de documentatie van Gmail.

## Aanpassen en personaliseren
De code van de test e-mail kan vervolgens getest worden in een bestaande mailing.

* Voeg alles tussen de '<head>' tag toe aan de head van een bestaande mailing.
* Verstuur deze zonder de annotation aan te passen als test naar het Gmail account.
* Pas item voor item de inhoud aan, verwijder tussendoor telkens de vorige mail en leeg de prullenbak.
* Als je gebruik wilt maken van smarty personalisatie dan dient de '[literal]' tijdelijk te worden afgesloten. Voor EDIT 3 zou dit het volgende inhouden;
  
```
// EDIT 3 Badge discount description
  "description": "[/literal]{$profile.VELDNAAM}[literal]",
```

Op de website van Google bevindt zich een [test-tool](https://developers.google.com/gmail/promotab/overview) om een voorbeeld te krijgen hoe de annotation eruit komt te zien.
