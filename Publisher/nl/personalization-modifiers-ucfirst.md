# Personalizatie modifier: *ucfirst*

De *ucfirst* modifier kan gebruikt worden om het eerste karakter van een 
string om te zetten naar een hoofdletter. Het laat alle andere karakters 
intact. Als je echter **alleen** de eerste letter als hoofdletter wil hebben 
kun je het best eerst de [lower modifier](./personalization-modifiers-lower) 
toepassen.

Let op: Dit wordt alleen toegepast op alfabetische karakters. Wat er als 
alfabetisch wordt beschouwt hangt af van de locale. In standaardlocale "C" 
wordt bijvoorbeeld de umlaut-a (ä) genegeerd.

## Voorbeeld

We hebben de `$sentence`: "would Bob like an apple?". We gebruiken de modifier 
met de volgende code:

    {$sentence}
    {$sentence|ucfirst}
    {$sentence|lower|ucfirst}

De output ziet eruit als volgt:

    would Bob like an apple?
    Would Bob like an apple?
    Would bob like an apple?

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)
