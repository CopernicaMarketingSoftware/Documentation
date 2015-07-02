# Magento persons list

Persons list is a Copernica specific list. Each entity from that list will be build
of compiled information about certain person. What does that mean? For example, 
when we have a customer that registers for it's first order giving additional 
informations like address, a new person is created. Later on that user can 
decide to make a purchase as a guest. Internally for Magento those are two 
separate users. Thus, when we see that email addresses are the same we can 
assume that they are the same person. 

Information about that user will be compiled to present most recent ones.

## Personalization variables

Variables available for email personalization.

- [Magento](copernica-docs:MarketingSuite/magento-integration/object/magento) `$magento` 
- [Customer](copernica-docs:MarketingSuite/magento-integration/object/customer) `$customer` \*
- [Person](copernica-docs:MarketingSuite/magento-integration/object/customer) `$person`

\* _Only when person is a customer. When person is only a subscriber or guest this variable will evaluate to FALSE_

## Filter options

Persons list can have following filter options:

* **First name**
* **Middle name**
* **Prefix**
* **Last name**
* **Email address**
* **Gender**
* **Subscription status**
* **Web store**
