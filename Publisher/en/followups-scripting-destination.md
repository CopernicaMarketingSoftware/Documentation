# Followups: destination variable

A variable that gives access to current emailing **destination**. This variable might
be either an alias to a [profile](./followups-scripting-profile.md) or a
[subprofile](./followups-scripting-subprofile.md). It's set to a profile if
emailing was sent to a database or selection. It's set to a subprofile if emailing
was sent to a collection or mini-selection.

You can edit the variable and its available properties from Javascript code 
or by editing the data-object of the profile/subprofile itself. You can edit 
profile data with the stack icon when a (sub)profile is selected under "Database & Profiles".

## Available properties

* **data**: See documentation on [the data object](./followups-scripting-data).

## More information

* [The data-script object](./followups-scripting)
* [Data object](./followups-scripting-data)
* [Profile variable](./followups-scripting-profile)
* [Subprofile variable](./followups-scripting-subprofile)
