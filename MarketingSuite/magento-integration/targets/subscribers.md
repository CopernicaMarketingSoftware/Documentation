# Magento subscribers list

The *Subscribers* list provides targets that are subscribers. Magento keeps an internal 
list of subscribers that is synchronized with Copernica. It is a two way communication. 
Any way that Magento provides for subscribing for newsletter will be 
honored by Copernica and the other way around.

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