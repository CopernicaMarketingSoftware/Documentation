# Personalization for Native integration variables

This is a list of all the available personalization variables per native integration.

## Magento 2

You can see which properties are available on each variable by referencing the [Magento API documentation](https://developer.adobe.com/commerce/webapi/rest/quick-reference/)

* **{$*identifier*.order.*orderID*}**: fetch an order by its ID
* **{$*identifier*.order.*orderID*.customer}**: fetch the customer for this order
* **{$*identifier*.order.*orderID*.items[].product}**: fetch the product from the order item
* **{$*identifier*.product.sku}**: fetch a product by its SKU
* **{$*identifier*.cart.*cartID*}**: fetch a cart by its ID
* **{$*identifier*.cart.*cartID*.customer}**: fetch the customer for this cart
* **{$*identifier*.cart.*cartID*.items[].product}**: fetch the product from the cart item

### Iterable properties

The following properties can be used in a foreach. You can find an [example on how to use them here](./personalization#native-integrations).

* **{$*identifier*.products}**: can be used to loop over all the products in the webshop
* **{$*identifier*.orders}**: can be used to loop over all the orders in the webshop
* **{$*identifier*.carts}**: can be used to loop over all the carts in the webshop
