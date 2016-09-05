In deze Copernica Whiteboard sessie geven we graag wat verdere uitleg
over de upgrade naar Smarty 3. We laten onder andere zien hoe functies
geschreven worden binnen uw templates en lichten nog wat andere
verbetering van Smarty versie 3 toe.

  --
  --

Hieronder vindt u de uitgeschreven tekst (in het Engels):

*Hi everyone, \
\
 My name is Martijn Otto and I'm here today to tell you a little about
Smarty and our upgrade process to Smarty version 3. From the next
release of our Publisher software, you will be able to make Smarty 3
templates for web and emailing documents. Smarty 3 offers some new
functionality which you might want to use.\
\
 For example, if you are somebody who writes Javascript in templates, up
until now, every curly brace you had to escape. You had to use the
{ldelim} and {rdelim} options to write for example functions, closures,
etcetera. Now in Smarty 3, this is no longer necessary. If you want to
write a same function from Smarty 2 in Smarty 3, you could do it like
this:\
\
*

`                         function abc () {                          //function                          }`

\
 *It's important that after the opening brace, there is a space. This
will cause Smarty 3 to recognize that this is not a Smarty-block. But
instead should be treated as a literal curly brace. So after this you
can just write your function codes and again close it with a closing
curly brace. Again it is important that between this and the last letter
of the function, that there is some white space again to make Smarty
recognize that it is not a normal Smarty function.\
\
 Other options are that instead of using {capture
assign=var}data{/capture}, you can now directly assign as if it were PHP
function. So you just write:* \
 \

`                         {$var="data"}                     `

\
 *This syntax is for people who are familiar with PHP and it also allows
some extra functionality. Like assigning arrays directly to template
variables. For example:* \
 \

`                         {$var=[10,20,30]}                     `

\
 *You can use the open array literal, that you probably know from
Javascript to write an array with for example three entries.\
\
 Now another new important functionality in Smarty 3 is writing
functions directly in your template. (Make sure you also have a look at:
[http://www.smarty.net/docs/en/language.function.function.tpl](http://www.smarty.net/docs/en/language.function.function.tpl "http://www.smarty.net/docs/en/language.function.function.tpl"))
This is very easy for example if you want to write some nested menus.
Normally, you would have to write a specific code for each nested level.
So for three nested levels, you would have to write three separate
blocks of code. This is no longer necessary. Because you can write one
function that will write one nested level of the menu. And you can call
the function itself from the function using recursion.\
\
 Another option is that for example, if you want to call functions or
built ins, you can use Smarty variables but also expressions within the
parameters of these functions.\
\
 Example:\
 Assuming an emailing send to a database with the field 'gender', one
might want to include a different file for male and female relations. In
Smarty 2, it was necessary to first assign the full file path to a
variable before calling linkfile, in Smarty 3 the expression can be put
directly in the parameter.\
\
*

Smarty 2:\
`                     {capture assign=image}{$profile.gender}.gif{/if}                     {linkfile file=$image}               `
\
\
 Smarty 3:\
`             {linkfile file="{$profile.gender}.gif"}             `

*So that is it for today. These new functions will be available in the
next release of Publisher. You will be able to choose whether you want
to define Smarty templates in version 2 or in version 3. Whichever is
more convenient for you. Also old templates by default will be using
Smarty version 2. So you will not need to update your existing
templates.*
