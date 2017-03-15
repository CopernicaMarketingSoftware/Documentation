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

Method    | Address                                                                                                   | Description                                   
----------|-----------------------------------------------------------------------------------------------------------|---------------------------------
GET       | [api.copernica.com/v1/identity](./rest-get-identity)                                                      | Fetch API access token identity               
GET       | [api.copernica.com/v1/databases](./rest-get-databases)                                                    | Fetch databases                               
POST      | [api.copernica.com/v1/databases](./rest-post-databases)                                                   | Create a new database                         
GET       | [api.copernica.com/v1/database/$id](./rest-get-database)                                                  | Fetch database settings                       
PUT       | [api.copernica.com/v1/database/$id](./rest-put-database)                                                  | Modify database settings                      
DELETE    | [api.copernica.com/v1/database/$id](./rest-delete-database)                                               | Remove a database                             
GET       | [api.copernica.com/v1/database/$id/unsubscribe](./rest-get-database-unsubscribe)                          | Fetch unsubscribe behavior                    
PUT       | [api.copernica.com/v1/database/$id/unsubscribe](./rest-put-database-unsubscribe)                          | Set unsubscribe behavior                      
GET       | [api.copernica.com/v1/database/$id/fields](./rest-get-database-fields)                                    | Fetch database fields                         
POST      | [api.copernica.com/v1/database/$id/fields](./rest-post-database-fields)                                   | Create database field                         
PUT       | [api.copernica.com/v1/database/$id/field/$id](./rest-put-database-field)                                  | Edit database field                           
DELETE    | [api.copernica.com/v1/database/$id/field/$id](./rest-delete-database-field)                               | Remove database field                         
GET       | [api.copernica.com/v1/database/$id/interests](./rest-get-database-interests)                              | Fetch interests                               
POST      | [api.copernica.com/v1/database/$id/interests](./rest-post-database-interests)                             | Create interest                               
GET       | [api.copernica.com/v1/database/$id/collections](./rest-get-database-collections)                          | Fetch collections                             
POST      | [api.copernica.com/v1/database/$id/collections](./rest-post-database-collections)                         | Create collection                             
GET       | [api.copernica.com/v1/database/$id/profiles](./rest-get-database-profiles)                                | Fetch profiles                                
POST      | [api.copernica.com/v1/database/$id/profiles](./rest-post-database-profiles)                               | Create new profile                            
PUT       | [api.copernica.com/v1/database/$id/profiles](./rest-put-database-profiles)                                | Edit multiple profiles                        
GET       | [api.copernica.com/v1/database/$id/profileids](./rest-get-database-profileids)                            | Fetch profile identifiers                     
GET       | [api.copernica.com/v1/database/$id/views](./rest-get-database-views)                                      | Fetch selections                              
POST      | [api.copernica.com/v1/database/$id/views](./rest-post-database-views)                                     | Create new selection                          
GET       | [api.copernica.com/v1/view/$id](./rest-get-view)                                                          | Fetch selection data                          
PUT       | [api.copernica.com/v1/view/$id](./rest-put-view)                                                          | Update selection data                         
DELETE    | [api.copernica.com/v1/view/$id](./rest-delete-view)                                                       | Remove selection                              
GET       | [api.copernica.com/v1/view/$id/profiles](./rest-get-view-profiles)                                        | Fetch profiles from selection                 
GET       | [api.copernica.com/v1/view/$id/profileids](./rest-get-view-profileids)                                    | Fetch profile identifiers                     
GET       | [api.copernica.com/v1/view/$id/rules](./rest-get-view-rules)                                              | Fetch selection rules                         
POST      | [api.copernica.com/v1/view/$id/rules](./rest-post-view-rules)                                             | Create selection rules                        
GET       | [api.copernica.com/v1/view/$id/rule/$id](./rest-get-view-rule)                                            | Fetch selection rule                          
GET       | [api.copernica.com/v1/view/$id/views](./rest-get-view-views)                                              | Fetch nested selections                       
POST      | [api.copernica.com/v1/view/$id/views](./rest-post-view-views)                                             | Create a nested selection                     
GET       | [api.copernica.com/v1/rule/$id](./rest-get-rule)                                                          | Fetch selection rule                          
PUT       | [api.copernica.com/v1/rule/$id](./rest-put-rule)                                                          | Edit selection rule                           
DELETE    | [api.copernica.com/v1/rule/$id](./rest-delete-rule)                                                       | Remove selection rule                         
GET       | [api.copernica.com/v1/rule/$id/conditions](./rest-get-rule-conditions)                                    | Get selection conditions                      
POST      | [api.copernica.com/v1/rule/$id/conditions](./rest-post-rule-conditions)                                   | Create a selection condition                  
GET       | [api.copernica.com/v1/profile/$id](./rest-get-profile)                                                    | Fetch profile data                            
PUT       | [api.copernica.com/v1/profile/$id](./rest-put-profile)                                                    | Edit profile data                             
DELETE    | [api.copernica.com/v1/profile/$id](./rest-delete-profile)                                                 | Remove profile                                
GET       | [api.copernica.com/v1/profile/$id/fields](./rest-get-profile-fields)                                      | Fetch profile fields                          
PUT       | [api.copernica.com/v1/profile/$id/fields](./rest-put-profile-fields)                                      | Edit profile fields                           
GET       | [api.copernica.com/v1/profile/$id/interests](./rest-get-profile-interests)                                | Fetch profile interests                       
POST      | [api.copernica.com/v1/profile/$id/interests](./rest-post-profile-interests)                               | Add interests to profile                      
PUT       | [api.copernica.com/v1/profile/$id/interests](./rest-put-profile-interests)                                | Edit profile interests                        
GET       | [api.copernica.com/v1/profile/$id/subprofiles](./rest-get-profile-subprofiles)                            | Fetch subprofiles of a profile                
POST      | [api.copernica.com/v1/profile/$id/subprofiles](./rest-post-profile-subprofiles)                           | Create subprofile                             
GET       | [api.copernica.com/v1/collection/$id](./rest-get-collection)                                              | Fetch collection data                         
PUT       | [api.copernica.com/v1/collection/$id](./rest-put-collection)                                              | Edit collection data                          
GET       | [api.copernica.com/v1/collection/$id/fields](./rest-get-collection-fields)                                | Fetch collection fields                       
POST      | [api.copernica.com/v1/collection/$id/fields](./rest-post-collection-fields)                               | Create collection field                       
PUT       | [api.copernica/com/v1/collection/$id/field/$id](./rest-put-collection-field)                              | Edit collection field                         
DELETE    | [api.copernica.com/v1/collection/$id/field/$id](./rest-delete-collection-field)                           | Remove collection field                       
GET       | [api.copernica.com/v1/collection/$id/miniviews](./rest-get-collection-miniviews)                          | Fetch miniviews                            	
POST      | [api.copernica.com/v1/collection/$id/miniviews](./rest-post-collection-miniviews)                         | Create miniview                            	
GET       | [api.copernica.com/v1/collection/$id/subprofiles](./rest-get-collection-subprofiles)                      | Fetch subprofiles from a collection           
GET       | [api.copernica.com/v1/collection/$id/subprofileids](./rest-get-collection-subprofileids)                  | Fetch subprofile IDs from a collection        
GET       | [api.copernica.com/v1/collection/$id/unsubscribe](./rest-get-collection-unsubscribe)                      | Fetch collection unsubscribe behavior         
PUT       | [api.copernica.com/v1/collection/$id/unsubscribe](./rest-put-collection-unsubscribe)                      | Update collection unsubscribe behavior        
GET       | [api.copernica.com/v1/miniview/$id](./rest-get-miniview)                                                  | Fetch miniview data                      	    
PUT       | [api.copernica.com/v1/miniview/$id](./rest-put-miniview)                                                  | Update miniview data                     	    
DELETE    | [api.copernica.com/v1/miniview/$id](./rest-delete-miniview)                                               | Remove miniview                          	    
GET       | [api.copernica.com/v1/miniview/$id/subprofiles](./rest-get-miniview-subprofiles)                          | Fetch subprofiles in a miniview          	    
GET       | [api.copernica.com/v1/miniview/$id/subprofileids](./rest-get-miniview-subprofileids)                      | Fetch subprofile identifiers                  
GET       | [api.copernica.com/v1/miniview/$id/rules](./rest-get-miniview-rules)                                      | Fetch miniview rules                     	    
POST      | [api.copernica.com/v1/miniview/$id/rules](./rest-post-miniview-rules)                                     | Create miniview rule                     	    
GET       | [api.copernica.com/v1/miniview/$id/rule/$id](./rest-get-miniview-rule)                                    | Fetch miniview rule                      	    
GET       | [api.copernica.com/v1/minirule/$id](./rest-get-minirule)                                                  | Fetch miniselection rule                      
PUT       | [api.copernica.com/v1/minirule/$id](./rest-put-minirule)                                                  | Edit miniselection rule                       
DELETE    | [api.copernica.com/v1/minirule/$id](./rest-delete-minirule)                                               | Remove miniselection rule                     
GET       | [api.copernica.com/v1/minirule/$id/conditions](./rest-get-minirule-conditions)                            | Fetch conditions for a miniselection          
POST      | [api.copernica.com/v1/minirule/$id/conditions](./rest-post-minirule-conditions)                           | Create condition for a miniselection          
GET       | [api.copernica.com/v1/subprofile/$id](./rest-get-subprofile)                                              | Fetch subprofile data                         
GET       | [api.copernica.com/v1/subprofile/$id/fields](./rest-get-subprofile-fields)                                | Fetch subprofile fields                       
GET       | [api.copernica.com/v1/logfiles](./rest-get-logfiles)                                                      | Fetch all logfiles                            
GET       | [https://api.copernica.com/v1/logfiles/$date](./rest-get-logfiles-names)					              | Logfile names					                
GET       | [api.copernica.com/v1/logfiles/$name](./rest-get-logfiles-csv)                                            | Download logfile in CSV format                
GET       | [api.copernica.com/v1/logfiles/$name/json](./rest-get-logfiles-json)                                      | Download logfile in JSON format               
GET       | [api.copernica.com/v1/logfiles/$name/xml](./rest-get-logfiles-xml)                                        | Download logfile in XML format                
