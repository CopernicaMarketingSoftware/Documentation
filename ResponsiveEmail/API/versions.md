# API version numbers

To ensure that the API remains backwards compatible with previous versions,
all URL's are prefixed with a version number. This way your
application will keep functioning even when we decide to change the API.
Every time we make a change to the API that breaks compatibility we will
introduce new version numbers. Scripts that call the API using URL's
with a previous version number will not be affected by the changed API behavior.

<table class="info">
    <thead>
        <tr>
            <td colspan="2">API versions</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>v1</td>

            <td class="desc">First, and current, version of the API.</td>
        </tr>
    </tbody>
</table>

## What's the difference with the JSON version number?

We use two different version number schemes for the API: "v1", "v2", etcetera,
version numbering in the URL's that we described above and the
<a href="/support/json/property-version">version</a> property in the JSON
templates. What's the difference between these two?

The version number in the URL is modified every time we make changes to
the API end point. For example, if we decide to remove a method from the
API, or if we decide to change the name of a parameter. In these situations
the URL version number is changed.

If the way we process and turn JSON into responsive emails changes,
the version number in the JSON input is incremented.
