# Versiebeheer templates
Per februari 2020 maken we bij Copernica gebruik van versiebeheer voor Publisher e-mailing templates. Hiervoor is gekozen zodat we nieuwe functionaliteiten kunnen toevoegen zonder dat bestaande templates verkeerd kunnen gaan functioneren.

Onder `E-mailings → Template [naam] → Template-versiebeheer` is te zien of de template op de nieuwste versie staat. Als dit niet het geval is, kan je de template upgraden naar de laatste versie. Alle templates aangemaakt voor februari 2020 maken gebruik van versie 1. 

Het kan voorkomen dat je wilt upgraden naar de meest recente versie, maar dit niet mogelijk blijkt te zijn door een fout in de broncode van de template. In de upgrade pop-up wordt zichtbaar waar de fout zich bevindt.

Voorbeeld:
In je template (versie 1) gebruik je de volgende broncode:
```
[image name="imageblok" style="border: 1px solid red;"]
```

De *style* parameter was in versie 1 nog niet mogelijk om te gebruiken, echter zien wij deze parameter geregeld terugkomen. Omdat de ‘style’ parameter in versie 3 is toegevoegd geven wij een waarschuwing bij het upgraden. Het kan namelijk zomaar zijn dat hier style in staat wat tegenwoordig niet meer relevant is.

De foutmelding ziet er als volgt uit:  
```
Syntax error in template "eval:[image name="imageblok" style="border: 1..." on line 1 "[image name="imageblok" style="border: 1px solid red;"]" Unsupported parameter(s) in function 'image': style
```

In dit geval dien je de broncode template aan te passen naar:  
```
[image name="imageblok"]
```

Dit zal geen invloed hebben op de lay-out van je e-mailing, aangezien de *style* parameter nog niet ondersteund werd.

Zodra dit is aangepast, is het mogelijk om de template te upgraden naar de nieuwste versie.

## Versies

| Versienummer             | Nieuwe opties                                                                |
|--------------------------|------------------------------------------------------------------------------|
| 1                        | Standaard templates                                                          |
| 2                        | Syntax check op foutieve parameters                                          |
| 3                        | Optie om 'style' parameter toe te voegen aan een image-tag                   |
