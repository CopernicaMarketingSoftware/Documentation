# Magento customers list

Customer, in Magento sense, is a registered user. Customer don't have to buy 
anything or even have items inside a basket. He just have to provide his 
email and register with the website. 

For targeting email addresses of paying customer it's better to use [orders list target](copernica-docs:MarketingSuite/magento-integration/targets/orders).
Orders list will provide a list of email address of customers that placed their
orders.

For targeting email address of users that are considering purchase it's better 
to use [quotes list target](copernica-docs:MarketingSuite/magento-integration/targets/quotes).
Quotes list will provide a list of email address of users that inserted items
into theirs baskets.

For targeting email address of newsletter subscribers it's better to use [subscribers list target](copernica-docs:MarketingSuite/magento-integration/targets/subscribers).
Subscribers list will provide a list of email address of users that expressed
a will of receiving newsletters, regardless if they are registered customers or
not.

## Personalization variables

Variables available for email personalization.

- [Magento](copernica-docs:MarketingSuite/magento-integration/object/magento) `$magento` 
- [Customer](copernica-docs:MarketingSuite/magento-integration/object/customer) `$customer`

## Filter options

Customer list can have following filter options:

* **First name**
* **Middle name**
* **Prefix**
* **Last name**
* **Email address**
* **Customer group**
* **Gender**
* **Subscription status**
* **Web store**
