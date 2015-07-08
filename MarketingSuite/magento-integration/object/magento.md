# Magento object

The object `magento` represents an entire Magento installation. It will grant access to certain Magento
resources. At this time it's only possible to get access to a list of all products and
fetch them by ID.


## Personalization properties

| Property name   | Property type                                                                               | Description                                         |
|-----------------|---------------------------------------------------------------------------------------------|-----------------------------------------------------|
| products        | _collection of [Product](copernica-docs:MarketingSuite/magento-integration/object/product)_ | Collection of all products available inside Magento |

## Examples

To list a couple of new products inside a newsletter (let's say product number 455,
444 and 466) we can use following code:

```
{assign $magento.products.455 to $newPants}
{assign $magento.products.444 to $newBoots}
{assign $magento.products.466 to $newBelt}

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
