# Magento persons list

Persons is not term from Magento, but a Copernica specific thing. Each record from
this list contain all data that we gathered of a single person. 

Example, when someone registers on your website, or places an order for the first time, a new person record will be created, and the data known about this person will be stored in it. Months later, this same person can decide to do another purchase but now as an anonymous guest, using the 
same email address. For Magento internally, those are two seperate users. 
Copernica however, will link together those two entities based on the provided email address and 
merge them into one single object: a person. 

The stored information about a person will be compiled to the most recently provided. 

## Personalization variables

Variables available for email personalization.

- [Magento](copernica-docs:MarketingSuite/magento-integration/object/magento) `$magento` 
- [Customer](copernica-docs:MarketingSuite/magento-integration/object/customer) `$customer` \*
- [Person](copernica-docs:MarketingSuite/magento-integration/object/customer) `$person`

_\* Only when person is a customer. When person is only a subscriber or guest this variable will evaluate to FALSE_

## Filter options

A persons list can have following filter options:

* **First name**
* **Middle name**
* **Prefix**
* **Last name**
* **Email address**
* **Gender**
* **Subscription status**
* **Web store**
* **bought product**
* **bought product from category**
* **wishes for product**
* **wisges for product from category**
