# Datum variabele
In Smarty is het mogelijk om de huidige datum en/of tijdstip op te vragen middels de {$smarty.now} tag.
Smarty.now heeft `date_format` als extra parameter waardoor je aan kunt geven hoe de output (de datum) eruit moet zien.

**De meest gebruikte opties zijn:**  
| Optie                                                         | Omschrijving                                                         |
|-----------------------------------------------------------------------|------------------------------------------------------------------------------|
| %Y                        | jaar als een decimaal getal inclusief de eeuw                                             |
| %y                        | jaar als een decimaal getal zonder een eeuw (00 tot 99)                                              |
| %m                        | maand als een decimaal getal (01 tot 12)                                               |
| %d                        | dag van de maand als decimaal getal (01 tot 31)                                             |
| %H                        | uur van de dag als decimaal getal (00 tot 23)                                              |
| %M                        | minuut als decimaal getal (00 tot 59)                                            |
| %S                        | seconde als decimaal getal (00 tot 59)                                           |


Hieronder volgen enkele voorbeelden:
```
{$smarty.now|date_format:"%Y-%m-%d"}
{$smarty.now|date_format:"%Y-%m-%d %H:%M:%S"}
{$smarty.now|date_format:"%d-%m-%y"}
{$smarty.now|date_format:"%d-%m-%Y"}
{$smarty.now|date_format:"%d-%m-%Y %H:%M:%S"}
``` 
Uitkomst:
``` 
2020-01-18
2020-01-18 00:00:00
18-01-20
18-01-2020
18-01-2020 00:00:00
```

**Geavanceerde opties**  
*Tijd optellen/aftrekken bij huidige datum*  
Wanneer je een bepaalde tijd bij de huidige datum wilt optellen kan je gebruik maken van het volgende formaat: `{"+3 days"|date_format:'%Y-%m-%d'}`. In plaats van 'days' zijn ook de volgende opties mogelijk: years, months, hours, minutes, seconds. Het is ook mogelijk om terug te rekenen. Hiervoor gebruik je het minteken.  

*Tijd optellen/aftrekken bij variabele datum*  
Als je een veld in je database hebt staan waar je een tijd bij op wilt tellen of vanaf wilt trekken is dit mogelijk door `{"$fieldname +3 days"|date_format:'%Y-%m-%d'}`.




Meer informatie over de Smarty date functie vind je [hier](https://www.smarty.net/docs/en/language.modifier.date.format.tpl).
