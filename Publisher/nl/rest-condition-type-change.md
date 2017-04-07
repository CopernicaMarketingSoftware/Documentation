# REST API: Conditie type change (verandering)

Condities hebben onderling verschillende eigenschappen. Sommigen betreffen 
de periode waarin iets is gebeurd (datum eigenschappen), anderen informatie 
over een mailing (mailing eigenschappen) en weer anderen zijn specifiek voor 
het type condities (individuele eigenschappen). Alle eigenschappen moeten waar zijn 
om de conditie waar te maken en er hoeft maar een conditie waar te zijn 
om een regel waar te maken. 

Dit artikel gaat over de verschillende eigenschappen van de change conditie.

## Datum eigenschappen

De datum eigenschappen kunnen gebruikt worden om de selectie te limiteren 
binnen een gegeven tijdperiode. Alle variabelen hieronder moeten ingesteld 
worden in YYYY-MM-DD HH:MM:SS formaat.

* **before-time**: Matcht alleen profielen die het document ontvingen voor deze tijd.
* **after-time**: Matcht alleen profielen die het document ontvingen na deze tijd.
* **before-mutation**: De beforemutation (tijdverschil) voor de change conditie.
* **after-mutation**: De aftermutation (tijdverschil) voor de change conditie.

## Individuele eigenschappen

* **change-type**: Het change type van de changeconditie. Zie de [change types tabel](./rest-conditie-type-change#change-types)
* **field**: Database veld om wel/niet aan te passen
* **interest**: Database interesse om wel/niet aan te passen

## Change types

De volgende tabel bevat de mogelijke waarden voor het change type en 
hun beschrijvingen.

| Change type          | Omschrijving                      |
|----------------------|-----------------------------------|
| any                  | Elke verandering                  |
| none                 | Geen verandering                  |
| field                | Veld waarde veranderd             |
| nofield              | Veld waarde onveranderd           |
| new                  | Profiel werd aangemaakt           |
| notnew               | Profiel werd niet aangemaakt      |
| edit                 | Profiel werd aangepast            |
| noedit               | Profiel werd niet aangepast       |
| newsubprofile        | Nieuw subprofiel aangemaakt       |
| nonewsubprofile      | Geen nieuw subprofiel aangemaakt  |
| editsubprofile       | Subprofiel werd veranderd         |
| noeditsubprofile     | Subprofiel werd niet veranderd    |
| removesubprofile     | Subprofiel werd verwijderd        |
| noremovesubprofile   | Subprofiel werd niet verwijderd   |
| interest             | Interesses veranderd              |
| gotinterest          | Nieuwe interesse toegevoegd       |
| lostinterest         | Interesse verloren                |

## Voorbeeld

Emails kunnen op veel manieren gepersonalizeerd worden. Het is daarom 
belangrijk om informatie over de gebruiker bij te houden en slim te 
gebruiken. Met de change conditie kunnen we aanpassingen in de database 
gebruiken om selecties en miniselecties aan te passen. Je kunt dit bijvoorbeeld 
gebruiken om nieuwe gebruikers een mailtje te sturen om ze wegwijs te maken. 
Je kunt deze selectie maken met de change conditie door **change-type** op 
"new" te zetten.

## Meer informatie

* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)
