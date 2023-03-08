Overzicht van methodes

## Account

In de onderstaande tabel vind je een methode om account-informatie op te vragen.

| Type   | Adres                                                                                        | Omschrijving                                 |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| GET    | [api.copernica.com/v3/identity](./rest-get-identity)                                         | Opvragen van account informatie              |
| GET    | [api.copernica.com/v3/consumption](./rest-get-consumption)                                   | Opvragen van account verbruik                |

## Databases & Collecties

Je kunt je databases en collecties bekijken en onderhouden met API calls.
In de onderstaande tabel vind je alle calls gerelateerd aan databases,
collecties en hun eigenschappen.

### Databases

| Type   | Adres                                                                                        | Omschrijving                                   |
|--------|----------------------------------------------------------------------------------------------|------------------------------------------------|
| GET    | [api.copernica.com/v3/databases](./rest-get-databases)                                       | Opvragen van alle databases                    |
| POST   | [api.copernica.com/v3/databases](./rest-post-databases)                                      | Aanmaken van een nieuwe database               |
| POST   | [api.copernica.com/v3/database/$id/copy](./rest-post-database-copy)                          | Kopiëren van een database                      |
| GET    | [api.copernica.com/v3/database/$id](./rest-get-database)                                     | Opvragen van database informatie               |
| PUT    | [api.copernica.com/v3/database/$id](./rest-put-database)                                     | Updaten van database informatie                |
| GET    | [api.copernica.com/v3/database/$id/unsubscribe](./rest-get-database-unsubscribe)             | Opvragen van uitschrijfgedrag                  |
| PUT    | [api.copernica.com/v3/database/$id/unsubscribe](./rest-put-database-unsubscribe)             | Updaten van uitschrijfgedrag                   |
| GET    | [api.copernica.com/v3/database/$id/views](./rest-get-database-views)                         | Opvragen van alle selecties                    |
| POST   | [api.copernica.com/v3/database/$id/views](./rest-post-database-views)                        | Aanmaken van een selectie                      |
| GET    | [api.copernica.com/v3/database/$id/collections](./rest-get-database-collections)             | Opvragen van alle collecties                   |
| POST   | [api.copernica.com/v3/database/$id/collections](./rest-post-database-collections)            | Aanmaken van een collectie                     |
| GET    | [api.copernica.com/v3/database/$id/fields](./rest-get-database-fields)                       | Opvragen van alle velden                       |
| POST   | [api.copernica.com/v3/database/$id/fields](./rest-post-database-fields)                      | Aanmaken van een veld                          |
| PUT    | [api.copernica.com/v3/database/$id/field/$id](./rest-put-database-field)                     | Updaten van een veld                           |
| DELETE | [api.copernica.com/v3/database/$id/field/$id](./rest-delete-database-field)                  | Verwijderen van een veld                       |
| GET    | [api.copernica.com/v3/database/$id/interests](./rest-get-database-interests)                 | Opvragen van alle interesses                   |
| POST   | [api.copernica.com/v3/database/$id/interests](./rest-post-database-interests)                | Aanmaken van een interesse                     |
| PUT    | [api.copernica.com/v3/interest](./rest-put-interest)                                         | Updaten van een interesse                      |
| DELETE | [api.copernica.com/v3/interest](./rest-delete-interest)                                      | Verwijderen van een interesse                  |
| GET    | [api.copernica.com/v3/database/$id/profileids](./rest-get-database-profileids)               | Opvragen van alle profiel IDs                  |
| GET    | [api.copernica.com/v3/database/$id/profiles](./rest-get-database-profiles)                   | Opvragen van alle profielen                    |
| POST   | [api.copernica.com/v3/database/$id/profiles](./rest-post-database-profiles)                  | Aanmaken van een profiel                       |
| PUT    | [api.copernica.com/v3/database/$id/profiles](./rest-put-database-profiles)                   | Updaten van een of meerdere profielen          |
| DELETE | [api.copernica.com/v3/database/$id/profiles](./rest-delete-database-profiles)                | Verwijderen van een of meerdere profielen      |
| PUT    | [api.copernica.com/v3/database/$id/intentions](./rest-put-database-intentions)               | Updaten van de intenties van de database       |

### Collecties

| Type   | Adres                                                                                        | Omschrijving                                   |
|--------|----------------------------------------------------------------------------------------------|------------------------------------------------|
| GET    | [api.copernica.com/v3/database/$id/collections](./rest-get-database-collections)             | Opvragen van alle collecties voor een database |
| POST   | [api.copernica.com/v3/database/$id/collections](./rest-post-database-collections)            | Aanmaken van een collectie                     |
| GET    | [api.copernica.com/v3/collection/$id](./rest-get-collection)                                 | Opvragen van collectie informatie              |
| PUT    | [api.copernica.com/v3/collection/$id](./rest-put-collection)                                 | Updaten van collectie informatie               |
| GET    | [api.copernica.com/v3/collection/$id/unsubscribe](./rest-get-collection-unsubscribe)         | Opvragen van uitschrijfgedrag                  |
| PUT    | [api.copernica.com/v3/collection/$id/unsubscribe](./rest-put-collection-unsubscribe)         | Updaten van uitschrijfgedrag                   |
| GET    | [api.copernica.com/v3/collection/$id/miniviews](./rest-get-collection-miniviews)             | Opvragen van alle miniselecties                |
| POST   | [api.copernica.com/v3/collection/$id/miniviews](./rest-post-collection-miniviews)            | Aanmaken van een miniselectie                  |
| GET    | [api.copernica.com/v3/collection/$id/fields](./rest-get-collection-fields)                   | Opvragen van alle velden                       |
| POST   | [api.copernica.com/v3/collection/$id/fields](./rest-post-collection-fields)                  | Aanmaken van een veld                          |
| PUT    | [api.copernica.com/v3/collection/$id/field/$id](./rest-put-collection-field)                 | Updaten van een veld                           |
| DELETE | [api.copernica.com/v3/collection/$id/field/$id](./rest-delete-collection-field)              | Verwijderen van een veld                       |
| GET    | [api.copernica.com/v3/collection/$id/subprofileids](./rest-get-collection-subprofileids)     | Opvragen van alle subprofiel IDs               |
| GET    | [api.copernica.com/v3/collection/$id/subprofiles](./rest-get-collection-subprofiles)         | Opvragen van alle subprofielen                 |
| PUT    | [api.copernica.com/v3/collection/$id/subprofiles](./rest-put-collection-subprofiles)         | Updaten van een of meerdere subprofielen       |
| PUT    | [api.copernica.com/v3/collection/$id/intentions](./rest-put-collection-intentions)           | Updaten van de intenties van de collectie      |

