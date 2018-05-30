# De REST API

Met de REST API kun je automatische koppelingen met Copernica maken. 
Je kunt bijvoorbeeld je website of app zo programmeren dat, met behulp 
van de REST API, gegevens in je Copernica-account worden ophaald, gecreëerd, geüpdatet of verwijderd.
Dit gaat automatisch, dus buiten de *user interface* om.

* [De REST API in een notendop](rest-introduction)
* [HTTP requests sturen en antwoorden ontvangen](rest-requests)
* [OAuth2 koppelingen](rest-oauth)
* [REST events](rest-get-events.md)


## REST API: overzicht van methodes

De volgende methodes zijn toegankelijk via HTTP GET, POST, PUT en DELETE.

## GET

GET methodes worden gebruikt om data op te vragen. De volgende GET methodes 
zijn beschikbaar:

| Methode   | Adres                                                                                                         | Omschrijving                                      |
|-----------|---------------------------------------------------------------------------------------------------------------|---------------------------------------------------|
| GET       | [api.copernica.com/v1/identity](./rest-get-identity.md)                                                       | Opvragen identiteit van API koppeling             |
| GET       | [api.copernica.com/v1/databases](./rest-get-databases.md)                                                     | Opvragen databases                                |
| GET       | [api.copernica.com/v1/database/$id](./rest-get-database.md)                                                   | Opvragen databasegegevens                         |
| GET       | [api.copernica.com/v1/database/$id/unsubscribe](./rest-get-database-unsubscribe.md)                           | Opvragen afmeldalgoritme                          |
| GET       | [api.copernica.com/v1/database/$id/fields](./rest-get-database-fields.md)                                     | Opvragen databasevelden                           |
| GET       | [api.copernica.com/v1/database/$id/interests](./rest-get-database-interests.md)                               | Opvragen interesses                               |
| GET       | [api.copernica.com/v1/database/$id/collections](./rest-get-database-collections.md)                           | Opvragen collecties                               |
| GET       | [api.copernica.com/v1/database/$id/profiles](./rest-get-database-profiles.md)                                 | Opvragen profielen                                |
| GET       | [api.copernica.com/v1/database/$id/profileids](./rest-get-database-profileids.md)                             | Opvragen profiel identifiers                      |
| GET       | [api.copernica.com/v1/database/$id/views](./rest-get-database-views.md)                                       | Opvragen selecties                                |
| GET       | [api.copernica.com/v1/view/$id](./rest-get-view.md)                                                           | Opvragen selectiegegevens                         |
| GET       | [api.copernica.com/v1/view/$id/profiles](./rest-get-view-profiles.md)                                         | Opvragen profielen in een selectie                |
| GET       | [api.copernica.com/v1/view/$id/profileids](./rest-get-view-profileids.md)                                     | Opvragen profiel identifiers                      |
| GET       | [api.copernica.com/v1/view/$id/rules](./rest-get-view-rules.md)                                               | Opvragen selectieregels                           |
| GET       | [api.copernica.com/v1/view/$id/rule/$id](./rest-get-view-rule.md)                                             | Opvragen selectieregel                            |
| GET       | [api.copernica.com/v1/view/$id/views](./rest-get-view-views.md)                                               | Opvragen geneste selecties                        |
| GET       | [api.copernica.com/v1/rule/$id](./rest-get-rule.md)                                                           | Opvragen instellingen van selectieregel           |
| GET       | [api.copernica.com/v1/rule/$id/conditions](./rest-get-rule-conditions.md)                                     | Opvragen van selectieregels                       |
| GET       | [api.copernica.com/v1/profile/$id](./rest-get-profile.md)                                                     | Opvragen profielgegevens                          |
| GET       | [api.copernica.com/v1/profile/$id/fields](./rest-get-profile-fields.md)                                       | Opvragen profielvelden                            |
| GET       | [api.copernica.com/v1/profile/$id/interests](./rest-get-profile-interests.md)                                 | Opvragen interesses van profiel                   |
| GET       | [api.copernica.com/v1/profile/$id/subprofiles](./rest-get-profile-subprofiles.md)                             | Opvragen subprofielen van een profiel             |
| GET       | [api.copernica.com/v1/collection/$id](./rest-get-collection.md)                                               | Opvragen collectiegegevens                        |
| GET       | [api.copernica.com/v1/collection/$id/fields](./rest-get-collection-fields.md)                                 | Opvragen velden in een collectie                  |
| GET       | [api.copernica.com/v1/collection/$id/miniviews](./rest-get-collection-miniviews.md)                           | Opvragen miniselecties onder een collectie        |
| GET       | [api.copernica.com/v1/collection/$id/subprofiles](./rest-get-collection-subprofiles.md)                       | Opvragen subprofiles in een collectie             |
| GET       | [api.copernica.com/v1/collection/$id/subprofileids](./rest-get-collection-subprofileids.md)                   | Opvragen subprofileids in een collectie           |
| GET       | [api.copernica.com/v1/collection/$id/unsubscribe](./rest-get-collection-unsubscribe.md)                       | Opvragen afmeldgedrag van een collectie           |
| GET       | [api.copernica.com/v1/miniview/$id](./rest-get-miniview.md)                                                   | Opvragen miniselectiegegevens                     |
| GET       | [api.copernica.com/v1/miniview/$id/subprofiles](./rest-get-miniview-subprofiles.md)                           | Opvragen subprofielen in een miniselectie         |
| GET       | [api.copernica.com/v1/miniview/$id/subprofileids](./rest-get-miniview-subprofileids.md)                       | Opvragen subprofiel identifiers                   |
| GET       | [api.copernica.com/v1/miniview/$id/rules](./rest-get-miniview-rules.md)                                       | Opvragen selectieregels                           |
| GET       | [api.copernica.com/v1/miniview/$id/rule/$id](./rest-get-miniview-rule.md)                                     | Opvragen miniselectieregel                        |
| GET       | [api.copernica.com/v1/minirule/$id](./rest-get-minirule.md)                                                   | Opvragen instellingen van miniselectieregel       |
| GET       | [api.copernica.com/v1/minirule/$id/conditions](./rest-get-minirule-conditions.md)                             | Opvragen van condities van een miniselectie       |
| GET       | [api.copernica.com/v1/subprofile/$id](./rest-get-subprofile.md)                                               | Opvragen subprofielgegevens                       |
| GET       | [api.copernica.com/v1/subprofile/$id/fields](./rest-get-subprofile-fields.md)                                 | Opvragen subprofielvelden                         |
| GET       | [api.copernica.com/v1/logfiles](./rest-get-logfiles.md)                                                       | Opvragen van alle logfiles                        |
| GET       | [api.copernica.com/v1/logfiles/$date](./rest-get-logfiles-names)                                              | Opvragen van namen van logfiles                   |
| GET       | [api.copernica.com/v1/logfiles/$name](./rest-get-logfiles-csv.md)                                             | Downloaden van logfile in CSV formaat             |
| GET       | [api.copernica.com/v1/logfiles/$name/json](./rest-get-logfiles-json.md)                                       | Downloaden van logfile in JSON formaat            |
| GET       | [api.copernica.com/v1/logfiles/$name/xml](./rest-get-logfiles-xml.md)                                         | Downloaden van logfile in XML formaat             |
| GET       | [api.copernica.com/v1/email/$addres/events](./rest-get-email-events)                                          | Opvragen e-mail events                            |
| GET       | [api.copernica.com/v1/message/$id/events](./rest-get-message-events)                                          | Opvragen MS bericht events                        |
| GET       | [api.copernica.com/v1/old/message/$id/events](./rest-get-old-message-events)                                  | Opvragen Publisher bericht events                 |
| GET       | [api.copernica.com/v1/old/document/$id/events](./rest-get-old-document-events)                                | Opvragen Publisher document events                |
| GET       | [api.copernica.com/v1/profile/$id/events](./rest-get-profile-events)                                          | Opvragen profiel events                           |
| GET       | [api.copernica.com/v1/subprofile/$id/events](./rest-get-subprofile-events)                                    | Opvragen subprofiel events                        |
| GET       | [api.copernica.com/v1/tags/$tag/events](./rest-get-tags-events)                                               | Opvragen tag events                               |
| GET       | [api.copernica.com/v1/template/$id/events](./rest-get-template-events)                                        | Opvragen MS template events                       |
| GET       | [api.copernica.com/v1/old/template/$id/events](./rest-get-old-template-events)                                | Opvragen Publisher template events                |
| GET       | [api.copernica.com/v1/datarequest/$id/data](./rest-get-datarequest-data)                                      | Opvragen data van een datarequest                 |
| GET       | [api.copernica.com/v1/datarequest/$id/status](./rest-get-datarequest-status)                                  | Opvragen status van een datarequest               |

