# QuoteItem object

The object `quoteItem` describes a product that is assigned to a [quote](copernica-docs:MarketingSuite/magento-integration/object/quote). It defines how many of given items are inside the quote and the total cummulative price of given items inside the quote.

The item price inside a quote can differ from the regular item price, since additional pricing rules can be applied on quote items (like a discount given by a higher quantity of products).

## Personalization properties

The following properties are available for personalization in the `QuoteItem` object

| Property name   | Property type                                                                 | Description                         |
|-----------------|-------------------------------------------------------------------------------|-------------------------------------|
| ID              | _number_                                                                      | Original item ID.                   |
| quote           | _[Quote](copernica-docs:MarketingSuite/magento-integration/object/quote)_     | The quote that item belongs to.     |
| quantity        | _number_                                                                      | Number of products.                 |
| price           | _string_                                                                      | The price of a product.             |
| weight          | _number_                                                                      | The weight of a product.            |
| product         | _[Product](copernica-docs:MarketingSuite/magento-integration/object/product)_ | The actual product linked to quote. |
