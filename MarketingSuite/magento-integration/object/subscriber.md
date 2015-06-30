# Subscriber object

Subscriber is a person that is subscribed to newsletter. Subscriber can be 
a customer.

## Personalization properties

- _number_ **ID**
- _[Webstore](copernica-docs:MarketingSuite/magento-integration/object/webstore)_ **webstore**
- _[Customer](copernica-docs:MarketingSuite/magento-integration/object/customer)_ **Customer** If given subscriber isn't a customer this property will be NULL
- _string_ **modified**
- _string_ **status** Possible values: 'subscribed', 'not active', 'unsubscribed', 'unconfirmed', 'unknown'
- _string_ **email**
