# Database inrichten

Copernica werkt met multidimensionale databases die je helemaal zelf
kunt inrichten. Multidimensionale databases geven je enorme flexibiliteit
en vrijheid, omdat je zelf kunt bepalen welke velden je toevoegt en uit
hoeveel lagen je de database laat bestaan.


Er zijn bijna geen beperkingen opgelegd voor de structuur van een database.
Zo kun je bijvoorbeeld een eenvoudige voornaam-achternaam-emailadres-structuur
opzetten of een geneste database waarin per profiel de bestelgeschiedenis en
*abandoned shopping carts* worden opgeslagen. Echter, in het begin is het handig
om je database eenvoudig te houden. Je kunt later altijd nog extra velden toevoegen.


## Velden, interesses en collecties

Een veld binnen de database kan een interesse of een collectie bevatten.
Een interesse kan alleen de waarde "ja" of "nee" bevatten, waardoor je
nauwkeurig informatie van je klanten bij kunt houden.
Collecties zijn wat ingewikkelder, omdat je als het ware een extra laag
toevoegt aan een database. In een collectie kun je namelijk meerdere
items opslaan zoals: "voornaam", "achternaam" en "e-mailadres". Eigenlijk
zijn collecties, qua structuur, min of meer identiek aan databases.


## Database intenties

Copernica heeft een ingebouwd beveiligingssysteem om te voorkomen dat iemand
per ongeluk een mailing naar een hele database stuurt. Het is daarnaast ook
standaard onmogelijk om naar nieuw aangemaakte databases mailings te versturen.
Je moet expliciet instellen dat een database geschikt is voor mailings. Dit kun
je doen door middel van database *intenties*.


## Profielen aanmaken

Een database heeft natuurlijk data nodig om van waarde te kunnen zijn.
De datasets die je gaat toevoegen worden binnen de omgeving van Copernica aangeduid
als `DATABASE & PROFILES`. Om één en ander te testen kun je het beste eerst een
profiel met je eigen gegevens aanmaken.

Je kunt je e-mails, tijdens het schrijven, constant testen door een e-mail te versturen
naar de *standaardbestemming*. Dit is een profiel uit de database dat is gemarkeerd als
het profiel voor test e-mails. Het ligt voor de hand om jouw eigen profiel in te stellen
als de standaardbestemming.


## Meer informatie

Wil je meer weten over het beheren van databases en het maken van effectieve 
selecties? Of over je afzenderreputatie en hoe deze je deliverability 
beïnvloedt? Zie de onderstaande links.

* [Database management](./database-introduction)
* [Selecties en miniselecties](./selections-introduction)
* [Afzenderreputatie en deliverability](./sender-reputation)
