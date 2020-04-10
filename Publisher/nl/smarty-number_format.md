# Smarty number_format
In Smarty is het mogelijk om een nummerieke waarde om te zetten in een standaad formaat.  
De meest gebruikte optie is:
```
{$variabele|number_format:2:',':'.'}
```
Zoals je hierboven ziet heeft `number_format` een aantal parameters:
| Parameter                                                         | Omschrijving                                                         |
|-----------------------------------------------------------------------|------------------------------------------------------------------------------|
| 2                        | het aantal getoonde decimalen                                              |
| ,                        | de waarde voor de decimalen                                              |
| .                       | scheidingsteken voor duizendtallen                                               |

Hieronder volgen enkele voorbeelden:
```
{99.95|number_format:2:',':'.'}
{99.95|number_format:2:'.':','}
{99.125|number_format:3:',':'.'}
{99.125|number_format:2:',':'.'}
{19999.95|number_format:2:',':'.'}
{19999.95|number_format:2:',':''}
``` 
Uitkomst:
``` 
99,95
99.95
99,125
99,13
19.999,95
19999,95
```

Mocht de waarde in een profielveld staan opgeslagen is het als volgt mogelijk om aan te roepen:
```
{$profile.VELDNAAM}|number_format:2:',':'.'}
```
