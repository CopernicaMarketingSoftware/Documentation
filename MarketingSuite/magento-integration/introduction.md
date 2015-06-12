# Introduction

Each Copernica account comes with ability to send mailings based on Magento related targets. Thus, for proper options to show up initial synchronization should be performed. To do so, particular Magento webshop installation has to be extended with [Magento Integration](http://www.magentocommerce.com/magento-connect/copernica.html). 
It's strongly recommended to install integration with Magento Connect platform as it offers a automated way of installation. Alternatively, [GitHub](https://github.com/CopernicaMarketingSoftware/MAGENTO) version is available for manual or automated deployment.
After successful installation extension should start data sync with Copernica account and Magento related functionalities will show up in Marketing Suite

[insert image of side menu before and after magento sync is enabled]

# Data synchronization

Magento Integration will synchronize data from Magento installation within 5 minute cycles. That means, when initial synchronization is done, new customers, orders or quotes should show up in Copernica account withing 5 minutes. 

If given Magento installation has more than one store available, it's possible to choose subset of them for synchronization. This way test or archived data will not be synchronized with Copernica. To do so, inside Magento Admin Panel, 
navigate to System -> Configuration -> Copernica Marketing Software, pick a store that should be disabled/enabled and save your choice.

# Mailing targets

Each mass mailing that is send with Copernica Marketing Suite has to have a target. Targets are list of email addresses with some data. With classic Copernica account targets are: databases, views, selection, etc. With Magento enabled accounts five new target types come into play: Magento customers list, Magento orders list, Magento quotes list, Magento subscribers list and Magento persons list. Each list provides slightly different personalization data.

## Default targets

For each synchronized store default targets are automatically created. Such targets reflect most basic/common mailing targets. This way mailing target for all subscribers of specific store is always available and doesn't have to be created for each store.

## Custom targets 

In addition to default targets it's possible to create a fully custom target. To do so, navigate to Magento Sync inside Marketing Suite. And pick a target type inside "Manage lists". A new page with list of targets and form should pop up.

[screenshot of filter page]

In this screen you can fine tune mailing target options. Each target type has specific set of options that can be applied. For example, orders can be filtered by bought products, but subscribers can't.

## Mailing targets types

### Magento customers list

Customers list provides targets that are customers in Magento environment. That means users that are registered. Thus user that bought something is a customer, but also a user that only registered is also a customer.

Each mailing target is a [Magento Customer](#/menu/documentation/magento/customer).

Customer list can have following filter options:
* **First name**
* **Middle name**
* **Prefix**
* **Last name**
* **Email address**
* **Customer group**
* **Gender**
* **Subscription status**
* **Web store**

### Magento orders list

Order list provides targets that are real orders in Magento environment. That means all baskets that were finalized (user checked out). 

Each mailing target is a [Magento Order](#/menu/documentation/magento/order).

Order list can have following filter options:
* **Quote Id**
* **Customer Id**
* **State**
* **Status**
* **Quantity**
* **Total weight**
* **Bought product**
* **Product's category**
* **Web store**
* **Currency**
* **IP address**

### Magento quotes list

Quotes list provides targets that are quotes/baskets. Note that only quotes that have access to email address will be synchronized. Another note is that every order is also a quote.

Each mailing target is a [Magento Quote](#/menu/documentation/magento/quote).

Quotes list can have following filter options:
* **Active/inactive**
* **Customer Id**
* **Quantity**
* **Weight**
* **Total weight**
* **Chosen product**
* **Product's category**
* **Web store**
* **Currency**
* **IP address** 
* **Last modification date**
* **Finalized**
* **Empty/with items**

### Magento subscribers list

Subscribers list provides targets that are subscribers. Magento has an internal list of subscribers that is also synchronized with Copernica. That has two benefits. Any way that Magento provides for subscribing for newsletter will be honored by Copernica also. Also changes made by any extension using core Magento newsletter module will be honored.

Each mailing target is a [Magento Subscriber](#/menu/documentation/magento/subscriber)

Subscribers list can have following filter options:
* **Subscriptions status**
* **Customer Id**
* **Web store**
* **Only guest subscribers**
* **Only registered users**

### Magento persons list

Persons list is Copernica specific list. Each entity from that list will be build of compiled information about certain person. What does that mean? For example, when we have a customer that registers for it's first order giving additional informations like address, a new person is created. Later on that user can decide to make a purchase as a guest. Internally for Magento those are two separate users. Thus, when we see that email addresses are the same we can assume that they are the same person. 
Information about that user will be compiled to present most recent ones.

Each mailing target is a [Magento Person](#/menu/documentation/magento/person)

Persons list can have following filter options:
* **First name**
* **Middle name**
* **Prefix**
* **Last name**
* **Email address**
* **Gender**
* **Subscription status**
* **Web store**

# Personalization

When designing a template for Magento target it's possible to use special Smarty variables available for such mailings. Each mailing will have *$magento* variable available. This variable will give access to Magento installation data. Beside that each mailing target has set of variables that points to data specific for given destination. For example, when sending a mailing to 3 customers (Bob, Dave and Jane), *$customer* variable in each destination will point to different customer. 
Beside top-level variables there is also many other variables that can be accessed via top-level ones. 

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

Below is a table that summarizes what kind of top-level variables are available for given targets.

| Variable/Target | Variable type                                                                            | Customers list | Orders list | Quotes list | Subscribers list | Persons list |
|:----------------|:----------------------------------------------------------------------------------------:|:--------------:|:-----------:|:-----------:|:----------------:|:------------:|
| $magento        | [Magento](#/menu/documentation/MarketingSuite/magento-integration/object/Magento)        | Yes            | Yes         | Yes         | Yes              | Yes          |
| $customer       | [Customer](#/menu/documentation/MarketingSuite/magento-integration/object/Customer)      | Yes            | Yes         | Yes         | No               | Yes and No   |
| $quote          | [Quote](#/menu/documentation/MarketingSuite/magento-integration/object/Quote)            | No             | Yes         | Yes         | No               | No           |
| $order          | [Order](#/menu/documentation/MarketingSuite/magento-integration/object/Order)            | No             | Yes         | No          | No               | No           |
| $subscriber     | [Subscriber](#/menu/documentation/MarketingSuite/magento-integration/object/Subscriber)  | No             | No          | No          | Yes              | No           |
| $person         | [Person](#/menu/documentation/MarketingSuite/magento-integration/object/Person)          | No             | No          | No          | No               | Yes          |

## Personalization objects

To personalize templates it's required to use predefined objects. It's very close to how data is structurized with [Object Oriented Programming](https://en.wikipedia.org/wiki/Object-oriented_programming), and how Magento internally works with data. 

Below is a list of object types that can be returned from various properties:

* [Address](#/menu/documentation/MarketingSuite/magento-integration/object/Address)
* [Category](#/menu/documentation/MarketingSuite/magento-integration/object/Category)
* [Customer](#/menu/documentation/MarketingSuite/magento-integration/object/Customer)
* [Order](#/menu/documentation/MarketingSuite/magento-integration/object/Order)
* [OrderItem](#/menu/documentation/MarketingSuite/magento-integration/object/OrderItem)
* [Person](#/menu/documentation/MarketingSuite/magento-integration/object/Person)
* [Product](#/menu/documentation/MarketingSuite/magento-integration/object/Product)
* [Quote](#/menu/documentation/MarketingSuite/magento-integration/object/Quote)
* [QuoteItem](#/menu/documentation/MarketingSuite/magento-integration/object/QuoteItem)
* [Subscriber](#/menu/documentation/MarketingSuite/magento-integration/object/Subscriber)
* [Webstore](#/menu/documentation/MarketingSuite/magento-integration/object/Webstore)
