Do you have multiple databases with related data? Within Smarty
personalization, you are not limited to getting the data from the target
database only. Loadprofile enables you to retrieve data from any
database. Loadsubprofile does the same, but from any data collection
within your account.

The code below provides an example how you can retreive profile data
from a different database.

~~~~ {.language-php}
   {loadprofile source="nameofyourdatabase" assign=loadedprofile}
~~~~

*Source*must contain the name of the database. Optionally you can also
refer to a selection in the database. The name of the database and the
selection are seperated by a dot.

*(source=Databasename.Selectionname)*

Assign the loaded data to a variable of your choosing (in the example
*loadedprofile*)

You can now retreive data via*{\$loadedprofile.fieldname}*

If you do not specifiy which profile you want to retreive, only the
first in the database will be returned. You can select a particular
profile by using the ID-parameter. For example:

~~~~ {.language-php}
{loadprofile source="Databasename" id=1337 assign=loadedprofile}
~~~~

The same applies for loading subprofiles from a **collection**

~~~~ {.language-php}
  {loadsubprofile source="Databasename:Collectionname" profile=$profile.id assign=loadedsubprofile}
~~~~

### **Options**

**assign**\* to what variable should the result be assigned

**id**\*\* id of the (sub)profile to be loaded

**source**\*\* What is the source to load the profile from, i.e.

-   a database*(source=Databasename)*,
-   a selection *(source="Databasename.Selectionname")*
-   loadsubprofile a collection *(source="Databasename:Collectionname")\
    *
-   miniselection
    *(source="Databasename:Collectionname.Miniselectionname")*
-   a combination
    *(source="Databasename.Selectionname:Collectionname.Miniselectionname")*

**...** by adding extra filters e.g. *(newsletter=yes)* those name/value
combination are added as filters for the (sub)profile which will be
retrieved

**\* The assign parameter is required** \
 **\*\* The id or source parameter is required\
\
**The *load(sub)profile*function has two additional options to
**loadprofile** and three options to **loadsubprofile**.

-   **multiple** - by setting the option multiple to *true*, an array
    with profiles is returned instead of a single profile
-   **limit** - when the option *multiple* is used, a limit can be
    supplied, which limits the number of profiles which are returned
-   **profile** - *(only for loadsubprofile)* by supplying the parameter
    profile (with a profile id), only subprofiles of the profile with
    that id are returned
-   **orderby='fielname asc/desc'**- Use this option to sort the results
    ascending or descending. If you omit this option the system will
    fallback on the default (sorting ascending on the field id)

Example of loadsubprofile in combination with smarty foreach

Without the smarty foreach function, loadprofile and loadsubprofile will
only return to you the first profile or subprofile.

To create -for example- a list with the last 2 products purchased by a
customer and show these in your template, your code can look something
like this:

~~~~ {.language-php}

{loadsubprofile source="Customers:Products" assign="orderedproducts" profile=$profile.id multiple=true limit=2 orderby='orderdate asc' }
<ul>
  {foreach $orderedproducts as $product}
    <li> 
          Product ID: {$product.productid},
          Product name: {$product.name},
          Ordered on: {$product.orderdate}
    </li>
  {/foreach}
</ul>
~~~~

### Brief explanation of above example

-   The data is taken from the collection *'Products'* of database
    '*Customers'*
-   The result is assigned to the variable *'orderedproducts'*
-   There is only search to subprofiles associated with the parent
    profile of the current destination (*profile=\$profile.id*)
-   The **multiple=true** in combination with **limit=2** ensures that
    only 2 subprofiles are returned.
-   The returned subprofiles sorted ascending (asc) using the value in
    the field "*orderdate*"
-   Finaly smarty foreach is used to iterate through the results (you
    need foreach to be able to show data from all returned subprofiles!)

### The result

-   *Product ID: 351354, Product name: Laphroaig single malt whisky 18
    years, Ordered on: 2013-09-21*
-   *Product ID: 6262, Product name: Box of Cuban cigars, Ordered on:
    2013-09-23*

