Het is mogelijk om bij profielen in een database bestanden op te slaan.
Deze bestanden kan je handmatig toevoegen, of ze kunnen door het profiel
zelf worden geupload via een webformulier. Vanuit e-mail- en
webdocumenten kan naar deze bestanden worden verwezen. Hiervoor zijn
twee functies in het leven geroepen: loadfile en linkfile.

Loadfile en linkfile verschillen niet wezenlijk van elkaar. Hieronder
zijn ze uitgebreid toegelicht.

Loadfile
--------

Met de *loadfile* functie laad je een HTML-bestand of een txt-bestand
uit de bestandenmap van een profiel in een gepersonaliseerd web- of
e-maildocument. Je kan met deze functie jouw relaties bijvoorbeeld een
eigen profielpagina laten opmaken, door hen een *.txt*-bestand te laten
uploaden met hierin CSS-regels.

De *loadfile*functie heeft twee opties: *file* en *fallback*

-   Met *file*verwijs je naar het bestand dat je in het e-mail- of
    webdocument wilt laden.
-   *Fallback*is de tekst of HTML-code die moet worden weergegeven als
    het bestand niet kan worden gevonden in het profiel. 

`{loadfile file='path/to/profile/file.html' fallback='if not found display this'}`

****Loadfile accepteert de volgende bestandstypen:**** *HTML(\*.html)*
en *TXT (\*.txt)* bestanden

Linkfile
--------

Gebruik de *linkfile* functie om vanuit een gepersonaliseerd e-mail- of
webdocument te linken naar een bestand van het profiel. Met behulp van
deze functie kan je profielen bijvoorbeeld een profielfoto laten
uploaden en tonen in een document (je moet de  *linkfile* functie dan
aanroepen binnen een HTML image tag).

`{linkfile file='path/to/profile/profilepicture.jpg' fallback='defaultimage.jpg'}`

****Linkfile accepteert de volgende bestandstypen:**** *zip, text/plain,
text/html, pdf, doc, Microsoft word 2007 files (docx), gif, png, jpeg,
jpg, jpe*

Geen fallback opgegeven
-----------------------

Als het opgegeven bestand niet bestaat bij het profiel, en er is geen
*fallback* opgegeven, dan zal alleen de bestandsnaam worden weergegeven.
Als de afbeeldingen- en bestandenmap die hoort bij het document of de
aan het template of document gekoppelde media library een bestand bevat
met dezelfde naam, dan zal dit bestand worden ingeladen.

**Let op:** zowel *loadfile*en *linkfile*kunnen alleen worden gebruikt
in templates en documenten, en dus niet in formulieren en enquetes.
