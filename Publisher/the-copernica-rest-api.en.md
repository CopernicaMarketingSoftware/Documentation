-   [Getting started with Copernica REST
    API](./getting-started-with-the-copernica-rest-api.en.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.en.md)
-   [Copernica OAuth 2.0 procedure](./setting-up-copernica-rest-service.en.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.en.md)
-   [REST API Parameters](./rest-api-parameters.en.md)

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
| [/databases](./databases.en.md) | GET, POST |
| [/database/$databaseID](./database-information.en.md) | GET, POST |
| [/database/$databaseID/fields](./database-fields.en.md) | GET, POST |
| [/database/$databaseID/collections](./database-collections.en.md) | GET, POST |
| [/database/$databaseID/profiles](./database-profiles.en.md) | GET, POST, PUT |
| [/database/$databaseID/interests](./database-interests.en.md) | GET, POST |
| [/database/$databaseID/unsubscribe](./database-unsubscribe-behaviour.en.md) | GET, POST |
| [/database/$databaseID/callbacks](./database-callbacks.en.md) | GET, POST |

| Collection methods | Methods |
| --- | --- |
| [/collection/$collectionID](./rest-collection-information.en.md) | GET |
| [/collection/$collectionID/fields](./collection-fields.en.md) | GET |
| [/collection/$collectionID/field](./collection-fields.en.md) | GET, POST |
| [/collection/$collectionID/subprofiles](./collection-subprofiles.en.md) | GET |
| [/collection/$collectionID/unsubscribe](./collection-unsubscribe-behaviour.en.md) | POST, GET |
| [/collection/$collectionID/callbacks](./collection-callbacks.en.md) | POST, GET |

| Profile methods | Methods |
| --- | --- |
| [/profile/$profileID](./profile-request.en.md) | GET, DELETE |
| [/profile/$profileID/fields](./profile-fields.en.md) | GET, POST |
| [/profile/$profileID/interests](./profile-interests.en.md) | GET, POST, PUT |
| [/profile/$profileID/changeinterests](./profile-change-interests.en.md) | POST |
| [/profile/$profileID/subprofiles/$collectionID](./profile-collection-subprofiles.en.md) | GET, POST |

| Subprofile methods | Methods |
| --- | --- |
| [/subprofile/$subprofileID](./subprofile-request.en.md) | GET, DELETE |
| [/subprofile/$subprofileID/fields](./subprofile-fields.en.md) | GET, POST |

| Callback methods | Methods |
| --- | --- |
| [callback/$callbackID](./callback-information.en.md) | GET, POST, DELETE |

| Emailing methods | Methods |
| --- | --- |
| [/emailings](./emailings.en.md) | GET |
| [/emailing/$emailingID](./emailing.en.md) | GET |
| [/emailing/$emailingID/abuses](./emailing-abuses.en.md) | GET |
| [/emailing/$emailingID/clicks](./emailing-clicks.en.md) | GET |
| [/emailing/$emailingID/deliveries](./emailing-deliveries.en.md) | GET |
| [/emailing/$emailingID/destinations](./emailing-destinations.en.md) | GET |
| [/emailing/$emailingID/errors](./emailing-errors.en.md) | GET |
| [/emailing/$emailingID/impressions](./emailing-impressions.en.md) | GET |
| [/emailing/$emailingID/snapshot](./emailing-snapshot.en.md) | GET |
| [/emailing/$emailingID/statistics](./emailing-statistics.en.md) | GET |
| [/emailing/$emailingID/unsubscribes](./emailing-unsubscribes.en.md) | GET |

| Emailing destination methods | Methods |
| --- | --- |
| [/emailingdestination/$destinationID](./emailingdestination.en.md) | GET |
| [/emailingdestination/$destinationID/abuses](./emailingdestination-abuses.en.md) | GET |
| [/emailingdestination/$destinationID/clicks](./emailingdestination-clicks.en.md) | GET |
| /emailingdestination/$destinationID/deliveries | GET |
| [/emailingdestination/$destinationID/errors](./emailingdestination-errors.en.md) | GET |
| [/emailingdestination/$destinationID/impressions](./emailingdestination-impressions.en.md) | GET |
| [/emailingdestination/$destinationID/unsubscribes](./emailingdestination-unsubscribes.en.md) | GET |

| Overall emailing methods | Methods |
| --- | --- |
| [/abuses](./abuses.en.md) | GET |
| [/clicks](./clicks.en.md) | GET |
| [/deliveries](./deliveries.en.md) | GET |
| [/errors](./errors.en.md) | GET |
| [/impressions](./impressions.en.md) | GET |
| [/unsubscribes](./unsubscribes.en.md) | GET |

| View/selection methods | Methods |
| --- | --- |
| [-- Views explained --](./views-explained.en.md) | |
| [/database/$databaseID/views](./database-views.en.md) | GET, POST |
| [/view/$viewID](./view.en.md) | GET, PUT |
| [/view/$viewID/rules](./rules.en.md) | GET, POST |
| [/rule/$ruleID](./rule.en.md) | PUT |
| [/rule/$ruleID/conditions](./conditions.en.md) | GET, POST |
| [/condition/$conditionType/$conditionID](./condition.en.md) | PUT |
| [/collection/$collectionID/miniviews](./collection-miniviews.en.md) | GET |
| [/miniview/$miniviewID](./miniview.en.md) | GET, PUT |
| [/miniview/$miniviewID/rules](./minirules.en.md) | GET, POST\* |
| [/minirule/$miniruleID](./%20minirule.en.md) | GET, PUT |
