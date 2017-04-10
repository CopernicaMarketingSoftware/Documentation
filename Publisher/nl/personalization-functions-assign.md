# Personalizatie functies: assign

De {assign} functie kan gebruikt worden om een waarde toe te kennen aan 
een variabele. Je kunt deze dan later weer opvragen. Er zijn twee manieren 
om dit te doen:

`{assign var="name" value="Bob"}`
`{assign "name" "Bob"}`

De tweede regel is slechts een kortere manier om hetzelfde op te schrijven, 
beide functies doen hetzelfde.

Nu dat we de variabele **name** hebben toegekend kunnen we deze gaan 
gebruiken om een email te personalizeren!

    Hallo {$name},
    
    Dit is een email speciaal voor jou.
    
Als je grotere blokken tekst wilt opslaan in een variabele, of zelfs hele 
elementen is het verstandiger de [capture functie](./personalization-functions-capture) 
of de [rawcapture functie](./personalization-functions) te gebruiken, 
omdat deze meer geschikt zijn voor dit soort doeleindes.
     
## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)
* [Capture functie](./personalization-functions-capture)
* [Rawcapture functie](./personalization-functions-rawcapture)
