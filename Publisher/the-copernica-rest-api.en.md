-   [Getting started with Copernica REST
    API](getting-started-with-the-copernica-rest-api)
-   [Register your app and obtain your access
    token](register-your-app-on-copernica-com)
-   [Copernica OAuth 2.0 procedure](setting-up-copernica-rest-service)
-   [PHP example scripts for POST, GET and DELETE
    requests](example-get-post-and-delete-requests)
-   [REST API Parameters](rest-api-parameters)

API Resources
-------------

In this overview you will find all the REST service endpoints provided
by the Copernica REST API. The API is still being developed and
frequently updated. Therefore often take a look at this page as new
updates follow on a regular basis.

Methods with an asterisk (\*) have been implemented in the API, but have
not yet been documented.

| Database methods | Methods |
| --- | --- |
| [/databases](databases) | GET, POST |
| [/database/\$databaseID](database-information) | GET, POST |
| [/database/\$databaseID/fields](database-fields) | GET, POST |
| [/database/\$databaseID/collections](database-collections) | GET, POST |
| [/database/\$databaseID/profiles](database-profiles) | GET, POST, PUT |
| [/database/\$databaseID/interests](database-interests) | GET, POST |
| [/database/\$databaseID/unsubscribe](database-unsubscribe-behaviour) | GET, POST |
| [/database/\$databaseID/callbacks](database-callbacks) | GET, POST |

| Collection methods | Methods |
| --- | --- |
| [/collection/\$collectionID](rest-collection-information) | GET |
| [/collection/\$collectionID/fields](collection-fields) | GET |
| [/collection/\$collectionID/field](collection-fields) | GET, POST |
| [/collection/\$collectionID/subprofiles](collection-subprofiles) | GET |
| [/collection/\$collectionID/unsubscribe](collection-unsubscribe-behaviour) | POST, GET |
| [/collection/\$collectionID/callbacks](collection-callbacks) | POST, GET |

| Profile methods | Methods |
| --- | --- |
| [/profile/\$profileID](profile-request) | GET, DELETE |
| [/profile/\$profileID/fields](profile-fields) | GET, POST |
| [/profile/\$profileID/interests](profile-interests) | GET, POST, PUT |
| [/profile/\$profileID/changeinterests](profile-change-interests) | POST |
| [/profile/\$profileID/subprofiles/\$collectionID](profile-collection-subprofiles) | GET, POST |

| Subprofile methods | Methods |
| --- | --- |
| [/subprofile/\$subprofileID](subprofile-request) | GET, DELETE |
| [/subprofile/\$subprofileID/fields](subprofile-fields) | GET, POST |

| Callback methods | Methods |
| --- | --- |
| [callback/\$callbackID](callback-information) | GET, POST, DELETE |

| Emailing methods | Methods |
| --- | --- |
| [/emailings](emailings) | GET |
| [/emailing/\$emailingID](emailing) | GET |
| [/emailing/\$emailingID/abuses](emailing-abuses) | GET |
| [/emailing/\$emailingID/clicks](emailing-clicks) | GET |
| [/emailing/\$emailingID/deliveries](emailing-deliveries) | GET |
| [/emailing/\$emailingID/destinations](emailing-destinations) | GET |
| [/emailing/\$emailingID/errors](emailing-errors) | GET |
| [/emailing/\$emailingID/impressions](emailing-impressions) | GET |
| [/emailing/\$emailingID/snapshot](emailing-snapshot) | GET |
| [/emailing/\$emailingID/statistics](emailing-statistics) | GET |
| [/emailing/\$emailingID/unsubscribes](emailing-unsubscribes) | GET |

| Emailing destination methods | Methods |
| --- | --- |
| [/emailingdestination/\$destinationID](emailingdestination) | GET |
| [/emailingdestination/\$destinationID/abuses](emailingdestination-abuses) | GET |
| [/emailingdestination/\$destinationID/clicks](emailingdestination-clicks) | GET |
| /emailingdestination/\$destinationID/deliveries | GET |
| [/emailingdestination/\$destinationID/errors](emailingdestination-errors) | GET |
| [/emailingdestination/\$destinationID/impressions](emailingdestination-impressions) | GET |
| [/emailingdestination/\$destinationID/unsubscribes](emailingdestination-unsubscribes) | GET |

| Overall emailing methods | Methods |
| --- | --- |
| [/abuses](abuses) | GET |
| [/clicks](clicks) | GET |
| [/deliveries](deliveries) | GET |
| [/errors](errors) | GET |
| [/impressions](impressions) | GET |
| [/unsubscribes](unsubscribes) | GET |

| View/selection methods | Methods |
| --- | --- |
| [-- Views explained --](views-explained) | |
| [/database/\$databaseID/views](database-views) | GET, POST |
| [/view/\$viewID](view) | GET, PUT |
| [/view/\$viewID/rules](rules) | GET, POST |
| [/rule/\$ruleID](rule) | PUT |
| [/rule/\$ruleID/conditions](conditions) | GET, POST |
| [/condition/\$conditionType/\$conditionID](condition) | PUT |
| [/collection/\$collectionID/miniviews](collection-miniviews) | GET |
| [/miniview/\$miniviewID](miniview) | GET, PUT |
| [/miniview/\$miniviewID/rules](minirules) | GET, POST\* |
| [/minirule/\$miniruleID](%20minirule) | GET, PUT |