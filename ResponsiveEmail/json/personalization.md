# Personalization

You probably don't want to send everybody exactly the same email, to solve this
you can personalize the templates. This requires that your templates contain the
appropriate personalization tags and that you send your personalization data along
with your API requests. This personalization data is a basic key value structure,
we will often refer to key and value here so keep that in mind. Regarding the
personalization tags, our personalization engine is rather powerful, you can do
simple things like just printing a variable. But you can also calculate basic 
things, create simple if statements and for loops.

## Printing variables

Let's just start with the basics of printing a user supplied variable. This is
simply done by putting `{$key}` in your source, where key is the key of your
personalization data. But there is more to simply printing variables, sometimes
you might want to do some simple modifications to the data. Maybe you want all
the letters to be lowercase, you can simply do this by using `{$key|tolower}`.
Uppercase is also an option using `{$key|toupper}`. Some of these modifiers
can also take some parameters, for example `{$key|truncate:13:"...":true}`.
A complete list of these modifiers and their properties can be found below.

### Modifiers

| Modifier | Properties | Desc.                                                                                                                                                                                                                                                                                          |
|:---------|------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| toupper | None | Make all the letters uppercase                                                                                                                                                                                                                                                                        |
| tolower | None | Make all the letters lowercase                                                                                                                                                                                                                                                                        |
| ucfirst | None | Make sure the first character is uppercase                                                                                                                                                                                                                                                            |
| cat | Every parameter will be concatenated to the input | Concatenate multiple string together                                                                                                                                                                                                                         |
| count_words | None | Count the amount of words in the input string                                                                                                                                                                                                                                                     |
| count_characters | First parameter is a boolean specifying if we should inclue spaces or not, false by default | Count the amount of characters in the input string                                                                                                                                                    |
| count_paragraphs | None | Count the amount of paragraphs in the input string                                                                                                                                                                                                                                           |
| default | The value to print when the input is empty | Print a specified default value in case the input value is empty                                                                                                                                                                                                |
| indent | The first parameter is the amount of indents we should insert, default of 4. The second parameter is the character we should use a indent, default is 1 space. | Add indentation to all the new lines                                                                                                         |
| replace | First string is the string to look for, the second one is the one to replace it with | Apply some simple replace with operations on the input                                                                                                                                                                |
| regex_replace | First string is the regex to search for, the second one is the replace string | Apply some simple replace operations based on regex, in case of invalid regex the input string is returned                                                                                                             |
| nl2br | None | Replace all the new lines with html new lines                                                                                                                                                                                                                                                           |
| truncate | First parameter is the length at which we should truncate, default is 80. Second parameter is the string we should append to show that it got truncated, default is "...". Third parameter is if we are allowed to break up words or not, default is false. | Truncate the input string to a certain length |
| count | None | Count the amount of item inside the map or list                                                                                                                                                                                                                                                         |
| strlen | None | Returns the length of the input string                                                                                                                                                                                                                                                                 |
| empty | None | Returns true if the map, list or string is empty                                                                                                                                                                                                                                                        |
| trim | The characters to trim away, by default this are all whitespace characters | Trim of certain characters                                                                                                                                                                                                         |
| substr | First parameter is the character to start the substring at, second parameter is an optional length | Take a substring of the input                                                                                                                                                                            |
| strstr | One parameter which is the needle | Returns part of your input string starting from and including the first occurrence of the needle                                                                                                                                                                          |
| urlencode | None | Url encode the input                                                                                                                                                                                                                                                                                |
| urldecode | None | Url decode the input                                                                                                                                                                                                                                                                                |
| md5 | None | Returns a md5 hash of the input                                                                                                                                                                                                                                                                           |
| sha1 | None | Returns a sha1 hash of the input                                                                                                                                                                                                                                                                         |
| sha256 | None | Returns a sha256 hash of the input                                                                                                                                                                                                                                                                     |
| sha512 | None | Returns a sha512 hash of the input                                                                                                                                                                                                                                                                     |
| base64_encode | None | Base64 encodes the input                                                                                                                                                                                                                                                                        |
| base64_decode | None | Base64 decode the input                                                                                                                                                                                                                                                                         |

## If statements

You most likely want to show some content purely based on your input, so that's
why there is full support for if statements. Syntax for these is fairly easy,
`{if $key > 9000}true{/if}` will print true if the value behind $key is over
9000. But it doesn't stop right there, you can use `OR` and `AND` operators
within your if statements. Naturally we also support `elseif` and `else` statements,
meaning you can create complete statements like the following example.

```smarty
{if $key > 9000}
    Key is over 9000
{elseif $key < 0 AND $key > -1000}
    Key is negative, but not too negative
{else}
    None of the previous statements matched
{/if}
```

## Math

The personalization engine also supports some basic forms of math. Meaning that
`{$key*3}` will print the number stored in $`key` times 3. This of course also
supports the other basic math operators like plus, minus, divide, it even supports
modulo.
