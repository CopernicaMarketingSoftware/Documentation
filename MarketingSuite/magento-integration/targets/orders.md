# Magento orders list

An order is a collection of items that a customer decided to buy. The order contains
information about the products, their price and the quantity of each item.

Orders can be placed either by registered customers or by anonymous guests. For the latter, 
the option _anonymous checkout_ has to be enabled inside the Magento configuration.

Each order is created from a quote. The _quote object_ represents a collection of products
that can be purchased on the conditions (quantity, price, etc) described in the quote. When order is 
created, the quote from which it was created will be frozen and flagged as inactive. 
From that moment, the customer can no longer modify this quote and a new active quote for future activities will be created for that user.

## Orders state and status

Orders can have various _states_ and _statuses_. 
**State** is a Magento value assigned to an order that cannot be modiefied by a user.
**Status** is a user defined (of Magento predefined) value that can be modified inside the 
Magento admin panel. 

Read more about order _state_ and _status_ on [order object](magento-integration/object/order) page.

## Personalization variables

| Variable name | Variable type                                                                    | Description                                    |
|---------------|----------------------------------------------------------------------------------|------------------------------------------------| 
| $magento      | _[Magento](magento-integration/object/magento)_    		                       | Overall Magento installation.                  |
| $customer     | _[Customer](magento-integration/object/customer)_  		                       | Instance of customer that placed the order.    |
| $quote        | _[Quote](magento-integration/object/quote)_        		                       | Instance of quote that order was created from. |
| $order        | _[Order](magento-integration/object/order)_        		                       | Instance of the actual order.                  |
| $person       | _[Person](magento-integration/object/person)_      	                           | Instance of person that placed the order.      |

## Limiting orders list

It is possible to limit the results of the orders list by applying filters.

*  **Quote Id**

   Limits orders list to orders that were created using the [quote](magento-integration/object/quote) with given ID.

*  **Customer Id**

   Limits orders list to orders that were placed by [customer](magento-integration/object/customer) with given ID.

*  **State**

   Limits orders list to orders that are in the given state.

*  **Status**

   Limits orders list to orders that have the given status.

*  **Quantity**

   Limits orders list to orders that have a given amount of products.

*  **Total weight**

   Limits orders list to orders that weighted the given amount of kilograms.

*  **Products**

   Limits orders list to orders that contain the  given [product](magento-integration/object/product).

*  **Product's category**

   Limits orders list to orders that contain product from given [category](magento-integration/object/category).

*  **Web store**

   Limits the list to orders that were placed in the given [webstore](magento-integration/object/webstore).

*  **Currency**

   Limits orders list to orders that were placed with use of a given [currency](magento-integration/object/currency).

*  **IP address**

   Limtis orders list to orders that were placed with use of a given IP address.
