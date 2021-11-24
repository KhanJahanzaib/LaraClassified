# Packages


## List packages




> Example request:

```bash
curl -X GET \
    -G "https://demo.laraclassifier.local/api/packages?embed=currency" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/packages"
);

let params = {
    "embed": "currency",
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
    'https://demo.laraclassifier.local/api/packages',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'currency',
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
                "name": "Regular List",
                "short_name": "Free",
                "ribbon": "red",
                "has_badge": "1",
                "price": "0.00",
                "currency_code": "USD",
                "promo_duration": null,
                "duration": null,
                "pictures_limit": null,
                "description": "",
                "facebook_ads_duration": "0",
                "google_ads_duration": "0",
                "twitter_ads_duration": "0",
                "linkedin_ads_duration": "0",
                "recommended": "0",
                "active": "1",
                "parent_id": null,
                "lft": "2",
                "rgt": "3",
                "depth": "0",
                "currency": {
                    "code": "USD",
                    "name": "United States Dollar",
                    "symbol": "$",
                    "html_entities": "&#36;",
                    "in_left": "1",
                    "decimal_places": "2",
                    "decimal_separator": ".",
                    "thousand_separator": ","
                }
            },
            {
                "id": 2,
                "name": "Top page Ad",
                "short_name": "Premium",
                "ribbon": "orange",
                "has_badge": "1",
                "price": "7.50",
                "currency_code": "PLN",
                "promo_duration": "7",
                "duration": "60",
                "pictures_limit": "10",
                "description": "Featured on the homepage\r\nFeatured in the category",
                "facebook_ads_duration": "0",
                "google_ads_duration": "0",
                "twitter_ads_duration": "0",
                "linkedin_ads_duration": "0",
                "recommended": "1",
                "active": "1",
                "parent_id": null,
                "lft": "4",
                "rgt": "5",
                "depth": "0",
                "currency": {
                    "code": "PLN",
                    "name": "Poland Zloty",
                    "symbol": "zł",
                    "html_entities": "&#122;&#322;",
                    "in_left": "0",
                    "decimal_places": "2",
                    "decimal_separator": ".",
                    "thousand_separator": ","
                }
            },
            {
                "id": 3,
                "name": "Top page Ad+",
                "short_name": "Premium+",
                "ribbon": "green",
                "has_badge": "1",
                "price": "9.00",
                "currency_code": "USD",
                "promo_duration": "30",
                "duration": "120",
                "pictures_limit": "15",
                "description": "Featured on the homepage\nFeatured in the category",
                "facebook_ads_duration": "0",
                "google_ads_duration": "0",
                "twitter_ads_duration": "0",
                "linkedin_ads_duration": "0",
                "recommended": "0",
                "active": "1",
                "parent_id": null,
                "lft": "6",
                "rgt": "7",
                "depth": "0",
                "currency": {
                    "code": "USD",
                    "name": "United States Dollar",
                    "symbol": "$",
                    "html_entities": "&#36;",
                    "in_left": "1",
                    "decimal_places": "2",
                    "decimal_separator": ".",
                    "thousand_separator": ","
                }
            }
        ]
    }
}
```
<div id="execution-results-GETapi-packages" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-packages"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-packages"></code></pre>
</div>
<div id="execution-error-GETapi-packages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-packages"></code></pre>
</div>
<form id="form-GETapi-packages" data-method="GET" data-path="api/packages" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-packages', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-packages" onclick="tryItOut('GETapi-packages');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-packages" onclick="cancelTryOut('GETapi-packages');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-packages" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/packages</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-packages" data-component="query"  hidden>
<br>
Comma-separated list of the package relationships for Eager Loading.
</p>
</form>


## Get package




> Example request:

```bash
curl -X GET \
    -G "https://demo.laraclassifier.local/api/packages/2?embed=currency" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/packages/2"
);

let params = {
    "embed": "currency",
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
    'https://demo.laraclassifier.local/api/packages/2',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'currency',
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
        "id": 2,
        "name": "Top page Ad",
        "short_name": "Premium",
        "ribbon": "orange",
        "has_badge": "1",
        "price": "7.50",
        "currency_code": "PLN",
        "promo_duration": "7",
        "duration": "60",
        "pictures_limit": "10",
        "description": "Featured on the homepage\r\nFeatured in the category",
        "facebook_ads_duration": "0",
        "google_ads_duration": "0",
        "twitter_ads_duration": "0",
        "linkedin_ads_duration": "0",
        "recommended": "1",
        "active": "1",
        "parent_id": null,
        "lft": "4",
        "rgt": "5",
        "depth": "0",
        "currency": {
            "code": "PLN",
            "name": "Poland Zloty",
            "symbol": "zł",
            "html_entities": "&#122;&#322;",
            "in_left": "0",
            "decimal_places": "2",
            "decimal_separator": ".",
            "thousand_separator": ","
        }
    }
}
```
<div id="execution-results-GETapi-packages--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-packages--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-packages--id-"></code></pre>
</div>
<div id="execution-error-GETapi-packages--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-packages--id-"></code></pre>
</div>
<form id="form-GETapi-packages--id-" data-method="GET" data-path="api/packages/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-packages--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-packages--id-" onclick="tryItOut('GETapi-packages--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-packages--id-" onclick="cancelTryOut('GETapi-packages--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-packages--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/packages/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="id" data-endpoint="GETapi-packages--id-" data-component="url"  hidden>
<br>
The package's ID.
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-packages--id-" data-component="query"  hidden>
<br>
Comma-separated list of the package relationships for Eager Loading.
</p>
</form>



