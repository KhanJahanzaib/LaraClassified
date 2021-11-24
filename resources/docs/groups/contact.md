# Contact


## Send Form


Send a message to the site owner.

> Example request:

```bash
curl -X POST \
    "https://demo.laraclassifier.local/api/contact" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs" \
    -d '{"first_name":"John","last_name":"Doe","email":"john.doe@domain.tld","message":"Nesciunt porro possimus maiores voluptatibus accusamus velit qui aspernatur.","country_code":"US","country_name":"United Sates","captcha_key":"voluptate"}'

```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/contact"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=",
    "X-AppType": "docs",
};

let body = {
    "first_name": "John",
    "last_name": "Doe",
    "email": "john.doe@domain.tld",
    "message": "Nesciunt porro possimus maiores voluptatibus accusamus velit qui aspernatur.",
    "country_code": "US",
    "country_name": "United Sates",
    "captcha_key": "voluptate"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'https://demo.laraclassifier.local/api/contact',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'json' => [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@domain.tld',
            'message' => 'Nesciunt porro possimus maiores voluptatibus accusamus velit qui aspernatur.',
            'country_code' => 'US',
            'country_name' => 'United Sates',
            'captcha_key' => 'voluptate',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Your message has been sent to our moderators. Thank you.",
    "result": {
        "first_name": "John",
        "last_name": "Doe",
        "email": "john.doe@domain.tld",
        "message": "Nesciunt porro possimus maiores voluptatibus accusamus velit qui aspernatur.",
        "country_code": "US",
        "country_name": "United Sates",
        "captcha_key": "voluptate"
    }
}
```
<div id="execution-results-POSTapi-contact" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-contact"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-contact"></code></pre>
</div>
<div id="execution-error-POSTapi-contact" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-contact"></code></pre>
</div>
<form id="form-POSTapi-contact" data-method="POST" data-path="api/contact" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-contact', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-contact" onclick="tryItOut('POSTapi-contact');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-contact" onclick="cancelTryOut('POSTapi-contact');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-contact" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/contact</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-contact" data-component="body" required  hidden>
<br>
The user's first name.
</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-contact" data-component="body" required  hidden>
<br>
The user's last name.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-contact" data-component="body" required  hidden>
<br>
The user's email address.
</p>
<p>
<b><code>message</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="message" data-endpoint="POSTapi-contact" data-component="body" required  hidden>
<br>
The message to send.
</p>
<p>
<b><code>country_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country_code" data-endpoint="POSTapi-contact" data-component="body" required  hidden>
<br>
The user's country code.
</p>
<p>
<b><code>country_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country_name" data-endpoint="POSTapi-contact" data-component="body" required  hidden>
<br>
The user's country name.
</p>
<p>
<b><code>captcha_key</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="captcha_key" data-endpoint="POSTapi-contact" data-component="body"  hidden>
<br>
Key generated by the CAPTCHA endpoint calling (Required if the CAPTCHA verification is enabled from the Admin panel).
</p>

</form>


## Report post


Report abuse or issues

> Example request:

```bash
curl -X POST \
    "https://demo.laraclassifier.local/api/posts/3/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs" \
    -d '{"report_type_id":2,"email":"john.doe@domain.tld","message":"Et sunt voluptatibus ducimus id assumenda sint.","captcha_key":"est"}'

```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/posts/3/report"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=",
    "X-AppType": "docs",
};

let body = {
    "report_type_id": 2,
    "email": "john.doe@domain.tld",
    "message": "Et sunt voluptatibus ducimus id assumenda sint.",
    "captcha_key": "est"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'https://demo.laraclassifier.local/api/posts/3/report',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'json' => [
            'report_type_id' => 2,
            'email' => 'john.doe@domain.tld',
            'message' => 'Et sunt voluptatibus ducimus id assumenda sint.',
            'captcha_key' => 'est',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Your report has sent successfully to us. Thank you!",
    "result": {
        "report_type_id": 2,
        "email": "john.doe@domain.tld",
        "message": "Et sunt voluptatibus ducimus id assumenda sint.",
        "captcha_key": "est"
    },
    "extra": {
        "post": {
            "id": 3,
            "country_code": "US",
            "user_id": "2",
            "category_id": "7",
            "post_type_id": "2",
            "title": "Chevrolet Colorado (2018) used",
            "description": "Ex dolorum perspiciatis autem unde est velit quia. Quisquam provident quidem corrupti blanditiis dolorem officiis ducimus ipsa. Eum modi asperiores saepe voluptate quo. Dignissimos perferendis illum eaque nesciunt soluta laboriosam et. Quae id eum dolorem velit aut commodi quo id.\n\nVoluptates excepturi ut consectetur non facere. Eos voluptas magni dolore dolores tempore. Accusantium qui sed iste soluta necessitatibus ipsa incidunt. Dolor dolorum cupiditate inventore laborum saepe.\n\nIncidunt sed aut modi veritatis. Iste placeat nihil quas. Suscipit possimus voluptatem rerum quae sunt voluptatem quo ducimus.",
            "tags": "vel,quam,accusantium",
            "price": "80178.00",
            "negotiable": "0",
            "contact_name": "Admin Demo",
            "email": "admin@demosite.com",
            "phone": "+3581876675678",
            "phone_hidden": "0",
            "address": null,
            "city_id": "48771",
            "lat": "43.49",
            "lon": "-116.42",
            "ip_addr": "79.189.12.7",
            "visits": "27443",
            "tmp_token": null,
            "email_token": null,
            "phone_token": "demoFaker",
            "verified_email": "1",
            "verified_phone": "1",
            "accept_terms": "1",
            "accept_marketing_offers": "1",
            "is_permanent": "0",
            "reviewed": "1",
            "featured": "1",
            "archived": "0",
            "archived_at": "2021-03-20T02:33:49.000000Z",
            "deletion_mail_sent_at": null,
            "fb_profile": null,
            "partner": null,
            "created_at": "2021-03-14T03:45:26.000000Z",
            "updated_at": "2021-03-20T02:33:49.000000Z",
            "slug": "chevrolet-colorado-2018-used",
            "created_at_formatted": "Mar 13th, 2021 at 22:45",
            "user_photo_url": "https:\/\/secure.gravatar.com\/avatar\/2c8d72670651b506eb9d86d8e666b24a.jpg?s=150&d=http%3A%2F%2Fdemo.laraclassifier.local%2Fimages%2Fuser.jpg&r=g"
        }
    }
}
```
<div id="execution-results-POSTapi-posts--id--report" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-posts--id--report"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-posts--id--report"></code></pre>
</div>
<div id="execution-error-POSTapi-posts--id--report" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-posts--id--report"></code></pre>
</div>
<form id="form-POSTapi-posts--id--report" data-method="POST" data-path="api/posts/{id}/report" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-posts--id--report', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-posts--id--report" onclick="tryItOut('POSTapi-posts--id--report');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-posts--id--report" onclick="cancelTryOut('POSTapi-posts--id--report');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-posts--id--report" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/posts/{id}/report</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="POSTapi-posts--id--report" data-component="url" required  hidden>
<br>
The listing ID.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>report_type_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="report_type_id" data-endpoint="POSTapi-posts--id--report" data-component="body" required  hidden>
<br>
The report type ID.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-posts--id--report" data-component="body" required  hidden>
<br>
The user's email address.
</p>
<p>
<b><code>message</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="message" data-endpoint="POSTapi-posts--id--report" data-component="body" required  hidden>
<br>
The message to send.
</p>
<p>
<b><code>captcha_key</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="captcha_key" data-endpoint="POSTapi-posts--id--report" data-component="body"  hidden>
<br>
Key generated by the CAPTCHA endpoint calling (Required if the CAPTCHA verification is enabled from the Admin panel).
</p>

</form>



