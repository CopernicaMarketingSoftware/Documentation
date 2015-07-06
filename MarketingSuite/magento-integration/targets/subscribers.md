# Magento subscribers list

Subscribers list provides targets that are subscribers. Magento has an internal 
list of subscribers that is also synchronized with Copernica. It has two 
benefits. Any way that Magento provides for subscribing for newsletter will be 
honored by Copernica also. And, changes made by any extension using core Magento 
newsletter module will be honored.

## Personalization variables

Variables available for email personalization.

- [Magento](copernica-docs:MarketingSuite/magento-integration/object/magento) `$magento` 
- [Customer](copernica-docs:MarketingSuite/magento-integration/object/customer) `$customer`
- [Subscriber](copernica-docs:MarketingSuite/magento-integration/object/subscriber) `$subscriber`

## Filter options

Subscribers list can have following filter options:

* **Subscriptions status**
* **Customer Id**
* **Web store**
* **Only guest subscribers**
* **Only registered users**