## Importeren

| Type   | Adres                                                                                        | Omschrijving                                   |
|--------|----------------------------------------------------------------------------------------------|------------------------------------------------|
| POST   | [api.copernica.com/v3/imports](./rest-post-imports)                                          | Importeren van gegevens in je account          |
| GET    | [api.copernica.com/v3/import/$id](./rest-get-import)                                        | Opvragen van informatie over een import          |

## Selecties & Miniselecties

Selecties vallen onder de database, terwijl miniselecties onder een collectie vallen.
Je kunt de methodes gerelateerd aan specifieke (mini)selecties hieronder vinden.

### Selecties

| Type   | Adres                                                                                        | Omschrijving                                 |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| POST   | [api.copernica.com/v3/database/$id/views](./rest-post-database-views)                        | Aanmaken van een selectie                    |
| POST   | [api.copernica.com/v3/view/$id/copy](./rest-post-view-copy)                                  | Kopiëren van een selectie                    |
| GET    | [api.copernica.com/v3/view/$id](./rest-get-view)                                             | Opvragen van selectie informatie             |
| PUT    | [api.copernica.com/v3/view/$id](./rest-put-view)                                             | Updaten van selectie informatie              |
| DELETE | [api.copernica.com/v3/view/$id](./rest-delete-view)                                          | Verwijderen van een selectie                 |
| GET    | [api.copernica.com/v3/view/$id/views](./rest-get-view-views)                                 | Opvragen van alle genestelde selecties       |
| POST   | [api.copernica.com/v3/view/$id/views](./rest-post-view-views)                                | Aanmaken van een genestelde selectie         |
| GET    | [api.copernica.com/v3/view/$id/profileids](./rest-get-view-profileids)                       | Opvragen van alle selectie profiel IDs       |
| GET    | [api.copernica.com/v3/view/$id/profiles](./rest-get-view-profiles)                           | Opvragen van alle selectie profielen         |
| GET    | [api.copernica.com/v3/view/$id/rules](./rest-get-view-rules)                                 | Opvragen van alle selectie regels            |
| GET    | [api.copernica.com/v3/view/$id/rule/$id](./rest-get-view-rule)                               | Opvragen van een selectie regel              |
| POST   | [api.copernica.com/v3/view/$id/rules](./rest-post-view-rules)                                | Aanmaken van een selectie regel              |
| PUT    | [api.copernica.com/v3/view/$id/intentions](./rest-put-view-intentions)                       | Updaten van de intenties van de selectie     |
| POST   | [api.copernica.com/v3/view/$id/rebuild](./rest-post-view-rebuild)                            | Opnieuw opbouwen van een selectie            |

### Miniselecties

| Type   | Adres                                                                                        | Omschrijving                                   |
|--------|----------------------------------------------------------------------------------------------|------------------------------------------------|
| POST   | [api.copernica.com/v3/collection/$id/miniviews](./rest-post-collection-miniviews)            | Aanmaken van een miniselectie                  |
| GET    | [api.copernica.com/v3/miniview/$id](./rest-get-miniview)                                     | Opvragen van miniselectie informatie           |
| PUT    | [api.copernica.com/v3/miniview/$id](./rest-put-miniview)                                     | Updaten van miniselectie informatie            |
| DELETE | [api.copernica.com/v3/miniview/$id](./rest-delete-miniview)                                  | Verwijderen van een miniselectie               |
| GET    | [api.copernica.com/v3/miniview/$id/subprofileids](./rest-get-miniview-subprofileids)         | Opvragen van alle miniselectie subprofiel IDs  |
| GET    | [api.copernica.com/v3/miniview/$id/subprofiles](./rest-get-miniview-subprofiles)             | Opvragen van alle miniselectie subprofielen    |
| GET    | [api.copernica.com/v3/miniview/$id/views](./rest-get-miniview-views)                         | Opvragen van selecties voor een miniselectie   |
| GET    | [api.copernica.com/v3/miniview/$id/minirules](./rest-get-miniview-rules)                     | Opvragen van alle miniselectie miniregels      |
| GET    | [api.copernica.com/v3/miniview/$id/minirule/$id](./rest-get-miniview-rule)                   | Opvragen van een miniselectie miniregel        |
| POST   | [api.copernica.com/v3/miniview/$id/minirules](./rest-post-miniview-rules)                    | Aanmaken van een nieuwe miniselectie miniregel |
| PUT    | [api.copernica.com/v3/miniview/$id/intentions](./rest-put-miniview-intentions)               | Updaten van de intenties van de miniselectie   |
| POST   | [api.copernica.com/v3/miniview/$id/rebuild](./rest-post-miniview-rebuild)                    | Opnieuw opbouwen van een miniselectie          |

## Regels & Miniregels

Regels en miniregels bestaan uit een of meerdere condities om selecties en
miniselecties aan te maken onder een database of collectie respectievelijk.
Je kunt alle API calls gerelateerd aan (mini)regels en de bijhorende
condities in de tabel hieronder vinden.

### Regels

