# Categories


## List categories




> Example request:

```bash
curl -X GET \
    -G "https://demo.laraclassifier.local/api/categories?parentId=0&embed=iure" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/categories"
);

let params = {
    "parentId": "0",
    "embed": "iure",
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
    'https://demo.laraclassifier.local/api/categories',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'parentId'=> '0',
            'embed'=> 'iure',
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
    "message": null,
    "result": {
        "data": [
            {
                "id": 1,
                "parent_id": null,
                "name": "Automobiles",
                "slug": "automobiles",
                "description": "",
                "picture": "app\/categories\/skin-blue\/car.png",
                "icon_class": null,
                "active": "1",
                "lft": "2",
                "rgt": "19",
                "depth": "0",
                "type": "classified",
                "is_for_permanent": "1",
                "parentClosure": null
            },
            {
                "id": 9,
                "parent_id": null,
                "name": "Phones & Tablets",
                "slug": "phones-and-tablets",
                "description": "",
                "picture": "app\/categories\/skin-blue\/mobile-alt.png",
                "icon_class": "icon-laptop",
                "active": "1",
                "lft": "20",
                "rgt": "29",
                "depth": "0",
                "type": "classified",
                "is_for_permanent": "0",
                "parentClosure": null
            },
            {
                "id": 14,
                "parent_id": null,
                "name": "Electronics",
                "slug": "electronics",
                "description": "",
                "picture": "app\/categories\/skin-blue\/fa-laptop.png",
                "icon_class": "icon-theatre",
                "active": "1",
                "lft": "30",
                "rgt": "61",
                "depth": "0",
                "type": "classified",
                "is_for_permanent": "0",
                "parentClosure": null
            },
            {
                "id": 30,
                "parent_id": null,
                "name": "Furniture & Appliances",
                "slug": "furniture-appliances",
                "description": "",
                "picture": "app\/categories\/skin-blue\/couch.png",
                "icon_class": "icon-basket-1",
                "active": "1",
                "lft": "62",
                "rgt": "75",
                "depth": "0",
                "type": "classified",
                "is_for_permanent": "0",
                "parentClosure": null
            },
            {
                "id": 37,
                "parent_id": null,
                "name": "Real estate",
                "slug": "real-estate",
                "description": "",
                "picture": "app\/categories\/skin-blue\/fa-home.png",
                "icon_class": "icon-home",
                "active": "1",
                "lft": "76",
                "rgt": "93",
                "depth": "0",
                "type": "classified",
                "is_for_permanent": "0",
                "parentClosure": null
            },
            {
                "id": 46,
                "parent_id": null,
                "name": "Animals & Pets",
                "slug": "animals-and-pets",
                "description": "",
                "picture": "app\/categories\/skin-blue\/paw.png",
                "icon_class": "icon-guidedog",
                "active": "1",
                "lft": "94",
                "rgt": "109",
                "depth": "0",
                "type": "classified",
                "is_for_permanent": "0",
                "parentClosure": null
            },
            {
                "id": 54,
                "parent_id": null,
                "name": "Fashion",
                "slug": "fashion",
                "description": "",
                "picture": "app\/categories\/skin-blue\/tshirt.png",
                "icon_class": "icon-heart",
                "active": "1",
                "lft": "110",
                "rgt": "125",
                "depth": "0",
                "type": "classified",
                "is_for_permanent": "0",
                "parentClosure": null
            },
            {
                "id": 62,
                "parent_id": null,
                "name": "Beauty & Well being",
                "slug": "beauty-well-being",
                "description": "",
                "picture": "app\/categories\/skin-blue\/spa.png",
                "icon_class": "icon-search",
                "active": "1",
                "lft": "126",
                "rgt": "147",
                "depth": "0",
                "type": "classified",
                "is_for_permanent": "0",
                "parentClosure": null
            },
            {
                "id": 73,
                "parent_id": null,
                "name": "Jobs",
                "slug": "jobs",
                "description": "",
                "picture": "app\/categories\/skin-blue\/mfglabs-users.png",
                "icon_class": "icon-megaphone-1",
                "active": "1",
                "lft": "148",
                "rgt": "195",
                "depth": "0",
                "type": "job-offer",
                "is_for_permanent": "0",
                "parentClosure": null
            },
            {
                "id": 97,
                "parent_id": null,
                "name": "Services",
                "slug": "services",
                "description": "",
                "picture": "app\/categories\/skin-blue\/ion-clipboard.png",
                "icon_class": "fa fa-briefcase",
                "active": "1",
                "lft": "196",
                "rgt": "229",
                "depth": "0",
                "type": "classified",
                "is_for_permanent": "0",
                "parentClosure": null
            },
            {
                "id": 114,
                "parent_id": null,
                "name": "Learning",
                "slug": "learning",
                "description": "",
                "picture": "app\/categories\/skin-blue\/fa-graduation-cap.png",
                "icon_class": "icon-book-open",
                "active": "1",
                "lft": "230",
                "rgt": "245",
                "depth": "0",
                "type": "classified",
                "is_for_permanent": "0",
                "parentClosure": null
            },
            {
                "id": 122,
                "parent_id": null,
                "name": "Local Events",
                "slug": "local-events",
                "description": "",
                "picture": "app\/categories\/skin-blue\/calendar-alt.png",
                "icon_class": "icon-megaphone-1",
                "active": "1",
                "lft": "246",
                "rgt": "271",
                "depth": "0",
                "type": "classified",
                "is_for_permanent": "0",
                "parentClosure": null
            },
            {
                "id": 136,
                "parent_id": null,
                "name": "Je test une nouvelle",
                "slug": "je-test-une-nouvelle",
                "description": "Merci",
                "picture": "app\/default\/categories\/fa-folder-skin-blue.png",
                "icon_class": null,
                "active": "1",
                "lft": "272",
                "rgt": "273",
                "depth": "0",
                "type": "classified",
                "is_for_permanent": "0",
                "parentClosure": null
            }
        ]
    }
}
```
<div id="execution-results-GETapi-categories" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-categories"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories"></code></pre>
</div>
<div id="execution-error-GETapi-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories"></code></pre>
</div>
<form id="form-GETapi-categories" data-method="GET" data-path="api/categories" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-categories', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-categories" onclick="tryItOut('GETapi-categories');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-categories" onclick="cancelTryOut('GETapi-categories');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-categories" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/categories</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>parentId</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="parentId" data-endpoint="GETapi-categories" data-component="query"  hidden>
<br>
The ID of the parent category of the sub categories to retrieve.
</p>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-categories" data-component="query"  hidden>
<br>
The Comma-separated list of the category relationships for Eager Loading. Possible values: parent,children
</p>
</form>


