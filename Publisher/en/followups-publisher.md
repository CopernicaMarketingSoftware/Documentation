# Follow-ups in Publisher

Follow-up actions are automatic responses to a certain event. This can
be for instance a click on a specific hyperlink, or a web from that is
submitted.

You can create an **infinite number of follow-up actions**, and there is
**no limitation** to the number of actions in a chain. Of course you can
also combine follow-ups for different parts:

-   [**Database/collection follow-up actions**](followups-publisher-databases-and-collections): The action is triggered by some
    event in the **database** and/or **collection**. Such as a profile
    that has been modified or a removed subprofile. \
     *Example: send a notification when a new profile is created in the
    database*
-   [**Web form follow-ups**](followups-publisher-web-forms): The action is triggered for example when
    the web form is submitted, or only when a specific answer has been
    given. \
    *Example: Send a confirmation mail to the submitter of a web form.*
-   [**Document follow-ups**](followups-publisher-mailing): Actions which are triggered by a response
    to a mailing. You can automate campaigns by setting follow-ups to
    respond to certain behaviour of recipients, such as clicks or
    views.\
     *Example: Automatically send another document one week after
    document A has been sent.*
-   **Survey follow-ups** are the response to the submission of a
    survey. You can automate campaigns by adding follow-up actions this
    way, just like with e-mailings.\
    *Example: Send a mobile message to say hello and thank you to the
    submitter of the survey*.

Creating a follow-up
--------------------

The follow-up dialog window can always be accessed from the menu of the
selected **database**, **document**, **survey**or **web form**. The
working of this wizard is the same for all types of follow-ups (there
are of course different actions to choose from).

To create a new follow-up, click on '**Create new follow-up action**' in
the bottom left of the dialog window.

![New follow up action](../images/newfollowup.png)

## The cause, the action and the delay

Characteristic of a follow-up action is that it always has a **cause**
(e.g. a click on a hyperlink) and an **effect**. (e.g. send a formatted
e-mail document). We call the effect the *action*. It is possible to set
a delay before the action to take into effect. Set the delay to zero if
the action should be executed immediately. \

The options you get after setting the cause and action, depends on the
type of action that you have chosen. If a document must be sent, you
will see a form allowing you to select the document that must be sent.
If profile data must be changed, an different form will be shown,
enabling you to select the field(s) that must be updated with new data
when the action is executed. It is all working very straight forward, so
you will hopefully manage to succeed with this pretty easily.

![The database follow up editor](../images/databasefollowup.png)

*Screenshot of the database follow-up editor*

## Conditions to constraint the scheduling or the execution of a follow-up

You can create extra conditions for both the cause and the effect of a
follow-up. You can use conditions to be sure that a follow-up action is
performed only when someone still meets certain requirements at the time
of execution. Or that the follow-up action will be scheduled only if the
person meets the conditions on that very moment. You can read more about 
it [here](./followups-publisher-conditions).

## Removing followups

If you want to delete followups or stop them temporarily you can find 
more information [here](./followups-publisher-stop).

## Tutorials

* [The White Paper marketing campaign](./followups-publisher-tutorial-white-paper)
* [Sending an email when a customer has spent over 1000 euros](./followups-publisher-tutorial-email-total)
* [Count submits and send an email to the Xth submitter](./followups-publisher-tutorial-count-submits)
* [Send confirmation mails](./followups-publisher-tutorial-confirmation-mail)

## More information

* [Followups general](./followups)
* [Conditions for follow-ups](./followups-publisher-conditions)
* [Stop follow-ups](./followups-publisher-stop).
* [Extra variables for followups](./followups-publisher-extra-variables)
* [Blog: Three signs you're ready to automate your email campaigns](https://www.copernica.com/en/blog/3-signs-youre-ready-to-automate-your-email-campaigns)
