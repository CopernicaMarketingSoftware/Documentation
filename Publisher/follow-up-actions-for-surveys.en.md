Survey follow-ups are the response to the submission of a survey. You
can automate campaigns by adding follow-up actions this way, just like
with e-mailings. The function is found in Content under the survey menu.

![](images/addnewfollowup.png)

### Cause and action

A follow-up action consist of two parts: the cause and the action. When
creating a new follow-up action, you are first asked to choose the
cause.

You can choose from 2 different causes for the survey follow-up action:

-   **The survey has been sent:**activate follow-up when the participant
    completed and submitted the survey
-   **A specific answer has been given:** the participant completed the
    survey and gave specific answer(s)

![](images/survey-followup.png "Documentation/survey-followup.png")

-   **Delay**: the follow-up action can be executed directly (set: 0
    minutes) or after the period you specify here (for example, one week
    later).
-   **Action:** The actual follow-up action. Choose what should happen
    if the follow-up action is triggered. This may be sending an email
    to the profile or something else.

### Additional conditions for the follow-up actions

Sometimes you want to prevent that a follow-up action is scheduled or
executed. For example, the follow-up should only be scheduled when
survey participant is a customer, not a supplier. Or to prevent that a
follow-up email is not sent to people who have unsusbcribed in the
meantime.

There can be days, weeks, or even years between the scheduling and the
actual execution of a follow-up action. Therefor we differentiate
between **schedule conditions** and**action conditions.**

-   Create a **schedule condition** to ensure that the follow-up action
    will be scheduled under certain conditions only
-   Create an **action condition** to ensure that the follow-up action
    is executed under certain conditions only

### Copy follow-ups

When copying a document, follow-ups are not copied along.

Receive the answers when a survey is submitted
----------------------------------------------

You can receive the answers in your inbox everytime a survey has been
submitted.

To do so, create a survey follow-up action

-   **cause**, the survey has been sent
-   **effect**: send textual e-mail, choose fixed address and enter your
    e-mail address. Copy and paste the following text into the body of
    the e-mail:

<!-- -->

    {foreach from=$survey.questions key=number item=question}
        {$question.question}
        {$question.type}
    {if $question.type == "open"}
        {$question.answer}
    {else}
        {foreach from=$question.answer item=answer}
            {$answer}
        {/foreach}
        {/if}
    {/foreach}

This will output the answers given by the submitter.

 

#### Further reading

-   [Conditions for follow-up
    actions](./automate-campaigns-with-follow-up-actions)
-   [More information on follow-up
    actions](./conditions-for-follow-ups)
-   [Follow-up
    manager](./follow-up-manager)

