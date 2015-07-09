# Category object

Magento uses categories to organize products throughout stores. A top-level category
can have subcategories, usually related to its parent. In a way, it symbolizes the 
webstore structure. 

For example, a webshop can have two main categories *Clothes* and *Shoes*. The *Clothes* category 
may have the subcategories *undies* and *shirts* and *Shoes* may have *Sneakers* and *High heels* as its subcategories.

A subcategory may as well be split up in several subcategories. Thus the subcategory *High heels* can 
be split into two subcategories *men* and *women* containing high heels for either men or women. 

The same product can be assigned to multiple categories. So a sneaker of brand Nike can be assigned to the category _Nike_ and to the category _Sneakers_.

Every [webstore](copernica-docs:MarketingSuite/magento-integration/object/webstore) 
starts out with a root category, under which all the other categories are specified.

Categories don't work as a filter. So the Nike shoe from subcategory *Sneakers* doesn't necessarily 
have to be in the parent category *Shoes*. It must be specifically assigned to it. 

On the other hand, a product does not necessarily have to be assigned to any category. It will 
not show up in a category, but for the rest is behaves like any other product from a webstore.

The example below visually shows you the category structure from the above text

<pre>Root category
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
</pre>


## Using the Category object in personalization

The object Category gives you access to the categories available in a webstore. It allows you for instance to show products from a certain category in an email. 

[code example]


## Personalization properties

| Property name   | Property type                                                                   | Description                                  |
|-----------------|---------------------------------------------------------------------------------|----------------------------------------------|
| ID              | _number_                                                                        | Category ID.                                 |
| name            | _string_                                                                        | The name of category.                        |
| created         | _string_                                                                        | Date when category was created.              |
| modified        | _string_                                                                        | Date when category was last modified.        |
| parent          | _[Category](copernica-docs:MarketingSuite/magento-integration/object/category)_ | Parent category. Null if there is no parent. |

## Links

[Magento knowledge base category entry](http://www.magentocommerce.com/knowledge-base/categories/category/product-categories/)
