# Wishlist object

Magento comes with built-in mechanism to create list of products that customers
want to mark as ones that they want. Inside Magento they are called wish lists.

Every customer is entitled to have one wish list that will hold item 
(with optional description) of wanted products. They can be shared via email 
messages inside magento.

## Personalization properties

| Property name   | Property type                                                                                        | Description                                               |
|-----------------|------------------------------------------------------------------------------------------------------|-----------------------------------------------------------|
| ID              | _number_                                                                                             | ID of the wish list.                                      |
| shared          | _string_                                                                                             | Is wish list shared?                                      |
| sharingCode     | _string_                                                                                             | Sharing code.                                             |
| updatedAt       | _string_                                                                                             | Last time wish list was updated.                          |
| items           | _collection of [WishlistItem](magento-integration/object/wishlist-item)		                         | List of items assigned to wish list                       |
