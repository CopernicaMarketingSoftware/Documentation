# Productupdate 26-08-2021

## Bètaversie nieuwe drag-and-drop-editor
Afgelopen donderdag hebben wij de bètaversie van de nieuwe drag-and-drop-editor live gezet. De nieuwe editor biedt veel voordelen ten opzichte van de oude drag-and-drop-editor. Zo is er verbeterde ondersteuning voor responsive-opmaak, zijn er meer Smarty-mogelijkheden (o.a. loadsubprofile en math equation) en zijn eigen geschreven HTML- en CSS-blokken mogelijk.

Je activeert de nieuwe module via het menu-item [Configuratie](https://ms.copernica.com/#/admin), onder het kopje [Bètamodules](https://ms.copernica.com/#/admin/user/betamodules). De nieuwe editor is daarna te gebruiken via het menu-item 'E-mail-editor → Aanmaken → Drag-and-drop-template aanmaken'.

Ben je geïnteresseerd in de nieuwe functionaliteiten of wil je zien hoe de nieuwe editor werkt, dan nodigen wij je graag uit om deel te nemen aan de demo op vrijdag 27 augustus 2021 om 14:00 via [deze link](https://meet.google.com/vkz-wfxy-ytv).

## Uitschrijvingen vanuit een webformulier registreren bij je mailing
Het is nu mogelijk om een uitschrijving vanuit een Copernica-webformulier te koppelen aan een verzonden mailing. Hierdoor kun je, ook zonder de {unsubscribe}-tag, een uitschrijving registreren in de statistieken. 

In onze documentatie vind je meer informatie hoe je dit kunt instellen voor [HTML-templates](./emailings-publisher-unsubscribe) en [drag-and-drop-templates](./emailings-ms-unsubscribe).

## Marketing Suite
* De breedte van de sidebar is nu aanpasbaar. Dit is de plek waar bijvoorbeeld je databases in staan.
* De laadtijd van opvolgacties is verbeterd.
* Als niet alle headers bij je template of document zijn ingevuld verschijnt er een waarschuwings-icoon.
* Het is nu mogelijk om je templates te sorteren op naam, ID, laatst aangemaakt of laatst aangepast.
* Er is een zoekfunctie toegevoegd aan de [e-mail-editor](https://ms.copernica.com/nl/#/design).
* Als er een Smarty-fout in je template of document zit, krijg je hierover een melding in de voorvertoning.
* We hebben het mogelijk gemaakt om een document naar een andere template te kopiëren. Hiervoor dient de broncode wel exact hetzelfde te zijn van beide templates.
* Als alle profielen uit je database aan je selectie-conditie(s) voldoen wordt er een waarschuwing getoond. 
* Bij het instellen van een import kun je nu aangeven dat alle selecties opnieuw moeten worden opgebouwd wanneer de import is afgerond.
* Bugfix: bij het kopiëren van een database met selecties worden de condities nu altijd meegekopieerd. 
* Bugfix: de editor in een tekstblok werkt nu direct nadat de pagina is ververst.
* Bugfix: we hebben een probleem verholpen waarbij de naam van een opvolgactie niet werd opgeslagen.
* Bugfix: webhooks gelimiteerd tot een database of collectie werken nu ook bij een impressie of klik.
* Bugfix: bij het gebruik van een IP-restrictie wordt er nu een melding gegeven als je niet aan de IP-restrictie voldoet.
* Bugfix: bij het exporteren van hardbounces wordt nu ook het e-mailadres meegegeven.
* Bugfix: spamklachten vanuit drag-and-drop-templates zijn nu zichtbaar in de logfiles binnen een profiel.

## REST API
* Je kunt nu webhooks [aanmaken](./restv2/rest-post-webhooks), [opvragen](./restv2/rest-get-webhook), [bijwerken](./restv2/rest-put-webhook) of [verwijderen](./restv2/rest-delete-webhook).
* Het is nu mogelijk om [drag-and-drop-templates](./restv2/rest-delete-ms-template), [HTML-templates](./restv2/rest-delete-publisher-template) en [-documenten](./restv2/rest-delete-publisher-document) te verwijderen.
* Je kunt nu de rechten per API-token aanpassen via de interface.
* Bugfix: bij het bijwerken van meerdere profielen wordt nu een foutmelding teruggegeven als een veld niet meer bestaat in de database of collectie.
* Bugfix: bij het ophalen van verzonden mailings per profiel kun je nu weer filteren op het minumum en maximum aantal ontvangers.
