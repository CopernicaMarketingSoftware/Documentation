# Magento customers list

A customer, in Magento sense, is basically a registered user of your website. 
A customer doesn't necessarily have to buy anything or even have items inside a basket. 
He just has to provide his email and register with the website. 

## Targeting 'real word' customers

If you want to target customers that actually payed for an order, it's better to use [orders list target](copernica-docs:MarketingSuite/magento-integration/targets/orders).
An orders list will provide a list of email address of customers with a purchasing history.

For targeting customers that are considering a purchase it's better 
to use [quotes list target](copernica-docs:MarketingSuite/magento-integration/targets/quotes).
Quotes list will provide a list of email address of users that inserted items
into theirs baskets but did not checked out and payed.

For targeting newsletter subscribers it's better to use the [subscribers list target](copernica-docs:MarketingSuite/magento-integration/targets/subscribers).
Subscribers list will provide a list of users that expressed
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
