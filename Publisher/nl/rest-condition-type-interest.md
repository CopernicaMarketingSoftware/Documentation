# REST API: Conditie type interest (interesse)

Condities hebben onderling verschillende eigenschappen. Sommigen betreffen 
de periode waarin iets is gebeurd (datum eigenschappen), anderen informatie 
over een mailing (mailing eigenschappen) en weer anderen zijn specifiek voor 
het type condities (individuele eigenschappen). Alle eigenschappen moeten waar zijn 
om de conditie waar te maken en er hoeft maar een conditie waar te zijn 
om een regel waar te maken. 

Dit artikel gaat over de verschillende eigenschappen van de interest conditie.

## Individuele eigenschappen

* **match-mode**: Matchmode van de interest conditie. Zie de [match-mode tabel](rest-conditie-type-interest#match-modes)
* **interest**: Interesse voor de conditie. Dit geeft alleen een valide waarde
terug als de **match-mode** staat op "match_profiles_with_interest" of "match_profiles_without_interest".
* **interest-group**: Interessegroep van de conditie. Dit geeft alleen een valide waarde
terug als de **match-mode** staat op "match_profiles_with_interestgroup" of "match_profiles_without_interestgroup".

## Match Modes

De volgende tabel bevat de mogelijke waarden voor de match mode en hun
omschrijvingen.

| Match mode                           | Omschrijving                                  |
|--------------------------------------|-----------------------------------------------|
|match_profiles_with_interest          | Match alleen profielen met interesse          |
|match_profiles_without_interest       | Match alleen profielen zonder deze interesse  |
|match_profiles_with_interest_group    | Match alleen profielen met interesse groep    |
|match_profiles_without_interestgroup  | Match alleen profielen zonder interesse groep |

## Voorbeeld

Laten we zeggen dat we een sportwinkel hebben en graag een mail willen 
sturen naar de mensen die tennis spelen. Laten we ook aannemen dat we 
interesses hebben in onze database waar "tennis" tussen staat voor mensen 
die van tennis houden. We kunnen nu heel effectief marketen door een 
selectie te maken om een email met tennisproducten naar te sturen. We kunnen 
deze selectie maken met de interest condition door de volgende waarden te 
gebruiken:

* **interest**: "tennis"
* **match-mode**: "match_profiles_with_interest"

## Meer informatie

* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)
* [Conditie type veld](rest-condition-type-field)