| Type   | Adres                                                                                        | Omschrijving                                   |
|--------|----------------------------------------------------------------------------------------------|------------------------------------------------|
| POST   | [api.copernica.com/v3/view/$id/rules](./rest-post-view-rules)                                | Aanmaken van een regel                         |
| GET    | [api.copernica.com/v3/rule/$id](./rest-get-rule)                                             | Opvragen van regel informatie                  |
| PUT    | [api.copernica.com/v3/rule/$id](./rest-put-rule)                                             | Updaten van regel informatie                   |
| DELETE | [api.copernica.com/v3/rule/$id](./rest-delete-rule)                                          | Verwijderen van een regel                      |
| POST   | [api.copernica.com/v3/rule/$id/conditions](./rest-post-rule-conditions)                      | Aanmaken van een regel conditie                |
| PUT    | [api.copernica.com/v3/condition/$type/$id](./rest-put-condition)                             | Updaten van een conditie                       |
| DELETE | [api.copernica.com/v3/condition/$type/$id](./rest-delete-condition)                          | Verwijderen van een conditie                   |

### Miniregels (voor miniselecties)

| Type   | Adres                                                                                        | Omschrijving                                   |
|--------|----------------------------------------------------------------------------------------------|------------------------------------------------|
| POST   | [api.copernica.com/v3/miniview/$id/minirules](./rest-post-miniview-rules)                    | Aanmaken van een nieuwe miniregel              |
| GET    | [api.copernica.com/v3/minirule/$id](./rest-get-minirule)                                     | Opvragen van miniregel informatie              |
| PUT    | [api.copernica.com/v3/minirule/$id](./rest-put-minirule)                                     | Updaten van miniregel informatie               |
| DELETE | [api.copernica.com/v3/minirule/$id](./rest-delete-minirule)                                  | Verwijderen van een miniregel                  |
| POST   | [api.copernica.com/v3/minirule/$id/conditions](./rest-post-minirule-conditions)              | Aanmaken van een miniregel conditie            |
| PUT    | [api.copernica.com/v3/minicondition/$type/$id](./rest-put-minicondition)                     | Updaten van een miniregel conditie         |
| DELETE | [api.copernica.com/v3/minicondition/$type/$id](./rest-delete-minicondition)                  | Verwijderen van een miniregel conditie         |

## Profielen & Subprofielen

Profielen en subprofielen kunnen gebruikt worden om entiteiten in je database
op te slaan, zoals je klanten of orders. Je vindt de relevante API calls
in de onderstaande tabel.

### Profielen

| Type   | Adres                                                                                                | Omschrijving                                                      |
|--------|------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------|
| POST   | [api.copernica.com/v3/database/$id/profiles](./rest-post-database-profiles)                          | Aanmaken van een database profiel                                 |
| GET    | [api.copernica.com/v3/profile/$id](./rest-get-profile)                                               | Opvragen van profiel informatie                                   |
| PUT    | [api.copernica.com/v3/profile/$id](./rest-put-profile)                                               | Updaten van profiel informatie                                    |
| DELETE | [api.copernica.com/v3/profile/$id](./rest-delete-profile)                                            | Verwijderen van een profiel                                       |
| GET    | [api.copernica.com/v3/profile/$id/subprofiles/$id](./rest-get-profile-subprofiles)                   | Opvragen van alle subprofielen voor een profiel                   |
| POST   | [api.copernica.com/v3/profile/$id/subprofiles/$id](./rest-post-profile-subprofiles)                  | Aanmaken van een nieuw subprofiel                                 |
| PUT    | [api.copernica.com/v3/profile/$id/subprofiles/$id](./rest-put-profile-subprofiles)                   | Updaten van een of meerdere subprofielen                          |
| GET    | [api.copernica.com/v3/profile/$id/fields](./rest-get-profile-fields)                                 | Opvragen van alle profiel velden                                  |
| PUT    | [api.copernica.com/v3/profile/$id/fields](./rest-put-profile-fields)                                 | Updaten van een of meerdere profiel velden                        |
| GET    | [api.copernica.com/v3/profile/$id/interests](./rest-get-profile-interests)                           | Opvragen van alle profiel interesses                              |
| POST   | [api.copernica.com/v3/profile/$id/interests](./rest-post-profile-interests)                          | Aanmaken van profiel interesse(s)                                 |
| PUT    | [api.copernica.com/v3/profile/$id/interests](./rest-put-profile-interests)                           | Updaten van profiel interesse(s)                                  |
| GET    | [api.copernica.com/v3/profile/$id/publisher/emailings](./rest-get-profile-publisher-emailings)       | Opvragen van alle Publisher mailings voor een profiel             |
| GET    | [api.copernica.com/v3/profile/$id/ms/emailings](./rest-get-profile-ms-emailings)                     | Opvragen van alle Marketing Suite mailings voor een profiel       |
| GET    | [api.copernica.com/v3/profile/$id/publisher/destinations](./rest-get-profile-publisher-destinations) | Opvragen van alle Publisher destinations voor een profiel         |
| GET    | [api.copernica.com/v3/profile/$id/ms/destinations](./rest-get-profile-ms-destinations)               | Opvragen van alle Marketing Suite destinations voor een profiel   |
| GET    | [api.copernica.com/v3/profile/$id/files](./rest-put-profile-files)                                   | Oppvragen van alle files voor een profiel                         |
| POST   | [api.copernica.com/v3/profile/$id/datarequest](./rest-post-profile-datarequest)                      | Aanmaken van een dataverzoek voor een profiel                     |
| PUT    | [api.copernica.com/v3/profile/$id/unsubscribe](./rest-put-profile-unsubscribe)                       | Uitvoeren van het uitschrijfgedrag van een profiel                |
| GET    | [api.copernica.com/v3/profile/$id/publisher/document/$id](./rest-get-profile-publisher-personalized-document) | Opvragen van een gepersonaliseerd Publisher document voor een profiel         |

### Subprofielen

