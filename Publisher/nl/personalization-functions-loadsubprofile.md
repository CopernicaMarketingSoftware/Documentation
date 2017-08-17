# Personalizatie functions: loadsubprofile

Als de gegevens die je wilt gebruiken zijn opgeslagen in een subprofiel in de collectie account kan je ze bereiken met de loadsubprofile functie. Voor het halen van gegevens uit een collectie gebruik je de functie loadsubprofile. De volgende regel volstaat in het geval van dit voorbeeld:

```text
{loadsubprofile source="Offices:Account" AM="$AM" assign="account" profile="$office.id"}
```

- Met `source` verwijs je naar de database Offices en de collectie Account
- Met de veldzoeker `AM` koppel je het profiel met de juiste accountmanager, aan de hand van de waarde die in het collectieveld AM is opgeslagen.
- Met de toevoeging `profile="$office.id"` zorg je ervoor dat alleen in de collectie van het aangeroepen profiel wordt gekeken (en dus niet in alle collecties).

Je kan een document hiermee personaliseren met een telefoonnummer van de juiste accountmanager middels de volgende smarty code: `{$account.Phone}`

## Voorbeeld

```text
{loadprofile source="Offices" Area="$Area" assign="office"}
{loadsubprofile source="Offices:Account" AM="$AM" assign="account" profile="$offices.id"}
Beste {$FirstName},
U bent aangesloten bij ons regiokantoor in {$office.City}. 
U kunt dit kantoor direct bereiken door te bellen met {$office.Phone}.
Voor vragen kan je altijd contact met mij opnemen.
Met vriendelijke groet,
{$account.Firstname} {$account.Lastname}, uw accountmanager
{$account.Email}
```

### Resultaat:

Beste James,

U bent aangesloten bij ons regiokantoor in Haarlem. U kunt dit kantoor direct bereiken door te bellen met 031 23 123456789.

Voor vragen kan je altijd contact met mij opnemen.

Met vriendelijke groet,

Jerome Greenheart, uw accountmanager

j.greenheart@example.com
