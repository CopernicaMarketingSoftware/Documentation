Je kan vanuit een mail- of webdocument eenvoudig een link maken naar een
PDF document dat je hebt geupload in het onderdeel *PDF*. Hiervoor
gebruik je een speciale tag: **{linkpdf}**. The tag heeft twee
verplichte parameters: één om het template te specificeren, en één om
het document te specificeren dat je wilt linken.

Een PDF-bestand dat gelinkt wordt met deze functie, wordt automatisch
**gepersonaliseerd**.

`{linkpdf template='myTemplate' document='myDocument'} `

### **Extra optie **

Als er hyperlinkverwijzingen bestaan in het PDF document, dan worden
deze automatisch gefilterd op ongewenste HTML invoer. Om dit uit te
zetten, voeg je *escape=false* to aan de *linkpfd*-tag
