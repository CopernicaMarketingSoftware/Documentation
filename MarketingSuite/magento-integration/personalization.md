# Personalization

The Copernica Magento Sync module comes with a whole bunch of options for email personalization.

You personalize emails by including variables into your email content. A variable correspondents
with a name of a database field, that contains information about a destination, product or anything else you can think of. For instance the Magento variable `$customer.email` will lookup the 
destinations email address.     

All variables are personalized for each destination. Simply put, when sending an email
to a target that contains customers with addresses 'john.doe@example.com' and
'tim.smith@example.com', Tim Smith will see his own email address in the email. 

Email personalization for Magento targets follows the same rules as [personalization](MarketingSuite/template-editor/personalization) for targets based on selections and miniselections. However, there are some differences which we'll describe below. 

### No need to specify $profile and $subprofile 

If you have used email personalization with Copernica already, you are likely 
familiar with the variables `$profile` and `$subprofile` that give you access 
to respectively the profile and subprofile data of the subscriber. With Magento targets `$profile` and `$subprofile` are not available. Instead Magento specific variables are used. 

Just like personalisation to non-magento targets, variables are always wrapped inside
curly braces and start with a dollar sign `{$varname}`. For better readability, the 
curly braces are ommitted in these help files. 

### Available variables differ per target

The variables that are available depend on the type of target you will be using for 
a mailing. 

For instance, when sending a mailing to a subscribers list, you cannot include a list of orders 
in your email, simply because not each subscriber necessarily has a purchasing history. 

## Available variables per target

Below, you can find a table that summarizes what kind of top-level variables are 
available for given the different Magento targets.


| Variable/Target | Variable type                                                                      | Customers list | Orders list | Quotes list | Subscribers list | Persons list  | Guests list |
|:----------------|:-----------------------------------------------------------------------------------|:--------------:|:-----------:|:-----------:|:----------------:|:-------------:|:-----------:|
| $magento \*     | [magento](MarketingSuite/magento-integration/object/magento)        | Yes            | Yes         | Yes         | Yes              | Yes           | Yes         |
| $customer       | [customer](MarketingSuite/magento-integration/object/customer)      | Yes            | Yes         | Yes         | No               | Vary \*\*     | No          |
| $guest          | [guest](MarketingSuite/magento-integration/object/guest)            | No             | No          | No          | No               | No            | Yes         |
| $quote          | [quote](MarketingSuite/magento-integration/object/quote)            | No             | Yes         | Yes         | No               | No            | No          |
| $order          | [order](MarketingSuite/magento-integration/object/order)            | No             | Yes         | No          | No               | No            | Yes         |
| $person         | [person](MarketingSuite/magento-integration/object/person)          | No             | Yes         | No          | No               | Yes           | No          |
| $subscriber     | [subscriber](MarketingSuite/magento-integration/object/subscriber)  | No             | No          | No          | Yes              | No            | No          |

_\* As you can see in the table, the variable `$magento` is the only one variable available
in all list types._ 

_\*\* The `$customer` variable available via Persons list can evaluate to `false`
value as an indication that given person is not a customer (a guest customer,
only subscriber, etc.)._

## Personalization objects

A personalization object represents a collection of related data. For example the object 
`address` will have information about the street address, city and country of the 
target destination, accessed seperately by using the object name, followed by a
dot and then the name of the specific field, eg., `$address.city`, `$address.country` et cetera. 

Magento object are related to each other. A customer can have multiple orders,
and a subscriber can also be a customer. 

Below is a list of object types that can be returned from various properties:

* [Address](MarketingSuite/magento-integration/object/address)
* [Category](MarketingSuite/magento-integration/object/category)
* [Customer](MarketingSuite/magento-integration/object/customer)
* [Guest](MarketingSuite/magento-integration/object/guest)
* [Magento](MarketingSuite/magento-integration/object/magento)
* [Order](MarketingSuite/magento-integration/object/order)
* [OrderItem](MarketingSuite/magento-integration/object/order-item)
* [Person](MarketingSuite/magento-integration/object/person)
* [Product](MarketingSuite/magento-integration/object/product)
* [Quote](MarketingSuite/magento-integration/object/quote)
* [QuoteItem](MarketingSuite/magento-integration/object/quote-item)
* [Subscriber](MarketingSuite/magento-integration/object/subscriber)
* [Webstore](MarketingSuite/magento-integration/object/webstore)
* [Wishlist](MarketingSuite/magento-integration/object/wishlist)
* [WishlistItem](MarketingSuite/magento-integration/object/wishlist-item)
