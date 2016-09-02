Content webformulieren kunnen worden uitgebreid met verborgen velden.
Deze velden zijn niet zichtbaar in het formulier (de invuller ziet ze
niet). De invuller verstuurt dan gegevens die niet door hemzelf is
ingevuld. Dit kan nuttig zijn wanneer je meerdere inschrijfformulieren
hebt, en wilt weten via welk formulier de aanmelding is binnengekomen en
op welke datum.

Kies '**verborgen veld**' bij de veldeigenschappen van het
formulierveld.

![Creating a hidden field](hiddenfield2.png)
============================================

-   Kies**onzichtbaar veld**om verborgen data mee te sturen in een
    webformulier
-   Vul bij de standaardwaarde de waarde in die je naar het profiel wilt
    wegschrijven. Je mag in dit veld uiteraard gebruik maken van smarty
    code. Bijvoorbeeld een {\$smarty.now|date\_format:"%Y-%m-%d"}  om de
    datum van aanmelding op te slaan in het profiel.
-   De label tekst kan je in principe leeglaten, omdat deze toch niet
    wordt getoond in het formulier.

### Verborgen velden in een gegenereerd webformulier

In het onderdeel **Websites** kan je een webformulier maken die je
gemakkelijk op externe pagina's kan publiceren. Het toevoegen van een
verborgen veld aan dit formulier is niet mogelijk zonder de JavaScript
code van het formulier te wijzigen. Als je simpelweg een webformulier
veld toevoegt, zal bij het versturen van het formulier de waarde worden
overschreven met de huidige waarde uit de database.
