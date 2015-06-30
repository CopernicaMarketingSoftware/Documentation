# Magento orders list

Order list provides targets that are real orders in Magento environment. 
That means all baskets that were finalized (user checked out). 

Each mailing target is a [Magento Order](#/menu/documentation/magento/order).

## Personalization variables

Variables available for email personalization.

- [Magento](copernica-docs:MarketingSuite/magento-integration/object/magento) `$magento` 
- [Customer](copernica-docs:MarketingSuite/magento-integration/object/customer) `$customer`
- [Order](copernica-docs:MarketingSuite/magento-integration/object/order) `$order`
- [Quote](copernica-docs:MarketingSuite/magento-integration/object/customer) `$quote`

## Filter options

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
