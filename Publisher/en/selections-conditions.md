# Selections: Rules and conditions

As you may know, Copernica determines which profiles are added to a 
selection based on certain properties. All profile data you store in 
Copernica can be used for selection rules. Selection rules consist 
of conditions. There are many different conditions to use:

| Condition type                                                       | Description                                                                                                    |
|----------------------------------------------------------------------|----------------------------------------------------------------------------------------------------------------|
| Check on field                                                       | Check on values of a certain field, for example to select all residents of a city.                             |
| Check on interest                                                    | Check on interests of a profile, for example to select all interested in "tennis".                             |
| Check on date                                                        | Check on date, for example to make a [birthday selection](./how-to-create-a-birthday-selection).               |
| Check on e-mail results                                              | Check on the results of Publisher e-mail campaigns, for example if the last email was delivered.               |
| Check on results of mobile mailings                                  | Check on the results of mobile mailings.                                                                       |
| Check on results of fax mailings                                     | Check on the results of fax mailings.                                                                          |
| Check on marketing suite e-mail results                              | Check on the results of Marketing Suite e-mail campaigns.                                                      |
| Check on survey results                                              | Check on survey results, for example to send a reminder about answering your survey.                           |
| Check on double or single profiles                                   | Check if profiles are unique or duplicates, for example to ask users which account is the correct one.         |
| Check on contact history                                             | Check on contact history, for example to make a selection to re-establish contact with.                        |
| Check on planned contacts                                            | Check on planned contacts, for example to send a mailing the targets were already marked for.                  |
| Check on miniselection content                                       | Check on miniselection content, for example to exclude a miniselection of profiles with invalid data.          |
| Check on changes                                                     | Check on changes in the profile, for example to send a confirmation mail of recent profile changes.            |
| [Sort and/or select profiles](./selections-conditions-partcondition) | Sort or select profiles based on field values.                                                                 |
| Check content of other selection                                     | Check on other selection content.                                                                              |
| Check based on previous exports                                      | Check based on previous exports, for example if you only want to export profiles that weren't exported before. |

Profiles can be sorted or selected use the sort/select condition. Since 
this is a very powerful condition with many options we have written 
[this article](./selections-conditions-partcondition) to explain it 
in detail.

## Rules vs. conditions

Filtering profiles is done using selection rules and selection conditions. 
These are used to specify what properties the profile needs to have to 
be part of the selection. A rule and a condition are different things: 
Conditions can be strung together to form rules. "Female" and "Under 30" 
are both (field) conditions, for example, whereas "Female AND 
under 30" is a rule. 

## AND or OR

There are three different relations: AND, OR and OR NOT. All rules consist of 
one or multiple conditions and to satisfy a rule all of these conditions 
should be true. The rule "Female AND under 30" only applies if both 
condition "Female" and condition "under 30" are satisfied.

However, if you want to use the OR relation you only need to make 
multiple rules. To be included in a selection a profile only needs to 
satisfy one rule. If you want to make a selection of only young people 
with an interest in "wintersport" you could make two rules: "Under 30 
AND has interest skiing" and "Under 30 and has interest snowboarding". 
In this case, if someone is under 30 and interested in snowboarding or 
skiing they will be added to the selection. They don't have to be 
interested in both.

The last relation can also be negated to exclude people who satisfy 
a certain rule, the OR NOT relation. Let's imagine you have two 
versions of your newsletters: One for those interested in cars and one 
for those who are interested in biking. You decide to send the car 
newsletter to everyone with the interest "cars". You want to send 
every profile at least one newsletter, but you also want people interested 
in both "cars" and "biking" to receive both newsletters. To make the 
bike newsletter selection you make two rules: "has interest biking", OR NOT 
"has interest car".

## More information

By removing old selections and indexing you can make your selections faster. 
We have also written a few tutorials for common selections to help you 
get started. You can find out more in the articles below.

* [Selection management](./selections-introduction)
* [Settings for selections](selections-settings)
* [The sorting condition in-depth](./selections-conditions-partcondition)

### Selection tutorials

* [Tutorial: Birthday selection](./how-to-create-a-birthday-selection)
* [Tutorial: Newsletter selection](./create-a-mailing-list)
* [Tutorial: Automatically processing email bounces](./automatically-process-bounces)
* [Tutorial: Create a double opt-in for new subscribers](./create-a-double-optin-for-new-subscribers)
