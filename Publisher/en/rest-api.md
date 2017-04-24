# The REST API

The REST API allows you to retrieve and update the data that is stored inside
Copernica from out of your own website or app. You can write your own scripts 
that send requests and instructions to our servers to fetch this data or
to update it. You can use this API to automatically synchronize the data in 
Copernica with your own system, without any human interference.

* [Introduction: the REST api in a nutshell](rest-introduction)
* [Send and receive HTTP requests](rest-requests)
* [Fancy OAuth2 links](rest-oauth)
* [Setting up Copernica REST service](./setting-up-copernica-rest-service)

## REST API: method reference

The following table lists all methods that are accessible through HTTP GET, POST, PUT en DELETE.

### **GET**

GET methods are used to fetch data. The following GET methods are available:

| Method    | Address                                                                                                   | Description                             |       
|-----------|-----------------------------------------------------------------------------------------------------------|-----------------------------------------|
| GET       | [api.copernica.com/v1/identity](./rest-get-identity)                                                      | Fetch API access token identity         |     
| GET       | [api.copernica.com/v1/databases](./rest-get-databases)                                                    | Fetch databases                         |     
| GET       | [api.copernica.com/v1/database/$id](./rest-get-database)                                                  | Fetch database settings                 |     
| GET       | [api.copernica.com/v1/database/$id/unsubscribe](./rest-get-database-unsubscribe)                          | Fetch unsubscribe behavior              |     
| GET       | [api.copernica.com/v1/database/$id/fields](./rest-get-database-fields)                                    | Fetch database fields                   |     
| GET       | [api.copernica.com/v1/database/$id/interests](./rest-get-database-interests)                              | Fetch interests                         |     
| GET       | [api.copernica.com/v1/database/$id/collections](./rest-get-database-collections)                          | Fetch collections                       |     
| GET       | [api.copernica.com/v1/database/$id/profiles](./rest-get-database-profiles)                                | Fetch profiles                          |     
| GET       | [api.copernica.com/v1/database/$id/profileids](./rest-get-database-profileids)                            | Fetch profile identifiers               |     
| GET       | [api.copernica.com/v1/database/$id/views](./rest-get-database-views)                                      | Fetch selections                        |     
| GET       | [api.copernica.com/v1/view/$id](./rest-get-view)                                                          | Fetch selection data                    |     
| GET       | [api.copernica.com/v1/view/$id/profiles](./rest-get-view-profiles)                                        | Fetch profiles from selection           |     
| GET       | [api.copernica.com/v1/view/$id/profileids](./rest-get-view-profileids)                                    | Fetch profile identifiers               |     
| GET       | [api.copernica.com/v1/view/$id/rules](./rest-get-view-rules)                                              | Fetch selection rules                   |     
| GET       | [api.copernica.com/v1/view/$id/rule/$id](./rest-get-view-rule)                                            | Fetch selection rule                    |     
| GET       | [api.copernica.com/v1/view/$id/views](./rest-get-view-views)                                              | Fetch nested selections                 |     
| GET       | [api.copernica.com/v1/rule/$id](./rest-get-rule)                                                          | Fetch selection rule                    |     
| GET       | [api.copernica.com/v1/rule/$id/conditions](./rest-get-rule-conditions)                                    | Get selection conditions                |     
| GET       | [api.copernica.com/v1/profile/$id](./rest-get-profile)                                                    | Fetch profile data                      |     
| GET       | [api.copernica.com/v1/profile/$id/fields](./rest-get-profile-fields)                                      | Fetch profile fields                    |     
| GET       | [api.copernica.com/v1/profile/$id/interests](./rest-get-profile-interests)                                | Fetch profile interests                 |     
| GET       | [api.copernica.com/v1/profile/$id/subprofiles](./rest-get-profile-subprofiles)                            | Fetch subprofiles of a profile          |     
| GET       | [api.copernica.com/v1/collection/$id](./rest-get-collection)                                              | Fetch collection data                   |     
| GET       | [api.copernica.com/v1/collection/$id/fields](./rest-get-collection-fields)                                | Fetch collection fields                 |     
| GET       | [api.copernica.com/v1/collection/$id/miniviews](./rest-get-collection-miniviews)                          | Fetch miniviews                         |  	
| GET       | [api.copernica.com/v1/collection/$id/subprofiles](./rest-get-collection-subprofiles)                      | Fetch subprofiles from a collection     |     
| GET       | [api.copernica.com/v1/collection/$id/subprofileids](./rest-get-collection-subprofileids)                  | Fetch subprofile IDs from a collection  |      
| GET       | [api.copernica.com/v1/collection/$id/unsubscribe](./rest-get-collection-unsubscribe)                      | Fetch collection unsubscribe behavior   |     
| GET       | [api.copernica.com/v1/miniview/$id](./rest-get-miniview)                                                  | Fetch miniview data                     |	    
| GET       | [api.copernica.com/v1/miniview/$id/subprofiles](./rest-get-miniview-subprofiles)                          | Fetch subprofiles in a miniview         |	    
| GET       | [api.copernica.com/v1/miniview/$id/subprofileids](./rest-get-miniview-subprofileids)                      | Fetch subprofile identifiers            |     
| GET       | [api.copernica.com/v1/miniview/$id/rules](./rest-get-miniview-rules)                                      | Fetch miniview rules                    |	    
| GET       | [api.copernica.com/v1/miniview/$id/rule/$id](./rest-get-miniview-rule)                                    | Fetch miniview rule                     |	    
| GET       | [api.copernica.com/v1/minirule/$id](./rest-get-minirule)                                                  | Fetch miniselection rule                |     
| GET       | [api.copernica.com/v1/minirule/$id/conditions](./rest-get-minirule-conditions)                            | Fetch conditions for a miniselection    |     
| GET       | [api.copernica.com/v1/subprofile/$id](./rest-get-subprofile)                                              | Fetch subprofile data                   |     
| GET       | [api.copernica.com/v1/subprofile/$id/fields](./rest-get-subprofile-fields)                                | Fetch subprofile fields                 |     
| GET       | [api.copernica.com/v1/logfiles](./rest-get-logfiles)                                                      | Fetch all logfiles                      |     
| GET       | [api.copernica.com/v1/logfiles/$date](./rest-get-logfiles-names)					                        | Logfile names					          |     
| GET       | [api.copernica.com/v1/logfiles/$name](./rest-get-logfiles-csv)                                            | Download logfile in CSV format          |     
| GET       | [api.copernica.com/v1/logfiles/$name/json](./rest-get-logfiles-json)                                      | Download logfile in JSON format         |     
| GET       | [api.copernica.com/v1/logfiles/$name/xml](./rest-get-logfiles-xml)                                        | Download logfile in XML format          |
| GET       | [api.copernica.com/v1/email/$addres/events](./rest-get-email-events)                                      | Fetch email events                      |
| GET       | [api.copernica.com/v1/message/$id/events](./rest-get-message-events)                                      | Fetch MS message events                 |
| GET       | [api.copernica.com/v1/old/message/$id/events](./rest-get-old-message-events)                              | Fetch Publisher message events          |
| GET       | [api.copernica.com/v1/old/document/$id/events](./rest-get-old-document-events)                            | Fetch Publisher document events         |
| GET       | [api.copernica.com/v1/profile/$id/events](./rest-get-profile-events)                                      | Fetch profile events                    |
| GET       | [api.copernica.com/v1/subprofile/$id/events](./rest-get-subprofile-events)                                | Fetch subprofile events                 |
| GET       | [api.copernica.com/v1/tags/$tag/events](./rest-get-tags-events)                                           | Fetch tag events                        |
| GET       | [api.copernica.com/v1/template/$id/events](./rest-get-template-events)                                    | Fetch MS template events                |
| GET       | [api.copernica.com/v1/old/template/$id/events](./rest-get-old-template-events)                            | Fetch Publisher template events         |

