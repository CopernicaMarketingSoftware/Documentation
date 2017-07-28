# Selections: Sort/select condition

The sort/select condition can be used to select profiles from a 
sorted version of your database. You can choose one or multiple fields, 
choose an offset and set the amount of profiles to include.

You can find the article about all other conditions [here](./selections-conditions).

## Variables

### Ordered fields

The sort/select condition specifies how to order your database. You can 
use only one field, the email address for example, which is most useful 
if you know all values will be unique. If you would sort on last name, 
however, you might encounter some duplicates. You can specify how to 
order these duplicates by adding another field to sort on, such as the 
first name. You can add as many fields as you need.

To sort you should also choose whether you want profiles sorted in 
ascending or descending order and whether to sort alphabetically or 
numerically.

### Offset and amount

The offset determines the starting position. The amount determines 
how many profiles you will select. A positive offset will select from 
the start of the data, a negative offset will select from the end of 
the data. A positive amount will select that amount of profiles, a negative 
number will select the total amount of profiles minus that amount. You 
can also specify these numbers in percentages.

## Examples

For the examples we use the following small database:

| Name    | Gender  | Score    |
|---------|---------|----------|
| Chris   | Male    | 90       |
| Mike    | Male    | 100      |
| Jessica | Female  | 80       |
| Emily   | Female  | 20       |
| Ashley  | Female  | 65       |
| Sam     | Female  | 100      |
| Josh    | Male    | 75       |
| Matt    | Male    | 70       |

You sent a quiz to your contacts that resulted in a score for each profile. 
Now let's send the winner an email. To do this you want to sort on the 
"Score" field in descending order, because you want the highest score. 
Since Mike and Sam both have a score of 100 you should 
add another field to order on. In this case we use "Name", but we 
recommend a more fair approach for your own contests. We only want to 
select one candidate, which is also the first one.

* **Add ordered field**: "Score", Descending, Numerical
* **Add ordered field**: "Name", Ascending, Alphabetical
* **Select from position**: 0 (the start)
* **Number to select**: 1

This will select Mike as the winner, since his name is first in the 
alphabetical order. Now let's send an email to number 2 and 3 to congratulate 
them too. We use the same sorting, but now we want to change the offset 
and number to select.

* **Add ordered field**: "Score", Descending, Numerical
* **Add ordered field**: "Name", Ascending, Alphabetical
* **Select from position**: 1 (We ignore the winner)
* **Number to select**: 2 (We select number 2 and 3)

Sam and Chris should now receive their emails. Now let's send the person 
with the lowest score an email to tell them they suck (we do not 
recommend doing this to your own customers). We'll use a negative offset 
to start from the bottom of the score list.

* **Add ordered field**: "Score", Descending, Numerical
* **Add ordered field**: "Name", Ascending, Alphabetical
* **Select from position**: -0
* **Number to select**: 1

We have now selected Emily from the database. We could have done the 
same thing by setting the "Score" to ascending and the offset to 0. As 
you can see, there are sometimes multiple ways to build your selections.

## More information

Read more about other conditions and rules for selections below.

* [Selections](selections-introduction)
* [Selection conditions and rules](selections-conditions)
