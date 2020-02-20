# E-mail voorkeuren
Wanneer je verschillende soorten nieuwsbrieven verstuurt is het belangrijk om een webpagina te hebben waarop klanten hun voorkeuren kunnen updaten. Deze webpagina kan geheel binnen Copernica worden ingericht met behulp van een webformulier en XSLT. 

In deze tutorial leggen we uit hoe de onderstaande voorkeuren pagina gemaakt wordt.
![Screenshot van voorkeurenpagina](https://pic.vicinity.nl/image/37852263/3b3bdf20523c02e42a3f96c3525404c0/Screenshot%20from%202020-02-20%2015-19-18.png)

## Database
In de database houden we de voorkeuren van nieuwsbrief bij in een [interesse](https://www.copernica.com/nl/documentation/database-fields#interesses) veld. In ons geval betekent dit dat wij drie verschillende interesses willen aanmaken; dagdeals, weekdeals en maanddeals.

Deze interesses maak je aan via **Databasebeheer -> Databasevelden wijzigen** waarna je op Interesse toevoegen drukt. Groepeer alledrie de interesses onder Nieuwsbrieven zodat we bij een eventuele uitbreiding van interesses het overzicht kunnen behouden.

## Formulier
Onder Content kunnen we een [webformulier](https://www.copernica.com/nl/documentation/webforms) aanmaken. Dit doe je door op **Webformulier -> Nieuw webformulier** te drukken, hier kan je vervolgens het formulier een naam geven en de database uit de vorige stap te selecteren.

Via **Webformulier "Naam" -> Instellingen** kunnen we het gerag van het webformulier instellen. Hier kiezen we bij instelling voor; Inloggen als profiel uit de database "naam". Voor de tekst op de verzendknop en de vervolgpagina kunnen eigen waarden worden gekozen. 

Vervolgens maken we de drie velden aan via **Webformulier "Naam" -> Veld toevoegen**, kies dan voor interesse. Als label kiezen we in dit geval de naam van de interesse waar we het veld aan koppelen, bij gekoppeld aan wordt de juiste interesse gekozen en het veld is vooraf ingevuld met (sub)profiel data. Herhaal dit voor de overige twee interesses.

Onder preview zouden we nu het volgende moeten zien.
![Voorbeeld van de preview van het formulier](https://pic.vicinity.nl/image/37629028/ebf590883fadb92a54b735cc5738a5d8/Screenshot%20from%202020-02-17%2014-25-34.png)

## XSLT
De XSLT zal ons formulier omzetten in bruikbare HTML, onder Stijl kunnen we via **XSLT -> Nieuwe XSLT** een nieuw bestand aanmaken. Het doel is een webformulier en we willen hem niet vullen met voorbeeldcode. De code die we er wel in willen plaatsen is de volgende:

    <xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output omit-xml-declaration="no" />
    <xsl:template match="webform">
      <!-- A webform is located, proceed. -->
      <div class="webform" id="webform_{id}">
        <table class="interest"><tr>
        <!-- Loop trough each field only select interests-->
          <xsl:for-each select="interest"><td class="interestOption">
            <label class="container">
              <input type="checkbox" id="{id}" name="{id}" value="{id}">
                <!-- If checked in database set to checked -->
                <xsl:if test="value = 'yes'">
                  <xsl:attribute name="checked">checked</xsl:attribute>
                </xsl:if>
              </input>
              <table class="data"><tr><td>
                <div class="checkmark"></div>
              </td><td>
                <xsl:value-of select="label" />
              </td></tr></table>
            </label>
          </td></xsl:for-each>
        </tr></table>
      	<div class="button">
      	  <input type="submit" value="{buttontext}" />
        </div>
      </div>
    </xsl:template>
    </xsl:stylesheet>

## CSS
De CSS kan net als de XSLT toegevoegd worden via Stijl waarna we op **Stylesheet -> Nieuwe Stylesheet ** ook deze vullen we niet met voorbeeldcode maar met de volgende code:

    /* Import LATO medium font */
    @import url("https://use.typekit.net/rze0amo.css");
    body {
      width: 600px;
      margin: 0 auto;
      font-family: lato, sans-serif;
      font-weight: 500;
      font-size: 11pt;
    }
    
    h1 {
      text-align: center;
      margin-top: 40px;
      margin-bottom: 30px;
    }
    
    /* Set table for interests */
    .interest {
      width: 70%;
      background-color: #F8F8F8;
      margin: 0 auto;
      padding: 10px 0;
    }
    
    /* Set three cells for interests */
    .interestOption {
      width: 33%;
      text-align: center;
    }
    
    /* Container for clickable area */
    .container {
      display: block;
      position: relative;
      cursor: pointer;
    }
    
    /* Hide standard checkbox */
    .container input {
      display:none;
    }
    
    /* Container for checkmark and label */
    .data {
      margin-left: auto;
      margin-right: auto;
    }
    
    /* Checkmark box */
    .checkmark {
      height: 12px!important;
      width: 12px!important;
      background-color: white;
      border: 1px solid #000000;
    }
    
    /* Checkmark box clicked, standard hidden */
    .checkmark:after {
      content: "";
      display: none;
      width: 12px;
      height: 12px;
      background-image: url("https://pic.vicinity.nl/image/37847718/06097c32095bf7f3871cc2fabed2219d/check-white.svg");
      background-repeat: no-repeat;
      vertical-align: middle;
      background-size: cover;
      background-position: center;
    }
    
    .container:hover .checkmark {
      background-color: #efefef;
    }
    
    .container input:checked~table tr td div.checkmark {
      background-color: black;
    }
    
    /* Show when input clicked */
    .container input:checked~table tr td div.checkmark:after {
      display: block;
    }
    
    .button {
      margin: 0;
      margin-top: 30px;
      text-align: center;
    }
    
    .button input {
      background-color: #EE4A4B;
      color: white;
      border: none;
      padding: 10px 25px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 2px;
      font-weight:600;
      font-size:11pt;
    }

## Website
Het formulier moet opgeslagen worden op een Copernica [website](https://www.copernica.com/nl/documentation/websites). Voordat we een website kunnen aanmaken moet er eerst een domein aan gekoppeld zijn, de uitleg kan [hier](https://www.copernica.com/nl/documentation/websites#domein-linken) gevonden worden.

Druk op **Template -> Nieuwe Template** om een lege template aan te maken.  Via **Tempalte "Naam" -> Stijl instellen** kiezen we dan het CSS bestand wat we hebben aangemaakt. Daarna maken we via **Website -> Nieuwe website** een nieuwe website en binnen deze website via **Webpagina -> Nieuwe webpagina** een webpagina aan, selecteer voor de webpagina de zojuist gemaakte template.

De broncode van de template vullen we met deze HTML code;

    <!doctype html>
    
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <title>E-mail voorkeuren opgeven</title>
    </head>
    
    <body>
      [image name="Header" width="600"]
      <h1>[text name="Intro"]</h1>
      [text name="Formulier"]
    </body>
      <!-- Prevent selection when double click -->
      <script>
        document.addEventListener('mousedown', function (event) {
          if (event.detail > 1) {
            event.preventDefault();
          }
       }, false);
      </script>
    </html>
In de bewerkmodus kan dan een afbeelding en een introtekst worden ingevuld. De laatste stap is dan in het blok met de naam Formulier onder Speciale inhoud voor Formulier te kiezen en dan het juiste formulier en de bijbehorende XSLT te kiezen.

## Verwijzing in e-mail
Om te zorgen dat een persoon automatisch ingelogd is wanneer het formulier wordt geopend voeg je de volgende link in je e-mail binnen Copernica toe: `http://subdomein.jouwdomein.nl/websitename?profile={$profile.id}&code={$profile.code}` 

Met deze stappen is de voorkeurenpagina klaar om gebruikt en verstuurt te worden.

