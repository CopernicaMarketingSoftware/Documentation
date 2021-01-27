# De REST API

Met de REST API kun je automatische koppelingen met Copernica maken.
Je kunt bijvoorbeeld je website of app zo programmeren dat, met behulp
van de REST API, gegevens in je Copernica-account worden ophaald, gecreëerd,
geüpdatet of verwijderd. Dit gaat automatisch, dus buiten de *user interface* om.
Deze pagina bevat een overzicht van alle API calls.

* [Introductie en registratie](rest-introduction)
* [HTTP requests versturen en ontvangen](rest-requests)
* [Externe OAuth2 koppelingen](rest-oauth)
* [Paging](./rest-paging)

De meest recente versie van de API is versie 2. [Dit artikel](./rest-introduction#REST-versie)
gaat hier dieper op in en legt uit hoe je overschakelt. Nog niet klaar om
over te stappen? Je kunt de documentatie voor versie 1 [hier](../restv1/rest-api.md)
vinden.

## Types voor methodes

Er zijn vier verschillende soorten methodes in de REST API:

* **GET**: Wordt gebruikt om data op te vragen
* **POST**: Wordt gebruikt om nieuwe data aan te maken
* **PUT**: Wordt gebruikt om data te overschrijven
* **DELETE**: Wordt gebruikt om data te verwijderen

Meer informatie over HTTP request kun je vinden in de [introductie](./rest-introduction).

## Inhoud

Gebruik de onderstaande links om naar de gewenste API calls te
navigeren:

* [Account](./rest-api#account)
* [Databases & Collecties](./rest-api#databases-&-collecties)
* [Selecties & Miniselecties](./rest-api#selecties-&-miniselecties)
* [Regels & Miniregels](./rest-api#regels-&-miniregels)
* [Profielen & Subprofielen](./rest-api#profielen-&-subprofielen)
* [Publisher Mailings](./rest-api#publisher-mailings)
* [Marketing Suite Mailings](./rest-api#marketing-suite-mailings)
* [Dataverzoeken](./rest-api#dataverzoeken)
* [Logfiles](./rest-api#logfiles)

## Account

In de onderstaande tabel vind je een methode om account informatie op te vragen.

| Type   | Adres                                                                                        | Omschrijving                                 |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| GET    | [api.copernica.com/v2/identity](./rest-get-identity)                                         | Opvragen van account informatie              |
| GET    | [api.copernica.com/v2/consumption](./rest-get-consumption)                                   | Opvragen van account verbruik                |

## Databases & Collecties

Je kunt je databases en collecties bekijken en onderhouden met API calls.
In de onderstaande tabel vind je alle calls gerelateerd aan databases,
collecties en hun eigenschappen.

### Databases

| Type   | Adres                                                                                        | Omschrijving                                   |
|--------|----------------------------------------------------------------------------------------------|------------------------------------------------|
| GET    | [api.copernica.com/v2/databases](./rest-get-databases)                                       | Opvragen van alle databases                    |
| POST   | [api.copernica.com/v2/databases](./rest-post-databases)                                      | Aanmaken van een nieuwe database               |
| POST   | [api.copernica.com/v2/database/$id/copy](./rest-post-database-copy)                          | Kopiëren van een database                      |
| GET    | [api.copernica.com/v2/database/$id](./rest-get-database)                                     | Opvragen van database informatie               |
| PUT    | [api.copernica.com/v2/database/$id](./rest-put-database)                                     | Updaten van database informatie                |
| GET    | [api.copernica.com/v2/database/$id/unsubscribe](./rest-get-database-unsubscribe)             | Opvragen van uitschrijfgedrag                  |
| PUT    | [api.copernica.com/v2/database/$id/unsubscribe](./rest-put-database-unsubscribe)             | Updaten van uitschrijfgedrag                   |
| GET    | [api.copernica.com/v2/database/$id/views](./rest-get-database-views)                         | Opvragen van alle selecties                    |
| POST   | [api.copernica.com/v2/database/$id/views](./rest-post-database-views)                        | Aanmaken van een selectie                      |
| GET    | [api.copernica.com/v2/database/$id/collections](./rest-get-database-collections)             | Opvragen van alle collecties                   |
| POST   | [api.copernica.com/v2/database/$id/collections](./rest-post-database-collections)            | Aanmaken van een collectie                     |
| GET    | [api.copernica.com/v2/database/$id/fields](./rest-get-database-fields)                       | Opvragen van alle velden                       |
| POST   | [api.copernica.com/v2/database/$id/fields](./rest-post-database-fields)                      | Aanmaken van een veld                          |
| PUT    | [api.copernica.com/v2/database/$id/field/$id](./rest-put-database-field)                     | Updaten van een veld                           |
| DELETE | [api.copernica.com/v2/database/$id/field/$id](./rest-delete-database-field)                  | Verwijderen van een veld                       |
| GET    | [api.copernica.com/v2/database/$id/interests](./rest-get-database-interests)                 | Opvragen van alle interesses                   |
| POST   | [api.copernica.com/v2/database/$id/interests](./rest-post-database-interests)                | Aanmaken van een interesse                     |
| PUT    | [api.copernica.com/v2/interest](./rest-put-interest)                                         | Updaten van een interesse                      |
| DELETE | [api.copernica.com/v2/interest](./rest-delete-interest)                                      | Verwijderen van een interesse                  |
| GET    | [api.copernica.com/v2/database/$id/profileids](./rest-get-database-profileids)               | Opvragen van alle profiel IDs                  |
| GET    | [api.copernica.com/v2/database/$id/profiles](./rest-get-database-profiles)                   | Opvragen van alle profielen                    |
| POST   | [api.copernica.com/v2/database/$id/profiles](./rest-post-database-profiles)                  | Aanmaken van een profiel                       |
| PUT    | [api.copernica.com/v2/database/$id/profiles](./rest-put-database-profiles)                   | Updaten van een of meerdere profielen          |
| DE:ETE | [api.copernica.com/v2/database/$id/profiles](./rest-delete-database-profiles)                | Verwijderen van een of meerdere profielen      |
| PUT    | [api.copernica.com/v2/database/$id/intentions](./rest-put-database-intentions)               | Updaten van de intenties van de database       |

### Collecties

| Type   | Adres                                                                                        | Omschrijving                                   |
|--------|----------------------------------------------------------------------------------------------|------------------------------------------------|
| GET    | [api.copernica.com/v2/database/$id/collections](./rest-get-database-collections)             | Opvragen van alle collecties voor een database |
| POST   | [api.copernica.com/v2/database/$id/collections](./rest-post-database-collections)            | Aanmaken van een collectie                     |
| GET    | [api.copernica.com/v2/collection/$id](./rest-get-collection)                                 | Opvragen van collectie informatie              |
| PUT    | [api.copernica.com/v2/collection/$id](./rest-put-collection)                                 | Updaten van collectie informatie               |
| GET    | [api.copernica.com/v2/collection/$id/unsubscribe](./rest-get-collection-unsubscribe)         | Opvragen van uitschrijfgedrag                  |
| PUT    | [api.copernica.com/v2/collection/$id/unsubscribe](./rest-put-collection-unsubscribe)         | Updaten van uitschrijfgedrag                   |
| GET    | [api.copernica.com/v2/collection/$id/miniviews](./rest-get-collection-miniviews)             | Opvragen van alle miniselecties                |
| POST   | [api.copernica.com/v2/collection/$id/miniviews](./rest-post-collection-miniviews)            | Aanmaken van een miniselectie                  |
| GET    | [api.copernica.com/v2/collection/$id/fields](./rest-get-collection-fields)                   | Opvragen van alle velden                       |
| POST   | [api.copernica.com/v2/collection/$id/fields](./rest-post-collection-fields)                  | Aanmaken van een veld                          |
| PUT    | [api.copernica.com/v2/collection/$id/field/$id](./rest-put-collection-field)                 | Updaten van een veld                           |
| DELETE | [api.copernica.com/v2/collection/$id/field/$id](./rest-delete-collection-field)              | Verwijderen van een veld                       |
| GET    | [api.copernica.com/v2/collection/$id/subprofileids](./rest-get-collection-subprofileids)     | Opvragen van alle subprofiel IDs               |
| GET    | [api.copernica.com/v2/collection/$id/subprofiles](./rest-get-collection-subprofiles)         | Opvragen van alle subprofielen                 |
| PUT    | [api.copernica.com/v2/collection/$id/intentions](./rest-put-collection-intentions)           | Updaten van de intenties van de collectie      |

## Selecties & Miniselecties

Selecties vallen onder de database, terwijl miniselecties onder een collectie vallen.
Je kunt de methodes gerelateerd aan specifieke (mini)selecties hieronder vinden.

### Selecties

| Type   | Adres                                                                                        | Omschrijving                                 |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| POST   | [api.copernica.com/v2/database/$id/views](./rest-post-database-views)                        | Aanmaken van een selectie                    |
| POST   | [api.copernica.com/v2/view/$id/copy](./rest-post-view-copy)                                  | Kopiëren van een selectie                    |
| GET    | [api.copernica.com/v2/view/$id](./rest-get-view)                                             | Opvragen van selectie informatie             |
| PUT    | [api.copernica.com/v2/view/$id](./rest-put-view)                                             | Updaten van selectie informatie              |
| DELETE | [api.copernica.com/v2/view/$id](./rest-delete-view)                                          | Verwijderen van een selectie                 |
| GET    | [api.copernica.com/v2/view/$id/views](./rest-get-view-views)                                 | Opvragen van alle genestelde selecties       |
| POST   | [api.copernica.com/v2/view/$id/views](./rest-post-view-views)                                | Aanmaken van een genestelde selectie         |
| GET    | [api.copernica.com/v2/view/$id/profileids](./rest-get-view-profileids)                       | Opvragen van alle selectie profiel IDs       |
| GET    | [api.copernica.com/v2/view/$id/profiles](./rest-get-view-profiles)                           | Opvragen van alle selectie profielen         |
| GET    | [api.copernica.com/v2/view/$id/rules](./rest-get-view-rules)                                 | Opvragen van alle selectie regels            |
| GET    | [api.copernica.com/v2/view/$id/rule/$id](./rest-get-view-rule)                               | Opvragen van een selectie regel              |
| POST   | [api.copernica.com/v2/view/$id/rules](./rest-post-view-rules)                                | Aanmaken van een selectie regel              |
| PUT    | [api.copernica.com/v2/view/$id/intentions](./rest-put-view-intentions)                       | Updaten van de intenties van de selectie     |

### Miniselecties

| Type   | Adres                                                                                        | Omschrijving                                   |
|--------|----------------------------------------------------------------------------------------------|------------------------------------------------|
| POST   | [api.copernica.com/v2/collection/$id/miniviews](./rest-post-collection-miniviews)            | Aanmaken van een miniselectie                  |
| GET    | [api.copernica.com/v2/miniview/$id](./rest-get-miniview)                                     | Opvragen van miniselectie informatie           |
| PUT    | [api.copernica.com/v2/miniview/$id](./rest-put-miniview)                                     | Updaten van miniselectie informatie            |
| DELETE | [api.copernica.com/v2/miniview/$id](./rest-delete-miniview)                                  | Verwijderen van een miniselectie               |
| GET    | [api.copernica.com/v2/miniview/$id/subprofileids](./rest-get-miniview-subprofileids)         | Opvragen van alle miniselectie subprofiel IDs  |
| GET    | [api.copernica.com/v2/miniview/$id/subprofiles](./rest-get-miniview-subprofiles)             | Opvragen van alle miniselectie subprofielen    |
| GET    | [api.copernica.com/v2/miniview/$id/views](./rest-get-miniview-views)                         | Opvragen van selecties voor een miniselectie   |
| GET    | [api.copernica.com/v2/miniview/$id/minirules](./rest-get-miniview-rules)                     | Opvragen van alle miniselectie miniregels      |
| GET    | [api.copernica.com/v2/miniview/$id/minirule/$id](./rest-get-miniview-rule)                   | Opvragen van een miniselectie miniregel        |
| POST   | [api.copernica.com/v2/miniview/$id/minirules](./rest-post-miniview-rules)                    | Aanmaken van een nieuwe miniselectie miniregel |
| PUT    | [api.copernica.com/v2/miniview/$id/intentions](./rest-put-miniview-intentions)               | Updaten van de intenties van de miniselectie   |

## Regels & Miniregels

Regels en miniregels bestaan uit een of meerdere condities om selecties en
miniselecties aan te maken onder een database of collectie respectievelijk.
Je kunt alle API calls gerelateerd aan (mini)regels en de bijhorende
condities in de tabel hieronder vinden.

### Regels

| Type   | Adres                                                                                        | Omschrijving                                   |
|--------|----------------------------------------------------------------------------------------------|------------------------------------------------|
| POST   | [api.copernica.com/v2/view/$id/rules](./rest-post-view-rules)                                | Aanmaken van een regel                         |
| GET    | [api.copernica.com/v2/rule/$id](./rest-get-rule)                                             | Opvragen van regel informatie                  |
| PUT    | [api.copernica.com/v2/rule/$id](./rest-put-rule)                                             | Updaten van regel informatie                   |
| DELETE | [api.copernica.com/v2/rule/$id](./rest-delete-rule)                                          | Verwijderen van een regel                      |
| POST   | [api.copernica.com/v2/rule/$id/conditions](./rest-post-rule-conditions)                      | Aanmaken van een regel conditie                |
| PUT    | [api.copernica.com/v2/condition/$type/$id](./rest-put-condition)                             | Updaten van een conditie                       |
| DELETE | [api.copernica.com/v2/condition/$type/$id](./rest-delete-condition)                          | Verwijderen van een conditie                   |

### Miniregels (voor miniselecties)

| Type   | Adres                                                                                        | Omschrijving                                   |
|--------|----------------------------------------------------------------------------------------------|------------------------------------------------|
| POST   | [api.copernica.com/v2/miniview/$id/minirules](./rest-post-miniview-rules)                    | Aanmaken van een nieuwe miniregel              |
| GET    | [api.copernica.com/v2/minirule/$id](./rest-get-minirule)                                     | Opvragen van miniregel informatie              |
| PUT    | [api.copernica.com/v2/minirule/$id](./rest-put-minirule)                                     | Updaten van miniregel informatie               |
| DELETE | [api.copernica.com/v2/minirule/$id](./rest-delete-minirule)                                  | Verwijderen van een miniregel                  |
| POST   | [api.copernica.com/v2/minirule/$id/conditions](./rest-post-minirule-conditions)              | Aanmaken van een miniregel conditie            |
| DELETE | [api.copernica.com/v2/minicondition/$type/$id](./rest-delete-minicondition)                  | Verwijderen van een miniregel conditie         |

## Profielen & Subprofielen

Profielen en subprofielen kunnen gebruikt worden om entiteiten in je database
op te slaan, zoals je klanten of orders. Je vindt de relevante API calls
in de onderstaande tabel.

### Profielen

| Type   | Adres                                                                                                | Omschrijving                                                      |
|--------|------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------|
| POST   | [api.copernica.com/v2///profiles](./rest-post-database-profiles)                          | Aanmaken van een database profiel                                 |
| GET    | [api.copernica.com/v2/profile/$id](./rest-get-profile)                                               | Opvragen van profiel informatie                                   |
| PUT    | [api.copernica.com/v2/profile/$id](./rest-put-profile)                                               | Updaten van profiel informatie                                    |
| DELETE | [api.copernica.com/v2/profile/$id](./rest-delete-profile)                                            | Verwijderen van een profiel                                       |
| GET    | [api.copernica.com/v2/profile/$id/subprofiles/$id](./rest-get-profile-subprofiles)                   | Opvragen van alle subprofielen voor een profiel                   |
| POST   | [api.copernica.com/v2/profile/$id/subprofiles/$id](./rest-post-profile-subprofiles)                  | Aanmaken van een nieuw subprofiel                                 |
| PUT    | [api.copernica.com/v2/profile/$id/subprofiles/$id](./rest-put-profile-subprofiles)                   | Updaten van een of meerdere subprofielen                          |
| GET    | [api.copernica.com/v2/profile/$id/fields](./rest-get-profile-fields)                                 | Opvragen van alle profiel velden                                  |
| PUT    | [api.copernica.com/v2/profile/$id/fields](./rest-put-profile-fields)                                 | Updaten van een of meerdere profiel velden                        |
| GET    | [api.copernica.com/v2/profile/$id/interests](./rest-get-profile-interests)                           | Opvragen van alle profiel interesses                              |
| POST   | [api.copernica.com/v2/profile/$id/interests](./rest-post-profile-interests)                          | Aanmaken van profiel interesse(s)                                 |
| PUT    | [api.copernica.com/v2/profile/$id/interests](./rest-put-profile-interests)                           | Updaten van profiel interesse(s)                                  |
| GET    | [api.copernica.com/v2/profile/$id/publisher/emailings](./rest-get-profile-publisher-emailings)       | Opvragen van alle Publisher mailings voor een profiel             |
| GET    | [api.copernica.com/v2/profile/$id/ms/emailings](./rest-get-profile-ms-emailings)                     | Opvragen van alle Marketing Suite mailings voor een profiel       |
| GET    | [api.copernica.com/v2/profile/$id/publisher/destinations](./rest-get-profile-publisher-destinations) | Opvragen van alle Publisher destinations voor een profiel         |
| GET    | [api.copernica.com/v2/profile/$id/ms/destinations](./rest-get-profile-ms-destinations)               | Opvragen van alle Marketing Suite destinations voor een profiel   |
| GET    | [api.copernica.com/v2/profile/$id/files](./rest-put-profile-files)                                   | Oppvragen van alle files voor een profiel                         |
| POST   | [api.copernica.com/v2/profile/$id/datarequest](./rest-post-profile-datarequest)                      | Aanmaken van een dataverzoek voor een profiel                     |

### Subprofielen

| Type   | Adres                                                                                                        | Omschrijving                                                          |
|--------|--------------------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------|
| POST   | [api.copernica.com/v2/profile/$id/subprofiles](./rest-post-profile-subprofiles)                              | Aanmaken van een subprofiel                                           |
| GET    | [api.copernica.com/v2/subprofile/$id](./rest-get-subprofile)                                                 | Opvragen van subprofiel informatie                                    |
| PUT    | [api.copernica.com/v2/subprofile/$id](./rest-put-subprofile)                                                 | Updaten van subprofiel informatie                                     |
| DELETE | [api.copernica.com/v2/subprofile/$id](./rest-delete-subprofile)                                              | Verwijderen van een subprofiel                                        |
| GET    | [api.copernica.com/v2/subprofile/$id/fields](./rest-get-subprofile-fields)                                   | Opvragen van alle subprofiel velden                                   |
| PUT    | [api.copernica.com/v2/subprofile/$id/fields](./rest-put-subprofile-fields)                                   | Updaten van subprofiel velden                                         |
| GET    | [api.copernica.com/v2/subprofile/$id/publisher/emailings](./rest-get-subprofile-publisher-emailings)         | Opvragen van alle Publisher mailings voor een subprofiel              |
| GET    | [api.copernica.com/v2/subprofile/$id/ms/emailings](./rest-get-subprofile-ms-emailings)                       | Opvragen van alle Marketing Suite mailings voor een subprofiel        |
| GET    | [api.copernica.com/v2/subprofile/$id/publisher/destinations](./rest-get-subprofile-publisher-destinations)   | Opvragen van alle Publisher destinations voor een subprofiel          |
| GET    | [api.copernica.com/v2/subprofile/$id/ms/destinations](./rest-get-subprofile-ms-destinations)                 | Opvragen van alle Marketing Suite destinations voor een subprofiel    |
| POST   | [api.copernica.com/v2/subprofile/$id/datarequest](./rest-post-subprofile-datarequest)                        | Aanmaken van een dataverzoek voor een subprofiel                      |

## Publisher Mailings

In de onderstaande tabel vind je alle API calls gerelateerd aan Publisher
documenten, templates en mailings.

### Mailings

| Type   | Adres                                                                                                    | Omschrijving                                              |
|--------|----------------------------------------------------------------------------------------------------------|-----------------------------------------------------------|
| GET    | [api.copernica.com/v2/publisher/emailings](./rest-get-publisher-emailings)                               | Opvragen van alle mailings                                |
| GET    | [api.copernica.com/v2/publisher/scheduledemailings](./rest-get-publisher-scheduledemailings)             | Opvragen van alle ingeroosterde mailings                  |
| GET    | [api.copernica.com/v2/publisher/emailing/$id](./rest-get-publisher-emailing)                             | Opvragen van een mailing                                  |
| GET    | [api.copernica.com/v2/publisher/scheduledemailing/$id](./rest-get-publisher-scheduledemailing)           | Opvragen van een ingeroosterde mailing                    |
| POST   | [api.copernica.com/v2/publisher/emailing](./rest-post-publisher-emailing)                                | Aanmaken van een mailing                                  |
| GET    | [api.copernica.com/v2/publisher/emailing/$id/destinations](./rest-get-publisher-emailing-destinations)   | Opvragen van destinations voor een mailing                |
| GET    | [api.copernica.com/v2/publisher/emailing/$id/snapshot](./rest-get-publisher-emailing-snapshot)           | Opvragen van een snapshot voor een mailing                |
| GET    | [api.copernica.com/v2/publisher/emailing/$id/statistics](./rest-get-publisher-emailing-statistics)       | Opvragen van de statistieken voor een mailing             |
| GET    | [api.copernica.com/v2/publisher/emailing/$id/abuses](./rest-get-publisher-emailing-abuses)               | Opvragen van abuses voor een mailing                      |
| GET    | [api.copernica.com/v2/publisher/emailing/$id/clicks](./rest-get-publisher-emailing-clicks)               | Opvragen van clicks voor een mailing                      |
| GET    | [api.copernica.com/v2/publisher/emailing/$id/deliveries](./rest-get-publisher-emailing-deliveries)       | Opvragen van deliveries voor een mailing                  |
| GET    | [api.copernica.com/v2/publisher/emailing/$id/errors](./rest-get-publisher-emailing-errors)               | Opvragen van errors voor een mailing                      |
| GET    | [api.copernica.com/v2/publisher/emailing/$id/impressions](./rest-get-publisher-emailing-impressions)     | Opvragen van impressies voor een mailing                  |
| GET    | [api.copernica.com/v2/publisher/emailing/$id/unsubscribes](./rest-get-publisher-emailing-unsubscribes)   | Opvragen van unsubscribes voor een mailing                |
| GET    | [api.copernica.com/v2/publisher/emailing/$id/testgroups](./rest-get-publisher-emailing-testgroups)       | Opvragen van de testgroepen voor een mailing        
| GET    | [api.copernica.com/v2/publisher/emailing/$id/finalgroup](./rest-get-publisher-emailing-finalgroup)       | Opvragen van de definitieve groep voor een mailing        
| GET    | [api.copernica.com/v2/publisher/testgroup/$id/statistics](./rest-get-publisher-testgroup-statistics)     | Opvragen van de statistieken van een testgroep     |
| GET    | [api.copernica.com/v2/publisher/message/$id](./rest-get-publisher-message)                               | Opvragen van bericht informatie                           |
| GET    | [api.copernica.com/v2/profile/$id/publisher/emailings](./rest-get-profile-publisher-emailings)           | Opvragen van alle Publisher mailings voor een profiel     |
| GET    | [api.copernica.com/v2/subprofile/$id/publisher/emailings](./rest-get-subprofile-publisher-emailings)     | Opvragen van alle Publisher mailings voor een subprofiel  |

### Documenten & Templates

| Type   | Adres                                                                                                            | Omschrijving                                       |
|--------|------------------------------------------------------------------------------------------------------------------|----------------------------------------------------|
| GET    | [api.copernica.com/v2/publisher/documents](./rest-get-publisher-documents)                                       | Opvragen van alle documenten                       |
| GET    | [api.copernica.com/v2/publisher/document/$id](./rest-get-publisher-document)                                     | Opvragen van document informatie                   |
| GET    | [api.copernica.com/v2/publisher/document/$id/emailings](./rest-get-publisher-document-emailings)                 | Opvragen van mailings voor een document            |
| GET    | [api.copernica.com/v2/publisher/document/$id/statistics](./rest-get-publisher-document-statistics)               | Opvragen van statistieken voor een document        |
| GET    | [api.copernica.com/v2/publisher/templates](./rest-get-publisher-templates)                                       | Opvragen van alle templates                        |
| GET    | [api.copernica.com/v2/publisher/template/$id](./rest-get-publisher-template)                                     | Opvragen van template informatie                   |
| GET    | [api.copernica.com/v2/publisher/template/$id/emailings](./rest-get-publisher-template-emailings)                 | Opvragen van mailings voor een template            |
| GET    | [api.copernica.com/v2/publisher/template/$id/emailingdocuments](./rest-get-publisher-template-documents)         | Opvragen van alle documenten voor een template     |

### Destinations (bestemmingen)

| Type   | Adres                                                                                                        | Omschrijving                                            |
|--------|--------------------------------------------------------------------------------------------------------------|---------------------------------------------------------|
| GET    | [api.copernica.com/v2/publisher/destination/$id/](./rest-get-publisher-destination)                          | Opvragen van een bestemming                             |
| GET    | [api.copernica.com/v2/publisher/destination/$id/fields](./rest-get-publisher-destination-fields)             | Opvragen van een bestemming inclusief profielvelden     |
| GET    | [api.copernica.com/v2/publisher/destination/$id/statistics](./rest-get-publisher-destination-statistics)     | Opvragen van statistieken voor een bestemming           |
| GET    | [api.copernica.com/v2/publisher/destination/$id/abuses](./rest-get-publisher-destination-abuses)             | Opvragen van abuses voor een bestemming                 |
| GET    | [api.copernica.com/v2/publisher/destination/$id/clicks](./rest-get-publisher-destination-clicks)             | Opvragen van clicks voor een bestemming                 |
| GET    | [api.copernica.com/v2/publisher/destination/$id/deliveries](./rest-get-publisher-destination-deliveries)     | Opvragen van deliveries voor een bestemming             |
| GET    | [api.copernica.com/v2/publisher/destination/$id/errors](./rest-get-publisher-destination-errors)             | Opvragen van errors voor een bestemming                 |
| GET    | [api.copernica.com/v2/publisher/destination/$id/impressions](./rest-get-publisher-destination-impressions)   | Opvragen van impressies voor een bestemming             |
| GET    | [api.copernica.com/v2/publisher/destination/$id/unsubscribes](./rest-get-publisher-destination-unsubscribes) | Opvragen van unsubscribes voor een bestemming           |
| GET    | [api.copernica.com/v2/publisher/destination/$id/content](./rest-get-publisher-destination-content) | Opvragen van de verstuurde inhoud voor een bestemming           |
| GET    | [api.copernica.com/v2/profile/$id/publisher/destinations](./rest-get-profile-publisher-destinations)         | Opvragen van Publisher destinations voor een profiel    |
| GET    | [api.copernica.com/v2/subprofile/$id/publisher/destinations](./rest-get-subprofile-publisher-destinations)   | Opvragen van Publisher destinations voor een subprofiel |

### Statistieken

| Type   | Adres                                                                                                        | Omschrijving                                      |
|--------|--------------------------------------------------------------------------------------------------------------|---------------------------------------------------|
| GET    | [api.copernica.com/v2/publisher/abuses](./rest-get-publisher-abuses)                                         | Opvragen van alle abuses voor Publisher           |
| GET    | [api.copernica.com/v2/publisher/clicks](./rest-get-publisher-clicks)                                         | Opvragen van alle clicks voor Publisher           |
| GET    | [api.copernica.com/v2/publisher/deliveries](./rest-get-publisher-deliveries)                                 | Opvragen van alle deliveries voor Publisher       |
| GET    | [api.copernica.com/v2/publisher/errors](./rest-get-publisher-errors)                                         | Opvragen van alle errors voor Publisher           |
| GET    | [api.copernica.com/v2/publisher/impressions](./rest-get-publisher-impressions)                               | Opvragen van alle impressions voor Publisher      |
| GET    | [api.copernica.com/v2/publisher/unsubscribes](./rest-get-publisher-unsubscribes)                             | Opvragen van alle unsubscribes voor Publisher     |
| GET    | [api.copernica.com/v2/publisher/emailing/$id/statistics](./rest-get-publisher-emailing-statistics)           | Opvragen van de statistieken voor een mailing     |
| GET    | [api.copernica.com/v2/publisher/emailing/$id/abuses](./rest-get-publisher-emailing-abuses)                   | Opvragen van abuses voor een mailing              |
| GET    | [api.copernica.com/v2/publisher/emailing/$id/clicks](./rest-get-publisher-emailing-clicks)                   | Opvragen van clicks voor een mailing              |
| GET    | [api.copernica.com/v2/publisher/emailing/$id/deliveries](./rest-get-publisher-emailing-deliveries)           | Opvragen van deliveries voor een mailing          |
| GET    | [api.copernica.com/v2/publisher/emailing/$id/errors](./rest-get-publisher-emailing-errors)                   | Opvragen van errors voor een mailing              |
| GET    | [api.copernica.com/v2/publisher/emailing/$id/impressions](./rest-get-publisher-emailing-impressions)         | Opvragen van impressies voor een mailing          |
| GET    | [api.copernica.com/v2/publisher/emailing/$id/unsubscribes](./rest-get-publisher-emailing-unsubscribes)       | Opvragen van unsubscribes voor een mailing        |
| GET    | [api.copernica.com/v2/publisher/destination/$id/statistics](./rest-get-publisher-destination-statistics)     | Opvragen van statistieken voor een bestemming     |
| GET    | [api.copernica.com/v2/publisher/destination/$id/abuses](./rest-get-publisher-destination-abuses)             | Opvragen van abuses voor een bestemming           |
| GET    | [api.copernica.com/v2/publisher/destination/$id/clicks](./rest-get-publisher-destination-clicks)             | Opvragen van clicks voor een bestemming           |
| GET    | [api.copernica.com/v2/publisher/destination/$id/deliveries](./rest-get-publisher-destination-deliveries)     | Opvragen van deliveries voor een bestemming       |
| GET    | [api.copernica.com/v2/publisher/destination/$id/errors](./rest-get-publisher-destination-errors)             | Opvragen van errors voor een bestemming           |
| GET    | [api.copernica.com/v2/publisher/destination/$id/impressions](./rest-get-publisher-destination-impressions)   | Opvragen van impressies voor een bestemming       |
| GET    | [api.copernica.com/v2/publisher/destination/$id/unsubscribes](./rest-get-publisher-destination-unsubscribes) | Opvragen van unsubscribes voor een bestemming     |

## Marketing Suite Mailings

In de onderstaande tabel vind je alle API calls gerelateerd aan Marketing Suite
templates en mailings.

### Mailings

| Type   | Adres                                                                                        | Omschrijving                                                      |
|--------|----------------------------------------------------------------------------------------------|-------------------------------------------------------------------|
| GET    | [api.copernica.com/v2/ms/emailings](./rest-get-ms-emailings)                                 | Opvragen van alle mailings                                        |
| GET    | [api.copernica.com/v2/ms/emailing/$id](./rest-get-ms-emailing)                               | Opvragen van een mailing                                          |
| POST   | [api.copernica.com/v2/ms/emailing](./rest-post-ms-emailing)                                  | Aanmaken van een mailing                                          |
| GET    | [api.copernica.com/v2/ms/scheduledemailings](./rest-get-ms-scheduledemailings)               | Opvragen van alle ingeroosterde mailings                          |
| GET    | [api.copernica.com/v2/ms/scheduledemailing/$id](./rest-get-ms-scheduledemailing)             | Opvragen van een ingeroosterde mailing                            |
| POST   | [api.copernica.com/v2/ms/scheduledemailing/](./rest-post-ms-scheduledemailing)               | Aanmaken van een ingeroosterde mailing                            |
| GET    | [api.copernica.com/v2/ms/emailing/$id/destinations](./rest-get-ms-emailing-destinations)     | Opvragen van destinations voor een mailing                        |
| GET    | [api.copernica.com/v2/ms/emailing/$id/statistics](./rest-get-ms-emailing-statistics)         | Opvragen van statistieken voor een mailing                        |
| GET    | [api.copernica.com/v2/ms/emailing/$id/abuses](./rest-get-ms-emailing-abuses)                 | Opvragen van alle abuses voor een emailing                        |
| GET    | [api.copernica.com/v2/ms/emailing/$id/clicks](./rest-get-ms-emailing-clicks)                 | Opvragen van alle clicks voor een emailing                        |
| GET    | [api.copernica.com/v2/ms/emailing/$id/deliveries](./rest-get-ms-emailing-deliveries)         | Opvragen van alle deliveries voor een emailing                    |
| GET    | [api.copernica.com/v2/ms/emailing/$id/errors](./rest-get-ms-emailing-errors)                 | Opvragen van alle errors voor een emailing                        |
| GET    | [api.copernica.com/v2/ms/emailing/$id/impressions](./rest-get-ms-emailing-impressions)       | Opvragen van alle impressions voor een emailing                   |
| GET    | [api.copernica.com/v2/profile/$id/ms/emailings](./rest-get-profile-ms-emailings)             | Opvragen van alle Marketing Suite mailings voor een profiel       |
| GET    | [api.copernica.com/v2/subprofile/$id/ms/emailings](./rest-get-subprofile-ms-emailings)       | Opvragen van alle Marketing Suite mailings voor een subprofiel    |

### Templates

| Type   | Adres                                                                                        | Omschrijving                                      |
|--------|----------------------------------------------------------------------------------------------|---------------------------------------------------|
| GET    | [api.copernica.com/v2/ms/templates](./rest-get-ms-templates)                                 | Opvragen van alle templates                       |
| GET    | [api.copernica.com/v2/ms/template/$id](./rest-get-ms-template)                               | Opvragen van een template                         |
| GET    | [api.copernica.com/v2/ms/template/$id/statistics](./rest-get-ms-template-statistics)         | Opvragen van statistieken voor een template       |

### Destinations (bestemmingen)

Binnen Copernica's Marketing Suite zijn de termen 'destination' (bestemming) 
en 'message' (bericht) uitwisselbaar. Beide verwijzen naar een specifiek bericht 
verzonden naar een specifieke bestemming. In onderstaande artikelen kun je 
in zowel de tekst 'destination' door 'message' vervangen, of andersom. 
Dit geldt ook voor de voorbeeldcode.

| Type   | Adres                                                                                        | Omschrijving                                                  |
|--------|----------------------------------------------------------------------------------------------|---------------------------------------------------------------|
| GET    | [api.copernica.com/v2/ms/destination/$id](./rest-get-ms-destination)                         | Opvragen van een bestemming                                   |
| GET    | [api.copernica.com/v2/ms/emailing/$id/destinations](./rest-get-ms-emailing-destinations)     | Opvragen van bestemmingen voor een mailing                    |
| GET    | [api.copernica.com/v2/ms/destination/$id/body](./rest-get-ms-destination-body)               | Opvragen van de message body verzonden naar een bestemming    |
| GET    | [api.copernica.com/v2/ms/destination/$id/statistics](./rest-get-ms-destination-statistics)   | Opvragen van statistieken voor een bestemming                 |
| GET    | [api.copernica.com/v2/ms/destination/$id/abuses](./rest-get-ms-destination-abuses)           | Opvragen van alle abuses voor een bestemming                  |
| GET    | [api.copernica.com/v2/ms/destination/$id/clicks](./rest-get-ms-destination-clicks)           | Opvragen van alle clicks voor een bestemming                  |
| GET    | [api.copernica.com/v2/ms/destination/$id/deliveries](./rest-get-ms-destination-deliveries)   | Opvragen van alle deliveries voor een bestemming              |
| GET    | [api.copernica.com/v2/ms/destination/$id/errors](./rest-get-ms-destination-errors)           | Opvragen van alle errors voor een bestemming                  |
| GET    | [api.copernica.com/v2/ms/destination/$id/impressions](./rest-get-ms-destination-impressions) | Opvragen van alle impressions voor een bestemming             |
| GET    | [api.copernica.com/v2/profile/$id/ms/destinations](./rest-get-profile-ms-destinations)       | Opvragen van Marketing Suite destinations voor een profiel    |
| GET    | [api.copernica.com/v2/subprofile/$id/ms/destinations](./rest-get-subprofile-ms-destinations) | Opvragen van Marketing Suite destinations voor een subprofiel |

### Statistieken

| Type   | Adres                                                                                        | Omschrijving                                      |
|--------|----------------------------------------------------------------------------------------------|---------------------------------------------------|
| GET    | [api.copernica.com/v2/ms/abuses](./rest-get-ms-abuses)                                       | Opvragen van alle abuses                          |
| GET    | [api.copernica.com/v2/ms/clicks](./rest-get-ms-clicks)                                       | Opvragen van alle clicks                          |
| GET    | [api.copernica.com/v2/ms/deliveries](./rest-get-ms-deliveries)                               | Opvragen van alle deliveries                      |
| GET    | [api.copernica.com/v2/ms/errors](./rest-get-ms-errors)                                       | Opvragen van alle errors                          |
| GET    | [api.copernica.com/v2/ms/impressions](./rest-get-ms-impressions)                             | Opvragen van alle impressions                     |
| GET    | [api.copernica.com/v2/ms/emailing/$id/statistics](./rest-get-ms-emailing-statistics)         | Opvragen van statistieken voor een mailing        |
| GET    | [api.copernica.com/v2/ms/emailing/$id/abuses](./rest-get-ms-emailing-abuses)                 | Opvragen van alle abuses voor een emailing        |
| GET    | [api.copernica.com/v2/ms/emailing/$id/clicks](./rest-get-ms-emailing-clicks)                 | Opvragen van alle clicks voor een emailing        |
| GET    | [api.copernica.com/v2/ms/emailing/$id/deliveries](./rest-get-ms-emailing-deliveries)         | Opvragen van alle deliveries voor een emailing    |
| GET    | [api.copernica.com/v2/ms/emailing/$id/errors](./rest-get-ms-emailing-errors)                 | Opvragen van alle errors voor een emailing        |
| GET    | [api.copernica.com/v2/ms/emailing/$id/impressions](./rest-get-ms-emailing-impressions)       | Opvragen van alle impressions voor een emailing   |
| GET    | [api.copernica.com/v2/ms/destination/$id/statistics](./rest-get-ms-destination-statistics)   | Opvragen van statistieken voor een bestemming     |
| GET    | [api.copernica.com/v2/ms/destination/$id/abuses](./rest-get-ms-destination-abuses)           | Opvragen van alle abuses voor een bestemming      |
| GET    | [api.copernica.com/v2/ms/destination/$id/clicks](./rest-get-ms-destination-clicks)           | Opvragen van alle clicks voor een bestemming      |
| GET    | [api.copernica.com/v2/ms/destination/$id/deliveries](./rest-get-ms-destination-deliveries)   | Opvragen van alle deliveries voor een bestemming  |
| GET    | [api.copernica.com/v2/ms/destination/$id/errors](./rest-get-ms-destination-errors)           | Opvragen van alle errors voor een bestemming      |
| GET    | [api.copernica.com/v2/ms/destination/$id/impressions](./rest-get-ms-destination-impressions) | Opvragen van alle impressions voor een bestemming |

## Dataverzoeken

Nadat alle data voor een dataverzoek is verzameld wordt de data voor een
korte periode op de Copernica servers opgeslagen. Met de onderstaande
calls kun je dataverzoeken aanmaken en de data en status van deze verzoeken opvragen.

| Type   | Adres                                                                                        | Omschrijving                                 |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| POST   | [api.copernica.com/v2/email/$email/datarequest](./rest-post-email-datarequest)               | Aanmaken dataverzoek voor een e-mailadres    |
| POST   | [api.copernica.com/v2/profile/$id/datarequest](./rest-post-profile-datarequest)              | Aanmaken dataverzoek voor een profiel        |
| POST   | [api.copernica.com/v2/subprofile/$id/datarequest](./rest-post-subprofile-datarequest)        | Aanmaken dataverzoek voor een subprofiel     |
| GET    | [api.copernica.com/v2/datarequest/$id/data](./rest-get-datarequest-data)                     | Opvragen data van een dataverzoek            |
| GET    | [api.copernica.com/v2/datarequest/$id/status](./rest-get-datarequest-status)                 | Opvragen status van een dataverzoek          |

## Logfiles

Copernica houdt uitgebreide data bij over alles gerelateerd aan een
mailing. Je kunt alle calls gerelateerd aan logfiles in de onderstaande tabel vinden.

| Type   | Adres                                                                                        | Omschrijving                                  |
|--------|----------------------------------------------------------------------------------------------|-----------------------------------------------|
| GET    | [api.copernica.com/v2/logfiles](./rest-get-logfiles)                                         | Opvragen logfile datums                       |
| GET    | [api.copernica.com/v2/logfiles](./rest-get-logfiles-names)                                   | Opvragen logfile namen                        |
| GET    | [api.copernica.com/v2/logfile/$filename/csv](./rest-get-logfiles-csv)                        | Opvragen logfiles in CSV                      |
| GET    | [api.copernica.com/v2/logfile/$filename/json](./rest-get-logfiles-json)                      | Opvragen logfiles in JSON                     |
| GET    | [api.copernica.com/v2/logfile/$filename/xml](./rest-get-logfiles-xml)                        | Opvragen logfiles in XML                      |
