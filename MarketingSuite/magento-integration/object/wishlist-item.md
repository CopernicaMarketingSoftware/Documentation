# WishlistItem object

Inside wish lists customers can assign products. WishlistItem is a object that
makes that connection. In addition it's possible to add a comment to product.

## Personalization properties

| Property name   | Property type                                                                                        | Description                                               |
|-----------------|------------------------------------------------------------------------------------------------------|-----------------------------------------------------------|
| ID              | _number_                                                                                             | Wish list item Id.                                        |
| wishlist        | _[Wishlist](copernica-docs:MarketingSuite/magento-integration/object/wishlist)                       | Wishlist that item is assigned to.                        |
| product         | _[Product](copernica-docs:MarketingSuite/magento-integration/object/product)                         | The actual product.                                       |
| addedAt         | _string_                                                                                             | Date when item was added.                                 |
| webstore        | _[Webstore](copernica-docs:MarketingSuite/magento-integration/object/webstore)                       | Webstore in which item was added.                         |
| description     | _string_                                                                                             | User description for item.                                |
| quantity        | _number_                                                                                             | Amount of products that user wants.                       |
