# Mailing targets

Each mass mailing that is send with Copernica Marketing Suite has to have 
a target. Targets are list of email addresses with some data. With classic 
Copernica account targets are: databases, views, selection, etc. With Magento 
enabled accounts five new target types come into play: 

- [Magento customers list](copernica-docs:MarketingSuite/magento-integration/targets/customers)
- [Magento orders list](copernica-docs:MarketingSuite/magento-integration/targets/orders)
- [Magento quotes list](copernica-docs:MarketingSuite/magento-integration/targets/quotes)
- [Magento subscribers list](copernica-docs:MarketingSuite/magento-integration/targets/subscribers)
- [Magento persons list](copernica-docs:MarketingSuite/magento-integration/targets/persons)

Each list provides different personalization and filtering options. 

## Default targets

For each synchronized store default targets are automatically created. Such 
targets reflect most basic/common mailing targets. This way mailing target for 
all subscribers of specific store is always available and doesn't have to be 
created for each store.

Default targets will always be created when given set of data is synchronized.
That means, when a new store view "NEW SHOP" is created, shortly new default 
target will be created "subscribers of NEW SHOP".

## Custom targets 

In addition to default targets it's possible to create a fully custom target. 
To do so, navigate to Magento Sync inside Marketing Suite. And pick a target 
type inside "Manage lists". A new page with list of targets and form should 
pop up.

![](copernica-docs:MarketingSuite/images/magento-filter-page.png)

In this screen you can fine tune mailing target options. Each target type has 
specific set of options that can be applied. For example, orders can be filtered 
by bought products, but subscribers can't.