See also the [general article on events](./rest-get-events).

### **PUT & POST**

PUT and POST methodes are used to create and edit data. They are often 
very similar. If you can not find a POST method of what you are looking 
for there might be a PUT method to do it. It also works the other way around. 
The following PUT and POST methods are available:

| Method    | Address                                                                                                   | Description                             |       
|-----------|-----------------------------------------------------------------------------------------------------------|-----------------------------------------|
| POST      | [api.copernica.com/v1/databases](./rest-post-databases)                                                   | Create a new database                   |     
| PUT       | [api.copernica.com/v1/database/$id](./rest-put-database)                                                  | Modify database settings                |     
| PUT       | [api.copernica.com/v1/database/$id/unsubscribe](./rest-put-database-unsubscribe)                          | Set unsubscribe behavior                |     
| POST      | [api.copernica.com/v1/database/$id/fields](./rest-post-database-fields)                                   | Create database field                   |     
| PUT       | [api.copernica.com/v1/database/$id/field/$id](./rest-put-database-field)                                  | Edit database field                     |     
| POST      | [api.copernica.com/v1/database/$id/interests](./rest-post-database-interests)                             | Create interest                         |     
| POST      | [api.copernica.com/v1/database/$id/collections](./rest-post-database-collections)                         | Create collection                       |     
| POST      | [api.copernica.com/v1/database/$id/profiles](./rest-post-database-profiles)                               | Create new profile                      |     
| PUT       | [api.copernica.com/v1/database/$id/profiles](./rest-put-database-profiles)                                | Edit multiple profiles                  |     
| POST      | [api.copernica.com/v1/database/$id/views](./rest-post-database-views)                                     | Create new selection                    |     
| PUT       | [api.copernica.com/v1/view/$id](./rest-put-view)                                                          | Update selection data                   |     
| POST      | [api.copernica.com/v1/view/$id/rules](./rest-post-view-rules)                                             | Create selection rules                  |     
| POST      | [api.copernica.com/v1/view/$id/views](./rest-post-view-views)                                             | Create a nested selection               |     
| PUT       | [api.copernica.com/v1/rule/$id](./rest-put-rule)                                                          | Edit selection rule                     |     
| POST      | [api.copernica.com/v1/rule/$id/conditions](./rest-post-rule-conditions)                                   | Create a selection condition            |     
| PUT       | [api.copernica.com/v1/profile/$id](./rest-put-profile)                                                    | Edit profile data                       |     
| PUT       | [api.copernica.com/v1/profile/$id/fields](./rest-put-profile-fields)                                      | Edit profile fields                     |     
| POST      | [api.copernica.com/v1/profile/$id/interests](./rest-post-profile-interests)                               | Add interests to profile                |     
| PUT       | [api.copernica.com/v1/profile/$id/interests](./rest-put-profile-interests)                                | Edit profile interests                  |     
| POST      | [api.copernica.com/v1/profile/$id/subprofiles](./rest-post-profile-subprofiles)                           | Create subprofile                       |     
| POST      | [api.copernica.com/v1/collection/$id/fields](./rest-post-collection-fields)                               | Create collection field                 |     
| PUT       | [api.copernica/com/v1/collection/$id/field/$id](./rest-put-collection-field)                              | Edit collection field                   |     
| PUT       | [api.copernica.com/v1/collection/$id](./rest-put-collection)                                              | Edit collection data                    |     
| POST      | [api.copernica.com/v1/collection/$id/miniviews](./rest-post-collection-miniviews)                         | Create miniview                         |  	
| PUT       | [api.copernica.com/v1/collection/$id/unsubscribe](./rest-put-collection-unsubscribe)                      | Update collection unsubscribe behavior  |
| PUT       | [api.copernica.com/v1/miniview/$id](./rest-put-miniview)                                                  | Update miniview data                    |	         
| POST      | [api.copernica.com/v1/miniview/$id/rules](./rest-post-miniview-rules)                                     | Create miniview rule                    |	    
| PUT       | [api.copernica.com/v1/minirule/$id](./rest-put-minirule)                                                  | Edit miniselection rule                 |     
| POST      | [api.copernica.com/v1/minirule/$id/conditions](./rest-post-minirule-conditions)                           | Create condition for a miniselection    |     