Zie ook het [algemene artikel over events](./rest-get-events).

## PUT & POST

PUT en POST methodes worden gebruikt om data aan te maken en aan te passen. 
Dit zijn vaak zeer vergelijkbare methodes en als je geen POST methode 
kunt vinden voor wat je zoekt staat deze misschien onder PUT, of andersom. 
De volgende PUT en POST methodes zijn beschikbaar:

| Methode  | Adres                                                                                    | Omschrijving                                    |
|----------|------------------------------------------------------------------------------------------|-------------------------------------------------|
| POST     | [api.copernica.com/v1/databases](./rest-post-databases.md)                               | Aanmaken nieuwe database                        |
| PUT      | [api.copernica.com/v1/database/$id](./rest-put-database.md)                              | Bijwerken databasegegevens                      |
| PUT      | [api.copernica.com/v1/database/$id/unsubscribe](./rest-put-database-unsubscribe.md)      | Instellen afmeldalgoritme                       |
| POST     | [api.copernica.com/v1/database/$id/fields](./rest-post-database-fields.md)               | Aanmaken databaseveld                           |
| PUT      | [api.copernica.com/v1/database/$id/field/$id](./rest-put-database-field.md)              | Veld uit database bijwerken                     |
| POST     | [api.copernica.com/v1/database/$id/interests](./rest-post-database-interests.md)         | Aanmaken interesse                              |
| POST     | [api.copernica.com/v1/database/$id/collections](./rest-post-database-collections.md)     | Aanmaken collectie                              |
| POST     | [api.copernica.com/v1/database/$id/profiles](./rest-post-database-profiles.md)           | Aanmaken nieuw profiel                          |
| PUT      | [api.copernica.com/v1/database/$id/profiles](./rest-put-database-profiles.md)            | Meerdere profielen tegelijk bewerken            |
| POST     | [api.copernica.com/v1/database/$id/views](./rest-post-database-views.md)                 | Aanmaken nieuwe selectie                        |
| PUT      | [api.copernica.com/v1/view/$id](./rest-put-view.md)                                      | Bewerken selectiegegevens                       |
| POST     | [api.copernica.com/v1/view/$id/rules](./rest-post-view-rules.md)                         | Aanmaken nieuwe selectieregel                   |
| POST     | [api.copernica.com/v1/view/$id/views](./rest-post-view-views.md)                         | Aanmaken geneste selectie                       |
| PUT      | [api.copernica.com/v1/rule/$id](./rest-put-rule.md)                                      | Bijwerken instellingen van selectieregel        |
| POST     | [api.copernica.com/v1/rule/$id/conditions](./rest-post-rule-conditions.md)               | Aanmaken nieuwe conditie bij selectieregel      |
| PUT      | [api.copernica.com/v1/profile/$id](./rest-put-profile.md)                                | Bijwerken profielgegevens                       |
| PUT      | [api.copernica.com/v1/profile/$id/fields](./rest-put-profile-fields.md)                  | Bijwerken profielvelden                         |
| POST     | [api.copernica.com/v1/profile/$id/interests](./rest-post-profile-interests.md)           | Toevoegen interesses van profiel                |
| PUT      | [api.copernica.com/v1/profile/$id/interests](./rest-put-profile-interests.md)            | Overschrijven interesses van profiel            |
| POST     | [api.copernica.com/v1/profile/$id/subprofiles](./rest-post-profile-subprofiles.md)       | Toevoegen van een subprofielen aan een profiel  |
| POST     | [api.copernica.com/v1/profile/$id/datarequest](./rest-post-profile-datarequest)          | Alle data van een profiel opvragen              |
| PUT      | [api.copernica.com/v1/collection/$id](./rest-put-collection.md)                          | Bijwerken collectiegegevens                     | 
| POST     | [api.copernica.com/v1/collection/$id/fields](./rest-post-collection-fields.md)           | Aanmaken veld in een collectie                  |
| PUT      | [api.copernica/com/v1/collection/$id/field/$id](./rest-put-collection-field.md)          | Bijwerken veld in collectie                     |
| POST     | [api.copernica.com/v1/collection/$id/miniviews](./rest-post-collection-miniviews.md)     | Aanmaken van een miniselectie                   |
| PUT      | [api.copernica.com/v1/collection/$id/unsubscribe](./rest-put-collection-unsubscribe.md)  | Bijwerken afmeldgedrag van een collectie        |
| PUT      | [api.copernica.com/v1/miniview/$id](./rest-put-miniview.md)                              | Bewerken miniselectiegegevens                   |
| POST     | [api.copernica.com/v1/miniview/$id/rules](./rest-post-miniview-rules.md)                 | Aanmaken nieuwe miniselectieregel               |
| PUT      | [api.copernica.com/v1/minirule/$id](./rest-put-minirule.md)                              | Bijwerken instellingen van miniselectieregel    |
| POST     | [api.copernica.com/v1/minirule/$id/conditions](./rest-post-minirule-conditions.md)       | Aanmaken nieuwe conditie bij miniselectieregel  |
| POST     | [api.copernica.com/v1/subprofile/$id/datarequest](./rest-post-subprofile-datarequest.md) | Alle data van een subprofiel opvragen           |
| POST     | [api.copernica.com/v1/email/$email/datarequest](./rest-post-email-datarequest.md)        | Alle data van een e-mailadres opvragen          |  

