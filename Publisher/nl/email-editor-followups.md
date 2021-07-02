# Opvolgacties

Copernica geeft je de mogelijkheid om opvolgacties toe te voegen aan templates of documenten. Daarmee voer je automatisch acties uit op basis van condities. Zo kun je bijvoorbeeld automatisch een e-mail versturen zodra een gebruiker op een link klikt of leadscoring toepassen bij het registreren van een open. Er zijn vrijwel geen limieten.

## Twee verschillende systemen

Je kunt een opvolgactie instellen in je [template of document](https://ms.copernica.com/#/design/) door in de toolbar te klikken op **Opvolgacties**. Vervolgens heb je de keuze tussen **'Opvolgactie aanmaken'** of **'Actie aanmaken'**. De opties verschillen in het achterliggende systeem. 

De optie **Opvolgactie aanmaken** maakt gebruik van onze krachtige Follow-up Manager. Het is echter mogelijk dat je hierbij enkele functies (die je gewend bent uit Publisher) mist. Om die reden kun je ook gebruik maken van **'Actie aanmaken'**.

## Opvolgactie aanmaken

De Follow-up Manager is een gebruiksvriendelijke tool waarmee je geavanceerde marketingcampagnes kunt ontwikkelen.
Opvolgacties worden voorzien van een naam zodat acties eenvoudig van elkaar te onderscheiden zijn.

### Trigger

Een opvolgactie wordt altijd uitgevoerd als gevolg van een bepaalde gebeurtenis (trigger).
In de **'E-mail-editor'** zijn de volgende triggers beschikbaar:

* Uitschrijving
* Link-klik
* E-mailaflevering
* Elke e-mailimpressie
* Eerste e-mailimpressie
* E-mailfout

### Blokken

Zodra je de trigger hebt ingesteld kun je in de Follow-up Manager blokken toevoegen aan je opvolgactie. We maken onderscheid tussen twee blokken: (1) tussenblokken en (2) actieblokken. Een tussenblok geeft de condities aan op basis waarvan het actieblok wordt uitgevoerd. De beschikbare blokken zijn:

| Blokken                 | Type                                                                                                    |
|-------------------------|---------------------------------------------------------------------------------------------------------|
| Is ingeschreven         | Tussenblok                                                                                              |
| Bestemming checken      | Tussenblok                                                                                              |
| Check subprofielen      | Tussenblok                                                                                              |
| Zoek profiel            | Tussenblok                                                                                              |
| Zoek subprofiel         | Tussenblok                                                                                              |
| Check geklikte link     | Tussenblok                                                                                              |
| Wachttijd               | Tussenblok                                                                                              |
| Bestemming aanpassen    | Actieblok                                                                                               |
| Profiel aanmaken        | Actieblok                                                                                               |
| Subprofiel aanmaken     | Actieblok                                                                                               |
| Bestemming uitschrijven | Actieblok                                                                                               |
| Bestemming verwijderen  | Actieblok                                                                                               |
| Verzend e-mail          | Actieblok                                                                                               |

### Voorbeeld

Stel dat je een profielveld wilt aanpassen na het versturen van een mailing. Je wilt de aanpassing echter alleen doorvoeren voor profielen
waarvan het veld *'Mailing'* op *'Aangemeld'* staat. 

Je selecteert hiervoor de *e-mailaflevering*-trigger. Vervolgens sleep je in de Follow-up Manager een tussenblok van het type *Bestemming checken* op de punt van de lijn onder **Opvolgactie start**. Het blok is nu gekoppeld aan de opvolgactie. Vervolgens geef je via **'Aanpassen'** aan dat het veld *'Mailing'* gelijk moet zijn aan *'Aangemeld'*.

Je maakt de daadwerkelijke actie (het wijzigen van een profiel) aan door te klikken op het blok *'Bestemming checken'*. Vervolgens kies je voor *'Match link aanmaken'*. Hierdoor krijg je een nieuwe lijn onder het blok waar je een nieuw blok aan kunt koppelen. Je kunt nu het (actie)blok _Bestemming aanpassen_ toevoegen. In dit blok kun je aangeven welke gegevens er gewijzigd moeten worden.

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
