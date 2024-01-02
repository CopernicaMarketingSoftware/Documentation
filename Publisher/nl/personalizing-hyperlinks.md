# Hyperlinks uitbreiden en personaliseren

Door hyperlinks uit te breiden kun je speciale 'tracking'-codes toevoegen om meer informatie te verschaffen aan de pagina's waar je naar linkt. Dit wordt ook wel "hyperlink tagging" of "hyperlink extension" genoemd. In dit artikel bespreken we de applicaties van hyperlink extension en bespreken we de mogelijkheden binnen onze software.

Hyperlinks in e-mailings kunnen worden aangevuld met gegevens uit een profiel of subprofiel. Een voorbeeld hiervan zijn unieke inloggegevens ($profile.id en $profile.code) die je in de hyperlink meestuurt, zodat relaties automatisch worden ingelogd als zij vanuit een e-mail naar een webpagina klikken met die door Copernica is gehost.

## Waarom hyperlinks uitbreiden?

Er zijn veel toepassingen voor het uitbreiden van hyperlinks. Voorbeelden 
van toepassingen zijn:

- *Website verkeer tracken*: Elke link komt ergens vandaan, bijvoorbeeld van social media, uit een e-mail of van een zoekmachine. Door de hyperlink uit te breiden met een bron kun je bijhouden hoe mensen op jouw website terecht komen, zodat je in de toekomst mogelijk meer verkeer kunt genereren voor je website.
- *Automatisch inloggen*: Als een gebruiker vanuit jouw e-mail op een link klikt kun je waarden uit het profiel meegeven. Zo kun je bijvoorbeeld login waardes meegeven en de gebruiker op deze manier inloggen op je website.
- *Google Analytics*: Met Google Analytics kun je inzicht krijgen in je website verkeer vanuit campagnes, advertenties en mailings. Met het uitbreiden van hyperlinks kun je meer informatie doorgeven aan deze service om je data verder te verrijken.

## Google analytics UTM tracking code

