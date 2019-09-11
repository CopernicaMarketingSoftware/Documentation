# Collections
A **collection** can be compared to a second database that is bound to every
profile. Examples of collections are the products that customers have ordered,
the whitepapers that have been requested, or even the information
of all contacts at a client. Just like a database, you are completely free
to decide what information is stored in a collection. To distinguish between
entries in a database and a collection, we refer to entries in a collection
as **subprofiles**.

## Selections and miniselections
A selection filters profiles based on the conditions defined for this
selection. A miniselection has the same purpose, but filters subprofiles
in collections instead. It is also possible to filter profiles in a selection
based on the contents of miniselections by filtering on the amount of
subprofiles that a profile has in a miniselection.

For example, you could use this to find all profiles that have ordered an
item in the past week. To get these profiles, you would need to create
a miniselection in a collection that track orders and add the condition
that a subprofile has been created in the past week. You can then create
a selection that filters all profiles that have at least one subprofile
in that miniselection. This will give you all profiles that made an order
in the past week.

## Creating a collection in the Marketing Suite
In the Marketing Suite you have the ability to create collections in the
**Database & Profiles** section. First, select the database you want to add
a collection to and then click on the green plus sign in the top-left corner.
The next step will be to add structure to your collection by adding fields.

As databases you create in Copernica are identical in the Publisher and the
Marketing Suite, you will only need to create them through one of these
interfaces.

## Creating a collection in the Publisher
You can create collections in the Publisher in the **Profiles** section. The
option can be found under **Database Management > Edit database field > Add
Collection**. This screen will allow you to name the selection. Afterwards,
you can find the collection as a new tab under the profiles in the database,
this tab will show you all subprofiles in that collection for that profile.
The next step will be to add structure to your collection by adding fields.

As databases you create in Copernica are identical in the Publisher and the
Marketing Suite, you will only need to create them through one of these
interfaces.

## Creating or editing a miniselection in the Marketing Suite
Select the **Gear** from the Database & Profiles section and select the
collection on the left-hand side of the screen that pops up. Choose the option
**Create miniselection**.  Here you can give the miniselection a name.

Once you have added the miniselection, you can start adding rules and
conditions. First, select the condition on the left-hand side of the screen.
Now you can select the option **edit conditions**. Just like collections,
miniselections are shared between the Publisher and the Marketing Suite.

## Creating or editing a miniselection in the Publisher
You can create a miniselection in the **Profiles** section under **Database
management** > **Edit selections...**. Here you will find the option **Create
new miniselection**. Choose the collection or miniselection that this new
miniselection should be placed under and give the miniselection a namen. Once
you have saved these settings, you have the opportunity to add rules and
condition to your new miniselection. To add a new condition, select the option
**Add a new 'AND' condition to the current 'OR' rule**. To add a new rule, use
the option **Add a new 'AND' condition to a new 'OR' rule**. Just like
collections, miniselections are shared between the Publisher and the
Marketing Suite.
