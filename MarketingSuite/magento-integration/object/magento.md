# Magento object

The object `magento` represents an entire Magento installation. It will grant 
access to certain Magento resources. 

More specific collections, like product, category and webstore collections  are available from
this object. These can then be used to fetch more precise instances. This can
be done by referring to the ID of a specific instance within brackets `[]`.

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

To show a couple of new products inside a newsletter (let's say product number 455,
444 and 466) we can use the following code:

```
{assign $magento.products[455] to $newPants}
{assign $magento.products[444] to $newBoots}
{assign $magento.products[466] to $newBelt}

Our awesome offer!

{$newPants.name}

{$newBoots.name}

{$newBelt.name}
```

This will output:

``` 
Our awesome offer!

Pants

Boots

Belt

```