## Get category


Get category by it's unique slug or ID.

> Example request:

```bash
curl -X GET \
    -G "https://demo.laraclassifier.local/api/categories/molestias?parentCatSlug=car" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/categories/molestias"
);

let params = {
    "parentCatSlug": "car",
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
    'https://demo.laraclassifier.local/api/categories/molestias',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'parentCatSlug'=> 'car',
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
    "message": null,
    "result": []
}
```
<div id="execution-results-GETapi-categories--slugOrId-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-categories--slugOrId-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories--slugOrId-"></code></pre>
</div>
<div id="execution-error-GETapi-categories--slugOrId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories--slugOrId-"></code></pre>
</div>
<form id="form-GETapi-categories--slugOrId-" data-method="GET" data-path="api/categories/{slugOrId}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-categories--slugOrId-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-categories--slugOrId-" onclick="tryItOut('GETapi-categories--slugOrId-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-categories--slugOrId-" onclick="cancelTryOut('GETapi-categories--slugOrId-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-categories--slugOrId-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/categories/{slugOrId}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>slugOrId</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="slugOrId" data-endpoint="GETapi-categories--slugOrId-" data-component="url"  hidden>
<br>
The slug or ID of the category.
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>parentCatSlug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="parentCatSlug" data-endpoint="GETapi-categories--slugOrId-" data-component="query"  hidden>
<br>
The slug of the parent category to retrieve used when category's slug provided instead of ID.
</p>
</form>


## List category&#039;s fields




> Example request:

```bash
curl -X POST \
    "https://demo.laraclassifier.local/api/categories/voluptate/fields" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs" \
    -d '{"language_code":"en","post_id":1}'

```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/categories/voluptate/fields"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=",
    "X-AppType": "docs",
};

let body = {
    "language_code": "en",
    "post_id": 1
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
    'https://demo.laraclassifier.local/api/categories/voluptate/fields',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'json' => [
            'language_code' => 'en',
            'post_id' => 1,
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
<div id="execution-results-POSTapi-categories--id--fields" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-categories--id--fields"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-categories--id--fields"></code></pre>
</div>
<div id="execution-error-POSTapi-categories--id--fields" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-categories--id--fields"></code></pre>
</div>
<form id="form-POSTapi-categories--id--fields" data-method="POST" data-path="api/categories/{id}/fields" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-categories--id--fields', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-categories--id--fields" onclick="tryItOut('POSTapi-categories--id--fields');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-categories--id--fields" onclick="cancelTryOut('POSTapi-categories--id--fields');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-categories--id--fields" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/categories/{id}/fields</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-categories--id--fields" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>language_code</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="language_code" data-endpoint="POSTapi-categories--id--fields" data-component="body"  hidden>
<br>
The code of the user's spoken language.
</p>
<p>
<b><code>post_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="post_id" data-endpoint="POSTapi-categories--id--fields" data-component="body" required  hidden>
<br>
The unique ID of the post.
</p>

</form>



