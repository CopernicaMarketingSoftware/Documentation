# Order object

Order represents a finalized basket (one that was checked out). 

## Personalization properties

- _number_ **ID** Internal Magento entity ID. For customer friendly order identifier use increment property.
- _number_ **increment** Customer friendly order identifier.
- _bool_ **active**
- _date_ **created**
- _date_ **updated**
- _string_ **tax** Amount of tax in "[currency] [amount]" format.
- _string_ **subtotal** Subtotal in "[currency] [amount]" format.
- _string_ **grandTotal** Grand total in "[currency] [amount]" format.
- _string_ **shippingAmount** Shipping amount in "[currency] [amount]" format.
- _number_ **quantity**
- _string_ **currency** Currency code
- _number_ **weight**
- _collection of [OrderItem](copernica-docs:MarketingSuite/magento-integration/object/order-item)_ **items**
- _[Customer](copernica-docs:MarketingSuite/magento-integration/object/customer)_ **customer**
- _[Address](copernica-docs:MarketingSuite/magento-integration/object/address)_ **billingAddress**
- _[Address](copernica-docs:MarketingSuite/magento-integration/object/address)_ **deliveryAddress**
- _string_ **IPAddress**
- _[Webstore](copernica-docs:MarketingSuite/magento-integration/object/webstore)_ **webstore**

## Links

[Order management entry in Magento knowledge base](http://www.magentocommerce.com/wiki/2_-_magento_concepts_and_architecture/order_management#xmind_source_file)
