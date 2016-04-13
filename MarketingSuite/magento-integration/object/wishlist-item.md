# WishlistItem object

Customers can create wishlists with the products they are interested in, but not 
neccessarily are going to buy. These products are stored in the object WishListItem. 

Besides just putting an item in a wishlist, customers can add a description for a product for their 
own reference.

## Personalization properties

| Property name   | Property type                                                                                        | Description                                               |
|-----------------|------------------------------------------------------------------------------------------------------|-----------------------------------------------------------|
| ID              | _number_                                                                                             | Wish list item Id.                                        |
| wishlist        | _[Wishlist](../../magento-integration/object/wishlist)                      		                         | Wishlist that item is assigned to.                        |
| product         | _[Product](../../magento-integration/object/product)                 		                                 | The actual product.                                       |
| addedAt         | _string_                                                                                             | Date when item was added.                                 |
| webstore        | _[Webstore](../../magento-integration/object/webstore)		                                             | Webstore in which item was added.                         |
| description     | _string_                                                                                             | User description for item.                                |
| quantity        | _number_                                                                                             | Amount of products that user wants.                       |
