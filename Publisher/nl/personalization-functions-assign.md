# Personalizatie functions: assign

De {assign} functie kan gebruikt worden om een waarde in een variabele 
op te slaan. Je kunt deze dan later gebruiken. Er zijn twee manieren om 
een variabele in te stellen:

`{assign var="name" value="Bob"}`
`{assign "name" "Bob"}`

Deze commando's gedragen zich hetzelfde, omdat het tweede voorbeeld slechts 
een kortere manier is om hetzelfde te schrijven.

Nu dat we een naam toegekend hebben aan onze ontvanger kunnen we deze 
gebruiken om een email te personalizeren:

    Hallo {$name},
    
    Deze email schreven we speciaal voor jou!
    
Als je grotere blokken tekst of andere elementen wil gebruiken is het handiger 
om de [capture](./personalization-functions-capture) of de
[rawcapture](./personalization-functions) functie te gebruiken, omdat 
deze hier beter voor geschikt zijn.
     
## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)
* [Capture functie](./personalization-functions-capture)
* [Rawcapture functie](./personalization-functions-rawcapture)
