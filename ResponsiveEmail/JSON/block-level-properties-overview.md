#Block level properties overview

On this page we've collected all properties available on block level, including the blocks itself.

All properties described on this page exist inside the toplevel property `content`

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Block types</td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Property</td>
            <td>Type</td>
            <td>Description</td>   
        </tr>
        <tr>
            <td><a href="/support/json/columns">columns</a></td>
            <td><em>array with objects</em></td>
            <td>Add columns to your email layout</td>
        </tr>
        <tr>
            <td><a href="/support/json/text">text</a></td>
            <td><em>mixed</em></td>
            <td>Add text block to your design</td>
        </tr>
        <tr>
            <td><a href="/support/json/image">image</a></td>
            <td><em>mixed</em></td>
            <td>Add image block to your design</td>
        </tr>
        <tr>
            <td><a href="/support/json/button">button</a></td>
            <td><em>mixed</em></td>
            <td>Block that represents a single button</td>
        </tr>
        <tr>
            <td><a href="/support/json/seperator">seperator</a></td>
            <td><em>mixed</em></td>
            <td>BLock that represents a horizontal rule (HR)</td>
        </tr>
        <tr>
            <td><a href="/support/json/spacer">spacer</a></td>
            <td><em>mixed</em></td>
            <td>Add whitespace between blocks</td>
        </tr>
        <tr>
            <td><a href="/support/json/link">link</a></td>
            <td><em>mixed</em></td>
            <td>Block that represents a single hyperlink</td>
        </tr>
    </tbody>
    <thead>
        <tr>
            <td colspan="3">Block level common properties</td>
        </tr>
    </thead>
    <tbody>
        <tr><td colspan="3">The common properties are available for all block types.</td></tr>
        <tr class="thead">
            <td>Property</td>
            <td>Type</td>
            <td>Description</td>   
        </tr>
        <tr>
            <td>type</td>
            <td><em>string</em></td>
            <td>Identifier of the block type e.g., "button" for a button block. </td>
        </tr>
        <tr>
            <td><a href="/support/json/block-level-content-and-style-properties#background">background</a></td>
            <td><em>object</em></td>
            <td>Lets you specify background related properties for the block.</td>
        </tr>
        <tr>
            <td><a href="/support/json/block-level-content-and-style-properties#margin">margin</a></td>
            <td>mixed</td>
            <td>Specify cellpadding for the block element</td>
        </tr>
        <tr>
            <td>
                <a href="/support/json/property-container">container</a>
            </td>
            <td><em>object</em></td>
            <td>Allows you to add custom css and html attributes for the containing element. </td>
        </tr>
        <tr>
            <td><a href="/support/json/property-css">css</a></td>
            <td><em>object</em></td>
            <td>Add custom CSS to the block</td>    
        </tr>
        <tr>
            <td><a href="/support/json/property-attributes">attributes</a></td>
            <td><em>object</em></td>
            <td>Add custom HTML attributes to the block</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-visibility">visibility</a></td>
            <td><em>object</em></td>
            <td>Show or hide blocks based on device, client and/or subscriber data</td>
        </tr>
    </tbody>
    


</table>