| Type   | Adres                                                                                                        | Omschrijving                                                          |
|--------|--------------------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------|
| POST   | [api.copernica.com/v3/profile/$id/subprofiles](./rest-post-profile-subprofiles)                              | Aanmaken van een subprofiel                                           |
| GET    | [api.copernica.com/v3/subprofile/$id](./rest-get-subprofile)                                                 | Opvragen van subprofiel informatie                                    |
| PUT    | [api.copernica.com/v3/subprofile/$id](./rest-put-subprofile)                                                 | Updaten van subprofiel informatie                                     |
| DELETE | [api.copernica.com/v3/subprofile/$id](./rest-delete-subprofile)                                              | Verwijderen van een subprofiel                                        |
| GET    | [api.copernica.com/v3/subprofile/$id/fields](./rest-get-subprofile-fields)                                   | Opvragen van alle subprofiel velden                                   |
| PUT    | [api.copernica.com/v3/subprofile/$id/fields](./rest-put-subprofile-fields)                                   | Updaten van subprofiel velden                                         |
| GET    | [api.copernica.com/v3/subprofile/$id/publisher/emailings](./rest-get-subprofile-publisher-emailings)         | Opvragen van alle Publisher mailings voor een subprofiel              |
| GET    | [api.copernica.com/v3/subprofile/$id/ms/emailings](./rest-get-subprofile-ms-emailings)                       | Opvragen van alle Marketing Suite mailings voor een subprofiel        |
| GET    | [api.copernica.com/v3/subprofile/$id/publisher/destinations](./rest-get-subprofile-publisher-destinations)   | Opvragen van alle Publisher destinations voor een subprofiel          |
| GET    | [api.copernica.com/v3/subprofile/$id/ms/destinations](./rest-get-subprofile-ms-destinations)                 | Opvragen van alle Marketing Suite destinations voor een subprofiel    |
| POST   | [api.copernica.com/v3/subprofile/$id/datarequest](./rest-post-subprofile-datarequest)                        | Aanmaken van een dataverzoek voor een subprofiel                      |
| PUT    | [api.copernica.com/v3/subprofile/$id/unsubscribe](./rest-put-subprofile-unsubscribe)                         | Uitvoeren van het uitschrijfgedrag van een subprofiel                 |
| GET    | [api.copernica.com/v3/subprofile/$id/publisher/document/$id](./rest-get-subprofile-publisher-personalized-document) | Opvragen van een gepersonaliseerd Publisher document voor een subprofiel         |

## Publisher Mailings

In de onderstaande tabel vind je alle API calls gerelateerd aan Publisher
documenten, templates en mailings.

### Mailings

| Type   | Adres                                                                                                    | Omschrijving                                              |
|--------|----------------------------------------------------------------------------------------------------------|-----------------------------------------------------------|
| GET    | [api.copernica.com/v3/publisher/emailings](./rest-get-publisher-emailings)                               | Opvragen van alle mailings                                |
| GET    | [api.copernica.com/v3/publisher/scheduledemailings](./rest-get-publisher-scheduledemailings)             | Opvragen van alle ingeroosterde mailings                  |
| GET    | [api.copernica.com/v3/publisher/emailing/$id](./rest-get-publisher-emailing)                             | Opvragen van een mailing                                  |
| GET    | [api.copernica.com/v3/publisher/scheduledemailing/$id](./rest-get-publisher-scheduledemailing)           | Opvragen van een ingeroosterde mailing                    |
| GET    | [api.copernica.com/v3/publisher/destinations](./rest-get-publisher-destinations)                         | Opvragen van alle destinations over een bepaalde periode          |
| POST   | [api.copernica.com/v3/publisher/emailing](./rest-post-publisher-emailing)                                | Aanmaken van een mailing                                  |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/destinations](./rest-get-publisher-emailing-destinations)   | Opvragen van destinations voor een mailing                |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/snapshot](./rest-get-publisher-emailing-snapshot)           | Opvragen van een snapshot voor een mailing                |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/statistics](./rest-get-publisher-emailing-statistics)       | Opvragen van de statistieken voor een mailing             |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/abuses](./rest-get-publisher-emailing-abuses)               | Opvragen van abuses voor een mailing                      |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/clicks](./rest-get-publisher-emailing-clicks)               | Opvragen van clicks voor een mailing                      |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/deliveries](./rest-get-publisher-emailing-deliveries)       | Opvragen van deliveries voor een mailing                  |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/errors](./rest-get-publisher-emailing-errors)               | Opvragen van errors voor een mailing                      |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/impressions](./rest-get-publisher-emailing-impressions)     | Opvragen van impressies voor een mailing                  |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/unsubscribes](./rest-get-publisher-emailing-unsubscribes)   | Opvragen van unsubscribes voor een mailing                |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/testgroups](./rest-get-publisher-emailing-testgroups)       | Opvragen van de testgroepen voor een mailing        
| GET    | [api.copernica.com/v3/publisher/emailing/$id/finalgroup](./rest-get-publisher-emailing-finalgroup)       | Opvragen van de definitieve groep voor een mailing     
| PUT    | [api.copernica.com/v2/publisher/emailing/$id/unsubscribe](./rest-put-publisher-emailing-unsubscribe)     | (Sub)profiel uitschrijven op basis van een mailing   
| GET    | [api.copernica.com/v3/publisher/testgroup/$id/statistics](./rest-get-publisher-testgroup-statistics)     | Opvragen van de statistieken van een testgroep     |
| GET    | [api.copernica.com/v3/publisher/message/$id](./rest-get-publisher-message)                               | Opvragen van bericht informatie                           |
| GET    | [api.copernica.com/v3/profile/$id/publisher/emailings](./rest-get-profile-publisher-emailings)           | Opvragen van alle Publisher mailings voor een profiel     |
| GET    | [api.copernica.com/v3/subprofile/$id/publisher/emailings](./rest-get-subprofile-publisher-emailings)     | Opvragen van alle Publisher mailings voor een subprofiel  |

