# Product object

A product is a real world item or service that can be sold. The object `product` 
holds all available information about a single product and makes it available for 
email personalization. 

## Catalog URI

The online address (URL) of a product is highly depending on how the Magento installation is configured. The same product can be visible from different Magento websites, under different URLs. The property `URI` depends on the [Magento base URL](http://merch.docs.magento.com/ce/user_guide/Magento_Community_Edition_User_Guide.html#configuration/general/web.html%3FTocPath%3DConfiguration%7CGeneral%7C_____2) 
configuration and the [product URL key](http://merch.docs.magento.com/ce/user_guide/Magento_Community_Edition_User_Guide.html#catalog/product-general.html%3FTocPath%3DProduct%2520Catalog%7CProduct%2520Information%7C_____1). 

## Product categories

Inside Magento, products can be assigned a category. For instance, a red sports car can be assigned a 
category 'red'. The same product can be in multiple
categories (the car can be both red and fast), or can have no category at all. For the product itself this doesn't matter. It still has a product URL, and can thus be linked from an email, just like any other product. 

For more information about product categories, go to the [category object](copernica-docs:MarketingSuite/magento-integration/objects/category) documentation. 

## Personalization properties

| Property name   | Property type                                                                                 | Description                                     |
|-----------------|-----------------------------------------------------------------------------------------------|-------------------------------------------------|
| ID              | _number_                                                                                      | Product ID.                                     |
| SKU             | _string_                                                                                      | The Stock Keeping Unit.                         |
| name            | _string_                                                                                      | The product name.                               |
| description     | _string_                                                                                      | Product description.                            |
| price           | _string_                                                                                      | Product price in "[currency] [amount]" format.  |
| created         | _string_                                                                                      | The date when product was created.              |
| updated         | _string_                                                                                      | The last date when product was updated.         |
| weight          | _string_                                                                                      | The product weight.                             |
| URI             | _string_                                                                                      | The online address of the product.              |
| image           | _string_                                                                                      | The online address of product's image.          |
| categories      | _collection of [Category](copernica-docs:MarketingSuite/magento-integration/object/category)_ | List of categories that product is assigned to. |

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