Google analytics heeft ondersteuning voor een aantal specifieke parameters, zoals 
de bron, het medium, het zoekwoord, de campagne en de inhoud. Je kunt hier meer 
over lezen in [dit artikel](https://support.google.com/analytics/answer/1033173?hl=nl&topic=1631856&ctx=topic).

## Hyperlinks uitbreiden in de Marketing suite

### Stap 1 - Aanmaken van de hyperlinkconfiguratie

Om hyperlinks in de Marketing Suite uit te breiden, open je eerst de E-mail-editor. Hier kies je vervolgens voor 'Gereedschap', rechts van de optie 'Aanmaken'. In het configuratiescherm, kies je links voor 'Standaard hyperlinkconfiguraties'. Als je al eerder hyperlinkconfiguraties hebt ingesteld, zie je deze hier in een overzicht staan. Om een nieuwe hyperlinkconfiguratie toe te voegen kies je rechtsboven voor 'Hyperlinkconfiguratie toevoegen'.

### Stap 2 - Instellen van de hyperlinkconfiguratie

Vervolgens kies je bovenin voor de optie 'Uitbreiden voor Google Analytics'. In dit scherm kun je de standaardinstellingen van je hyperlinkconfiguratie instellen.
Als alles naar wens is ingesteld, klik je rechtsboven op 'Niet-opgeslagen wijzigingen' om de configuratie op te slaan en een naam te geven.

### Stap 3 - Toepassen van de hyperlinkconfiguratie

Na het instellen van de standaardinstellingen heb je in principe twee opties. Je kunt de zojuist aangemaakte hyperlinkconfiguratie selecteren bij het aanmaken van een nieuw template en je kunt bij een al bestaand template kiezen om de hyperlinkconfiguratie te gebruiken.

Om de hyperlinkconfiguratie bij een nieuw template te gebruiken, kies je in het scherm 'Template aanmaken', waar je je template ook een naam kan geven, onderin voor 'Een hyperlinkconfiguratie kiezen voor je nieuwe template'. Hier krijg je vervolgens een overzicht van alle reeds aangemaakte hyperlinkconfiguraties.

Om de hyperlinkconfiguratie toe te voegen aan een al bestaand template open je eerst het gewenste template, daar ga je naar 'Configuratie' en in het templateconfiguratiescherm kies je vervolgens links in het blauwe menu voor 'Hyperlinks uitbreiden'. Als hier nog geen standaard hyperlinkconfiguratie regels zijn ingesteld, kun je kiezen voor 'Een standaardconfiguratie kiezen'. Ook hier krijg je dan een overzicht te zien van alle reeds aangemaakte hyperlinkconfiguraties waar je uit kunt kiezen.

### Hyperlinks uitbreidingen aanpassen

Zodra je een standaard hyperlinkconfiguratie hebt geladen, zie je alle instellingen overzichtelijk onder elkaar. 
Aanpassingen binnen de hyperlinkconfiguratie van je template hebben geen invloed op de standaardconfiguratie.

## Hyperlinks uitbreiden in de Publisher

Let op: Op deze manier hyperlinks uitbreiden is alleen mogelijk als het nieuwe link tracking systeem wordt gebruikt! [Hyperlinks uitbreiden met het oude link tracking systeem werkt net even anders](#met-het-oude-link-tracking-systeem).

In het dialoogvenster hyperlinks uitbreiden kun je zowel op template niveau als op document niveau hyperlinks uitbreiden. Deze instellingen worden samengevoegd. Als het document dezelfde parameters gebruikt als in het template worden deze overschreven.

Met het nieuwe link tracking systeem worden alle links op het laatste moment aangepast. In de voorbeeldweergave zal de hele url getoont worden maar in de bewerkmodes zal de hyperlink niet worden uitgebreid. De links worden pas uitgebreid na het personalizeren van het document, in de laatste stap voor het verzenden.

Het is ook mogelijk een volledige URL in een databaseveld op te slaan bij het profiel of subprofiel.

    <a href="{$profile.url}">Ga naar website</a>
    
Of in een text block:

    <a href="[text name="mijnlink"]"></a>
    
### Specifieke hyperlinks testen

Met de parameter utm_content kun je onderscheid maken tussen vergelijkbare content of links die verwijzen naar dezelfde advertentie. Als er bijvoorbeeld in een e-mailbericht twee call-to-action-links zijn opgenomen, kun je de parameter 'utm_content' gebruiken om voor beide links verschillende waarden in te stellen. Op deze manier kun je bepalen welke link effectiever is."

Als je wilt weten op welke specifieke link mensen drukken laat je die leeg in het dialoogvenster 'Hyperlinks uitbreiden'
en vul je op de links in je document de parameter utm_content toe.

```
<a href="https://www.example.com/ad?utm_content=top-link">
    link
</a>

<a href="https://www.example.com/ad?utm_content=bottom-link">
    link
</a>
```

### URL zit in subprofiel

Als je een e-mailing richt aan een profiel, en je wilt de URL personaliseren met gegevens uit een subprofiel onder dit profiel, dan gebruik je hiervoor de loadsubprofile functie, bijvoorbeeld:

```
<a href="{loadsubprofile source='databasenaam:collectienaam' assign=ls profile=$profile.id}{$ls.url}">
    Ga naar uw persoonlijke pagina
</a>
```

### Toepassen op verschillende domeinen

Met de Copernica publisher kun je hyperlink extensie niet alleen toepassen op individuele links, maar ook op (sub)domeinen. Hierdoor kun je bijvoorbeeld alle hyperlinks naar `enquetes.voorbeeld.nl` informatie meegeven om in te loggen, waardoor je informatie makkelijk aan profielen kan koppelen en je website meteen gebruiksvriendelijker maakt.

Mocht je dit willen uitvoeren in de software open je eerst het "Hyperlinks uitbreiden" menu in de template editor. Hier kun je bij domein `enquetes.voorbeeld.nl` invullen. Vervolgens kun je bij "Extra parameters" bijvoorbeeld een parameter aanmaken met de naam "gebruikersnaam". Als je veld voor de gebruikersnaam dan "gebruikersnaam" heet in je database koppel je deze door `{$profile.gebruikersnaam}` in te vullen bij de waarde van de parameter.

Als je meerdere domeinen hebt kun je een zogenaamde wildcard ('\*' symbool) gebruiken om aan te geven welke domeinen gematcht moeten worden. Zo matcht `*.voorbeeld.nl` bijvoorbeeld alle subdomeinen van `voorbeeld.nl`. Er zijn echter wel een aantal regels:

- Er mag maar een wildcard voorkomen.
- De wildcard mag alleen het eerste karakter zijn en matcht een volledige naam.

Dit betekent dat `*.*.domein.nl`, `subsubdomein.*.domein.nl`, `*iets.domein.nl` niet geldig zijn, maar `*.subdomein.domein.nl` bijvoorbeeld wel.

### Extra parameters

De extra parameters zijn alle parameters die niet gebruikt worden door Google services. Je kunt hiervoor zelf een naam en waarde specificeren. Je kunt zowel de naam als de waarde personaliseren met elke waarde die ook beschikbaar is binnen templates. Je kunt bijvoorbeeld "achternaam" meegeven als naam en `{$profile.achternaam}` om de achternaam van de gebruiker uit de database te gebruiken.

Je kunt ook speciale links maken waarmee mensen een gepersonaliseerde webpagina zien. Lees hier meer over in [dit documentatieartikel](websites).

Dit kan met zo'n link:

```
<a href="https://www.example.com?profile={$profile.id}&code={$profile.code}">
    Ga naar deze website
</a>
```

## Met het oude link tracking systeem

Het werkte vroeger net even wat anders waardoor er links niet werkten. Een e-mail wordt namelijk met het oude link tracking systeem op twee verschillende momenten gepersonaliseerd:

1.  Het document wordt gepersonaliseerd bij het samenstellen van de mailing (vlak voordat deze naar de outbox wordt geplaatst)
2.  Smarty code binnen hyperlinks wordt door onze picserver verwerkt, en wordt pas uitgevoerd direct nadat de ontvanger op de hyperlink klikt.

De smarty code uit het document is op dat moment dus al uitgevoerd, en niet meer beschikbaar.

Onderstaand voorbeeld zal wel werken wanneer je deze in Copernica test, maar in de verstuurde e-mail zal de ontvanger na het klikken op een blanco pagina terechtkomen, omdat de capture als is uitgevoerd.

``` 
{capture assign="url"}http://www.google.nl{/capture}
<a href="{$url}">
    Ga naar google.nl
</a>
```

Om de link te laten werken, moet de variabel dus ook in de link worden
aangemaakt.

```
<a href="{capture assign="url"}http://www.google.nl{/capture}{$url}">
    Ga naar google.nl
</a>
```

Als je om redenen niet in iedere hyperlink een hele berg code wilt opnemen (bijvoorbeeld om de templatecode in zijn geheel overzichtelijk te houden) dan kan je ervoor kiezen geen kliks te registreren bij de e-mailing. Deze instelling vind je in het tabblad 'opties' in de tweede stap in het dialoogvenster om een bulkmailing te versturen. De ontvanger wordt bij het klikken op de link niet langer geredirect via onze picserver en de link wordt tegelijkertijd met het document gepersonaliseerd. Maar er worden geen kliks meer geregistreerd. Die afweging zal je moeten maken.