### Documenten & Templates

| Type   | Adres                                                                                                            | Omschrijving                                       |
|--------|------------------------------------------------------------------------------------------------------------------|----------------------------------------------------|
| GET    | [api.copernica.com/v3/publisher/documents](./rest-get-publisher-documents)                                       | Opvragen van alle documenten                       |
| POST   | [api.copernica.com/v3/publisher/documents](./rest-post-publisher-documents)                                      | Aanmaken van een document                       |
| GET    | [api.copernica.com/v3/publisher/document/$id](./rest-get-publisher-document)                                     | Opvragen van document informatie                   |
| PUT    | [api.copernica.com/v3/publisher/document/$id](./rest-put-publisher-document)                                     | Bijwerken van een document                         |
| DELETE | [api.copernica.com/v3/publisher/document/$id](./rest-delete-publisher-document)                                  | Verwijderen van een document                       |
| GET    | [api.copernica.com/v3/publisher/document/$id/emailings](./rest-get-publisher-document-emailings)                 | Opvragen van mailings voor een document            |
| GET    | [api.copernica.com/v3/publisher/document/$id/statistics](./rest-get-publisher-document-statistics)               | Opvragen van statistieken voor een document        |
| GET    | [api.copernica.com/v3/publisher/document/$id/loopblocks](./rest-get-publisher-document-loopblocks)               | Opvragen van loopblokken voor een document        |
| GET    | [api.copernica.com/v3/publisher/document/$id/textblocks](./rest-get-publisher-document-textblocks)               | Opvragen van tekstblokken voor een document        |
| GET    | [api.copernica.com/v3/publisher/document/$id/imageblocks](./rest-get-publisher-document-imageblocks)             | Opvragen van afbeeldingsblokken voor een document        |
| PUT    | [api.copernica.com/v3/publisher/document/$id/loopblock](./rest-put-publisher-document-loopblocks)                | Bijwerken van loopblok in een document        |
| PUT    | [api.copernica.com/v3/publisher/document/$id/textblock](./rest-put-publisher-document-textblocks)                | Bijwerken van textblok in een document        |
| PUT    | [api.copernica.com/v3/publisher/document/$id/imageblock](./rest-put-publisher-document-imageblocks)              | Bijwerken van afbeeldingsblok in een document        |
| GET    | [api.copernica.com/v3/publisher/templates](./rest-get-publisher-templates)                                       | Opvragen van alle templates                        |
| POST   | [api.copernica.com/v3/publisher/templates](./rest-post-publisher-templates)                                      | Aanmaken van een nieuw template                       |
| GET    | [api.copernica.com/v3/publisher/template/$id](./rest-get-publisher-template)                                     | Opvragen van template informatie                   |
| PUT    | [api.copernica.com/v3/publisher/template/$id](./rest-put-publisher-template)                                     | updaten van template informatie                   |
| DELETE | [api.copernica.com/v3/publisher/template/$id](./rest-delete-publisher-template)                                  | Verwijderen van een template                       |
| GET    | [api.copernica.com/v3/publisher/template/$id/emailings](./rest-get-publisher-template-emailings)                 | Opvragen van mailings voor een template            |
| GET    | [api.copernica.com/v3/publisher/template/$id/emailingdocuments](./rest-get-publisher-template-documents)         | Opvragen van alle documenten voor een template     |

### Destinations (bestemmingen)

| Type   | Adres                                                                                                        | Omschrijving                                            |
|--------|--------------------------------------------------------------------------------------------------------------|---------------------------------------------------------|
| GET    | [api.copernica.com/v3/publisher/destination/$id/](./rest-get-publisher-destination)                          | Opvragen van een bestemming                             |
| GET    | [api.copernica.com/v3/publisher/destination/$id/body](./rest-get-publisher-destination-body)                 | Opvragen van de message body verzonden naar een bestemming    |
| GET    | [api.copernica.com/v3/publisher/destination/$id/fields](./rest-get-publisher-destination-fields)             | Opvragen van een bestemming inclusief profielvelden     |
| GET    | [api.copernica.com/v3/publisher/destination/$id/statistics](./rest-get-publisher-destination-statistics)     | Opvragen van statistieken voor een bestemming           |
| GET    | [api.copernica.com/v3/publisher/destination/$id/abuses](./rest-get-publisher-destination-abuses)             | Opvragen van abuses voor een bestemming                 |
| GET    | [api.copernica.com/v3/publisher/destination/$id/clicks](./rest-get-publisher-destination-clicks)             | Opvragen van clicks voor een bestemming                 |
| GET    | [api.copernica.com/v3/publisher/destination/$id/deliveries](./rest-get-publisher-destination-deliveries)     | Opvragen van deliveries voor een bestemming             |
| GET    | [api.copernica.com/v3/publisher/destination/$id/errors](./rest-get-publisher-destination-errors)             | Opvragen van errors voor een bestemming                 |
| GET    | [api.copernica.com/v3/publisher/destination/$id/impressions](./rest-get-publisher-destination-impressions)   | Opvragen van impressies voor een bestemming             |
| GET    | [api.copernica.com/v3/publisher/destination/$id/unsubscribes](./rest-get-publisher-destination-unsubscribes) | Opvragen van unsubscribes voor een bestemming           |
| GET    | [api.copernica.com/v3/publisher/destination/$id/content](./rest-get-publisher-destination-content) | Opvragen van de verstuurde inhoud voor een bestemming           |
| GET    | [api.copernica.com/v3/profile/$id/publisher/destinations](./rest-get-profile-publisher-destinations)         | Opvragen van Publisher destinations voor een profiel    |
| GET    | [api.copernica.com/v3/subprofile/$id/publisher/destinations](./rest-get-subprofile-publisher-destinations)   | Opvragen van Publisher destinations voor een subprofiel |

