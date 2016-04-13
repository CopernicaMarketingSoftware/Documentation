# OrderItem object

The order item describes a product that is part of an order. It defines how many of 
the given products should be shipped to the customer. It also defines the final price of 
a product. It can differ from normal product price, since additional pricing rules can
be applied on items of the same order (like discount given by higher quantity of products).

## Personalization properties

The OrderItem object holds the following properties  

| Property name   | Property type                    | Description                                             |
|-----------------|----------------------------------|---------------------------------------------------------|
| ID              | _number_                         | Original order item ID.                                 |
| order           | _[Order][order-object]_          | The order the item belongs to.                          |
| quantity        | _number_                         | Amount of products.                                     |
| price           | _string_                         | Final item price.                                       |
| weight          | _number_                         | Weight of item.                                         |
| product         | _[Product][product-object]_      | The actual product.                                     | 
| quoteItem       | _[QuoteItem][quote-item-object]_ | The quote item that was used to create this order item. |

[order-object]: ../../magento-integration/object/order
[product-object]: ../../magento-integration/object/product
[quote-item-object]: ../../magento-integration/object/quote-item
