# De REST API

Met de REST API kun je automatische koppelingen met Copernica maken. 
Je kunt bijvoorbeeld je website of app zo programmeren dat, met behulp 
van de REST API, gegevens in je Copernica-account worden ophaald, gecreëerd, geüpdatet of verwijderd.
Dit gaat automatisch, dus buiten de *user interface* om.

* [Introductie: de REST API in een notendop](rest-introduction)
* [HTTP requests versturen en ontvangen](rest-requests)
* [OAuth2 koppelingen](rest-oauth)
* [Setting up Copernica REST service](./setting-up-copernica-rest-service)
* [REST events](./rest-get-events.md)

## Types voor methodes

Er zijn vier verschillende soorten methodes in de REST API:

* **GET**: Wordt gebruikt om data op te vragen
* **POST**: Wordt gebruikt om nieuwe data aan te maken
* **PUT**: Wordt gebruikt om data te overschrijven
* **DELETE**: Wordt gebruikt om data te verwijderen

In de praktijk is het verschil tussen POST en PUT methodes erg klein. 
Hoewel in de meeste gevallen een POST en PUT verzoek naar dezelfde URL 
hetzelfde resultaat zullen hebben raden wij aan om de methode te kiezen 
die in de documentatie wordt aangegeven om verwarring in de toekomst te 
voorkomen.

## Inhoud

Gebruik de onderstaande links om naar de gewenste API calls te 
navigeren:

