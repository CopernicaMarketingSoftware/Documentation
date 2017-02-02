# Optimalising selections
In Copernica, selections are maintained actively, which means they are rebuilt multiple times a day to keep them updated. This is part of why Copernica is so powerful: all users have to to is specify the conditions for a selection, and Copernica sorts profiles automatically. Active filters do take up some computing power. If your filters are too heavy or you have too many, it can negatively affect your database performance. Organising a database well makes it perform better and faster. Below, we'll show you how to achieve that.

## Delete and conquer
Even when you don't use a selection, it is kept active. Therefore, it's better to delete unused selections, as to not waste any computing power. Do you have selections that you don't use, but do plan on using again? Then it's a good idea to deactivate them until you start using them again. More information on deleting and deactivating selections can be found [here](selections-settings).

The same goes for databases: some users make new databases for every mailing they send. Although we discourage this - it's better to do everything within one database - we don't prohibit it either. If you want to organize your profiles in such a way, make sure to delete the databases after a while.

## Only filter what you really need
Don't over-filter: delete selection conditions you don't need to achieve your goal. The more filtering, the longer it takes to build the selection. Also make sure you don't have any duplicate conditions. 

## Be smart about indexing
An indexed field is filtered in a smarter way. Normally Copernica goes through a database column alphabetically, but in an indexed field Copernica can more or less determine up front where the information you're looking for is. That way, it doesn't have to go through the entire thing.

While being very useful, indexing fields can also backfire: indexing too many fields makes your database slower as a whole. It's best to only index fields you use to sort, numerical fields and fields you use for field conditions (field X equals field Y). 
The 'index this field' option can be found in the field options under *database management*.

## Start out easy
Some selections are heavier than others. Simply looking through numerical fields is done way quicker than filtering based on feedback from emails. Therefore, it's a good idea to use subselections for heavy operations.

Say, you've got a database of 100.000 profiles in which you want to make a selection of active customers born in 1980 and who have had at least three registered impressions in the past year. This takes up a lot of power, especially if Copernica has to go through 100.000 profiles for each condition.

Here's where subselections come in. Start out with a selection that checks for people born in 1980. It's an easy selection, and it filters out a lot of people. Then, underneath the selection, make a subselection that checks for email results in the past year. You now only have to search through hundreds, maybe a couple thousand profiles instead of 100.000, making it a lighter operation.

Light selection conditions are:
- Searching for field values such as 'X equals Y'
- Checking for interests
- Checking for dates on date fields

Heavy ones are:
- Sort or select profiles
- Check for campaign results
- Check for changes in the profile
- Check for unique/duplicate profiles

## Grouping selections using an empty selection
To create visual clarity in a database, many users use empty parent selections to group selections together. This is a good idea, but you shouldn't use an active selection condition, such as 'the value "ID" should be higher than 0', because then you're making useless calculations. It's better to set up a condition, and then deactivate it. That way, you're not computing anything and you still have a selection containing all profiles.

## Use the right field types
Using the right field types enables Copernica to use the right searching tactics, making it faster. Save numbers in numerical fields, dates in date fields, et cetera.
When using text fields, make them as short as possible by setting the max length to exactly the amount of characters you need. For example, if you're using a text field for Dutch postal codes, set it to 6 characters (Dutch postal codes consist of four digits, followed by two letters). The shorter the text, the faster the search.

## Selections with references
Only refer to other selections if there's no other way. When a selection depends on 10 other selections, those 10 others need to be built first, which takes time. At times, it may be needed and that's okay, but if there's any way to avoid it, do so. 

## Avoid selections based on email campaigns
Selecting based on email campaigns is by far the heaviest condition type. It is usually deployed to find and filter hardbounces from other selections. It's better to use follow-up actions on the document of the mailing to register errors and store it directly in the profile. That way, you can create your bounce selection based on a light field type check. Although this may not be ideal, it does make your selection a lot faster.

## Using the sort/select condition?
Index the fields you sort on, or better yet, don't select fields to sort on. In that case, the profile ID is used automatically, which is by far the fastest.
