# Category object

Magento uses categories to organize products throughout stores. A top-level 
category can have subcategories, usually related to its parent. In a way, it 
symbolizes the webstore structure. 

For example, a webshop can have two main categories *Clothes* and *Shoes*. The 
*Clothes* category may have the subcategories *undies* and *shirts* and *Shoes* 
may have *Sneakers* and *High heels* as its subcategories.

A subcategory may as well be split up in several subcategories. Thus the 
subcategory *High heels* can be split into two subcategories *men* and *women* 
containing high heels for either men or women. 

The same product can be assigned to multiple categories. So a sneaker of brand 
Nike can be assigned to the category _Nike_ and to the category _Sneakers_.

Every [webstore][webstore-object] starts out with a root category, under which 
all the other categories are specified.

Categories don't work as a filter. So the Nike shoe from subcategory *Sneakers* 
doesn't necessarily have to be in the parent category *Shoes*. It must be 
specifically assigned to it. 

On the other hand, a product does not necessarily have to be assigned to any 
category. It will not show up in a category, but for the rest is behaves like 
any other product from a webstore.

The example below visually shows you the category structure from the above text

```
Root category
    +Clothes
        -Undies
        -Shirts
    +Shoes              // Nike shoe is NOT in this category
        +HighHeels
            -Men
            -Woman
        -Sneakers       // Nike shoe is in this category
        +Brands
            -Nike       // Nike shoe is also in this category
            -Adidas
            -Van Bommel
```

## Using the Category object in personalization

Categories can be grouped in various ways: grouping products by type, 
by manufacturer, by certain event, etc. Thus they make an excellent tool for 
personalization. 

For example, to show products that were assigned to a category specifically made 
for a campaign (let say, around cookie baking contest), we can assign them to a hidden category in 
Magento and then iterate that category inside email template:

```
{assign $magento.categories[42] to $cookiesCategory}

{foreach $cookieProduct as $cookiesCategory.products}

{$products.name}

{/foreach}
```

## Personalization properties

| Property name   | Property type                             | Description                                            |
|-----------------|-------------------------------------------|--------------------------------------------------------|
| ID              | _number_                                  | Category ID.                                           |
| name            | _string_                                  | The name of category.                                  |
| created         | _string_                                  | Date when category was created.                        |
| modified        | _string_                                  | Date when category was last modified.                  |
| parent          | _[Category][category-object]_             | Parent category. Null if there is no parent.           |
| products        | _collection of [Product][product-object]_ | Collection of all products assigned to given category. |

## Links

[Magento knowledge base category entry](http://www.magentocommerce.com/knowledge-base/categories/category/product-categories/)


[webstore-object]: copernica-docs:MarketingSuite/magento-integration/object/webstore
[category-object]: copernica-docs:MarketingSuite/magento-integration/object/category
[product-object]: copernica-docs:MarketingSuite/magento-integration/object/product
