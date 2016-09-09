Heb je een webformulier gemaakt, en wil je deze publiceren op je
(externe) eigen website? Dit kan met behulp van een iframe.

Aanmeldformulier  publiceren
----------------------------

Het aanmeldformulier maakt altijd een nieuw profiel aan, of wijzigt een
bestaand profiel op basis van de sleutelvelden.

-   plaats het webformulier op een webpagina in Copernica. Je gebruikt
    hiervoor de tag {webform name="naam van je webformulier"}
-   zorg ervoor dat je een (sub)domein hebt gekoppeld aan je website.

Je kan de webpagina met het formulier nu laden in een iframe. Gebruik
hiervoor de code:

`<iframe src="http://www.webpagina-met-formulier.nl" width="500" height="500"></iframe>`

Kijk voor meer opties voor het iframe HTML element op
[http://www.w3schools.com/tags/tag_iframe.asp](http://www.w3schools.com/tags/tag_iframe.asp)

Wijzigformulier publiceren
--------------------------

Een wijzigformulier werkt met de ingelogde gebruiker. De gebruiker wordt
ingelogd als hij vanuit een emailing naar je pagina met webformulier
klikt. Dit is mogelijk door informatie die je meestuurt in de
verwijzende link. Om ervoor te zorgen dat de gegevens van de gebruikers
alvast zijn ingevuld in het formulier in het iframe, moet je nog wat
Javascript toevoegen aan de webpagina met het iframe. Deze Javascript
code zorgt er voor dat de *profile={\$profile.id}&code={\$profile.code}*
ook wordt doorgegeven aan de pagina met het formulier.

-   Plaats het formulier op een webpagina in Copernica
-   Zorg ervoor dat je een (sub)domein hebt gekoppeld aan je website
-   Voeg de onderstaande code toe aan de webpagina waarin je het iframe
    wilt plaatsen
-   Vervang `http://www.webpagina-met-formulier.nl` met de URL van je
    webpagina in Copernica
-   Als je stuurt naar subprofielen, verander in het script
    *profile*naar *subprofile*(in totaal 5 keer)

<!-- -->

    <script type="text/javascript">
    window.onload = function () 

    {
      <!-- parameters we will be passing to the frame -->
      
      var code = location.search.match(/code=([\d\w]+)/) ? RegExp.$1 : 0;
      var profile = location.search.match(/profile=([\d\w]+)/) ? RegExp.$1 : 0;

      var src = "http://www.webpagina-met-formulier.nl?";

      if(code != 0) src += "code="+code+"&";
      if(profile != 0) src += "profile="+profile;
         document.getElementById('loadedform').src = src;
    }

    </script>
    <iframe id="loadedform" width="500" height="500"></iframe>

