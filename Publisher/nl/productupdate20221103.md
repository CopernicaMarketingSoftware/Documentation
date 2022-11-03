# Onderhoud aan onze infrastructuur: overgang naar Kubernetes
Om onze infrastructuur en software beter schaalbaar en beheersbaar te maken, en om minder kwetsbaar te zijn voor storingen, zijn we enkele maanden terug begonnen met het geleidelijk overstappen op een nieuw hostingplatform. Ons oude platform wordt hierbij stap voor stap omgezet naar een nieuw platform dat draait op Kubernetes. Dit is een state-of-the-art technologie, waardoor Copernica voorop blijft lopen als e-mail service provider. We kunnen hierdoor blijven meegroeien met de wensen en eisen van onze gebruikers.

In ons [blogartikel](https://www.copernica.com/nl/blog/post/onderhoud-aan-onze-infrastructuur-overgang-naar-kubernetes) lees je meer.

# Modules maken voor HTML-templates
Binnen HTML-templates worden vaak vaste elementen gebruikt die in alle templates dezelfde content bevatten. Zoals de header en footer. Toch moet je ieder template aanpassen als je deze content wilt veranderen.

Ronald Vesterink van Pricewise bedacht hiervoor een oplossing. Op basis van feeds en een XSLT-bestand maakt hij 'modules' zodat je content eenvoudig kan hergebruiken. In [dit artikel](https://www.copernica.com/nl/blog/post/onderhoud-aan-onze-infrastructuur-overgang-naar-kubernetes) nemen we je mee hoe je dit opzet.

# Uitfaseren oude drag-and-drop-editor op 1 maart 2023
Op 1 maart 2023 is het niet meer mogelijk om gebruik te maken van de [oude drag-and-drop-editor](https://ms.copernica.com/#/templates/editor/). Wij raden aan om voor deze datum alle templates van lopende mailings over te zetten naar de nieuwe drag-and-drop-editor.

Om te bekijken of je nog gebruikt maakt van templates uit onze oude drag-and-drop-editor kan je bij [verzonden mailings](https://ms.copernica.com/#/results/sentmailings) of [ingeroosterde mailings](https://ms.copernica.com/#/results/upcomingmailings) filteren op het templatetype 'drag-and-drop-template (oud)'.

Mocht je vragen hebben over het overzetten van templates naar de nieuwe editor kan je contact opnemen met je accountmanager of met de [support-afdeling](https://ms.copernica.com/#/support).

## Marketing Suite
- Bij de optie 'Bestemming checken' in een opvolgactie is het nu mogelijk om de vergelijking 'in lijst' of 'niet in lijst' te kiezen. Hiermee kan je in één keer meerdere vergelijkingen toevoegen.
- In de opvolgacties is het nu mogelijk om gebruik te maken van een lege veldwaarde als vergelijking.
- Bij een opvolgactie wordt nu een melding getoond als één van de boxen niet gekoppeld staat.
- Je kan nu de trigger aanpassen van een bestaande opvolgactie.
- In de statistieken van een template of document worden nu ook de resultaten over een opgegeven periode weergegeven.
- Bij de statistieken van je verzonden mailings worden de kliks nu gesorteerd op basis van unieke kliks.
- Bij het exporteren van de resultaten binnen de [resultaten-module](https://ms.copernica.com/#/results) wordt nu het onderwerp meegegeven en is de mogelijkheid toegevoegd om te filteren op template of document en op de bestemming van de mailing. 
- In de miniconditie 'Check op dubbele of unieke subprofielen' is het nu mogelijk om naar subprofielen binnen één profiel te zoeken in plaats van de gehele collectie.
- Bij het kopiëren van een template staan de extra opties zoals het kopiëren van opvolgacties en bijlages nu standaard aangevinkt.
- Bugfix: het inroosteren van een mailing via Safari is weer mogelijk.
- Bugfix: het is niet meer mogelijk om meerdere mailings tegelijk in te roosteren wanneer er meerdere malen achter elkaar op de verzendknop wordt gedrukt.
- Bugfix: bij het kopiëren van een database blijven uitgeschakelde opvolgactie nu ook uitgeschakeld in de nieuwe database.
- Bugfix: het is weer mogelijk om een verborgen preheader in te stellen binnen drag-and-drop-templates.
- Bugfix: bij het inroosteren van een A/B-test of split-run worden nu alle groepen weergegeven bij [ingeroosterde mailings](https://ms.copernica.com/#/results/upcomingmailings)
- Bugfix: bij de template statistieken van een drag-and-drop-template wijzigt nu ook het aantal bestemmingen als je een datumrange opgeeft.
- Bugfix: in een aantal accounts waren enkel de laatste tien verzonden mailings zichtbaar in de resultaten-module. 
- Bugfix: in de DMARC analyzer wordt nu een melding getoond wanneer er geen rapport beschikbaar is.

## REST API
- Het is nu mogelijk om de [gepersonaliseerde broncode](https://www.copernica.com/nl/documentation/restv3/rest-get-profile-publisher-personalized-document) van een HTML-document op te vragen per profiel.
- Er is een methode toegevoegd waarbij je de [status van een import](https://www.copernica.com/nl/documentation/restv3/rest-get-import) kunt opvragen.
- Het is nu mogelijk om [meerdere subprofielen](https://www.copernica.com/nl/documentation/restv3/rest-put-collection-subprofiles) binnen een collectie in bulk bij te werken.
- Bij het ophalen van drag-and-drop-mailings wordt nu ook het type mailing teruggegeven. De mogelijke opties zijn: mass, individual, splitrun of abtest.

## SOAP API
- Bugfix: in de methode [view_retrieve](https://www.copernica.com/nl/support/apireference/View_retrieve) wordt de lastbuilt weer teruggegeven in de response.
