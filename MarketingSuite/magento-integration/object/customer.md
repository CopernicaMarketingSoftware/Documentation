# Customer object

A customer is a registered Magento user. Magento calls every registered user 
a customer. It doesn't matter if user bought anything from the shop or not.

The object `customer` gives you access to all information related to a single 
customer. 

## Subscription

A customer can be subscribed to newsletter. To check if a customer is subscribed, the 
`subscribed` property can be used. This property returns the current subscription 
status. For more information about subscription status read _[Subscriber](copernica-docs:MarketingSuite/magento-integration/object/subscriber)_
page.

For more details about customer subscription the `subscriber` property should be used.

## Personalization properties

| Property name     | Property type                                                                               | Description                                               |
|-------------------|---------------------------------------------------------------------------------------------|-----------------------------------------------------------|
| ID                | _number_                                                                                    | The customer ID from Magento.                             |
| firstname         | _string_                                                                                    | The first name of the customer.                           |
| middlename        | _string_                                                                                    | The middle name of the customer.                          |
| prefix            | _string_                                                                                    | The prefix of the customer.                               |
| lastname          | _string_                                                                                    | The last name of the customer.                            |
| email             | _string_                                                                                    | The email address.                                        |
| subscribed        | _string_                                                                                    | Customer subscription status.                             |
| subscriber        | _[Subscriber](copernica-docs:MarketingSuite/magento-integration/object/subscriber)_         | Subscriber linked to the customer                         |
| group             | _string_                                                                                    | Name of a group that customer is linked to                |
| gender            | _string_                                                                                    | Customer gender. Can be either: 'male', 'female' or null  |
| quotes            | _collection of [Quote](copernica-docs:MarketingSuite/magento-integration/object/quote)_     | List of all quotes that are linked to the customer.       |
| orders            | _collection of [Order](copernica-docs:MarketingSuite/magento-integration/object/order)_     | List of all orders that are linked to the customer.       |
| addresses         | _collection of [Address](copernica-docs:MarketingSuite/magento-integration/object/address)_ | List of all addresses that are linked to the customer.    |
| webstore          | _[Webstore](copernica-docs:MarketingSuite/magento-integration/object/webstore)_             | The webstore that customer is linked to.                  |
| billingAddress    | _[Address](copernica-docs:MarketingSuite/magento-integration/object/address)_               | Customer's default billing address.                       |
| shippingAddress   | _[Address](copernica-docs:MarketingSuite/magento-integration/object/address)_               | Customer's default shipping address.                      |
| activeBasket      | _[Quote](copernica-docs:MarketingSuite/magento-integration/object/quote)_                   | Customer's active basket.                                 |
| person            | _[Person](copernica-docs:MarketingSuite/magento-integration/object/person)_                 | Associated person object.                                 |

## Examples

If you want to enlist all [orders](copernica-docs:MarketingSuite/magento-integration/object/order) of a customer with the increment number, grant total, shipping amount and total weight, the following code can be used:

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
