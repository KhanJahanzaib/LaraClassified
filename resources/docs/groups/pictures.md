# Pictures


## Get picture




> Example request:

```bash
curl -X GET \
    -G "https://demo.laraclassifier.local/api/pictures/non?embed=post" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/pictures/non"
);

let params = {
    "embed": "post",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=",
    "X-AppType": "docs",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'https://demo.laraclassifier.local/api/pictures/non',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'post',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "success": false,
    "message": "Page Not Found."
}
```
<div id="execution-results-GETapi-pictures--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-pictures--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pictures--id-"></code></pre>
</div>
<div id="execution-error-GETapi-pictures--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pictures--id-"></code></pre>
</div>
<form id="form-GETapi-pictures--id-" data-method="GET" data-path="api/pictures/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-pictures--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-pictures--id-" onclick="tryItOut('GETapi-pictures--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-pictures--id-" onclick="cancelTryOut('GETapi-pictures--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-pictures--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/pictures/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-pictures--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-pictures--id-" data-component="query"  hidden>
<br>
The list of the picture relationships separated by comma for Eager Loading.
</p>
</form>


## Store picture

<small class="badge badge-darkred">requires authentication</small>

Note: This endpoint is only available for the multi steps listing edition.

> Example request:

```bash
curl -X POST \
    "https://demo.laraclassifier.local/api/pictures" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs" \
    -F "country_code=US" \
    -F "count_packages=3" \
    -F "count_payment_methods=1" \
    -F "post_id=2" \
    -F "pictures[]=@/private/var/folders/r0/k0xbnx757k3fnz09_6g9rp6w0000gn/T/phpIUsWLu" 
```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/pictures"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=",
    "X-AppType": "docs",
};