### Statistieken

| Type   | Adres                                                                                                        | Omschrijving                                      |
|--------|--------------------------------------------------------------------------------------------------------------|---------------------------------------------------|
| GET    | [api.copernica.com/v3/publisher/abuses](./rest-get-publisher-abuses)                                         | Opvragen van alle abuses voor Publisher           |
| GET    | [api.copernica.com/v3/publisher/clicks](./rest-get-publisher-clicks)                                         | Opvragen van alle clicks voor Publisher           |
| GET    | [api.copernica.com/v3/publisher/deliveries](./rest-get-publisher-deliveries)                                 | Opvragen van alle deliveries voor Publisher       |
| GET    | [api.copernica.com/v3/publisher/errors](./rest-get-publisher-errors)                                         | Opvragen van alle errors voor Publisher           |
| GET    | [api.copernica.com/v3/publisher/impressions](./rest-get-publisher-impressions)                               | Opvragen van alle impressions voor Publisher      |
| GET    | [api.copernica.com/v3/publisher/unsubscribes](./rest-get-publisher-unsubscribes)                             | Opvragen van alle unsubscribes voor Publisher     |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/statistics](./rest-get-publisher-emailing-statistics)           | Opvragen van de statistieken voor een mailing     |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/abuses](./rest-get-publisher-emailing-abuses)                   | Opvragen van abuses voor een mailing              |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/clicks](./rest-get-publisher-emailing-clicks)                   | Opvragen van clicks voor een mailing              |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/deliveries](./rest-get-publisher-emailing-deliveries)           | Opvragen van deliveries voor een mailing          |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/errors](./rest-get-publisher-emailing-errors)                   | Opvragen van errors voor een mailing              |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/impressions](./rest-get-publisher-emailing-impressions)         | Opvragen van impressies voor een mailing          |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/unsubscribes](./rest-get-publisher-emailing-unsubscribes)       | Opvragen van unsubscribes voor een mailing        |
| GET    | [api.copernica.com/v3/publisher/destination/$id/statistics](./rest-get-publisher-destination-statistics)     | Opvragen van statistieken voor een bestemming     |
| GET    | [api.copernica.com/v3/publisher/destination/$id/abuses](./rest-get-publisher-destination-abuses)             | Opvragen van abuses voor een bestemming           |
| GET    | [api.copernica.com/v3/publisher/destination/$id/clicks](./rest-get-publisher-destination-clicks)             | Opvragen van clicks voor een bestemming           |
| GET    | [api.copernica.com/v3/publisher/destination/$id/deliveries](./rest-get-publisher-destination-deliveries)     | Opvragen van deliveries voor een bestemming       |
| GET    | [api.copernica.com/v3/publisher/destination/$id/errors](./rest-get-publisher-destination-errors)             | Opvragen van errors voor een bestemming           |
| GET    | [api.copernica.com/v3/publisher/destination/$id/impressions](./rest-get-publisher-destination-impressions)   | Opvragen van impressies voor een bestemming       |
| GET    | [api.copernica.com/v3/publisher/destination/$id/unsubscribes](./rest-get-publisher-destination-unsubscribes) | Opvragen van unsubscribes voor een bestemming     |

## Marketing Suite Mailings

In de onderstaande tabel vind je alle API calls gerelateerd aan Marketing Suite
templates en mailings.

### Mailings

| Type   | Adres                                                                                        | Omschrijving                                                      |
|--------|----------------------------------------------------------------------------------------------|-------------------------------------------------------------------|
| GET    | [api.copernica.com/v3/ms/emailings](./rest-get-ms-emailings)                                 | Opvragen van alle mailings                                        |
| GET    | [api.copernica.com/v3/ms/emailing/$id](./rest-get-ms-emailing)                               | Opvragen van een mailing                                          |
| POST   | [api.copernica.com/v3/ms/emailing](./rest-post-ms-emailing)                                  | Aanmaken van een mailing                                          |
| GET    | [api.copernica.com/v3/ms/destinations](./rest-get-ms-destinations)                           | Opvragen van alle destinations over een bepaalde periode          |
| GET    | [api.copernica.com/v3/ms/scheduledemailings](./rest-get-ms-scheduledemailings)               | Opvragen van alle ingeroosterde mailings                          |
| GET    | [api.copernica.com/v3/ms/scheduledemailing/$id](./rest-get-ms-scheduledemailing)             | Opvragen van een ingeroosterde mailing                            |
| POST   | [api.copernica.com/v3/ms/scheduledemailing/](./rest-post-ms-scheduledemailing)               | Aanmaken van een ingeroosterde mailing                            |
| GET    | [api.copernica.com/v3/ms/emailing/$id/destinations](./rest-get-ms-emailing-destinations)     | Opvragen van destinations voor een mailing                        |
| GET    | [api.copernica.com/v3/ms/emailing/$id/statistics](./rest-get-ms-emailing-statistics)         | Opvragen van statistieken voor een mailing                        |
| GET    | [api.copernica.com/v3/ms/emailing/$id/deliveries](./rest-get-ms-emailing-deliveries)         | Opvragen van alle deliveries voor een emailing                    |
| GET    | [api.copernica.com/v3/ms/emailing/$id/impressions](./rest-get-ms-emailing-impressions)       | Opvragen van alle impressions voor een emailing                  |
| GET    | [api.copernica.com/v3/ms/emailing/$id/clicks](./rest-get-ms-emailing-clicks)                 | Opvragen van alle clicks voor een emailing                        |
| GET    | [api.copernica.com/v3/ms/emailing/$id/errors](./rest-get-ms-emailing-errors)                 | Opvragen van alle errors voor een emailing                        |
| GET    | [api.copernica.com/v3/ms/emailing/$id/unsubscribes](./rest-get-ms-emailing-unsubscribes)     | Opvragen van alle uitschrijvingen voor een emailing              |
| GET    | [api.copernica.com/v3/ms/emailing/$id/abuses](./rest-get-ms-emailing-abuses)                 | Opvragen van alle abuses voor een emailing                        |
| PUT    | [api.copernica.com/v2/ms/emailing/$id/unsubscribe](./rest-put-ms-emailing-unsubscribe)       | (Sub)profiel uitschrijven op basis van een mailing       
| GET    | [api.copernica.com/v3/profile/$id/ms/emailings](./rest-get-profile-ms-emailings)             | Opvragen van alle Marketing Suite mailings voor een profiel       |
| GET    | [api.copernica.com/v3/subprofile/$id/ms/emailings](./rest-get-subprofile-ms-emailings)       | Opvragen van alle Marketing Suite mailings voor een subprofiel    |

