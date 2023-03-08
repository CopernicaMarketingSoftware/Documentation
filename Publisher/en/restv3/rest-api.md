# The REST API

The REST API allows you to retrieve and update the data that is stored inside
Copernica from out of your own website or app. You can write your own scripts
that send requests and instructions to our servers to fetch this data or
to update it. You can use this API to automatically synchronize the data in
Copernica with your own system, without any human interference. This page
contains an overview of all API calls.

* [Introduction & registration](./rest-introduction)
* [Sending and receiving HTTP requests](./rest-requests)
* [External OAuth2 links](./rest-oauth)
* [Paging](./rest-paging)

We are currently on version 3 of the REST API. [This article](./rest-introduction#REST-version)
explains the new version (and how to switch) in full detail. Not ready to switch?
If you want to use previous versions of the API, here is a link to the [v1](../restv1/rest-api.md)
and [v2](../restv2/rest-api.md) documentation.

## Method types

There are four types of methods:

* **GET**: Used to fetch data
* **POST**: Used to create new data
* **PUT**: Used to overwrite existing data
* **DELETE**: Used to delete data

See the [introduction](./rest-introduction) for more information about
HTTP requests.

## Overview

Use the links below to jump to the type of API call you are looking for.

* [Account](rest-api#account)
* [Databases & Collections](rest-api#databases-&-collections)
* [Views & Miniviews](rest-api#views-&-miniviews)
* [Rules & Minirules](rest-api#rules-&-minirules)
* [Profiles & Subprofiles](rest-api#profiles-&-subprofiles)
* [Publisher Mailings](rest-api#publisher-mailings)
* [Marketing Suite Mailings](rest-api#marketing-suite-mailings)
* [Datarequests](rest-api#datarequests)
* [Logfiles](rest-api#logfiles)
* [Sender domains](rest-api#senderdomains)

## Account

In the table below you can find a call to retrieve account information.

| Type   | Address                                                                                      | Description                                   |
|--------|----------------------------------------------------------------------------------------------|-----------------------------------------------|
| GET    | [api.copernica.com/v3/identity](./rest-get-identity)                                         | Fetch the account information                 |
| GET    | [api.copernica.com/v3/consumption](./rest-get-consumption)                                   | Fetch the account consumption                 |

## Databases & Collections

You can search and maintain your databases and collections with API calls.
The following table contains the calls related to database and collection
structure.

### Databases

| Type   | Address                                                                                      | Description                                  |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| GET    | [api.copernica.com/v3/databases](./rest-get-databases)                                       | Fetch all databases                          |
| POST   | [api.copernica.com/v3/databases](./rest-post-databases)                                      | Create a new database                        |
| POST   | [api.copernica.com/v3/database/$id/copy](./rest-post-database-copy)                          | Copy a database                              |
| GET    | [api.copernica.com/v3/database/$id](./rest-get-database)                                     | Fetch the database information               |
| PUT    | [api.copernica.com/v3/database/$id](./rest-put-database)                                     | Update the database information              |
| GET    | [api.copernica.com/v3/database/$id/unsubscribe](./rest-get-database-unsubscribe)             | Fetch the unsubscribe behavior               |
| PUT    | [api.copernica.com/v3/database/$id/unsubscribe](./rest-put-database-unsubscribe)             | Update the unsubscribe behavior              |
| GET    | [api.copernica.com/v3/database/$id/views](./rest-get-database-views)                         | Fetch all views                              |
| POST   | [api.copernica.com/v3/database/$id/views](./rest-post-database-views)                        | Create a view                                |
| GET    | [api.copernica.com/v3/database/$id/collections](./rest-get-database-collections)             | Fetch all collections                        |
| POST   | [api.copernica.com/v3/database/$id/collections](./rest-post-database-collections)            | Create a collection                          |
| GET    | [api.copernica.com/v3/database/$id/fields](./rest-get-database-fields)                       | Fetch all fields                             |
| POST   | [api.copernica.com/v3/database/$id/fields](./rest-post-database-fields)                      | Create a field                               |
| PUT    | [api.copernica.com/v3/database/$id/field/$id](./rest-put-database-field)                     | Update a field                               |
| DELETE | [api.copernica.com/v3/database/$id/field/$id](./rest-delete-database-field)                  | Delete a field                               |
| GET    | [api.copernica.com/v3/database/$id/interests](./rest-get-database-interests)                 | Fetch all interests                          |
| POST   | [api.copernica.com/v3/database/$id/interests](./rest-post-database-interests)                | Create an interest                           |
| PUT    | [api.copernica.com/v3/interest](./rest-put-interest)                                         | Update an interest                           |
| DELETE | [api.copernica.com/v3/interest](./rest-delete-interest)                                      | Delete an interest                           |
| GET    | [api.copernica.com/v3/database/$id/profileids](./rest-get-database-profileids)               | Fetch all profile IDs                        |
| GET    | [api.copernica.com/v3/database/$id/profiles](./rest-get-database-profiles)                   | Fetch all profiles                           |
| POST   | [api.copernica.com/v3/database/$id/profiles](./rest-post-database-profiles)                  | Create a profile                             |
| PUT    | [api.copernica.com/v3/database/$id/profiles](./rest-put-database-profiles)                   | Update one or multiple profiles              |
| DELETE | [api.copernica.com/v3/database/$id/profiles](./rest-delete-database-profiles)                | Delete one or multiple profiles              |
| PUT    | [api.copernica.com/v3/database/$id/intentions](./rest-put-database-intentions)               | Update the database intentions               |

### Collections

| Type   | Address                                                                                      | Description                                  |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| GET    | [api.copernica.com/v3/database/$id/collections](./rest-get-database-collections)             | Fetch all collections for a database         |
| POST   | [api.copernica.com/v3/database/$id/collections](./rest-post-database-collections)            | Create a new collection                      |
| GET    | [api.copernica.com/v3/collection/$id](./rest-get-collection)                                 | Fetch the collection information             |
| PUT    | [api.copernica.com/v3/collection/$id](./rest-put-collection)                                 | Update the collection information            |
| GET    | [api.copernica.com/v3/collection/$id/unsubscribe](./rest-get-collection-unsubscribe)         | Fetch the collection unsubscribe behavior    |
| PUT    | [api.copernica.com/v3/collection/$id/unsubscribe](./rest-put-collection-unsubscribe)         | Update the collection unsubscribe behavior   |
| GET    | [api.copernica.com/v3/collection/$id/miniviews](./rest-get-collection-miniviews)             | Fetch all collection miniviews               |
| POST   | [api.copernica.com/v3/collection/$id/miniviews](./rest-post-collection-miniviews)            | Create a new collection miniview             |
| GET    | [api.copernica.com/v3/collection/$id/fields](./rest-get-collection-fields)                   | Fetch all collection fields                  |
| POST   | [api.copernica.com/v3/collection/$id/fields](./rest-post-collection-fields)                  | Create a new collection field                |
| PUT    | [api.copernica.com/v3/collection/$id/field/$id](./rest-put-collection-field)                 | Update a collection field                    |
| DELETE | [api.copernica.com/v3/collection/$id/field/$id](./rest-delete-collection-field)              | Delete a collection field                    |
| GET    | [api.copernica.com/v3/collection/$id/subprofileids](./rest-get-collection-subprofileids)     | Fetch all collection subprofile IDs          |
| GET    | [api.copernica.com/v3/collection/$id/subprofiles](./rest-get-collection-subprofiles)         | Fetch all collection subprofiles             |
| PUT    | [api.copernica.com/v3/collection/$id/subprofiles](./rest-put-collection-subprofiles)         | Update one or multiple subprofiles           |
| PUT    | [api.copernica.com/v3/collection/$id/intentions](./rest-put-collection-intentions)           | Update the collection intentions             |
               
## Import

| Type   | Address                                                                                      | Description                                    |
|--------|----------------------------------------------------------------------------------------------|------------------------------------------------|
| POST   | [api.copernica.com/v3/imports](./rest-post-imports)                                          | Import data in the account                     |    
| GET    | [api.copernica.com/v3/import/$id](./rest-get-import)                                         | Fetch information about an import               |  

## Views & Miniviews

Views are selections under a database, while miniviews are selections under a collection.
You can find methods that relate to a specific (mini)view below.

### View

| Type   | Address                                                                                      | Description                   |
|--------|----------------------------------------------------------------------------------------------|-------------------------------|
| POST   | [api.copernica.com/v3/database/$id/views](./rest-post-database-views)                        | Create a view                 |
| POST   | [api.copernica.com/v3/view/$id/copy](./rest-post-view-copy)                                  | Copy a view                   |
| GET    | [api.copernica.com/v3/view/$id](./rest-get-view)                                             | Fetch the view information    |
| PUT    | [api.copernica.com/v3/view/$id](./rest-put-view)                                             | Update the view information   |
| DELETE | [api.copernica.com/v3/view/$id](./rest-delete-view)                                          | Delete a view                 |
| GET    | [api.copernica.com/v3/view/$id/views](./rest-get-view-views)                                 | Fetch all nested views        |
| POST   | [api.copernica.com/v3/view/$id/views](./rest-post-view-views)                                | Create a nested view          |
| GET    | [api.copernica.com/v3/view/$id/profileids](./rest-get-view-profileids)                       | Fetch all view profile IDs    |
| GET    | [api.copernica.com/v3/view/$id/profiles](./rest-get-view-profiles)                           | Fetch all view profiles       |
| GET    | [api.copernica.com/v3/view/$id/rules](./rest-get-view-rules)                                 | Fetch all view rules          |
| GET    | [api.copernica.com/v3/view/$id/rule/$id](./rest-get-view-rule)                               | Fetch a view rule             |
| POST   | [api.copernica.com/v3/view/$id/rules](./rest-post-view-rules)                                | Create a new view rule        |
| PUT    | [api.copernica.com/v3/view/$id/intentions](./rest-put-view-intentions)                       | Update the view intentions    |
| POST   | [api.copernica.com/v3/view/$id/rebuild](./rest-post-view-rebuild)                            | Rebuild the view              |

### Miniview

| Type   | Address                                                                                      | Description                       |
|--------|----------------------------------------------------------------------------------------------|-----------------------------------|
| POST   | [api.copernica.com/v3/collection/$id/miniviews](./rest-post-collection-miniviews)            | Create a new miniview             |
| GET    | [api.copernica.com/v3/miniview/$id](./rest-get-miniview)                                     | Fetch the miniview information    |
| PUT    | [api.copernica.com/v3/miniview/$id](./rest-put-miniview)                                     | Update the miniview information   |
| DELETE | [api.copernica.com/v3/miniview/$id](./rest-delete-miniview)                                  | Delete a miniview                 |
| GET    | [api.copernica.com/v3/miniview/$id/subprofileids](./rest-get-miniview-subprofileids)         | Fetch all miniview subprofile IDs |
| GET    | [api.copernica.com/v3/miniview/$id/subprofiles](./rest-get-miniview-subprofiles)             | Fetch all miniview subprofiles    |
| GET    | [api.copernica.com/v3/miniview/$id/views](./rest-get-miniview-views)                         | Fetch all views for a miniview    |
| GET    | [api.copernica.com/v3/miniview/$id/minirules](./rest-get-miniview-rules)                     | Fetch all miniview minirules      |
| GET    | [api.copernica.com/v3/miniview/$id/minirule/$id](./rest-get-miniview-rule)                   | Fetch a miniview minirule         |
| POST   | [api.copernica.com/v3/miniview/$id/minirules](./rest-post-miniview-rules)                    | Create a new miniview minirule    |
| PUT    | [api.copernica.com/v3/miniview/$id/intentions](./rest-put-miniview-intentions)               | Update the miniview intentions    |
| POST   | [api.copernica.com/v3/miniview/$id/rebuild](./rest-post-miniview-rebuild)                    | Rebuild the miniview              |

## Rules & Minirules

Rules and minirules are made up of several conditions to create selections
under a database or collection respectively. You can find API calls related
to rules and their conditions in the table below.

### Rules

| Type   | Address                                                                                      | Description                                  |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| POST   | [api.copernica.com/v3/view/$id/rules](./rest-post-view-rules)                                | Create a rule                                |
| GET    | [api.copernica.com/v3/rule/$id](./rest-get-rule)                                             | Fetch the rule information                   |
| PUT    | [api.copernica.com/v3/rule/$id](./rest-put-rule)                                             | Update the rule information                  |
| DELETE | [api.copernica.com/v3/rule/$id](./rest-delete-rule)                                          | Delete a rule                                |
| POST   | [api.copernica.com/v3/rule/$id/conditions](./rest-post-rule-conditions)                      | Create a condition                           |
| PUT    | [api.copernica.com/v3/condition/$type/$id](./rest-put-condition)                             | Update a condition                           |
| DELETE | [api.copernica.com/v3/condition/$type/$id](./rest-delete-condition)                          | Delete a condition                           |

### Minirules (for miniselections)

| Type   | Address                                                                                      | Description                                  |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| POST   | [api.copernica.com/v3/miniview/$id/minirules](./rest-post-miniview-rules)                    | Create a new minirule                        |
| GET    | [api.copernica.com/v3/minirule/$id](./rest-get-minirule)                                     | Fetch the minirule information               |
| PUT    | [api.copernica.com/v3/minirule/$id](./rest-put-minirule)                                     | Update the minirule information              |
| DELETE | [api.copernica.com/v3/minirule/$id](./rest-delete-minirule)                                  | Delete a minirule                            |
| POST   | [api.copernica.com/v3/minirule/$id/conditions](./rest-post-minirule-conditions)              | Create a minirule condition                  |
| PUT    | [api.copernica.com/v3/minicondition/$type/$id](./rest-put-minicondition)                     | Update a minirule condition                  |
| DELETE | [api.copernica.com/v3/minicondition/$type/$id](./rest-delete-minicondition)                  | Delete a minirule condition                  |

## Profiles & Subprofiles

Profiles and subprofiles can be used to represent entities in your database,
like your customers or orders. The relevant API calls can be found below.

### Profile

| Type   | Address                                                                                              | Description                                           |
|--------|------------------------------------------------------------------------------------------------------|-------------------------------------------------------|
| POST   | [api.copernica.com/v3/database/$id/profiles](./rest-post-database-profiles)                          | Create a new database profile                         |
| GET    | [api.copernica.com/v3/profile/$id](./rest-get-profile)                                               | Fetch the profile information                         |
| PUT    | [api.copernica.com/v3/profile/$id](./rest-put-profile)                                               | Update the profile information                        |
| DELETE | [api.copernica.com/v3/profile/$id](./rest-delete-profile)                                            | Delete a profile                                      |
| GET    | [api.copernica.com/v3/profile/$id/subprofiles/$id](./rest-get-profile-subprofiles)                   | Fetch subprofiles for a profile                       |
| POST   | [api.copernica.com/v3/profile/$id/subprofiles/$id](./rest-post-profile-subprofiles)                  | Create a new subprofile                               |
| PUT    | [api.copernica.com/v3/profile/$id/subprofiles/$id](./rest-put-profile-subprofiles)                   | Update one or multiple subprofiles                    |
| GET    | [api.copernica.com/v3/profile/$id/fields](./rest-get-profile-fields)                                 | Fetch all profile fields                              |
| PUT    | [api.copernica.com/v3/profile/$id/fields](./rest-put-profile-fields)                                 | Update one or multiple profile fields                 |
| GET    | [api.copernica.com/v3/profile/$id/interests](./rest-get-profile-interests)                           | Fetch all profile interests                           |
| POST   | [api.copernica.com/v3/profile/$id/interests](./rest-post-profile-interests)                          | Create profile interest(s)                            |
| PUT    | [api.copernica.com/v3/profile/$id/interests](./rest-put-profile-interests)                           | Update profile interest(s)                            |
| GET    | [api.copernica.com/v3/profile/$id/publisher/emailings](./rest-get-profile-publisher-emailings)       | Fetch all Publisher mailings for a profile            |
| GET    | [api.copernica.com/v3/profile/$id/ms/emailings](./rest-get-profile-ms-emailings)                     | Fetch all Marketing Suite mailings for a profile      |
| GET    | [api.copernica.com/v3/profile/$id/publisher/destinations](./rest-get-profile-publisher-destinations) | Fetch all Publisher destinations for a profile        |
| GET    | [api.copernica.com/v3/profile/$id/ms/destination](./rest-get-profile-ms-destinations)                | Fetch all Marketing Suite destinations for a profile  |
| GET    | [api.copernica.com/v3/profile/$id/files](./rest-get-profile-files)                                   | Fetch all files for a profile                         |
| POST   | [api.copernica.com/v3/profile/$id/datarequest](./rest-post-profile-datarequest)                      | Create a request for all data stored for a profile    |
| PUT    | [api.copernica.com/v3/profile/$id/unsubscribe](./rest-put-profile-unsubscribe)                       | Execute unsubscribe behavior of a profile             |
| GET    | [api.copernica.com/v3/profile/$id/publisher/document/$id](./rest-get-profile-publisher-personalized-document) | Fetch the personalized Publisher document for a profile        |

### Subprofile

| Type   | Address                                                                                                  | Description                                             |
|--------|----------------------------------------------------------------------------------------------------------|---------------------------------------------------------|
| POST   | [api.copernica.com/v3/profile/$id/subprofiles](./rest-post-profile-subprofiles)                          | Create a new subprofile                                 |
| GET    | [api.copernica.com/v3/subprofile/$id](./rest-get-subprofile)                                             | Fetch the subprofile information                        |
| PUT    | [api.copernica.com/v3/subprofile/$id](./rest-put-subprofile)                                             | Update the subprofile information                       |
| DELETE | [api.copernica.com/v3/subprofile/$id](./rest-delete-subprofile)                                          | Delete a subprofile                                     |
| GET    | [api.copernica.com/v3/subprofile/$id/fields](./rest-get-subprofile-fields)                               | Fetch all subprofile fields                             |
| PUT    | [api.copernica.com/v3/subprofile/$id/fields](./rest-put-subprofile-fields)                               | Update the subprofile fields                            |
| GET    | [api.copernica.com/v3/subprofile/$id/publisher/emailings](./rest-get-subprofile-publisher-emailings)     | Fetch all Publisher mailings for a subprofile           |
| GET    | [api.copernica.com/v3/subprofile/$id/ms/emailings](./rest-get-subprofile-ms-emailings)                   | Fetch all Marketing Suite mailings for a subprofile     |
| GET    | [api.copernica.com/v3/subprofile/$id/publisher/destinations](rest-get-subprofile-publisher-destinations) | Fetch all Publisher destinations for a subprofile       |
| GET    | [api.copernica.com/v3/subprofile/$id/ms/destination](rest-get-subprofile-ms-destinations)                | Fetch all Marketing Suite destinations for a subprofile |
| POST   | [api.copernica.com/v3/subprofile/$id/datarequest](./rest-post-subprofile-datarequest)                    | Create a request for all data stored for a subprofile   |
| PUT    | [api.copernica.com/v3/subprofile/$id/unsubscribe](./rest-put-subprofile-unsubscribe)                     | Execute unsubscribe behavior of a subprofile            |
| GET    | [api.copernica.com/v3/subprofile/$id/publisher/document/$id](./rest-get-subprofile-publisher-personalized-document) | Fetch the personalized Publisher document for a subprofile        |

## Publisher Mailings

The table below contains all API calls related to Publisher documents,
templates and mailings.

### Mailings

| Type   | Address                                                                                                  | Description                                   |
|--------|----------------------------------------------------------------------------------------------------------|-----------------------------------------------|
| GET    | [api.copernica.com/v3/publisher/emailings](./rest-get-publisher-emailings)                               | Fetch all mailings                            |
| GET    | [api.copernica.com/v3/publisher/scheduledemailings](./rest-get-publisher-scheduledemailings)             | Fetch all scheduled mailings                  |
| GET    | [api.copernica.com/v3/publisher/emailing/$id](./rest-get-publisher-emailing)                             | Fetch a mailing                               |
| GET    | [api.copernica.com/v3/publisher/scheduledemailing/$id](./rest-get-publisher-scheduledemailing)           | Fetch a scheduled mailing                     |
| GET    | [api.copernica.com/v3/publisher/destinations](./rest-get-publsiher-destinations)                         | Fetch all destinations for a specific period          |
| POST   | [api.copernica.com/v3/publisher/emailing](./rest-post-publisher-emailing)                                | Create a mailing                              |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/destinations](./rest-get-publisher-emailing-destinations)   | Fetch the destinations for a mailing          |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/snapshot](./rest-get-publisher-emailing-snapshot)           | Fetch the snapshot for a mailing              |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/statistics](./rest-get-publisher-emailing-statistics)       | Fetch the statistics for a mailing            |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/abuses](./rest-get-publisher-emailing-abuses)               | Fetch the abuses for a mailing                |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/clicks](./rest-get-publisher-emailing-clicks)               | Fetch the clicks for a mailing                |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/deliveries](./rest-get-publisher-emailing-deliveries)       | Fetch the deliveries for a mailing            |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/errors](./rest-get-publisher-emailing-errors)               | Fetch the errors for a mailing                |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/impressions](./rest-get-publisher-emailing-impressions)     | Fetch the impressions for a mailing           |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/unsubscribes](./rest-get-publisher-emailing-unsubscribes)   | Fetch the unsubscribes for a mailing          |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/testgroups](./rest-get-publisher-emailing-testgroups)       | Fetch the testgroups for a mailing            |
| GET    | [api.copernica.com/v3/publisher/emailing/$id/finalgroup](./rest-get-publisher-emailing-finalgroup)       | Fetch the finalgroup for a mailing            |
| PUT    | [api.copernica.com/v2/publisher/emailing/$id/unsubscribe](./rest-put-publisher-emailing-unsubscribe)     | Unsubscribe (sub)profile based on a mailing            |
| GET    | [api.copernica.com/v3/publisher/message/$id](./rest-get-publisher-message)                               | Fetch the message information                 |
| GET    | [api.copernica.com/v3/profile/$id/publisher/emailings](./rest-get-profile-publisher-emailings)           | Fetch all Publisher mailings for a profile    |
| GET    | [api.copernica.com/v3/subprofile/$id/publisher/emailings](./rest-get-subprofile-publisher-emailings)     | Fetch all Publisher mailings for a subprofile |

### Documents & Templates

| Type   | Address                                                                                              | Description                                            |
|--------|------------------------------------------------------------------------------------------------------|--------------------------------------------------------|
| GET    | [api.copernica.com/v3/publisher/documents](./rest-get-publisher-documents)                           | Fetch all documents                                    |
| POST   | [api.copernica.com/v3/publisher/documents](./rest-post-publisher-documents)                          | Create a new document                                    |
| GET    | [api.copernica.com/v3/publisher/document/$id](./rest-get-publisher-document)                         | Fetch the document information                         |
| PUT    | [api.copernica.com/v3/publisher/document/$id](./rest-put-publisher-document)                         | Update the document information                         |
| DELETE | [api.copernica.com/v3/publisher/document/$id](./rest-delete-publisher-document)                      | Delete a document                                   |
| GET    | [api.copernica.com/v3/publisher/document/$id/emailings](./rest-get-publisher-document-emailings)     | Fetch all emailings for a document                     |
| GET    | [api.copernica.com/v3/publisher/document/$id/statistics](./rest-get-publisher-document-statistics)   | Fetch the statistics for a document                    |
| GET    | [api.copernica.com/v3/publisher/document/$id/loopblocks](./rest-get-publisher-document-loopblocks)   | Fetch the loop blocks for a document                    |
| GET    | [api.copernica.com/v3/publisher/document/$id/textblocks](./rest-get-publisher-document-textblocks)   | Fetch the text blocks for a document                    |
| GET    | [api.copernica.com/v3/publisher/document/$id/imageblocks](./rest-get-publisher-document-imageblocks) | Fetch the image blocks for a document                    |
| PUT    | [api.copernica.com/v3/publisher/document/$id/lookblock/$id](./rest-put-publisher-document-looplock) | Update a loop block for a document                    |
| PUT    | [api.copernica.com/v3/publisher/document/$id/textblock/$id](./rest-put-publisher-document-textblock) | Update a text block for a document                    |
| PUT    | [api.copernica.com/v3/publisher/document/$id/imageblock/$id](./rest-put-publisher-document-imageblock) | Update a image block for a document                    |
| GET    | [api.copernica.com/v3/publisher/templates](./rest-get-publisher-templates)                           | Fetch all templates                                    |
| POST   | [api.copernica.com/v3/publisher/templates](./rest-post-publisher-templates)                          | Create a new template                                    |
| GET    | [api.copernica.com/v3/publisher/template/$id](./rest-get-publisher-template)                         | Fetch the template information                         |
| PUT    | [api.copernica.com/v3/publisher/template/$id](./rest-put-publisher-template)                         | Update the template information                         |
| DELETE | [api.copernica.com/v3/publisher/template/$id](./rest-delete-publisher-template)                      | Delete a template                                   |
| GET    | [api.copernica.com/v3/publisher/template/$id/emailings](./rest-get-publisher-template-emailings)     | Fetch all emailings for a template                     |
| GET    | [api.copernica.com/v3/publisher/template/$id/documents](./rest-get-publisher-template-documents)     | Fetch all documents for a template                     |

### Destinations

| Type   | Address                                                                                                       | Description                                            |
|--------|---------------------------------------------------------------------------------------------------------------|--------------------------------------------------------|
| GET    | [api.copernica.com/v3/publisher/destination/$id](./rest-get-publisher-destination)                            | Fetch an emailing destination                          |
| GET    | [api.copernica.com/v3/publisher/destination/$id/body](./rest-get-publisher-destination-body)                  | Fetch the message body sent to the destination          |
| GET    | [api.copernica.com/v3/publisher/destinations/$id/fields](./rest-get-publisher-destination-fields)             | Fetch an emailing destination including profile fields |
| GET    | [api.copernica.com/v3/publisher/destination/$id/statistics](./rest-get-publisher-destination-statistics)      | Fetch the statistics for an emailing destination       |
| GET    | [api.copernica.com/v3/publisher/destination/$id/abuses](./rest-get-publisher-destination-abuses)              | Fetch the abuses for an emailing destination           |
| GET    | [api.copernica.com/v3/publisher/destination/$id/clicks](./rest-get-publisher-destination-clicks)              | Fetch the clicks for an emailing destination           |
| GET    | [api.copernica.com/v3/publisher/destination/$id/deliveries](./rest-get-publisher-destination-deliveries)      | Fetch the deliveries for an emailing destination       |
| GET    | [api.copernica.com/v3/publisher/destination/$id/errors](./rest-get-publisher-destination-errors)              | Fetch the errors for an emailing destination           |
| GET    | [api.copernica.com/v3/publisher/destination/$id/impressions](./rest-get-publisher-destination-impressions)    | Fetch the impressions for an emailing destination      |
| GET    | [api.copernica.com/v3/publisher/destination/$id/unsubscribes](./rest-get-publisher-destination-unsubscribes)  | Fetch the unsubscribes for an emailing destination     |
| GET    | [api.copernica.com/v3/publisher/destination/$id/content](./rest-get-publisher-destination-content)  | Fetch the received content for an emailing destination     |
| GET    | [api.copernica.com/v3/profile/$id/publisher/destinations](./rest-get-profile-publisher-destinations)          | Fetch the Publisher destinations for a profile         |
| GET    | [api.copernica.com/v3/subprofile/$id/publisher/destinations](./rest-get-subprofile-publisher-destinations)    | Fetch the Publisher destinations for a subprofile      |

### Statistics

| Type   | Address                                                                          | Description                                            |
|--------|----------------------------------------------------------------------------------|--------------------------------------------------------|
| GET    | [api.copernica.com/v3/publisher/abuses](./rest-get-publisher-abuses)             | Fetch all abuses for Publisher                         |
| GET    | [api.copernica.com/v3/publisher/clicks](./rest-get-publisher-clicks)             | Fetch all clicks for Publisher                         |
| GET    | [api.copernica.com/v3/publisher/deliveries](./rest-get-publisher-deliveries)     | Fetch all deliveries for Publisher                     |
| GET    | [api.copernica.com/v3/publisher/errors](./rest-get-publisher-errors)             | Fetch all errors for Publisher                         |
| GET    | [api.copernica.com/v3/publisher/impressions](./rest-get-publisher-impressions)   | Fetch all impressions for Publisher                    |
| GET    | [api.copernica.com/v3/publisher/unsubscribes](./rest-get-publisher-unsubscribes) | Fetch all unsubscribes for Publisher                   |

## Marketing Suite Mailings

The table below contains all API calls related to Marketing Suite templates
and emailings.

### Mailings

| Type   | Address                                                                                      | Description                                           |
|--------|----------------------------------------------------------------------------------------------|-------------------------------------------------------|
| GET    | [api.copernica.com/v3/ms/emailings](./rest-get-ms-emailings)                                 | Fetch all mailings                                    |
| GET    | [api.copernica.com/v3/ms/emailing/$id](./rest-get-ms-emailing)                               | Fetch a mailing                                       |
| POST   | [api.copernica.com/v3/ms/emailing](./rest-post-ms-emailing)                                  | Create a mailing                                      |
| GET    | [api.copernica.com/v3/ms/destinations](./rest-get-ms-destinations)                           | Fetch all destinations for a specific period          |
| GET    | [api.copernica.com/v3/ms/scheduledemailings](./rest-get-ms-scheduledemailings)               | Fetch all scheduled mailings                          |
| GET    | [api.copernica.com/v3/ms/scheduledemailing/$id](./rest-get-ms-scheduledemailing)             | Fetch a scheduled mailing                             |
| POST   | [api.copernica.com/v3/ms/scheduledemailing](./rest-post-ms-scheduledemailing)                | Create a scheduled mailing                            |
| GET    | [api.copernica.com/v3/ms/emailing/$id/destinations](./rest-get-ms-emailing-destinations)     | Fetch the destinations for a mailing                  |
| GET    | [api.copernica.com/v3/ms/emailing/$id/statistics](./rest-get-ms-emailing-statistics)         | Fetch the statistics for a mailing                    |
| GET    | [api.copernica.com/v3/ms/emailing/$id/deliveries](./rest-get-ms-emailing-deliveries)         | Fetch all deliveries for a mailing                    |
| GET    | [api.copernica.com/v3/ms/emailing/$id/impressions](./rest-get-ms-emailing-impressions)       | Fetch all impressions for a mailing                   |
| GET    | [api.copernica.com/v3/ms/emailing/$id/clicks](./rest-get-ms-emailing-clicks)                 | Fetch all clicks for a mailing                        |
| GET    | [api.copernica.com/v3/ms/emailing/$id/errors](./rest-get-ms-emailing-errors)                 | Fetch all errors for a mailing                        |
| GET    | [api.copernica.com/v3/ms/emailing/$id/unsubscribes](./rest-get-ms-emailing-unsubscribes)     | Fetch all unsubscribes for a mailing                  |
| GET    | [api.copernica.com/v3/ms/emailing/$id/abuses](./rest-get-ms-emailing-abuses)                 | Fetch all abuses for a mailing                        |
| PUT    | [api.copernica.com/v2/ms/emailing/$id/unsubscribe](./rest-put-ms-emailing-unsubscribe)       | Unsubscribe (sub)profile based on a mailing           |
| GET    | [api.copernica.com/v3/profile/$id/ms/emailings](./rest-get-profile-ms-emailings)             | Fetch all Marketing Suite mailings for a profile      |
| GET    | [api.copernica.com/v3/subprofile/$id/ms/emailings](./rest-get-subprofile-ms-emailings)       | Fetch all Marketing Suite mailings for a subprofile   |

### Templates

| Type   | Address                                                                                      | Description                                  |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| GET    | [api.copernica.com/v3/ms/templates](./rest-get-ms-templates)                                 | Fetch all templates                          |
| GET    | [api.copernica.com/v3/ms/template/$id](./rest-get-ms-template)                               | Fetch a template                             |
| DELETE | [api.copernica.com/v3/ms/template/$id](./rest-delete-ms-template)                            | Delete a template                            |
| GET    | [api.copernica.com/v3/ms/template/$id/statistics](./rest-get-ms-template-statistics)         | Fetch the statistics for a template          |

### Messages & Destinations

Copernica uses the terms messages and destinations interchangeably in the 
Marketing Suite. Both refer to a specific message sent to a specific profile 
or subprofile. Please keep in mind that you can substitute 'message' by 'destination' 
or vice versa in all of the articles below, including the code examples.

| Type   | Address                                                                                      | Description                                             |
|--------|----------------------------------------------------------------------------------------------|---------------------------------------------------------|
| GET    | [api.copernica.com/v3/ms/destination/$id](./rest-get-ms-destination)                         | Fetch a destination                                     |
| GET    | [api.copernica.com/v3/ms/emailing/$id/destinations](./rest-get-ms-emailing-destinations)     | Fetch the destinations for a mailing                    |
| GET    | [api.copernica.com/v3/ms/destination/$id/body](./rest-get-ms-destination-body)               | Fetch the message body sent to the destination          |
| GET    | [api.copernica.com/v3/ms/destination/$id/statistics](./rest-get-ms-destination-statistics)   | Fetch the statistics for a destination                  |
| GET    | [api.copernica.com/v3/ms/destination/$id/deliveries](./rest-get-ms-destination-deliveries)   | Fetch all deliveries for a destination                  |
| GET    | [api.copernica.com/v3/ms/destination/$id/impressions](./rest-get-ms-destination-impressions) | Fetch all impressions for a destination                 |
| GET    | [api.copernica.com/v3/ms/destination/$id/clicks](./rest-get-ms-destination-clicks)           | Fetch all clicks for a destination                      |
| GET    | [api.copernica.com/v3/ms/destination/$id/errors](./rest-get-ms-destination-errors)           | Fetch all errors for a destination                      |
| GET    | [api.copernica.com/v3/ms/destination/$id/unsubscribes](./rest-get-ms-destination-unsubscribes) | Fetch all unsubscribes for a destination                |
| GET    | [api.copernica.com/v3/ms/destination/$id/abuses](./rest-get-ms-destination-abuses)           | Fetch all abuses for a destination                      |
| GET    | [api.copernica.com/v3/profile/$id/ms/destinations](./rest-get-profile-ms-destinations)       | Fetch all Marketing Suite destinations for a profile    |
| GET    | [api.copernica.com/v3/subprofile/$id/ms/destinations](./rest-get-subprofile-ms-destinations) | Fetch all Marketing Suite destinations for a subprofile |

### Statistics

| Type   | Address                                                                                      | Description                                  |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| GET    | [api.copernica.com/v3/ms/deliveries](./rest-get-ms-deliveries)                               | Fetch all deliveries                         |
| GET    | [api.copernica.com/v3/ms/impressions](./rest-get-ms-impressions)                             | Fetch all impressions                        |
| GET    | [api.copernica.com/v3/ms/clicks](./rest-get-ms-clicks)                                       | Fetch all clicks                             |
| GET    | [api.copernica.com/v3/ms/errors](./rest-get-ms-errors)                                       | Fetch all errors                             |
| GET    | [api.copernica.com/v3/ms/unsubscribes](./rest-get-ms-unsubscribes)                           | Fetch all unsubscribes                       |
| GET    | [api.copernica.com/v3/ms/abuses](./rest-get-ms-abuses)                                       | Fetch all abuses                             |
| GET    | [api.copernica.com/v3/ms/emailing/$id/statistics](./rest-get-ms-emailing-statistics)         | Fetch the statistics for a mailing           |
| GET    | [api.copernica.com/v3/ms/emailing/$id/abuses](./rest-get-ms-emailing-abuses)                 | Fetch all abuses for a mailing               |
| GET    | [api.copernica.com/v3/ms/emailing/$id/clicks](./rest-get-ms-emailing-clicks)                 | Fetch all clicks for a mailing               |
| GET    | [api.copernica.com/v3/ms/emailing/$id/deliveries](./rest-get-ms-emailing-deliveries)         | Fetch all deliveries for a mailing           |
| GET    | [api.copernica.com/v3/ms/emailing/$id/errors](./rest-get-ms-emailing-errors)                 | Fetch all errors for a mailing               |
| GET    | [api.copernica.com/v3/ms/emailing/$id/impressions](./rest-get-ms-emailing-impressions)       | Fetch all impressions for a mailing          |
| GET    | [api.copernica.com/v3/ms/destination/$id/statistics](./rest-get-ms-destination-statistics)   | Fetch the statistics for a destination       |
| GET    | [api.copernica.com/v3/ms/destination/$id/abuses](./rest-get-ms-destination-abuses)           | Fetch all abuses for a destination           |
| GET    | [api.copernica.com/v3/ms/destination/$id/clicks](./rest-get-ms-destination-clicks)           | Fetch all clicks for a destination           |
| GET    | [api.copernica.com/v3/ms/destination/$id/deliveries](./rest-get-ms-destination-deliveries)   | Fetch all deliveries for a destination       |
| GET    | [api.copernica.com/v3/ms/destination/$id/errors](./rest-get-ms-destination-errors)           | Fetch all errors for a destination           |
| GET    | [api.copernica.com/v3/ms/destination/$id/impressions](./rest-get-ms-destination-impressions) | Fetch all impressions for a destination      |

## Media libraries

| Type   | Address                                                                                      | Description                                               |
|--------|----------------------------------------------------------------------------------------------|-----------------------------------------------------------|
| POST   | [api.copernica.com/v3/medialibrary/$id/files](./rest-post-medialibrary-files)                | Upload a file/image in a media library                    |    

## Datarequests

The result of data requests is stored for a while after completion. With the
following methods you can retrieve the status and data of previously completed
calls.

| Type   | Address                                                                                      | Description                                                 |
|--------|----------------------------------------------------------------------------------------------|-------------------------------------------------------------|
| POST   | [api.copernica.com/v3/email/$email/datarequest](./rest-post-email-datarequest)               | Create a request for all data stored for an emailaddress    |
| POST   | [api.copernica.com/v3/profile/$id/datarequest](./rest-post-profile-datarequest)              | Create a request for all data stored for a profile          |
| POST   | [api.copernica.com/v3/subprofile/$id/datarequest](./rest-post-subprofile-datarequest)        | Create a request for all data stored for a subprofile       |
| GET    | [api.copernica.com/v3/datarequest/$id/data](./rest-get-datarequest-data)                     | Fetch the data of a previous data request                   |
| GET    | [api.copernica.com/v3/datarequest/$id/status](./rest-get-datarequest-status)                 | Fetch the status of a previous data request                 |

## Logfiles

Copernica keeps extensive logfiles about everything that happens to your
emails after sending. You can find all calls related to logfiles in the table below.

| Type   | Address                                                                                      | Description                                      |
|--------|----------------------------------------------------------------------------------------------|--------------------------------------------------|
| GET    | [api.copernica.com/v3/logfiles](./rest-get-logfiles)                                         | Fetch logfile dates                              |
| GET    | [api.copernica.com/v3/logfiles](./rest-get-logfiles-names)                                   | Fetch logfile names                              |
| GET    | [api.copernica.com/v3/logfile/$filename/csv](./rest-get-logfiles-csv)                        | Fetch logfiles in CSV format                     |
| GET    | [api.copernica.com/v3/logfile/$filename/json](./rest-get-logfiles-json)                      | Fetch logfiles in JSON format                    |
| GET    | [api.copernica.com/v3/logfile/$filename/xml](./rest-get-logfiles-xml)                        | Fetch logfiles in XML format                     |

## Webhooks

Webhooks are processes that notify their user of events that happen in real time through HTTP POST. 
You can find all calls related to webhooks in the table below.

| Type   | Address                                                                                      | Description                                      |
|--------|----------------------------------------------------------------------------------------------|--------------------------------------------------|
| GET    | [api.copernica.com/v3/webhook/$id](./rest-get-webhook)                                       | Fetch a webhook                                  |
| POST   | [api.copernica.com/v3/webhooks](./rest-post-webhooks)                                        | Create a webhook                                 |
| PUT    | [api.copernica.com/v3/webhook/$id](./rest-put-webhook)                                       | Update a webhook                                 |
| DELETE | [api.copernica.com/v3/webhook/$id](./rest-delete-webhook)                                    | Remove a webhook                                 |


## Sender domains

Within our software you can configure from which domain or subdomain do you to send your emails. If you want the 'FROM' address of your emails to be info@example.com, you need to provide 'example.com' as your sender domain.

| Type   | Address                                                                                      | Description                                      |
|--------|----------------------------------------------------------------------------------------------|--------------------------------------------------|
| GET    | [api.copernica.com/v3/senderdomain/$id](./rest-get-senderdomain)                                       | Fetch a senderdomain                                  |
| POST   | [api.copernica.com/v3/senderdomains](./rest-post-senderdomains)                                        | Create a senderdomain                                 |
| PUT    | [api.copernica.com/v3/senderdomain/$id](./rest-put-senderdomain)                                       | Update a senderdomain                                 |
| DELETE | [api.copernica.com/v3/senderdomain/$id](./rest-delete-senderdomain)                                    | Remove a senderdomain    