const body = new FormData();
body.append('country_code', 'US');
body.append('count_packages', '3');
body.append('count_payment_methods', '1');
body.append('post_id', '2');
body.append('pictures[]', document.querySelector('input[name="pictures[]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'https://demo.laraclassifier.local/api/pictures',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'multipart' => [
            [
                'name' => 'country_code',
                'contents' => 'US'
            ],
            [
                'name' => 'count_packages',
                'contents' => '3'
            ],
            [
                'name' => 'count_payment_methods',
                'contents' => '1'
            ],
            [
                'name' => 'post_id',
                'contents' => '2'
            ],
            [
                'name' => 'pictures[]',
                'contents' => fopen('/private/var/folders/r0/k0xbnx757k3fnz09_6g9rp6w0000gn/T/phpIUsWLu', 'r')
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "success": false,
    "message": "Post not found",
    "result": null,
    "error_code": 1
}
```
<div id="execution-results-POSTapi-pictures" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-pictures"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pictures"></code></pre>
</div>
<div id="execution-error-POSTapi-pictures" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pictures"></code></pre>
</div>
<form id="form-POSTapi-pictures" data-method="POST" data-path="api/pictures" data-authed="1" data-hasfiles="1" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"multipart\/form-data","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-pictures', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-pictures" onclick="tryItOut('POSTapi-pictures');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-pictures" onclick="cancelTryOut('POSTapi-pictures');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-pictures" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/pictures</code></b>
</p>
<p>
<label id="auth-POSTapi-pictures" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-pictures" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>country_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country_code" data-endpoint="POSTapi-pictures" data-component="body" required  hidden>
<br>
The code of the user's country.
</p>
<p>
<b><code>count_packages</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="count_packages" data-endpoint="POSTapi-pictures" data-component="body" required  hidden>
<br>
The number of available packages.
</p>
<p>
<b><code>count_payment_methods</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="count_payment_methods" data-endpoint="POSTapi-pictures" data-component="body" required  hidden>
<br>
The number of available payment methods.
</p>
<p>
<b><code>post_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="post_id" data-endpoint="POSTapi-pictures" data-component="body" required  hidden>
<br>
The post's ID.
</p>
<p>
<b><code>pictures</code></b>&nbsp;&nbsp;<small>file[]</small>     <i>optional</i> &nbsp;
<input type="file" name="pictures.0" data-endpoint="POSTapi-pictures" data-component="body"  hidden>
<input type="file" name="pictures.1" data-endpoint="POSTapi-pictures" data-component="body" hidden>
<br>
The files to upload.
</p>

</form>


## Delete picture

<small class="badge badge-darkred">requires authentication</small>

Note: This endpoint is only available for the multi steps listing edition.
For newly created listings, the post's ID need to be added in the request input with the key 'new_post_id'.
The 'new_post_id' and 'new_post_tmp_token' fields need to be removed or unset during the listing edition steps.

> Example request:

```bash
curl -X DELETE \
    "https://demo.laraclassifier.local/api/pictures/ducimus" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs" \
    -d '{"post_id":2}'

```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/pictures/ducimus"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=",
    "X-AppType": "docs",
};

let body = {
    "post_id": 2
}

fetch(url, {
    method: "DELETE",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'https://demo.laraclassifier.local/api/pictures/ducimus',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'json' => [
            'post_id' => 2,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "success": false,
    "message": "Page Not Found."
}
```
<div id="execution-results-DELETEapi-pictures--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-pictures--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-pictures--id-"></code></pre>
</div>
<div id="execution-error-DELETEapi-pictures--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-pictures--id-"></code></pre>
</div>
<form id="form-DELETEapi-pictures--id-" data-method="DELETE" data-path="api/pictures/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-pictures--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-pictures--id-" onclick="tryItOut('DELETEapi-pictures--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-pictures--id-" onclick="cancelTryOut('DELETEapi-pictures--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-pictures--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/pictures/{id}</code></b>
</p>
<p>
<label id="auth-DELETEapi-pictures--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-pictures--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="DELETEapi-pictures--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>post_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="post_id" data-endpoint="DELETEapi-pictures--id-" data-component="body" required  hidden>
<br>
The post's ID.
</p>

</form>


## Reorder pictures

<small class="badge badge-darkred">requires authentication</small>

Note: This endpoint is only available for the multi steps listing edition.

> Example request:

```bash
curl -X POST \
    "https://demo.laraclassifier.local/api/pictures/reorder" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs" \
    -H "X-Action: bulk" \
    -d '{"post_id":2,"body":"quia"}'

```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/pictures/reorder"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=",
    "X-AppType": "docs",
    "X-Action": "bulk",
};

let body = {
    "post_id": 2,
    "body": "quia"
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
    'https://demo.laraclassifier.local/api/pictures/reorder',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
            'X-Action' => 'bulk',
        ],
        'json' => [
            'post_id' => 2,
            'body' => 'quia',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (400):

```json
{
    "success": false,
    "message": "Invalid JSON format for the \"body\" field.",
    "result": null,
    "error_code": 1
}
```
<div id="execution-results-POSTapi-pictures-reorder" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-pictures-reorder"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pictures-reorder"></code></pre>
</div>
<div id="execution-error-POSTapi-pictures-reorder" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pictures-reorder"></code></pre>
</div>
<form id="form-POSTapi-pictures-reorder" data-method="POST" data-path="api/pictures/reorder" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs","X-Action":"bulk"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-pictures-reorder', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-pictures-reorder" onclick="tryItOut('POSTapi-pictures-reorder');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-pictures-reorder" onclick="cancelTryOut('POSTapi-pictures-reorder');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-pictures-reorder" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/pictures/reorder</code></b>
</p>
<p>
<label id="auth-POSTapi-pictures-reorder" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-pictures-reorder" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>post_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="post_id" data-endpoint="POSTapi-pictures-reorder" data-component="body" required  hidden>
<br>
The post's ID.
</p>
<p>
<b><code>body</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="body" data-endpoint="POSTapi-pictures-reorder" data-component="body" required  hidden>
<br>
Encoded json of the new pictures' positions array [['id' => 2, 'position' => 1], ['id' => 1, 'position' => 2], ...]
</p>

</form>


## List pictures




> Example request:

```bash
curl -X GET \
    -G "https://demo.laraclassifier.local/api/posts/aliquam/pictures?embed=voluptatibus&postId=1&latest=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/posts/aliquam/pictures"
);

let params = {
    "embed": "voluptatibus",
    "postId": "1",
    "latest": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=",
    "X-AppType": "docs",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'https://demo.laraclassifier.local/api/posts/aliquam/pictures',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'voluptatibus',
            'postId'=> '1',
            'latest'=> '',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "success": false,
    "message": "Page Not Found."
}
```
<div id="execution-results-GETapi-posts--postId--pictures" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts--postId--pictures"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts--postId--pictures"></code></pre>
</div>
<div id="execution-error-GETapi-posts--postId--pictures" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts--postId--pictures"></code></pre>
</div>
<form id="form-GETapi-posts--postId--pictures" data-method="GET" data-path="api/posts/{postId}/pictures" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts--postId--pictures', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-posts--postId--pictures" onclick="tryItOut('GETapi-posts--postId--pictures');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-posts--postId--pictures" onclick="cancelTryOut('GETapi-posts--postId--pictures');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-posts--postId--pictures" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/posts/{postId}/pictures</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>postId</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="postId" data-endpoint="GETapi-posts--postId--pictures" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-posts--postId--pictures" data-component="query"  hidden>
<br>
The list of the picture relationships separated by comma for Eager Loading. Possible values: post
</p>
<p>
<b><code>postId</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="postId" data-endpoint="GETapi-posts--postId--pictures" data-component="query"  hidden>
<br>
List of pictures related to a listing (using the listing ID).
</p>
<p>
<b><code>latest</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="GETapi-posts--postId--pictures" hidden><input type="radio" name="latest" value="1" data-endpoint="GETapi-posts--postId--pictures" data-component="query" ><code>true</code></label>
<label data-endpoint="GETapi-posts--postId--pictures" hidden><input type="radio" name="latest" value="0" data-endpoint="GETapi-posts--postId--pictures" data-component="query" ><code>false</code></label>
<br>
Get only the first picture after ordering (as object instead of collection).
</p>
</form>



