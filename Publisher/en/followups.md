# Follow-ups

Automation is the favorite buzzword of many marketeers. Follow-ups in Copernica 
can automatically execute or schedule actions based on triggers, making them 
a great way to automate your own campaigns. You can design your own 
fancy campaigns, for example to send an email when someone clicks your 
link, or to congratulate someone on their birthday.

There are several different ways to do this with Copernica software. If you 
are new to automating campaigns the easiest way to create follow-ups is with 
the user-friendly drag 'n drop editor in the Marketing Suite. Programmers 
can use the advanced script editor in the Marketing Suite and Publisher offers 
a menu editor.

## Follow-Up Manager (Marketing Suite)

With the [flowchart editor](./follow-up-manager-ms) you can create simple 
or created follow-ups by simply chaining boxes together. The user-friendly 
interface makes it a great tool for users inexperienced with followups. 
Those with more technical knowledge can enable the advanced mode to get 
access to powerful features, for example Javascript evaluation and execution 
boxes to write your own logic.

### When to use the Marketing Suite flowchart editor?

The Marketing Suite flowchart editor is the best option for you in the 
following cases:

    - You're new to follow-ups and want the most user-friendly editor.
    - You want use link clicks, profile modifications and unsubscribes as triggers.
    - You want to re-use follow-up actions.
    - You want to execute additional or complex checks.
    - You want to use your own Javascript code to write checks and actions.

## Follow-Up Manager (Publisher)

[Follow-ups in Publisher](./follow-up-manager-publisher) are always accessible 
in the menu of the selected **database**, **document**, **survey** or **web form**. 
Follow-ups are created by combining a trigger and an action in the menu editor. 
The Publisher does not have a scripting API.

### When to use the Publisher menu editor?

The Publisher menu editor is the best option for you in the following cases:
    
    - You want to define follow-ups for webforms or surveys.
    - You want to use link clicks, impressions and profile modifications as triggers.
    - You want to send mobile mailings.
    - You want to create tasks to contact the person triggering the follow-up.
    - You want to trigger follow-ups when errors or impressions of a document 
    are registered.

## Script Editor

Programmers can use the full power of Copernica's follow-up system with the
[*data-script* attribute](./data-object.md). You can enrich 
every hyperlink in an email, for example, to handle clicks exactly how you 
want.

## More information

There are many ways to create follow-ups, so you can try which editor 
works better for you. You can also use both, but it is recommended that you 
don't create duplicate follow-ups. The articles below provide more information 
on how follow-ups work.

* [Follow-Up Manager Marketing Suite](./follow-up-manager-ms.md)
* [Follow-Up Manager Publisher](./follow-up-manager-publisher.md)
* [Follow-up scripting](./data-object.md)
