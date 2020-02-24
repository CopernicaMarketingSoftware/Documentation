# Versiebeheer templates
Per februari 2020 maken we bij Copernica gebruik van versiebeheer voor Publisher e-mailing templates. Op deze manier kunnen er nieuwe functionaliteiten worden toegevoegd, zonder dat dat impact heeft op de werking van bestaande templates.

Onder **E-mailings → Template [naam] → Template-versiebeheer** is inzichtelijk of je template up to date is. Als dit niet het geval is, kan je de template upgraden naar de laatste versie. Alle templates aangemaakt voor februari 2020 maken gebruik van versie 1. 

Wanneer er in de bron van de template code is opgenomen die fout is, of implicaties heeft in de nieuwe versie, wordt er bij het upgraden een foutmelding gegeven. In deze pop-up is te zien waar de fout zich bevindt.

Voorbeeld:
In je template (versie 1) gebruik je de volgende broncode:
```
[image name="imageblok" style="border: 1px solid red;"]
```

In versie 1 was het nog niet mogelijk om de style parameter te gebruiken in afbeelding tags. Deze zien we echter al wel veel voorkomen. Om te voorkomen dat er styling wordt toegepast die niet meer relevant is, wordt de waarschuwing gegeven.

De foutmelding ziet er als volgt uit:  
```
Syntax error in template "eval:[image name="imageblok" style="border: 1..." on line 1 
"[image name="imageblok" style="border: 1px solid red;"]" Unsupported parameter(s) 
in function 'image': style
```

In dit geval dien je de broncode template aan te passen naar:  
```
[image name="imageblok"]
```

Deze wijziging heeft geen verdere invloed op de lay-out van je document, aangezien de style parameter nog niet ondersteund werd in de oudere versie.

Zodra dit is aangepast, is het mogelijk om de template te upgraden naar de nieuwste versie.

## Versies

| Versienummer             | Nieuwe opties                                                                |
|--------------------------|------------------------------------------------------------------------------|
| 1                        | Standaard templates                                                          |
| 2                        | Syntax check op foutieve parameters                                          |
| 3                        | Optie om 'style' parameter toe te voegen aan een image-tag                   |
