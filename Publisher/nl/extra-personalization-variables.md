# Extra personalisatievariabelen

Je personaliseert mailings doorgaans met gegevens van de geadresseerde. Alle velden die betrekking hebben tot de geadresseerde kunnen als personalisatievariabele worden gebruikt. De velden *'voornaam'*, *'achternaam'*, *'woonplaats'* en *'emailadres'* komen bijvoorbeeld overeen met de volgende personalisatievariabelen:

* **{$profile.voornaam}**
* **{$profile.achternaam}**
* **{$profile.woonplaats}**
* **{$profile.emailadres}**

Daarnaast kun je gebruik maken van extra personalisatievariabelen in de vorm van voorgedefineerde objecten. Een
overzicht hiervan vind je hieronder.

## Profielen

De gelaagde databasestructuur van Copernica maakt het mogelijk om mailings te versturen aan zowel profielen als subprofielen. Die gelaagdheid
bepaalt de beschikbare personalisatievariabelen. 

Je maakt altijd gebruik van een **{$profile}**-object ongeacht of je de mailing verstuurt aan een profiel of subprofiel. In het eerste geval bevat het object de gegevens van het profiel waaraan je de mailing verstuurt. Wanneer de mailing gericht is aan een subprofiel bevat het object de gegevens van het profiel dat bij het subprofiel hoort. 

Het profiel-object heeft de volgende eigenschappen:

* **{$profile.id}**: numerieke identifier van het profiel
* **{$profile.extra}**: de extra data van het profiel (deze kan uitsluitend door middel van de API worden ingesteld)
* **{$profile.secret}**: de geheime code die bij het profiel is opgeslagen
* **{$profile.code}**: een alias voor {$profile.secret} (deze is dus identiek aan de geheime code)
* **{$profile.created}**: tijdstip waarop het profiel is aangemaakt (het gebruikte formaat is JJJJ-MM-DD, uu:mm:ss)
* **{$profile.referrers}**: een optioneel array van profielen die verwijzen naar dit profiel d.m.v. een referentieveld
* **{$profile.*veldnaam*}**: biedt personalisatie op basis van alle beschikbare velden binnen het profiel
* **{$profile.*interesse*}**: biedt personalisatie op basis van alle beschikbare interesses binnen het profiel (deze heeft de waarde 'yes' of 'no')
* **{$profile.*collectienaam*}**: maakt het mogelijk om alle collecties binnen een subprofiel te benaderen

## Subprofielen 

Bij het versturen van mailings naar subprofielen kun je gebruik maken van het **{$subprofile}**-object. De bijbehorende eigenschappen zijn als volgt:

* **{$subprofile.id}**: numerieke identifier van het subprofiel
* **{$subprofile.secret}**: de geheime code die bij het profiel is opgeslagen
* **{$subprofile.code}**: een alias voor {$subprofile.secret} (deze is dus hetzelfde als de geheime code)
* **{$subprofile.created}**: tijdstip waarop het subprofiel is aangemaakt (het gebruikte formaat is JJJJ-MM-DD, uu:mm:ss)
* **{$subprofile.profile}**: het profiel-object (zie hierboven) waartoe het subprofiel behoort
* **{$subprofile.*veldnaam*}**: biedt personalisatie op basis van alle beschikbare velden binnen het subprofiel

Het kan zijn dat je bij het creëren van een template of document nog niet weet of je de mailing aan een profiel of een subprofiel gaat versturen. In dat geval maak je gebruik van het **{$destination}**-object. Deze functioneert als alias van zowel het {$profile}- als het {$subprofile}-object. Zo personaliseer je de mailing automatisch aan de geadresseerde.

## Documenteigenschappen

* **{$document.id}**: ID van het document
* **{$document.name}**: huidige naam van het document
* **{$snapshot.name}**: naam van het document op het moment van verzending (zelfs als de naam achteraf gewijzigd is)
* **{$document.created}**: tijdstip waarop het document is aangemaakt
* **{$document.lastmodified}**: tijdstip waarop het document voor het laatst gewijzigd is
* **{$document.template}**: template-object
* **{$document.language}**: taal-instellingen van het document

## Template-eigenschappen

* **{$template.id}**: ID van het template
* **{$template.name}**: naam van het template
* **{$template.description}**: beschrijving van het template
* **{$template.pdf}**: naam van het originele PDF-bestand
* **{$template.pages}**: aantal pagina's van het PDF-bestand
* **{$template.created}**: tijdstip waarop het template is aangemaakt
* **{$template.lastmodified}**: tijdstip waarop het template voor het laatst gewijzigd is
* **{$template.archive}**: eventuele archivering van het template
* **{$template.quality}**: de meegegeven kwaliteitsinstellingen van PDF-templates (screen/press/print)
* **{$smarty.version}**: Smarty-versie van het template

## Accounts en mailings

Je kunt ook gebruik maken van de **{$account}**- en **{$mailing}**-objecten. Deze bevatten gegevens over de mailing. Hierbij gebruik je de volgende eigenschappen:

* **{$account.id}**: numerieke identifier van je account
* **{$account.name}**: naam van je account
* **{$mailing.sendtime}**: tijdstip waarop de mailing is verstuurd (het gebruikte formaat is JJJJ-MM-DD, uu:mm:ss)
* **{$mailing.sendtimestamp}**: dezelfde functie als de sendtime-eigenschap, maar dan in de vorm van een Unix-timestamp (het aantal seconden sinds 1 januari 1970)
* **{$mailing.trigger}**: optioneel object dat de mailing heeft 'getriggerd'
* **{$mailing.snapshot.name}**: de naam van het document dat voor de mailing is gebruikt
* **{$mailing.snapshot.created}**: tijdstip waarop er een snapshot van het document is gemaakt (het gebruikte formaat is JJJJ-MM-DD, uu:mm:ss)
* **{$mailing.snapshot.subject}**: onderwerp van de mailing

## Extra personalisatievariabelen toevoegen

Naast het gebruik van standaardobjecten is het ook mogelijk om eigen personalisatievelden toe te voegen. Je voegt deze op templateniveau toe onder **'Configuratie -> Extra personalisatievelden'**. Vervolgens voorzie je deze van waarden. Je vindt deze optie in je document onder **'Personalisatievariabelen'**. 

De waarde kan worden opgehaald door middel van de **{$property.VELDNAAM}**-variabele, bijvoorbeeld wanneer je een bepaalde waarde meerdere keren wilt laten terugkomen in een template of document.
