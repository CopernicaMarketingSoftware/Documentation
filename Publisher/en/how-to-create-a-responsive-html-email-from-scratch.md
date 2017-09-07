# How to create a responsive HTML email from scratch

You must have heard this question before: will our newsletter look nice
on an iPhone? Or, why doesn't our email look just as nice as our
competitor's email? I'm going to teach you how to create an email
template that will look nice on an iPhone, Android or Windows8 phone. In
other words, today you are going to learn how to create a
[responsive](./responsive-design-preparing-your-emails-for-mobile.md "Responsive design: preparing your emails for mobile")
HTML email from scratch.

## Before you continue...

I'm assuming you already have the necessary skills for developing HTML
emails. Therefore I will not get into the nitty gritty details of things
to take into account when you're coding for different email clients.
However, I will cover specific responsive issues. But basic knowledge of
HTML/CSS should help you on your way. 

## Final product

What you'll be creating is an email that looks great on a desktop
computer and a mobile (smart)phone like an iPhone. 

```html
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style rel="stylesheet" type="text/css">
        /** * The CSS in this file applies to * JSON documents created with version 20 and higher */
        /* Media Queries */
        
        @media only screen and (max-width: 600px) {
            table.body center {
                min-width: 0 !important;
            }
            table.body .container {
                width: 95% !important;
            }
            table.body .row {
                width: 100% !important;
                display: block !important;
            }
            table.body .wrapper {
                display: block !important;
                padding-right: 0 !important;
            }
            table.body .columns,
            table.body .column {
                table-layout: fixed !important;
                float: none !important;
                width: 100% !important;
                padding-right: 0px !important;
                padding-left: 0px !important;
            }
            table.body .wrapper.first .columns,
            table.body .wrapper.first .column {
                display: table !important;
            }
            table.body table.columns td,
            table.body table.column td {
                width: 100% !important;
            }
            /* Prevent social media icons from becoming too small */
            table.body table.socialmedia td,
            table.body table.socialmedia td {
                width: auto !important;
            }
            table.body .columns td.one,
            table.body .column td.one {
                width: 8.333333% !important;
            }
            table.body .columns td.two,
            table.body .column td.two {
                width: 16.666666% !important;
            }
            table.body .columns td.three,
            table.body .column td.three {
                width: 25% !important;
            }
            table.body .columns td.four,
            table.body .column td.four {
                width: 33.333333% !important;
            }
            table.body .columns td.five,
            table.body .column td.five {
                width: 41.666666% !important;
            }
            table.body .columns td.six,
            table.body .column td.six {
                width: 50% !important;
            }
            table.body .columns td.seven,
            table.body .column td.seven {
                width: 58.333333% !important;
            }
            table.body .columns td.eight,
            table.body .column td.eight {
                width: 66.666666% !important;
            }
            table.body .columns td.nine,
            table.body .column td.nine {
                width: 75% !important;
            }
            table.body .columns td.ten,
            table.body .column td.ten {
                width: 83.333333% !important;
            }
            table.body .columns td.eleven,
            table.body .column td.eleven {
                width: 91.666666% !important;
            }
            table.body .columns td.twelve,
            table.body .column td.twelve {
                width: 100% !important;
            }
            table.body td.offset-by-one,
            table.body td.offset-by-two,
            table.body td.offset-by-three,
            table.body td.offset-by-four,
            table.body td.offset-by-five,
            table.body td.offset-by-six,
            table.body td.offset-by-seven,
            table.body td.offset-by-eight,
            table.body td.offset-by-nine,
            table.body td.offset-by-ten,
            table.body td.offset-by-eleven {
                padding-left: 0 !important;
            }
            table.body table.columns td.expander {
                width: 1px !important;
            }
            table.body .right-text-pad,
            table.body .text-pad-right {
                padding-left: 10px !important;
            }
            table.body .left-text-pad,
            table.body .text-pad-left {
                padding-right: 10px !important;
            }
            table.body .show-for-small,
            table.body .show-for-small img {
                display: table !important;
                max-height: none !important;
                line-height: normal !important;
                float: none !important;
                width: 100% !important;
                height: auto !important;
                visibility: visible !important;
            }
            table.body .hide-for-small,
            table.body .hide-for-small img,
            table.body .show-for-desktop,
            table.body .show-for-desktop img {
                display: none !important;
                max-height: 0 !important;
                font-size: 0 !important;
                line-height: 0 !important;
                float: left;
                /* Hide from people using Gmail webmail client */
                mso-hide: all;
                /* Hide from people using MS Outlook */
                overflow: hidden !important;
                /* The following attributes are for Windows Phone Outlook Exchange */
                width: 0;
                height: 0;
                visibility: hidden;
            }
            table.fluid-separator {
                width: 100% !important;
            }
        }
    </style>
    <title>Responsive example</title>
</head>

<body style="background-color:#ffffff;color:#222222;font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:18px;">
    <table class="body" style="background-color:#ffffff;border-collapse:collapse;border-spacing:0;height:100%;margin:0;padding:0;vertical-align:top;width:100%;">
        <tr style="padding:0;vertical-align:top;">
            <td valign="top" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;vertical-align:top;">
                <table class="container" align="center" style="border-collapse:collapse;border-spacing:0;margin:0 auto;padding:0;text-align:inherit;vertical-align:top;width:580px;">
                    <tr style="padding:0;vertical-align:top;">
                        <td style="padding:0px;">
                            <table class="row" style="border-collapse:collapse;border-spacing:0;display:block;padding:0;position:relative;vertical-align:top;width:100%;">
                                <tr style="padding:0;vertical-align:top;">
                                    <td width="100%" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">
                                        <table style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                                            <tr style="padding:0;vertical-align:top;">
                                                <td class="wrapper last" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0 20px 0 0;padding-right:0;position:relative;vertical-align:top;">
                                                    <table class="twelve columns" width="580" style="border-collapse:collapse;border-spacing:0;margin:0 auto;padding:0;vertical-align:top;width:580px;">
                                                        <tr style="padding:0;vertical-align:top;">
                                                            <td width="580" align="left" style="-moz-hyphens:auto;-webkit-hyphens:auto;border:none;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;"><img alt="" src="http://lorempixel.com/g/580/200/" width="580" style="-ms-interpolation-mode:bicubic;border:none;clear:both;color:#222222;display:block;font-family:Arial, Helvetica, sans-serif;font-size:14px;font-weight:normal;height:auto;max-width:100%;outline:0;text-decoration:none;width:auto;"></td>
                                                            <td class="expander" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0!important;vertical-align:top;visibility:hidden;width:0;"></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="row" style="border-collapse:collapse;border-spacing:0;display:block;padding:0;position:relative;vertical-align:top;width:100%;">
                                <tr style="padding:0;vertical-align:top;">
                                    <td width="100%" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">
                                        <table style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                                            <tr style="padding:0;vertical-align:top;">
                                                <td class="wrapper last" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0 20px 0 0;padding-right:0;position:relative;vertical-align:top;">
                                                    <table class="twelve columns" width="580" style="border-collapse:collapse;border-spacing:0;margin:0 auto;padding:0;vertical-align:top;width:580px;">
                                                        <tr style="padding:0;vertical-align:top;">
                                                            <td width="580" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">
                                                                <table class="spacer" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                                                                    <tr style="padding:0;vertical-align:top;">
                                                                        <td height="20" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;font-size:0;hyphens:auto;line-height:0;margin:0;padding:0;vertical-align:top;"> </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td class="expander" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0!important;vertical-align:top;visibility:hidden;width:0;"></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="row" style="border-collapse:collapse;border-spacing:0;display:block;padding:0;position:relative;vertical-align:top;width:100%;">
                                <tr style="padding:0;vertical-align:top;">
                                    <td class="wrapper" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0 20px 0 0;position:relative;vertical-align:top;">
                                        <table class="six columns" style="border-collapse:collapse;border-spacing:0;margin:0 auto;padding:0;vertical-align:top;width:280px;">
                                            <tr style="padding:0;vertical-align:top;">
                                                <td width="280" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;vertical-align:top;">
                                                    <table width="100%" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                                                        <tr style="padding:0;vertical-align:top;">
                                                            <td style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">
                                                                <table width="100%" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                                                                    <tr style="padding:0;vertical-align:top;">
                                                                        <td width="280" align="left" style="-moz-hyphens:auto;-webkit-hyphens:auto;border:none;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:20px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;"><img alt="" src="http://lorempixel.com/g/580/300/" width="280" style="-ms-interpolation-mode:bicubic;border:none;clear:both;color:#222222;display:block;font-family:Arial, Helvetica, sans-serif;font-size:14px;font-weight:normal;height:auto;max-width:100%;outline:0;text-decoration:none;width:auto;"></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table width="100%" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                                                        <tr style="padding:0;vertical-align:top;">
                                                            <td style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">
                                                                <table width="100%" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                                                                    <tr style="padding:0;vertical-align:top;">
                                                                        <td width="280" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">This is the left column</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="expander" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0!important;vertical-align:top;visibility:hidden;width:0;"></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="wrapper last" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0 20px 0 0;padding-right:0;position:relative;vertical-align:top;">
                                        <table class="six columns" style="border-collapse:collapse;border-spacing:0;margin:0 auto;padding:0;vertical-align:top;width:280px;">
                                            <tr style="padding:0;vertical-align:top;">
                                                <td width="280" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;vertical-align:top;">
                                                    <table width="100%" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                                                        <tr style="padding:0;vertical-align:top;">
                                                            <td style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">
                                                                <table width="100%" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                                                                    <tr style="padding:0;vertical-align:top;">
                                                                        <td width="280" align="left" style="-moz-hyphens:auto;-webkit-hyphens:auto;border:none;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:20px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;"><img alt="" src="https://lorempixel.com/g/580/300/" width="280" style="-ms-interpolation-mode:bicubic;border:none;clear:both;color:#222222;display:block;font-family:Arial, Helvetica, sans-serif;font-size:14px;font-weight:normal;height:auto;max-width:100%;outline:0;text-decoration:none;width:auto;"></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table width="100%" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                                                        <tr style="padding:0;vertical-align:top;">
                                                            <td style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">
                                                                <table width="100%" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                                                                    <tr style="padding:0;vertical-align:top;">
                                                                        <td width="280" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">This is the right column</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="expander" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0!important;vertical-align:top;visibility:hidden;width:0;"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="row" style="border-collapse:collapse;border-spacing:0;display:block;padding:0;position:relative;vertical-align:top;width:100%;">
                                <tr style="padding:0;vertical-align:top;">
                                    <td width="100%" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">
                                        <table style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                                            <tr style="padding:0;vertical-align:top;">
                                                <td class="wrapper last" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0 20px 0 0;padding-right:0;position:relative;vertical-align:top;">
                                                    <table class="twelve columns" width="580" style="border-collapse:collapse;border-spacing:0;margin:0 auto;padding:0;vertical-align:top;width:580px;">
                                                        <tr style="padding:0;vertical-align:top;">
                                                            <td width="580" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">
                                                                <table class="spacer" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                                                                    <tr style="padding:0;vertical-align:top;">
                                                                        <td height="20" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;font-size:0;hyphens:auto;line-height:0;margin:0;padding:0;vertical-align:top;"> </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td class="expander" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0!important;vertical-align:top;visibility:hidden;width:0;"></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="row" style="border-collapse:collapse;border-spacing:0;display:block;padding:0;position:relative;vertical-align:top;width:100%;">
                                <tr style="padding:0;vertical-align:top;">
                                    <td width="100%" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">
                                        <table style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                                            <tr style="padding:0;vertical-align:top;">
                                                <td class="wrapper last" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0 20px 0 0;padding-right:0;position:relative;vertical-align:top;">
                                                    <table class="twelve columns" width="580" style="border-collapse:collapse;border-spacing:0;margin:0 auto;padding:0;vertical-align:top;width:580px;">
                                                        <tr style="padding:0;vertical-align:top;">
                                                            <td width="580" align="left" style="-moz-hyphens:auto;-webkit-hyphens:auto;border:none;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;"><img alt="" src="http://lorempixel.com/g/580/250/" width="580" style="-ms-interpolation-mode:bicubic;border:none;clear:both;color:#222222;display:block;font-family:Arial, Helvetica, sans-serif;font-size:14px;font-weight:normal;height:auto;max-width:100%;outline:0;text-decoration:none;width:auto;"></td>
                                                            <td class="expander" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0!important;vertical-align:top;visibility:hidden;width:0;"></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="row" style="border-collapse:collapse;border-spacing:0;display:block;padding:0;position:relative;vertical-align:top;width:100%;">
                                <tr style="padding:0;vertical-align:top;">
                                    <td width="100%" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">
                                        <table style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                                            <tr style="padding:0;vertical-align:top;">
                                                <td class="wrapper last" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0 20px 0 0;padding-right:0;position:relative;vertical-align:top;">
                                                    <table class="twelve columns" width="580" style="border-collapse:collapse;border-spacing:0;margin:0 auto;padding:0;vertical-align:top;width:580px;">
                                                        <tr style="padding:0;vertical-align:top;">
                                                            <td width="580" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">
                                                                <table class="spacer" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                                                                    <tr style="padding:0;vertical-align:top;">
                                                                        <td height="50" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;font-size:0;hyphens:auto;line-height:0;margin:0;padding:0;vertical-align:top;"> </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td class="expander" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0!important;vertical-align:top;visibility:hidden;width:0;"></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
```


