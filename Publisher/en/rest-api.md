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
* [REST events](./rest-get-events.md)

We are currently on version 2 of the REST API. [This article](./rest-introduction#REST version) 
explains the new version in full detail.

## Method types

There are four types of methods:

* **GET**: Used to fetch data
* **POST**: Used to create new data
* **PUT**: Used to overwrite existing data
* **DELETE**: Used to delete data

See the [introduction](./rest-introduction) for more information about 
HTTP requests.

## Overview

Use the links to jump to the type of API call you are looking for.

* [Account](./rest-api#Account)
* [Databases & Collections](./rest-api#Databases-&-Collections)
* [Views & Miniviews](./rest-api#Views-&-Miniviews)
* [Rules & Minirules](./rest-api#Rules-&-Minirules)
* [Profiles & Subprofiles](./rest-api#Profiles-&-Subprofiles)
* [Email Addresses](./rest-api#Email-Addresses)
* [Publisher Mailings](./rest-api#Publisher-Mailings)
* [Marketing Suite Mailings](./rest-api#Marketing-Suite-Mailings)
* [Datarequests](./rest-api#Datarequests)
* [Logfiles & Statistics](./rest-api#Logfiles-&-Statistics)

## Account
In the table below you can find a call to retrieve account information.

| Type   | Address                                                                                      | Description                                   |
|--------|----------------------------------------------------------------------------------------------|-----------------------------------------------|
| GET    | [api.copernica.com/v2/identity](./rest-get-identity)                                         | Fetch the account information                 |

## Databases & Collections

You can search and maintain your databases and collections with API calls. 
The following table contains the calls related to database and collection 
structure.

### Databases

| Type   | Address                                                                                      | Description                                  |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| GET    | [api.copernica.com/v2/databases](./rest-get-databases)                                       | Fetch all databases                          |
| POST   | [api.copernica.com/v2/databases](./rest-post-databases)                                      | Create a new database                        |
| GET    | [api.copernica.com/v2/database/$id](./rest-get-database)                                     | Fetch the database information               |
| PUT    | [api.copernica.com/v2/database/$id](./rest-put-database)                                     | Update the database information              |
| GET    | [api.copernica.com/v2/database/$id/unsubscribe](./rest-get-database-unsubscribe)             | Fetch the database unsubscribe behavior      |
| PUT    | [api.copernica.com/v2/database/$id/unsubscribe](./rest-put-database-unsubscribe)             | Update the database unsubscribe behavior     |
| GET    | [api.copernica.com/v2/database/$id/views](./rest-get-database-views)                         | Fetch all database views                     |
| POST   | [api.copernica.com/v2/database/$id/views](./rest-post-database-views)                        | Create a new database view                   |
| GET    | [api.copernica.com/v2/database/$id/collections](./rest-get-database-collections)             | Fetch all database collections               |
| POST   | [api.copernica.com/v2/database/$id/collections](./rest-post-database-collections)            | Create a new database collection             |
| GET    | [api.copernica.com/v2/database/$id/fields](./rest-get-database-fields)                       | Fetch all database fields                    |
| POST   | [api.copernica.com/v2/database/$id/fields](./rest-post-database-fields)                      | Create a new database field                  |
| PUT    | [api.copernica.com/v2/database/$id/field/$id](./rest-put-database-field)                     | Update a database field                      |
| DELETE | [api.copernica.com/v2/database/$id/field/$id](./rest-delete-database-field)                  | Delete a database field                      |
| GET    | [api.copernica.com/v2/database/$id/interests](./rest-get-database-interests)                 | Fetch all database interests                 |
| POST   | [api.copernica.com/v2/database/$id/interests](./rest-post-database-interests)                | Create a new database interest               |
| GET    | [api.copernica.com/v2/database/$id/profileids](./rest-get-database-profileids)               | Fetch all database profile IDs               |
| GET    | [api.copernica.com/v2/database/$id/profiles](./rest-get-database-profiles)                   | Fetch all database profiles                  |
| POST   | [api.copernica.com/v2/database/$id/profiles](./rest-post-database-profiles)                  | Create a new database profile                |
| PUT    | [api.copernica.com/v2/database/$id/profiles](./rest-put-database-profiles)                   | Update one or multiple database profiles     |

### Collections

| Type   | Address                                                                                      | Description                                  |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| POST   | [api.copernica.com/v2/database/$id/collections](./rest-post-database-collections)            | Create a new collection                      |
| GET    | [api.copernica.com/v2/collection/$id](./rest-get-collection)                                 | Fetch the collection information             |
| PUT    | [api.copernica.com/v2/collection/$id](./rest-put-collection)                                 | Update the collection information            |
| GET    | [api.copernica.com/v2/collection/$id/unsubscribe](./rest-get-collection-unsubscribe)         | Fetch the collection unsubscribe behavior    |
| PUT    | [api.copernica.com/v2/collection/$id/unsubscribe](./rest-put-collection-unsubscribe)         | Update the collection unsubscribe behavior   |
| GET    | [api.copernica.com/v2/collection/$id/miniviews](./rest-get-collection-miniviews)             | Fetch all collection miniviews               |
| POST   | [api.copernica.com/v2/collection/$id/miniviews](./rest-post-collection-miniviews)            | Create a new collection miniview             |
| GET    | [api.copernica.com/v2/collection/$id/fields](./rest-get-collection-fields)                   | Fetch all collection fields                  |
| POST   | [api.copernica.com/v2/collection/$id/fields](./rest-put-collection-fields)                   | Create a new collection field                |
| PUT    | [api.copernica.com/v2/collection/$id/field/$id](./rest-put-collection-field)                 | Update a collection field                    |
| DELETE | [api.copernica.com/v2/collection/$id/field/$id](./rest-delete-collection-field)              | Delete a collection field                    |
| GET    | [api.copernica.com/v2/collection/$id/subprofileids](./rest-get-collection-subprofileids)     | Fetch all collection subprofile IDs          |
| GET    | [api.copernica.com/v2/collection/$id/subprofiles](./rest-get-collection-subprofiles)         | Fetch all collection subprofiles             |
                                                                                                                                                       |
## Views & Miniviews

Views are selection under a database, while miniviews are selections under a collection. 
You can find methods that relate to a specific (mini)view below.

### View

| Type   | Address                                                                                      | Description                                  |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| GET    | [api.copernica.com/v2/view/$id](./rest-get-view)                                             | Fetch the view information                   |
| PUT    | [api.copernica.com/v2/view/$id](./rest-put-view)                                             | Update the view information                  |
| DELETE | [api.copernica.com/v2/view/$id](./rest-delete-view)                                          | Delete a view                                |
| GET    | [api.copernica.com/v2/view/$id/views](./rest-get-view-views)                                 | Fetch all nested views                       |
| POST   | [api.copernica.com/v2/view/$id/views](./rest-post-view-views)                                | Create a nested view                         |
| GET    | [api.copernica.com/v2/view/$id/subprofileids](./rest-get-view-subprofileids)                 | Fetch all view subprofile IDs                |
| GET    | [api.copernica.com/v2/view/$id/subprofiles](./rest-get-view-subprofiles)                     | Fetch all view subprofiles                   |
| GET    | [api.copernica.com/v2/view/$id/rules](./rest-get-view-rules)                                 | Fetch all view rules                         |
| GET    | [api.copernica.com/v2/view/$id/rule/$id](./rest-get-view-rule)                               | Fetch a view rule                            |
| POST   | [api.copernica.com/v2/view/$id/rules](./rest-post-view-rules)                                | Create a new view rule                       |
                                                                                                                                                       
### Miniview

| Type   | Address                                                                                      | Description                                  |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| POST   | [api.copernica.com/v2/collection/$id/miniviews](./rest-post-collection-miniviews)            | Create a new miniview                        |
| GET    | [api.copernica.com/v2/miniview/$id](./rest-get-miniview)                                     | Fetch the miniview information               |
| PUT    | [api.copernica.com/v2/miniview/$id](./rest-put-miniview)                                     | Update the miniview information              |
| DELETE | [api.copernica.com/v2/miniview/$id](./rest-delete-miniview)                                  | Delete a miniview                            |
| GET    | [api.copernica.com/v2/miniview/$id/subprofileids](./rest-get-miniview-subprofileids)         | Fetch all miniview subprofile IDs            |
| GET    | [api.copernica.com/v2/miniview/$id/subprofiles](./rest-get-miniview-subprofiles)             | Fetch all miniview subprofiles               |
| GET    | [api.copernica.com/v2/miniview/$id/minirules](./rest-get-miniview-rules)                     | Fetch all miniview minirules                 |
| GET    | [api.copernica.com/v2/miniview/$id/minirule/$id](./rest-get-miniview-rule)                   | Fetch a miniview minirule                    |
| POST   | [api.copernica.com/v2/miniview/$id/minirules](./rest-post-miniview-rules)                    | Create a new miniview minirule               |

## Rules & Minirules

Rules and minirules are made up of several conditions to create selections 
under a database or collection respectively. You can find their related API calls 
in the table below.

### Rules

| Type   | Address                                                                                      | Description                                  |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| GET    | [api.copernica.com/v2/rule/$id](./rest-get-rule)                                             | Fetch the rule information                   |
| PUT    | [api.copernica.com/v2/rule/$id](./rest-put-rule)                                             | Update the rule information                  |
| POST   | [api.copernica.com/v2/view/$id/rules](./rest-post-view-rules)                                | Create a new view rule                       |
| POST   | [api.copernica.com/v2/miniview/$id/minirules](./rest-post-miniview-rules)                    | Create a new miniview minirule               |
| DELETE | [api.copernica.com/v2/rule/$id](./rest-delete-rule)                                          | Delete a rule                                |
| POST   | [api.copernica.com/v2/rule/$id/conditions](./rest-post-rule-conditions)                      | Create a new rule condition                  |

### Minirule

| Type   | Address                                                                                      | Description                                  |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| GET    | [api.copernica.com/v2/minirule/$id](./rest-get-minirule)                                     | Fetch the minirule information               |
| PUT    | [api.copernica.com/v2/minirule/$id](./rest-put-minirule)                                     | Update the minirule information              |
| POST   | [api.copernica.com/v2/minirule/$id/conditions](./rest-post-minirule-conditions)              | Create a new minirule condition              |
| DELETE | [api.copernica.com/v2/minirule/$id](./rest-delete-minirule)                                  | Delete a minirule                            |

## Profiles & Subprofiles

Profiles and subprofiles can be used to represent entities in your database, 
like your customers or orders. The relevant API calls can be found below.

### Profile

| Type   | Address                                                                                      | Description                                        |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------------|
| POST   | [api.copernica.com/v2/database/$id/profiles](./rest-post-database-profiles)                  | Create a new database profile                      |
| GET    | [api.copernica.com/v2/profile/$id](./rest-get-profile)                                       | Fetch the profile information                      |
| PUT    | [api.copernica.com/v2/profile/$id](./rest-put-profile)                                       | Update the profile information                     |
| DELETE | [api.copernica.com/v2/profile/$id](./rest-delete-profile)                                    | Delete a profile                                   |
| GET    | [api.copernica.com/v2/profile/$id/subprofiles](./rest-get-profile-subprofiles)               | Fetch all profile subprofiles                      |
| POST   | [api.copernica.com/v2/profile/$id/subprofiles](./rest-post-profile-subprofiles)              | Create a new profile subprofile                    |
| PUT    | [api.copernica.com/v2/profile/$id/subprofiles](./rest-put-profile-subprofiles)               | Update one or multiple profile subprofiles         |
| GET    | [api.copernica.com/v2/profile/$id/fields](./rest-get-profile-fields)                         | Fetch all profile fields                           |
| PUT    | [api.copernica.com/v2/profile/$id/fields](./rest-put-profile-fields)                         | Update one or multiple profile fields              |
| GET    | [api.copernica.com/v2/profile/$id/interests](./rest-get-profile-interests)                   | Fetch all profile interests                        |
| POST   | [api.copernica.com/v2/profile/$id/interests](./rest-post-profile-interests)                  | Create profile interest(s)                         |
| PUT    | [api.copernica.com/v2/profile/$id/interests](./rest-put-profile-interests)                   | Update profile interest(s)                         |
| GET    | [api.copernica.com/v2/profile/$id/events](./rest-get-profile-events)                         | Fetch all profile events                           |
| POST   | [api.copernica.com/v2/profile/$id/datarequest](./rest-post-profile-datarequest)              | Create a request for all data stored for a profile |

### Subprofile

| Type   | Address                                                                                      | Description                                           |
|--------|----------------------------------------------------------------------------------------------|-------------------------------------------------------|
| POST   | [api.copernica.com/v2/profile/$id/subprofiles](./rest-post-profile-subprofiles)              | Create a new subprofile                               |
| GET    | [api.copernica.com/v2/subprofile/$id](./rest-get-subprofile)                                 | Fetch the subprofile information                      |
| PUT    | [api.copernica.com/v2/subprofile/$id](./rest-put-subprofile)                                 | Update the subprofile information                     |
| DELETE | [api.copernica.com/v2/subprofile/$id](./rest-delete-subprofile)                              | Delete a subprofile                                   |
| GET    | [api.copernica.com/v2/subprofile/$id/fields](./rest-get-subprofile-fields)                   | Fetch all subprofile fields                           |
| PUT    | [api.copernica.com/v2/subprofile/$id/fields](./rest-put-subprofile-fields)                   | Update one or multiple subprofile fields              |
| GET    | [api.copernica.com/v2/subprofile/$id/events](./rest-get-subprofile-events)                   | Fetch all subprofile events                           |
| POST   | [api.copernica.com/v2/subprofile/$id/datarequest](./rest-post-subprofile-datarequest)        | Create a request for all data stored for a subprofile |

## Email Addresses

The table below contains all calls pertaining to a specific email address.

| Type   | Address                                                                                      | Description                                                 |
|--------|----------------------------------------------------------------------------------------------|-------------------------------------------------------------|
| GET    | [api.copernica.com/v2/email/$email/events](./rest-get-email-events)                          | Retrieve all events related to the email address            |
| POST   | [api.copernica.com/v2/email/$email/datarequest](./rest-post-email-datarequest)               | Create a request for all data available for an emailaddress |

## Publisher Mailings

The table below contains all API calls related to Publisher documents, 
templates and mailings.

| Type   | Address                                                                                      | Description                                  |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| GET    | [api.copernica.com/v2/publisher/emailings](./rest-get-publisher-emailings)                   | Fetch all mailings                           |
| GET    | [api.copernica.com/v2/publisher/emailingdocument/$id](./rest-get-publisher-emailingdocument) | Fetch the document information               |
| GET    | [api.copernica.com/v2/publisher/document/$id/events](./rest-get-publisher-document-events)   | Fetch all document events                    |
| GET    | [api.copernica.com/v2/publisher/message/$id](./rest-get-publisher-message)                   | Fetch the message information                |
| GET    | [api.copernica.com/v2/publisher/message/$id/events](./rest-get-publisher-message-events)     | Fetch all message events                     |
| GET    | [api.copernica.com/v2/publisher/template/$id/events](./rest-get-publisher-template-events)   | Fetch all template events                    |

## Marketing Suite Mailings

The table below contains all API calls related to Marketing Suite templates 
and emailings.

| Type   | Address                                                                                      | Description                                  |
|--------|----------------------------------------------------------------------------------------------|----------------------------------------------|
| GET    | [api.copernica.com/v2/ms/emailings](./rest-get-ms-emailings)                                 | Fetch all mailings                           |
| GET    | [api.copernica.com/v2/ms/message/$id](./rest-get-ms-message)                                 | Fetch the message information                |
| GET    | [api.copernica.com/v2/ms/message/$id/body](./rest-get-ms-message-body)                       | Fetch the message body                       |
| GET    | [api.copernica.com/v2/ms/message/$id/events](./rest-get-ms-message-events)                   | Fetch all message events                     |
| GET    | [api.copernica.com/v2/ms/template/$id/events](./rest-get-ms-template-events)                 | Fetch all template events                    |

## Datarequests

The result of data requests is stored for a while after completion. With the 
following methods you can retrieve the status and data of previously completed 
calls.

| Type   | Address                                                                                      | Description                                                 |
|--------|----------------------------------------------------------------------------------------------|-------------------------------------------------------------|
| POST   | [api.copernica.com/v2/email/$email/datarequest](./rest-post-email-datarequest)               | Create a request for all data stored for an emailaddress    |
| POST   | [api.copernica.com/v2/profile/$id/datarequest](./rest-post-profile-datarequest)              | Create a request for all data stored for a profile          |
| POST   | [api.copernica.com/v2/subprofile/$id/datarequest](./rest-post-subprofile-datarequest)        | Create a request for all data stored for a subprofile       |
| GET    | [api.copernica.com/v2/datarequest/$id/data](./rest-get-datarequest-data)                     | Fetch the data of a previous data request                   |
| GET    | [api.copernica.com/v2/datarequest/$id/status](./rest-get-datarequest-status)                 | Fetch the status of a previous data request                 |

## Logfiles & Statistics

Copernica keeps extensive logfiles about everything that happens to your 
emails after sending, including [events](./-rest-get-events). You can 
find all calls related to logfiles and statistics 
in the table below.

| Type   | Address                                                                                      | Description                                      |
|--------|----------------------------------------------------------------------------------------------|--------------------------------------------------|
| GET    | [api.copernica.com/v2/tags/$tag/events](./rest-get-tags-events)                              | Fetch all events for a tag                       |
| GET    | [api.copernica.com/v2/ms/message/$id/events](./rest-get-ms-message-events)                   | Fetch all MS message events                      |
| GET    | [api.copernica.com/v2/ms/template/$id/events](./rest-get-ms-template-events)                 | Fetch all MS template events                     |
| GET    | [api.copernica.com/v2/publisher/document/$id/events](./rest-get-publisher-document-events)   | Fetch all Publisher document events              |
| GET    | [api.copernica.com/v2/publisher/message/$id/events](./rest-get-publisher-message-events)     | Fetch all Publisher message events               |
| GET    | [api.copernica.com/v2/publisher/template/$id/events](./rest-get-publisher-template-events)   | Fetch all Publisher template events              |
| GET    | [api.copernica.com/v2/profile/$id/events](./rest-get-profile-events)                         | Fetch all profile events                         |
| GET    | [api.copernica.com/v2/subprofile/$id/events](./rest-get-subprofile-events)                   | Fetch all subprofile events                      |
| GET    | [api.copernica.com/v2/email/$email/events](./rest-get-email-events)                          | Retrieve all events related to the email address |
| GET    | [api.copernica.com/v2/logfiles](./rest-get-logfiles)                                         | Fetch logfiles                                   |
| GET    | [api.copernica.com/v2/logfiles](./rest-get-logfiles-names)                                   | Fetch all logfile names                          |
| GET    | [api.copernica.com/v2/logfiles](./rest-get-logfiles-csv)                                     | Fetch logfiles in CSV format                     |
| GET    | [api.copernica.com/v2/logfiles](./rest-get-logfiles-json)                                    | Fetch logfiles in JSON format                    |
| GET    | [api.copernica.com/v2/logfiles](./rest-get-logfiles-xml)                                     | Fetch logfiles in XML format                     |
