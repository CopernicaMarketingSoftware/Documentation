Het combineren van PHP en C++ is een onnodig moeilijk proces, vindt
Emiel Bruijntjes, CTO van Copernica Marketing Software. Daarom
initieerde hij
[PHP-CPP](http://php-cpp.com/ "PHP-CPP, a C++ library for creating PHP extensions")
, een opensource-project voor het creëren van een C++-library waarmee
het wél makkelijk is PHP-extensies te ontwikkelen.

Copernica Marketing Software is vooral gebouwd met PHP. Een van de
nadelen van deze taal, zoals
[Bruijntjes](https://twitter.com/EmielBruijntjes) ondervond, is dat het
veel langzamer is dan C++ en om veel meer CPU vraagt.

Met het idee om wat C++ te implementeren en zo een aantal processen
soepeler te laten verlopen, begon hij met het bestuderen van de
PHP-engine. Maar ondanks het feit dat dit de enige manier is voor
ontwikkelaars om PHP en C++ te combineren, kwam Bruijntjes er al snel
achter dat de engine bepaald niet makkelijk te gebruiken was.

Tijdrovend proces
-----------------

‘PHP-extensies zijn erg moeilijk te implementeren en vereisen een
grondige kennis van de Zend-engine en pointer-manipulatie,’ vertelt hij.
‘Het opdoen van die kennis is echter ook niet makkelijk, omdat
duidelijke documentatie amper te vinden is.’

‘Als ik al de tijd zou nemen om te begrijpen hoe je PHP-extensies
ontwikkelt met de normale PHP-API, zouden de andere
Copernica-ontwikkelaars dat natuurlijk ook moeten leren. Dat zou veel te
tijdrovend zijn.’

Enter PHP-CPP
-------------

Bruijntjes besloot voor een andere aanpak te kiezen en
[PHP-CPP](http://php-cpp.com/ "PHP-CPP, a C++ library for developing PHP extensions")
op te zetten, een
[opensource-project](https://github.com/EmielBruijntjes/PHP-CPP "PHP-CPP on github")
gericht op het creëren van een C++-library om gemakkelijk php-extensies
te ontwikkelen.

‘Extensies die zijn ontwikkeld met PHP-CPP zijn veel makkelijker te
begrijpen en te onderhouden omdat de code een stuk eenvoudiger is dan
die van extensies geschreven in C,’ legt hij uit.

Lego
----

Volgens Bruijntjes kan je het verschil tussen het gebruik van de
standaard PHP-API en PHP-CPP vergelijken met kluwen touw en Lego. ‘Met
PHP-CPP is het alsof je twee blokjes op elkaar klikt. Zo makkelijk is
het. Het zal het leven van veel ontwikkelaars van PHP-extensies
aanzienlijk eenvoudiger maken.’

‘Nu besluiten veel mensen nog om maar wat extra servers bij te prikken
om te compenseren voor het extra CPU-gebruik waar PHP om vraagt. Maar
het kan veel makkelijker. Tenminste, met PHP-CPP kan dat.’
