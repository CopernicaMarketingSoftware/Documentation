# Personalisatie

SMTPeter biedt vele mogelijkheden om emails te personaliseren. Personalisatie
is belangrijk om een goede indruk te maken en de aandacht van de lezer vast 
te houden. Hieronder wordt de syntax uitgelegd aan de hand van een aantal 
voorbeelden, zodat je direct een beeld hebt bij de mogelijkheden van deze 
toepassing.


## Variabelen 

Laten we starten met het uitleggen van de variabelen. Een variabel ziet er 
als volgt uit: `{$` naam van de variabel `}`
Er zijn een aantal variablen die we veelvuldig voorbij zien komen, bijvoorbeeld
"{$firstname}", "{$age}" en "{$city}".
In het algemeen moet een variabel aan de volgende criteria voldoen:

* beginnen met een $ teken,
* is omringd met accolades,
* kan alphanumerieke karakters bevatten. Mag niet met een cijfer beginnen,
* kan een verbindingsstreepje (-) en/of lage streepje (_) bevatten,
* kan niet beginnen met verbindingsstreepje of lagestreepje,
* is hoofdlettergevoelig, wat betekent dat {$NAME} anders is dan {$name}.

De volgende tabel geeft alle variabel notaties weer:

| Syntax     | Betekenis                                               |  
| ---------- | ------------------------------------------------------- |
| {$foo}     | Weergeeft een simpele variabel (geen array/object).     |
| {$foo[4]}  | Weergeeft het 5de element van een 'zero-indexed array'. |
| {$foo.bar} | Weergeeft de "bar" value van een object.                |

Met deze notaties kun je combinaties maken. Voorbeelden van combinaties 
zijn:

| Syntax            | Betekenis                                                                                |
| ----------------- | ---------------------------------------------------------------------------------------- |
| {$foo.bar.baz}    | Weergeeft de value van de "baz" key binnen de array "bar" wat behoort tot $foo.          |
| {$foo[4].baz}     | Weergeeft de value van de "baz" key binnen het 5de element van $foo.                     |
| {$foo.bar.baz[4]} | Weergeeft het 5de element van "baz", die in "bar" zit en onderdeel is van $foo           |

Het is mogelijk om met een index nummer toegang te krijgen tot elementen in 
een array, als variabele een object is. Let erop dat je ook hier start vanaf
0. 


## Modificeer variabelen

Je kunt de inhoud van je variabelen veranderen door 'modifiers' toe te voegen.
Zo is het bijvoorbeeld mogelijk om alle content te weergeven in hoofdletters of
de lengte te berekenen van een string of een 'hash' som. Een volledige lijst
van alle 'modifiers' en corresponderende functionaliteit is [hier](personalization-modifiers) 
te vinden.


## Simpele berekeningen 

Variabelen die een numerieke waarde bevatten kunnen worden gebruikt om simpele
berekeningen te doen. Net zoals de 'normale variabelen' moeten alle berekeningen
binnen de accolades worden uitgevoerd. Bijvoorbeeld:
```text
{$var + 10}
```
