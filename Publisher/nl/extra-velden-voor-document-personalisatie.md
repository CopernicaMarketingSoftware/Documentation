Naast het ophalen van gegevens uit het profiel of subprofiel voor
documentpersonalisatie, is het ook mogelijk om aparte
personalisatievelden bij een template te definieren. Op documentniveau
kan je deze vervolgens gebruiken om eigenschappen aan het document toe
te voegen, zonder hiervoor wijzigingen in de HTML broncode te hoeven
aanbrengen.

Je kan deze functie vinden onder *E-mailings \> Template menu \>***Extra
personalisatievelden...**

-   Vul bij *naam* de naam in die je voor het extra veld wilt gebruiken.
-   Geef bij *type* aan wat voor soort gegevens je wilt opslaan in het
    veld.
-   Vul bij *standaardwaarde*de waarde in die standaard moet worden
    gegeven aan het personalisatieveld.

![add personalization fields](extrapersonalizationfields.png)

Het extra personalisatieveld toevoegen aan de HTML broncode

Om het personalisatieveld te gebruiken in het document, dien je eerst
nog een speciale code aan de HTML broncode van de template toe te
voegen.

**{\$property.*veldnaam*}**

Vervang *veldnaam* met de naam die je aan het extra personalisatieveld
hebt gegeven.

### Voorbeeldtoepassing: op documentniveau de achtergrondkleur van een template beheren

Met behulp van een extra personalisatieveld kan je een eindgebruiker van
een e-maildocument de achtergrondkleur van het template laten wijzigen,
zonder dat hij of zij hiervoor de de template hoeft te bewerken.

-   Voeg een *extra personalisatieveld* toe, via het template menu.
-   Kies bij naam voor *background*
-   Kies bij type *Tekst*
-   Kies bij standaardwaarde voor *white*(of de hexadecimale variant
    *\#FFF*)

Plaats vervolgens de speciale *smarty code*in de template broncode, op
de plek waar de achtergrondkleur wordt gedefinieerd.

`<table  style="background-color:{$property.background};">`

De tabel zal nu standaard een witte achtergrond hebben. Echter, wanneer
de eindgebruiker een rode achtergrondkleur wil, dan kan hij dit wijzigen
via de de *personalisatie-instellingen*van het document.

-   **Open linksonder**het geopende document het menu voor
    *personalisatie-instellingen*.
-   Vul in het veld voor *background* een andere kleur in, bijvoorbeeld
    *black*
-   Ververs het document en aanschouw het resultaat.

![Personalization settings](personalizationsettings.png)

Afbeelding - de personalisatieinstellingen van het document, waar je
extra personalisatievelden kunt vullen met een nieuwe waarde
