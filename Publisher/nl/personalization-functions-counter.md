# Personalizatie functies: counter

De *counter* tag kan gebruikt worden om tellingen te printen en verhoogt 
zichzelf elke keer dat hij wordt aangeroepen. Je kunt zoveel tellingen 
bijhouden als je wil en deze zijn uit elkaar te houden door ze een duidelijke 
naam te geven.

## Parameter

| Parameter naam | Omschrijving                 |
|---------------|-------------------------------|
| name          | Naam van de counter           |
| start         | Start nummer                  |
| skip          | Tel interval                  |
| direction     | Tel op/af                     |
| print         | Print/print geen waarde       |
| assign        | Variabele voor opslaan output |

In het standaard geval waar er geen informatie is gegeven begint de 
telling op 1, wordt er steeds 1 bijgeteld en wordt de huidige waarde 
van de teller geprint.

## Standaard voorbeeld

In het geval waar we geen enkele van de parameters specificeren kunnen 
we de volgende code gebruiken:

    {counter}<br />
    {counter}<br />
    {counter.default}<br />
    
en het volgende resultaat krijgen:

    1<br />
    2<br />
    3<br />
    
## Gepersonalizeerde teller

Kijk nu eens naar een wat ingewikkelder stuk code dat er als volgt uitziet:

    {counter name="the final countdown" start=6, skip=2 direction="down"}<br />
    {counter name="the final countdown"}<br />
    {counter name="the final countdown"}<br />
    {counter name="some less awesome counter" start="1" skip="2"}<br />
    {counter name="some less awesome counter"}<br />
    {counter name="the final countdown"}<br />
    
We hebben hier een teller die optelt en eentje die aftelt. De oneven getallen 
komen van de opteller en de even getallen van de afteller in de volgende output:

    6<br />
    4<br />
    2<br />
    1<br />
    3<br />
    0<br />

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)
