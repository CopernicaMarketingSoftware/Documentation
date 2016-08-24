Images and files you use in your campaigns can be stored in different places. The most logical place to store files and images varies per purpose. Do you use an image only once in an e-mail? Then use the file and images folder of the (e-mail) document itself. But if an image is included in an e-mail template, it does of course make more sense to store it at the template.
If you are using the same image or file in various publications, it might be a good idea to store it in a media library. Files uploaded to a media library can be used anywhere across your campaigns.

It is also possible to store files at each profile in your Copernica database. More on this later.

Separate file folder for each publication

Each type of publication comes with its own folder for files and images. This folder can always be found in the menu of the publication.

You can save images and files at each single:
 email template (the images are also available in the underlying documents)

 email document

 survey

 webform

 Content feed article

 CSS style file

 XSLT file

 web page

 web template
Files and images are easily included in your publications. To load an image for example, use the following HTML code:

<img src="someimage.png" alt="Imagine an image here" />

Media library

In the Content section, you can create media libraries for centrally managing and storing files. Files and images that you have uploaded to a media library are automatically available in in any publication.

From the template source code of an emailing, you can retreive these files and images as follows:

(name of the file, preceded by the name of the medialib)

<img src="name-of-the-medialib/someimage.png" alt="Imagine an image here" />
 Read more about images and files in Copernica
Using images in image blocks

If image blocks are included in your HTML template, you can upload these directly to this block when working on the document. Of course it is also possible to select an image from the document / template images folder or from any media library in your account.

Show images conditionally

Images that are loaded from an image block can also be shown conditionally. This makes it possible to display different images based on specific characteristics of the recipient (eg, man, woman, Martian, clown).

To set these conditions, go to the settings of the image block and then click to the Conditions tab.
 Read more about setting block conditions
Resize and crop images

Images that you use in an image block can be further edited.
 It is possible to cut a portion of the image

 It is also possible to reduce the image size (with preservation of its original proportions)
You will find the special tabs (Resize and Crop) in the settings dialog of the image block

Use of images in email campaigns

If you use images in your e-mails, please note the following:
 Use only images of type: GIF, JPG, JPEG, and PNG.

 Your emails are more and more often opened on mobile phones or tablets. So do not include 4 mb images, but reduce them to the actual size required in your publication.

 Make sure you provide your images with so-called 'alt tags'. This is a description of the image that is displayed when the image is not visible. Also see the link tips below.
More topics
 Images not displayed, some tips

 Remove unwanted gaps in Outlook

 Images not aligned as intented in email client
Include images from a remote location in your publications

You do not necessarily have to store your files and images in Copernica. You can link to any image stored on a remote server.

If you want to be sure that your image is always displayed in your e-mail, choose the option "Save external images on our servers" when setting up a bulk mailing. The image then remains available forever. Even if the original remote image location does no longer exists.

Sending images along with a bulkmailing

Despite this option is still available Copernica, we highly discourage sending images (as an attachment) along with your emailings.

Read more:
 Images attached with e-mails: whether or not a good idea
Store files and images at the profile

It is possible to include an upload field in your Copernica webforms, allowing site visitors to upload files to their profile in your database.

Files uploaded to the profile can be easily retreived. Go to the profile. In the Files tab, you can find all the files of the profile.

Read more:
 Storing files at a profile in your Copernica database

 Add upload field to Content web form
Include files and images of the profile in your (personalized) publications

Files or images that have been uploaded to the profile, can be incorporated into your emailings and web pages. To refer to these files there are two special functions: Loadfile and linkfile.

PDF files

Copernica provides the ability to send (personalized) PDF files or link to a personalized PDF file from a web page or e-mailing.
 PDF files can be personalized with smarty code

 Files that you send as an attachment, or linked via the special {linkpdf} tag will be automatically personalized.
You can also save non-personalized PDF files in the file folders described earlier on this page.

Read more about this subject:
 Print, PDF and Fax Copernica
Linking to a personalized PDF file or enclose as attachment.