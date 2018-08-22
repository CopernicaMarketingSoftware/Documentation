# Selecties tutorial: Het automatisch verwerken van bounces

Bij het afleveren van een e-mail kunnen diverse fouten optreden. Het is
bijvoorbeeld mogelijk dat een e-mailadres niet meer bestaat, of omdat
het fout is geschreven (dus nooit bestaan heeft).

Voor een betere verzendreputatie en afleverkwaliteit is het belangrijk
dat fouten op een correcte manier worden afgehandeld. Dat wil zeggen, na
2 persistente fouten kunnen er beter geen e-mails meer naar dit adres
worden verstuurd. E-mailprogramma’s controleren hier namelijk op om spam
tegen te gaan.

Het is mogelijk om dit verwerkingsproces volledig automatisch te laten
verlopen.

## Stap 1. Bounce selectie maken

1.  Maak op de database een nieuwe selectie aan op basis van
    de resultaten van eerdere mailings.
2.  De mailing moet zijn verstuurd na ‘de datum van de 1e verzonden
    mailing, bijvoorbeeld 1 juli 2013’ en voor **0 dagen geleden**(kies
    onderaan de kalender voor ‘*gebruik variabele datum*’).
4.  Kies bij resultaat ‘**Er moet een foutmelding zijn geregistreerd**’.
5.  Selecteer het soort fouten dat je uit wilt sluiten, bijvoorbeeld hard 
    bounces en hoe veel errors er voor mogen zijn gekomen.
6.  Sla de selectieconditie op.

## Stap 2. Inhoud van deze selectie uitsluiten van nieuwsbriefselectie

Voeg een nieuwe regel toe aan de nieuwsbriefselectie om er voor te
zorgen dat naar adressen die in de foutselectie zijn opgenomen geen mail
meer verstuurd zal worden.

1.  Ga naar de selectie met je actieve nieuwsbriefabonnees om de
    selectie te bewerken.
2.  Voeg een nieuwe selectieregel toe.
3.  Kies in het conditieoverzicht voor een nieuwe ‘EN’ conditie. Voeg
    deze toe aan de bestaande ‘OF’ regel.
4.  Kies hier voor ‘**Check inhoud andere selectie**’. Kies voor de
    bounceselectie en voor ‘**Alle profielen niet in bovenstaande
    selectie**’.
    
## Meer informatie

* [Tutorial: Dubbele opt-in voor nieuwe gebruikers](./create-a-double-optin-for-new-subscribers)
* [Tutorial: Verjaardagsselectie](./how-to-create-a-birthday-selection)
* [Tutorial: Nieuwsbrief selectie](./create-a-mailing-list)
