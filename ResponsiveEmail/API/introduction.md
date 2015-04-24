# API reference

The Responsive Email API provides a simple RESTful interface. This means 
that your application can access the API using the HTTP protocol. With
simple (secure) HTTP calls you can create, store and modify email messages
(in HTML or MIME format) and retrieve email statistics. All you need is
an [access-token](/app) and you are ready to go.


The API is accessible via the www.responsiveemail.com
domain. Every request starts with a <a href="/support/api/versions">version number</a>
, that allows us to make changes to the methods while keeping
backwards compatibility. With every request you also have to
send an `access_token` parameter to identify your application.

<pre><code>https://www.responsiveemail.com/v1/{RESOURCE}?access_token={YOUR_API_TOKEN}</code></pre>

**Note:** API requests must use secure HTTPS connections. Unsecure HTTP requests will
result in a 400 Bad Request response.

You can do a call to the API with any programming language that supports HTTP requests.
The following is an example of how to request the JSON representation of an email template.

    <?php
    // create curl resource
    $ch = curl_init();
    
    // set url
    $href = "https://www.responsiveemail.com/v1/template/$id/json?access_token=$token";
    curl_setopt($ch, CURLOPT_URL, $href);
    
    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    // $output contains the output string
    $output = curl_exec($ch);
    
    // get the status code (should be 200 if all went good)
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    // do something with the result if we succeeded
    if ($status == 200) {
    doSomethingWithResult($output);
    }
    
    // close curl resource to free up system resources
    curl_close($ch);

View more [code examples](/support/api/examples "code examples")


<div class="row-12">
    <div class="cols-6 gutter-small">
        <h2>Authentication</h2>
        <p>
            The API requires an application key (token) that is provided
            after you register your app. The key identifies your application
            to the service, and is used to track overall call usage. It's
            passed using the standard <code>access_token</code> parameter.
            If you haven't created a API key yet, now is the perfect time
            to <a href="/app/#/menu/register" title="register for free">register for free</a>
            and <a href="/app/#/admin/responsive-api" title="create your key">create your key</a>.
        </p>
    </div>
    <div class="cols-6 gutter-small">
        <h2>Template ID</h2>
        <p>
            You can store a template on the responsiveemail.com servers. After storing your template
            with a POST request, the API will return a link to your new template and show the template
            ID in the JSON output. This ID can then be used to retrieve the template via GET requests.
        </p>
    </div>
</div>
 

## Supported methods

The following table lists all the methods that are supported by the API.

<table class="info">
    <thead>
        <tr>
            <td colspan="3">
                GET methods
            </td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Method</td>
            <td>Description</td>
        </tr>
        <tr>
            <td><a href="/support/api/get-templates/">/v1/templates/{start}/{length}</td>
            <td>Returns a list of your templates</td>
        </tr>
        <tr>
            <td><a href="/support/api/get-template-json">/v1/template/{ID}/json</td>
            <td>Returns the JSON representation of an email template.</td>
        </tr>
        <tr>
            <td><a href="/support/api/get-template-html">/v1/template/{ID}/html</td>
            <td>Returns the HTML representation of an email for use inside an email.</td>
        </tr>
        <tr>
            <td><a href="/support/api/get-template-webversion">/v1/template/{ID}/webversion</td>
            <td>Returns the HTML representation of an email for us as a webversion.</td>
        </tr>
        <tr>
            <td><a href="/support/api/get-template-mime">/v1/template/{ID}/mime</td>
            <td>Returns the MIME representation of an email, with externally hosted images</td>
        </tr>
        <tr>
            <td><a href="/support/api/get-template-embedded">/v1/template/{ID}/embedded</td>
            <td>Returns the MIME representation of an email, with embedded images</td>
        </tr>
        <tr>
            <td><a href="/support/api/get-template-text">/v1/template/{ID}/text</td>
            <td>Returns the text version of an email.</td>
        </tr>
    </tbody>
    <thead>
        <tr>
            <td colspan="3">
                POST methods
            </td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Method</td>
            <td>Description</td>
        </tr>
        <tr>
            <td><a href="/support/api/post-template">/v1/template</td>
            <td>Store a new template.</td>
        </tr>
        <tr>
            <td><a href="/support/api/post-html">/v1/html</td>
            <td>Convert JSON input into a responsive HTML email, without creating a template resource</td>
        </tr>
        <tr>
            <td><a href="/support/api/post-webversion">/v1/webversion</td>
            <td>Convert JSON input into a responsive website, without creating a template resource</td>
        </tr>
        <tr>
            <td><a href="/support/api/post-mime">/v1/mime</td>
            <td>Convert JSON input into MIME with externally hosted images, without creating a template resource</td>
        </tr>
        <tr>
            <td><a href="/support/api/post-embedded">/v1/embedded</td>
            <td>Convert JSON input into MIME with embedded images, without creating a template resource</td>
        </tr>
    </tbody>
    <thead>
        <tr>
            <td colspan="3">
                DELETE methods
            </td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Method</td>
            <td>Description</td>
        </tr>
        <tr>
            <td><a href="/support/api/delete-template">/v1/template/{ID}</td>
            <td>Remove an existing template.</td>
        </tr>
    </tbody>
</table>

## Create your first JSON document

Head over to the [JSON documentation](/support/json/introduction "JSON documentation") and learn how to
create your first JSON documentation.

