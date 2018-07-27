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

Je kunt hyperlinks gepersonaliseerd uitbreiden in de marketing suite. Dit gaat per domein. Per domein kun je aangeven of je tracking codes wilt gebruiken voor Google Analytics of niet. Je kunt zowel personalisatie gebruiken in de parameters als in de waarde.

## Hyperlinks uitbreiden in de Publisher

Let op: Op deze manier hyperlinks uitbreiden is alleen mogelijk als het nieuwe link tracking systeem wordt gebruikt! [Hyperlings uitbreiden met het oude link tracking systeem werkt net even anders](#met-het-oude-link-tracking-systeem).

Met het nieuwe link tracking systeem worden alle links op het laatste moment aangepast. Je kunt nu bijvoorbeeld dit ook gebruiken: `<a href="[text name="mijnlink"]"></a>`

Voorbeeld van hyperlink die wordt gepersonaliseerd met de unieke
inloggegevens van de ontvanger:

    http://www.mijnbedrijf.nl/gegevens-wijzigen?profile={$profile.id}&code={$profile.code}

Het is ook mogelijk een volledige URL in een databaseveld op te slaan
bij het profiel of subprofiel.

    <a href="{$url}">Ga naar website</a>

Desgewenst aangevuld met inlogcode

    <a href="{$url}?profile={$profile.id}&code={$profile.code}">Ga naar website</a>

### URL zit in subprofiel

Als je een e-mailing richt aan een profiel, en je wilt de URL
personaliseren met gegevens uit een subprofiel onder dit profiel, dan
gebruik je hiervoor de loadsubprofile functie, bijvoorbeeld:

    <a href="{loadsubprofile source='databasenaam:collectienaam' assign=ls profile=$profile.id}{$ls.url}">Ga naar uw persoonlijke pagina</a>

### Toepassen op verschillende domeinen

Met de Copernica publisher kun je hyperlink extensie niet alleen toepassen op individuele 
links, maar ook op (sub)domeinen. Hierdoor kun je bijvoorbeeld alle hyperlinks naar `enquetes.voorbeeld.nl` informatie meegeven om in te loggen, waardoor je informatie makkelijk aan profielen kan koppelen en je website meteen gebruiksvriendelijker maakt.

Mocht je dit willen uitvoeren in de software open je eerst het "Hyperlinks uitbreiden" menu in de template editor. Hier kun je bij domein `enquetes.voorbeeld.nl` invullen. Vervolgens kun je bij "Extra parameters" bijvoorbeeld een parameter aanmaken met de naam "gebruikersnaam". Als je veld voor de gebruikersnaam dan "gebruikersnaam" heet in je database koppel je deze door `{$profile.gebruikersnaam}` in te vullen bij de waarde van de parameter.

Als je meerdere domeinen hebt kun je een zogenaamde wildcard ('\*' symbool) gebruiken om aan te geven welke domeinen gematcht moeten worden. Zo matcht `*.voorbeeld.nl` bijvoorbeeld alle subdomeinen van `voorbeeld.nl`. Er zijn echter wel een aantal regels:

- Er mag maar een wildcard voorkomen.
- De wildcard mag alleen het eerste karakter zijn en matcht een volledige naam.

Dit betekent dat `*.*.domein.nl`, `subsubdomein.*.domein.nl`, `*iets.domein.nl` niet geldig zijn, maar `*.subdomein.domein.nl` bijvoorbeeld wel.

### Extra parameters

De extra parameters zijn alle parameters die niet gebruikt worden door Google services. Je kunt hiervoor zelf een naam en waarde specificeren. Je kunt zowel de naam als de waarde personaliseren met elke waarde die ook beschikbaar is binnen templates. Je kunt bijvoorbeeld "achternaam" meegeven als naam en `{$profile.achternaam}` om de achternaam van de gebruiker uit de database te gebruiken.

Je kunt ook speciale links maken waarmee mensen een gepersonaliseerde webpagina zien. Lees hier meer over in [dit documentatieartikel](websites).

## Met het oude link tracking systeem

Het werkte vroeger net even wat anders waardoor er links niet werkten. Een e-mail wordt namelijk met het oude link tracking systeem op twee verschillende momenten gepersonaliseerd:

1.  Het document wordt gepersonaliseerd bij het samenstellen van de mailing (vlak voordat deze naar de outbox wordt geplaatst)
2.  Smarty code binnen hyperlinks wordt door onze picserver verwerkt, en wordt pas uitgevoerd direct nadat de ontvanger op de hyperlink klikt.

De smarty code uit het document is op dat moment dus al uitgevoerd, en niet meer beschikbaar.

Onderstaand voorbeeld zal wel werken wanneer je deze in Copernica test, maar in de verstuurde e-mail zal de ontvanger na het klikken op een blanco pagina terechtkomen, omdat de capture als is uitgevoerd.

    {capture assign="url"}http://www.google.nl{/capture}<a href="{$url}">Ga naar google.nl</a> 

Om de link te laten werken, moet de variabel dus ook in de link worden
aangemaakt.

    <a href="{capture assign="url"}http://www.google.nl{/capture}{$url}">Ga naar google.nl</a>

Als je om redenen niet in iedere hyperlink een hele berg code wilt
opnemen (bijvoorbeeld om de templatecode in zijn geheel overzichtelijk
te houden) dan kan je ervoor kiezen geen kliks te registreren bij de
e-mailing. Deze instelling vind je in het tabblad 'opties' in de tweede
stap in het dialoogvenster om een bulkmailing te versturen. De ontvanger
wordt bij het klikken op de link niet langer geredirect via onze
picserver en de link wordt tegelijkertijd met het document
gepersonaliseerd. Maar er worden geen kliks meer geregistreerd. Die
afweging zal je moeten maken.
