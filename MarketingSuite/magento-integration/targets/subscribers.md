# Magento subscribers list

The *Subscribers* list provides targets that are subscribers. Magento keeps an internal 
list of subscribers that is synchronized with Copernica. Subscriber can be attached to 
a customer, but that is not required.

## Subscribing

Internally Magento uses Mage_Newsletter module for managing newsletter. Copernica extension
is also relying on this module. As a consequence, any other Magento extension that is using
this core module will be compatible with Copernice extension.

Magento doesn't support multiple newsletter list by default.

## Unsubscribing

Users can unsubscribe from newsletter via Magento interface as well as via unsubscribe urls
inside actual emails (using {$unsubscribe} tag). Changes made by unsubscribing via tag will
be propagated into Magento installation.

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
