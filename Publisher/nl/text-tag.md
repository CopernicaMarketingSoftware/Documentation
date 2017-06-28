# Text tags

Als je zelf een template maakt in HTML kun je in de broncode van de template [text] 
tags opnemen. De tag is bedoeld om de structuur van het document aan te 
geven. Waar tags geplaatst zijn kun je later tekst invoeren tijdens het 
aanmaken van het document zelf.

![](../images/textblockcode.png)

Zoals met alle tags die je in een template kunt plaatsen, is het verstandig 
om de tag te voorzien van een *name* attribuut. Als je dan later de volgorde
van de tags verandert, of als je later een nieuwe tag toevoegt aan de template,
dan blijven bestaande documenten intact. Door een *name* attribuut te gebruiken,
kunnen op documentniveau de ingevoerde teksten herleid worden tot het juiste
blok in de template, zelfs als je later de template aanpast en de volgorde van 
de blokken verandert.

`[text name="example"]`

Zorg er voor dat je voor elke text tag een andere naam gebruikt. 

## De editor

Op documentniveau kan een tekst worden geplaatst op de plek van de [text] tag. 
De meeste gebruikers gebruiken de handige *what-you-see-is-what-you-get* editor, 
waarmee het makkelijk is om de ingevoerde tekst op te maken en
van (eenvoudige) opmaak te voorzien. Deze editor is vooral geschikt voor 
mensen die simpele behoeften hebben qua opmaak of weinig HTML kennis hebben.

Indien gewenst kan de marketeer als hij of zij een tekst bewerkt de handige editor 
uitschakelen en overstappen op een ruwe HTML editor. Hij of zij moet dan zelf 
de HTML code invoeren die op de plek van de [text] tag wordt geplaatst. 
Als je van tevoren weet dat de maker van het document dit liever wil 
kun je dat als volgt aangeven in de text tag:

`[text name="example" editor="poor"]`

We hebben de prettig te gebruiken WYSIWIG editor de "rich" editor genoemd.
Deze editor heeft immers allerlei tools en knopjes die het leven makkelijker 
maken en verrijken. De HTML editor, de tegenovergestelde, gebruikt de 
naam "poor" editor.

## Inleidende en afsluitende HTML code

Je kunt ook een attribuut *begin* en *end* aan de [text] tag toevoegen. 
De *start* en *end* attributen worden respectievelijk aan het begin en 
einde van het tekstblok geplaatst, maar alleen als hier ook content in 
staat.

`[text name="example" begin="<b>" end="</b>"]`

In dit voorbeeld wordt bijvoorbeeld alles dikgedrukt, maar je kan bijvoorbeeld 
ook alle tekst schuingedrukt maken of tussen quotes zetten.

## Meer informatie

* [Templates](./templates)
* [Publisher templates](./publisher-templates)
* [Loop tag](./loop-tag)
* [Image tag](./image-tag)
