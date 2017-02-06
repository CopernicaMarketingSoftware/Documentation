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

| Methode   | Adres                                                                                                     | Omschrijving                                  |
| --------- | --------------------------------------------------------------------------------------------------------- | --------------------------------------------- |
| GET       | [api.copernica.com/identity](./rest-get-identity.md)                                                      | Opvragen identiteit van API koppeling         |
| GET       | [api.copernica.com/databases](./rest-get-databases.md)                                                    | Opvragen databases                            |
| POST      | [api.copernica.com/databases](./rest-post-databases.md)                                                   | Aanmaken nieuwe database                      |
| GET       | [api.copernica.com/database/$id](./rest-get-database.md)                                                  | Opvragen databasegegevens                     |
| PUT       | [api.copernica.com/database/$id](./rest-put-database.md)                                                  | Bijwerken databasegegevens                    |
| DELETE    | [api.copernica.com/database/$id](./rest-delete-database.md)                                               | Verwijderen database                          |
| GET       | [api.copernica.com/database/$id/unsubscribe](./rest-get-database-unsubscribe.md)                          | Opvragen afmeldalgoritme                      |
| PUT       | [api.copernica.com/database/$id/unsubscribe](./rest-put-database-unsubscribe.md)                          | Instellen afmeldalgoritme                     |
| GET       | [api.copernica.com/database/$id/fields](./rest-get-database-fields.md)                                    | Opvragen databasevelden                       |
| POST      | [api.copernica.com/database/$id/fields](./rest-post-database-fields.md)                                   | Aanmaken databaseveld                         |
| PUT       | [api.copernica.com/database/$id/field/$id](./rest-put-database-field.md)                                  | Veld uit database bijwerken                   |
| DELETE    | [api.copernica.com/database/$id/field/$id](./rest-delete-database-field.md)                               | Veld uit database verwijderen                 |
| GET       | [api.copernica.com/database/$id/interests](./rest-get-database-interests.md)                              | Opvragen interesses                           |
| POST      | [api.copernica.com/database/$id/interests](./rest-post-database-interests.md)                             | Aanmaken interesse                            |
| GET       | [api.copernica.com/database/$id/collections](./rest-get-database-collections.md)                          | Opvragen collecties                           |
| POST      | [api.copernica.com/database/$id/collections](./rest-post-database-collections.md)                         | Aanmaken collectie                            |
| GET       | [api.copernica.com/database/$id/profiles](./rest-get-database-profiles.md)                                | Opvragen profielen                            |
| POST      | [api.copernica.com/database/$id/profiles](./rest-post-database-profiles.md)                               | Aanmaken nieuw profiel                        |
| PUT       | [api.copernica.com/database/$id/profiles](./rest-put-database-profiles.md)                                | Meerdere profielen tegelijk bewerken          |
| GET       | [api.copernica.com/database/$id/profileids](./rest-get-database-profileids.md)                            | Opvragen profiel identifiers                  |
| GET       | [api.copernica.com/database/$id/views](./rest-get-database-views.md)                                      | Opvragen selecties                            |
| POST      | [api.copernica.com/database/$id/views](./rest-post-database-views.md)                                     | Aanmaken nieuwe selectie                      |
| GET       | [api.copernica.com/view/$id](./rest-get-view.md)                                                          | Opvragen selectiegegevens                     |
| PUT       | [api.copernica.com/view/$id](./rest-put-view.md)                                                          | Bewerken selectiegegevens                     |
| DELETE    | [api.copernica.com/view/$id](./rest-delete-view.md)                                                       | Verwijderen selectie                          |
| GET       | [api.copernica.com/view/$id/profiles](./rest-get-view-profiles.md)                                        | Opvragen profielen in een selectie            |
| GET       | [api.copernica.com/view/$id/profileids](./rest-get-view-profileids.md)                                    | Opvragen profiel identifiers                  |
| GET       | [api.copernica.com/view/$id/rules](./rest-get-view-rules.md)                                              | Opvragen selectieregels                       |
| POST      | [api.copernica.com/view/$id/rules](./rest-post-view-rules.md)                                             | Aanmaken nieuwe selectieregel                 |
| GET       | [api.copernica.com/view/$id/rule/$id](./rest-get-view-rule.md)                                            | Opvragen selectieregel                        |
| GET       | [api.copernica.com/view/$id/views](./rest-get-view-views.md)                                              | Opvragen geneste selecties                    |
| POST      | [api.copernica.com/view/$id/views](./rest-post-view-views.md)                                             | Aanmaken geneste selectie                     |
| GET       | [api.copernica.com/rule/$id](./rest-get-rule.md)                                                          | Opvragen instellingen van selectieregel       |
| PUT       | [api.copernica.com/rule/$id](./rest-put-rule.md)                                                          | Bijwerken instellingen van selectieregel      |
| DELETE    | [api.copernica.com/rule/$id](./rest-delete-rule.md)                                                       | Verwijderen van een selectieregel             |
| GET       | [api.copernica.com/rule/$id/conditions](./rest-get-rule-conditions.md)                                    | Opvragen van selectieregels                   |
| POST      | [api.copernica.com/rule/$id/conditions](./rest-post-rule-conditions.md)                                   | Aanmaken nieuwe conditie bij selectieregel    |
| GET       | [api.copernica.com/profile/$id](./rest-get-profile.md)                                                    | Opvragen profielgegevens                      |
| PUT       | [api.copernica.com/profile/$id](./rest-put-profile.md)                                                    | Bijwerken profielgegevens                     |
| DELETE    | [api.copernica.com/profile/$id](./rest-delete-profile.md)                                                 | Verwijderen profiel                           |
| GET       | [api.copernica.com/profile/$id/fields](./rest-get-profile-fields.md)                                      | Opvragen profielvelden                        |
| PUT       | [api.copernica.com/profile/$id/fields](./rest-put-profile-fields.md)                                      | Bijwerken profielvelden                       |
| GET       | [api.copernica.com/profile/$id/interests](./rest-get-profile-interests.md)                                | Opvragen interesses van profiel               |
| POST      | [api.copernica.com/profile/$id/interests](./rest-post-profile-interests.md)                               | Toevoegen interesses van profiel              |
| PUT       | [api.copernica.com/profile/$id/interests](./rest-put-profile-interests.md)                                | Overschrijven interesses van profiel          |
| GET       | [api.copernica.com/profile/$id/subprofiles](./rest-get-profile-subprofiles.md)                            | Opvragen subprofielen van een profiel         |
| POST      | [api.copernica.com/profile/$id/subprofiles](./rest-post-profile-subprofiles.md)                           | Toevoegen van een subprofielen aan een profiel|
| GET       | [api.copernica.com/collection/$id](./rest-get-collection.md)                                              | Opvragen collectiegegevens                    |
| PUT       | [api.copernica.com/collection/$id](./rest-put-collection.md)                                              | Bijwerken collectiegegevens                   |
| GET       | [api.copernica.com/collection/$id/fields](./rest-get-collection-fields.md)                                | Opvragen velden in een collectie              |
| POST      | [api.copernica.com/collection/$id/fields](./rest-post-collection-fields.md)                               | Aanmaken veld in een collectie                |
| PUT       | [api.copernica/com/collection/$id/field/$id](./rest-put-collection-field.md)                              | Bijwerken veld in colectie                    |
| DELETE    | [api.copernica.com/collection/$id/field/$id](./rest-delete-collection-field.md)                           | Verwijderen veld in collectie                 |
| GET       | [api.copernica.com/collection/$id/miniviews](./rest-get-collection-miniviews.md)                          | Opvragen miniselecties onder een collectie    |
| POST      | [api.copernica.com/collection/$id/miniviews](./rest-post-collection-miniviews.md)                         | Aanmaken van een miniselectie                 |
| GET       | [api.copernica.com/collection/$id/subprofiles](./rest-get-collection-subprofiles.md)                      | Opvragen subprofiles in een collectie         |
| GET       | [api.copernica.com/collection/$id/subprofileids](./rest-get-collection-subprofileids.md)                  | Opvragen subprofileids in een collectie       |
| GET       | [api.copernica.com/collection/$id/unsubscribe](./rest-get-collection-unsubscribe.md)                      | Opvragen afmeldgedrag van een collectie       |
| PUT       | [api.copernica.com/collection/$id/unsubscribe](./rest-put-collection-unsubscribe.md)                      | Bijwerken afmeldgedrag van een collectie      |
| GET       | [api.copernica.com/miniview/$id](./rest-get-miniview.md)                                                  | Opvragen miniselectiegegevens                 |
| PUT       | [api.copernica.com/miniview/$id](./rest-put-miniview.md)                                                  | Bewerken miniselectiegegevens                 |
| DELETE    | [api.copernica.com/miniview/$id](./rest-delete-miniview.md)                                               | Verwijderen miniselectie                      |
| GET       | [api.copernica.com/miniview/$id/subprofiles](./rest-get-miniview-subprofiles.md)                          | Opvragen subprofielen in een miniselectie     |
| GET       | [api.copernica.com/miniview/$id/subprofileids](./rest-get-miniview-subprofileids.md)                      | Opvragen subprofiel identifiers               |
| GET       | [api.copernica.com/miniview/$id/rules](./rest-get-miniview-rules.md)                                      | Opvragen selectieregels                       |
| POST      | [api.copernica.com/miniview/$id/rules](./rest-post-miniview-rules.md)                                     | Aanmaken nieuwe miniselectieregel             |
| GET       | [api.copernica.com/miniview/$id/rule/$id](./rest-get-miniview-rule.md)                                    | Opvragen miniselectieregel                    |
| GET       | [api.copernica.com/minirule/$id](./rest-get-minirule.md)                                                  | Opvragen instellingen van miniselectieregel   |
| PUT       | [api.copernica.com/minirule/$id](./rest-put-minirule.md)                                                  | Bijwerken instellingen van miniselectieregel  |
| DELETE    | [api.copernica.com/minirule/$id](./rest-delete-minirule.md)                                               | Verwijderen van een miniselectieregel         |
| GET       | [api.copernica.com/minirule/$id/conditions](./rest-get-minirule-conditions.md)                            | Opvragen van condities van een miniselectie   |
| POST      | [api.copernica.com/minirule/$id/conditions](./rest-post-minirule-conditions.md)                           | Aanmaken nieuwe conditie bij miniselectieregel|
| GET       | [api.copernica.com/subprofile/$id](./rest-get-subprofile.md)                                              | Opvragen subprofielgegevens                   |
| GET       | [api.copernica.com/subprofile/$id/fields](./rest-get-subprofile-fields.md)                                | Opvragen subprofielvelden                     |
| GET       | [api.copernica.com/emailings](./rest-get-emailings.md)                                                    | Opvragen van (publisher)  emailings           |
| GET       | [api.copernica.com/emailing/$id](./rest-get-emailing.md)                                                  | Opvragen gegevens van een emailing            |
| GET       | [api.copernica.com/emailing/$id/abuses](./rest-get-emailing-abuses.md)                                    | Opvragen abusemeldingen per emailing          |
| GET       | [api.copernica.com/emailing/$id/clicks](./rest-get-emailing-clicks.md)                                    | Opvragen kliks per emailing                   |
| GET       | [api.copernica.com/emailing/$id/deliveries](./rest-get-emailing-deliveries.md)                            | Opvragen afleveringen per emailing            |
| GET       | [api.copernica.com/emailing/$id/destinations](./rest-get-emailing-destinations.md)                        | Opvragen geadresseerden per emailing          |
| GET       | [api.copernica.com/emailing/$id/errors](./rest-get-emailing-errors.md)                                    | Opvragen foutmeldingen per emailing           |
| GET       | [api.copernica.com/emailing/$id/impressions](./rest-get-emailing-impressions.md)                          | Opvragen impressies (opens)  per emailing     |
| GET       | [api.copernica.com/emailing/$id/snapshot](./rest-get-emailing-snapshot.md)                                | Opvragen document snapshot van een emailing   |
| GET       | [api.copernica.com/emailing/$id/statistics](./rest-get-emailing-statistics.md)                            | Opvragen statistieken per emailing            |
| GET       | [api.copernica.com/emailing/$id/unsubscribes](./rest-get-emailing-unsubscribes.md)                        | Opvragen afmeldingen per emailing             |
| GET       | [api.copernica.com/emailingtemplates](./rest-get-emailingtemplates.md)                                    | Opvragen emailing templates                   |
| GET       | [api.copernica.com/emailingtemplate/$id](./rest-get-emailingtemplate.md)                                  | Opvragen gegevens van een template            |
| GET       | [api.copernica.com/emailingtemplate/$id/documents](./rest-get-emailingtemplate-documents.md)              | Opvragen documenten behorende bij een template|
| GET       | [api.copernica.com/emailingtemplate/$id/emailings](./rest-get-emailingtemplate-emailings.md)              | Opvragen mailings op basis van een template   |
| GET       | [api.copernica.com/emailnigdocument/$id](./rest-get-emailingdocument.md)                                  | Opvragen gegevens van een document            |
| GET       | [api.copernica.com/emailingdocument/$id/emailings](./rest-get-emailingdocument-emailings.md)              | Opvragen mailings op basis van een document   |
| GET       | [api.copernica.com/emailingdestination/$id](./rest-get-emailingdestination.md)                            | Opvragen gegevens van een geadresseerde       |
| GET       | [api.copernica.com/emailingdestination/$id/abuses](./rest-get-emailingdestination-abuses.md)              | Opvragen abusemeldingen per geadresseerde     |
| GET       | [api.copernica.com/emailingdestination/$id/clicks](./rest-get-emailingdestination-clicks.md)              | Opvragen kliks per geadresseerde              |
| GET       | [api.copernica.com/emailingdestination/$id/deliveries](./rest-get-emailingdestination-deliveries.md)      | Opvragen afleveringen per geadresseerde       |
| GET       | [api.copernica.com/emailingdestination/$id/errors](./rest-get-emailingdestination-errors.md)              | Opvragen foutmeldingen per geadresseerde      |
| GET       | [api.copernica.com/emailingdestination/$id/fields](./rest-get-emailingdestination-fields.md)              | Opvragen velden van een geadresseerde         |
| GET       | [api.copernica.com/emailingdestination/$id/impressions](./rest-get-emailingdestination-impressions.md)    | Opvragen impressies per geadresseerde         |
| GET       | [api.copernica.com/emailingdestination/$id/unsubscribes](./rest-get-emailingdestination-unsubscribes.md)  | Opvragen afmeldingen per geadresseerde        |
| GET       | [api.copernica.com/abuses](./rest-get-abuses.md)                                                          | Opvragen alle abusemeldingen voor het account |
| GET       | [api.copernica.com/clicks](./rest-get-clicks.md)                                                          | Opvragen alle kliks voor het account          |
| GET       | [api.copernica.com/deliveries](./rest-get-deliveries.md)                                                  | Opvragen alle afleveringen voor het account   |
| GET       | [api.copernica.com/errors](./rest-get-errors.md)                                                          | Opvragen alle foutmeldingen voor het account  |
| GET       | [api.copernica.com/impressions](./rest-get-impressions.md)                                                | Opvragen alle impressies voor het account     |
| GET       | [api.copernica.com/unsubscribes](./rest-get-unsubscribes.md)                                              | Opvragen alle afmeldingen voor het account    |
| GET       | [api.copernica.com/logfiles](./rest-get-logfiles.md)                                                      | Opvragen van alle logfiles                    |
| GET       | [api.copernica.com/logfiles/$name](./rest-get-logfiles-csv.md)                                            | Downloaden van logfile in CSV formaat         |
| GET       | [api.copernica.com/logfiles/$name/json](./rest-get-logfiles-json.md)                                      | Downloaden van logfile in JSON formaat        |
| GET       | [api.copernica.com/logfiles/$name/xml](./rest-get-logfiles-xml.md)                                        | Downloaden van logfile in XML formaat         |
