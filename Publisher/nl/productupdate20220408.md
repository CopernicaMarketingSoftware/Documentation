# Productupdate 08-04-2022

# Verbeterde resultatenmodule
We hebben de verzonden en ingeroosterde mailings van Marketing Suite en Publisher samengevoegd in één [overzicht](https://ms.copernica.com/#/results/). Hierdoor heb je direct inzicht in al je campagnes.  

Naast het samenvoegen van de resultaten hebben we ook de statistieken van Marketing Suite mailings geoptimaliseerd. Hierdoor zie je nu meer informatie over de verzonden mailing, zoals bijvoorbeeld de dominante resultaten en de impressies per uur. Ook is het exporteren van bestemmingen, impressies of fouten eenvoudiger geworden.

# Versiegeschiedenis binnen drag-and-drop-templates
Binnen drag-and-drop-templates hebben we versiegeschiedenis toegevoegd. In de e-mail-editor zie je in het instellingen-paneel het tijdstip van de laatste wijziging aan het template. Als je op het tijdstip klikt, vind je de versiegeschiedenis van dit template.

Door deze optie heb je de mogelijkheid om terug te gaan naar een eerdere versie van je template. Dit kan vooral handig zijn wanneer je per ongeluk bepaalde elementen hebt aangepast of verwijderd. Naast het tijdstip van de laatste wijziging, zie je ook door welke gebruiker deze wijziging is gedaan.

# Fetch-tag in drag-and-drop-templates
Het is mogelijk gemaakt om in een drag-and-drop-template gebruik te maken van de [fetch](https://www.copernica.com/nl/documentation/personalization-functions-fetch)-tag. Hiermee kun je externe content inladen in een blok of de broncode van je template.

Deze optie wordt voornamelijk gebruik om kortingscodes vanuit een extern systeem in te laden in je nieuwsbrief.

## Marketing Suite
- We hebben het mogelijk gemaakt om direct een e-mail naar een profiel te versturen. Je kunt deze optie gebruiken door in het profiel te kiezen voor 'E-mail versturen'.
- Het gebruik van logical operators in Smarty is nu mogelijk in drag-and-drop-templates. Hiermee kun je bijvoorbeeld een if-statement maken waarbij er wordt gekeken of een waarde groter is dan een bepaald getal: `{if $waarde > 1}Toon A{else}Toon B{/if}`
- We hebben de mogelijkheid toegevoegd om een opvolgactie op te starten op basis van een verzonden e-mail.
- Bij het uploaden van een afbeelding in een afbeeldingsblok van een drag-and-drop-template worden nu ook GIF-bestanden toegestaan.
- Het is mogelijk gemaakt om een PDF vanuit de [PDF-module](https://ms.copernica.com/#/menu/publisher/pdf) op te nemen als link in je drag-and-drop-template met de [linkpdf](https://www.copernica.com/nl/documentation/personalization-functions-linkpdf)-tag.
- Bij het gebruik van foutieve Smarty binnen een HTML-template tonen we nu tijdens het opslaan wat er fout is in je broncode.
- Als accountbeheerder is het mogelijk gemaakt om API-tokens aan te maken.
- Bugfix: de uitschrijfheader wordt weer getoond in ontvangende e-mailclients.
- Bugfix: de zoekbalk de [profielen-module](https://ms.copernica.com/#/profiles) is geoptimaliseerd waardoor je sneller resultaten krijgt.
- Bugfix: het verwijderen van een opvolgactie binnen een collectie is weer mogelijk.
- Bugfix: het is weer mogelijk gemaakt om een redirect toe te voegen aan de [unsubscribe](https://www.copernica.com/nl/documentation/personalization-functions-unsubscribe)-tag binnen drag-and-drop-templates.
- Bugfix: we hebben een probleem verholpen waardoor een PDF-bestand in de bijlage van een testmail niet meer leeg wordt weergegeven.
- Bugfix: bij een meerkeuzeveld in de database wordt de waarde '0' nu als '0' getoond in plaats van een lege waarde.
- Bugfix: als je gebruik hebt gemaakt van geavanceerde JavaScript binnen een blok van een HTML-document is dit nu direct zichtbaar bij het openen van het blok.
- Bugfix: afbeeldingen ingeladen vanuit een mediabibliotheek zijn nu zichtbaar in je HTML-template.
- Bugfix: In de JavaScript tester wordt nu 'false' teruggegeven in plaats van 'unidentified' bij het gebruik van `return false;`.

## Publisher
- In de [fetch](https://www.copernica.com/nl/documentation/personalization-functions-fetch)-tag hebben we de optie om application/json als conent-type te gebruiken toegevoegd.
Bugfix: bij het gebruik van Publisher in de Marketing Suite-interface is het nu mogelijk om de taal van de interface te wijzigen.

## REST API
- Bugfix: het ophalen van databases en collecties binnen je account is geoptimaliseerd.

## Documentatie
- In [dit artikel](https://www.copernica.com/nl/documentation/email-editor-feedblock) geven we je meer informatie over het gebruik van het feedblok in de drag-and-drop-editor.
- We hebben een [artikel](https://www.copernica.com/nl/documentation/email-editor-followups-advanced-javascript) toegevoegd met meer informatie over het gebruik van geavanceerde JavaScript condities binnen Marketing Suite opvolgacties.

