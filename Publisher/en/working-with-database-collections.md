Databases in Copernica can be built up with an extra level. Such an
extra level we call a collection.

In a database you can store data about a profile. A profile contains
information like a *name*and *email address*for example. Say, you add a
collection named *Products*, you can then use this collection to store
information about the products purchased by the profile, such as its
*product id*, *purchase date* and *price*. Each record with product
information within this collection *Products*is called a subprofile.

This way a relation only has to be in the database once, without having
to have a complicated and diffused profile. By using collections, you
are able to keep a clear overview in your database.

-   In a database you can add as many collections as you need.
-   There is no limit to the number of subprofiles added to a
    collection.
-   Just like with normal profiles and selections, you can segment data
    in collections using mini-selections.

![](../images/databases-collection-tab.png)

#### Advantages of collections

-   Working with collections and subprofiles will make your data better
    maintainable.
-   It provides a clear overview of your data
-   Definitely adds more power to your campaigns

#### Disadvantages

-   Importing data to databases and collections takes a little more time
    to understand
-   Smarty personalization with data from subprofiles is more
    complicated

Add a collection to your database
---------------------------------

Add a collection to a database from the *Edit database fields *function
under *Database management*.

New collection fields can be added the same way as database fields: use
*Edit fields*and then choose the collection.

![](../images/databases-add-collection.png)

Filter subprofiles with mini selections
---------------------------------------

Selections created on collections are called mini selections. They can
be added in the *Edit selections* dialog and work the same as
selections.

Read more about [selections and miniselections](./working-with-selections.md)