# Versiebeheer templates
Per februari 2020 maken we bij Copernica gebruik van versiebeheer voor Publisher e-mailing templates. Hiervoor is gekozen zodat we nieuwe functionaliteiten kunnen toevoegen zonder dat bestaande templates verkeerd kunnen gaan functioneren.

Onder `E-mailings → Template [naam] → Template-versiebeheer` is te zien of de template op de nieuwste versie staat. Als dit niet het geval is, kan je het template updaten naar de laatste versie. Alle templates aangemaakt voor februari 2020 maken gebruik van template versie 1. 

Het kan voorkomen dat je wilt uploaden naar de meest recente versie, maar dit niet mogelijk is door een fout in de broncode van de template. In de update pop-up wordt zichtbaar waar de fout zich bevindt.

Voorbeeld:
In je versie 1 template gebruik je de volgende broncode:
```
[image name="imageblok" style="border: 1px solid red;"]
```

De *style* parameter was in versie 1 nog niet mogelijk om te gebruiken, echter zien wij deze parameter geregeld terugkomen. Omdat de ‘style’ parameter in versie 3 is toegevoegd geven wij een waarschuwing bij het updaten. Het kan namelijk zomaar zijn dat hier style in staat wat tegenwoordig niet meer relevant is.

De foutmelding ziet er als volgt uit:  
```
Syntax error in template "eval:[image name="imageblok" style="border: 1..." on line 1 "[image name="imageblok" style="border: 1px solid red;"]" Unsupported parameter(s) in function 'image': style
```

In dit geval dien je de broncode template aan te passen naar:  
```
[image name="imageblok"]
```

Dit zal geen invloed hebben op de lay-out van je e-mailing, aangezien de *style* parameter niet ondersteund werd.

Zodra dit is aangepast. Is het mogelijk om de template te updaten naar de nieuwste versie.

## Versies

| Versienummer             | Nieuwe opties                                                         |
|--------------------------|------------------------------------------------------------------------------|
| 1                        | Standaard templates                                           |
| 2                        | Syntax check op foutieve parameters                                           |
| 3                        | Optie om 'style' parameter toe te voegen aan een image-tag                                           |
