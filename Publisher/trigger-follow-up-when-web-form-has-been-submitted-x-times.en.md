This article explains how you can trigger a follow-up action (every) X
times a web form has been submitted. This enables you for example to
send an email to each 1000st new subscriber of your newsletter.

### Step 1 - preparing your database

-   In your database, create an extra numeric field with the default
    value of **0**. Name this field **index**. We will use this field to
    sum the score.
-   Create another field, and name this field **winner.**This should be
    a text field without a default value. This field will be used to
    reveal the winner.

### Step 2 - The sign-up form

Create a new sign-up web form, or open the form where you want to
perform this action for.

Create a new **follow-up action**for the web form. Choose the following
settings:

-   **The form has been submitted**, and choose **0 minutes delay**.
-   When the form has been submitted, data of the profile should be
    changed.
-   Choose the action **Change (sub)profile data**
-   Click **continue**\

Choose the field **index**, and paste the following code in the field:

~~~~ {.language-php}

{capture assign="highest"}0{/capture}
{loadprofile multiple="1" source="the name of your database" assign="lp"}
{foreach from=$lp item=p}
    {if $p.index > $highest}
        {capture assign="highest"}
            {$p.index}
        {/capture}
    {/if}
{/foreach}
{math equation="x+1" x=$highest}
~~~~

This piece of code adds 1 to the current value in the field **index**
each time the webform is submitted.

We first initialize the variable **'highest'** by assigning 0 to it.
Then we use the
[loadprofile](http://www.copernica.com/en/support/loadprofile-and-loadsubprofile)
function to get (an array of) all profiles in the database. We use the
smarty foreach function to loop through the profiles from the loaded
database. Then we check if the value of the field **index** is greater
than the value of highest. Assign the new value to highest. Finally we
add 1 to the highest value, which is the value we write to the profile.

(do not forget to change the source to the name of your database)

![](followupcode.png)

You created a webform and linked a follow up action to it. Publish the
web form on a webpage.

![](website.png)

### Step 3 - Create the database follow-up

Create a **database follow-up** action for your database. The follow-up
action is triggered when a profile has been modified.

You are free to define the action for the follow-up. This can be the
**sending of a document**, or to modify the value of a profile field.

In this example, we will change the value in the field **winner** to
‘**YES**’ for each 1000th subscriber.

Create a condition for the follow-up. Click on **Edit condition**to edit
the condition for the triggering of the follow-up. Choose the
**JavaScript editor**and enter the following information:

            profile.index % 1000 == 0;
        

(what is does: it checks if the value in the field **index** can be
devided by 1000).

![](profilevolgnummer.png)

The number \<**1000**\> represents the 1000th subscriber. You may of
course alter this number to something else. To test the follow-up, set
it for example to \<2\>.

You're finished. Test the campaign.

To test the follow-up, submit the web form a few times, to see if
desired action is executed.

![](databaseview.png)
