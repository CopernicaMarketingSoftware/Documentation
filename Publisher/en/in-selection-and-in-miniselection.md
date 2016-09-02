You can use in\_selection and in\_miniselection to show content only to
profiles or subprofiles from a specific selection or miniselection.

Content between the opening and closing tags is only visible to profiles
or subprofiles from a specified selection or miniselection.

-   If you refer to a selection or miniselection without using the full
    path to the selection or miniselection (e.g. Database:Selection),
    you must use the selection or miniselection ID to identify it.
-   To retreive the selection or miniselection ID, just hover the name
    of the selection in the database tree under profiles, or the name of
    the miniselection in the database selector under *Current view \>
    **Show subprofiles***. Its ID is displayed in the title tooltip. 

#### Example

> `{in_selection selection=20}`*Put some text here that should only be
> visible to profiles in this selection (selection with ID
> 20)*`     {/in_selection}`
>
> `    {in_selection selection=Database:Selectie:mySubSelection}`*Only
> profiles from subselection mySubSelection can read this
> text.*`     {/in_selection}`

**Using a miniselection is done with a in\_miniselection**

> `` {in_miniselection miniselection=50}   ` ``*Only subprofiles from
> the miniselection with ID 50 can read this
> text.*`     {/in_miniselection}`
>
> `     {in_miniselection miniselection=Database:myCollection:myMiniSelection}`*Only
> subprofiles from the miniselection 'myMiniSelection' in collection
> myCollection can read this text. Note that you must always use the
> full path, including the database, if your database has multiple
> collections*`.     {/in_miniselection}`

### Use in\_miniselection from a profile

Personalization with subprofiles is only possible if the destination is
a subprofile (from a collection). If your destination is a profile, you
can check if one of the subprofiles is in the miniselection as follows:

> `{foreach from=$profile.collectienaam item=sub}     {in_miniselection miniselection=99 subprofile=$sub.id}`*This
> text is only visible to subprofiles from the miniselection with id 99
> (hover the miniselection to see its
> ID).*`     {/in_miniselection}     {/foreach}`

### Use in\_selection conditional with if/else statements

If you have a situation wherein you want to show text A to profiles from
selection X, and text B to profiles NOT in selection X, you need to
assign the inselection to a variable first. Then you can use this
variabel inside an if statement as follows:\
\
`{capture assign="foo"}{in_selection selection=X}A{/in_selection}{/capture}`\
\
 After capturing this, you can create the if statement: \
`   {if $foo == 'A'}this text{else}other text{/if}`\
\
**Warning:** capture will also capture spaces and newlines. Therefore it
is important to ommit spaces and newlines inside a capture.
