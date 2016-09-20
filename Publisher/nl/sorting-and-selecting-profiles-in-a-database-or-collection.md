Gebruik deze selectieregel om een opgegeven aantal profielen
alfanumeriek te selecteren.

Geef aan op basis van welke velden de profielen moeten worden
gesorteerd. Bepaal vervolgens vanaf welke positie en hoeveel profielen
binnen deze selectie mogen vallen. De positie en aantal mogen ook
percentages bevatten.

In de onderstaande voorbeelden wordt (hopelijk) duidelijk welke
profielen worden geselecteerd met diverse instellingen.

Standaard wordt op het veld ID gesorteerd. Dit veld is al geindexeerd.

Let op: dit conditietype is vrij zwaar. Gebruik niet meer sorteervelden
dan nodig is. Sorteer het beste op numerieke waardes en maak een index
op het veld waarop je sorteert (je kan het veld indexeren bij de
veldeigenschappen).

![](../images/soritiongselecting.png)

Numeric field

-   Numeric field is ordered **ascending**
-   Selected from position 0
-   Number to select: 2 \
    \

**100**

**200**

300

400

500

600

\

Numeric field

-   Numeric field is ordered **ascending**
-   Selected from position 1
-   Number to select: 3 \
    \

100

**200**

**300**

**400**

500

600

\

Numeric field

-   Numeric field is ordered **descending**
-   Selected from position 1
-   Number to select: 3 \
    \

100

200

**300**

**400**

**500**

600

\

Numeric field

-   Numeric field is ordered **ascending**
-   Selected from position 1
-   Number to select: 50% \
    \

100

200

**300**

**400**

**500**

600

\

Numeric field

-   Numeric field is ordered **ascending**
-   Selected from position -3
-   Number to select: 2 \
    \

100

200

**300**

**400**

**500**

**600**

\

Numeric field

-   Numeric field is ordered **descending**
-   Selected from position -3
-   Number to select: 2 \
    \

100

200

**300**

400

500

600

\

Numeric field

-   Numeric field is ordered **descending**
-   Selected from position 0
-   Number to select: 40% \
    \

100

200

300

400

**500**

**600**

\

Textfield

-   Text field is ordered **alphabetical descending**
-   Selected from position 0
-   Number to select: 50% \
    \

Avacado

Banana

Cherimoya

**Durian**

**Eggfruit**

**Fig**

\

Textfield

-   Text field is ordered **alphabetical ascending**
-   Selected from position 1
-   Number to select: 3 \
    \
    \

Avacado

**Banana**

Cherimoya

**Durian**

Eggfruit

Fig

\

Textfield

-   Text field is ordered **alphabetical descending**
-   Selected from position 1
-   Number to select: 3 \
    \
    \

Avacado

**Banana**

Cherimoya

**Durian**

Eggfruit

Fig

 

Multiple profiles have same value in numeric field different values in
text field

Numeric field

Textfield

-   Numeric field is set to prior
-   Profiles with 100 will be selected and sorted alphabetically
-   Profiles with 200 will be selected and sorted alphabetically
-   Profiles with 300... \
    \
    \

100

Avacado

100

**Banana**

100

Watermelon

200

**Avacado**

200

Banana

300

Avacado
