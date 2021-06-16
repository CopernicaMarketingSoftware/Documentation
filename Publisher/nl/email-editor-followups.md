# Opvolgacties

In Copernica is het mogelijk om opvolgacties toe te voegen aan je templates of documenten. Hiermee kun je automatische acties uitvoeren op basis van condities. Zo kun je bijvoorbeeld iemand een mail sturen als er op een link is geklikt, lead scoring toe passen bij het openen van een e-mail of een herbestelcampagne opzetten. Dit zijn slechts enkele voorbeelden omdat er haast geen limieten zijn.

## Twee verschillende systemen
In je [template of document](https://ms.copernica.com/#/design/) kun je een opvolgactie aanmaken door in de toolbar te klikken op **Opvolgacties**. Hier heb je de keuze tussen **Opvolgactie aanmaken** of **Actie aanmaken**. Het verschil tussen beide is het achterliggende systeem. De optie _opvolgactie aanmaken_ is recent ontwikkeld en zeer krachtig. Het kan echter voorkomen dat je hier nog enkele functies, die je gewend bent uit Publisher, mist. Hierdoor kun je ook gebruik maken van dit systeem via _actie aanmaken_.

## Opvolgactie aanmaken


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
