# QuoteItem object

QuoteItem object describes a product assigned to a quote. It defines how many of 
given products should be inside given quote. It also defines final price of a
a product. It can differ from product price, since additional pricing rules can
be applied on quote item (like discount caused by higher quantity of products,
or specific customer's group).

## Personalization properties

| Property name   | Property type                                                                 | Description                         |
|-----------------|-------------------------------------------------------------------------------|-------------------------------------|
| ID              | _number_                                                                      | Original item ID.                   |
| quote           | _[Quote](copernica-docs:MarketingSuite/magento-integration/object/quote)_     | The quote that item belongs to.     |
| quantity        | _number_                                                                      | Number of products.                 |
| price           | _string_                                                                      | The price of a product.             |
| weight          | _number_                                                                      | The weight of a product.            |
| product         | _[Product](copernica-docs:MarketingSuite/magento-integration/object/product)_ | The actual product linked to quote. |
