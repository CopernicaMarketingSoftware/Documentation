#Customer object

Customer object is a Magento registered user. It doesn't mean that such object 
has any orders, baskets, subscriptions or any other kind of data. As a minimum 
it should have an Id. With normal Magento installation customer is also have 
an email address, but when using extension that alters register/login process 
email address could be empty.

## Personalization properties

- _number_ **ID**
- _string_ **firstname**
- _string_ **middlename**
- _string_ **prefix**
- _string_ **lastname**
- _string_ **email**
- _string_ **subscribed** Possible values: 'subscribed', 'not active', 'unsubscribed', 'unconfirmed', 'unknown'
- _[Subscriber](copernica-docs:MarketingSuite/magento-integration/object/subscriber)_ **subscriber**
- _string_ **group**
- _string_ **gender** Possible values: 'male', 'female', null
- _collection of [Quote](copernica-docs:MarketingSuite/magento-integration/object/quote)_ **quotes**
- _collection of [Order](copernica-docs:MarketingSuite/magento-integration/object/order)_ **orders**
- _collection of [Address](copernica-docs:MarketingSuite/magento-integration/object/address)_ **addresses**
- _[Webstore](copernica-docs:MarketingSuite/magento-integration/object/webstore)_ **webstore**
