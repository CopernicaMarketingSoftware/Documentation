Hoor je dat? Het heugelijke gejuich van e-mail developers over de hele
wereld? Maak je maar klaar om ook te gaan juichen, want het moment waar
we allemaal al zo lang op zitten te wachten is hier. Gisteren heeft
Google laten weten dat Gmail en Inbox by Gmail eindelijk responsive
design en embedded CSS gaan ondersteunen tegen het einde van deze maand!

Responsive mailen met CSS media queries
---------------------------------------

Als de op twee na grootste e-mail client, na Apple’s clients voor de
iPhone en de iPad, was het ondertussen ook wel tijd. Responsive e-mail
design zorgt ervoor dat developers niet langer hybrid code hoeven te
schrijven, iets dat vervelend kan zijn bij complexe ontwerpen. In plaats
daarvan kun je nu standaard CSS media queries gebruiken. Hiermee kun je
de layout van een e-mail laten veranderen op basis van de schermgrootte,
-oriëntatie en -resolutie. Bijvoorbeeld:

    @media screen and (max-width: 600px) {
    .colored {
    color:blue;
        }
    }

In het stukje hierboven wordt een media query gebruikt om te kijken of
de schermgrootte groter is dan 600px. Als dat niet zo is, wordt alles
dat bij de klasse “colored” hoort blauw gekleurd. Deze update maakt het
ontwerpen van e-mails een stuk universeler. Het is namelijk zo dat de
eigen clients van Apple, Android, Yahoo en zelfs Blackberry al
responsive design ondersteunen. Met deze update worden meer dan 80% van
alle e-mails verstuurd naar clients die het ondersteunen.

Embedded styles
---------------

Nog een zeer positief punt: het wordt met deze update ook mogelijk om,
in plaats van slordige inline CSS, CSS in de head van je document te
plaatsen. Het wordt echter nog beter: zelf classes en IDs worden
ondersteund. Met de nieuwe update wordt het dus significant makkelijker
om mooie, duidelijke CSS te schrijven voor je e-mails. Google is niet
erg gul met informatie verstrekken over deze update. Behalve [deze
blogpost](http://googleappsdeveloper.blogspot.nl/2016/09/your-emails-optimized-for-every-screen-with-responsive-design.html)
en [deze korte
documentatiepagina](https://developers.google.com/gmail/design/css)
hebben ze nog niets losgelaten, maar voor nu zijn we heel gelukkig met
het goede nieuws.
