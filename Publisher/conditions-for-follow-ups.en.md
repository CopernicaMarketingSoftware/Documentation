The follow-ups of a mailing can be constraint. This means that
conditions are set for the scheduling and/or execution of the follow-up.
You can set these yourself by using the easy script editor. For the
advanced editor you need knowledge of JavaScript programming language.

It is possible to set conditions for both scheduling and executing
follow-up actions. You can make use of the simple script editor, or use
the JavaScript editor for more advanced conditions.

We distinguish two types of follow-up conditions:

1.  Scheduling condition (A)
2.  Execution condition (B)

![](images/followupsconditions.png)

### A. Scheduling condition

**Condition on the activation (scheduling) of a follow-up action**

The follow up is only scheduled when the person meets certain
requirements (e.g., when the condition evaluates to ‘true’)

These conditions are evaluated when a follow-up action is triggered (for
example: a click on a hyperlink to register). The follow-up action is
performed only if the profile or subprofile meets these conditions at
the time of activation. This condition is not evaluated when the
follow-up action is actually executed (which can be months later).\
 Execution condition

The follow-up is only executed when the person meets certain
requirements (i.g., when the condition evaluates to ‘true’)

**Example:** you created an email follow-up, but the follow-up should
only be scheduled for prospects, not for customers. In this situation
you can create a scheduling condition:

`profile.customerStatus == 'prospect';`

The follow-up is now only scheduled for profiles with the value
'prospect' in the database field 'customerStatus'

### B. Execution condition

**Condition on the execution of the follow-up**

These conditions are evaluated when a follow-up action is performed (for
example, sending a reminder e-mail). The follow-up action is performed
only if the profile or subprofile meets the requirements at the time
when the follow-up action was scheduled for execution (for example, do
not execute the follow-up action if the addressee has been unsubscribed
from your newsletter in the meantime).

**Example**: you are sending a reminder mail in a double optin
procedure: if the profile didn't confirm his subscription within one
week, you want to send a reminder mail. Obviously you don't want to send
the reminder to profiles already confirmed their subscription or opted
out in the meanwhile:

You could then create a condition on the execution of the follow-up:

`profile.Newsletter == 'not confirmed';`

The reminder mail is only sent if the profile has the value 'not
confirmed' in the database field 'Newsletter'

 
