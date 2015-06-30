# Subscriber object

Subscriber is a person that is subscribed to newsletter. Subscriber can be a customer.

## Personalization properties

- _number_ **ID**
- _[Webstore](#/menu/documentation/MarketingSuite/magento-integration/object/Webstore)_ **webstore**
- _[Customer](#/menu/documentation/MarketingSuite/magento-integration/object/Customer)_ **Customer** If given subscriber isn't a customer this property will be NULL
- _string_ **modified**
- _string_ **status** Possible values: 'subscribed', 'not active', 'unsubscribed', 'unconfirmed', 'unknown'
- _string_ **email**