### **DELETE**

DELETE methods are used to delete data. This is permanent, so always be 
double check your calls and be careful. The following DELETE methods are 
available:

| Method    | Address                                                                                                   | Description                             |       
|-----------|-----------------------------------------------------------------------------------------------------------|-----------------------------------------|
| DELETE    | [api.copernica.com/v1/database/$id](./rest-delete-database)                                               | Remove a database                       |     
| DELETE    | [api.copernica.com/v1/database/$id/field/$id](./rest-delete-database-field)                               | Remove database field                   |     
| DELETE    | [api.copernica.com/v1/view/$id](./rest-delete-view)                                                       | Remove selection                        |     
| DELETE    | [api.copernica.com/v1/rule/$id](./rest-delete-rule)                                                       | Remove selection rule                   |     
| DELETE    | [api.copernica.com/v1/profile/$id](./rest-delete-profile)                                                 | Remove profile                          |     
| DELETE    | [api.copernica.com/v1/collection/$id/field/$id](./rest-delete-collection-field)                           | Remove collection field                 |     
| DELETE    | [api.copernica.com/v1/miniview/$id](./rest-delete-miniview)                                               | Remove miniview                         |	    
| DELETE    | [api.copernica.com/v1/minirule/$id](./rest-delete-minirule)                                               | Remove miniselection rule               |     
