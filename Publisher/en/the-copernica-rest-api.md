-   [Getting started with Copernica REST
    API](./getting-started-with-the-copernica-rest-api.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.md)
-   [Copernica OAuth 2.0 procedure](./setting-up-copernica-rest-service.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.md)
-   [REST API Parameters](./rest-api-parameters.md)

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
| [/databases](./databases.md) | GET, POST |
| [/database/$databaseID](./database-information.md) | GET, POST |
| [/database/$databaseID/fields](./database-fields.md) | GET, POST |
| [/database/$databaseID/collections](./database-collections.md) | GET, POST |
| [/database/$databaseID/profiles](./database-profiles.md) | GET, POST, PUT |
| [/database/$databaseID/interests](./database-interests.md) | GET, POST |
| [/database/$databaseID/unsubscribe](./database-unsubscribe-behaviour.md) | GET, POST |
| [/database/$databaseID/callbacks](./database-callbacks.md) | GET, POST |

| Collection methods | Methods |
| --- | --- |
| [/collection/$collectionID](./rest-collection-information.md) | GET |
| [/collection/$collectionID/fields](./collection-fields.md) | GET |
| [/collection/$collectionID/field](./collection-fields.md) | GET, POST |
| [/collection/$collectionID/subprofiles](./collection-subprofiles.md) | GET |
| [/collection/$collectionID/unsubscribe](./collection-unsubscribe-behaviour.md) | POST, GET |
| [/collection/$collectionID/callbacks](./collection-callbacks.md) | POST, GET |

| Profile methods | Methods |
| --- | --- |
| [/profile/$profileID](./profile-request.md) | GET, DELETE |
| [/profile/$profileID/fields](./profile-fields.md) | GET, POST |
| [/profile/$profileID/interests](./profile-interests.md) | GET, POST, PUT |
| [/profile/$profileID/changeinterests](./profile-change-interests.md) | POST |
| [/profile/$profileID/subprofiles/$collectionID](./profile-collection-subprofiles.md) | GET, POST |

| Subprofile methods | Methods |
| --- | --- |
| [/subprofile/$subprofileID](./subprofile-request.md) | GET, DELETE |
| [/subprofile/$subprofileID/fields](./subprofile-fields.md) | GET, POST |

| Callback methods | Methods |
| --- | --- |
| [callback/$callbackID](./callback-information.md) | GET, POST, DELETE |

| Emailing methods | Methods |
| --- | --- |
| [/emailings](./emailings.md) | GET |
| [/emailing/$emailingID](./emailing.md) | GET |
| [/emailing/$emailingID/abuses](./emailing-abuses.md) | GET |
| [/emailing/$emailingID/clicks](./emailing-clicks.md) | GET |
| [/emailing/$emailingID/deliveries](./emailing-deliveries.md) | GET |
| [/emailing/$emailingID/destinations](./emailing-destinations.md) | GET |
| [/emailing/$emailingID/errors](./emailing-errors.md) | GET |
| [/emailing/$emailingID/impressions](./emailing-impressions.md) | GET |
| [/emailing/$emailingID/snapshot](./emailing-snapshot.md) | GET |
| [/emailing/$emailingID/statistics](./emailing-statistics.md) | GET |
| [/emailing/$emailingID/unsubscribes](./emailing-unsubscribes.md) | GET |

| Emailing destination methods | Methods |
| --- | --- |
| [/emailingdestination/$destinationID](./emailingdestination.md) | GET |
| [/emailingdestination/$destinationID/abuses](./emailingdestination-abuses.md) | GET |
| [/emailingdestination/$destinationID/clicks](./emailingdestination-clicks.md) | GET |
| /emailingdestination/$destinationID/deliveries | GET |
| [/emailingdestination/$destinationID/errors](./emailingdestination-errors.md) | GET |
| [/emailingdestination/$destinationID/impressions](./emailingdestination-impressions.md) | GET |
| [/emailingdestination/$destinationID/unsubscribes](./emailingdestination-unsubscribes.md) | GET |

| Overall emailing methods | Methods |
| --- | --- |
| [/abuses](./abuses.md) | GET |
| [/clicks](./clicks.md) | GET |
| [/deliveries](./deliveries.md) | GET |
| [/errors](./errors.md) | GET |
| [/impressions](./impressions.md) | GET |
| [/unsubscribes](./unsubscribes.md) | GET |

| View/selection methods | Methods |
| --- | --- |
| [-- Views explained --](./views-explained.md) | |
| [/database/$databaseID/views](./database-views.md) | GET, POST |
| [/view/$viewID](./view.md) | GET, PUT |
| [/view/$viewID/rules](./rules.md) | GET, POST |
| [/rule/$ruleID](./rule.md) | PUT |
| [/rule/$ruleID/conditions](./conditions.md) | GET, POST |
| [/condition/$conditionType/$conditionID](./condition.md) | PUT |
| [/collection/$collectionID/miniviews](./collection-miniviews.md) | GET |
| [/miniview/$miniviewID](./miniview.md) | GET, PUT |
| [/miniview/$miniviewID/rules](./minirules.md) | GET, POST\* |
| [/minirule/$miniruleID](./minirule.md) | GET, PUT |
