# Productupdate - Opvolgactie verbeteringen, uitschrijfbevestiging en verzendmomenten uitsluiten met RRule

## Opvolgactie op basis van veldwijziging
We hebben een nieuwe functie toegevoegd waarmee je een opvolgactie kunt uitvoeren op basis van wijzigingen in een veld. Met het _bestemming checken_ blok kun je nu controleren of een veld is aangepast. Je kunt specificeren dat de opvolgactie moet worden uitgevoerd als het veld naar een specifieke waarde is aangepast of bij elke wijziging waarbij de waarde niet is gespecificeerd.

Nadat je het blok hebt toegevoegd, kun je bij _vergelijking_ kiezen voor de optie _is bijgewerkt_ als je wilt dat de opvolgactie wordt uitgevoerd bij elke wijziging in het veld. Als je wilt dat de opvolgactie alleen wordt uitgevoerd wanneer het veld is bijgewerkt naar een specifieke waarde, kies dan de optie _is bijgewerkt naar_ en voer de waarde in het invoerveld in.

## Opvolgactie op basis van een specifieke foutmelding
Als je gebruik maakt van een opvolgactie waarbij de trigger een _e-mailfout_ is, heb je nu de mogelijkheid om een _check fout_ blok toe te voegen. In dit blok kun je aangeven bij welke foutmelding de opvolgactie moet worden uitgevoerd. 

Naast een specifieke foutcode zijn ook de opties 'foutmelding die bij opnieuw versturen misschien niet meer optreedt' en 'foutmelding die bij een volgende verzending mogelijk weer optreedt' beschikbaar. 

## Uitschrijfbevestiging bij gebruik {unsubscribe}-tag
Bij het gebruik van de [{unsubscribe}](https://www.copernica.com/nl/documentation/email-editor-unsubscribelink-webversion)-tag kun je nu aangeven of de uitschrijving bevestigd moet worden. Wanneer je deze optie activeert, krijgt de ontvanger bij het openen van de uitschrijfpagina de vraag "Weet je zeker dat je je wilt afmelden?" met een button om de uitschrijving te bevestigen. Dit is gedaan om te voorkomen dat ontvangers onbedoeld worden uitgeschreven als gevolg van spamfilters die links uit je e-mail volgen.

Je kunt deze optie activeren in de [e-mail-editor](https://ms.copernica.com/#/design) onder 'Gereedschap -> Uitschrijfprocedure' voor de instelling 'Bevestig de uitschrijving met een link' te kiezen.

## Verzendmomenten uitsluiten bij inroosteren van mailings via een RRule
Binnen Copernica heb je de mogelijkheid om je mailing in te roosteren via een [RRule](https://www.copernica.com/nl/blog/post/slim-mailings-herhalen-met-rrules). Dit is een krachtige manier om een patroon voor herhaalde e-mails in te stellen. Bij het instellen van een RRule is de optie toegevoegd om bepaalde verzendmomenten uit te sluiten.

Met deze optie kun je bijvoorbeeld een e-mail inplannen voor alle werkdagen, behalve op maandag 29 mei (tweede pinksterdag). Op deze manier hoef je niet handmatig de mailing te pauzeren op de dag zelf.

## Externe downloads inzichtelijk in de logbestanden
Wanneer je externe content inlaad je e-mailtemplates, bijvoorbeeld via een feed, is het nu inzichtelijk gemaakt in de logbestanden hoe vaak wij deze feed ophalen, welke response wij hebben teruggekregen van de server en hoeveel millisecondenhet ophalen heeft geduurd. Zo kun je bij overbelasting of een trage verzending precies zien waardoor dit veroorzaakt wordt.

Je vindt deze informatie in de [Logbestanden-module](https://ms.copernica.com/#/logs/) onder 'Externe downloads'. Dit logbestand is enkel zichtbaar als je ook daadwerkelijk gebruik maakt van externe content in je mails.

## Google voegt blauwe verificatievinkjes voor bedrijven toe aan Gmail
In 2021 introduceerde Google 'Brand Indicators for Message Identification' (BIMI). Hiermee is het mogelijk om je bedrijfslogo weer te geven in de inbox. In ons [blogartikel](https://www.copernica.com/nl/blog/post/hogere-openratios-en-verbeterde-e-mailveiligheid-met-bimi) uit 2021 lees je hoe je dit kunt instellen.

Naast het tonen van een bedrijfslogo voegt Google nu ook blauwe verificatievinkjes toe aan de inbox. Hierdoor heeft de verzender aangetoond dat het de eigenaar is van het verzenddomein en het bedrijfslogo dat wordt getoond. Dit geeft de ontvanger meer vertrouwen om je e-mail te openen.

Om van deze functie gebruik te maken, heb je wel een Verified Mark Certificate (VMC) nodig. De kosten voor een VMC ligt rond de € 1500,- per jaar. VMC's zijn beschikbaar via een Certification Authority (CA) als [DigiCert](https://www.digicert.com/nl/tls-ssl/verified-mark-certificates/) of [Entrust](https://www.entrust.com/digital-security/certificate-solutions/products/digital-certificates/verified-mark-certificates).

Meer informatie over deze update vind je in het [blogartikel](https://workspaceupdates.googleblog.com/2023/05/expanding-gmail-security-BIMI.html) van Google.
