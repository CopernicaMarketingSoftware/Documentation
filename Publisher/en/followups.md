# Data-scripts

If someone clicks on a link in a mailing, or when some other kind of event
happens, Copernica can automatically execute or schedule follow up actions.
This allows you to make fancy campaigns that trigger new mailings when
things happen. 

There are even multiple ways how you can configure these
follow-ups. You can configure them in Publisher with a menu editor and 
in Marketing Suite with a script editor for programmers and a simple drag 
and drop editor for marketing specialists.

## Follow-Up Manager (Marketing Suite)

Within the [flowchart editor](./follow-up-manager-ms) you can chain boxes together to create 
advanced campaigns using followups. In some boxes you can add 
extra functionality with the use of JavaScript. The available properties 
are the same as those of the script editor and can be [found here](./followups-scripting.md). 
We designed the flowchart editor for marketers to create powerful 
campaigns with a clear beginning and end.

## Follow-Up Manager (Publisher)

[Follow-ups in Publisher](./publisher-follow-up-manager) are always accessible in the menu of the 
selected **database**, **document**, **survey** or **web form**. See the 
link for more information on creating followups in Publisher. The Publisher does not have
a scripting API, but because it has been around for so many years, it 
has still evolved into a very powerful tool.

## Script Editor

Programmers can use the full power of Copernica's follow up system with the
[*data-script* attribute](./followups-scripting.md). You can enrich 
every hyperlink in an email for example to handle clicks exactly how you 
want.

## Followup types

Followups consist of a cause and an action. For **databases**, 
**documents**, **surveys** and **webforms** there are different types 
of causes available. You can also set a delay and a destination. Different 
actions have different settings. More about all of this can be found 
[here](./followups-types).

## Conditions

You can add conditions to follow-up actions to make sure they behave 
exactly as intended. You can check these conditions on activation (creation 
of the condition) or execution (of the followup). Read more about conditions 
[here](./conditions-for-follow-ups).

## More information

There are many ways to create followups, so make sure you find out what 
works for you. There are different types of actions and triggers. You can 
also add a condition to indicate when to evaluate data. The articles 
below will teach you everything you need to know.

* [Follow-Up Manager Marketing Suite](./follow-up-manager-ms.md)
* [Follow-Up Manager Publisher](./follow-up-manager-publisher.md)
* [Follow-up scripting](./followups-scripting.md)
* [Follow-up types](./followups-types)
* [Follow-up conditions](./conditions-for-follow-ups)
