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
| PUT       | [api.copernica.com/database/$id/field/$id](./rest-put-database-field)                     | Veld uit database bijwerken                   |
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
| GET       | [api.copernica.com/view/$id](./rest-get-view)                                             | Opvragen selectiegegevens                     |
| PUT       | [api.copernica.com/view/$id](./rest-put-view)                                             | Bewerken selectiegegevens                     |
| DELETE    | [api.copernica.com/view/$id](./rest-delete-view)                                          | Verwijderen selectie                          |
| GET       | [api.copernica.com/view/$id/profiles](./rest-get-view-profiles)                           | Opvragen profielen in een selectie            |
| GET       | [api.copernica.com/view/$id/profileids](./rest-get-view-profileids)                       | Opvragen profiel identifiers                  |
| GET       | [api.copernica.com/view/$id/rules](./rest-get-view-rules)                                 | Opvragen selectieregels                       |
| POST      | [api.copernica.com/view/$id/rules](./rest-post-view-rules)                                | Aanmaken nieuwe selectieregel                 |
| GET       | [api.copernica.com/view/$id/rule/$id](./rest-get-view-rule)                               | Opvragen selectieregel                        |
| GET       | [api.copernica.com/view/$id/views](./rest-get-view-views)                                 | Opvragen geneste selecties                    |
| POST      | [api.copernica.com/view/$id/views](./rest-post-view-views)                                | Aanmaken geneste selectie                     |
| GET       | [api.copernica.com/profile/$id](./rest-get-profile)                                       | Opvragen profielgegevens                      |
| PUT       | [api.copernica.com/profile/$id](./rest-put-profile)                                       | Bijwerken profielgegevens                     |
| DELETE    | [api.copernica.com/profile/$id](./rest-delete-profile)                                    | Verwijderen profiel                           |
| GET       | [api.copernica.com/profile/$id/fields](./rest-get-profile-fields)                         | Opvragen profielvelden                        |
| PUT       | [api.copernica.com/profile/$id/fields](./rest-put-profile-fields)                         | Bijwerken profielvelden                       |
| GET       | [api.copernica.com/profile/$id/interests](./rest-get-profile-interests)                   | Opvragen interesses van profiel               |
| POST      | [api.copernica.com/profile/$id/interests](./rest-post-profile-interests)                  | Toevoegen interesses van profiel              |
| PUT       | [api.copernica.com/profile/$id/interests](./rest-put-profile-interests)                   | Overschrijven interesses van profiel          |
| PUT       | [api.copernica.com/profile/$id/changeinterests](./rest-put-profile-changeinterests)       | In- en uitschakelen interesses van profiel    |
| GET       | [api.copernica.com/profile/$id/subprofiles](./rest-get-profile-subprofiles)               | Opvragen subprofielen van een profiel         |
| POST      | [api.copernica.com/profile/$id/subprofiles](./rest-post-profile-subprofiles)              | Toevoegen van een subprofielen aan een profiel|
| GET       | [api.copernica.com/collection/$id](./rest-get-collection)                                 | Opvragen collectiegegevens                    |
| PUT       | [api.copernica.com/collection/$id](./rest-get-collection)                                 | Bijwerken collectiegegevens                   |
| GET       | [api.copernica.com/collection/$id/fields](./rest-get-collection-fields)                   | Opvragen velden in een collectie              |
| POST      | [api.copernica.com/collection/$id/fields](./rest-post-collection-fields)                  | Aanmaken veld in een collectie                |
| PUT       | [api.copernica/com/collection/$id/field/$id](./rest-put-collection-field)                 | Bijwerken veld in colectie                    |
| DELETE    | [api.copernica.com/collection/$id/field/$id](./rest-delete-collection-field)              | Verwijderen veld in collectie                 |
| GET       | [api.copernica.com/collection/$id/miniviews](./rest-get-collection-miniviews)             | Opvragen miniselecties onder een collectie    |
| POST      | [api.copernica.com/collection/$id/miniviews](./rest-post-collection-miniviews)            | Aanmaken van een miniselectie                 |
| GET       | [api.copernica.com/collection/$id/subprofiles](./rest-get-collection-subprofiles)         | Opvragen subprofiles in een collectie         |
| GET       | [api.copernica.com/collection/$id/subprofileids](./rest-get-collection-subprofileids)     | Opvragen subprofileids in een collectie       |
| GET       | [api.copernica.com/collection/$id/unsubscribe](./rest-get-collection-unsubscribe)         | Opvragen afmeldgedrag van een collectie       |
| PUT       | [api.copernica.com/collection/$id/unsubscribe](./rest-put-collection-unsubscribe)         | Bijwerken afmeldgedrag van een collectie      |
| GET       | [api.copernica.com/miniview/$id](./rest-get-miniview)                                     | Opvragen miniselectiegegevens                     |
| PUT       | [api.copernica.com/miniview/$id](./rest-put-miniview)                                     | Bewerken miniselectiegegevens                     |
| DELETE    | [api.copernica.com/miniview/$id](./rest-delete-miniview)                                  | Verwijderen miniselectie                          |
| GET       | [api.copernica.com/miniview/$id/subprofiles](./rest-get-miniview-subprofiles)             | Opvragen subprofielen in een miniselectie            |
| GET       | [api.copernica.com/miniview/$id/subprofileids](./rest-get-miniview-subprofileids)         | Opvragen subprofiel identifiers                  |
| GET       | [api.copernica.com/miniview/$id/rules](./rest-get-miniview-rules)                         | Opvragen selectieregels                       |
| POST      | [api.copernica.com/miniview/$id/rules](./rest-post-miniview-rules)                        | Aanmaken nieuwe miniselectieregel                 |
| GET       | [api.copernica.com/miniview/$id/rule/$id](./rest-get-miniview-rule)                       | Opvragen miniselectieregel                        |
| GET       | [api.copernica.com/subprofile/$id](./rest-get-subprofile)                                 | Opvragen subprofielgegevens                   |
| GET       | [api.copernica.com/subprofile/$id/fields](./rest-get-subprofile-fields)                   | Opvragen subprofielvelden                     |
