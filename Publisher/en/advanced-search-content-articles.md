If you have lots of articles, it is often more easy to use the search
and filter function provided under *Content*to find a specific article
that you are looking for. 

To find articles you can *(1)* enter a search term, and use the drop
down menus to filter articles *(2)* written by a specific author and/or
*(3)* in a specified language.

**Author:**When you select "John Smith" only articles that have at least
the author "John Smith" will be returned. Articles can have multiple
authors. It is not (yet) possible to search for articles that have both
author "John Smith" and "Peter Steele".

**Language:** The software allows you to specify a language by an
article and link articles together to serve as translations of
eachother. Selecting *English* will only return articles that have been
marked *English*.

**Full text searches:**With the search function, you can perform
full-text searches. That is, if you are searching on *Email*, you will
get results from matches found in both the *titles*and the *content* of
the articles.

To further narrow your search, you can use special characters
(*operators*) in your search term, to specify which words should be
included or excluded in your search.

**Searches are non-case sensitive.**

The search function supports the following operators

+ (AND)

A leading plus sign indicates that this word must be present in articles
that is returned.

- (NOT)

A leading minus sign indicates that this word must not be present in any
of the articles that are returned.

*No operator*(OR)

By default (when neither + nor - is specified), the word is optional,
but the articles that contain it are rated higher.

\* (asterisk)

The asterisk serves as the truncation operator. Unlike the other
operators, it is appended to the word to be affected. Words match if
they begin with the word preceding the \* operator.

“ (double quote)

A phrase that is enclosed within double quote (“"”) characters matches
only rows that contain the phrase literally, as it was typed. \
Non-word characters do not have to match exactly. For example,
"marketing software" matches "marketing, software". \
The following examples demonstrate some search strings that use
full-text operators:

-   *apple banana*

Find articles that contain at least one of the two words.

-   *+apple +juice*

Find articles that contain both words.

-   *+apple juice*

Find articles that contain the word “apple”, but rank rows higher if
they also contain “juice”.

-   *+apple -juice*

Find articles that contain the word “apple” but not “juice”.

-   *+apple \~juice*

Find articles that contain the word “apple”, but if the article also
contains the word “juice”, the article is rated lower in the results.
This is “softer” than a search for '+apple -juice', for which the
presence of “juice” causes the article not to be returned at all.

-   *apple\**

Find articles that contain words such as “apple”, “apples”,
“applesauce”, or “applet”.

-   *"some words"*

Find rows that contain the exact phrase “*some words*”

For example, articles that contain “*some words of wisdom*” but not
“*some noise words*”. It does return articles that contain “*…for some.
Words to…*” because any punctuation and case are ignored in the search).

 
