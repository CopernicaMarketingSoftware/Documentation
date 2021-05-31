# Productupdate 02-06-2021

## Opvolgacties beheren in Marketing Suite
De opvolgacties die je eerder alleen in Publisher kon beheren, zijn nu ook toegankelijk in Marketing Suite. Hierdoor beheer je in één overzicht alle ingestelde Marketing Suite- en Publisher-opvolgacties. Je vindt de opvolgacties onder 'Profielen' en 'HTML-templates' in de Marketing Suite. (NOTE: HEET DIT DAN NOG HTML-Templates?)

## Resultaten beheren in Marketing Suite
Je kan nu binnen Marketing Suite ook de statistieken van HTML-templates (Publisher-mailings) inzien. Deze vind je onder 'Resultaten' in de Marketing Suite. Daarnaast kan je hier ingeroosterde mailings beheren.

## Marketing Suite
* Het is nu mogelijk om binnen je HTML-document de broncode van het template aan te passen. Hierdoor kun je snel en gemakkelijk schakelen tussen beide. 
* Tijdens het inplannen van een bulkmailing heb je nu de optie om het registreren van impressies en kliks voor HTML-templates uit te schakelen. [is het duidelijk wanneer je dit wilt doen?]
* Je kan nu bij het bewerken van blokken in HTML-templates de sidebar vergroten als de bloknamen langer zijn dan het standaardvenster.
* Het is nu mogelijk om bij een import aan te geven hoeveel (sub)profielen er maximaal moeten worden bijgewerkt als deze overeenkomen met de ingestelde sleutelvelden.
* Bij het importeren van een HTML-template kun je nu gebruik maken van ZIP-bestanden. Hierdoor hoef je niet je HTML en afbeeldingen los van elkaar te importeren.
* Bugfix: het is nu mogelijk om een stylesheet te koppelen aan je e-maildocument.
* Bugfix: het opslaan van een template of document is nu ook mogelijk als er een spatie voorkomt in de naam.
* Bugfix: het is nu mogelijk om afbeeldingen te verwijderen bij 'bestanden en afbeeldingen' in je document.
* Bugfix: zodra minimaal één van de drie DKIM-records niet juist staat ingesteld, wordt de gehele DKIM als niet geldig beschouwd. 

## API
* In de calls voor het ophalen van verzonden en ingeroosterde HTML-templates ontvang je nu ook de ingestelde beschrijving (description) mee als resultaat.
* In de calls voor het ophalen van verzonden en ingeroosterde Marketing Suite-mailings ontvang je nu ook de ingestelde labels (tags) mee als resultaat.
* Bugfix: er is een probleem opgelost in de methode 'profile/{$profileID/publisher/emailings' waarbij je met 'include_subprofiles' aan kunt geven dat je ook mailings terug wilt krijgen die zijn verzonden naar de subprofielen van het betreffende profiel. [is voor mij niet zo duidelijk, schat even in of dit herschreven moet]
