# Customer object

Customer is a registered Magento user. Magento calls every registered user 
a customer. It doesn't matter if user bought anything from the shop or not.

## Subscription

Customer can be subscribed to newsletter. To check if customer is subscribed 
`subscribed` property can be used. This property returns current subscription 
status.

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

## Examples

If there is a need to create a listing of all customer's [orders](copernica-docs:MarketingSuite/magento-integration/object/order) with informations
like increment number, grant total, shipiing amount and total weight, following 
code can be used:

```
{foreach $order in $customer.orders}

#{$order.increment} Shipping costs: {$order.shippingAmount} Grant total: {$order.grantTotal}

{/foreach}
```

Will output following:

```

# 123123123001 Shipping costs: EUR 7.99 Grant total: EUR 129.99
# 123123123002 Shipping costs: EUR 7.99 Grant total: EUR 179.99
# 123123123003 Shipping costs: EUR 9.99 Grant total: EUR 139.99
# 123123123004 Shipping costs: EUR 7.99 Grant total: EUR 289.99
# 123123123005 Shipping costs: EUR 9.99 Grant total: EUR 29.99

```
