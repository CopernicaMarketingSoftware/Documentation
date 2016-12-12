# Importeren van profielgegevens
Er zijn in de Copernica Publisher verschillende opties voor het importeren en exporteren van gegevens. Zo kun je profielen niet alleen toevoegen vanuit Copernica, maar ook direct vanuit een (al bestaand) spreadsheet, direct in een collectie importeren en is het ook mogelijk om automatisch periodiek profielen te laten importeren. Het is voor nu nog niet mogelijk om dit in de MarketingSuite te doen.

Je vindt de import- en exportinterface onder *Profielen*, in het menu *Huidige weergave*.

## Importbestand voorbereiden
Voordat je je adressenbestand in Copernica kun importeren, moet je zorgen dat het compatibel is met Copernica. Dit is niet moeilijk: het enige dat Copernica eist is dat je een profiel per regel aanhoudt, iedere kolom een naam geeft en het bestand moet in csv of tabgescheiden txt worden aangeleverd. Dit doe je door de bovenste regel van je bestand te vullen met alle namen van de velden die je wil maken, gescheiden door een tab. Dus:
<pre>
    Voornaam    Achternaam    Stad    Telefoonnummer
</pre>
Vervolgens ga je de profielen toevoegen. Dit doe je vanzelfsprekend zo:
<pre>
    Voornaam    Achternaam    Stad    Telefoonnummer
    Jan    de Jong    Amersfoort    0612456631
    Roos    Schippers    Groningen    0612222444
</pre>

Het bestand hierboven is een voorbeeld van een tabgescheiden bestand. Gebruik je liever komma's dan tabs, dan kan dat door simpelweg de tabs in het voorbeeld hierboven te vervangen door komma's (en je bestand op te staan als .csv in plaats van .txt) Als je een spreadsheetprogramma gebruikt, zoals Excel, kun je een spreadsheet exporteren als tabgescheiden txt of csv door 'Opslaan als' te selecteren en het bestandsformaat op *Tekst (tab is scheidingsteken) (*.txt)*.

