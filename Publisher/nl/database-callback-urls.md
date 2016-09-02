Een callback URL is een webadres dat door de applicatie wordt gebruikt
om informatie te versturen naar een andere applicatie. Deze andere
applicatie kan bijvoorbeeld een CRM syteem zijn. Wanneer een profiel of
subprofiel is aangemaakt, gewijzigd of verwijderd in jouw database wordt
het andere systeem automatisch op de hoogte gebracht van de wijziging.

Deze functionaliteit kan worden gevonden bij *Profielen \>
Databasebeheer \>***Callback URLs**

Er wordt een HTTP POST verzoek naar de callback url verzonden. Dit
verzoek is feitelijk een pakketje met XML of JSON data met hierin data
met bestaande en nieuwe gegevens over het gewijzigde (sub)profiel.

Callbacks worden op dezelfde wijze in rekening gebracht als SOAP API
calls.

![](callbackdialog.png)

**Een callback URL toevoegen**
------------------------------

-   Klik links onderin op **‘CallbackURL toevoegen**’
-   Voer de callback URL in en kies of je de gegevens in XML of in JSON
    formaat wilt versturen.

Onderstaand een voorbeeld van XML data van een gewijzigd profiel.

![](callbackXML.png)

Je kan desgewenst meerdere callback URL’s invoeren door in het callback
URL overzicht voor **toevoegen** te kiezen.

**Callback condities**
----------------------

Maak condities als je wilt dat een callback alleen wordt uitgevoerd als
het profiel of subprofiel aan bepaalde voorwaarden voldoet. Voor het
maken van de condities kan je de eenvoudige script editor gebruiken of
de editor waar je zelf geavanceerde JavaScript condities kunt schrijven.

De callback wordt getriggerd op het moment dat de expressie ‘true’
geeft.

De conditie in het onderstaande voorbeeld wordt alleen getriggerd als de
nieuwe waarde uit het veld 'Company' gelijk is aan 'Apple'.

`company == 'apple'`
