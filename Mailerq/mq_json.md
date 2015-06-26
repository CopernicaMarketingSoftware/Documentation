<h1>Function MQ_Json</h1>
<p>
    If you want to get access to the JSON data that was loaded from RabbitMQ
    (for plugins that interact with messages that are going to be sent)
    and/or with the JSON data that is going to be published to RabbitMQ
    (for plugins that want to modify incoming messages), you can call
    the <a href="copernica-docs:Mailerq/mq_json">MQ_Json()</a> function.
</p>
<p>
    This function returns a 
    <a href="http://json-c.github.io/json-c/json-c-0.12/doc/html/json__object_8h.html">struct json_object</a>
    pointer. This is a pointer to a data type defined by the <a href="https://github.com/json-c/json-c">json-c</a>
    library. If you want to work with this data pointer, you therefore
    also need access to this JSON library.
</p>
<pre class="language-c"><code class="language-c">
/**
 *  Retrieve JSON data from a message
 *
 *  @param  message the message to retrieve the JSON from
 *  @return json    pointer to the JSON object
 */
struct json_object *<a href="copernica-docs:Mailerq/mq_json">MQ_Json</a>(<a href="copernica-docs:Mailerq/mq_message">MQ_Message</a> *message);
</code></pre>
<p>
    For more information on how to work with the JSON structure,
    please check the documentation of the json-c library:
</p>
<ul>
    <li><a href="https://github.com/json-c/json-c">JSON-C on Github</a></li>
    <li><a href="https://github.com/json-c/json-c/wiki">JSON-C wiki (also on Github)</a></li>
    <li><a href="http://json-c.github.io/json-c/">JSON-C API reference</a></li>
</ul>
