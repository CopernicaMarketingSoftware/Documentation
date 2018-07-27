# Websites in Publisher

In de Copernica Publisher wordt het makkelijk gemaakt om zelf je website te 
maken en te hosten met HTML. Je kunt Copernica webpagina's gebruiken om je 
klanten te informeren of webformulieren en enquêtes te plaatsen om je 
klanten beter te leren kennen. Je kunt een [template](./templates) aanmaken 
voor je website en zo met gemak de layout van een of meedere pagina's aanpassen. 
Je kunt daarnaast [personalisatie](./personalization) gebruiken (alleen) als 
je gebruikers ingelogd zijn. Later in dit artikel leggen we uit hoe je dit 
automatisch kunt doen vanuit je email.

Je kunt daarnaast je website linken aan een van je eigen (sub)domeinen. 
Dit zorgt ervoor dat de gebruikers niet zien dat Copernica de website host 
en laat je er betrouwbaarder en professioneler uitzien.

LET OP: Websites bouwen in Copernica vereist HTML kennis. Als je hier geen 
kennis van hebt kun je onze standaard template gebruiken, er een importeren 
vanaf het internet of een Copernica partner er een aan laten maken voor je.

Inhoud van het artikel:

* [Beginnen](./websites#beginnen)
* [Pagina's maken](./websites#paginas-maken)
* [Domein linken](./websites#domein-linken)
* [Link per email](./websites#link-per-email)
* [Standaardpagina's instellen](./websites#standaardpagina's-instellen)
* [Toegang beperken](./websites#toegang-beperken)
* [Meer informatie](./websites#meer-informatie)

## Beginnen

Je kunt het **Websites** menu vinden in het Publisher menu. Hier kun je een 
website aanmaken met verschillende webpagina's. We maken hier het onderscheid 
tussen een website en een webpagina: Webpagina's zijn vergelijkbaar met 
email documenten en gebruiken hun eigen templates. De website is het geheel 
van webpagina's.

De template is de bouwtekening van je website die bepaald hoe alles eruit 
moet zien en gestructureerd moet zijn. Omdat de template alleen de stijl 
en structuur bepaalt is het mogelijk deze voor meerdere pagina's te gebruiken. 
Als je overal dezelfde of een vergelijkbare template gebruikt maakt dat je 
site een goed geheel, al is het ook mogelijk overal andere templates te 
gebruiken. Na het aanmaken van een template kun je beginnen met content toevoegen 
zoals text, afbeeldingen en loop blokken. Je kunt deze ook [personaliseren](./personalization).

Een aantal aandachtspunten:
* Een website bevat webpagina's, die vergelijkbaar zijn met documenten.
* Pagina's kunnen gebaseerd zijn op dezelfde of verschillende templates.
* De website komt pas online beschikbaar nadat deze gelinkt is aan een 
domein of subdomein.
* Het is mogelijk om meerdere domeinen te hebben voor een website, maar 
niet om meerdere websites op een domein te hebben.
* Alleen websites met een valide domein worden gefactureerd. Je kunt je 
licensie informatie raadplegen voor de prijzen van websites.
* [Enquêtes](./surveys) en [webformulieren](./webforms) gemaakt in Copernica 
functioneren alleen op pagina's gehost door Copernica.

## Pagina's maken

Eerst zul je een nieuwe template aan moeten maken en een website onder 
**Websites** als je deze nog niet hebt. Je kunt dan de HTML broncode aanpassen 
om de template naar je eigen smaak aan te passen. Als je tevreden bent 
met de stijl kun je content blocks toe gaan voegen. Dit moet in de template 
gebeuren zodat je ze later in kan vullen. De onderstaande tabel laat 
voorbeelden zien van hoe je de blokken gebruikt. Vergeet niet de ratio 
tussen tekst en afbeeldingen in de gaten te houden; Deze kan invloed hebben 
op je [spam score](./some-tips-to-lower-your-email-spam-score).

| Content blok           | Voorbeeld                                          | Gebruik                                           |
|------------------------|----------------------------------------------------|---------------------------------------------------|
| [Text](./text-tag)     | [text name="tekstblok naam"]                       | Voeg tekst toe aan de webpagina                   |
| [Image](./image-tag)   | [image name="afbeeldingblok naam"]                 | Voeg afbeeldingen toe aan de webpagina            |
| [Loop](./loop-tag)     | [loop name="loop naam"]code om te herhalen[/loop]  | Herhaal afbeeldingen, tekst en andere loop blocks |
| [Survey](./surveys)    | {survey name="enquête naam"}                       | Voeg enquête gemaakt in **Content** toe             |
| [Webform](./webforms)  | {webform name="webformulier naam"}                 | Voeg webformulier gemaakt in **Content** toe        |

Media kan beheerd worden onder de *Media bibliotheek* onder het kopje 
**Content**. Je kunt afbeeldingen uit de media bibliotheek gebruiken met 
<img src="afbeelding.png"\>.

Het [loop blok](./loop-tag) kan heel handig zijn als je nog niet weet hoeveel afbeeldingen 
je wil gebruiken, of als niet alle pagina's even veel afbeeldingen gebruiken. 
Je kunt met het loop blok kiezen hoeveel afbeeldingen je in wil voegen tijdens 
het aanmaken van de webpagina, zonder de HTML te moeten aanpassen.

Je kunt als alternatief ook een [enquête](./surveys) of 
[webformulier](./webforms) toevoegen met de *Speciale content toevoegen* 
knop in het scherm waar je de inhoud van een tekstblok aanpast. Dit zal 
je tekstblok vervangen door de enquête of het webformulier.

Als je de template hebt aangemaakt kun je simpelweg een webpagina aanmaken 
en de content toevoegen.

### Informatie uit een URL gebruiken voor personalisatie

Het is mogelijk om de query string uit een URL te gebruiken in smarty
personalisatie. Hiervoor gebruik je de {$smarty.get.<query name\>}.

**Voorbeeld:** voeg de query *name=Sjon* toe aan de link URL van je
webpagina

http://mywebsite.example.com?name=Sjon

Voeg vervolgens de volgende smarty code toe aan jouw
webpagina **{$smarty.get.name}**

Toon de pagina gepersonaliseerd. De naam *Sjon* wordt weergegeven in je
document.


## Domein linken

Je website komt pas online beschikbaar (en wordt pas gefactureerd) als 
deze gelinkt is aan een valide domein. Je kunt ervoor kiezen om *www.jouwdomein.com* 
te gebruiken, of een subdomein als *enquetes.jouwdomein.com*. Welke je kiest 
hangt af van je behoeften. Als je een kleine website wil die wordt gehost 
door ons kun je ervoor kiezen deze te hosten op je algemene domein. Als je 
Copernica alleen wil gebruiken om enquêtes te versturen en behandelen is 
het bijvoorbeeld weer handiger om hier een apart subdomein voor aan te maken, 
zodat je daarnaast je eigen website kan hosten.

Een domein instellen:
1. Maak een nieuw subdomein aan in de DNS* van je website domein.
2. Maak een CNAME records aan die verwijst naar *publisher.copernica.com* 
om te verwijzen naar onze gehostte versie van je website. (Zie ook 
[Google CNAME help](https://support.google.com/a/answer/47283?hl=en))
3. Link het subdomein in Copernica via *Domeinen* in het website menu.

## Link per email

Slimme hyperlinks kunnen jou en je klant het leven gemakkelijk maken. Door 
login codes toe te voegen aan je hyperlinks kun je direct bij de informatie 
van het profiel, wat een aantal voordelen heeft: 

* Webformulieren kunnen alvast deels ingevuld worden met reeds bekende 
informatie.
* Enquête resultaten kunnen meteen gelinkt worden aan bestaande profielen. 
* Personalisatie met profieldata
* Gebruikers hoeven niet in te loggen

Je kunt hyperlinks voorbereiden met de *Hyperlinks voorbereiden* functie 
onder *Document* in het **E-mailings** menu of de volgende code toevoegen aan 
je hyperlink.

`http://subdomein.jouwdomein.nl/websitename?profile={$profile.id}&code={$profile.code}`

Zorg wel dat je altijd *profile* vervangt door *subprofile* als je 
subprofiles mailt.

## Standaardpagina's instellen

Er zijn een aantal standaardpagina's die erg handig zijn voor je website 
om te hebben. Je kunt deze configureren onder *Standaard webpagina's*.

* *Homepagina*: Hier belandt de gebruiker als ze geen specifieke webpagina 
hebben opgevraagd.
* *Foutpagina*: Hier belandt de gebruiker als ze naar een niet-bestaande 
pagina zijn gestuurd.
* *Inlogpagina*: De pagina die weergegeven wordt als een gebruiker in moet 
loggen om toegang te krijgen. Plaats hier ook een inlogformulier.

## Toegang beperken

De login pagina wordt getoond wanneer een gebruiker geen toegang heeft 
tot de huidige pagina. Je kunt de toegang instellen in het website menu. 
In hetzelfde menu vind je de optie om een webpagina (tijdelijk) offline 
te halen.

## Meer informatie

- [Statistieken](./statistics)
- [Website instellingen](./websites-settings)
