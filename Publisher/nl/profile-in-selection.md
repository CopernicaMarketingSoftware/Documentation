# Profielen: Waarom komt mijn profiel niet terug in mijn selectie?

Het komt regelmatig voor dat wij de vraag krijgen waarom een bepaald profiel niet in een selectie voorkomt terwijl je dit wel verwacht. In onderstaand artikel zullen wij je laten zien hoe je in een aantal stappen kunt uitzoeken waarom dit het geval is.

## Stap 1:
Een selectie is niets anders dan een filter op de database. Hierdoor zal het profiel aan alle bovenliggende selectiecondities moeten voldoen om in de uiteindelijke selectie te vallen. 

Wanneer je een selectiestructuur van meerdere lagen diep hebt dien je eerst uit te zoeken of het profiel in de bovenste selectie zit. Om dit te bekijken kun je op een specifieke eigenschap van het profiel zoeken, bijvoorbeeld het e-mailadres (let op: zoeken op ID werkt niet binnen selecties), binnen de selectie. Mocht het profiel in deze selectie zitten ga je naar de selectie daaronder totdat je bij de selectie komt waar het profiel niet meer in naar voren komt.

## Stap2:
Mocht je bij de selectie aangekomen zijn waar je profiel niet in zit, maar waar je deze wel in verwacht kun je de optie '*Profiel testen*' gebruiken om te zien aan welke condities je profiel wel en niet voldoet. Deze optie is te vinden onder **Databasebeheer -> Selecties beheren -> [kies selectie] -> Profiel testen**.

![](../images/profielchecker.png)

In bovenstaand voorbeeld kun je zien dat het profiel niet voldoet aan de conditie "*Profielen mogen niet in de selectie 'E_Uitschrijvingen' voorkomen*". Vervolgens zou je in deze selectie kunnen kijken waarom je profiel niet aan de condities van deze selectie voldoet.
