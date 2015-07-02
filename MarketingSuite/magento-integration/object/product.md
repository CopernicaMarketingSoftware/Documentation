# Product object

Product is a real world item or service that can be sold.

## Catalog URI

The online address of product is highly depending on how product and whole 
Magento is configured. One product can be visible from different Magento 
websites, under different URLs. `URI` property depends on [Magento base URL](http://merch.docs.magento.com/ce/user_guide/Magento_Community_Edition_User_Guide.html#configuration/general/web.html%3FTocPath%3DConfiguration%7CGeneral%7C_____2) 
configuration and [product URL key](http://merch.docs.magento.com/ce/user_guide/Magento_Community_Edition_User_Guide.html#catalog/product-general.html%3FTocPath%3DProduct%2520Catalog%7CProduct%2520Information%7C_____1). 

## Product categories

Each product can be assigned to one or more categories. Thus, it's possible to
sell products that are not assigned to any of categories (by direct links). 

Inside Magento categories can have children/parent categories, but products are
assigned to categories without that kind of relation. That means, if we have 
category A and a child category B, and a product assigned to category B, category
A will not show up in product's category list.

## Personalization properties

| Property name   | Property type                                                                                 | Description                                    |
|-----------------|---------------------------------------------------------------------------------------------- |------------------------------------------------|
| ID              | _number_                                                                                      | Product ID.                                    |
| SKU             | _string_                                                                                      | The Stock Keeping Unit.                        |
| name            | _string_                                                                                      | The product name.                              |
| description     | _string_                                                                                      | Product description.                           |
| price           | _string_                                                                                      | Product price in "[currency] [amount]" format. |
| created         | _string_                                                                                      | The date when product was created.             |
| updated         | _string_                                                                                      | The last date when product was updated.        |
| weight          | _string_                                                                                      | The product weight.                            |
| URI             | _string_                                                                                      | The online address of the product.             |
| image           | _string_                                                                                      | The online address of product's image.         |
| categories      | _collection of [Category](copernica-docs:MarketingSuite/magento-integration/object/category)_ | List of categires that product is assigned to. |

## Examples

To include product informations inside newsletter following code can be used:

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
[Stock Keeping Unit wki page](https://en.wikipedia.org/wiki/Stock_keeping_unit)
