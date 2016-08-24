Getting started with Copernica REST API

Register your app and obtain your access token

Copernica OAuth 2.0 procedure

PHP example scripts for POST, GET and DELETE requests

REST API Parameters
API Resources

In this overview you will find all the REST service endpoints provided by the Copernica REST API. The API is still being developed and frequently updated. Therefore often take a look at this page as new updates follow on a regular basis.

Methods with an asterisk (*) have been implemented in the API, but have not yet been documented.
Database methods

Methods
/databases

GET, POST
/database/$databaseID

GET, POST
/database/$databaseID/fields

GET, POST
/database/$databaseID/collections

GET, POST
/database/$databaseID/profiles

GET, POST, PUT
/database/$databaseID/interests

GET, POST
/database/$databaseID/unsubscribe

GET, POST
/database/$databaseID/callbacks

GET, POST
Collection methods

Methods
/collection/$collectionID

GET
/collection/$collectionID/fields

GET
/collection/$collectionID/field

GET, POST
/collection/$collectionID/subprofiles

GET
/collection/$collectionID/unsubscribe

POST, GET
/collection/$collectionID/callbacks

POST, GET
Profile methods

Methods
/profile/$profileID

GET, DELETE
/profile/$profileID/fields

GET, POST
/profile/$profileID/interests

GET, POST, PUT
/profile/$profileID/changeinterests

POST
/profile/$profileID/subprofiles/$collectionID

GET, POST
Subprofile methods

Methods
/subprofile/$subprofileID

GET, DELETE
/subprofile/$subprofileID/fields

GET, POST
Callback methods

Methods
callback/$callbackID

GET, POST, DELETE
Emailing methods

Methods
/emailings

GET
/emailing/$emailingID

GET
/emailing/$emailingID/abuses

GET
/emailing/$emailingID/clicks

GET
/emailing/$emailingID/deliveries

GET
/emailing/$emailingID/destinations

GET
/emailing/$emailingID/errors

GET
/emailing/$emailingID/impressions

GET
/emailing/$emailingID/snapshot

GET
/emailing/$emailingID/statistics

GET
/emailing/$emailingID/unsubscribes

GET
Emailing destination methods

Methods
/emailingdestination/$destinationID

GET
/emailingdestination/$destinationID/abuses

GET
/emailingdestination/$destinationID/clicks

GET
/emailingdestination/$destinationID/deliveries

GET
/emailingdestination/$destinationID/errors

GET
/emailingdestination/$destinationID/impressions

GET
/emailingdestination/$destinationID/unsubscribes

GET
Overall emailing methods

Methods
/abuses

GET
/clicks

GET
/deliveries

GET
/errors

GET
/impressions

GET
/unsubscribes

GET
View/selection methods

Methods
-- Views explained --
/database/$databaseID/views

GET, POST
/view/$viewID

GET, PUT
/view/$viewID/rules

GET, POST
/rule/$ruleID

PUT
/rule/$ruleID/conditions

GET, POST
/condition/$conditionType/$conditionID

PUT
/collection/$collectionID/miniviews

GET
/miniview/$miniviewID

GET, PUT
/miniview/$miniviewID/rules

GET, POST*
/minirule/$miniruleID

GET, PUT