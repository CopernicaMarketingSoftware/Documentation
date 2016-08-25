When delivering an e-mail, various errors can occur. For example, an
e-mail address no longer exists, or the email address may have never
existed at all.

For the sake of your sender reputation it is important that you process
these errors properly. That is, stop sending emails to these erroneous
addresses when two or three mailings subsequently have resulted in a
(most likely) persistent error.

The errors are processed automatically and can be excluded from future
mailings, with the use of selections.

### Step 1. Create the bounce selection

-   Create a new selection (choose type: check on email results)
-   Choose the destination (most likely profiles).
-   Choose **The mailing is sent after a date far in the past, such as
    January 1, 2008 and 0 days ago**(below the calendar to choose" 'use
    variable date')
-   At **results**, choose **"an error must have been registered"**
-   Choose at “*Error type \> Otherwise, namely*” to show a list of
    error types. From this list pick “*Error that does maybe occur again
    when the mailing is sent a second time*”.
-   Save the selection condition.

![The condition editor](dialog1.png)

### Step 2. Exclude the bouncers from the newsletter selection

To ensure that no future mailings will be sent to addresses included in
the bounce selection, you can add an extra rule to your newsletter
selection.

-   Scroll to the selection that holds your newsletter subscribers and
    click to *Database management*-\>**Edit selection** to edit the
    newsletter selection.
-   In the condition overview, create a new ['AND'
    condition](https://www.copernica.com/en/support/or-and-and-selection-conditions).
    Add it to the existing 'OR' rule.
-   Now choose '**Check content other selection**'. Choose the bounce
    selection and select '**All profiles are not in the above
    selection**'.

From now on, erroneous addresses are automatically excluded from your
newsletter selection.

-   Tip: Remove the profiles from your database automatically by using
    follow-up actions
-   Another tip: Use [double
    opt-in](https://www.copernica.com/en/support/create-a-double-optin-for-new-subscribers)
    to keep your database clean in the first place

