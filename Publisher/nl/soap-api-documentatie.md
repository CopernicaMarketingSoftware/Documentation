Behalve de bestaande
[integraties](./integraties.md "Integraties")
voor verschillende systemen, is het dankzij onze krachtige SOAP API ook
mogelijk zelf een integratie met je eigen software te maken.
Synchroniseer zo de gegevens vanuit Copernica met de gegevens uit jouw
software. Zo houd je alle gegevens en je marketingcampagnes continu
up-to-date.

Copernica beschikt overigens ook over een REST-API. [Meer informatie
over de REST-API vind je hier](../en/the-copernica-rest-api.md "REST-API").

SOAP API van Copernica
----------------------

De API van Copernica maakt gebruik van de SOAP-standaard. Hierdoor
integreer je de API gemakkelijk in ontwikkelomgevingen als Java Netbeans
en Microsoft Visual Studio. Door gebruik te maken van de SOAP-standaard,
kunnen programmeurs snel aan de slag met de API, en is de API vanuit
elke gangbare programmeertaal en ontwikkelomgeving aan te roepen.

Ga voor de volledige SOAP API object reference naar
[https://www.copernica.com/en/support/apireference](https://www.copernica.com/en/support/apireference)

[Download SOAP API voorbeeldscript voor
PHP](soaptest_php_1-5.zip "Download SOAP API voorbeeldscript voor PHP")
*(zip)*

[Download SOAP API voorbeeldscript voor
Java](Copernicacom/soaptest_java.zip "Download SOAP API voorbeeldscript voor Java")
*(zip)*

[Download SOAP API voorbeeldscript voor
C\#](Copernicacom/soaptest_cs.zip "Download SOAP API voorbeeldscript voor C#")
*(zip)*

Volledige controle dankzij Copernica object model
-------------------------------------------------

De API van Copernica maakt gebruik van een logisch en gestructureerd
objectmodel. Alle gegevens in de software worden door objecten
gerepresenteerd. Lees de eigenschappen van deze objecten uit met behulp
van de SOAP API en werk ze bij. De methodes zijn ook aan te roepen. Elk
object is opgebouwd uit kleinere deelobjecten. Zo is een object dat een
[database](./maak-je-eigen-database.md "Maak en beheer je eigen database(s)")
representeert bijvoorbeeld opgebouwd uit objecten die de profielen
representeren. Een object dat een
[template](./ontwerp-je-eigen-email-templates.md "Ontwikkel je eigen dynamische templates")
omvat, heeft een methode waarmee je alle documenten opvraagt die op
basis van dit template zijn aangemaakt.

Gebruik functionaliteiten van Copernica in de applicatie
--------------------------------------------------------

De kracht van de API is dat alle acties die met de Copernica
gebruikersinterface worden uitgevoerd, via de SOAP API ook zijn toe te
passen binnen een eigen applicatie. Richt met de API bijvoorbeeld
databases in, maak relatieprofielen aan of stel templates en
e-maildocumenten samen.

Vernieuwd callback-systeem
--------------------------

Door het synchroniseren van gegevens tussen Copernica en de externe
applicatie, hoef je niet telkens handmatig nieuwe data te
[importeren](./importeer-en-exporteer-data.md "Importeer en exporteer gegevens")
in Copernica en vice versa. De beide systemen lopen automatisch
synchroon. Stel met Copernica gemakkelijk callback URL's in. Hierdoor
houdt Copernica de externe applicatie op de hoogte van wijzigingen in de
database of relatieprofielen.
