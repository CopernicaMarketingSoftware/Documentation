# Personalization

Email personalization for Magento targets follows same rules as [personalization](copernica-docs:MarketingSuite/template-editor/personalization)
for publisher targets. Only difference is with top-level variables available
in such templates.

With Magento targets variables `$profile` and `$subprofile` are not available. 
Instead Magento specific variables are available. They differ, depending on
chosen target. Only [$magento](copernica-docs:MarketingSuite/magento-integration/object/magento) 
variable is always available.

All variables, beside [$magento](copernica-docs:MarketingSuite/magento-integration/object/magento)
variable are personalized for each destination. That means, when sending email
to target that contains customers with addresses 'john.doe@example.com' and
'tim.smith@example.com', Tim Smith will see his own email address inside template, 
and John Doe will see his own email address inside template.

Below, you can find a table that summarizes what kind of top-level variables are 
available for given Magento targets.

| Variable/Target | Variable type                                                                      | Customers list | Orders list | Quotes list | Subscribers list | Persons list  |
|:----------------|:-----------------------------------------------------------------------------------|:--------------:|:-----------:|:-----------:|:----------------:|:-------------:|
| $magento        | [Magento](copernica-docs:MarketingSuite/magento-integration/object/magento)        | Yes            | Yes         | Yes         | Yes              | Yes           |
| $customer       | [Customer](copernica-docs:MarketingSuite/magento-integration/object/customer)      | Yes            | Yes         | Yes         | No               | Vary \*       |
| $quote          | [Quote](copernica-docs:MarketingSuite/magento-integration/object/quote)            | No             | Yes         | Yes         | No               | No            |
| $order          | [Order](copernica-docs:MarketingSuite/magento-integration/object/order)            | No             | Yes         | No          | No               | No            |
| $subscriber     | [Subscriber](copernica-docs:MarketingSuite/magento-integration/object/subscriber)  | No             | No          | No          | Yes              | No            |
| $person         | [Person](copernica-docs:MarketingSuite/magento-integration/object/person)          | No             | No          | No          | No               | Yes           |

_\* `$customer` variable available via Persons list can evaluate to `false`
value as an indication that given person is not a customer (a guest customer,
only subscriber, etc.)._

## Personalization objects

Magento object are related to each other. One customer can have multiple orders,
subscriber can be a customer, etc. We maintain such relations and we give access
to them via personalization object.

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
