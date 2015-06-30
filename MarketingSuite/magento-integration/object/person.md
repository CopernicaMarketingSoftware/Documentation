# Person object

Person object hold most recent informations about a user. It tracks user by it's 
email address and applies proper changes to itself with latest informations. 

For example: When there is a user that registered with Magento, and then same 
email was used to place an guest order such data will be combined inside person 
object (containing most recent data).

## Personalization properties

- _string_ **email**
- _string_ **firstname**
- _string_ **prefix**
- _string_ **middlename**
- _string_ **lastname**
- _string_ **gender**
- _[Customer](copernica-docs:MarketingSuite/magento-integration/object/customer)_ **customer**
- _[Webstore](copernica-docs:MarketingSuite/magento-integration/object/webstore)_ **webstore**
