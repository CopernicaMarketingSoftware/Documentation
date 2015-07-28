# Magento orders list

Order list allows you to create custom targets based on order information. 
For example it's possible to send a mailing to all customers that bought specific 
or a product or from certain category.

## Personalization variables

Variables available for email personalization.

- [Magento](copernica-docs:MarketingSuite/magento-integration/object/magento) `$magento` 
- [Customer](copernica-docs:MarketingSuite/magento-integration/object/customer) `$customer`
- [Order](copernica-docs:MarketingSuite/magento-integration/object/order) `$order`
- [Quote](copernica-docs:MarketingSuite/magento-integration/object/customer) `$quote`

## Filter options

For lists based on orders the following filter options are available:

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
