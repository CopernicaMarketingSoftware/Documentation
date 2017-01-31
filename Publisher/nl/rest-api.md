# De REST API

Met de REST API kun je automatische koppelingen met Copernica maken. Je kunt
bijvoorbeeld je website of app zo programmeren dat hij met behulp van de REST
API gegevens in je Copernica-account ophaalt, creëert, updatet of verwijdert.
Dit gaat automatisch, dus buiten de *user interface* om.

* [Introductie: de REST api in een notendop](rest-introduction)
* [HTTP requests sturen en antwoorden ontvangen](rest-requests)
* [Fancy OAuth2 koppelingen](rest-oauth)

## REST API: overzicht van methodes

De volgende methodes zijn toegankelijk via HTTP GET, POST, PUT en DELETE:

| Methode   | Adres                                                                                     | Omschrijving                                  |
| --------- | ----------------------------------------------------------------------------------------- | --------------------------------------------- |
| GET       | [api.copernica.com/databases](./rest-get-databases)                                       | Opvragen databases                            |
| POST      | [api.copernica.com/databases](./rest-post-databases)                                      | Aanmaken nieuwe database                      |
| GET       | [api.copernica.com/database/$id](./rest-get-database)                                     | Opvragen databasegegevens                     |
| PUT       | [api.copernica.com/database/$id](./rest-put-database)                                     | Bijwerken databasegegevens                    |
| DELETE    | [api.copernica.com/database/$id](./rest-delete-database)                                  | Verwijderen database                          |
| GET       | [api.copernica.com/database/$id/unsubscribe](./rest-get-database-unsubscribe)             | Opvragen afmeldalgoritme                      |
| PUT       | [api.copernica.com/database/$id/unsubscribe](./rest-put-database-unsubscribe)             | Instellen afmeldalgoritme                     |
| GET       | [api.copernica.com/database/$id/fields](./rest-get-database-fields)                       | Opvragen databasevelden                       |
| POST      | [api.copernica.com/database/$id/fields](./rest-post-database-fields)                      | Aanmaken databaseveld                         |
| DELETE    | [api.copernica.com/database/$id/field/$id](./rest-delete-database-field)                  | Veld uit database verwijderen                 |
| GET       | [api.copernica.com/database/$id/interests](./rest-get-database-interests)                 | Opvragen interesses                           |
| POST      | [api.copernica.com/database/$id/interests](./rest-post-database-interests)                | Aanmaken interesse                            |
| GET       | [api.copernica.com/database/$id/collections](./rest-get-database-collections)             | Opvragen collecties                           |
| POST      | [api.copernica.com/database/$id/collections](./rest-post-database-collections)            | Aanmaken collectie                            |
| GET       | [api.copernica.com/database/$id/profiles](./rest-get-database-profiles)                   | Opvragen profielen                            |
| POST      | [api.copernica.com/database/$id/profiles](./rest-post-database-profiles)                  | Aanmaken nieuw profiel                        |
| PUT       | [api.copernica.com/database/$id/profiles](./rest-put-database-profiles)                   | Meerdere profielen tegelijk bewerken          |
| GET       | [api.copernica.com/database/$id/profileids](./rest-get-database-profileids)               | Opvragen profiel identifiers                  |
| GET       | [api.copernica.com/database/$id/views](./rest-get-database-views)                         | Opvragen selecties                            |
| POST      | [api.copernica.com/database/$id/views](./rest-post-database-views)                        | Aanmaken nieuwe selectie                      |
| GET       | [api.copernica.com/collection/$id](./rest-get-collection)                                 | Opvragen collectiegegevens                    |
| PUT       | [api.copernica.com/collection/$id](./rest-get-collection)                                 | Bijwerken collectiegegevens                   |
| GET       | [api.copernica.com/collection/$id/fields](./rest-get-collection-fields)                   | Opvragen velden in een collectie              |
| GET       | [api.copernica.com/collection/$id/miniviews](./rest-get-collection-miniviews)             | Opvragen miniselecties onder een collectie    |
| GET       | [api.copernica.com/collection/$id/subprofiles](./rest-get-collection-subprofiles)         | Opvragen subprofiles in een collectie         |
| GET       | [api.copernica.com/collection/$id/subprofileids](./rest-get-collection-subprofileids)     | Opvragen subprofileids in een collectie       |
| GET       | [api.copernica.com/collection/$id/unsubscribe](./rest-get-collection-unsubscribe)         | Opvragen afmeldgedrag van een collectie       |
