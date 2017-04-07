# REST API: Conditie type doublefield (dubbelveld)

Condities hebben onderling verschillende eigenschappen. Sommigen betreffen 
de periode waarin iets is gebeurd (datum eigenschappen), anderen informatie 
over een mailing (mailing eigenschappen) en weer anderen zijn specifiek voor 
het type condities (individuele eigenschappen). Alle eigenschappen moeten waar zijn 
om de conditie waar te maken en er hoeft maar een conditie waar te zijn 
om een regel waar te maken. 

Dit artikel gaat over de verschillende eigenschappen van de doublefield conditie.

## Individuele eigenschappen
* **match-mode**: Match modus van de doublefield conditie. Zie de [match mode tabel](./rest-conditie-type-doublefield#match-modes)
* **fields**: De combinatie van velden die gecheckt moet worden.

## Match Modes

De volgende tabel bevat de mogelijke waarden voor de match mode en hun
omschrijvingen.

| Match mode                   | Omschrijving                                        |
|------------------------------|-----------------------------------------------------|
| match_unique_profiles        | Match alle unieke profielen                         |
| match_non_unique_profiles    | Match alle niet unieke profielen                    |
| match_repeated_profiles      | Match alle profielen die eerder voorkwamen          |
| match_non_repeated_profiles  | Match alle profielen die niet eerder voorkwamen     |
| match_last_profiles          | Match alle profielen die later niet voorkomen       |
| match_toberepeated_profiles  | Match alle profielen die ook voorkomen een hoger ID |

## Meer informatie
* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)
* [Conditie type veld](rest-condition-type-field)
