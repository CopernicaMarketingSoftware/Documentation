# Testen

Er zijn verschillende manieren om ervoor te zorgen dat jouw e-mail goed in de inbox aankomt.

## Spam controle
In je template of document vind je onderin de button _spamcontrole_ of _spamscore_. Hier kun je het resultaat van de spam-controle zien die op jouw template of document is uitgevoerd. Een hoge score betekent dat de kans groot is dat ontvangers dit bericht als spam zien. Het is beter om deze score zo laag mogelijk te houden.

Bij elke controle hoort een score die beschrijft in hoeverre de uitkomst van die controle de algemene score heeft beïnvloed. Daarnaast kun je onder de beschrijving de SpamAssassin code vinden. SpamAssassin is een open source computerprogramma voor servers dat wordt gebruikt voor het herkennen en onderscheppen van spam e-mail.

## De standaardbestemming
In je database kun je één profiel aanwijzen als standaardbestemming. Dit is het profiel dat wordt gebruikt om de e-mail te personaliseren. Als je variabelen in een document opneemt, zoals {$voornaam} en {$achternaam}, en je schakelt de gepersonaliseerde modus in, dan zullen de voor- en achternaam van dit profiel worden getoond in plaats van de Smarty-variabelen.

Om een profiel als standaardbestemming in te stellen ga je eerst naar het [profielen](https://ms.copernica.com/#/profiles) gedeelte in de Marketing Suite. 
In het profielen gedeelte vind je al je databases met hierin de profielen. Mocht je nog geen eigen profiel hebben in een database, dan kun je deze aanmaken via de 'aanmaken' knop linksbovenin en boven je databases. Mocht je wel al een eigen profiel hebben, dan kun je deze door middel van de zoekbalk in de betreffende database opzoeken (bijvoorbeeld via het e-mail adres).  
  
Zodra het het profiel hebt gevonden of aangemaakt hebt kun je deze aanklikken en openen. Binnen het profiel kun je in het linker menu kiezen voor de optie 'Standaardbestemming'. Zodra je op deze optie hebt geklikt kun je vervolgens op de button 'Gebruik dit profiel' klikken. Zodra je dit gedaan hebt is dit profiel ingesteld als jouw eigen 'standaardbestemming'.

De standaardbestemming is gekoppeld aan je persoonlijke login. Een collega die toegang heeft tot hetzelfde account zal dus een eigen profiel moeten aanmaken om mee te testen. Als deze collega zijn of haar profiel ingesteld heeft als de standaard bestemming, dan zul je dit de volgende keer na het inloggen weer moeten terugveranderen. Een oplossing hiervoor is het gebruik van test selecties. 

## Testselecties

Om een testselectie goed in te richten heb je de volgende onderdelen nodig: de profielen waar je testmails naartoe wilt sturen, een extra veld waarmee je kunt aangeven of een profiel wel of geen testbestemming mag worden (we noemen deze bijvoorbeeld 'testselectie') en een nieuwe selectie (deze kun je het beste aanmaken onder 'A_Databasebeheer').  
  
Om te beginnen zul je bij de profielen waar jij voortaan testmails naartoe wilt sturen, dit kunnen de profielen van jou en jouw collega's zijn, een bepaalde waarde moeten meegeven in het veld 'testselectie'. Je kunt dit veld bijvoorbeeld de waarde 'ja' meegeven.  
Vervolgens kun je de selectie gaan inrichten. Bij de condities van deze selectie zul je moeten aangeven dat het veld 'testselectie' de waarde 'ja' moet bevatten. Hierdoor vallen alle profielen die jij hebt gemarkeerd als testbestemming in deze selectie.  
  
Voor de laatste stap zullen we deze selectie nog beschikbaar moeten maken als testbestemming. Dit kun je doen door de selectie te selecteren en vervolgens op de blauwe configuratie knop linksbovenin te klikken. In dit menu vind je vervolgens de optie 'Database-intenties'. Zorg ervoor dat hier de optie 'Testbestemming' aangevinkt staat.  
Je bent nu klaar en kunt deze selectie (met testbestemmingen) gebruiken voor jouw testmails!

## Voorvertoning
Om te controleren hoe je mailing op desktop, tablet en mobile eruit ziet, ga je naar _Voorvertoning_ in de toolbar. De voorvertoning wordt standaard gepersonaliseerd op de ingestelde standaardbestemming. Je kunt hier aangeven welk soort apparaat je als voorbeeld wilt gebruiken. Daarnaast is het mogelijk om zelf de afmetingen van de voorvertoning aan te passen.

## Testmail versturen
Met een testmail test je de personalisatie en controleer je of de e-mail eruit ziet zoals je wilt. De testmail wordt verstuurd naar de inbox van de standaardbestemming en gepersonaliseerd voor dit profiel. Om een testmail te versturen, ga je naar **Verzendopties -> Testmail** in de toolbar van je template of document. 