## Je bestand importeren
### Kolommen koppelen
We gaan er voor het gemak vanuit dat je al een database hebt aangemaakt. Is dit niet het geval, lees dan eerst [hier](https://www.copernica.com/nl/documentation/database-inrichten) hoe je dat doet. 
Kies in het menu *Huidige weegave* voor *Importeren/Exporteren* en kies *Importeren*. Kies je bestand en je gebruikte scheidingsteken. Klik door naar de volgende stap.

In het scherm dat je nu voor je hebt koppel je de kolommen uit je importbestand aan de velden van je database. Als je nog geen databasevelden hebt gemaakt, kun je op *Maak alle velden aan* klikken om velden aan te maken met dezelfde namen als je kolommen. Als je wel al velden hebt gemaakt, kun je het veld selecteren dat slaat op de kolom. Daarnaast geef je onder *Type* het veldtype aan. Ben je nog niet bekend met alle verschillende veldtypen? Je vindt ze [hier](https://www.copernica.com/nl/documentation/velden-en-collecties). Als je geen specifiek veldtype selecteert, wordt het veld een tekstveld. Je kunt het type achteraf altijd nog wijzigen.

## Sleutelvelden
Een import waarbij je bestaande gegevens overschrijft of nieuwe gegevens toevoegt aan bestaande profielen, heeft sleutelvelden nodig. Middels het sleutelveld wordt een koppeling gemaakt tussen het bestaande profiel en de nieuwe informatie.

Het sleutelveld dient een unieke waarde te bevatten, zodat één importregel gekoppeld kan worden aan één profiel. Dit kan ook een combinatie van sleutels zijn die elke regel uniek maken. Geschikte sleutelvelden zijn bijvoorbeeld het (sub)profiel ID en e-mailadres.

Je stelt zelf sleutelvelden in. De applicatie waarschuwt je wanneer deze nog niet zijn ingesteld, of niet leiden tot een unieke koppeling van gegevens.

## Importeren in een database met collectie
Je kunt ook subprofielen importeren via een importbestand. Een subprofiel behoort altijd tot een enkel profiel, bijvoorbeeld een profiel 'bedrijf' met collectie 'werknemers'. De werknemers zijn dan de subprofielen in de collectie. Profielgegevens met subprofielen importeer je als volgt:

<pre>
Bedrijf    Stad    Werknemers.Voornaam    Werknemers.Achternaam    Werknemers.Email
Copernica    Amsterdam    Lars    Hoogenbosch   lars.hoogenbosch@copernica.com
Copernica    Amsterdam    Heleen    van Gils    heleen.vangils@copernica.com
Bedrijf X    Den Haag     Piet    de Leeuw    piet@bedrijfx.com

</pre>

Hierin is 'Werknemers' de collectie, en 'Voornaam', 'Achternaam' en 'Email' zijn velden in de collectie. De kolomnaam van een veld in een collectie is dus Collectienaam.Veldnaam. Zoals je ziet, wordt het profiel 'Copernica' twee keer genoemd. De reden hiervoor is dat ieder subprofiel een aparte regel nodig heeft. 'Bedrijf' is het sleutelveld, dus Copernica zal geen apart profiel aanmaken voor de twee regels waarin Copernica genoemd wordt. In plaats daarvan worden beide subprofielen in de collectie 'Werknemers' van 'Copernica' gezet.

Het is belangrijk dat je bij het importeren van een bestand voor een database met collecties voor de profielen als de subprofielen van iedere collectie een sleutelveld kiest. Wanneer dit niet het geval is, kan Copernica de collecties niet goed koppelen. Wanneer een subprofiel niet aan een profiel gekoppeld kan worden, zal er een apart profiel worden gemaakt voor het subprofiel.

## Een periodieke import van (sub)profielen inroosteren
Als je nieuwe profieldata niet direct in Copernica opslaat, is het mogelijk om periodiek automatisch de nieuwe profieldata van een externe bron te laten importeren in Copernica. Hiervoor selecteer je *Interval* in het dialoogvenster en bij *bron* selecteer je *locatie opgeven waar bestand staat*. Vul de URL in van je bestand en ga naar de volgende stap.

Verder spreekt de interface voor zich: importinstellingen zijn hetzelfde, behalve dat er nu een tabblad *interval* is verschenen, waarin je kunt aangeven wanneer je import moet geschieden.

Je kunt een periodieke import uitschakelen door naar *Huidige weergave* > *Importeren/Exporteren* > *Import* > *Import* tonen te gaan en te klikken op *Import annuleren*.

## Converteren van datumnotaties
De datumnotatie in Copernica is de standaard MySQL databasenotatie: JJJ-MM-DD uu:mm:ss. Hierdoor worden selecties op basis van datum en tijd een stuk sneller en betrouwbaarder. Een nadeel is echter dat het conflicten veroorzaakt wanneer timestamps niet in deze opmaak worden aangeleverd, zoals bijvoorbeeld het Europese format DD-MM-JJJJ.

Het kan gebeuren dat je importbestand verschillende of ongeldige datumnotaties bevat. In het geval van verschillende datumnotaties kun je ervoor kiezen om de datums automatisch te laten converteren. Dit is echter wel foutgevoelig: de datum 03-09-1980 kan immers zowel worden geïnterpreteerd als 9 maart 1980 en als 3 september 1980. Ongeldige datums worden genegeerd en als leeg bestand opgeslagen. Lege datumvelden mogen echter niet bestaan in Copernica, dus worden ze automatisch overgezet naar 0000-00-00 (00:00:00). Wil je ongeldige datums toch importeren, dan dien je dit in een tekstveld te doen in plaats van een datumveld.
Wanneer een deel van je database de ene notatie gebruikt, en een ander deel een andere, kun je de import in twee delen splitsen om ze allemaal naar de juiste notatie om te laten zetten.

## Verkeerde import terugdraaien
Het overkomt de beste: Een mislukte import, of er na een import achter komen dat je toch iets verkeerd gespecificeerd had. Gelukkig is dit gemakkelijk terug te draaien in Copernica middels de rollbackfunctie.

### Nieuwe profielen weer verwijderen
Maak onder de database een nieuwe selectie aan. Hiermee ga je alleen profielen selecteren die door de import zijn toegevoegd.

Gebruik de selectieconditie *Check op wijzigingen*
- Kies bij type verandering *Het profiel is aangemaakt*
- Gebruik de twee kalenders om de periode te selecteren waarin de import heeft gedraaid
- Sla de selectie op en controleer steeksproefgewijs nog even of de selectie de juiste profielen bevat, voordat je deze definitief verwijdert.

Om de profielen te verwijderen, kies je in het menu *Huidige weergave* voor *Wijzigen / verwijderen* meerdere profielen. Kies de selectie die je speciaal voor dit doel hebt aangemaakt en klik vervolgens op *Verwijderen* om de profielen uit deze selectie te verwijderen.

### Profielen naar eerdere staat terugdraaien
Heb je door de import bestaande profielen abusievelijk gewijzigd? Het terughalen van profieldata kan namelijk alleen per individueel profiel met de Rollback functie. Eventueel kan je Copernica verzoeken een back-up van de database terug te zetten. Hieraan zijn meestal wel kosten verbonden. Neem contact op met de support afdeling voor meer informatie.
