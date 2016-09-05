Personalization only works when the website visitor is logged in. There
are various ways to log on users. For example when they click to your
website from an emailing.

### Through a login or sign up form

You can let your visitors login through a login form. When the user
filled in his details and a match is found in the database, the page
will be personalized with data from the profile. [Read how you create a
login
form](http://www.copernica.com/en/support/login-logout-and-forgot-password-form).

### Add login code to referring links

If you link from an emailing to a page, you'll have to add login code to
the link. This code contains the unique data of the visitor.

> **To personalize with a profile:**
>
> For example: http://www.company.nl/pagename should be coded as:
>
> http://www.company.nl/pagename**?profile={\$profile.id}&code={\$profile.code}**
>
> **To personalize with a subprofile:**
>
> Do you use collections? And does the personalization comes from the
> subprofile only or both the profile and subprofile?
>
> http://www.company.nl/pagename**?profile={\$subprofile.id}&code={\$subprofile.code}**

### If this does not work, please check the following

-   Does the profile or subprofile exist?
-   The login code for profiles and subprofiles is slightly different.
    Check if you have used the [right
    one](http://www.copernica.com/en/support/personalizing-from-a-profile-or-subprofile).
-   Do you personalize with data from both a database and a collection?
    Make sure you use login code for the subprofile. The other way
    around will not work.
-   Closing your browser may have ended the session. Try to login again.
-   Does your web browser accept cookies? Cookies are used to store user
    sessions. Try to enable your browser cookies for your website.

