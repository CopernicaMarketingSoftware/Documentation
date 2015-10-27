# Property `platforms`

The property `platforms` accepts a JSON array, with a comma seperated list with 
JSON objects, containing the actual `platforms` inside the `follow` block.
Each platform json block inside the `platforms` can have the following sub-properties:


## Platform json block sub-properties

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|
| name | _string_ | The name of the platform.  |
| [link](copernica-docs:ResponsiveEmail/json/property-link) | _object_ | Contains the `url` to follow for this platform.                                            |


    <table>
      <tbody>
        <tr>
          <th>Tables</th>
          <th align="center">Are</th>
          <th align="right">Cool</th>
        </tr>
        <tr>
          <td>col 3 is</td>
          <td align="center">right-aligned</td>
          <td align="right">$1600</td>
        </tr>
        <tr>
          <td>col 2 is</td>
          <td align="center">centered</td>
          <td align="right">$12</td>
        </tr>
        <tr>
          <td>zebra stripes</td>
          <td align="center">are neat</td>
          <td align="right">$1</td>
        </tr>
        <tr>
          <td>
            <ul>
              <li>item1</li>
              <li>item2</li>
            </ul>
          </td>
          <td align="center">See the list</td>
          <td align="right">from the first column</td>
        </tr>
      </tbody>
    </table>


## Example usage

The following input JSON shows how to set platforms in a follow block. This is
the basic usage, showing a set of follow buttons.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a follow block",
    "content" : {
        "blocks" : [ {
            "type"      : "follow",
            "label"     : "Follow us!",
            "align"     : "left",
            "icon"      : {
                "type"      : "rounded",
                "size"      : 32
            },
            "platforms" : [ {
                "name"  :   "facebook",
                "link"      : {
                    "url"       : "https://facebook.com/copernica"
                },
            },
            {
                "name"  :   "twitter",
                "link"      : {
                    "url"       : "https://twitter.com/copernica"
                },
            } ]
        } ]
    }
}
```
