# Personalization functions: textformat

*Textformat* is a function that can be applied to blocks of text to format 
them. It mostly cleans up spaces and special characters and formats paragraphs 
by wrapping at the character limit and adding indentation.

## Variables

It's possible to set to a preset style (currently only "email" is available), 
but you are also able to configure a style using them.

| Variable name  | Description                                               |
|----------------|-----------------------------------------------------------|
| style          | Preset style                                              |
| indent         | Number of chars to indent every line                      |
| indent_first   | Number of chars to indent first line                      |
| indent_char    | The character (or string of chars) to indent with         |
| wrap           | How many characters to wrap each line to                  |
| wrap_char      | The character to break each line with                     |
| wrap_cut       | Cut/don't cut at exact character instead of word boundary |
| assign         | Variable to assign output to                              |

In the default case there are no indents, but they would be single space if they 
existed. Each line is wrapped to 80 characters and cut to the word boundary 
and each line is broken with a "/n".

## Example

A simple example from the [Smarty documentation](http://www.smarty.net/docs/en/):

{textformat wrap=40}

   This is foo.
   This is foo.
   This is foo.
   This is foo.

   This is bar.

   bar foo bar foo     foo.
   bar foo bar foo     foo.

   {/textformat}

From this code we get the following output:
    
    This is foo. This is foo. This is foo.
    This is foo.

    This is bar.

    bar foo bar foo foo. bar foo bar foo
    foo.
    
However, we can also make this message look a lot different:

    {textformat wrap=20 indent=5 indent_char="*" wrap_cut=TRUE}

    This is foo.
    This is foo.
    This is foo.
    This is foo.

    This is bar.

    bar foo bar foo     foo.
    bar foo bar foo     foo.

    {/textformat}
    
The output looks like:

    *****This is foo. Th
    *****is is foo. This 
    *****is foo. This is 
    *****foo.
    
    *****This is bar.
    
    *****bar foo bar foo
    *****foo. bar foo ba
    *****r foo foo.
    
While it might not be a good idea to format your text like this, it 
illustrates how you can develop your own formatting with this function.

## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
