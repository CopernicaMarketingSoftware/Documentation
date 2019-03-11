# Externe content inladen in de Publisher
Met een feed heb je zelf in de hand welke content automatisch op je webpagina
of in je e-mailing verschijnt. Met Copernica voeg je gemakkelijk een RSS of
Atom feed toe aan je marketingcampagnes. Het is daarnaast ook mogelijk om de
HTML zelf op te halen via een fetch request.

## RSS en Atom feeds
Contentfeeds zijn verzamelingen van artikelen die je via verschillende kanalen,
bijvoorbeeld je e-mailings of webpagina's publiceert. Hierbij gebruik je eigen
feeds die je gemakkelijk met Copernica aanmaakt of externe feeds. Bij externe
feeds moet je bijvoorbeeld denken aan de nieuwsfeed van een blog.

Met Copernica neem je gemakkelijk elke (externe) RSS of Atom feed op in een
e-mailing of webpagina. Stel met de gebruiksvriendelijke editor van Copernica
de artikelen voor een feed op.

Je voegt met Copernica ook handig verschillende rubrieken toe aan een RSS of
Atom feed. Dit stelt je in staat de artikelen die je toevoegt aan je feed,
op te delen aan de hand van die rubrieken.

Met Copernica stel in je in enkele stappen het adres van je feed samen. Dit is
de link die verwijst naar je [contentfeed](./publisher-personalization-
functions#loadfeed)
wanneer je deze gebruikt in een mailing of op je webpagina. Gebruik je eigen
[stijldocumenten (CSS of XSLT)](./css-and-xslt.md) voor de verdere vormgeving
van je RSS of Atom feed. Deze maak je gemakkelijk aan binnen Copernica.

Wil je liever hulp inschakelen bij het inladen van een RSS of Atom feed? Of
ben je op zoek naar iemand die je kan helpen bij het vormgeven van je
contentfeed? In Copernica's partnernetwerk vind je de geschikte partner die je
graag verder helpt.

## Fetch HTML
Fetch kan gebruikt worden om bestanden via HTTP of FTP op te vragen. Je kunt
dan de inhoud van de bestanden tonen.

* **http**: URLs die beginnen met "http://" worden gebruikt om een website weer te geven.
* **ftp**: URLs die beginnen met "ftp://" zorgen dat het bestand wordt gedownload van de server en getoond in de template.

De functie heeft een **name** parameter die verplicht is en met **assign** kun
je ook de opgevraagde inhoud in een variabele opslaan in plaats van deze te
laten zien.

### Voorbeelden
Met de volgende code kun je informatie opvragen van een website, bijvoorbeeld
het weer voor komende week:

    {fetch url="http://www.myweather.com/today/"}

Of je kunt deze in een variabele zetten en deze met je eigen HTML gebruiken.

    {fetch url="http://www.theweather.com/today/" assign='weather'}
    {if $weather ne ''}
      <div id="weather">{$weather}</div>
    {/if}

Dit voorbeeld gebruikt ook de [if functie](./publisher-personalization-
functions#if). Je kunt ook downloaden van een FTP server. Het volgende
voorbeeld laat daarnaast zien hoe je variabelen in een link kunt gebruiken.

    {fetch url="ftp://`$user`:`$password`@`$server`/`$path`"}