## DELETE

DELETE methodes worden gebruikt om data te verwijderen. Dit is permanent, 
dus wees voorzichtig met welke calls je uitvoert. De volgende DELETE methodes 
zijn beschikbaar:

| Methode   | Adres                                                                                                         | Omschrijving                                      |
|-----------|---------------------------------------------------------------------------------------------------------------|---------------------------------------------------|
| DELETE    | [api.copernica.com/v1/view/$id](./rest-delete-view.md)                                                        | Verwijderen selectie                              |
| DELETE    | [api.copernica.com/v1/rule/$id](./rest-delete-rule.md)                                                        | Verwijderen van een selectieregel                 |
| DELETE    | [api.copernica.com/v1/profile/$id](./rest-delete-profile.md)                                                  | Verwijderen profiel                               |
| DELETE    | [api.copernica.com/v1/subprofile/$id](./rest-delete-subprofile.md)                                            | Verwijderen subprofiel                            |
| DELETE    | [api.copernica.com/v1/collection/$id/field/$id](./rest-delete-collection-field.md)                            | Verwijderen veld in collectie                     |
| DELETE    | [api.copernica.com/v1/miniview/$id](./rest-delete-miniview.md)                                                | Verwijderen miniselectie                          |
| DELETE    | [api.copernica.com/v1/minirule/$id](./rest-delete-minirule.md)                                                | Verwijderen van een miniselectieregel             |
