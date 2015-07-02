# Category object

Category is an object representing one Magento category. Category objects are
structurized into tree-like structure. Each category can be a parent category
for one or more children. Each category can have one parent. 

Each store view has a root category. Such category can have parents and 
children. Root category forms a subtree of categories available for given store
view.

## Personalization properties

- _number_ **ID**
- _string_ **name**
- _string_ **created**
- _string_ **modified**
- _[Category](copernica-docs:MarketingSuite/magento-integration/object/category)_ **parent**

[Magento knowledge base category entry](http://www.magentocommerce.com/knowledge-base/categories/category/product-categories/)
