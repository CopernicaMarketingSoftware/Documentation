# Category object

Category is a way to organize your products. Categories can have child categories
and parent categories. 

Every [Webstore](copernica-docs:MarketingSuite/magento-integration/object/webstore) 
has a root category.

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
