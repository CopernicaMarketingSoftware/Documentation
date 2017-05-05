# Templates and documents

Email documents are built with templates. In the template source code
you specify where content (for example text and images) can later be
added by the end user in the documents based on the template. This way
you can re-use your templates over and over again.

## Publisher's template system

The template system of the old Copernica Publisher is a lot more complicated 
than the new [drag 'n drop editor](./templates-marketing-suite) of the new Marketing Suite. 
Therefore we recommend new users to use this instead. In the Publisher 
template editor you write your own HTML code and indicate where in the 
template blocks of text and images should be placed. 

There is a layered system in the old Publisher: We distinguish between 
*documents* and *templates*. De template determines the layout and is 
made up of HTML code that determined where "text", "image" and "loop" blocks 
are placed. You can also use [Smarty functions and modifiers](./personalization) 
for placing content easily and personalization. Making the document does 
not require any knowledge of HTML, as it boils down to adding content to 
the blocks that have been made in the template.

This makes it easy to divide the work: A designer can write the HTML for 
the template, which the marketeer can fill with content to complete the mail.

## More information

The following articles will help you in creating templates and documents.

-   [Templates in Marketing Suite](./templates-marketing-suite)
-   [Use smarty personalization in your documents and templates](./personalization.md)
-   [Add textual content to a document using text blocks](./the-text-function-for-adding-textual-content-to-your-document.md)
-   [Add images to a document using image blocks using image blocks](./the-image-function-for-adding-images-to-your-document.md)
-   [Send a test e-mail](./send-a-test-mail-or-test-mailing.md)
-   [Tips to reduce HTML errors](./reducing-html-errors.md)
-   [Styling with CSS and XSLT](./css-and-xslt)
