# Personalization

When designing a template for Magento target it's possible to use special SMARTY 
variables available for such mailings. Each mailing will have `$magento` variable 
available. This variable will give access to Magento installation data. Beside 
that each mailing target has set of variables that points to data specific for 
given destination. For example, when sending a mailing to 3 customers (Bob, Dave 
and Jane), `$customer` variable in each destination will point to different 
customer. 

Beside top-level variables there is also many other variables that can be 
accessed via top-level ones. 

```
{foreach $order in $customer.orders}
    #{$order.increment} {$order.currency} {$order.grandTotal}
{/foreach}
```

Will output:

```
#2009222 EUR 12.33
#2009223 EUR 13.34
#2009224 EUR 16.12
#2009225 EUR 55.22
```

Below is a table that summarizes what kind of top-level variables are available for given Magento targets.

| Variable/Target | Variable type                                                                      | Customers list | Orders list | Quotes list | Subscribers list | Persons list  |
|:----------------|:-----------------------------------------------------------------------------------|:--------------:|:-----------:|:-----------:|:----------------:|:-------------:|
| $magento        | [Magento](copernica-docs:MarketingSuite/magento-integration/object/magento)        | Yes            | Yes         | Yes         | Yes              | Yes           |
| $customer       | [Customer](copernica-docs:MarketingSuite/magento-integration/object/customer)      | Yes            | Yes         | Yes         | No               | Vary \*       |
| $quote          | [Quote](copernica-docs:MarketingSuite/magento-integration/object/quote)            | No             | Yes         | Yes         | No               | No            |
| $order          | [Order](copernica-docs:MarketingSuite/magento-integration/object/order)            | No             | Yes         | No          | No               | No            |
| $subscriber     | [Subscriber](copernica-docs:MarketingSuite/magento-integration/object/subscriber)  | No             | No          | No          | Yes              | No            |
| $person         | [Person](copernica-docs:MarketingSuite/magento-integration/object/person)          | No             | No          | No          | No               | Yes           |

_\* `$customer` variable available via Persons list can turn our to be `false`
value as an indication that given person is not a customer (a guest customer,
only subscriber, etc.)._

## Personalization objects

To personalize templates it's required to use predefined objects. It's very 
close to how data is structurized with [Object Oriented Programming](https://en.wikipedia.org/wiki/Object-oriented_programming), 
and how Magento internally works with data. 

Below is a list of object types that can be returned from various properties:

* [Address](copernica-docs:MarketingSuite/magento-integration/object/address)
* [Category](copernica-docs:MarketingSuite/magento-integration/object/category)
* [Customer](copernica-docs:MarketingSuite/magento-integration/object/customer)
* [Magento](copernica-docs:MarketingSuite/magento-integration/object/magento)
* [Order](copernica-docs:MarketingSuite/magento-integration/object/order)
* [OrderItem](copernica-docs:MarketingSuite/magento-integration/object/order-item)
* [Person](copernica-docs:MarketingSuite/magento-integration/object/person)
* [Product](copernica-docs:MarketingSuite/magento-integration/object/product)
* [Quote](copernica-docs:MarketingSuite/magento-integration/object/quote)
* [QuoteItem](copernica-docs:MarketingSuite/magento-integration/object/quote-item)
* [Subscriber](copernica-docs:MarketingSuite/magento-integration/object/subscriber)
* [Webstore](copernica-docs:MarketingSuite/magento-integration/object/webstore)
