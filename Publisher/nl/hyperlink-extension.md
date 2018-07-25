# Hyperlinks uitbreiden in Publisher

Door hyperlinks uit te breiden kun je speciale 'tracking'-codes toevoegen 
om meer informatie te verschaffen aan de pagina's waar je naar linkt. 
Dit wordt ook wel "hyperlink tagging" of "hyperlink extension" genoemd. 
In dit artikel bespreken we de applicaties van hyperlink extension en 
bespreken we de mogelijkheden binnen onze software.

Let op: Hyperlinks uitbreiden is alleen mogelijk als het nieuwe link tracking 
systeem wordt gebruikt!

## Waarom hyperlinks uitbreiden?

Er zijn veel toepassingen voor het uitbreiden van hyperlinks. Voorbeelden 
van toepassingen zijn:

- *Website verkeer tracken*: Elke link komt ergens vandaan, bijvoorbeeld van 
social media, uit een e-mail of van een zoekmachine. Door de hyperlink uit te 
breiden met een bron kun je bijhouden hoe mensen op jouw website terecht 
komen, zodat je in de toekomst mogelijk meer verkeer kunt genereren voor 
je website.
- *Automatisch inloggen*: Als een gebruiker vanuit jouw e-mail op een link 
klikt kun je waarden uit het profiel meegeven. Zo kun je bijvoorbeeld login 
waardes meegeven en de gebruiker alvast inloggen op je website.
- *Google Analytics/AdWords verrijken*: Google Analytics en AdWords 
zijn services om meer inzicht te krijgen in je website of advertenties 
respectievelijk. Met hyperlink uitbreiding kun je meer informatie doorgeven 
aan deze services om je data verder te verrijken.

## Toepassen op jouw domein(en)

Met Copernica kun je hyperlink extensie niet alleen toepassen op individuele 
links, maar ook op volledige (sub)domeinen. Hierdoor kun je bijvoorbeeld 
alle hyperlinks naar `enquetes.voorbeeld.nl` informatie meegeven om in te loggen, 
waardoor je informatie makkelijk aan profielen kan koppelen en je website 
meteen gebruiksvriendelijker maakt.

Mocht je dit willen uitvoeren in de software open je eerst het "Hyperlinks 
uitbreiden" menu in de template editor. Hier kun je bij domein `enquetes.voorbeeld.nl` 
invullen. Vervolgens kun je bij "Extra parameters" bijvoorbeeld een parameter 
aanmaken met de naam "gebruikersnaam". Als je veld voor de gebruikersnaam 
dan "gebruikersnaam" heet in je database koppel je deze door `{$profile.gebruikersnaam}` 
in te vullen bij de waarde van de parameter.

Als je meerdere domeinen hebt kun je een zogenaamde wildcard ('\*' symbool) 
gebruiken om aan te geven welke domeinen gematcht moeten worden. Zo matcht 
`\*.voorbeeld.nl` bijvoorbeeld alle subdomeinen van `voorbeeld.nl`. Er zijn 
echter wel een aantal regels:

- Er mag maar een wildcard voorkomen.
- De wildcard mag alleen het eerste karakter zijn en matcht een volledige 
naam.

Dit betekent dat `\*.\*.domein.nl`, `subsubdomein.\*.domein.nl`, `\*iets.domein.nl` 
niet geldig zijn, maar `\*.subdomein.domein.nl` bijvoorbeeld wel.

## Google analytics/Adwords parameters

Google analytics heeft ingebouwde ondersteuning voor een aantal parameters, zoals 
de bron, het medium, het zoekwoord, de campagne en de inhoud. Je kunt hier meer 
over lezen in [dit Google artikel](https://support.google.com/analytics/answer/1033173?hl=nl&topic=1631856&ctx=topic).

## Extra parameters

De extra parameters zijn alle parameters die niet gebruikt worden door 
Google services. Je kunt hiervoor zelf een naam en waarde specificeren. 
Je kunt zowel de naam als de waarde personalizeren met elke waarde 
die ook beschikbaar is binnen templates. Je kunt bijvoorbeeld "achternaam" 
meegeven als naam en `{$profile.achternaam}` om de achternaam van de 
gebruiker uit de database te gebruiken.

## Meer informatie
