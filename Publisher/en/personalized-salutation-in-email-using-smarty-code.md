In this article you will learn how to create a personalized salutation
for your mailings and use conditions (if and else statements) to make it
fit for each recipient.

**Note**: test your mailing carefully. Make a selection in the database
with different test profiles that covers all possible situations in your
database. Thus, male / female, lowercase letters, inserts, et cetera.

**Note 2**: Smarty variables are case sensitive. {\$name} is different
from  {\$Name}.

### Simple informal salutation

If you know the first name of all of your contacts, you can easily
personalize the salutation by referring to the field wherein the name is
stored. In this example, the salutation is personalized with the
database field *firstname.*

Dear {\$firstname},

-   Dear John,
-   Dear Mary,

However, a recipient whose name you do not know, will read ‘Dear  ‘ on
top of your email. This can be overcome by using Smarty *if*and
*else*conditions

`{if $firstname}Dear {$firstname}{else}Dear customer{/if},`

Loosely translated: if a value is found in the field *firstname,*
display its value. Otherwise, show *Dear customer*

### Formal salutation

If you wish to use a formal salutation, it is important to know the
gender of your subscribers as well.

-   Dear Ms. De Vries,
-   Dear Ms. Wells,
-   Dear Mr. Van Halen
-   Dear Mr. Van der Sloot

`Dear {if $gender=="male"}Mr. {elseif $gender =="female"}Ms. {/if}{if $prefix }{$prefix |lower|ucfirst}{/if} {if $lastname}{$lastname}{else}relationship{/if},`

Both the gender and the possible family name prefix of the recipient are
taken into account. If there is no gender available, just show 'Dear
relationship'.

About conditions in personalization

Formatting personalization
--------------------------

**It is possible that data in your database differ in terms of
capitalization, or that data is missing completely. There are special
Smarty filter functions available to correct these anomalies.**

### **lower**

This filter is used to turn all capital letters into lower case letters.

If the variable {\$name} has the value ‘Hannibal LECTER’, you can
correct the capitalized letters by adding the filter lower, as follows:
{\$name|lower}. This will output ‘hannibal lecter’.

### ucfirst

This filter ensures that the first character of a string is capitalized.

If the variable {\$name} has the value 'chuck' then this will be
corrected by adding the filter ucfirst

`{\$name|ucfirst} will then output Chuck`

**The filters can be combined as well:**

If the value in the variable {\$prefix} is ‘VAn DeR’ then you can
transform the output to *Van der* by adding the two filters *lower*and
*ucfirst*: {\$prefix|lower|ucfirst} 

Read more about smarty filters

### Capture initials

You want to personalize your mailing with ‘Dear Name’

However, it could happen that you have only the initials of some
relations. The result will be: Dear B.R.,

Fortunately, there is a way to capture this:

`Dear {if $firstname|count_sentences < 1}{$firstname[rdelim}{else}customer{/if},`

Count\_sentences is a smarty function that counts the number of
sentences in a string based on the number of points(.) found in the
string. The above condition checks if the number of points in the field
is less than 1 (i.e., zero). If zero points were found, the name of the
recipient is displayed, otherwise “customer” is displayed. 
