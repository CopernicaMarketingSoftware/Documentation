# Text tags

Als je zelf een template maakt, kun je in de broncode van de template [text] 
tags opnemen. Op de plaats van de [text] tag in de template kan op 
documentniveau later tekst worden ingevoerd.

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
Normaal gesproken wordt hier een handige *what-you-see-is-what-you-get* editor 
voor gebruikt, waarmee het makkelijk is om de ingevoerde tekst op te maken en
van (eenvoudige) opmaak te voorzien. Deze editor is voor de meeste mensen die 
op documentniveau werken, vaak marketeers, het prettigst in het gebruik.

Indien gewenst kan de marketeer als hij of zij een tekst bewerkt de handige editor 
uitschakelen en overstappen op een ruwe HTML editor. Hij of zij moet dan zelf 
de HTML code invoeren die op de plek van de [text] tag wordt geplaatst.

Als je bij het maken van een template al van te voren weet dat een gebruiker
de voorkeur geeft aan deze HTML editor in plaats van de WYSIWYG editor, dan
kun je dat in de template aangeven.

`[text name="example" editor="poor"]`

We hebben de prettig te gebruiken WYSIWIG editor de "rich" editor genoemd.
Deze editor heeft immers allerlei tools en knopjes die het leven makkelijker 
maken en verrijken. Voor de andere editor, waarmee je zelf de pure HTML code 
moet invoeren, gebruiken we het tegenovergestelde als naam: "poor".


## Inleidende en afsluitende HTML code

Je kunt ook een attribuut *begin* en *end* aan de [text] tag toevoegen.

`[text name="example" begin="<b>" end="</b>"]`

Als op documentniveau het tekstblok leeg blijft dan wordt de waarde van de
*begin* en *end* tags genegereerd. Er komen dan dus ook geen &lt;b&gt; en
&lt;/b&gt; in het uiteindelijke document. Maar als er wel een tekst wordt
ingevoerd, dan wordt de waardes van deze attributen automatisch rond de
ingevoerde tekst geplaatst.

