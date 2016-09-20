Om de werking van formulieren en enquetes goed te kunnen testen, dien je
deze eerst te publiceren op een webpagina. Sommige formulieren
functioneren alleen als deze worden ingevuld door een ingelogde
gebruiker. Je kan jezelf eenvoudig inloggen door de inloggegevens van je
testprofiel aan je webpagina URL toe te voegen.

[Lees onze Getting started over het maken van websites en
webpaginas](./getting-started-with-websites.md)

Als je al een website met webpagina's hebt aangemaakt in de applicatie,
dan dien je de website te koppelen aan een geldige domeinnaam.

[Lees hoe je een domein koppelt aan een
website](./een-domeinnaam-koppelen-aan-een-website.md)

Wanneer je website is gekoppeld aan een geldige domeinnaam, kan je de
website met je webbrowser openen, zoals je ook naar iedere andere
website surft.

Een specifieke webpagina bekijken
---------------------------------

Je kan een specifieke pagina benaderen, door de gekoppelde website
domeinnaam aan te vullen met de naam van de betreffende webpagina.

**Voorbeeld**: Een webpagina met de naam '*bedankt'*kan je benaderen via

http://nieuwsbrief.jouwbedrijf.nl/bedankt

De pagina bekijken als ingelogde gebruiker
------------------------------------------

Bij sommige formulieren vereisen dat deze wordt ingevuld door een
gebruiker die is ingelogd, bijvoorbeeld door vanuit een emailing te
klikken op een link waaraan je de speciale inlogcode hebt toegevoegd.

De inlogcode bestaat uit het profiel ID en de profiel code:

http://newsletter.yourdomain.com/signup**?profile={\$profile.id}&code={\$profile.code}******

Om je webpagina te testen met je testprofiel kan je de smarty code uit
de bovenstaande URL vervangen door de gegevens van je testprofiel.

-   Vervang {\$profile.id} door het ID van je testprofiel
-   Vervang {\$profile.code} door de toegangscode van het testprofiel.
    Deze code kan je achterhalen vanuit de overzichtspagina van het
    profiel. In de onderste taakbalk vind je een knop **Toegangscode**.

http://newsletter.yourdomain.com/signup**?profile=123456&code=d41d8cd98f00b204e9800998ecf8427e**

**Inloggen als subprofiel**

Indien je in wilt loggen als subprofiel uit een collectie gebruik je een
iets andere formulering

-   Vervang *profile*door *subprofile*

http://newsletter.yourdomain.com/signup?**subprofile**={\$**subprofile**.id}&code={\$**subprofile**.code}
