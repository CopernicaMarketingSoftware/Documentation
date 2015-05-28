#Top level properties

The ResponsiveEmail API takes a JSON object as its input, and turns that
object into a responsive email. At the root level of this JSON input object,
you can set many different properties to exactly specify what your
email should look like, and what content it should have.

There are three 'basic' top level properties:

*   <a href="/support/json/top-level-properties#meta-properties">META properties</a>
*   <a href="/support/json/top-level-properties#mime-properties">MIME properties</a>
*   <a href="/support/json/top-level-properties#content-and-style-properties">Content and style properties</a>

<p></p>
<p>
    The API also offers some
    <a href="/support/json/top-level-properties#advanced-properties">advanced properties</a>
    , such as the <code>rewrite</code> property.
</p>


<table class="info">
    <a class="anchor" name="meta-properties"></a>
    <thead>
        <tr>
            <td colspan="3">
                Top level meta properties
                <p>
                    Basic properties of a JSON document such as name, description and version number
                </p>
            </td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Property</td>
            <td>Type</td>
            <td>Description</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-name">name</a></td>
            <td><em>string</em></td>
            <td>User readable template name.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-description">description</a></td>
            <td><em>string</em></td>
            <td>User readable template description.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-version">version</a></td>
            <td><em>integer</em></td>
            <td>Version number of the JSON input.</td>
        </tr>
    </tbody>
    <a class="anchor" name="mime-properties"></a>
    <thead>
        <tr>
            <td colspan="3">
                Top level MIME properties
                <p>
                    Define various email headers of the JSON document
                </p>
            </td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Property</td>
            <td>Value</td>
            <td>Description</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-subject">subject</a></td>
            <td><em>string</em></td>
            <td>Subject line of the email.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-from">from</a></td>
            <td><em>object</em></td>
            <td>Email address and name of the sender.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-reply-to">replyTo</a></td>
            <td><em>object</em></td>
            <td>Optional email address and name of the user to which replies are sent.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-to">to</a></td>
            <td><em>array</em></td>
            <td>List of receivers.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-cc">cc</a></td>
            <td><em>array</em></td>
            <td>List of CC addresses.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-bcc">bcc</a></td>
            <td><em>array</em></td>
            <td>List of BCC addresses.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-headers">headers</a></td>
            <td><em>object</em></td>
            <td>Additional custom headers to be added to the mail header.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-attachments">attachments</a></td>
            <td><em>array</em></td>
            <td>Attachments to download and add to the email.</td>
        </tr>
    </tbody>
    <a class="anchor" name="content-and-style-properties"></a>
    <thead>
        <tr>
            <td colspan="3">
                Top level content and style properties
                <p>
                    Holds the actual email content
                </p>
            </td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Property</td>
            <td>Value</td>
            <td>Description</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-text">text</a></td>
            <td><em>string</em></td>
            <td>Supply text version for clients that do not support HTML emails</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-font">font</a></td>
            <td><em>object</em></td>
            <td>Template wide font and text settings.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-background">background</a></td>
            <td><em>object</em></td>
            <td>Background settings for the entire template.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-content">content</a></td>
            <td><em>object</em></td>
            <td>
                The main block that holds all of the other blocks and content
                of the responsive email.
            </td>
        </tr>
        <tr>
            <td><a href="/support/json/property-css">css</a></td>
            <td><em>object</em></td>
            <td>Custom CSS settings to be added to the &lt;body&gt; tag.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-attributes">attributes</a></td>
            <td><em>object</em></td>
            <td>Custom attributes to be added to the &lt;body&gt; tag.</td>
        </tr>
    </tbody>
    <thead>
        <tr>
            <td colspan="3">
                <a class="anchor" name="advanced-properties"></a>
                Top level advanced properties
                <p>
                    Just some advanced properties
                </p>
            </td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Property</td>
            <td>Value</td>
            <td>Description</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-rewrite">rewrite</a></td>
            <td><em>object</em></td>
            <td>Define specific rules to overwrite information specified in the JSON.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-tracking">tracking</a></td>
            <td><em>object</em></td>
            <td>Supply email tracking information.</td>
        </tr>
    </tbody>
</table>


## Example input

Just an idea of how a JSON document could look like.
<pre><code>
    {
        "name": "My template",
        "from": "info@example.com",
        "subject": "Example email",
        "background": {
            "color": "#f3f3f3"
        },
        "content": {
            "blocks": [{
                "type": "text",
                "content": "This is an example email"
            }, {
                "type": "image",
                "src": "http://placekitten.com/200/140"
            }]
        }
    }
</code></pre>
## Output

<table class="responsive-output" style="background-color: #f3f3f3;">
    <tr>
        <td>
            This is an example email
        </td>
    </tr>
    <tr>
        <td>
            <img src="//placekitten.com/200/140" />
        </td>
    </tr>
</table>
