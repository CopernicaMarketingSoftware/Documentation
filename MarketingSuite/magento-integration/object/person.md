# Person object

Persons is not term from Magento, but a Copernica specific thing. Each record from
this list contains all data that we gathered of a single person. 

Example, when someone registers on your website, or places an order for the first time, a new person record will be created, and the data known about this person will be stored in it. Months later, this same person can decide to do another purchase but now as an anonymous guest, using the 
same email address. For Magento internally, those are two seperate users. 
Copernica however, will link together those two entities based on the provided email address and 
merge them into one single object: a person. 

The object `person` holds the most recent information about a user. It tracks user by it's 
email address and applies proper changes to itself when new information is added. 

## Personalization properties

- _string_ **email**
- _string_ **firstname**
- _string_ **prefix**
- _string_ **middlename**
- _string_ **lastname**
- _string_ **gender**
- _[Customer](copernica-docs:MarketingSuite/magento-integration/object/customer)_ **customer**
- _[Webstore](copernica-docs:MarketingSuite/magento-integration/object/webstore)_ **webstore**