### Templates

| Type   | Adres                                                                                        | Omschrijving                                      |
|--------|----------------------------------------------------------------------------------------------|---------------------------------------------------|
| GET    | [api.copernica.com/v3/ms/templates](./rest-get-ms-templates)                                 | Opvragen van alle templates                       |
| GET    | [api.copernica.com/v3/ms/template/$id](./rest-get-ms-template)                               | Opvragen van een template                         |
| DELETE | [api.copernica.com/v3/ms/template/$id](./rest-delete-ms-template)                            | Verwijderen van een template                      |
| GET    | [api.copernica.com/v3/ms/template/$id/statistics](./rest-get-ms-template-statistics)         | Opvragen van statistieken voor een template       |

### Destinations (bestemmingen)

Binnen Copernica's Marketing Suite zijn de termen 'destination' (bestemming) 
en 'message' (bericht) uitwisselbaar. Beide verwijzen naar een specifiek bericht 
verzonden naar een specifieke bestemming. In onderstaande artikelen kun je 
in zowel de tekst 'destination' door 'message' vervangen, of andersom. 
Dit geldt ook voor de voorbeeldcode.

| Type   | Adres                                                                                        | Omschrijving                                                  |
|--------|----------------------------------------------------------------------------------------------|---------------------------------------------------------------|
| GET    | [api.copernica.com/v3/ms/destination/$id](./rest-get-ms-destination)                         | Opvragen van een bestemming                                   |
| GET    | [api.copernica.com/v3/ms/emailing/$id/destinations](./rest-get-ms-emailing-destinations)     | Opvragen van bestemmingen voor een mailing                    |
| GET    | [api.copernica.com/v3/ms/destination/$id/body](./rest-get-ms-destination-body)               | Opvragen van de message body verzonden naar een bestemming    |
| GET    | [api.copernica.com/v3/ms/destination/$id/statistics](./rest-get-ms-destination-statistics)   | Opvragen van statistieken voor een bestemming                 |
| GET    | [api.copernica.com/v3/ms/destination/$id/deliveries](./rest-get-ms-destination-deliveries)   | Opvragen van alle deliveries voor een bestemming              |
| GET    | [api.copernica.com/v3/ms/destination/$id/impressions](./rest-get-ms-destination-impressions) | Opvragen van alle impressions voor een bestemming             |
| GET    | [api.copernica.com/v3/ms/destination/$id/clicks](./rest-get-ms-destination-clicks)           | Opvragen van alle clicks voor een bestemming                  |
| GET    | [api.copernica.com/v3/ms/destination/$id/unsubscribes](./rest-get-ms-destination-unsubscribes) | Opvragen van alle uitschrijvingen voor een bestemming      |
| GET    | [api.copernica.com/v3/ms/destination/$id/errors](./rest-get-ms-destination-errors)           | Opvragen van alle errors voor een bestemming                  |
| GET    | [api.copernica.com/v3/ms/destination/$id/abuses](./rest-get-ms-destination-abuses)           | Opvragen van alle abuses voor een bestemming                  |
| GET    | [api.copernica.com/v3/profile/$id/ms/destinations](./rest-get-profile-ms-destinations)       | Opvragen van Marketing Suite destinations voor een profiel    |
| GET    | [api.copernica.com/v3/subprofile/$id/ms/destinations](./rest-get-subprofile-ms-destinations) | Opvragen van Marketing Suite destinations voor een subprofiel |

### Statistieken

| Type   | Adres                                                                                        | Omschrijving                                      |
|--------|----------------------------------------------------------------------------------------------|---------------------------------------------------|
| GET    | [api.copernica.com/v3/ms/deliveries](./rest-get-ms-deliveries)                               | Opvragen van alle deliveries                      |
| GET    | [api.copernica.com/v3/ms/impressions](./rest-get-ms-impressions)                             | Opvragen van alle impressions                     |
| GET    | [api.copernica.com/v3/ms/clicks](./rest-get-ms-clicks)                                       | Opvragen van alle clicks                          |
| GET    | [api.copernica.com/v3/ms/errors](./rest-get-ms-errors)                                       | Opvragen van alle errors                          |
| GET    | [api.copernica.com/v3/ms/unsubscribes](./rest-get-ms-unsubscribes)                           | Opvragen van alle unsubscribes                    |
| GET    | [api.copernica.com/v3/ms/abuses](./rest-get-ms-abuses)                                       | Opvragen van alle abuses                          |
| GET    | [api.copernica.com/v3/ms/emailing/$id/statistics](./rest-get-ms-emailing-statistics)         | Opvragen van statistieken voor een mailing        |
| GET    | [api.copernica.com/v3/ms/emailing/$id/abuses](./rest-get-ms-emailing-abuses)                 | Opvragen van alle abuses voor een emailing        |
| GET    | [api.copernica.com/v3/ms/emailing/$id/clicks](./rest-get-ms-emailing-clicks)                 | Opvragen van alle clicks voor een emailing        |
| GET    | [api.copernica.com/v3/ms/emailing/$id/deliveries](./rest-get-ms-emailing-deliveries)         | Opvragen van alle deliveries voor een emailing    |
| GET    | [api.copernica.com/v3/ms/emailing/$id/errors](./rest-get-ms-emailing-errors)                 | Opvragen van alle errors voor een emailing        |
| GET    | [api.copernica.com/v3/ms/emailing/$id/impressions](./rest-get-ms-emailing-impressions)       | Opvragen van alle impressions voor een emailing   |
| GET    | [api.copernica.com/v3/ms/destination/$id/statistics](./rest-get-ms-destination-statistics)   | Opvragen van statistieken voor een bestemming     |
| GET    | [api.copernica.com/v3/ms/destination/$id/abuses](./rest-get-ms-destination-abuses)           | Opvragen van alle abuses voor een bestemming      |
| GET    | [api.copernica.com/v3/ms/destination/$id/clicks](./rest-get-ms-destination-clicks)           | Opvragen van alle clicks voor een bestemming      |
| GET    | [api.copernica.com/v3/ms/destination/$id/deliveries](./rest-get-ms-destination-deliveries)   | Opvragen van alle deliveries voor een bestemming  |
| GET    | [api.copernica.com/v3/ms/destination/$id/errors](./rest-get-ms-destination-errors)           | Opvragen van alle errors voor een bestemming      |
| GET    | [api.copernica.com/v3/ms/destination/$id/impressions](./rest-get-ms-destination-impressions) | Opvragen van alle impressions voor een bestemming |

