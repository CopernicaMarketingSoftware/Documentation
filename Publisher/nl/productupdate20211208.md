# Productupdate 08-12-2021

## Update bètaversie nieuwe drag-and-drop-editor
In de afgelopen periode hebben wij doorontwikkeld aan de bètaversie van de nieuwe drag-and-drop-editor.  
Hieronder vind je een enkele verbeteringen:
- We hebben een carrousel- en accordeon-blok toegevoegd. In clients die [AMP](https://www.copernica.com/nl/documentation/amp-dynamic-mail) ondersteunen kun je hierdoor meerdere afbeeldingen tonen op de plek van één afbeelding en content-secties in en uit laten klappen in je nieuwsbrief.
- In de headers van je template kun je nu een verborgen preheader opgeven. Deze tekst is zichtbaar onder je onderwerp in e-mailclients.
- Het ophalen van afbeeldingen uit mediabibliotheken is mogelijk via de [medialibrary://](https://www.copernica.com/nl/documentation/email-editor-medialibrary)-tag.
- Om geavanceerde onderwerpen, met Smarty personalisatie, in te stellen is het mogelijk gemaakt om meer dan 255 tekens te gebruiken in je onderwerpsregel. 
- Bij het toevoegen van een link in je nieuwsbrief kun je nu de standaard Copernica tags {unsubscribe} en {webversion} kiezen.
- Er is een optie toegevoegd om de nieuwsbrief te exporteren naar een HTML- of PDF-bestand.
- In de 'Bijlagen'-tab is direct zichtbaar hoeveel bijlages aan dit template zijn gekoppeld.

Je activeert de module via het menu-item [Configuratie](https://ms.copernica.com/#/admin), onder het kopje [Bètamodules](https://ms.copernica.com/#/admin/user/betamodules). De nieuwe editor is daarna te gebruiken via het menu-item 'E-mail-editor → Aanmaken → Drag-and-drop-template aanmaken'.

## Introductie van versie 3 van onze REST API
We hebben een nieuwe versie van onze REST API uitgebracht. In deze versie zijn de responsen die je ontvangt anders dan je gewend bent. PUT- en DELETE-verzoeken genereren nu standaard een '204 No Content'-respons. In eerdere versies ontving je hierop een '200 OK'-respons. Gebruik je een PUT-verzoek om meerdere entiteiten aan te maken? Dan retourneert de v3-API een '201 Created'- in plaats van een '303 See Other'-respons.

Deze aanpassing is gedaan zodat je niet automatisch een GET-verzoek krijgt na ieder PUT-verzoek.

Meer informatie over onze REST API V3 vind je [hier](https://www.copernica.com/nl/documentation/restv3/rest-api).

## Importeren via REST API
In de REST API V3 is het mogelijk gemaakt om een import op te starten door middel van een PUT-verzoek. 
Je hebt hierbij de keuze uit een CSV- of JSON-bestand.

Hierdoor is het mogelijk om wijzigingen te groeperen en binnen één verzoek naar Copernica te versturen in plaats van meerdere losse verzoeken.

Meer informatie over importeren via onze REST API vind je [hier](https://www.copernica.com/nl/documentation/restv3/rest-post-imports).

## Marketing Suite
* Bij de velden in een database is toegevoegd door welke selectie(s) deze worden gebruikt. Dit is handig wanneer je de velden uit je database wilt opschonen.
* Bij een HTML-template kun je in de weergave-modus de breedte aanpassen van beide weergaves (broncode en template voorvertoning).
* In een afbeeldingsblok, binnen HTML-templates, kun je nu Smarty personalisatie gebruiken als URL.
* We hebben een optie toegevoegd om binnen een profiel in één opslag te zien welke subprofielen in een specifieke miniselectie zitten.
* Het is mogelijk gemaakt om een gevalideerd sender domain te verwijderen.
* Bij de bewaartermijn van je gegevens zijn de opties voor 1 week, 2 weken en 1 maand toegevoegd.
* Bugfix: het downloaden van exports in het profielen-gedeelte is weer mogelijk gemaakt. 
* Marketing Suite opvolgacties worden nu gelogd in de [logbestanden](https://ms.copernica.com/#/logs/). Hierdoor heb je meer inzichten wanneer een opvolgactie getriggerd is.
* Bugfix: we hebben een probleem verholpen waardoor het weer mogelijk is om binnen een opvolgactie condities op de actie te verwijderen.
* Bugfix: in de statistieken worden nu zowel uitschrijvingen via de unsubscribe-tag als via de client getoond.
* Bugfix: bij de resultaten van een A/B test wordt nu de naam van het document getoond die is verzonden in plaats van het winnende document.
* Bugfix: het kopiëren van een drag-and-drop-template naar een folder is nu mogelijk.
* Bugfix: het is mogelijk gemaakt om bestaande (mini)selecties te hernoemen met ander hoofdlettergebruik.
* Bugfix: het exporteren van bounces werkt nu ook wanneer een mailing verzonden is aan subprofielen.
* Bugfix: wanneer je met je muis over het document gaat is nu het ID van het document zichtbaar in plaats van het ID van de template.
* Bugfix: bij PDF-bestanden binnen een mediabibliotheek is er geen kapotte voorvertoning meer zichtbaar.

## REST API / Webhooks
* Bij webhook waarbij interesses teruggegeven worden, wordt nu ook de naam van de interessegroep meegegeven.
* In de webhooks voor impressies, kliks, fouten en klachten wordt nu het ID van het profiel en de mailing meegegeven.
* Webhook-fouten worden nu geregistreerd in de [logbestanden](https://ms.copernica.com/#/logs/) binnen Marketing Suite.
* Bugfix: het ophalen van 'deliveries' via de REST API is geoptimaliseerd waardoor verzoeken sneller worden uitgevoerd.