* [Account](./rest-api#Account)
* [Databases & Collecties](./rest-api#Databases & Collecties)
* [Selecties & Miniselecties](./rest-api#Selecties & Miniselecties)
* [Regels & Miniregels](./rest-api#Regels & Miniregels)
* [Profielen & Subprofielen](./rest-api#Profielen & Subprofielen)
* [E-mailadressen](./rest-api#E-mailadressen)
* [Publisher Mailings](./rest-api#Publisher Mailings)
* [Marketing Suite Mailings](./rest-api#Marketing Suite Mailings)
* [Dataverzoeken](./rest-api#Dataverzoeken)
* [Logfiles & Statistieken](./rest-api#Logfiles & Statistieken)

## Account

In de onderstaande tabel vind je een methode om account informatie op te vragen.

| Type   | Adres                                                                                        | Omschrijving                                 |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| GET    | [api.copernica.com/v2/identity](./rest-get-identity)                                         | Opvragen van account informatie              |

## Databases & Collecties

Je kunt je databases en collecties bekijken en onderhouden met API calls. 
In de onderstaande tabel vindt je alle calls gerelateerd aan databases, 
collecties en hun eigenschappen.

### Databases

| Type   | Adres                                                                                        | Omschrijving                                   |
|--------|----------------------------------------------------------------------------------------------|------------------------------------------------|
| GET    | [api.copernica.com/v2/databases](./rest-get-databases)                                       | Opvragen van alle databases                    |
| POST   | [api.copernica.com/v2/databases](./rest-post-databases)                                      | Aanmaken van een nieuwe database               |
| GET    | [api.copernica.com/v2/database/$id](./rest-get-database)                                     | Opvragen van database informatie               |
| PUT    | [api.copernica.com/v2/database/$id](./rest-put-database)                                     | Updaten van database informatie                |
| GET    | [api.copernica.com/v2/database/$id/unsubscribe](./rest-get-database-unsubscribe)             | Opvragen van database uitschrijfgedrag         |
| PUT    | [api.copernica.com/v2/database/$id/unsubscribe](./rest-put-database-unsubscribe)             | Updaten van database uitschrijfgedrag          |
| GET    | [api.copernica.com/v2/database/$id/views](./rest-get-database-views)                         | Opvragen van alle database selecties           |
| POST   | [api.copernica.com/v2/database/$id/views](./rest-post-database-views)                        | Aanmaken van een database selectie             |
| GET    | [api.copernica.com/v2/database/$id/collections](./rest-get-database-collections)             | Opvragen van alle database collecties          |
| POST   | [api.copernica.com/v2/database/$id/collections](./rest-post-database-collections)            | Aanmaken van een nieuwe database collectie     |
| GET    | [api.copernica.com/v2/database/$id/fields](./rest-get-database-fields)                       | Opvragen van alle database velden              |
| POST   | [api.copernica.com/v2/database/$id/fields](./rest-post-database-fields)                      | Aanmaken van een nieuw database veld           |
| PUT    | [api.copernica.com/v2/database/$id/field/$id](./rest-put-database-field)                     | Updaten van een database veld                  |
| DELETE | [api.copernica.com/v2/database/$id/field/$id](./rest-delete-database-field)                  | Verwijderen van een database veld              |
| GET    | [api.copernica.com/v2/database/$id/interests](./rest-get-database-interests)                 | Opvragen van alle database interesses          |
| POST   | [api.copernica.com/v2/database/$id/interests](./rest-post-database-interests)                | Aanmaken van een nieuwe database interesse     |
| GET    | [api.copernica.com/v2/database/$id/profileids](./rest-get-database-profileids)               | Opvragen van alle database profiel IDs         |
| GET    | [api.copernica.com/v2/database/$id/profiles](./rest-get-database-profiles)                   | Opvragen van alle database profielen           |
| POST   | [api.copernica.com/v2/database/$id/profiles](./rest-post-database-profiles)                  | Aanmaken van een nieuw database profiel        |
| PUT    | [api.copernica.com/v2/database/$id/profiles](./rest-put-database-profiles)                   | Updaten van een of meerdere database profielen |

### Collecties

| Type   | Adres                                                                                        | Omschrijving                                    |
|--------|----------------------------------------------------------------------------------------------|-------------------------------------------------|
| POST   | [api.copernica.com/v2/database/$id/collections](./rest-post-database-collections)            | Aanmaken van een collectie                      |
| GET    | [api.copernica.com/v2/collection/$id](./rest-get-collection)                                 | Opvragen van collectie informatie               |
| PUT    | [api.copernica.com/v2/collection/$id](./rest-put-collection)                                 | Updaten van collectie informatie                |
| GET    | [api.copernica.com/v2/collection/$id/unsubscribe](./rest-get-collection-unsubscribe)         | Opvragen van collectie uitschrijfgedrag         |
| PUT    | [api.copernica.com/v2/collection/$id/unsubscribe](./rest-put-collection-unsubscribe)         | Updaten van collectie uitschrijfgedrag          |
| GET    | [api.copernica.com/v2/collection/$id/miniviews](./rest-get-collection-miniviews)             | Opvragen van alle collectie miniselecties       |
| POST   | [api.copernica.com/v2/collection/$id/miniviews](./rest-post-collection-miniviews)            | Aanmaken van een nieuwe collectie miniselectie  |
| GET    | [api.copernica.com/v2/collection/$id/fields](./rest-get-collection-fields)                   | Opvragen van alle collectie velden              |
| POST   | [api.copernica.com/v2/collection/$id/fields](./rest-put-collection-fields)                   | Aanmaken van een collectie veld                 |
| PUT    | [api.copernica.com/v2/collection/$id/field/$id](./rest-put-collection-field)                 | Updaten van een collectie veld                  |
| DELETE | [api.copernica.com/v2/collection/$id/field/$id](./rest-delete-collection-field)              | Verwijderen van een collectie veld              |
| GET    | [api.copernica.com/v2/collection/$id/subprofileids](./rest-get-collection-subprofileids)     | Opvragen van alle collectie subprofiel IDs      |
| GET    | [api.copernica.com/v2/collection/$id/subprofiles](./rest-get-collection-subprofiles)         | Opvragen van alle collectie subprofielen        |

## Selecties & Miniselecties

Selecties vallen onder de database, terwijl miniselecties onder een collectie vallen. 
Je kunt de methodes gerelateerd aan specifieke (mini)selecties hieronder vinden.

### Selecties

| Type   | Adres                                                                                        | Omschrijving                                 |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| GET    | [api.copernica.com/v2/view/$id](./rest-get-view)                                             | Opvragen van selectie informatie             |
| PUT    | [api.copernica.com/v2/view/$id](./rest-put-view)                                             | Updaten van selectie informatie              |
| DELETE | [api.copernica.com/v2/view/$id](./rest-delete-view)                                          | Verwijderen van een selectie                 |
| GET    | [api.copernica.com/v2/view/$id/views](./rest-get-view-views)                                 | Opvragen van alle genestelde selecties       |
| POST   | [api.copernica.com/v2/view/$id/views](./rest-post-view-views)                                | Aanmaken van een genestelde selectie         |
| GET    | [api.copernica.com/v2/view/$id/subprofileids](./rest-get-view-subprofileids)                 | Opvragen van alle selectie subprofiel IDs    |
| GET    | [api.copernica.com/v2/view/$id/subprofiles](./rest-get-view-subprofiles)                     | Opvragen van alle selectie subprofielen      |
| GET    | [api.copernica.com/v2/view/$id/rules](./rest-get-view-rules)                                 | Opvragen van alle selectie regels            |
| GET    | [api.copernica.com/v2/view/$id/rule/$id](./rest-get-view-rule)                               | Opvragen van een selectie regel              |
| POST   | [api.copernica.com/v2/view/$id/rules](./rest-post-view-rules)                                | Aanmaken van een selectie regel              |

### Miniselecties

| Type   | Adres                                                                                        | Omschrijving                                   |
|--------|----------------------------------------------------------------------------------------------|------------------------------------------------|
| POST   | [api.copernica.com/v2/collection/$id/miniviews](./rest-post-collection-miniviews)            | Aanmaken van een miniselectie                  |
| GET    | [api.copernica.com/v2/miniview/$id](./rest-get-miniview)                                     | Opvragen van miniselectie informatie           |
| PUT    | [api.copernica.com/v2/miniview/$id](./rest-put-miniview)                                     | Updaten van miniselectie informatie            |
| DELETE | [api.copernica.com/v2/miniview/$id](./rest-delete-miniview)                                  | Verwijderen van een miniselectie               |
| GET    | [api.copernica.com/v2/miniview/$id/subprofileids](./rest-get-miniview-subprofileids)         | Opvragen van alle miniselectie subprofiel IDs  |
| GET    | [api.copernica.com/v2/miniview/$id/subprofiles](./rest-get-miniview-subprofiles)             | Opvragen van alle miniselectie subprofielen    |
| GET    | [api.copernica.com/v2/miniview/$id/minirules](./rest-get-miniview-rules)                     | Opvragen van alle miniselectie miniregels      |
| GET    | [api.copernica.com/v2/miniview/$id/minirule/$id](./rest-get-miniview-rule)                   | Opvragen van een miniselectie miniregel        |
| POST   | [api.copernica.com/v2/miniview/$id/minirules](./rest-post-miniview-rules)                    | Aanmaken van een nieuwe miniselectie miniregel |

## Regels & Miniregels

Regels en miniregels bestaan uit een of meerdere condities om selecties en 
miniselecties aan te maken onder een database of collectie respectievelijk. 
Je kunt alle API calls gerelateerd aan (mini)regels in de tabel hieronder 
vinden.

### Regels

| Type   | Adres                                                                                        | Omschrijving                                   |
|--------|----------------------------------------------------------------------------------------------|------------------------------------------------|
| GET    | [api.copernica.com/v2/rule/$id](./rest-get-rule)                                             | Opvragen van regel informatie                  |
| PUT    | [api.copernica.com/v2/rule/$id](./rest-put-rule)                                             | Updaten van regel informatie                   |
| POST   | [api.copernica.com/v2/view/$id/rules](./rest-post-view-rules)                                | Aanmaken van een nieuwe selectie regel         |
| POST   | [api.copernica.com/v2/miniview/$id/minirules](./rest-post-miniview-rules)                    | Aanmaken van een nieuwe miniselectie miniregel |
| DELETE | [api.copernica.com/v2/rule/$id](./rest-delete-rule)                                          | Verwijderen van een regel                      |
| POST   | [api.copernica.com/v2/rule/$id/conditions](./rest-post-rule-conditions)                      | Aanmaken van een regel conditie                |

### Miniregels

| Type   | Adres                                                                                        | Omschrijving                                 |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| GET    | [api.copernica.com/v2/minirule/$id](./rest-get-minirule)                                     | Opvragen van miniregel informatie            |
| PUT    | [api.copernica.com/v2/minirule/$id](./rest-put-minirule)                                     | Updaten van miniregel informatie             |
| POST   | [api.copernica.com/v2/minirule/$id/conditions](./rest-post-minirule-conditions)              | Aanmaken van een nieuwe miniregel conditie   |
| DELETE | [api.copernica.com/v2/minirule/$id](./rest-delete-minirule)                                  | Verwijderen van een miniregel                |

## Profielen & Subprofielen

Profielen en subprofielen kunnen gebruikt worden om entiteiten in je database 
op te slaan, zoals je klanten of orders. Je vindt de relevante API calls 
in de onderstaande tabel.

### Profielen

| Type   | Adres                                                                                        | Omschrijving                                     |
|--------|----------------------------------------------------------------------------------------------|--------------------------------------------------|
| POST   | [api.copernica.com/v2/database/$id/profiles](./rest-post-database-profiles)                  | Aanmaken van een database profiel                |
| GET    | [api.copernica.com/v2/profile/$id](./rest-get-profile)                                       | Opvragen van profiel informatie                  |
| PUT    | [api.copernica.com/v2/profile/$id](./rest-put-profile)                                       | Updaten van profiel informatie                   |
| DELETE | [api.copernica.com/v2/profile/$id](./rest-delete-profile)                                    | Verwijderen van een profiel                      |
| GET    | [api.copernica.com/v2/profile/$id/subprofiles](./rest-get-profile-subprofiles)               | Opvragen van alle profiel subprofielen           |
| POST   | [api.copernica.com/v2/profile/$id/subprofiles](./rest-post-profile-subprofiles)              | Aanmaken van een nieuw profiel subprofiel        |
| PUT    | [api.copernica.com/v2/profile/$id/subprofiles](./rest-put-profile-subprofiles)               | Updaten van een of meerdere profiel subprofielen |
| GET    | [api.copernica.com/v2/profile/$id/fields](./rest-get-profile-fields)                         | Opvragen van alle profiel velden                 |
| PUT    | [api.copernica.com/v2/profile/$id/fields](./rest-put-profile-fields)                         | Updaten van een of meerdere profiel velden       |
| GET    | [api.copernica.com/v2/profile/$id/interests](./rest-get-profile-interests)                   | Opvragen van alle profiel interesses             |
| POST   | [api.copernica.com/v2/profile/$id/interests](./rest-post-profile-interests)                  | Aanmaken van profiel interesse(s)                |
| PUT    | [api.copernica.com/v2/profile/$id/interests](./rest-put-profile-interests)                   | Updaten van profiel interesse(s)                 |
| GET    | [api.copernica.com/v2/profile/$id/events](./rest-get-profile-events)                         | Opvragen van profiel events                      |
| POST   | [api.copernica.com/v2/profile/$id/datarequest](./rest-post-profile-datarequest)              | Aanmaken van een dataverzoek voor een profiel    |

### Subprofielen

| Type   | Adres                                                                                        | Omschrijving                                     |
|--------|----------------------------------------------------------------------------------------------|--------------------------------------------------|
| POST   | [api.copernica.com/v2/profile/$id/subprofiles](./rest-post-profile-subprofiles)              | Aanmaken van een subprofiel                      |
| GET    | [api.copernica.com/v2/subprofile/$id](./rest-get-subprofile)                                 | Opvragen van subprofiel informatie               |
| PUT    | [api.copernica.com/v2/subprofile/$id](./rest-put-subprofile)                                 | Updaten van subprofiel informatie                |
| DELETE | [api.copernica.com/v2/subprofile/$id](./rest-delete-subprofile)                              | Verwijderen van een subprofiel                   |
| GET    | [api.copernica.com/v2/subprofile/$id/fields](./rest-get-subprofile-fields)                   | Opvragen van alle subprofiel velden              |
| PUT    | [api.copernica.com/v2/subprofile/$id/fields](./rest-put-subprofile-fields)                   | Updaten van een of meerdere subprofiel velden    |
| GET    | [api.copernica.com/v2/subprofile/$id/events](./rest-get-subprofile-events)                   | Opvragen van subprofiel events                   |
| POST   | [api.copernica.com/v2/subprofile/$id/datarequest](./rest-post-subprofile-datarequest)        | Aanmaken van een dataverzoek voor een subprofiel |

## E-mailadressen

De onderstaande tabel bevat alle calls beschikbaar voor een specifiek e-mailadres.

| Type   | Adres                                                                                        | Omschrijving                                      |
|--------|----------------------------------------------------------------------------------------------|---------------------------------------------------|
| GET    | [api.copernica.com/v2/email/$email/events](./rest-get-email-events)                          | Opvragen van alle events voor een e-mailadres     |
| POST   | [api.copernica.com/v2/email/$email/datarequest](./rest-post-email-datarequest)               | Aanmaken van een dataverzoek voor een e-mailadres |

## Publisher Mailings

In de onderstaande tabel vind je alle API calls gerelateerd aan Publisher 
documenten, templates en mailings.

| Type   | Adres                                                                                        | Omschrijving                                 |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| GET    | [api.copernica.com/v2/publisher/emailings](./rest-get-publisher-emailings)                   | Opvragen van alle mailings                   |
| GET    | [api.copernica.com/v2/publisher/emailingdocument/$id](./rest-get-publisher-emailingdocument) | Opvragen van document informatie             |
| GET    | [api.copernica.com/v2/publisher/document/$id/events](./rest-get-publisher-document-events)   | Opvragen van document events                 |
| GET    | [api.copernica.com/v2/publisher/message/$id](./rest-get-publisher-message)                   | Opvragen van bericht informatie              |
| GET    | [api.copernica.com/v2/publisher/message/$id/events](./rest-get-publisher-message-events)     | Opvragen van bericht events                  |
| GET    | [api.copernica.com/v2/publisher/template/$id/events](./rest-get-publisher-template-events)   | Opvragen van template events                 |

## Marketing Suite Mailings

In de onderstaande tabel vind je alle API calls gerelateerd aan Marketing Suite 
templates en mailings.

| Type   | Adres                                                                                        | Omschrijving                                 |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| GET    | [api.copernica.com/v2/ms/emailings](./rest-get-ms-emailings)                                 | Opvragen van alle mailings                   |
| GET    | [api.copernica.com/v2/ms/message/$id](./rest-get-ms-message)                                 | Opvragen van bericht informatie              |
| GET    | [api.copernica.com/v2/ms/message/$id/body](./rest-get-ms-message-body)                       | Opvragen van bericht body                    |
| GET    | [api.copernica.com/v2/ms/message/$id/events](./rest-get-ms-message-events)                   | Opvragen van bericht events                  |
| GET    | [api.copernica.com/v2/ms/template/$id/events](./rest-get-ms-template-events)                 | Opvragen van template events                 |

## Dataverzoeken

Nadat alle data voor een dataverzoek is verzameld wordt de data voor een 
korte periode op de Copernica servers opgeslagen. Met de onderstaande 
calls kun je dataverzoeken aanmaken en de data en status van deze verzoeken opvragen.

| Type   | Adres                                                                                        | Omschrijving                                 |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| POST   | [api.copernica.com/v2/email/$email/datarequest](./rest-post-email-datarequest)               | Aanmaken dataverzoek voor een e-mailadres    |
| POST   | [api.copernica.com/v2/profile/$id/datarequest](./rest-post-profile-datarequest)              | Aanmaken dataverzoek voor een profiel        |
| POST   | [api.copernica.com/v2/subprofile/$id/datarequest](./rest-post-subprofile-datarequest)        | Aanmaken dataverzoek voor een subprofiel     |
| GET    | [api.copernica.com/v2/datarequest/$id/data]                                                  | Opvragen data van een dataverzoek            |
| GET    | [api.copernica.com/v2/datarequest/$id/status]                                                | Opvragen status van een dataverzoek          |

## Logfiles & Statistieken

Copernica houdt uitgebreide data bij over alles gerelateerd aan een 
mailing. Je kunt alle calls gerelateerd aan logfiles en statistieken in 
de onderstaande tabel vinden.

| Type   | Adres                                                                                        | Omschrijving
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------
| GET    | [api.copernica.com/v2/tags/$tag/events](./rest-get-tags-events)                              | Fetch all events for a tag
| GET    | [api.copernica.com/v2/ms/message/$id/events](./rest-get-ms-message-events)                   | Fetch all MS message events
| GET    | [api.copernica.com/v2/ms/template/$id/events](./rest-get-ms-template-events)                 | Fetch all MS template events
| GET    | [api.copernica.com/v2/publisher/document/$id/events](./rest-get-publisher-document-events)   | Fetch all Publisher document events
| GET    | [api.copernica.com/v2/publisher/message/$id/events](./rest-get-publisher-message-events)     | Fetch all Publisher message events
| GET    | [api.copernica.com/v2/publisher/template/$id/events](./rest-get-publisher-template-events)   | Fetch all Publisher template events
| GET    | [api.copernica.com/v2/profile/$id/events](./rest-get-profile-events)                         | Fetch all profile events
| GET    | [api.copernica.com/v2/subprofile/$id/events](./rest-get-subprofile-events)                   | Fetch all subprofile events
| GET    | [api.copernica.com/v2/logfiles](./rest-get-logfiles)                                         | Fetch logfiles
| GET    | [api.copernica.com/v2/logfiles](./rest-get-logfiles-names)                                   | Fetch all logfile names
| GET    | [api.copernica.com/v2/logfiles](./rest-get-logfiles-csv)                                     | Fetch logfiles in CSV format
| GET    | [api.copernica.com/v2/logfiles](./rest-get-logfiles-json)                                    | Fetch logfiles in JSON format
| GET    | [api.copernica.com/v2/logfiles](./rest-get-logfiles-xml)                                     | Fetch logfiles in XML format
