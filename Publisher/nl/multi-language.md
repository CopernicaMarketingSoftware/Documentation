# Vertaalmodule

*Let op: het gebruik van de vertaalmodule is enkel mogelijk in drag-and-drop-templates.*

Met de vertaalmodule is het mogelijk om een template beschikbaar te maken in meerdere talen. Op basis van het taalveld in het profiel wordt de juiste versie van de template naar het juiste profiel verzonden.

Op dit moment kun je gebruik maken van de bètaversie van de vertaalmodule. Je activeert de module via het menu-item [Configuratie](https://ms.copernica.com/#/admin), onder het kopje [Bètamodules](https://ms.copernica.com/#/admin/user/betamodules). De vertaalmodule is vervolgens te gebruiken via de optie 'Vertalen' in je templates.

## Vertalen van je template
In Copernica heeft ieder template een *standaardtaal*. Deze standaardtaal geef je op bij het aanmaken van een template en kun je terugvinden in de toolbar onderaan je template of via 'Configuratie -> Personalisatie-instellingen -> Taal'.

Als je een opgemaakte template wilt vertalen, kies je onderin de toolbar voor 'Voeg vertaalde versie toe'. Hier geef je de taal op waarin je de template wilt vertalen. Er wordt nu een kopie van de template gemaakt, alleen met een aangepaste taal-instelling.

In de toolbar bovenin de template kun je vervolgens kiezen voor de knop 'Vertalen'. In deze slide zie je bovenin welke taal van je template je aan het aanpassen bent. Je hebt de mogelijkheid om de volgende elementen te vertalen:
- Headers
- Teksten
- Links
- Afbeeldingen
- Tekstversie

Binnen deze elementen vind je een kolom met de waarde uit je hoofdtemplate en een kolom met de waarde voor de vertaalde versie. 
Nadat je de waardes van de vertaalde versie, in de rechterkolom, hebt aangepast klik je rechtsboven op 'Opslaan'.

## Taalinstellingen van je profielen
Om ervoor te zorgen dat het juiste profiel de juiste versie van je mailing ontvangt, moet je éénmalig een veld van het type 'Taal' toevoegen aan je [database](https://ms.copernica.com/#/profiles)

Per profiel kun je nu aangeven welke versie van je templates verzonden moet worden. Binnen een database of selectie kun je via de optie 'Configuratie -> Profielen bewerken' in één keer alle profielen op dezelfde waarde zetten. Een andere optie is om gebruik te maken van de [export-](https://www.copernica.com/nl/documentation/database-export) en [importfunctie](https://www.copernica.com/nl/documentation/database-import) binnen je database. 

De volgende veldwaardes zijn beschikbaar:

| Taal       | Veldwaarde |
|------------|------------|
| Bulgaars   | bg_BG      |
| Deens      | da_DK      |
| Duits      | de_DE      |
| Engels     | en_US      |
| Fins       | fi_FI      |
| Grieks     | el_GR      |
| Italiaans  | it_IT      |
| Kroatisch  | hr_HR      |
| Nederlands | nl_NL      |
| Noors      | no_NO      |
| Pools      | pl_PL      |
| Portugees  | pt_PT      |
| Russisch   | ru_RU      |
| Sloveens   | sl_SI      |
| Spaans     | es_ES      |
| Tsjechisch | cs_CZ      |
| Turks      | tr_TR      |
| Zweeds     | sv_SE      |

*Let op: profielen zonder een waarde in het taalveld ontvangen automatisch het hoofdtemplate.*

## Importeren en exporteren van vertalingen
Naast het vertalen via de interface, is het mogelijk om een export te maken van alle elementen in je template en deze te importeren na de wijzigingen.

Om een export te maken ga je naar 'Vertalen -> Exporteren' binnen je hoofdtemplate of een vertaalde versie. Het export-bestand bestaat uit een kolom waarin het ID staat van het element dat wordt vertaald. Dit ID is nodig om bij het importeren te weten welke tekst aangepast moet worden. Naast de kolom met het ID, vind je ook een kolom per taal waarin de template beschikbaar is. 

Nadat je de aanpassingen hebt doorgevoerd, kun je het bestand importeren via 'Vertalen -> Importeren'. De wijzigingen worden direct doorgevoerd in alle versies van je templates.

## Versturen van je templates
Om templates met meerdere talen te versturen kies je in het hoofdtemplate voor 'Verzendopties -> Bulkmailing'. Onder '*Opties*' zie je dat de template automatisch wordt verzonden in de beschikbare talen. 

Bij het inroosteren geef je één bestemming op. Op basis van het taalveld in het profiel zorgt Copernica er automatisch voor dat de juiste template naar het juiste profiel wordt verzonden. Een profiel ontvangt het hoofdtemplate wanneer een waarde in het taalveld ontbreekt.

## Statistieken inzien
Bij het verzenden wordt voor iedere taal een losse mailing aangemaakt. Hierdoor is het mogelijk om in de [resultaten-module](https://ms.copernica.com/#/results/sentmailings) de statistieken per taal in te zien. 

Naast het inzien van de resultaten per taal, heb je in het overzicht van de [resultaten-module](https://ms.copernica.com/#/results/sentmailings) de mogelijkheid om de statistieken bij elkaar opgeteld in te zien. Hiervoor klik je op de tag 'Meertaligheid: [taal]'. 
