Stylesheets kun je vinden in het onderdeel **Stijl**. Om een stylesheet
goed te gebruiken zal deze moeten worden gekoppeld aan een template of
document.

Om een stylesheet te koppelen met een document of template, ga je naar
de optie **Stijl instellen...** in het template- of documentmenu. Zodra
je een stylesheet hebt gekoppeld verschijnt er een extra tabblad
**Style** boven het document of template. Vanaf hier kun je direct de
regels bewerken. **Let op: als je de stijl verandert, heeft dit gevolgen
voor alle documenten die op basis van deze stylesheet zijn gemaakt.**

![Stijlblokken](Documentation/nl-stylesheet.png)

Stijlblokken
------------

Enkele belangrijke e-mail clients negeren stijl blokken die zijn
toegevoegd aan de header van een HTML-template. Als gevolg hiervan,
zullen veel van de ontvangers de e-mail te zien krijgen zonder de
styling.

Om dit op te lossen, kunnen de CSS-regels uit stijlblokken automatisch
worden omgezet naar inline style attributen.

### Voorbeeld

    <style>
        p {color: red}
    </style>

Na de conversie zal elk paragraaf (\<p\>) element in de template en/of
document de stijlregel hebben toegevoegd als inline attribuut:

    <p style="color: red">

Bij het instellen van de stijl van het document, zijn er verschillende
opties voor het omzetten:

-   Kies **style blokken handhaven** om de originele style sheet in de
    header te behouden. Er zal dan geen conversie naar inline attributen
    plaatsvinden.
-   Kies **style blokken omzetten naar style= attributen** om de
    originele stylesheet naar inline style attributen te converteren.
-   Kies de derde optie als je zowel de orginele stylesheet wilt
    behouden EN de stylesheet wilt converteren naar inline style
    attributen. Eigenlijk is dit de meest veilige instelling.

Zodra de stylesheet is gekoppeld zal een tabblad **Stijl**boven het
document verschijnen. Vanaf hier kun je snel de inhoud bewerken.
