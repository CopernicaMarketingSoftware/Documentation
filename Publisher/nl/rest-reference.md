# REST API: overzicht van methodes

We hebben de documentatie van de REST API opgesplitst in verschillende
methodes. 

| Methode   | Adres                                                                                     | Omschrijving                                  |
| --------- | ----------------------------------------------------------------------------------------- | --------------------------------------------- |
| GET       | [api.copernica.com/databases](./rest-get-databases)                                       | Opvragen databases                            |
| POST      | [api.copernica.com/databases](./rest-post-databases)                                      | Aanmaken nieuwe database                      |
| GET       | [api.copernica.com/database/$id](./rest-get-database)                                     | Opvragen databasegegevens                     |
| PUT       | [api.copernica.com/database/$id](./rest-put-database)                                     | Bijwerken databasegegevens                    |
| DELETE    | [api.copernica.com/database/$id](./rest-delete-database)                                  | Verwijderen database                          |
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
| GET       | [api.copernica.com/collection/$id](./rest-get-collection)                                 | Opvragen collectiegegevens                    |
| GET       | [api.copernica.com/collection/$id/callbacks](./rest-get-collection-callbacks)             | Opvragen feedback loops van een collectie     |
| GET       | [api.copernica.com/collection/$id/fields](./rest-get-collection-fields)                   | Opvragen velden in een collectie              |
| GET       | [api.copernica.com/collection/$id/miniviews](./rest-get-collection-miniviews)             | Opvragen miniselecties onder een collectie    |
| GET       | [api.copernica.com/collection/$id/subprofileids](./rest-get-collection-subprofileids)     | Opvragen subprofileids in een collectie       |
| GET       | [api.copernica.com/collection/$id/subprofiles](./rest-get-collection-subprofiles)         | Opvragen subprofiles in een collectie         |
| GET       | [api.copernica.com/collection/$id/unsubscribe](./rest-get-collection-unsubscribe)         | Opvragen afmeldgedrag van een collectie       |



**Let op**: bovenstaande lijst is nog lang niet compleet. De REST API kent veel meer methodes die gaandeweg worden gedocumenteerd.



<!--

| [/database/$databaseID/unsubscribe](./database-unsubscribe-behaviour.md) | GET, POST |
| [/database/$databaseID/callbacks](./database-callbacks.md) | GET, POST |

-->
