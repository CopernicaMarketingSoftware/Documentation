# Personalizatie functie: capture

*Capture* kan gebruikt worden om de code tussen de begin tag en de eind 
tag op te slaan in een variabele. Het werkt vergelijkbaar met de [assign functie](./personalization-functions-assign), 
maar kan ook gebruikt worden op veel grotere stukken code of om arrays te maken, 
zonder dat dit er slordig uitziet. Het slaat de code op tijdens het verwerken 
van de template en kan verderop in de template weer gebruikt worden. 

De [rawcapture](./personalization-functions-rawcapture) 
functie is heel vergelijkbaar, maar gebruikt geen HTML escaping. Als je 
dit niet wilt gebruiken kun je *capture* overal vervangen door *rawcapture* 
in de volgende voorbeelden. Het wordt echter wel aangeraden om HTML 
escaping te gebruiken om te zorgen dat er geen schadelijke content 
wordt gebruikt.

*Capture* heeft vele functionaliteiten. Je kunt er informatie mee opslaan of 
toevoegen aan een bestaande variabele om een array te maken. We laten nu eerst 
wat parameters zien voor de functie en vervolgens hoe je ze gebruikt.

## Parameters

| Parameter naam | Omschrijving                             |
|----------------|------------------------------------------|
| name           | Naam van het blok                        |
| assign         | Variabele om het blok op te slaan        |
| append         | (Bestaande) variablee om aan te plakken  |

Geen van deze variabelen is verplicht. Als je geen naam meegeeft aan 
de functie kun wordt de naam op 'default' gezet. Je gebruikt dit blok 
vervolgens met `{$smarty.capture.default}`.

## Capture zonder variabele naam

Het volgende voorbeeld laat zien hoe je *capture* gebruikt zonder op 
te slaan in een variabele.

    {capture name="someText"}
        This is some text that I would like to use later in the template.
    {/capture}
    
De kortere versie ziet er als volgt uit en doet hetzelfde:

    {capture "someText"}
        This is some text that I would like to use later in the template.
    {/capture}
    
Om de code tussen de capture te gebruiken kun je de volgende code in je 
template plaatsen:

    {$smarty.capture.someText}
    
## Opslaan in een variabele

In het vorige voorbeeld halen we de inhoud van de capture op met 
`{$smarty.capture.someText}`, maar we kunnen dit ook opslaan in een 
variabele.

    {capture name="someText" assign="myText"}
        This is some text that I would like to use later in the template.
    {/capture}
    
De kortere versie ziet er als volgt uit:
    
    {capture "someText" assign="myText"}
        This is some text that I would like to use later in the template.
    {/capture}
    
Je kunt nu het blok aanroepen met `{$myText}`.
    
In dit voorbeeld is de tekst kort en had ook de [assign](./personalization-functions-assign), 
gebruikt kunnen worden, maar je kunt alles wat geen HTML is tussen deze 
tags plaatsen. Als je toch HTML wil gebruiken kun je {capture} vervangen 
door {rawcapture}.

## Capture gebruiken met arrays

Een meer geavanceerde techniek is om *capture* te gebruiken in combinatie
met een array, die je kunt printen met de [foreach functie](./personalization-functions-foreach). 
Dit kan ontzettend nuttig zijn als je informatie op meerdere plekken op wil 
slaan in een object.

Je kunt de onderstaande code gebruiken en aanpassen om een array te maken:

    {capture append="information"}{assign "name" "Bob"}{$age}, {\capture}
    {capture append="information"}{assign "age" "25"}{$age}, {\capture}
    {capture append="information"}{assign "location" "the Netherlands"}{$age}{\capture}
    
Dit lijkt misschien veel code, maar er worden slechts drie variabelen 
gedefinieerd en opgeslagen in *information*. Dit voorbeeld laat ook zien 
hoe je functies kunt combineren (zoals hier met assign). 

Laten we nu de inhoud van de array printen in de template.

    {foreach $information as $text}{$text}{/foreach}
    
Wat er nu gebeurt is dat we door alle waardes in *information* heen gaan, 
deze omzetten naar tekst en printen. Het resultaat ziet er als volgt uit:

`Bob, 25, the Netherlands`

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)
* [Assign functie](./personalization-functions-assign)
* [Foreach functie](./personalization-functions-foreach)
