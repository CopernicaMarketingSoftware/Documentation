# Customer object

A customer is a registered Magento user. Magento calls every registered user 
a customer. It doesn't matter if a user bought anything from the shop or not.

The object `customer` gives you access to all information related to a single 
customer. 

## Subscription

A customer can be subscribed to newsletter. To check if a customer is subscribed, the 
`subscribed` property can be used. This property returns the current subscription 
status. For more information about subscription status read _[Subscriber][subscriber-object]_
page.

For more details about customer subscription the `subscriber` property should be used.

## Personalization properties

| Property name     | Property type                             | Description                                               |
|-------------------|-------------------------------------------|-----------------------------------------------------------|
| ID                | _number_                                  | The customer ID from Magento.                             |
| firstname         | _string_                                  | The first name of the customer.                           |
| middlename        | _string_                                  | The middle name of the customer.                          |
| prefix            | _string_                                  | The prefix of the customer.                               |
| lastname          | _string_                                  | The last name of the customer.                            |
| email             | _string_                                  | The email address.                                        |
| subscribed        | _string_                                  | Customer subscription status.                             |
| subscriber        | _[Subscriber][subscriber-object]_         | Subscriber linked to the customer                         |
| group             | _string_                                  | Name of a group that customer is linked to                |
| gender            | _string_                                  | Customer gender. Can be either: 'male', 'female' or null  |
| quotes            | _collection of [Quote][quote-object]_     | List of all quotes that are linked to the customer.       |
| orders            | _collection of [Order][order-object]_     | List of all orders that are linked to the customer.       |
| addresses         | _collection of [Address][address-object]_ | List of all addresses that are linked to the customer.    |
| webstore          | _[Webstore][webstore-object]_             | The webstore that customer is linked to.                  |
| billingAddress    | _[Address][address-object]_               | Customer's default billing address.                       |
| shippingAddress   | _[Address][address-object]_               | Customer's default shipping address.                      |
| activeBasket      | _[Quote][quote-object]_                   | Customer's active basket.                                 |
| person            | _[Person][person-object]_                 | Associated person object.                                 |
| wishlist          | _[Wishlist][wishlist-object]_             | Customer's wish list                                      |

## Examples

If you want to enlist all [orders][order-object] of a customer with the incremental
order number, grand total, shipping amount and total weight, the following code can 
be used:

```
{foreach $order in $customer.orders}

#{$order.increment} Shipping costs: {$order.shippingAmount} Grand total: {$order.grandTotal}

{/foreach}
```

This could output the following:

```

# 123123123001 Shipping costs: EUR 7.99 Grand total: EUR 129.99
# 123123123002 Shipping costs: EUR 7.99 Grand total: EUR 179.99
# 123123123003 Shipping costs: EUR 9.99 Grand total: EUR 139.99
# 123123123004 Shipping costs: EUR 7.99 Grand total: EUR 289.99
# 123123123005 Shipping costs: EUR 9.99 Grand total: EUR 29.99

```

[subscriber-object]: MarketingSuite/magento-integration/object/subscriber
[order-object]: MarketingSuite/magento-integration/object/order
[webstore-object]: MarketingSuite/magento-integration/object/webstore
[address-object]: MarketingSuite/magento-integration/object/address
[quote-object]: MarketingSuite/magento-integration/object/quote
[person-object]: MarketingSuite/magento-integration/object/person
[wishlist-object]: MarketingSuite/magento-integration/object/wishlist
