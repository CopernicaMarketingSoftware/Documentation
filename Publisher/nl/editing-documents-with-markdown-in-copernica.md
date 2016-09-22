Gebruikers van Copernica hebben nu de mogelijkheid om inhoud van
[artikelen in
markdown](https://www.copernica.com/nl/ondersteuning/hoe-je-markdown-gebruikt-in-copernica "Markdown gebruiken in Copernica")
op te maken. Deze functionaliteit is zojuist geïntroduceerd. Markdown is
een simpele opmaaktaal, bedacht als eenvoudig alternatief voor HTML.
Gebruikers die niet willen HTML'en konden in Copernica al terecht bij de
[WYSIWYG-editor](https://www.copernica.com/nl/functies/webpaginas/maak-en-publiceer-je-eigen-webpaginas "Maak en publiceer je eigen webpagina’s").

Voorbeeld
---------

Met markdown is het mogelijk opmaak mee te geven aan tekst. Neem het
volgende voorbeeld:

E-mailmarketing
---------------

Als kind wist Henk het al: hij wilde e-mailmarketeer worden.

Helemaal *te gek* leek het hem, een **fantastisch beroep**. Kijk eens
naar al die letters in die e-mails.

Nu werkt hij bij [Copernica](http://www.copernica.com).

En daar heeft hij:

-   geen dag spijt van gehad
-   een leuke baan aan over gehouden
-   veel kennis over e-mailmarketing opgedaan

Zijn favoriete collega's zijn:

1.  Jan
2.  Kees
3.  Marie

Hij gaat elke dag —met plezier— naar zijn werk.

\

Gebruikers van Copernica kunnen deze tekst nu op de volgende manier met
markdown opmaken:

    E-mailmarketing
    --------------- 

    Als kind wist Henk het al: hij wilde e-mailmarketeer worden.

    Helemaal *te gek* leek het hem, een **fantastisch beroep**. Kijk eens naar al die `letters` in die e-mails.

    Nu werkt hij bij [Copernica](http://www.copernica.com).

    En daar heeft hij:

      * geen dag spijt van gehad
      * een leuke baan aan over gehouden
      * veel kennis over e-mailmarketing opgedaan

    Zijn favoriete collega's zijn:

      1. Jan
      2. Kees
      3. Marie

    Hij gaat elke dag ---met plezier--- naar zijn werk.

De software zet het dan, net als bij de bestaande WYSIWYG-editor,
automatisch om in deze HTML-code:

    <h2>E-mailmarketing</h2>

    <p>Als kind wist Henk het al: hij wilde e-mailmarketeer worden.</p>

    <p>Helemaal <em>te gek</em> leek het hem, een <strong>fantastisch beroep</strong>. Kijk eens naar al die <span style="font-family : Courier;">letters</span> in die e-mails.</p>

    <p>Nu werkt hij bij <a href="http://www.copernica.com">Copernica</a>.</p>

    <p>En daar heeft hij:</p>

    <ul>
    <li>geen dag spijt van gehad</li>
    <li>een leuke baan aan over gehouden</li>
    <li>veel kennis over e-mailmarketing opgedaan</li>
    </ul>

    <p>Zijn favoriete collega's zijn:</p>

    <ol>
    <li>Jan</li>
    <li>Kees</li>
    <li>Marie</li>
    </ol>

    <p>Hij gaat elke dag &mdash;met plezier&mdash; naar zijn werk.</p>

Artikelen
---------

Momenteel is het alleen mogelijk markdown toe te passen op artikelen
binnen de contentsectie in Copernica. Afhankelijk van de vraag onder
gebruikers implementeren we de functie later in andere onderdelen van de
software, zoals e-mails en webpagina's.
