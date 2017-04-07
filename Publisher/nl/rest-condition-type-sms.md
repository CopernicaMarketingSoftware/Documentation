# REST API: Conditie type sms

Condities hebben onderling verschillende eigenschappen. Sommigen betreffen 
de periode waarin iets is gebeurd (datum eigenschappen), anderen informatie 
over een mailing (mailing eigenschappen) en weer anderen zijn specifiek voor 
het type condities (individuele eigenschappen). De instellingen van deze 
eigenschappen vormen samen de conditie. Alle eigenschappen moeten waar zijn 
om de conditie waar te maken en er hoeft maar een conditie waar te zijn 
om een regel waar te maken. 

Dit artikel gaat over de verschillende eigenschappen van de sms conditie.

## Datum eigenschappen
* **before-time**: Matcht alleen profielen die het document ontvingen voor deze tijd.
* **after-time**: Matcht alleen profielen die het document ontvingen na deze tijd.
* **before-mutation**: Datemutatie (tijdverschil) voor mails die te vroeg verstuurd zijn.
* **after-mutation**: Datemutatie (tijdverschil) voor mails die te laat verstuurd zijn.

## Mailing eigenschappen
* **match-mode**: Matchmode van de mailing conditie. Zie [matchmode tabel](rest-conditie-type-mailing#match-modes)
* **required-destination**: Bestemming van de mailing. Mogelijke waarden: 
"profile", "subprofile", anything" als beide mag.
* **document**: Naam van het document gebruikt voor matchmode. (Alleen bij
"match_profiles_that_received_document", "match_profiles_that_received_not_document")
* **template**: Naam van de template van de conditie.
* **number**: Het aantal berichten dat door de ontvanger moeten zijn ontvangen.
* **operator**: De operator om het aantal berichten van de ontvanger met de waarde 
van **number** te vergelijken. Ondersteunde operatoren:
= (gelijk), \!= (niet gelijk), <\> (tussen), < (minder dan), \> (meer dan).

## Match modes

| Match modus                               | Omschrijving                                                           |
|-------------------------------------------|------------------------------------------------------------------------|
| match_profiles_that_received_something    | Match alle profielen die iets ontvangen hebben.                        |
| match_profiles_that_received_document     | Match alle profielen die een specifiek document ontvangen hebben.      |
| match_profiles_that_received_nothing      | Match alle profielen die niets ontvangen hebben.                       |
| match_profiles_that_received_not_document | Match alle profielen die niet een specifiek document ontvangen hebben. |

## Meer informatie
* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)
* [Conditie type email](rest-condition-type-email)
* [Conditie type fax](rest-condition-type-fax)
