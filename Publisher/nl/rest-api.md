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

| Methode   | Adres                                                                                                 | Omschrijving                                  |
| --------- | ----------------------------------------------------------------------------------------------------- | --------------------------------------------- |
| GET       | [api.copernica.com/identity](./rest-get-identity)                                                     | Opvragen identiteit van API koppeling         |
| GET       | [api.copernica.com/databases](./rest-get-databases)                                                   | Opvragen databases                            |
| POST      | [api.copernica.com/databases](./rest-post-databases)                                                  | Aanmaken nieuwe database                      |
| GET       | [api.copernica.com/database/$id](./rest-get-database)                                                 | Opvragen databasegegevens                     |
| PUT       | [api.copernica.com/database/$id](./rest-put-database)                                                 | Bijwerken databasegegevens                    |
| DELETE    | [api.copernica.com/database/$id](./rest-delete-database)                                              | Verwijderen database                          |
| GET       | [api.copernica.com/database/$id/unsubscribe](./rest-get-database-unsubscribe)                         | Opvragen afmeldalgoritme                      |
| PUT       | [api.copernica.com/database/$id/unsubscribe](./rest-put-database-unsubscribe)                         | Instellen afmeldalgoritme                     |
| GET       | [api.copernica.com/database/$id/fields](./rest-get-database-fields)                                   | Opvragen databasevelden                       |
| POST      | [api.copernica.com/database/$id/fields](./rest-post-database-fields)                                  | Aanmaken databaseveld                         |
| PUT       | [api.copernica.com/database/$id/field/$id](./rest-put-database-field)                                 | Veld uit database bijwerken                   |
| DELETE    | [api.copernica.com/database/$id/field/$id](./rest-delete-database-field)                              | Veld uit database verwijderen                 |
| GET       | [api.copernica.com/database/$id/interests](./rest-get-database-interests)                             | Opvragen interesses                           |
| POST      | [api.copernica.com/database/$id/interests](./rest-post-database-interests)                            | Aanmaken interesse                            |
| GET       | [api.copernica.com/database/$id/collections](./rest-get-database-collections)                         | Opvragen collecties                           |
| POST      | [api.copernica.com/database/$id/collections](./rest-post-database-collections)                        | Aanmaken collectie                            |
| GET       | [api.copernica.com/database/$id/profiles](./rest-get-database-profiles)                               | Opvragen profielen                            |
| POST      | [api.copernica.com/database/$id/profiles](./rest-post-database-profiles)                              | Aanmaken nieuw profiel                        |
| PUT       | [api.copernica.com/database/$id/profiles](./rest-put-database-profiles)                               | Meerdere profielen tegelijk bewerken          |
| GET       | [api.copernica.com/database/$id/profileids](./rest-get-database-profileids)                           | Opvragen profiel identifiers                  |
| GET       | [api.copernica.com/database/$id/views](./rest-get-database-views)                                     | Opvragen selecties                            |
| POST      | [api.copernica.com/database/$id/views](./rest-post-database-views)                                    | Aanmaken nieuwe selectie                      |
| GET       | [api.copernica.com/view/$id](./rest-get-view)                                                         | Opvragen selectiegegevens                     |
| PUT       | [api.copernica.com/view/$id](./rest-put-view)                                                         | Bewerken selectiegegevens                     |
| DELETE    | [api.copernica.com/view/$id](./rest-delete-view)                                                      | Verwijderen selectie                          |
| GET       | [api.copernica.com/view/$id/profiles](./rest-get-view-profiles)                                       | Opvragen profielen in een selectie            |
| GET       | [api.copernica.com/view/$id/profileids](./rest-get-view-profileids)                                   | Opvragen profiel identifiers                  |
| GET       | [api.copernica.com/view/$id/rules](./rest-get-view-rules)                                             | Opvragen selectieregels                       |
| POST      | [api.copernica.com/view/$id/rules](./rest-post-view-rules)                                            | Aanmaken nieuwe selectieregel                 |
| GET       | [api.copernica.com/view/$id/rule/$id](./rest-get-view-rule)                                           | Opvragen selectieregel                        |
| GET       | [api.copernica.com/view/$id/views](./rest-get-view-views)                                             | Opvragen geneste selecties                    |
| POST      | [api.copernica.com/view/$id/views](./rest-post-view-views)                                            | Aanmaken geneste selectie                     |
| GET       | [api.copernica.com/rule/$id](./rest-get-rule)                                                         | Opvragen instellingen van selectieregel       |
| PUT       | [api.copernica.com/rule/$id](./rest-put-rule)                                                         | Bijwerken instellingen van selectieregel      |
| DELETE    | [api.copernica.com/rule/$id](./rest-delete-rule)                                                      | Verwijderen van een selectieregel             |
| GET       | [api.copernica.com/rule/$id/conditions](./rest-get-rule-conditions)                                   | Opvragen van selectieregels                   |
| POST      | [api.copernica.com/rule/$id/conditions](./rest-post-rule-conditions)                                  | Aanmaken nieuwe conditie bij selectieregel    |
| GET       | [api.copernica.com/profile/$id](./rest-get-profile)                                                   | Opvragen profielgegevens                      |
| PUT       | [api.copernica.com/profile/$id](./rest-put-profile)                                                   | Bijwerken profielgegevens                     |
| DELETE    | [api.copernica.com/profile/$id](./rest-delete-profile)                                                | Verwijderen profiel                           |
| GET       | [api.copernica.com/profile/$id/fields](./rest-get-profile-fields)                                     | Opvragen profielvelden                        |
| PUT       | [api.copernica.com/profile/$id/fields](./rest-put-profile-fields)                                     | Bijwerken profielvelden                       |
| GET       | [api.copernica.com/profile/$id/interests](./rest-get-profile-interests)                               | Opvragen interesses van profiel               |
| POST      | [api.copernica.com/profile/$id/interests](./rest-post-profile-interests)                              | Toevoegen interesses van profiel              |
| PUT       | [api.copernica.com/profile/$id/interests](./rest-put-profile-interests)                               | Overschrijven interesses van profiel          |
| PUT       | [api.copernica.com/profile/$id/changeinterests](./rest-put-profile-changeinterests)                   | In- en uitschakelen interesses van profiel    |
| GET       | [api.copernica.com/profile/$id/subprofiles](./rest-get-profile-subprofiles)                           | Opvragen subprofielen van een profiel         |
| POST      | [api.copernica.com/profile/$id/subprofiles](./rest-post-profile-subprofiles)                          | Toevoegen van een subprofielen aan een profiel|
| GET       | [api.copernica.com/collection/$id](./rest-get-collection)                                             | Opvragen collectiegegevens                    |
| PUT       | [api.copernica.com/collection/$id](./rest-put-collection)                                             | Bijwerken collectiegegevens                   |
| GET       | [api.copernica.com/collection/$id/fields](./rest-get-collection-fields)                               | Opvragen velden in een collectie              |
| POST      | [api.copernica.com/collection/$id/fields](./rest-post-collection-fields)                              | Aanmaken veld in een collectie                |
| PUT       | [api.copernica/com/collection/$id/field/$id](./rest-put-collection-field)                             | Bijwerken veld in colectie                    |
| DELETE    | [api.copernica.com/collection/$id/field/$id](./rest-delete-collection-field)                          | Verwijderen veld in collectie                 |
| GET       | [api.copernica.com/collection/$id/miniviews](./rest-get-collection-miniviews)                         | Opvragen miniselecties onder een collectie    |
| POST      | [api.copernica.com/collection/$id/miniviews](./rest-post-collection-miniviews)                        | Aanmaken van een miniselectie                 |
| GET       | [api.copernica.com/collection/$id/subprofiles](./rest-get-collection-subprofiles)                     | Opvragen subprofiles in een collectie         |
| GET       | [api.copernica.com/collection/$id/subprofileids](./rest-get-collection-subprofileids)                 | Opvragen subprofileids in een collectie       |
| GET       | [api.copernica.com/collection/$id/unsubscribe](./rest-get-collection-unsubscribe)                     | Opvragen afmeldgedrag van een collectie       |
| PUT       | [api.copernica.com/collection/$id/unsubscribe](./rest-put-collection-unsubscribe)                     | Bijwerken afmeldgedrag van een collectie      |
| GET       | [api.copernica.com/miniview/$id](./rest-get-miniview)                                                 | Opvragen miniselectiegegevens                 |
| PUT       | [api.copernica.com/miniview/$id](./rest-put-miniview)                                                 | Bewerken miniselectiegegevens                 |
| DELETE    | [api.copernica.com/miniview/$id](./rest-delete-miniview)                                              | Verwijderen miniselectie                      |
| GET       | [api.copernica.com/miniview/$id/subprofiles](./rest-get-miniview-subprofiles)                         | Opvragen subprofielen in een miniselectie     |
| GET       | [api.copernica.com/miniview/$id/subprofileids](./rest-get-miniview-subprofileids)                     | Opvragen subprofiel identifiers               |
| GET       | [api.copernica.com/miniview/$id/rules](./rest-get-miniview-rules)                                     | Opvragen selectieregels                       |
| POST      | [api.copernica.com/miniview/$id/rules](./rest-post-miniview-rules)                                    | Aanmaken nieuwe miniselectieregel             |
| GET       | [api.copernica.com/miniview/$id/rule/$id](./rest-get-miniview-rule)                                   | Opvragen miniselectieregel                    |
| GET       | [api.copernica.com/minirule/$id](./rest-get-minirule)                                                 | Opvragen instellingen van miniselectieregel   |
| PUT       | [api.copernica.com/minirule/$id](./rest-put-minirule)                                                 | Bijwerken instellingen van miniselectieregel  |
| DELETE    | [api.copernica.com/minirule/$id](./rest-delete-minirule)                                              | Verwijderen van een miniselectieregel         |
| GET       | [api.copernica.com/minirule/$id/conditions](./rest-get-minirule-conditions)                           | Opvragen van condities van een miniselectie   |
| POST      | [api.copernica.com/minirule/$id/conditions](./rest-post-minirule-conditions)                          | Aanmaken nieuwe conditie bij miniselectieregel|
| GET       | [api.copernica.com/subprofile/$id](./rest-get-subprofile)                                             | Opvragen subprofielgegevens                   |
| GET       | [api.copernica.com/subprofile/$id/fields](./rest-get-subprofile-fields)                               | Opvragen subprofielvelden                     |
| GET       | [api.copernica.com/emailings](./rest-get-emailings)                                                   | Opvragen van (publisher) emailings            |
| GET       | [api.copernica.com/emailing/$id](./rest-get-emailing)                                                 | Opvragen gegevens van een emailing            |
| GET       | [api.copernica.com/emailing/$id/abuses](./rest-get-emailing-abuses)                                   | Opvragen abusemeldingen per emailing          |
| GET       | [api.copernica.com/emailing/$id/clicks](./rest-get-emailing-clicks)                                   | Opvragen kliks per emailing                   |
| GET       | [api.copernica.com/emailing/$id/deliveries](./rest-get-emailing-deliveries)                           | Opvragen afleveringen per emailing            |
| GET       | [api.copernica.com/emailing/$id/destinations](./rest-get-emailing-destinations)                       | Opvragen geadresseerden per emailing          |
| GET       | [api.copernica.com/emailing/$id/errors](./rest-get-emailing-errors)                                   | Opvragen foutmeldingen per emailing           |
| GET       | [api.copernica.com/emailing/$id/impressions](./rest-get-emailing-impressions)                         | Opvragen impressies (opens) per emailing      |
| GET       | [api.copernica.com/emailing/$id/snapshot](./rest-get-emailing-snapshot)                               | Opvragen document snapshot van een emailing   |
| GET       | [api.copernica.com/emailing/$id/statistics](./rest-get-emailing-statistics)                           | Opvragen statistieken per emailing            |
| GET       | [api.copernica.com/emailing/$id/unsubscribes](./rest-get-emailing-unsubscribes)                       | Opvragen afmeldingen per emailing             |
| GET       | [api.copernica.com/emailingtemplates](./rest-get-emailingtemplates)                                   | Opvragen emailing templates                   |
| GET       | [api.copernica.com/emailingtemplate/$id](./rest-get-emailingtemplate)                                 | Opvragen gegevens van een template            |
| GET       | [api.copernica.com/emailingtemplate/$id/documents](./rest-get-emailingtemplate-documents)             | Opvragen documenten behorende bij een template|
| GET       | [api.copernica.com/emailingtemplate/$id/emailings](./rest-get-emailingtemplate-emailings)             | Opvragen mailings op basis van een template   |
| GET       | [api.copernica.com/emailnigdocument/$id](./rest-get-emailingdocument)                                 | Opvragen gegevens van een document            |
| GET       | [api.copernica.com/emailingdocument/$id/emailings](./rest-get-emailingdocument-emailings)             | Opvragen mailings op basis van een document   |
| GET       | [api.copernica.com/emailingdestination/$id](./rest-get-emailingdestination)                           | Opvragen gegevens van een geadresseerde       |
| GET       | [api.copernica.com/emailingdestination/$id/abuses](./rest-get-emailingdestination-abuses)             | Opvragen abusemeldingen per geadresseerde     |
| GET       | [api.copernica.com/emailingdestination/$id/clicks](./rest-get-emailingdestination-clicks)             | Opvragen kliks per geadresseerde              |
| GET       | [api.copernica.com/emailingdestination/$id/deliveries](./rest-get-emailingdestination-deliveries)     | Opvragen afleveringen per geadresseerde       |
| GET       | [api.copernica.com/emailingdestination/$id/errors](./rest-get-emailingdestination-errors)             | Opvragen foutmeldingen per geadresseerde      |
| GET       | [api.copernica.com/emailingdestination/$id/fields](./rest-get-emailingdestination-fields)             | Opvragen velden van een geadresseerde         |
| GET       | [api.copernica.com/emailingdestination/$id/impressions](./rest-get-emailingdestination-impressions)   | Opvragen impressies per geadresseerde         |
| GET       | [api.copernica.com/emailingdestination/$id/unsubscribes](./rest-get-emailingdestination-unsubscribes) | Opvragen afmeldingen per geadresseerde        |
| GET       | [api.copernica.com/abuses](./rest-get-abuses)                                                         | Opvragen alle abusemeldingen voor het account |
| GET       | [api.copernica.com/clicks](./rest-get-clicks)                                                         | Opvragen alle kliks voor het account          |
| GET       | [api.copernica.com/deliveries](./rest-get-deliveries)                                                 | Opvragen alle afleveringen voor het account   |
| GET       | [api.copernica.com/errors](./rest-get-errors)                                                         | Opvragen alle foutmeldingen voor het account  |
| GET       | [api.copernica.com/impressions](./rest-get-impressions)                                               | Opvragen alle impressies voor het account     |
| GET       | [api.copernica.com/unsubscribes](./rest-get-unsubscribes)                                             | Opvragen alle afmeldingen voor het account    |
| GET       | [api.copernica.com/logfiles](./rest-get-logfiles)                                                     | Opvragen van alle logfiles                    |
| GET       | [api.copernica.com/logfiles/$name](./rest-get-logfiles-csv)                                           | Downloaden van logfile in CSV formaat         |
| GET       | [api.copernica.com/logfiles/$name/json](./rest-get-logfiles-json)                                     | Downloaden van logfile in JSON formaat        |
| GET       | [api.copernica.com/logfiles/$name/xml](./rest-get-logfiles-xml)                                       | Downloaden van logfile in XML formaat         |
