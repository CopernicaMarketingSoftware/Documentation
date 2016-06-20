# Personalization

You probably don't want to send everybody exactly the same email, to solve this
you can personalize the templates. This requires that your templates contain the
appropriate personalization tags and that you send your personalization data along
with your API requests. This personalization data is a basic key value structure,
we will often refer to key and value here so keep that in mind. Regarding the
personalization tags, our personalization engine is rather powerful, you can do
simple things like just printing a variable. But you can also calculate basic 
things, create simple if statements and for loops.


## Basics:

Let's just start with the basics of printing a user supplied variable. This is
simply done by putting `{$key}` in your source, where key is the key of your
personalization data. But there is more to simply printing variables, sometimes
you might want to do some simple modifications to the data. Maybe you want all
the letters to be lowercase, you can simply do this by using `{$key|tolower}`.
Uppercase is also an option using `{$key|toupper}`. Some of these modifiers
can also take some parameters, for example `{$key|truncate:13:"...":true}`.
A complete list of these modifiers and their properties can be found below.

If you want to bring your personalization to a next level you can read our
[programming page](../documentation/personalization-programming) or read how you can
easily can [modify](../documentation/personalization-modifiers) your variables. 
