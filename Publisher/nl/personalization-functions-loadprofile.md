# Personalizatie functions: loadprofile

Voor het ophalen van een profiel uit een andere database gebruik je loadprofile. Plaats deze functie direct onder de `<body>` tag in je broncode.

```text
{loadprofile source="Offices" Area="$Area" assign="office"}
```

- Met source verwijs je naar de database die je als bron wilt gebruiken. We kijken nu in de database Offices.
- Met de veldnaamzoeker Area="$Area" koppel je het juiste profiel in de database Offices aan de klant, aan de hand van de waarde die in het databaseveld Area is opgeslagen.
- De gegevens uit de Office database wijs je met source toe aan de aanwijzer office.

Je kan hiermee bijvoorbeeld een document personaliseren met het telefoonnummer van het kantoor uit de database Offices: {$offices.Phone}

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
