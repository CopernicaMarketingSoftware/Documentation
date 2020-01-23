# E-mailings: Waarom wordt mijn variabele niet getoond in mijn document?

## Profielwaardes
De veldwaardes uit een profiel zijn op te halen d.m.v. {$profile.veldnaam}.
Het tonen van deze waardes kan op een aantal punten foutgaan:

### Geen of standaardbestemming in andere database
Het is van belang dat de gekozen standaardbestemming in dezelfde database zit als waar jij de waardes van wilt inzien in je e-mail. 

De standaardbestemming kun je als volgt instellen:  
    
**Publisher:** Zoek het juiste profiel op in je database en open deze zodat de gegevens onderin het scherm zichtbaar worden. In de onderste balk is nu een optie 'Standaardbestemming' zichtbaar waar je het gekozen profiel als standaardbestemming kunt instellen.  

**Marketing Suite:** Zoek het juiste profiel op in je database en open deze zodat de gegevens zichtbaar worden. Aan de linkerkant is nu een optie 'Standaardbestemming' zichtbaar waar je het gekozen profiel als standaardbestemming kunt instellen.  

### Hoofdlettergevoelig
Als je veld in de database een hoofdletter bevat, zal dit ook in de tag met een hoofdletter opgenomen moeten worden. 

Hieronder enkele voorbeelden:  
Emailadres	=	{$profile.Emailadres}  
emailadres	=	{$profile.emailadres}  
emailAdres	=	{$profile.emailAdres}  

Voor subprofielen geldt hetzelfde, enkel dien je dan gebruik te maken van {$subprofile.veldnaam}. Dit werkt alleen als het subprofiel ook de bestemming van je e-mail is. Als je wilt versturen naar het profiel met gegevens uit het subprofiel dien je gebruik te maken van de loadsubprofile-tag. Meer hierover in de volgende alinea.

## Waardes uit een loadsubprofile-tag
Als je bepaalde waardes verwacht uit de loadsubprofile-tag is het verstandig om debug code toe te voegen aan je template. Zo kun je exact zien waar het fout gaat in je foreach of if-statements.

**Voorbeeld:**
```
{loadsubprofile source="Standaard:Aankopen" profile=$profile.id assign="loadedsubprofiles" multiple=true}
{foreach from=$loadedsubprofiles item=aankoop}
  {if $aankoop.Beschrijving == "Potlood"}
    +{$profile.id} -- {$aankoop.id}+ <br />
	{/if}
{/foreach}
```

**Uitkomst:**
```
+1 -- 99+
```

Aan de hand hiervan kun je zien dat enkel subprofiel 99 aan je if-statement voldoet.
Als er geen subprofiel aan je conditie voldoet, krijg je niets terug. In dit geval zal je de debug code een regel hoger kunnen plaatsen, maar dan met een andere waarde.

**Voorbeeld:**
```
{loadsubprofile source="Standaard:Aankopen" profile=$profile.id assign="loadedsubprofiles" multiple=true}
{foreach from=$loadedsubprofiles item=aankoop}
  +{$profile.id} -- {$aankoop.Beschrijving}+ <br />
  {if $aankoop.Beschrijving == "Potlood"}
    // hier je tekst
	{/if}
{/foreach}
```

**Uitkomst:**
```
+1 -- Pen+ 
+1 -- Gum+
```

Zoals je kunt zien komt er uit {$sp.Beschrijving} nu 'Pen' en 'Gum'. Aangezien dit niet gelijk is aan 'Potlood' zie je niets in je if-statement.
