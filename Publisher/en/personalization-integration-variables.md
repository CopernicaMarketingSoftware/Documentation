# Personalization for Native integration variables

This is a list of all the available personalization variables per native integration.

## Magento 2

You can see which properties are available on each variable by referencing the [Magento API documentation](https://developer.adobe.com/commerce/webapi/rest/quick-reference/)

* **{$nickname.order.orderID}**: fetch an order by its ID
* **{$nickname.order.orderID.items[].product}**: fetch the product from the order item
* **{$nickname.product.sku}**: fetch a product by its SKU
* **{$nickname.cart.cartID}**: fetch a cart by its ID
* **{$nickname.cart.cartID.items[].product}**: fetch the product from the cart item
