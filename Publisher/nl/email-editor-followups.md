# Opvolgacties

Copernica geeft je de mogelijkheid om opvolgacties toe te voegen aan templates of documenten. Daarmee voer je automatisch acties uit op basis van condities. Zo kun je bijvoorbeeld automatisch een e-mail versturen zodra een gebruiker op een link klikt of leadscoring toepassen bij het registreren van een open. Er zijn vrijwel geen limieten.

## Twee verschillende systemen

Je kunt een opvolgactie instellen in je [template of document](https://ms.copernica.com/#/design/) door in de toolbar te klikken op **'Opvolgacties'**. Vervolgens heb je de keuze tussen **'Opvolgactie aanmaken'** of **'Actie aanmaken'**. De opties verschillen in het achterliggende systeem. 

De optie **'Opvolgactie aanmaken'** maakt gebruik van onze krachtige Follow-up-Manager. Het is echter mogelijk dat je hierbij enkele functies (die je gewend bent uit Publisher) mist. Om die reden kun je ook gebruikmaken van **'Actie aanmaken'**.

## Opvolgactie aanmaken

### Trigger

Een opvolgactie wordt altijd uitgevoerd als gevolg van een bepaalde gebeurtenis (een trigger).
In de **'E-mail-editor'** zijn de volgende triggers beschikbaar:

* Uitschrijving
* Link-klik
* E-mailaflevering
* Elke e-mailimpressie
* Eerste e-mailimpressie
* E-mailfout

### Blokken

Zodra je de trigger hebt ingesteld kun je in de Follow-up-Manager blokken toevoegen aan je opvolgactie. 

We maken onderscheid tussen twee blokken: (1) tussenblokken en (2) actieblokken. Een tussenblok geeft de condities aan op basis waarvan het actieblok wordt uitgevoerd. 

De beschikbare blokken zijn:

| Blok                    | Type                                                                                                    |
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
waarvan het veld **'Mailing'** op **'Aangemeld'** staat. 

Je selecteert hiervoor de **'E-mailaflevering'**-trigger. Vervolgens sleep je in de Follow-up-Manager een tussenblok van het type **'Bestemming checken'** op de punt van de lijn onder **'Opvolgactie start'**. Het blok is nu gekoppeld aan de opvolgactie. Vervolgens geef je via **'Aanpassen'** aan dat het veld **'Mailing'** gelijk moet zijn aan **'Aangemeld'**.

Je maakt de daadwerkelijke actie (de profielwijziging) aan door te klikken op het blok **'Bestemming checken'** en te kiezen voor **'Match link aanmaken'**. Er verschijnt nu onder het blok een nieuwe lijn waaraan je een nieuw blok kunt koppelen. Vervolgens voeg je het actieblok **'Bestemming aanpassen'** toe. Daarin geef je aan welke gegevens je wilt laten wijzigen.

### JavaScript-blokken in de geavanceerde modus

Je kunt JavaScript-blokken toevoegen door onderin de Follow-up-Manager te klikken op **'Geavanceerde modus'**. Hier stel je controles in die plaatsvinden zodra opvolgacties worden geëvalueerd of uitgevoerd.

Bekijk [hier](./email-editor-followups-advanced-javascript) het artikel over geavanceerde JavaScript.

_**Let op**: Wanneer je een opvolgactie voorziet van een wachttijd kan het zo zijn dat het profiel bij de evaluatie (het moment waarop de opvolgactie wordt aangeroepen) wel aan de gestelde condities voldoet, maar op het moment van uitvoering niet meer._

## Actie aanmaken

_**Let op**: De optie __'Actie aanmaken'__ is alleen toepasbaar op HTML-templates en -documenten._

Het aanmaken van opvolgacties op basis van het Publisher-systeem vindt plaats in vier stappen:

1) **Naam**  

Je voorziet je opvolgactie van een naam. Deze is zichtbaar in het overzicht van opvolgacties binnen je template of document.

2) **Wachttijd**  

Je geeft de wachttijd aan tussen de activatie van de trigger en de uitvoering van de opvolgactie. Je kunt bijvoorbeeld een wachttijd instellen op basis van een vast tijdsbestek (bijvoorbeeld na 2 uur) of een [variabele wachttijd instellen](./advanced-javascript-conditions) door middel van JavaScript. De opvolgactie kan ook direct worden uitgevoerd.

3) **Aanleiding**

Je stelt de aanleiding (trigger) in op basis waarvan de opvolgactie wordt uitgevoerd. Daarbij kun je extra condities instellen die betrekking hebben op velden en interesses. Condities worden geëvalueerd zodra de opvolgactie getriggerd wordt. 

Er zijn vier aanleidingen beschikbaar:

* De verzending van een document
* De registratie van een impressie
* De registratie van een klik
* De registratie van een foutmelding
    
