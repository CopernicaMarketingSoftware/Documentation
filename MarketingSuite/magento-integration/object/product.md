# Product object

A product is a real world item or service that can be sold. The object `product` 
holds all available information about a single product and makes it available for 
email personalization. 

## Catalog URI

The online address (URL) of a product is highly depending on how the Magento 
installation is configured. The same product can be visible from different 
Magento websites, under different URLs. The property `URI` depends on the [Magento base URL][magento-base-url]
configuration and the [product URL key][product-url-key]. 

## Product categories

Inside Magento, products can be assigned a category. For instance, a red sports 
car can be assigned a category 'red'. The same product can be in multiple
categories (the car can be both red and fast), or can have no category at all. 
For the product itself this doesn't matter. It still has a product URL, and can 
thus be linked from an email, just like any other product. 

For more information about product categories, go to the [category object][category-object]
 documentation. 

## Product options

Each product inside Magento can have [custom options][option-object]. Custom 
option is an additional input that will be displayed on frontend for customer to 
fill up. Such inputs can be used to personalize products (custom text on a t-shirt) 
for customer or to provide additional services (aseemble newly bought computer).

Custom options can be accessed via `options` property.

## Product attributes

Each product inside Magento have number of [attributes][attribute-object] assigned 
to it. Inside Magento they are referred as [EAV (Entity Attribute Value)][eav-wiki]. 
Attributes describe nearly every bit of information about product.

Attributes can be accessed via `attributes` property.

## Personalization properties

| Property name   | Property type                                        | Description                                     |
|-----------------|------------------------------------------------------|-------------------------------------------------|
| ID              | _number_                                             | Product ID.                                     |
| SKU             | _string_                                             | The Stock Keeping Unit.                         |
| name            | _string_                                             | The product name.                               |
| description     | _string_                                             | Product description.                            |
| price           | _string_                                             | Product price in "[currency] [amount]" format.  |
| created         | _string_                                             | The date when product was created.              |
| updated         | _string_                                             | The last date when product was updated.         |
| weight          | _string_                                             | The product weight.                             |
| URI             | _string_                                             | The online address of the product.              |
| image           | _string_                                             | The online address of product's image.          |
| categories      | _collection of [Category][category-object]_          | List of categories that product is assigned to. |
| options         | _collection of [ProductOption][[option-object]]_     | List of options assigned to product.            |
| attributes      | _collection of [ProductAttribute][attribute-object]_ | List of attributes assigned to product.         |

## Examples

To include product information inside your newsletter the following code can be used:

```

{assign $magento.products.2345 to $newShoes}
{assign $magento.products.4555 to $armBand}

Our new offers:

{$newShoes.name} 
{$newShoes.description}

{$armBand.name}
{$armBand.description}

```

## Links

[Magento user guide product page](http://merch.docs.magento.com/ce/user_guide/Magento_Community_Edition_User_Guide.html#catalog/product-information.html%3FTocPath%3DProduct%2520Catalog%7CProduct%2520Information%7C_____0)
[Stock Keeping Unit wiki page](https://en.wikipedia.org/wiki/Stock_keeping_unit)


[magento-base-url]: http://merch.docs.magento.com/ce/user_guide/Magento_Community_Edition_User_Guide.html#configuration/general/web.html%3FTocPath%3DConfiguration%7CGeneral%7C_____2
[product-url-key]: http://merch.docs.magento.com/ce/user_guide/Magento_Community_Edition_User_Guide.html#catalog/product-general.html%3FTocPath%3DProduct%2520Catalog%7CProduct%2520Information%7C_____1
[eav-wiki]: https://en.wikipedia.org/wiki/Entity%E2%80%93attribute%E2%80%93value_model#Representing_substructure:_EAV_with_classes_and_relationships_.28EAV.2FCR.29


[category-object]: MarketingSuite/magento-integration/object/category
[option-object]: MarketingSuite/magento-integration/object/product-option
[attribute-object]: MarketingSuite/magento-integration/object/product-attribute
