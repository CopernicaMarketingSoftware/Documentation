Een selectie op (sub)profielen uit een database maak je op basis van
selectieregels. Elke selectieregel kan uit meerdere condities bestaan.
Met OF en EN regels bepaal je of de profielen aan alle condities moeten
voldoen, of dat zij aan een deel van deze condities moeten voldoen.

Je gebruikt selecties om profielen te selecteren op basis van bepaalde
eigenschappen van het profiel.

-   Selecties kunnen meerdere condities hebben.
-   We maken hierbij onderscheid tussen EN condities en OF condities.
-   Een OF conditie kan bestaan uit meerdere EN condities.

![](Documentation/selections-and-or-conditions.png)

Afbeelding: de eerste pijl wijst naar de link om een nieuwe EN conditie
toe te voegen. De tweede pijl wijst naar de link voor het toevoegen van
een OF conditie.

**'EN' conditie**
-----------------

Wanneer je wilt dat elk profiel binnen de selectie aan meerdere
condities voldoet, maak je een zogenaamde EN conditie. Dat wil zeggen
dat je meerdere condities opstelt binnen één selectieregel. Profielen
vallen alleen binnen de selectie als ze aan **alle
gestelde voorwaarden** binnen die ene regel voldoen.

![](Documentation/selections-create-and-condition.png)

### Voorbeeld EN-conditie

**Je hebt een database met bedrijven. Hierin wil je een selectie maken
op bedrijven in Haarlem uit de bedrijfstak *industrie*.**

Je maakt 1 selectieregel aan, met 2 voorwaarden:\
 \
 **Selectieregel 1:**

-   voorwaarde 1 - neem alleen profielen op waarvan het veld
    'Plaatsnaam' de tekst 'Haarlem' bevat.\
     **EN**
-   voorwaarde 2 - neem alleen profielen op waarvan het veld 'Branche'
    de tekst 'industrie' bevat.

Je selectie toont nu alle profielen van bedrijven die in Haarlem
gevestigd zijn **EN** in de Industrie opereren.

**'OF' condities**

Wanneer je profielen wilt inzien die aan een bepaalde conditie voldoende
òf aan een andere conditie, dan maakt je een zogeheten OF-selectie. Dat
wil zeggen dat je iedere conditie in een eigen regel plaatst. Profielen
vallen binnen de selectie als ze aan **een van
de** **selectieregels** voldoen.

![](Documentation/selections-create-new-OR-condition.png)

### Voorbeeld OF-selectie

Je hebt een database met bedrijven. Je wilt hierin een selectie maken
van de bedrijven uit Haarlem of Amsterdam.\
\
**Je maakt twee selectieregels aan:**

-   **Selectieregel 1**: Voorwaarde - neem alleen profielen op waarbij
    in het veld 'Plaatsnaam' de tekst 'Haarlem' voorkomt.\
    **OF**
-   **Selectieregel 2**: Voorwaarde - neem alleen profielen op waarbij
    in het veld 'Plaatsnaam' de tekst 'Amsterdam' voorkomt.

De selectie toont nu alle profielen uit Haarlem OF Amsterdam.

**'OF NIET'** **selectie**
--------------------------

Het is ook mogelijk een selectieregel op te stellen en te kiezen voor
'of niet'. Met **OF NIET** stel je een conditie op waaraan
een profiel moet voldoen, maar zegt dan 'die wil ik juist niet in de
selectie zien'. Bijvoorbeeld een selectieregel voor de plaats 'Haarlem',
maar dan juist niet. Het gevolg is dat in de selectie alle profielen
BEHALVE de uit Haarlem worden opgenomen.

![](Documentation/selection-OR-NOT.png)

In de meeste gevallen is dit niet nodig en kan je een reguliere en/of
selectie maken. Er zijn uitzonderingen waarbij de reguliere regels niet
volstaan en een OF NIET selectie uitkomst biedt. Bijvoorbeeld voor een
selectie op relaties die nog NIET hebben meegewerkt aan uw enquete.
Hiervoor maak je een selectie op de relaties die wel hebben meegewerkt,
maar kies je voor de vorm 'OF NIET' zodat zij juist niet getoond worden
en alle anderen wel.

Zoals gezegd zijn de mogelijkheden met selectieregels ontelbaar.
Hieronder zie je een iets complexer voorbeeld.

### Voorbeeld 'OF' en 'EN' selectie gecombineerd

**Je beschikt over een database met bedrijven. Je wil een mailing sturen
aan bedrijven uit Haarlem OF Amsterdam, en alleen uit de branche
*Industrie*.**

De selectieregels zien er als volgt uit:\
\
**Selectieregel 1:**

-   *conditie 1 *- neem alleen profielen op waarbij in het veld
    'Plaatsnaam' de tekst 'Haarlem' voorkomt.
-   *conditie 2 *- neem alleen profielen op waarvan het veld 'Branche'
    de tekst 'industrie' bevat.

**OF**

**Selectieregel 2:**

-   *conditie 1* - neem alleen profielen op waarbij in het veld
    'Plaatsnaam' de tekst 'Amsterdam' voorkomt.
-   *conditie 2 *- neem alleen profielen op waarvan het veld 'Branche'
    de tekst 'industrie' bevat.

De selectie toont nu alle profielen waarvan het bedrijf in Haarlem
**OF** Amsterdam is gevestigd, **EN** die beiden in de branche industrie
opereren.
