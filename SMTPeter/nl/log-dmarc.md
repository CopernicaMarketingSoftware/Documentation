# DMARC logfiles

Log files met de prefix "dmarc" bevatten informatie over de ontvangen DMARC
rapporten voor jouw account. Je kunt de inhoud van deze bestanden downloaden
in CSV, JSON en XML formaat via de [REST logfiles API](rest-logfiles) of
via het dashboard. Deze bestanden bevatten de volgende informatie: 

| Naam               | Beschrijving                                                                     |
| ------------------ | ---------------------------------------------------------------------------------|
| time               | Het tijdstip waarop het DMARC rapport is ontvangen (JJJJ-MM-DD uu:mm:ss formaat) |
| organizationName   | De naam van de organisatie die het rapport heeft verstuurd                       |
| email              | Het email adres waarvan we het rapport hebben ontvangen                          |
| reportId           | Het unieke (voor het domein) rapport ID                                          |
| begin              | Het begintijdstip van de periode die het rapport beslaat                         |
| end                | Het eindtijdstip van de periode die het rapport beslaat                          |
| domain             | Het domein waarover gerapporteerd wordt                                          |
| sendingDomain      | Het domein dat rapporteert (1)                                                   |
| messages           | Het aantal berichten dat ontvangen is door het domein (2)                        |
| failedSpf          | Het aantal berichten dat de DMARC check faalt vanwege een ongeldige SPF (2)      |
| failedDkim         | Het aantal berichten dat de DMARC check faalt vanwege een ongeldige DKIM (2)     |

(1): Voor sommige oude bestanden is het sender domain gebaseerd op het
adres dat het rapport verzonden heeft. Het bleek dat voor sommige rapporten
een ander e-mail adres gebruikt wordt dan het domein dat behandeld wordt
in het rapport (een voorbeeld is microsoft.com dat ook rapporten voor hotmail.com
verstuurd). Dit is in nieuwe bestanden opgelost.
(2): Oude records bevatten deze informatie niet

## Meer informatie

* [REST niet-zend calls](./rest-other-calls)
* [REST events opvragen](./rest-events)