## The Basics

Every HTML document starts with a DOCTYPE, followed by the HEAD section,
BODY and so on. Create a new HTML document and use the following code:

```html
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Responsive example</title>
</head>

<body style="background-color:#ffffff;color:#222222;font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:18px;">
    <table class="body" style="background-color:#ffffff;border-collapse:collapse;border-spacing:0;height:100%;margin:0;padding:0;vertical-align:top;width:100%;">
        <tr style="padding:0;vertical-align:top;">
            <td valign="top" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;vertical-align:top;">
                <table class="container" align="center" style="border-collapse:collapse;border-spacing:0;margin:0 auto;padding:0;text-align:inherit;vertical-align:top;width:580px;">
                    <tr style="padding:0;vertical-align:top;">
                        <td style="padding:0px;">

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
```

Nothing extraordinary as you can see, except for the X-UA-Compatible and viewport meta tag.
Basically the viewport meta tag tells the email client (or browser) to assume that
the email is as wide as the screen width of the device. The X-UA-Compatible tag is there, just to prevent images from braking in Live Mail. 

Furthermore, I'm using a
table as container that spans across the full `width of the page`. You
can also use this container to style your email with a background color
since CSS stylings on the body tag is ignored by a couple of email
clients. Let's call this table the main container throughout this post.