4) **Actie**  

Je stelt de opvolgactie in die je uit wilt voeren. De onderstaande acties zijn beschikbaar:

* Een opgemaakt document per e-mail versturen;
* Een drag-and-drop-template per e-mail versturen;
* Een opgemaakt SMS-document versturen;
* Een tekstueel e-mailbericht versturen;
* Een SMS-bericht versturen;
* Contact opnemen met de geadresseerde;
* Een nieuw subprofiel aanmaken;
* Gegevens van het (sub)profiel wijzigen;
* Gegevens van de geadresseerde verwijderen.

Ook acties kunnen van condities worden voorzien. Dat doe je bijvoorbeeld wanneer je gebruikmaakt van een wachttijd. In dat geval kun je een conditie instellen die controleert of een klant nog ingeschreven staat voor de nieuwsbrief op het moment dat de opvolgactie wordt uitgevoerd.

### Geavanceerde JavaScript-condities voor HTML-templates of -documenten

Eenvoudige condities die relateren aan een aanleiding of actie zijn in te stellen door in de interface een veld te selecteren en deze te vergelijken met een specifieke waarde. 

Je kunt echter ook [geavanceerde JavaScript-condities](./advanced-javascript-conditions) instellen door gebruik te maken van de **'Geavanceerde modus'**. Daarbij dient er true (de opvolgactie moet worden uitgevoerd) of false (de opvolgactie moet niet worden uitgevoerd) uit je script te komen.

## Extra variabelen

Binnen templates of documenten kun je extra variabelen ophalen die informatie bevatten over de aanleiding van de mailing: wat was de trigger? 

De variabele {$mailing.trigger.profile} bevat informatie over het profiel dat de opvolgactie heeft veroorzaakt (getriggerd). Dit is meestal gewoon hetzelfde profiel als waar je de opvolgmailing naar toe verstuurt. Je kunt daarom vaak net zo makkelijk {$profile.voornaam} als {$mailing.trigger.profile.voornaam} gebruiken. Dit kan echter van elkaar afwijken als je kiest voor een eigen opgegeven e-mailadres of selectie als bestemming van de opvolgactie. Bij een eigen opgegeven e-mailadres is de {$profile} variabele leeg (er is namelijk geen profiel waar de mail naar toe wordt verzonden) en bij een selectie bevat de {$profile} variabele de informatie van het profiel uit de selectie. Met {$mailing.trigger.profile.VELDNAAM} kun je alsnog de informatie van het profiel ophalen waardoor de opvolgactie oorspronkelijk gestart is.

De {$mailing.trigger.subprofile} variabele wordt voornamelijk gebruikt in opvolgacties op basis van een nieuw of aangepast subprofiel, bijvoorbeeld: "verstuur twee dagen nadat er een nieuw subprofiel, bijvoorbeeld een bestelling, aangemaakt is een review mail naar het profiel". In dit geval is het profiel de bestemming van de e-mail en het subprofiel de trigger. De opvolgactie is namelijk gestart door een nieuw of aangepast subprofiel. Om de gegevens van het subprofiel in een template te tonen, gebruik je normaal gesproken de [loadsubprofile](./loadprofile-and-loadsubprofile)-tag. Hiermee haal je de gegevens van het laatste subprofiel op. Het kan echter voorkomen dat er tijdens de wachttijd extra subprofielen zijn aangemaakt binnen hetzelfde profiel. In dit geval wil je niet de veldwaardes ophalen van het laatste subprofiel, maar van het subprofiel waarop de opvolgactie oorspronkelijk is gestart. Dit is mogelijk met {$mailing.trigger.subprofile.VELDNAAM}.

```
// Tijdstip waarop de opvolgactie is gestart
{$mailing.trigger.triggertime}

// Tijdstempel waarop de opvolgactie is gestart
{$mailing.trigger.triggertimestamp}

// Ophalen van profielvelden waarop de opvolgactie is uitgevoerd
{$mailing.trigger.profile.VELDNAAM} (werkt enkel wanneer het profiel de bestemming van de opvolgactie is)

// Ophalen van subprofielvelden waarop de opvolgactie is uitgevoerd
{$mailing.trigger.subprofile.VELDNAAM} (werkt enkel wanneer het subprofiel de bestemming van de opvolgactie is)
```

### Publisher specifieke variabelen

Naast bovenstaande extra variabelen, zijn in Publisher-opvolgacties ook de volgende Publisher specifieke variabelen mogelijk:
```
// Tijdstip waarop de mailing is verzonden
{$mailing.sendtime}

// Tijdstip waarop de opvolgactie is uitgevoerd
{$mailing.trigger.executetime}

// Tijdstempel waarop de opvolgactie is uitgevoerd
{$mailing.trigger.executetimestamp}
```
