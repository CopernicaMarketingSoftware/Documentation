# Personalizatie modifier: *Capitalize*

De *capitalize* modifier kan gebruikt worden om letters naar hoofdletters om te zetten.
Deze is daarom heel geschikt voor titels of namen.

## Parameters

De *capitalize* modifier heeft twee parameters. De eerste bepaalt of 
woorden met getallen erin ook een hoofdletter moeten krijgen. De tweede 
bepaalt of de andere letters binnen het woord omgezet moeten worden naar 
kleine letters. De standaardwaarde voor beide is "false".

## Voorbeeld

We kunnen nu de modifier gebruiken om namen te formatteren. Laten we zeggen 
dat `$naam` op het moment gedefinieerd is als "john DOE x2". De volgende 
voorbeelden laten zien hoe je *capitalize* op verschillende manieren kan 
gebruiken.

    {$naam}
    {$naam|capitalize}
    {$naam|capitalize:true}
    {$naam|capitalize:false:true}
    {$naam|capitalize:true:true}

De output ziet er als volgt uit:

    john DOE x2
    John DOE x2
    John DOE X2
    John Doe x2
    John Doe X2

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)
* [upper (hoofdletters) modifier](./personalization-modifiers-upper)
* [lower (kleine letters) modifier](./personalization-modifiers-lower)

Deze modifier staat ook in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifiers.tpl#language.modifier.capitalize).