## Mediabibliotheken

| Type   | Adres                                                                                        | Omschrijving                                                          |
|--------|----------------------------------------------------------------------------------------------|-----------------------------------------------------------------------|
| POST   | [api.copernica.com/v3/medialibrary/$id/files](./rest-post-medialibrary-files)                | Toevoegen van een bestand/afbeelding aan je mediabibliotheek          |

## Dataverzoeken

Nadat alle data voor een dataverzoek is verzameld wordt de data voor een
korte periode op de Copernica servers opgeslagen. Met de onderstaande
calls kun je dataverzoeken aanmaken en de data en status van deze verzoeken opvragen.

| Type   | Adres                                                                                        | Omschrijving                                 |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| POST   | [api.copernica.com/v3/email/$email/datarequest](./rest-post-email-datarequest)               | Aanmaken dataverzoek voor een e-mailadres    |
| POST   | [api.copernica.com/v3/profile/$id/datarequest](./rest-post-profile-datarequest)              | Aanmaken dataverzoek voor een profiel        |
| POST   | [api.copernica.com/v3/subprofile/$id/datarequest](./rest-post-subprofile-datarequest)        | Aanmaken dataverzoek voor een subprofiel     |
| GET    | [api.copernica.com/v3/datarequest/$id/data](./rest-get-datarequest-data)                     | Opvragen data van een dataverzoek            |
| GET    | [api.copernica.com/v3/datarequest/$id/status](./rest-get-datarequest-status)                 | Opvragen status van een dataverzoek          |

## Logfiles

Copernica houdt uitgebreide data bij over alles gerelateerd aan een
mailing. Je kunt alle calls gerelateerd aan logfiles in de onderstaande tabel vinden.

| Type   | Adres                                                                                        | Omschrijving                                  |
|--------|----------------------------------------------------------------------------------------------|-----------------------------------------------|
| GET    | [api.copernica.com/v3/logfiles](./rest-get-logfiles)                                         | Opvragen logfile datums                       |
| GET    | [api.copernica.com/v3/logfiles](./rest-get-logfiles-names)                                   | Opvragen logfile namen                        |
| GET    | [api.copernica.com/v3/logfile/$filename/csv](./rest-get-logfiles-csv)                        | Opvragen logfiles in CSV                      |
| GET    | [api.copernica.com/v3/logfile/$filename/json](./rest-get-logfiles-json)                      | Opvragen logfiles in JSON                     |
| GET    | [api.copernica.com/v3/logfile/$filename/xml](./rest-get-logfiles-xml)                        | Opvragen logfiles in XML                      |

## Webhooks

Webhooks zijn processen die hun gebruiker op de hoogte stellen van gebeurtenissen die realtime plaatsvinden via HTTP POST. Je kunt alle calls gerelateerd aan webhooks in de onderstaande tabel vinden.

| Type   | Adres                                                                                        | Omschrijving                                  |
|--------|----------------------------------------------------------------------------------------------|-----------------------------------------------|
| GET    | [api.copernica.com/v3/webhook/$id](./rest-get-webhook)                                       | Opvragen van een webhook                      |
| POST   | [api.copernica.com/v3/webhooks](./rest-post-webhooks)                                        | Aanmaken van een webhook                      |
| PUT    | [api.copernica.com/v3/webhook/$id](./rest-put-webhook)                                       | Updaten van een webhook                       |
| DELETE | [api.copernica.com/v3/webhook/$id](./rest-delete-webhook)                                    | Verwijderen van een webhook                   |


## Sender domains

Een senderdomain wordt gebruikt om e-mails te versturen via Copernica. Wanneer je een domein instelt als senderdomain zorgen wij er voor dat je DNS records automatisch bijgewerkt worden. Je Click, Bounce en Open domains en DKIM-sleutels zullen automatisch worden ingesteld.

| Type   | Adres                                                                                        | Omschrijving                                  |
|--------|----------------------------------------------------------------------------------------------|-----------------------------------------------|
| GET    | [api.copernica.com/v3/senderdomain/$id](./rest-get-senderdomain)                                       | Opvragen van een senderdomain                      |
| POST   | [api.copernica.com/v3/senderdomains](./rest-post-senderdomains)                                        | Aanmaken van een senderdomain                      |
| PUT    | [api.copernica.com/v3/senderdomain/$id](./rest-put-senderdomain)                                       | Updaten van een senderdomain                       |
| DELETE | [api.copernica.com/v3/senderdomain/$id](./rest-delete-senderdomain)                                    | Verwijderen van een senderdomain                   |
