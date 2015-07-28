# Magento object

The object `magento` represents an entire Magento installation. It will grant 
access to certain Magento resources. 

General collection like products, categories, webstores are available from
this object. All of them can be used to fetch very precise instances. It can
be done by supplying an ID of specific instance inside `[]` operator when 
accessing collection. 

```
{assign $magento.categories[42] to $cookiesCategory}
```

## Personalization properties

| Property name   | Property type                                                                                 | Description                                            |
|-----------------|-----------------------------------------------------------------------------------------------|--------------------------------------------------------|
| products        | _collection of [Product](copernica-docs:MarketingSuite/magento-integration/object/product)_   | Collection of all products available inside Magento.   |
| categories      | _collection of [Category](copernica-docs:MarketingSuite/magento-integration/object/category)_ | Collection of all categories available inside Magento. |
| webstores       | _collection of [Webstore](copernica-docs:MarketingSuite/magento-integration/object/webstore)_ | Collection of all webstores available inside Magento.  |

## Examples

To list a couple of new products inside a newsletter (let's say product number 455,
444 and 466) we can use following code:

```
{assign $magento.products[455] to $newPants}
{assign $magento.products[444] to $newBoots}
{assign $magento.products[466] to $newBelt}

Our awesome offer!

{$newPants.name}

{$newBoots.name}

{$newBelt.name}
```

Will output:

``` 
Our awesome offer!

Pants

Boots

Belt

```
