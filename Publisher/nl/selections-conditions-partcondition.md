# Selections: Sort/select conditie

De sort/select conditie kan gebruikt worden om profielen te selecteren 
uit een gesorteerde versie van je database. Je kunt ervoor kiezen te 
sorteren op een of meerdere velden, een offset instellen en het aantal 
profielen om te selecteren instellen.

## Variabelen

### Sorteervelden

De sort/select conditie specificeert ten eerste hoe je je database 
sorteerd. Je kunt een enkel veld gebruiken voor sorteren, bijvoorbeeld 
het e-mailadres, wat goed werkt als je unieke waarden in dit veld hebt. 
Als je echter op achternaam wil sorteren kun je gemakkelijk dubbele 
waarden tegenkomen. Je kunt specificeren hoe je omgaat met deze 
dubbele waarden door meer velden toe te voegen, zoals bijvoorbeeld de 
voornaam. Je kunt zoveel velden toevoegen als je nodig hebt.

Om te sorteren kun je ook kiezen of je profielen oplopend of aflopend 
wil sorteren en of je alfabetisch of numeriek wil sorteren.

### Offset en hoeveelheid

De offset bepaalt de startpositie. De hoeveelheid bepaalt hoeveel profielen 
je wil selecteren. Een positieve offset selecteert vanaf het begin van de 
selectie, een negatieve offset vanaf het einde (achteruit). Een positieve 
hoeveelheid selecteert die hoeveelheid, maar een negatieve hoeveelheid 
selecteert het totale aantal minus deze hoeveelheid. Je kunt beide ook 
specificeren in percentages.

## Voorbeelden

Voor de volgende voorbeelden gebruiken we deze kleine database:

| Name    | Gender  | Score    |
|---------|---------|----------|
| Chris   | Male    | 90       |
| Mike    | Male    | 100      |
| Jessica | Female  | 80       |
| Emily   | Female  | 20       |
| Ashley  | Female  | 65       |
| Sam     | Female  | 100      |
| Josh    | Male    | 75       |
| Matt    | Male    | 70       |

Je hebt een quiz gestuurd naar je contacten die resulteerde in een score 
voor elk profiel. Laten we de winnaar een email sturen. Om de selectie 
te maken wil je sorteren op "Score" en deze oplopend laten aflopen 
om de hoogste score bovenaan te zetten. Aangezien Mike en Sam beide een 
score van 100 hebben moet je nog een veld toevoegen om op te sorteren. 
We sorteren hier op de naam, maar we raden een eerlijkere aanpak aan 
voor je eigen klanten. We selecteren alleen de eerste kandidaat in de 
lijst.

* **Sorteerveld toevoegen**: "Score", Aflopend, Numeriek
* **Sorteerveld toevoegen**: "Name", Oplopend, Alfabetisch
* **Selecteer vanaf positie**: 0 (het begin)
* **Selecteer aantal**: 1

Dit selecteert Mike als de winnaar, aangezien zijn naam de eerste is 
in alfabetische volgorde. Laten we nu een email sturen naar nummer 2 en 
3 om hen te feliciteren. We gebruiken dezelfde sorteerregels, maar willen 
nu een andere offset en hoeveelheid gebruiken.

* **Sorteerveld toevoegen**: "Score", Aflopend, Numeriek
* **Sorteerveld toevoegen**: "Name", Oplopend, Alfabetisch
* **Selecteer vanaf positie**: 1 (De winnaar wordt genegeerd)
* **Selecteer aantal**: 2 (Nummer 2 en 3)

Sam en Chris zijn nu geselecteerd om te emailen. Laten we nu de 
laagste scorer selecteren om ze uit te lachen (we raden je niet aan 
om dit bij je eigen klanten te doen). We gebruiken dezelfde sorteervelden 
en een negatieve offset om onderaan te beginnen.

* **Add ordered field**: "Score", Descending, Numerical
* **Add ordered field**: "Name", Ascending, Alphabetical
* **Select from position**: -0 (Begint onderaan)
* **Number to select**: 1

We hebben nu Emily geselecteerd. We hadden hetzelfde kunnen bereiken 
door "Score" oplopend te sorteren en te beginnen vanaf positie 0.

## Meer informatie

* [Selecties](selections-introduction)