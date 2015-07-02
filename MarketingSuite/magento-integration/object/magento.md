# Magento object

This object represents Magento installation.

This object is useful when there is need to fetch a specific item from Magento 
data. For example when we want to send newsletter with 3 specific products we 
can construct following template

```smarty
{assign $magento.products.55 to $productOne}
{assign $magento.products.183 to $productTwo}
{assign $magento.products.333 to $productThree}

Our awesome offers!

{$productOne.name} {$productOne.ID}

{$productTwo.name} {$productTwo.ID}

{$productThree.name} {$productThree.ID}
```

will output

```txt
Our awesome offers! 

Product One 55

Product Two 183

Product Three 333
```

## Personalization properties

* _collection of [Product](copernica-docs:MarketingSuite/magento-integration/object/product)_ **products**
