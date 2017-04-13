# Personalizatie modifier: *ucwords*

De *ucwords* modifier wordt gebruikt om de eerste letter van elk woord in 
de variabele om te zetten naar een hoofdletter. Het laat hierbij alle andere 
letters intact. Als je deze ook om wilt zetten naar kleine letters kun je 
beter eerst de [lower modifier](./personalization-modifiers-lower) gebruiken.

Let op: Dit wordt alleen toegepast op alfabetische karakters. Wat er als 
alfabetisch wordt beschouwt hangt af van de locale. In standaardlocale "C" 
wordt bijvoorbeeld de umlaut-a (ä) genegeerd.

## Voorbeeld

We hebben de `$sentence` "wOuld Bob like an apple?". We gebruiken de 
modifier in de code op de volgende manier:

    {$sentence}
    {$sentence|ucwords}
    {$sentence|lower|ucwords}

De output ziet eruit als volgt:

    wOuld Bob like an apple?
    WOuld Bob Like An Apple?
    Would Bob Like An Apple?

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)
