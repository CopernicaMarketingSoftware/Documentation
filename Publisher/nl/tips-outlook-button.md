# Tips voor een juiste weergave van knoppen in Outlook

Wanneer je een opgemaakte e-mail ontvangt in Microsoft Outlook, kan het voorkomen dat de styling van je knoppen (buttons) niet juist wordt weergegeven. Dit komt doordat Microsoft Outlook geen ondersteuning heeft voor [CSS media queries](https://www.w3schools.com/css/css_rwd_mediaqueries.asp).

In dit artikel geven we een aantal tips om je knoppen juist weer te geven in Microsoft Outlook.

*Let op: dit artikel is voor de geavanceerde gebruiker van drag-and-drop-templates. Je hebt HTML-/CSS-kennis nodig.*

## Tip 1 - Gebruik de optie 'Ondersteuning voor Outlook'
De optie 'Ondersteuning voor Outlook' zorgt voor de meest nauwkeurige weergave van je knoppen in Outlook.

Hoe zet ik 'Ondersteuning voor Outlook' aan?
- Open je template in de [e-mail-editor](https://ms.copernica.com/#/design)
- Kies voor de optie 'Uiterlijk -> Knoppen'
- Zet de optie 'Ondersteuning voor Outlook' aan

![Afbeelding](../images/ondersteuninginoutlook.png)

## TIP 2 - Houd de grootte van de knop binnen de standaardafmetingen
Het wordt aanbevolen om de knopgrootte beperkt te houden tot 600px bij 200px. Mocht de tekst toch buiten de knop vallen, kan je met de optie 'interne padding' de tekst centraal in de knop te krijgen.

![Afbeelding](../images/paddingbutton.png)

## Tip 3 - Tekstgrootte aanpassen binnen de MSO-tags
Om styling specifiek voor Outlook mee te geven, gebruik je MSO-tags (Microsoft Office). Deze code wordt genegeerd door andere e-mailclients. Een MSO-code ziet er als volgt uit:

```
 <!--[if mso]><a href="https://copernica.com" target="_blank" hidden>
	<v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" esdevVmlButton href="https://copernica.com" 
                style="height:41px; v-text-anchor:middle; width:163px" arcsize="50%" stroke="f"  fillcolor="#eb6c10">
		            <w:anchorlock></w:anchorlock>
		            <center style='color:#ffffff; font-family:Exo, Helvetica, Arial, sans-serif; font-size:15px; font-weight:400; line-height:15px;  mso-text-raise:1px'>Knop</center>
	</v:roundrect></a>
<![endif]-->
```

In onderstaande afbeelding wordt aangegeven waar je de tekst (font-size) en regelgrootte (line-heights) kunt verkleinen.

![Afbeelding](../images/paddingbutton2.png)

## Tip 4 - Gebruik een webveilig lettertype
Om de tekst in een knop goed zichtbaar te krijgen is het aan te raden om gebruik te maken van een [webveilig lettertype](https://www.w3schools.com/cssref/css_websafe_fonts.php)

Gebruik altijd een webveilig fallback lettertype toe als je gebruik maakt van een eigen lettertype. Mocht je eigen lettertype niet beschikbaar zijn in de ontvangende e-mailclient, maakt deze automatisch gebruik van het door jou ingestelde back-up lettertype.

Dit ziet er zo uit in je CSS:

```
<!--[if mso]>
<style>
    span, td, table, div {
      font-family: Arial, serif !important;
    }
</style>
 
<![endif]-->
```

*Let op: in een aantal versies van Outlook wordt het lettertype standaard ingesteld op Times New Roman, ook als er een fallback is ingesteld.*

## Tip 5 - Test je e-mail in verschillende e-mailclients
Om er zeker van te zijn dat je knoppen juist worden weergegeven is het aan te raden om je e-mail vooraf te testen in verschillende e-mailclients.
