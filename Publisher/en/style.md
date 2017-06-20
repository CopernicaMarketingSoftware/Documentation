# Documentation styleguide

Introduction text Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. *Lay-out* menu under *Admin*.

## h2

Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? [style](style "style").

- Nam libero tempore, cum soluta 
- nobis est eligendi optio cumque 
- nihil impedit quo minus id quod 
- maxime placeat facere possimus

* omnis voluptas assumenda est
* omnis dolor repellendus. 
* Temporibus autem quibusdam 
* et aut officiis debitis aut 

1. At vero eos et accusamus et iusto odio dignissimos 
2. ducimus qui blanditiis praesentium voluptatum 
3. deleniti atque corrupti quos dolores et quas 
4. molestias excepturi sint occaecati cupiditate



### h3

At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.

#### h4

**Important**: Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.

| Markdown table                                        | Description
|-------------------------------------------------------|--------------------------------------|
| [**copernica**](./style)                              | Copernica account                    |
| [**mailing**](./style)                                | Previous mailing                     |
| [**message**](./style)                                | Personalized template                |
| [**template**](./style)                               | Standard template                    |
| [**database**](./style)                               | Database                             |
| [**collection**](./style)                             | Collection (subset of database)      |
| [**profile**](./style)                                | Profile                              |
| [**subprofile**](./style)                             | Subprofile (profile from collection) |
| [**destination**](./style)                            | Alias to profile/subprofile          |


<table>
    <tr>
        <td>html table</td>
        <td>optio cumque nihil impedit quo minus id quod maxime placeat</td>
    </tr>
    <tr>
        <td>type</td>
        <td>optio cumque nihil impedit quo minus id quod maxime placeat</td>
    </tr>
    <tr>
        <td>parameters</td>
        <td>optio cumque nihil impedit quo minus id quod maxime placeat</td>
    </tr>
    <tr>
        <td>timestamp</td>
        <td>optio cumque nihil impedit quo minus id quod maxime placeat</td>
    </tr>
</table>


##### h5

Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.

html
```html
<a href="http://www.example.com" data-script="profile.fields.newsletter = 'no';">Click here to unsubscribe</a>
```

json
```json
{
    "start": 0,
    "limit": 10,
    "total": 10,
    "data": [{
        "ID": "1",
        "name": "Company",
        "type": "text",
        "value": "",
        "displayed": true,
        "ordered": true,
        "length": "255",
        "textlines": "0",
        "hidden": false,
        "index": false
    }, ...
    }, {
        "ID": "11",
        "name": "Age",
        "type": "integer",
        "value": "",
        "displayed": false,
        "ordered": false,
        "length": "50",
        "textlines": "0",
        "hidden": false,
        "index": false
    }]
}
```

###### h6

Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?

![](../images/webform-set-behaviour-key-fields.png)
