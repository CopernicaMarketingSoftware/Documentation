# Templates: Publisher

In the old Copernica publisher environment every document has a template. 
The template contains the global layout of the mail and the elements 
that are present in every email, such as a company logo and unsubscribe 
link. There are also blank spots that can be filled with content later. 
If you want to send a mailing you should make a template first and use 
the document to add the actual content. This allows for quick re-using 
of previous layout and buttons.

There is often a difference between the people who make the templates and 
people who compose the documents and add the content. Templates are often 
made by webdesigners or programmers with knowledge of HTML and CSS. They 
determine what the email should look like and where the content should be placed. 
The marketeer can then add the text and images and send the email.

In this article we discuss the basics of designing templates, but this 
is not a course in HTML, as this is a prerequisite. If you lack HTML knowledge 
you can use the default template, find one on the internet or have a Copernica 
partner design one for you. We assume at least basic knowledge of HTML.

## Keep it simple

In Copernica Publisher you can make templates with HTML. You can create 
these in the `E-mailings` menu where you can enter the source code. In 
general the more simpler the HTML, the more clients can view your email 
as you intended. Try to keep the HTML as simple as you can. 

Emails are read in many different ways on many different devices. There are 
older laptops, newer laptops, programs to access email and webmail environments. 
People often use old software that remove complicated scripts and CSS code. 
All of this means your template should be as robust as possible. A simple 
template is more robust than a more complicated one and leads to less problems 
and a bigger reach.

Eventually, as a Copernica user, you are free to design the template how 
you want. We sent the HTML 100% the way you entered it, so feel free to 
write it how you want. 

## Content blocks

Templates have blank spaces that are used to place content when actually 
creating the document. Such blank spaces are called **content blocks**, 
as this is where the content will be places. There are three content 
blocks: text, image and loop. The text and image tags are simply used 
to place text or images respectively. The loop block allows for repetition 
in the document, whether it be of text or images. It is possible to add 
minimum and maximum values, but in principle it can be used as often as 
needed.

* [[text] tags](./text-tag)
* [[image] tags](./image-tag)
* [[loop] tags](./loop-tag)

## Watch out for brackets

Within a template the square brackets have a special meaning; They are 
used to mark content blocks and you can use them for if statements and 
template variables. Because of this special meaning you have to watch out 
for errors caused by using them "normally". You can use [ldelim] and [rdelim] 
instead of '[' and ']' respectively to prevent errors in the template. 
You can also use [literal] and [\literal] to indicate where a literal block, 
where brackets are ignored, start and end.

Example:

    <style type="text/css">
        div[ldelim]class=x[rdelim] {
            font-weight: bold;
        }
    </style>
    
Of course, if you have a bigger piece of CSS this is very annoying; Every 
delimiter would have to be replaced. In this case it is better to use the 
literal block.

    <style type="text/css">
        [literal]
            div[class=x] {
                font-weight: bold;
            }
        [/literal]
    </style>
    
## Static images

Images are usually added at document level, but it's also possible to 
include images in your template, such as your company logo. You can 
do this with normal <img>, just make sure that the image your refer to 
is linked to the template. You can manage these images under "Files and images". 
These images are hosted on Copernica's servers in order to track the clicks 
and opens.

## More information

* [Templates](./templates)
* [Templates in Marketing Suite](./templates-marketing-suite)
* [Personalization in Publisher](personalizing-your-newsletter-in-the-publisher)
* [Followups](./followups)

### Template content

* [Text tag](text-tag)
* [Image tag](image-tag)
* [Loop tag](loop-tag)
