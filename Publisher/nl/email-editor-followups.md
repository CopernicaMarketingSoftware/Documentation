# Opvolgacties

In Copernica is het mogelijk om opvolgacties toe te voegen aan je templates of documenten. Hiermee kun je automatische acties uitvoeren op basis van condities. Zo kun je bijvoorbeeld iemand een mail sturen als er op een link is geklikt, lead scoring toe passen bij het openen van een e-mail of een herbestelcampagne opzetten. Dit zijn slechts enkele voorbeelden omdat er haast geen limieten zijn.

## Twee verschillende systemen
In je [template of document](https://ms.copernica.com/#/design/) kun je een opvolgactie aanmaken door in de toolbar te klikken op **Opvolgacties**. Hier heb je de keuze tussen **Opvolgactie aanmaken** of **Actie aanmaken**. Het verschil tussen beide is het achterliggende systeem. De optie _opvolgactie aanmaken_ maakt gebruik van onze follow-up manager en is zeer krachtig. Het kan echter voorkomen dat je hier nog enkele functies, die je gewend bent uit Publisher, mist. Hierdoor kun je ook gebruik maken van dit systeem via _actie aanmaken_.

## Opvolgactie aanmaken
De follow-up manager is een gebruiksvriendelijke tool om geavanceerde marketingcampagnes te ontwikkelen. 
Iedere opvolgactie heeft een naam waardoor je de opvolgacties gemakkelijk van elkaar kunt onderscheiden.

### Trigger
Een opvolgactie begint altijd met een bepaalde gebeurtenis (trigger) waardoor deze wordt opgeroepen.  
In de e-mail-editor zijn de volgende triggers beschikbaar:
- Uitschrijving
- Link-klik
- E-mailaflevering
- Elke e-mailimpressie
- Eerste e-mailimpressie
- E-mailfout

### Tussenblokken


### Actieblokken


### Voorbeeld
Als je een profielveld wilt aanpassen na het versturen van een e-mailing, maar alleen als het veld 'Mailing' op 'Aangemeld' staat, dan kies je voor de trigger _e-mailaflevering_. In de follow-up manager sleep je vervolgens een (tussen)blok van het type _Bestemming checken_ op de punt van de lijn onder _Opvolgactie start_. Hierdoor wordt het blok gekoppeld aan de opvolgactie. In dit blok kun je via _aanpassen_ aangeven dat het veld _Mailing_ gelijk moet zijn aan _Aangemeld_. 

Om vervolgens de daadwerkelijke actie, het wijziging van het profiel, toe te voegen dien je eerst op het blok '_Bestemming checken_' te kiezen voor _een "match"-link aanmaken_. Hierdoor krijg je een nieuwe lijn onder het blok waar je een nieuw blok aan kunt koppelen. Je kunt nu het (actie)blok _Bestemming aanpassen_ toevoegen. In dit blok kun je aangeven welke gegevens er gewijzigd moeten worden.

### Geavanceerde Javascript 
Wanneer je onderin de follow-up manager klikt op **Geavanceerde modus** krijg je de mogelijkheid om JavaScript blokken toe te voegen. Hiermee kun je controlles inbouwen op het moment dat je opvolgacties worden _geëvalueerd_ of _uitgevoerd_. Als je gebruik maakt van een wachttijd binnen je opvolgactie kan het zo zijn dat het profiel op het moment van evalueren (opvolgactie wordt aangeroepen) wel aan deze condities voldoet, maar op het moment van uitvoeren niet meer.

De objecten beschikbaar in JavaScript kun je [hier](./data-object) vinden.

## Actie aanmaken
_**Let op**: De optie 'Actie aanmaken' is enkel te gebruiken voor HTML-templates en -documenten._

Het aanmaken van een opvolgactie op basis van het systeem uit Publisher gaat in 4 stappen:

1) **Naam**  
Hier kun je een naam opgeven voor je opvolgactie. Deze wordt zichtbaar in het overzicht van opvolgacties op je template of document.
2) **Wachttijd**  
Hier kun je aangeven wanneer een opvolgactie uitgevoerd moet worden nadat de trigger is geweest om de opvolgactie aan te roepen. Je kunt de opvolgactie direct laten uitvoeren of met een wachttijd. Deze wachttijd kan op basis van een vaste wachttijd, bijvoorbeeld 2 uur, of op basis van een [variabele wachttijd met JavaScipt](./advanced-javascript-conditions).
3) **Aanleiding**  
De aanleiding (of trigger) is een gebeurtenis die ertoe leidt dat de actie wordt uitgevoerd. Je kunt bij elke trigger ook nog extra condities instellen op velden en interesses. Deze conditie wordt geevalueerd op het moment dat de opvolgactie wordt getriggered. Er zijn vier aanleidingen:
    - Het verzenden van het document
    - Het registreren van een impressie
    - Het registreren van een klik
    - Het registreren van een foutmelding
4) **Actie**  
Met een opvolgactie kunnen de volgende acties worden uitgevoerd:
    - Een opgemaakt document per e-mail versturen
    - Een drag-and-drop-template per e-mail versturen
    - Een opgemaakt sms-document versturen
    - Een tekstueel e-mailbericht versturen
    - Een sms-bericht versturen
    - Contact opnemen met de geadresseerde
    - Een nieuw subprofiel aanmaken
    - Gegevens van het (sub)profiel wijzigen
    - Gegevens van geadresseerde verwijderen  
    
    Naast een conditie op de aanleiding (moment van triggeren) kun je ook een conditie op de actie (moment van uitvoeren) toevoegen. Dit gebruik je voornamelijk wanneer je een wachttijd hebt ingesteld. In dit geval kun je bijvoorbeeld kijken of de klant nog ingeschreven staat voor je nieuwsbrief op het moment dat de opvolgactie wordt uitgevoerd. 
    
### Geavanceerde JavaScript condities voor HTML-template of -documenten
Condities op de aanleiding of actie zijn eenvoudig in te stellen door in de interface een veld te selecteren en deze te vergelijken met een specifieke waarde. Naast deze eenvoudige condities, is het ook mogelijk om naar de '_geavanceerde modus_' over te schakelen. Hier kun je gebruik maken van [geavanceerde JavaScript](./advanced-javascript-conditions). Hierbij dient er true (opvolgactie moet worden uitgevoerd) of false (opvolgactie moet niet worden uitgevoerd) uit je script te komen.

### Extra variabelen in je HTML-templates of -documenten
In je HTML-template of -document kun je extra variabelen ophalen die betrekking hebben op de opvolgactie:
```
// Tijdstip waarop de mailing is verzonden
$mailing.sendtime

// Tijdstip waarop de opvolgactie is getriggered
$mailing.trigger.triggertime

// Tijdstip waarop de opvolgactie is uitgevoerd
$mailing.trigger.executetime

// Ophalen van velden van het profiel waarop de opvolgactie is uitgevoerd
// Dit werkt enkel als de bestemming het profiel is
$mailing.trigger.profile.VELDNAAM

// Ophalen van velden van het subprofiel waarop de opvolgactie is uitgevoerd
// Dit werkt enkel als de bestemming het subprofiel is
$mailing.trigger.subprofile.VELDNAAM
```
