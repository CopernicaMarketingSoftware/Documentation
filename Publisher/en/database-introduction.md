# Database management

Copernica databases are fully configurable: you can define your own databases, 
with exactly the fields that you need. This ensures that your business specific
data can always be stored in Copernica and used for your campaigns. 
The Copernica databases even support multiple dimensions. This allows you to 
create a database with multiple layers to store, for example, per profile a 
full order history.

The database is the central point for your marketing campaigns. It contains 
all profile data that you use for segmentation and for personalization. Thie
data is also continuously enriched based on actions from the addressees, so 
that you can you improve future campaigns based on the results of previous
mailings. Although some users choose to regularly create new databases and
to upload new profile data, we always advise to always stay with the same
database. The profiles in this databases become richer based on the feedback
of previous campaigns.

## Marketing Suite or Copernica Publisher?

The database management tools are accessible through the old and the new
interface. However, the old interface has some extra tools that are not yet
available in the new interface. We therefore, for the time being, recommend
to use the old interface.


## Multiple dimensions

If you work with databases, you will regularly run into the terms *collection*
and *subprofile*. These are words that are used for layered databases. In a
simple, one-dimensional dimensional database you only find normal fields and 
interests: a shop owner could for example create a database with customer
data, with fields for the customer name, his or her postal address and, of 
course, the email address. Records in such a flat database are called 
*profiles*.

A single layered database can however easily be turned into a multidimensional
database by adding a *collection* to it. The show owner could for example add
a collection *orders* to the database, with the fields *date*, *product* and
*price*. It then becomes possible to store a full order history for every 
profile (every customer) in this database. The nested records in such a
collection (in this case the orders) are called *subprofiles*.

This layered structure is very powerful. A database with customers with a 
collection for the order history, is just a first example. But there are many
more usecases, like a database with company with a collection for all the
employees per company or a database with parents, and for each parent a
colletion of their children.

[Read more about fields and collections](database-fields-and-collections)


## Other options

When you're setting up your database, you have to take care of many different
things. The structure of the fields and collections is of course important,
but you need to do more before you can use a database to send out a mailing.
You can for example install all sorts of rules to prevent that invalid data
gets into your system, or that you accidentally send out a mailing to a wrong
segment of your profiles.

[Read more about database restrictions and intentions](database-restrictions-and-capabilities)

