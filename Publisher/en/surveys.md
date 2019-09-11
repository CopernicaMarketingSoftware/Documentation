# Surveys in Publisher

In Publisher you can easily create beautiful surveys to learn the
opinion of your customers on your product or service. It's an easy way
to gather data about your customers, but it's important that you ask the
right questions in the right manner. For tips on how to ask questions
you can read [this article](./prevent-database-corruption).

Note: Surveys are currently not available in the Marketing Suite.

## Creating a survey

You can easily create your own survey under `Content` in the Publisher
main menu. It's even possible to automatically link information gathered
in the survey to your profiles by creating smart hyperlinks.

If you have added a name and description to your survey you can start
adding questions. There are multiple types of questions, such as the open
question and the multiple choice question. The different types of questions
are described in [this article](./surveys-question-types). Questions can
always be created, edited and removed in the **Surveys** menu.

Each questions has a few settings. Using these you can choose to make
a question optional or to start a question on a new page. A multiple choice
question also has the option of allowing multiple answers or not.

To finish your survey you send the participants to a concluding page.
You can add content to this page yourself. While it is not possible to
use [personalization](./personalization) here, you can link to your own
page using the following code:

`<script type="text/javascript"> document.location = "http://www.mijnwebsite.nl/bedankt"; </script>`

## Publishing a survey

### Linking

The best way to link to your survey is to use the profile identifier and
code. With this information Copernica can link the results to the profiles
in your database.

Image that your survey is published here:

`http://www.yourdomain.com/survey`

This means that you can use the following code for profiles:

`http://www.yourdomain.com/survey?profile={$profile.id}&code={$profile.code}`

And this code for subprofiles:

`http://www.yourdomain.com/survey?subprofile={$subprofile.id}&code={$subprofile.code}`

When this link is used by a profile to submit the survey you can find the
answers in the survey tab when the profile is selected.

### Adding to webpage

You can also choose to host your own [website](./websites) with Copernica
and add your survey to one of the webpages created in our software. In this
case you only have to add the following tag with the name of your survey.

`{survey name='surveyname'}`

You can add your own XSLT as well using the following code:

`{survey name='surveyname' xslt='xsltname'}`

An [XSLT](css-and-xslt) stylesheet can be created under the `Style` menu.

## Results

The results of a survey can be viewed per profile when the profile is
selected. You can also choose to export or
follow them up with [followups](./database-follow-ups).

## More information

You can do a lot more with surveys. The links below will help you
out with some more information.

### General

* [Prevent database corruption](./prevent-database-corruption)
* [Survey question types](./surveys-question-types)

### Edit style

* [Edit button text](./surveys-edit-buttons)
* [Remove # sign for numbering](./surveys-remove-hashtag)
