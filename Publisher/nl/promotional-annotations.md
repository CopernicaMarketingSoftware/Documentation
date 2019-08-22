# Promotionele annotations in Gmail
Momenteel werken promotionele annotations alleen in de Android en iOS versies van Google. Ook zal Gmail alleen van de bovenste twee E-mails die in de zogenaamde promotions tab van Gmail terecht komen de annotation opmaak laten zien. Welke e-mails bovenaan komen en of ze standaard in de promotions tab terechtkomen wordt bepaald door een algoritme van Google waar voor zover bekend geen invloed op uit te oefenen is. Om deze reden kan het zo zijn dat de annotation bij persoon A wel wordt weergeven maar bij persoon B niet. Om te testen of de annotations goed zijn ingesteld is het het beste om als volgt te werk te gaan.

## Voorbereiding
In Gmail is er een bepaalde groep met e-mail adressen die terug gehouden wordt van het weergeven van annotations. Om zeker te weten dat je annotations kan ontvangen kan je het beste een nieuw e-mail adres aanmaken.

* Maak een e-mail adres aan dat eindigt op promotabtesting@gmail.com, bijvoorbeeld [bedrijfsnaam-promotabtesting@gmail.com](bedrijfsnaam-promotabtesting@gmail.com).

* Installeer de Android of iOS app van Gmail en log met het zojuist aangemaakte profiel in op de app.

* Voeg dit profiel toe aan een Copernica database en stel deze in als [standaardbestemming](https://www.copernica.com/nl/documentation/personalization-testing#de-standaardbestemming-instellen).

## Template opzetten
Om eerst te testen of de annotations goed ingesteld staan testen we dit met een standaard formaat. 

* Maak een nieuwe lege template met een document aan.

* Vul de template met de volgende code

* Pas de eerste YYYY-MM-DD aan naar twee dagen geleden en de tweede naar twee dagen in de toekomst. 

""
<!-- Paste your own code here, or change the existing code to experiment with what works -->
<!-- Feel free to paste the entire HTML of your email -->

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <script type="application/ld+json">
[{
  "@context": "http://schema.org/",
  "@type": "Organization",

  // WARNING: Before sending email, either point the logo
  // at your own image or delete the logo annotation.
  //
  // If showing a logo, we recommend using an https URL.
  // It's not a requirement today, but may be in the future.
  "logo": "https://www.gstatic.com/images/branding/product/1x/googleg_48dp.png"
},{
  "@context": "http://schema.org/",
  "@type": "EmailMessage",

  // Use this optional alternative subject line to avoid duplicate text
  // between the subject, deal badge, and discount code.
  "subjectLine": "[Important] Please add subject line in annotation"
},{
  "@context": "http://schema.org/",
  "@type": "DiscountOffer",

  // Describe your discount, this will be shown as a badge (eg "25% off" or "free shipping")
  "description": "20% off",

  "discountCode": "PROMO",
  "availabilityStarts": "2019-08-21T05:54:28-07:00",
  "availabilityEnds": "2019-08-24T05:54:28-07:00"
},{
  // Promotion card with single image.
  // We recommend using an https URL.  It's not a requirement today, but may be in the future.
  // Any image size will work and will just be cropped automatically.
  // GIF & WEBP images are not supported and will be filtered out.
  // Sample image is 538x138, 3.9 aspect ratio
  "@context": "http://schema.org/",
  "@type": "PromotionCard",
  "image": "https://www.google.com/gmail-for-marketers/promo-tab/markup-tool/sample.png"
}]
    </script>
  </head>

  <body>
    <p>Email Body</p>
    <p>Line 2</p>
  </body>
</html>
""

## Testen

## Aanpassen 

## Belangrijk om te weten

