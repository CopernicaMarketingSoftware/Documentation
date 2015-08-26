# Magento orders list

Order is a collection of items that customer decided to buy. Each items defines
how many of given product at given price should be delivered.

Orders can be placed either by registered customers or anonymous guests. For 
guests placed orders, suitable option has to be enabled in Magento configuration
(anonymous check out).

Each order is created from a quote. Quote object represents a set of products
that can be bought on given conditions (quantity, price, etc). When order is 
created, quote from which it is created is finalized. Quote will be no longer 
available for modification by user and new active quote is created for that user.

## Orders state and status

Orders can be in various states and statuses. State is Magento value that can't 
be modifier by user. Status is user defined (or Magento predefined) value that
can be set up inside Magento admin panel.

Read more about order state and status on [order object](copernica-docs:MarketingSuite/magento-integration/object/order) page.

## Personalization variables

| Variable name | Variable type                                                                    | Description                                    |
|---------------|----------------------------------------------------------------------------------|------------------------------------------------| 
| $magento      | _[Magento](copernica-docs:MarketingSuite/magento-integration/object/magento)_    | Overall Magento installation.                  |
| $customer     | _[Customer](copernica-docs:MarketingSuite/magento-integration/object/customer)_  | Instance of customer that placed the order.    |
| $quote        | _[Quote](coperncia-docs:MarketingSuite/magento-integration/object/quote)_        | Instance of quote that order was created from. |
| $order        | _[Order](copernica-docs:MarketingSuite/magento-integration/object/order)_        | Instance of the actual order.                  |
| $person       | _[Person](copernica-docs:MarketingSuite/magento-integration/object/person)_      | Instance of person that placed the order.      |

## Limiting orders list

It's possible to limit orders list to a shorten, more precise one, by applying
filter options to it. It's possible to apply following filter options:

*  **Quote Id**

   Limits orders list to orders that were created using [quote](coperncia-docs:MarketingSuite/magento-integration/object/quote) with given ID.

*  **Customer Id**

   Limits orders list to orders that were placed by [customer](coperncia-docs:MarketingSuite/magento-integration/object/customer) with given ID.

*  **State**

   Limits orders list to orders that are in given state.

*  **Status**

   Limits orders list to orders that have given status.

*  **Quantity**

   Limits orders list to orders that have given amount of products.

*  **Total weight**

   Limits orders list to orders that weighted given amount of kilograms.

*  **Products**

   Limits orders list to orders that contain given [product](coperncia-docs:MarketingSuite/magento-integration/object/product).

*  **Product's category**

   Limits orders list to orders that contain product from given [category](coperncia-docs:MarketingSuite/magento-integration/object/category).

*  **Web store**

   Limits orders list to orders that were placed in given [webstore](coperncia-docs:MarketingSuite/magento-integration/object/webstore).

*  **Currency**

   Limits orders list to orders that were placed with use of given [currency](coperncia-docs:MarketingSuite/magento-integration/object/currency).

*  **IP address**

   Limtis orders list to orders that were placed with use of given IP address.
