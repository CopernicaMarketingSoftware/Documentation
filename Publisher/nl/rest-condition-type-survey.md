# REST API: Condition type survey ()

Condities hebben onderling verschillende eigenschappen. Sommigen betreffen 
de periode waarin iets is gebeurd (datum eigenschappen), anderen informatie 
over een mailing (mailing eigenschappen) en weer anderen zijn specifiek voor 
het type condities (individuele eigenschappen). Alle eigenschappen moeten waar zijn 
om de conditie waar te maken en er hoeft maar een conditie waar te zijn 
om een regel waar te maken. 

Dit artikel gaat over de verschillende eigenschappen van de lastcontact conditie.

## Datum eigenschappen

De datum eigenschappen kunnen gebruikt worden om de selectie te limiteren 
binnen een gegeven tijdperiode. Alle variabelen hieronder moeten ingesteld 
worden in YYYY-MM-DD HH:MM:SS formaat.

* **before-time**: Matcht alleen profielen die het document ontvingen voor deze tijd.
* **after-time**: Matcht alleen profielen die het document ontvingen na deze tijd.
* **before-mutation**: De beforemutation (tijdverschil) voor de change conditie.
* **after-mutation**: De aftermutation (tijdverschil) voor de change conditie.

## Individuele eigenschappen

* **submitter**: Vereiste submitter van de enquête. Zie de required submitters tabel.
* **survey-name**: Naam van enquête om indien-status te vergelijken.

## Required submitters

De volgende tabel bevat de mogelijke waarde voor **required submitters**  
en hun omschrijvingen.

| Required submitter | Omschrijving                                       |
|--------------------|----------------------------------------------------|
| profile            | Enquête moet ingediend zijn door een profiel.      |
| subprofile         | Enquête moet ingediend zijn door een subprofiel.   |
| anything           | Enquête mag ingediend zijn door profiel/subprofiel |
| none               | Enquête mag niet ingediend zijn.                   |
| noprofile          | Enquête werd niet ingediend door een profiel.      |
| nosubprofile       | Enquête werd niet ingediend door een subprofiel.   |

## Voorbeeld

Stel dat je een belangrijke enquête hebt verstuurd, maar nog niet van alle 
profielen in je database een reactie hebt gekregen. Je kunt dan een selectie 
maken met de survey condition van de mensen die je een reminder wilt sturen. 
Je gebruikt hiervoor de volgende waarden:

* **survey-name**: <Enquête waarvoor je een reminder wilt versturen.>
* **submitter**: "none"

## Meer informatie

* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)
