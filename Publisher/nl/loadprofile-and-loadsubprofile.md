# Loadprofile en loadsubprofile

Je past Smarty-personalisatie meestal toe op gegevens uit de geadresseerde database. Het kan echter ook voorkomen dat je meerdere databases met relevante data tot je beschikking hebt. De _loadprofile_-functie maakt het mogelijk om profielen uit andere databases in te laden. 

## Loadprofile

In het onderstaande voorbeeld worden profielgegevens vanuit een andere database (_DatabaseB_) ingeladen door middel van de _loadprofile_-functie:

`{loadprofile source="DatabaseB" assign=geladenprofiel}`

Bij _source_ vul je de naam in van de database waaraan je refereert. Die database dient zich binnen hetzelfde account te bevinden. Daarbij wordt alleen het eerste profiel opgehaald. Je roept deze aan door middel van de variabele _{$geladenprofiel.VELDNAAM}_.

Je haalt een specifiek profiel uit een database op door middel van een veldnaam. Stel bijvoorbeeld dat je beschikt over twee databases. _DatabaseA_ bevat profielen onder de veldnaam _Accountmanagers_. De bestemming die je uit _DatabaseB_ wilt ophalen heeft de waarde _Jan_. Je vindt die waarde in _DatabaseB_ onder de veldnaam _Voornaam_. In dat geval gebruik je de volgende code:

`{loadprofile source="DatabaseB" Voornaam=$profile.Accountmanager assign=geladenprofiel}`

Je kunt profielen ook uit een selectie ophalen. _Source_ moet dan naast de databasenaam ook de selectienaam (bijvoorbeeld _SelectieB_) bevatten, gescheiden door een punt:

`{loadprofile source="DatabaseB.SelectieB" assign=geladenprofiel}`

## Loadsubprofile

Je gebruikt de _loadsubprofile_-functie wanneer je subprofielgegevens wilt ophalen vanuit de geadresseerde database of een collectie in een andere database. Bij _source_ vul je dan zowel de databasenaam als de collectienaam in. Het gaat daarbij om de collectie waaruit je de subprofielen wilt ophalen. Een database kan immers meerdere collecties bevatten.

We halen het eerste subprofiel uit _CollectieB_ in _DatabaseB_ als volgt op:

`{loadsubprofile source="DatabaseB:CollectieB" profile=$profile.id assign=geladensubprofiel}`

Vervolgens kunnen we het geladen subprofiel oproepen door middel van de variabele _$geladensubprofiel_. Persoonsgegevens van bedrijfsmedewerkers binnen een collectie vragen we op door middel van de onderstaande code: 

```
{$geladensubprofiel.Voornaam}
```

### Meerdere (sub)profielen

Een database bevat meerdere profielen en subprofielen. Het kan dus voorkomen dat je meerdere (sub)profielen wilt inladen. 

Stel dat je bedrijfsprofielen opneemt in de database _Relaties_. Hierin bevindt zich ook de collectie _Medewerkers_. De collectie bevat gegevens van één of meer bedrijfsmedewerkers. 

In dit geval willen we een e-mail versturen naar alle bedrijven in de _Relaties_-database. De e-mail dient voor elk afzonderlijk bedrijf informatie te bevatten over de bij ons bekende medewerkers. We halen daarom alle subprofielen uit de collectie _Medewerkers_ op. We gebruiken hiervoor de _multiple_-optie:

`{loadsubprofile source="Relaties:Medewerkers" profile=$profile.id assign=geladensubprofielen multiple=true}`

Door middel van de bovenstaande code worden alle subprofielen ingeladen die bij je bestemming horen. Deze worden opgehaald uit de collectie _Medewerkers_ (binnen de _Relaties_-database). Alle bijbehorende subprofielen worden in _$geladensubprofielen_ opgenomen.

De variabele _$geladensubprofielen_ vormt een lijst van gegevens. Zo'n variabele wordt een **array** genoemd. Om deze systematisch te doorlopen maken we gebruik van de _foreach_-functie. Vervolgens willen we de opgehaalde subprofielen in de mail plaatsen. Uitgaande van het bovenstaande voorbeeld gebeurt dat als volgt:

```
{foreach $geladensubprofielen as $geladensubprofiel} 
    Voornaam: {$geladensubprofiel.Voornaam}<br />
    Achternaam: {$geladensubprofiel.Achternaam}<br /> 
    Email: {$geladensubprofiel.Emailadres}<br />
{/foreach}
```

Bij het doorlopen van de array _$geladensubprofielen_ wordt het huidige subprofiel telkens in _$geladensubprofiel_ opgenomen. Vervolgens printen we de inhoud van de velden _Voornaam_, _Achternaam_ en _Emailadres_ op overzichtelijke wijze.

## Overige opties

Naast de _multiple_-optie zijn er ook andere opties beschikbaar, waaronder:

* **limit**: Wanneer je bij het gebruik van _multiple_ niet alle subprofielen nodig hebt kun je een beperking opleggen door middel van de _limit_-optie. De code _limit=5_ beperkt het aantal geladen subprofielen bijvoorbeeld tot 5.
* **profile**: Je gebruikt _profile_ om alle subprofielen op te halen die behoren tot het geadresseerde profiel. Wanneer je deze optie weglaat worden alle (sub)profielen geladen.
* **orderby='veldnaam asc/desc'**: Je gebruikt _orderby_ om de resultaten van meerdere geladen (sub)profielen (_multiple=true_) te sorteren. Tussen de accolades zet je de naam van het veld waarop je wilt sorteren. Daarachter zet je _asc_ of _desc_ om op oplopende- (_asc_) of aflopende (_desc_) volgorde te sorteren. Maak je geen gebruik van de _orderby_-optie? Dan wordt er aflopend gesorteerd op basis van ID.

## In de praktijk

In een eerder voorbeeld verstuurden we een mail naar alle bedrijven in onze _Relaties_-database. De benodige informatie over bedrijfsmedewerkers haalden we op uit de collectie _Medewerkers_. 

Stel nu dat we maximaal 5 subprofielen willen ophalen. Daarnaast willen we de resultaten in aflopende volgorde sorteren op basis van voornaam. De gebruikte code ziet er dan als volgt uit:

```
{loadsubprofile source="Relaties:Medewerkers" profile=$profile.id assign=geladensubprofielen multiple=true limit=5 orderby='Voornaam desc'}

Geachte {$Bedrijfsleider},

Van uw bedrijf, {$Bedrijf}, zijn de volgende medewerkers bekend:
{foreach $geladensubprofielen as $geladensubprofiel}
    - {$geladensubprofiel.Voornaam} {$geladensubprofiel.Achternaam}, email: {$geladensubprofiel.Emailadres};
{/foreach}
```

Het resultaat:

```
Geachte Jan Janssen,

Van uw bedrijf, Voorbeeld B.V., zijn de volgende medewerkers bekend:
     - Freek Frekens, email:  f.frekens@voorbeeldbv.nl;
     - Egbert Douwe, email:  e.douwe@voorbeeldbv.nl;
     - Douwe Egberts, email:  d.egberts@voorbeeldbv.nl;
     - Charles Fransman, email:  c.fransman@voorbeeldbv.nl;
     - Bert Bakker, email: b.bakker@voorbeeldbv.nl;
```
