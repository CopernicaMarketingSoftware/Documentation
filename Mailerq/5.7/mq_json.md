<h1>Function MQ_json</h1>
<p>
    If you want to get access to the JSON data that was loaded from RabbitMQ
    (for plugins that interact with messages that are going to be sent)
    and/or with the JSON data that is going to be published to RabbitMQ
    (for plugins that want to modify incoming messages), you can call
    the <a href="mq_json">MQ_json()</a> function.
</p>
<p>
    This function returns a "struct fjson_object". This is a pointer to a data 
    from the >a href="https://github.com/rsyslog/libfastjson">libfastjson</a>
    library. If you want to work with this data pointer, you therefore
    also need access to this JSON handling library.
</p>
<pre class="language-c"><code class="language-c">
/**
 *  Retrieve JSON data from a message
 *
 *  @param  message the message to retrieve the JSON from
 *  @return json    pointer to the JSON object
 */
struct fjson_object *<a href="mq_json">MQ_json</a>(<a href="mq_message">MQ_Message</a> *message);
</code></pre>
<p>
    For more information on how to work with the JSON structure,
    please check the documentation of the libjson library:
</p>
<ul>
    <li><a href="https://github.com/rsyslog/libfastjson">Libfastjson on Github</a></li>
</ul>
