# The REST API

The REST API allows you to retrieve and update the data that is stored inside
Copernica from out of your own website or app. You can write your own scripts 
that send requests and instructions to our servers to fetch this data or
to update it. You can use this API to automatically synchronize the data in 
Copernica with your own system, without any human interference.

* [Introduction: the REST api in a nutshell](rest-introduction)
* [Send and receive HTTP requests](rest-requests)
* [Fancy OAuth2 links](rest-oauth)

## REST API: method reference

The following table lists all methods that are accessible through HTTP GET, POST, PUT en DELETE:

| Methode   | Adres                                                                                                 | Omschrijving                                  |
| --------- | ----------------------------------------------------------------------------------------------------- | --------------------------------------------- |
| GET       | [api.copernica.com/identity](./rest-get-identity)                                                     | Fetch API access token identity               |
| GET       | [api.copernica.com/databases](./rest-get-databases)                                                   | Fetch databases                               |
| POST      | [api.copernica.com/databases](./rest-post-databases)                                                  | Create a new database                         |
| GET       | [api.copernica.com/database/$id](./rest-get-database)                                                 | Fetch database settings                       |
| PUT       | [api.copernica.com/database/$id](./rest-put-database)                                                 | Modify database settings                      |
| DELETE    | [api.copernica.com/database/$id](./rest-delete-database)                                              | Remove a database                             |
| GET       | [api.copernica.com/database/$id/unsubscribe](./rest-get-database-unsubscribe)                         | Fetch unsubscribe behavior                    |
| PUT       | [api.copernica.com/database/$id/unsubscribe](./rest-put-database-unsubscribe)                         | Set unsubscribe behavior                      |
| GET       | [api.copernica.com/database/$id/fields](./rest-get-database-fields)                                   | Fetch database fields                         |
| POST      | [api.copernica.com/database/$id/fields](./rest-post-database-fields)                                  | Create database field                         |
| PUT       | [api.copernica.com/database/$id/field/$id](./rest-put-database-field)                                 | Edit database field                           |
| DELETE    | [api.copernica.com/database/$id/field/$id](./rest-delete-database-field)                              | Remove database field                         |
| GET       | [api.copernica.com/database/$id/interests](./rest-get-database-interests)                             | Fetch interests                               |
| POST      | [api.copernica.com/database/$id/interests](./rest-post-database-interests)                            | Create interest                               |
| GET       | [api.copernica.com/database/$id/collections](./rest-get-database-collections)                         | Fetch collections                             |
| POST      | [api.copernica.com/database/$id/collections](./rest-post-database-collections)                        | Create collection                             |
| GET       | [api.copernica.com/database/$id/profiles](./rest-get-database-profiles)                               | Fetch profiles                                |
| POST      | [api.copernica.com/database/$id/profiles](./rest-post-database-profiles)                              | Create new profile                            |
| PUT       | [api.copernica.com/database/$id/profiles](./rest-put-database-profiles)                               | Edit multiple profiles                        |
| GET       | [api.copernica.com/database/$id/profileids](./rest-get-database-profileids)                           | Fetch profile identifiers                     |
| GET       | [api.copernica.com/database/$id/views](./rest-get-database-views)                                     | Fetch selections                              |
| POST      | [api.copernica.com/database/$id/views](./rest-post-database-views)                                    | Create new selection                          |
| GET       | [api.copernica.com/view/$id](./rest-get-view)                                                         | Fetch selection data                          |
| PUT       | [api.copernica.com/view/$id](./rest-put-view)                                                         | Update selection data                         |
| DELETE    | [api.copernica.com/view/$id](./rest-delete-view)                                                      | Remove selection                              |
| GET       | [api.copernica.com/view/$id/profiles](./rest-get-view-profiles)                                       | Fetch profiles from selection                 |
| GET       | [api.copernica.com/view/$id/profileids](./rest-get-view-profileids)                                   | Fetch profile identifiers                     |
| GET       | [api.copernica.com/view/$id/rules](./rest-get-view-rules)                                             | Fetch selection rules                         |
| POST      | [api.copernica.com/view/$id/rules](./rest-post-view-rules)                                            | Create selection rules                        |
| GET       | [api.copernica.com/view/$id/rule/$id](./rest-get-view-rule)                                           | Fetch selection rule                          |
| GET       | [api.copernica.com/view/$id/views](./rest-get-view-views)                                             | Fetch nested selections                       |
| POST      | [api.copernica.com/view/$id/views](./rest-post-view-views)                                            | Create a nested selection                     |
| GET       | [api.copernica.com/rule/$id](./rest-get-rule)                                                         | Fetch selection rule                          |
| PUT       | [api.copernica.com/rule/$id](./rest-put-rule)                                                         | Edit selection rule                           |
| DELETE    | [api.copernica.com/rule/$id](./rest-delete-rule)                                                      | Remove selection rule                         |
| GET       | [api.copernica.com/rule/$id/conditions](./rest-get-rule-conditions)                                   | Get selection conditions                      |
| POST      | [api.copernica.com/rule/$id/conditions](./rest-post-rule-conditions)                                  | Create a selection condition                  |
| GET       | [api.copernica.com/profile/$id](./rest-get-profile)                                                   | Fetch profile data                            |
| PUT       | [api.copernica.com/profile/$id](./rest-put-profile)                                                   | Edit profile data                             |
| DELETE    | [api.copernica.com/profile/$id](./rest-delete-profile)                                                | Remove profile                                |
| GET       | [api.copernica.com/profile/$id/fields](./rest-get-profile-fields)                                     | Fetch profile fields                          |
| PUT       | [api.copernica.com/profile/$id/fields](./rest-put-profile-fields)                                     | Edit profile fields                           |
| GET       | [api.copernica.com/profile/$id/interests](./rest-get-profile-interests)                               | Fetch profile interests                       |
| POST      | [api.copernica.com/profile/$id/interests](./rest-post-profile-interests)                              | Add interests to profile                      |
| PUT       | [api.copernica.com/profile/$id/interests](./rest-put-profile-interests)                               | Overwrite profile interests                   |
| GET       | [api.copernica.com/profile/$id/subprofiles](./rest-get-profile-subprofiles)                           | Fetch subprofiles of a profile                |
| POST      | [api.copernica.com/profile/$id/subprofiles](./rest-post-profile-subprofiles)                          | Create subprofile                             |
| GET       | [api.copernica.com/collection/$id](./rest-get-collection)                                             | Fetch collection data                         |
| PUT       | [api.copernica.com/collection/$id](./rest-put-collection)                                             | Edit collection data                          |
| GET       | [api.copernica.com/collection/$id/fields](./rest-get-collection-fields)                               | Fetch collection fields                       |
| POST      | [api.copernica.com/collection/$id/fields](./rest-post-collection-fields)                              | Create collection field                       |
| PUT       | [api.copernica/com/collection/$id/field/$id](./rest-put-collection-field)                             | Edit colection field                          |
| DELETE    | [api.copernica.com/collection/$id/field/$id](./rest-delete-collection-field)                          | Remove collection field                       |
| GET       | [api.copernica.com/collection/$id/miniviews](./rest-get-collection-miniviews)                         | Fetch miniselections                          |
| POST      | [api.copernica.com/collection/$id/miniviews](./rest-post-collection-miniviews)                        | Create miniselection                          |
| GET       | [api.copernica.com/collection/$id/subprofiles](./rest-get-collection-subprofiles)                     | Fetch subprofiles from a collection           |
| GET       | [api.copernica.com/collection/$id/subprofileids](./rest-get-collection-subprofileids)                 | Fetch subprofile IDs from a collection        |
| GET       | [api.copernica.com/collection/$id/unsubscribe](./rest-get-collection-unsubscribe)                     | Fetch collection unsubscribe behavior         |
| PUT       | [api.copernica.com/collection/$id/unsubscribe](./rest-put-collection-unsubscribe)                     | Update collection unsubscribe behavior        |
| GET       | [api.copernica.com/miniview/$id](./rest-get-miniview)                                                 | Fetch miniselection data                      |
| PUT       | [api.copernica.com/miniview/$id](./rest-put-miniview)                                                 | Update miniselection data                     |
| DELETE    | [api.copernica.com/miniview/$id](./rest-delete-miniview)                                              | Remove miniselection                          |
| GET       | [api.copernica.com/miniview/$id/subprofiles](./rest-get-miniview-subprofiles)                         | Fetch subprofiles in a miniselection          |
| GET       | [api.copernica.com/miniview/$id/subprofileids](./rest-get-miniview-subprofileids)                     | Fetch subprofile identifiers                  |
| GET       | [api.copernica.com/miniview/$id/rules](./rest-get-miniview-rules)                                     | Fetch miniselection rules                     |
| POST      | [api.copernica.com/miniview/$id/rules](./rest-post-miniview-rules)                                    | Create miniselection rule                     |
| GET       | [api.copernica.com/miniview/$id/rule/$id](./rest-get-miniview-rule)                                   | Fetch miniselection rule                      |
| GET       | [api.copernica.com/minirule/$id](./rest-get-minirule)                                                 | Fetch miniselection rule                      |
| PUT       | [api.copernica.com/minirule/$id](./rest-put-minirule)                                                 | Edit miniselection rule                       |
| DELETE    | [api.copernica.com/minirule/$id](./rest-delete-minirule)                                              | Remove miniselection rule                     |
| GET       | [api.copernica.com/minirule/$id/conditions](./rest-get-minirule-conditions)                           | Fetch conditions for a miniselection          |
| POST      | [api.copernica.com/minirule/$id/conditions](./rest-post-minirule-conditions)                          | Create condition for a miniselection          |
| GET       | [api.copernica.com/subprofile/$id](./rest-get-subprofile)                                             | Fetch subprofile data                         |
| GET       | [api.copernica.com/subprofile/$id/fields](./rest-get-subprofile-fields)                               | Fetch subprofile fields                       |
| GET       | [api.copernica.com/emailings](./rest-get-emailings)                                                   | Fetch emailings                               |
| GET       | [api.copernica.com/emailing/$id](./rest-get-emailing)                                                 | Fetch emailing settings                       |
| GET       | [api.copernica.com/emailing/$id/abuses](./rest-get-emailing-abuses)                                   | Fetch abuse reports per emailing              |
| GET       | [api.copernica.com/emailing/$id/clicks](./rest-get-emailing-clicks)                                   | Fetch clicks per emailing                     |
| GET       | [api.copernica.com/emailing/$id/deliveries](./rest-get-emailing-deliveries)                           | Fetch deliveries per emailing                 |
| GET       | [api.copernica.com/emailing/$id/destinations](./rest-get-emailing-destinations)                       | Fetch addressees per emailing                 |
| GET       | [api.copernica.com/emailing/$id/errors](./rest-get-emailing-errors)                                   | Fetch errors per emailing                     |
| GET       | [api.copernica.com/emailing/$id/impressions](./rest-get-emailing-impressions)                         | Fetch impressions (opens) per emailing        |
| GET       | [api.copernica.com/emailing/$id/snapshot](./rest-get-emailing-snapshot)                               | Fetch document snapshot of an emailing        |
| GET       | [api.copernica.com/emailing/$id/statistics](./rest-get-emailing-statistics)                           | Fetch stats per emailing                      |
| GET       | [api.copernica.com/emailing/$id/unsubscribes](./rest-get-emailing-unsubscribes)                       | Fetch unsubscribes per emailing               |
| GET       | [api.copernica.com/emailingtemplates](./rest-get-emailingtemplates)                                   | Fetch email templates                         |
| GET       | [api.copernica.com/emailingtemplate/$id](./rest-get-emailingtemplate)                                 | Fetch template data                           |
| GET       | [api.copernica.com/emailingtemplate/$id/documents](./rest-get-emailingtemplate-documents)             | Fetch documents linked to a template          |
| GET       | [api.copernica.com/emailingtemplate/$id/emailings](./rest-get-emailingtemplate-emailings)             | Fetch mailings based on a template            |
| GET       | [api.copernica.com/emailnigdocument/$id](./rest-get-emailingdocument)                                 | Fetch document settings                       |
| GET       | [api.copernica.com/emailingdocument/$id/emailings](./rest-get-emailingdocument-emailings)             | Fetch mailings based on a document            |
| GET       | [api.copernica.com/emailingdestination/$id](./rest-get-emailingdestination)                           | Fetch addressee settings                      |
| GET       | [api.copernica.com/emailingdestination/$id/abuses](./rest-get-emailingdestination-abuses)             | Fetch abuse reports per addressee             |
| GET       | [api.copernica.com/emailingdestination/$id/clicks](./rest-get-emailingdestination-clicks)             | Fetch clicks per addressee                    |
| GET       | [api.copernica.com/emailingdestination/$id/deliveries](./rest-get-emailingdestination-deliveries)     | Fetch deliveries per addressee                |
| GET       | [api.copernica.com/emailingdestination/$id/errors](./rest-get-emailingdestination-errors)             | Fetch errors per addressee                    |
| GET       | [api.copernica.com/emailingdestination/$id/fields](./rest-get-emailingdestination-fields)             | Fetch fields van een addressee                |
| GET       | [api.copernica.com/emailingdestination/$id/impressions](./rest-get-emailingdestination-impressions)   | Fetch impressions per addressee               |
| GET       | [api.copernica.com/emailingdestination/$id/unsubscribes](./rest-get-emailingdestination-unsubscribes) | Fetch unsubscribes per addressee              |
| GET       | [api.copernica.com/abuses](./rest-get-abuses)                                                         | Fetch all abuse repotrs for the account       |
| GET       | [api.copernica.com/clicks](./rest-get-clicks)                                                         | Fetch all clicks for the account              |
| GET       | [api.copernica.com/deliveries](./rest-get-deliveries)                                                 | Fetch all deliveries for the account          |
| GET       | [api.copernica.com/errors](./rest-get-errors)                                                         | Fetch all errors for the account              |
| GET       | [api.copernica.com/impressions](./rest-get-impressions)                                               | Fetch all impressions for the account         |
| GET       | [api.copernica.com/unsubscribes](./rest-get-unsubscribes)                                             | Fetch all unsubscribes for the account        |
| GET       | [api.copernica.com/logfiles](./rest-get-logfiles)                                                     | Fetch all logfiles                            |
| GET       | [api.copernica.com/logfiles/$name](./rest-get-logfiles-csv)                                           | Download logfile in CSV format                |
| GET       | [api.copernica.com/logfiles/$name/json](./rest-get-logfiles-json)                                     | Download logfile in JSON format               |
| GET       | [api.copernica.com/logfiles/$name/xml](./rest-get-logfiles-xml)                                       | Download logfile in XML format                |
