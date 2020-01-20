# E-mailings: Waarom wordt mijn variabele niet getoond in mijn document?

## Profielwaardes
De veldwaardes uit een profiel zijn op te halen d.m.v. {$profile.veldnaam}.
Het tonen van deze waardes kan op een aantal punten foutgaan:

### Geen of standaardbestemming in andere database
Het is van belang dat de gekozen standaardbestemming in dezelfde database zit als waar jij de waardes van wilt inzien in je e-mail. 

### Hoofdlettergevoelig
Als je veld in de database een hoofdletter bevat, zal dit ook in de tag met een hoofdletter opgenomen moeten worden. 

Hieronder enkele voorbeelden:
Emailadres	=	{$profile.Emailadres}
emailadres	=	{$profile.emailadres}
emailAdres	=	{$profile.emailAdres}

Voor subprofielen geldt hetzelfde enkel dien je dan gebruik te maken van {$subprofile.veldnaam}. Dit werkt enkel als het subprofiel ook de bestemming van je e-mail is. Als je wilt versturen naar het profiel met gegevens uit het subprofiel dien je gebruik te maken van de loadsubprofile-tag. Meer hierover in de volgende alinea.

## Waardes uit een loadsubprofile-tag
Als je bepaalde waardes verwacht uit je loadsubprofile-tag is het verstandig om debug code toe te voegen aan je template. Zo kun je exact zien waar het fout gaat in je foreach of if-statements.

**Voorbeeld:**
```
{loadsubprofile source="standaard:Aankopen" profile=$profile.id assign="loadedsubprofiles" multiple=true}
{foreach from=$loadedsubprofiles item=sp}
  {if $sp.Beschrijving == "Potlood"}
    +{$profile.id} -- {$sp.id}+ <br />
	{/if}
{/foreach}
```

**Uitkomst:**
```
+1210558 -- 406246+
```

Aan de hand hiervan kun je zien dat enkel subprofiel 406246 aan je if-statement voldoet.
Als er geen subprofiel aan je conditie voldoet, krijg je niets terug. In dit geval zal je de debug code een regel hoger kunnen plaatsen, maar dan met een andere waarde.

**Voorbeeld:**
```
{loadsubprofile source="standaard:Aankopen" profile=$profile.id assign="loadedsubprofiles" multiple=true}
{foreach from=$loadedsubprofiles item=sp}
  +{$profile.id} -- {$sp.Beschrijving}+ <br />
  {if $sp.Beschrijving == "Potlood"}
    // hier je tekst
	{/if}
{/foreach}
```

**Uitkomst:**
```
+1210558 -- Pen+ 
+1210558 -- Gum+
```

Zoals je kunt zien komt er uit {$sp.Beschrijving} nu 'Pen' en 'Gum'. Aangezien dit niet gelijk is aan 'Potlood' zie je niets in je if-statement.
