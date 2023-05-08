## Opvolgactie op basis van veldwijziging
Het is nu mogelijk om in het _bestemming checken_ blok te kijken of een veld is aangepast. Hierbij kan je aangeven dat de opvolgactie uitgevoerd moet worden als het veld naar een specifieke waarde is aangepast of bij iedere wijziging waarbij de waarde niet gespecificeerd is. 

Na het toevoegen van het blok, kies je bij _vergelijking_ voor _is bijgewerkt_ voor iedere wijziging of voor _is bijgewerkt naar_ voor een specifieke wijziging. Bij deze laatste optie krijg je een invoerveld om de waarde te specificeren.

## Opvolgactie op basis van een specifieke foutmelding
Als je gebruik maakt van een opvolgactie waarbij de trigger een _e-mailfout_ is, heb je nu de mogelijkheid om een _check fout_ blok toe te voegen. In dit blok kun je aangeven bij welke foutmelding de opvolgactie moet worden uitgevoerd. 

Naast een specifieke foutcode zijn ook de opties 'foutmelding die bij opnieuw versturen misschien niet meer optreedt' en 'foutmelding die bij een volgende verzending mogelijk weer optreedt' beschikbaar. 

## Uitschrijfbevestiging bij gebruik {unsubscribe}-tag
Bij het gebruik van de [{unsubscribe}](https://www.copernica.com/nl/documentation/email-editor-unsubscribelink-webversion)-tag kun je nu aangeven of de uitschrijving bevestigd moet worden. Op de uitschrijfpagina krijgt de ontvanger de vraag "Weet je zeker dat je je wilt afmelden?" met een button om dit te bevestigen. Dit is toegevoegd om te voorkomen dat spamfilters, die links bezoeken uit je mail, ervoor zorgen dat je ontvangers direct worden uitgeschreven.

Je kunt deze optie activeren in de [e-mail-editor](https://ms.copernica.com/#/design) onder 'Gereedschap -> Uitschrijfprocedure' voor de instelling 'Bevestig de uitschrijving met een link' te kiezen.

## Verzendmomenten uitsluiten bij inroosteren van mailings via een RRule
Binnen Copernica heb je de mogelijkheid om je mailing in te roosteren via een [RRule](https://www.copernica.com/nl/blog/post/slim-mailings-herhalen-met-rrules). Dit is een krachtige manier om een herhalen patroon in te stellen. Bij het instellen van een RRule is de optie toegevoegd om bepaalde verzendmomenten uit te sluiten. 

Hierdoor is het mogelijk om bijvoorbeeld een e-mail in te plannen op alle werkdagen, behalve op maandag 29 mei (tweede pinkersterdag). Je hoeft dan niet handmatig de mailing te pauzeren op de dag zelf.

## Externe downloads inzichtelijk in de logbestanden
Wanneer je externe content inlaad je e-mailtemplates, bijvoorbeeld via een feed, is het nu inzichtelijk gemaakt in de logbestanden hoe vaak wij deze feed ophalen, welke response wij hebben teruggekregen van de server en hoeveel millisecondenhet ophalen heeft geduurd. Zo kun je bij overbelasting of een trage verzending precies zien waardoor dit veroorzaakt wordt.

Je vindt deze informatie in de [Logbestanden-module](https://ms.copernica.com/#/logs/) onder 'Externe downloads'. Dit logbestand is enkel zichtbaar als je ook daadwerkelijk gebruik maakt van externe content in je mails.

## Google voegt blauwe verificatievinkjes voor bedrijven toe aan Gmail
In 2021 introduceerde Google 'Brand Indicators for Message Identification' (BIMI). Hiermee is het mogelijk om je bedrijfslogo weer te geven in de inbox. In ons [blogartikel](https://www.copernica.com/nl/blog/post/hogere-openratios-en-verbeterde-e-mailveiligheid-met-bimi) uit 2021 lees je hoe je dit kunt instellen.

Naast het tonen van een bedrijfslogo voegt Google nu ook blauwe verificatievinkjes toe aan de inbox. Hierdoor heeft de verzender aangetoond dat het de eigenaar is van het verzenddomein en het bedrijfslogo dat wordt getoond. Dit geeft de ontvanger meer vertrouwen om je e-mail te openen.

Om van deze functie gebruik te maken, heb je wel een Verified Mark Certificate (VMC) nodig. De kosten voor een VMC ligt rond de € 1500,- per jaar. VMC's zijn beschikbaar via een Certification Authority (CA) als [DigiCert](https://www.digicert.com/nl/tls-ssl/verified-mark-certificates/) of [Entrust](https://www.entrust.com/digital-security/certificate-solutions/products/digital-certificates/verified-mark-certificates).

Meer informatie over deze update vind je in het [blogartikel](https://workspaceupdates.googleblog.com/2023/05/expanding-gmail-security-BIMI.html) van Google.