**Note:** Make sure you set the cellpadding and cellspacing to zero to
prevent weird spacing issues in Outlook.

## Layout structure

Next is the layout structure of the design. Let's go back to the final
design you saw at the beginning of this post:

-   First we have the header, which contains an image.
-   Second I have two columns and last but not least the footer.

The width of the email is set to 580px. So let's go ahead and start
writing the rest of the HTML code.

### Coding the layout structure: header

The header will be wrapped inside of the main container table you saw
earlier. The one that spans across the full width of the page. The code
is as follows:

```html
<table class="row" style="border-collapse:collapse;border-spacing:0;display:block;padding:0;position:relative;vertical-align:top;width:100%;">
    <tr style="padding:0;vertical-align:top;">
        <td width="100%" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">
            <table style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                <tr style="padding:0;vertical-align:top;">
                    <td class="wrapper last" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0 20px 0 0;padding-right:0;position:relative;vertical-align:top;">
                        <table class="twelve columns" width="580" style="border-collapse:collapse;border-spacing:0;margin:0 auto;padding:0;vertical-align:top;width:580px;">
                            <tr style="padding:0;vertical-align:top;">
                                <td width="580" align="left" style="-moz-hyphens:auto;-webkit-hyphens:auto;border:none;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;"><img alt="" src="http://lorempixel.com/g/580/200/" width="580" style="-ms-interpolation-mode:bicubic;border:none;clear:both;color:#222222;display:block;font-family:Arial, Helvetica, sans-serif;font-size:14px;font-weight:normal;height:auto;max-width:100%;outline:0;text-decoration:none;width:auto;"></td>
                                <td class="expander" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0!important;vertical-align:top;visibility:hidden;width:0;"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
```

