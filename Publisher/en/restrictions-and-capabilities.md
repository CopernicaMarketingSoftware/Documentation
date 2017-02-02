# Restrictions and user options
Copernica comes with built-in security systems in order to prevent invalid data ending up in your database or sending a mailing to the wrong target. Database restrictions allow you to set rules for filtering input data and to prevent invalid data from entering your database. User options make sure you can only send mailings to databases and collections that are meant for mailings.

Both features can be found in the profile management module in Publisher. User options can be found under the database management menu and restrictions under Database management > Edit database fields > Database restrictions.

## Setting user options
When a new database or collection is created, it cannot directly be used for mailings. This is a security system we use to prevent users from accidentally sending a mailing to an entire database, when the intention was to only send to a part of it (like sending a newsletter to everyone instead of only subscribers).

For every database, selection and collection you can set in the interface whether it is suitable for mailings. This way, you'll never send to people you shouldn't send to.

## Database restrictions
Database restrictions are rules that apply to databases and collections. All data added, whether through the interface or through a web form, must comply to these rules. If it doesn't, the profile cannot be saved or edited. Applications of restrictions are setting a minimum value of 18 for the field 'age' or the field 'username' having to be unique. 

Adding a restriction to an existing datbase may cause some of your data to conflict with the database's rules. This will not cause any error or problem: the existing profiles keep their illegal values. Only when you want to edit these existing profiles will you have keep to the restrictions and edit the illegal values.

The possibilities of restrictions are far-stretching: A single restriction can consist of multiple rules, bound together by "AND" and "OR" operators. "AND" operators require the profile to conform to all rules, whereas "OR" operators are content with one of the conditions satisfied.

Another application of restrictions is to prevent duplicates in your database. In this case, the profile (or value, depending on your conditions) gets checked against all others before being added to the database.

## Regular expressions
In making a restriction for a field value, there are multiple operators to check values in fields. For example, you could demand a value to be equal or inequal to a string or contain a certain substring. The most powerful form of checking values is using regular expressions.

Regular expressions, often abbreviated to regex, are a way to check for patterns in text. For example, "all words starting with A", "all phone numbers consisting of 10 characters" or "every sentence with two commas and a capital Q".

The following regex searches for everything starting with four letters, followed by two numbers (Dutch zip codes):
/\^[0-9]4[a-z|A-Z]2\$/

Setting this regex as a condition for postal codes prevents incorrect codes from entering your database. Regular expressions are a well-known and widely used system by many developers. On the internet, you'll find many good tutorials and libraries to master regex:
 - [http://regexlib.com](http://regexlib.com/)
 - [http://regular-expressions.info](http://regular-expresssions.info/)

 Note: regular expressions always start and end with a slash (/).