Make sure you've placed the code above inside the main container table.


### Coding the layout structure: two column article

One of the characteristics of a responsive email is that for example two
columns aligned next to each other, are stacked on top of each other
when viewed on a smaller screen. For a
non-responsive design, you can create a single table with two table
cells inside. But that would make it none responsive. So we are going to create two tables next to each other
instead. The table on the left will need to align to the left and the
right table will of course need to align to the right. Take a look at
the following code:

```
<table class="row" style="border-collapse:collapse;border-spacing:0;display:block;padding:0;position:relative;vertical-align:top;width:100%;">
   <tr style="padding:0;vertical-align:top;">
      <td class="wrapper" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0 20px 0 0;position:relative;vertical-align:top;">
         <table class="six columns" style="border-collapse:collapse;border-spacing:0;margin:0 auto;padding:0;vertical-align:top;width:280px;">
            <tr style="padding:0;vertical-align:top;">
               <td width="280" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;vertical-align:top;">
                  <table width="100%" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                     <tr style="padding:0;vertical-align:top;">
                        <td style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">
                           <table width="100%" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                              <tr style="padding:0;vertical-align:top;">
                                 <td width="280" align="left" style="-moz-hyphens:auto;-webkit-hyphens:auto;border:none;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:20px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;"><img alt="" src="http://lorempixel.com/g/580/300/" width="280" style="-ms-interpolation-mode:bicubic;border:none;clear:both;color:#222222;display:block;font-family:Arial, Helvetica, sans-serif;font-size:14px;font-weight:normal;height:auto;max-width:100%;outline:0;text-decoration:none;width:auto;"></td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                  </table>
                  <table width="100%" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                     <tr style="padding:0;vertical-align:top;">
                        <td style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">
                           <table width="100%" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                              <tr style="padding:0;vertical-align:top;">
                                 <td width="280" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">This is the left column</td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                  </table>
               </td>
               <td class="expander" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0!important;vertical-align:top;visibility:hidden;width:0;"></td>
            </tr>
         </table>
      </td>
      <td class="wrapper last" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0 20px 0 0;padding-right:0;position:relative;vertical-align:top;">
         <table class="six columns" style="border-collapse:collapse;border-spacing:0;margin:0 auto;padding:0;vertical-align:top;width:280px;">
            <tr style="padding:0;vertical-align:top;">
               <td width="280" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;vertical-align:top;">
                  <table width="100%" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                     <tr style="padding:0;vertical-align:top;">
                        <td style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">
                           <table width="100%" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                              <tr style="padding:0;vertical-align:top;">
                                 <td width="280" align="left" style="-moz-hyphens:auto;-webkit-hyphens:auto;border:none;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:20px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;"><img alt="" src="https://lorempixel.com/g/580/300/" width="280" style="-ms-interpolation-mode:bicubic;border:none;clear:both;color:#222222;display:block;font-family:Arial, Helvetica, sans-serif;font-size:14px;font-weight:normal;height:auto;max-width:100%;outline:0;text-decoration:none;width:auto;"></td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                  </table>
                  <table width="100%" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                     <tr style="padding:0;vertical-align:top;">
                        <td style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">
                           <table width="100%" style="border-collapse:collapse;border-spacing:0;padding:0;vertical-align:top;">
                              <tr style="padding:0;vertical-align:top;">
                                 <td width="280" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;vertical-align:top;">This is the right column</td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                  </table>
               </td>
               <td class="expander" style="-moz-hyphens:auto;-webkit-hyphens:auto;border-collapse:collapse!important;hyphens:auto;margin:0;padding:0!important;vertical-align:top;visibility:hidden;width:0;"></td>
            </tr>
         </table>
      </td>
   </tr>
</table>
```

Place this code right below the 'header'. 

### Coding the layout structure: footer

The footer looks a lot like the header structure. Go ahead
and copy the code of the header and paste it below the two columns.


## Content & style

You should now have a solid foundation of the layout structure of the
email design. We can start adding content and different styles to make
it look shiny and all. And most important make it look nice on a mobile
device.


## Add some responsiveness

I'm using media queries to make things responsive. Media queries is a
css function to make an HTML design act responsive. Another technique is to
create your designs fluid by using percentages for widths. Media queries
give you a bit more control over your design.

Place the code below in HEAD section of your email HTML document. You
can paste it right after your CSS styles.

```
<style rel="stylesheet" type="text/css">
    /* Media Queries */
    
    @media only screen and (max-width: 600px) {
        table.body center {
            min-width: 0 !important;
        }
        table.body .container {
            width: 95% !important;
         }
        table.body .row {
            width: 100% !important;
            display: block !important;
        }
        table.body .wrapper {
            display: block !important;
            padding-right: 0 !important;
        }
        table.body .columns,
        table.body .column {
            table-layout: fixed !important;
            float: none !important;
            width: 100% !important;
            padding-right: 0px !important;
            padding-left: 0px !important;
        }
        table.body .wrapper.first .columns,
        table.body .wrapper.first .column {
            display: table !important;
        }
        table.body table.columns td,
        table.body table.column td {
            width: 100% !important;
        }
        /* Prevent social media icons from becoming too small */
        table.body table.socialmedia td,
        table.body table.socialmedia td {
            width: auto !important;
        }
        table.body .columns td.one,
        table.body .column td.one {
            width: 8.333333% !important;
        }
        table.body .columns td.two,
        table.body .column td.two {
            width: 16.666666% !important;
        }
        table.body .columns td.three,
        table.body .column td.three {
            width: 25% !important;
        }
        table.body .columns td.four,
        table.body .column td.four {
            width: 33.333333% !important;
        }
        table.body .columns td.five,
        table.body .column td.five {
            width: 41.666666% !important;
        }
        table.body .columns td.six,
        table.body .column td.six {
            width: 50% !important;
        }
        table.body .columns td.seven,
        table.body .column td.seven {
            width: 58.333333% !important;
        }
        table.body .columns td.eight,
        table.body .column td.eight {
            width: 66.666666% !important;
        }
        table.body .columns td.nine,
        table.body .column td.nine {
            width: 75% !important;
        }
        table.body .columns td.ten,
        table.body .column td.ten {
            width: 83.333333% !important;
        }
        table.body .columns td.eleven,
        table.body .column td.eleven {
            width: 91.666666% !important;
        }
        table.body .columns td.twelve,
        table.body .column td.twelve {
            width: 100% !important;
        }
        table.body td.offset-by-one,
        table.body td.offset-by-two,
        table.body td.offset-by-three,
        table.body td.offset-by-four,
        table.body td.offset-by-five,
        table.body td.offset-by-six,
        table.body td.offset-by-seven,
        table.body td.offset-by-eight,
        table.body td.offset-by-nine,
        table.body td.offset-by-ten,
        table.body td.offset-by-eleven {
            padding-left: 0 !important;
        }
        table.body table.columns td.expander {
            width: 1px !important;
        }
        table.body .right-text-pad,
        table.body .text-pad-right {
            padding-left: 10px !important;
        }
        table.body .left-text-pad,
        table.body .text-pad-left {
            padding-right: 10px !important;
        }
        table.body .show-for-small,
        table.body .show-for-small img {
            display: table !important;
            max-height: none !important;
            line-height: normal !important;
            float: none !important;
            width: 100% !important;
            height: auto !important;
            visibility: visible !important;
        }
        table.body .hide-for-small,
        table.body .hide-for-small img,
        table.body .show-for-desktop,
        table.body .show-for-desktop img {
            display: none !important;
            max-height: 0 !important;
            font-size: 0 !important;
            line-height: 0 !important;
            float: left;
            /* Hide from people using Gmail webmail client */
            mso-hide: all;
            /* Hide from people using MS Outlook */
            overflow: hidden !important;
            /* The following attributes are for Windows Phone Outlook Exchange */
            width: 0;
            height: 0;
            visibility: hidden;
        }
        table.fluid-separator {
            width: 100% !important;
        }
    }
</style>
```

What the media query code tells mobile email clients (and browsers) is
that below the 600px threshold, a mobile-friendly layout should be
displayed

The width of every table is set to 100% width. And I'm using !important
to over-ride the fixed-widths from tables.

**Note:** Media queries only work when embedded into the HTML. Basically
this means that you cannot use it as inline styles.

## Quick tip if you're using Copernica Marketing Software

Copernica has a very handy tool that puts your CSS inline, which is
really what you should be doing anyway.

## That's it!

If you have followed the steps above you should now have an email that
looks great on mobile devices! Now go and impress your clients or boss.
Please do share your own design or if you have any tips, let us know!
