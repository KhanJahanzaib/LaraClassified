# Posts


## List listings




> Example request:

```bash
curl -X GET \
    -G "https://demo.laraclassifier.local/api/posts?embed=reiciendis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/posts"
);

let params = {
    "embed": "reiciendis",
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
    'https://demo.laraclassifier.local/api/posts',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'reiciendis',
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
                "id": 6913,
                "country_code": "US",
                "user_id": null,
                "category_id": "100",
                "post_type_id": "1",
                "title": "Do you have something to sell",
                "description": "<p><span style=\"text-align:center;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassifier, its free, for local business and very easy to use!<\/span><br><\/p>",
                "tags": "",
                "price": "129.00",
                "negotiable": null,
                "contact_name": "User Test",
                "email": "titi@lola.com",
                "phone": "",
                "phone_hidden": null,
                "address": null,
                "city_id": "48507",
                "lat": "39.74",
                "lon": "-104.98",
                "ip_addr": "::1",
                "visits": "2",
                "tmp_token": "211bbf79ce0675de0a3b38e0dbc22a53",
                "email_token": "632617a1a84b0f4818f3eeffd5774489",
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "0",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-06-25T01:40:43.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-06-24T09:57:30.000000Z",
                "updated_at": "2021-06-25T01:40:43.000000Z",
                "slug": "do-you-have-something-to-sell",
                "created_at_formatted": "Jun 24th, 2021 at 05:57",
                "user_photo_url": "http:\/\/demo.laraclassifier.local\/images\/user.jpg"
            },
            {
                "id": 6912,
                "country_code": "US",
                "user_id": "1",
                "category_id": "107",
                "post_type_id": "2",
                "title": "Toyota RAV 4 cool",
                "description": "<p><span style=\"text-align:center;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassifier, its free, for local business and very easy to use!<\/span><br><\/p>",
                "tags": "",
                "price": "29.90",
                "negotiable": "1",
                "contact_name": "Administrator",
                "email": "admin@larapen.com",
                "phone": "061228281",
                "phone_hidden": null,
                "address": null,
                "city_id": "46016",
                "lat": "42.33",
                "lon": "-83.05",
                "ip_addr": "::1",
                "visits": "0",
                "tmp_token": "66ec62d5590e49787571b54f4be86e7a",
                "email_token": null,
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "0",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "1",
                "featured": "1",
                "archived": "0",
                "archived_at": "2021-06-25T04:36:54.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-06-23T14:22:34.000000Z",
                "updated_at": "2021-06-25T04:36:54.000000Z",
                "slug": "toyota-rav-4-cool",
                "created_at_formatted": "Jun 23rd, 2021 at 10:22",
                "user_photo_url": "https:\/\/secure.gravatar.com\/avatar\/0d061d5f8a82133c0f84e37fe0f4ff3e.jpg?s=150&d=http%3A%2F%2Fdemo.laraclassifier.local%2Fimages%2Fuser.jpg&r=g"
            },
            {
                "id": 6911,
                "country_code": "US",
                "user_id": "1",
                "category_id": "4",
                "post_type_id": "2",
                "title": "Toyota RAV 4 cool",
                "description": "<p><span style=\"text-align:center;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassifier, its free, for local business and very easy to use!<\/span><br><\/p>",
                "tags": "",
                "price": null,
                "negotiable": null,
                "contact_name": "Administrator",
                "email": "admin@larapen.com",
                "phone": "061228281",
                "phone_hidden": null,
                "address": null,
                "city_id": "48201",
                "lat": "37.64",
                "lon": "-121.00",
                "ip_addr": "::1",
                "visits": "0",
                "tmp_token": "54bd04700dbf2174668ae5334a1abcab",
                "email_token": null,
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "0",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "1",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-06-25T03:37:33.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-06-23T09:19:25.000000Z",
                "updated_at": "2021-06-25T03:37:33.000000Z",
                "slug": "toyota-rav-4-cool",
                "created_at_formatted": "Jun 23rd, 2021 at 05:19",
                "user_photo_url": "https:\/\/secure.gravatar.com\/avatar\/0d061d5f8a82133c0f84e37fe0f4ff3e.jpg?s=150&d=http%3A%2F%2Fdemo.laraclassifier.local%2Fimages%2Fuser.jpg&r=g"
            },
            {
                "id": 6910,
                "country_code": "US",
                "user_id": null,
                "category_id": "101",
                "post_type_id": "2",
                "title": "Toyota RAV 4 cool x",
                "description": "<p><span style=\"text-align:center;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassifier, its free, for local business and very easy to use!<\/span><br><\/p>",
                "tags": "",
                "price": "7.50",
                "negotiable": null,
                "contact_name": "Mayeul Akpovi",
                "email": "sa@gmail.com",
                "phone": "+22961228282",
                "phone_hidden": null,
                "address": null,
                "city_id": "44669",
                "lat": "32.78",
                "lon": "-96.81",
                "ip_addr": "::1",
                "visits": "1",
                "tmp_token": "4245088cbf0df60ae93968258c6aadb2",
                "email_token": "293080eb0c788888b42f7068a14a683e",
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "0",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-06-23T09:15:25.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-06-23T09:14:56.000000Z",
                "updated_at": "2021-06-23T09:15:25.000000Z",
                "slug": "toyota-rav-4-cool-x",
                "created_at_formatted": "Jun 23rd, 2021 at 05:14",
                "user_photo_url": "http:\/\/demo.laraclassifier.local\/images\/user.jpg"
            },
            {
                "id": 6909,
                "country_code": "US",
                "user_id": null,
                "category_id": "107",
                "post_type_id": "1",
                "title": "Do you have something to sell",
                "description": "<p><span style=\"text-align:center;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassifier, its free, for local business and very easy to use!<\/span><br><\/p>",
                "tags": "",
                "price": "222.00",
                "negotiable": null,
                "contact_name": "Mayeul Akpovi",
                "email": "dede@gmail.com",
                "phone": "+22961228282",
                "phone_hidden": null,
                "address": null,
                "city_id": "44873",
                "lat": "29.42",
                "lon": "-98.49",
                "ip_addr": "::1",
                "visits": "2",
                "tmp_token": "ff72e23575685da91c59d0322e38d419",
                "email_token": "83a3627b475f50c56a1dd971661163a5",
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "0",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-06-23T09:13:50.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-06-23T09:13:10.000000Z",
                "updated_at": "2021-06-23T09:13:50.000000Z",
                "slug": "do-you-have-something-to-sell",
                "created_at_formatted": "Jun 23rd, 2021 at 05:13",
                "user_photo_url": "http:\/\/demo.laraclassifier.local\/images\/user.jpg"
            },
            {
                "id": 6908,
                "country_code": "US",
                "user_id": "1",
                "category_id": "105",
                "post_type_id": "2",
                "title": "S'inscrire - {app.name}",
                "description": "<p><span style=\"text-align:center;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassifier, its free, for local business and very easy to use!<\/span><br><\/p>",
                "tags": "",
                "price": null,
                "negotiable": null,
                "contact_name": "Administrator",
                "email": "admin@larapen.com",
                "phone": "061228281",
                "phone_hidden": null,
                "address": null,
                "city_id": "47486",
                "lat": "40.44",
                "lon": "-80.00",
                "ip_addr": "::1",
                "visits": "0",
                "tmp_token": "dcfc18101ab5570807368e451ce7540f",
                "email_token": null,
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "0",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "1",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-06-23T09:10:29.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-06-23T09:10:29.000000Z",
                "updated_at": "2021-06-23T09:10:29.000000Z",
                "slug": "sinscrire-app_name",
                "created_at_formatted": "Jun 23rd, 2021 at 05:10",
                "user_photo_url": "https:\/\/secure.gravatar.com\/avatar\/0d061d5f8a82133c0f84e37fe0f4ff3e.jpg?s=150&d=http%3A%2F%2Fdemo.laraclassifier.local%2Fimages%2Fuser.jpg&r=g"
            },
            {
                "id": 6907,
                "country_code": "US",
                "user_id": null,
                "category_id": "106",
                "post_type_id": "2",
                "title": "Toyota RAV ︎︎︎",
                "description": "<p><span style=\"text-align:center;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassifier, its free, for local business and very easy to use!<\/span><br><\/p>",
                "tags": "",
                "price": "1111.00",
                "negotiable": "1",
                "contact_name": "Toto Max",
                "email": "momo@toto.com",
                "phone": "",
                "phone_hidden": null,
                "address": null,
                "city_id": "43968",
                "lat": "35.05",
                "lon": "-78.88",
                "ip_addr": "::1",
                "visits": "1",
                "tmp_token": "f20f47a32f76b43b4e7793aa7b04ee21",
                "email_token": "0588dd90ce3a17b2ffd0e286b23d0a70",
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "0",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-06-23T09:06:51.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-06-23T09:06:16.000000Z",
                "updated_at": "2021-06-23T09:06:51.000000Z",
                "slug": "toyota-rav-︎︎︎",
                "created_at_formatted": "Jun 23rd, 2021 at 05:06",
                "user_photo_url": "http:\/\/demo.laraclassifier.local\/images\/user.jpg"
            },
            {
                "id": 6906,
                "country_code": "US",
                "user_id": null,
                "category_id": "100",
                "post_type_id": "1",
                "title": "Toyota RAV ︎︎︎",
                "description": "<p><span style=\"text-align:center;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassifier, its free, for local business and very easy to use!<\/span><br><\/p>",
                "tags": "",
                "price": "900.00",
                "negotiable": "1",
                "contact_name": "User Tata",
                "email": "toto@test.com",
                "phone": "",
                "phone_hidden": null,
                "address": null,
                "city_id": "46898",
                "lat": "40.78",
                "lon": "-73.97",
                "ip_addr": "::1",
                "visits": "1",
                "tmp_token": "85ab8eae56763ac222f726958bb0f046",
                "email_token": "967b7b5b9fa487615a35208d3e96c8db",
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "1",
                "is_permanent": "0",
                "reviewed": "0",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-06-23T09:07:04.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-06-23T07:56:24.000000Z",
                "updated_at": "2021-06-23T09:07:04.000000Z",
                "slug": "toyota-rav-︎︎︎",
                "created_at_formatted": "Jun 23rd, 2021 at 03:56",
                "user_photo_url": "http:\/\/demo.laraclassifier.local\/images\/user.jpg"
            },
            {
                "id": 6905,
                "country_code": "US",
                "user_id": "1",
                "category_id": "106",
                "post_type_id": "2",
                "title": "Do you have something to sell XYZ",
                "description": "<p><span style=\"text-align:center;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassifier, its free, for local business and very easy to use!<\/span><br><\/p>",
                "tags": "",
                "price": "6000.00",
                "negotiable": "1",
                "contact_name": "Administrator",
                "email": "admin@larapen.com",
                "phone": "061228281",
                "phone_hidden": null,
                "address": null,
                "city_id": "44697",
                "lat": "32.73",
                "lon": "-97.32",
                "ip_addr": "::1",
                "visits": "0",
                "tmp_token": "d552f299ee854d2a3fd4c26428bf442c",
                "email_token": null,
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "0",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "1",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-06-23T07:49:54.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-06-23T07:49:54.000000Z",
                "updated_at": "2021-06-23T07:49:54.000000Z",
                "slug": "do-you-have-something-to-sell-xyz",
                "created_at_formatted": "Jun 23rd, 2021 at 03:49",
                "user_photo_url": "https:\/\/secure.gravatar.com\/avatar\/0d061d5f8a82133c0f84e37fe0f4ff3e.jpg?s=150&d=http%3A%2F%2Fdemo.laraclassifier.local%2Fimages%2Fuser.jpg&r=g"
            },
            {
                "id": 6904,
                "country_code": "US",
                "user_id": null,
                "category_id": "101",
                "post_type_id": "2",
                "title": "S'inscrire - {app.name}",
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassifier, its free, for local business and very easy to use!<\/span><\/p>",
                "tags": "",
                "price": null,
                "negotiable": null,
                "contact_name": "Man Shark",
                "email": "oop@test.com",
                "phone": "",
                "phone_hidden": null,
                "address": null,
                "city_id": "48342",
                "lat": "37.34",
                "lon": "-121.89",
                "ip_addr": "::1",
                "visits": "1",
                "tmp_token": "78dba3204bc578190495c621c695bba0",
                "email_token": "c8e25781891bd17548f569f5097448c9",
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "1",
                "featured": "1",
                "archived": "0",
                "archived_at": "2021-06-07T06:20:31.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-06-07T06:19:24.000000Z",
                "updated_at": "2021-06-07T06:20:31.000000Z",
                "slug": "sinscrire-app_name",
                "created_at_formatted": "Jun 7th, 2021 at 02:19",
                "user_photo_url": "http:\/\/demo.laraclassifier.local\/images\/user.jpg"
            },
            {
                "id": 6903,
                "country_code": "US",
                "user_id": null,
                "category_id": "106",
                "post_type_id": "1",
                "title": "Toyota RAV 4 cool",
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassifier, its free, for local business and very easy to use!<\/span><\/p>",
                "tags": "",
                "price": "2333.00",
                "negotiable": null,
                "contact_name": "Edou",
                "email": "ddd@tata.com",
                "phone": "",
                "phone_hidden": null,
                "address": null,
                "city_id": "49142",
                "lat": "47.61",
                "lon": "-122.33",
                "ip_addr": "::1",
                "visits": "1",
                "tmp_token": "d0213015bede441a8493af8b4e47d6f7",
                "email_token": null,
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "1",
                "featured": "1",
                "archived": "0",
                "archived_at": "2021-06-06T09:50:12.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-06-06T09:48:43.000000Z",
                "updated_at": "2021-06-06T09:50:12.000000Z",
                "slug": "toyota-rav-4-cool",
                "created_at_formatted": "Jun 6th, 2021 at 05:48",
                "user_photo_url": "http:\/\/demo.laraclassifier.local\/images\/user.jpg"
            },
            {
                "id": 6902,
                "country_code": "US",
                "user_id": null,
                "category_id": "107",
                "post_type_id": "2",
                "title": "Do you have something to sell",
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassifier, its free, for local business and very easy to use!<\/span><\/p>",
                "tags": "",
                "price": "2343.00",
                "negotiable": null,
                "contact_name": "Edou",
                "email": "ddd@tata.com",
                "phone": "",
                "phone_hidden": null,
                "address": null,
                "city_id": "42634",
                "lat": "30.51",
                "lon": "-87.21",
                "ip_addr": "::1",
                "visits": "7",
                "tmp_token": "b138af1002d155785f3c1af412e87a8b",
                "email_token": null,
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "1",
                "featured": "1",
                "archived": "0",
                "archived_at": "2021-06-12T13:49:08.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-06-06T08:56:29.000000Z",
                "updated_at": "2021-06-12T13:49:08.000000Z",
                "slug": "do-you-have-something-to-sell",
                "created_at_formatted": "Jun 6th, 2021 at 04:56",
                "user_photo_url": "http:\/\/demo.laraclassifier.local\/images\/user.jpg"
            }
        ]
    },
    "extra": {
        "count": null,
        "preSearch": [],
        "fields": []
    }
}
```
<div id="execution-results-GETapi-posts" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts"></code></pre>
</div>
<div id="execution-error-GETapi-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts"></code></pre>
</div>
<form id="form-GETapi-posts" data-method="GET" data-path="api/posts" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-posts" onclick="tryItOut('GETapi-posts');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-posts" onclick="cancelTryOut('GETapi-posts');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-posts" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/posts</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-posts" data-component="query"  hidden>
<br>
Comma-separated list of the listing relationships for Eager Loading. Possible values: user,category,postType,city,latestPayment,savedByLoggedUser,pictures
</p>
</form>


## Get post




> Example request:

```bash
curl -X GET \
    -G "https://demo.laraclassifier.local/api/posts/2?embed=vero&detailed=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/posts/2"
);

let params = {
    "embed": "vero",
    "detailed": "",
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
    'https://demo.laraclassifier.local/api/posts/2',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'vero',
            'detailed'=> '',
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
        "country_code": "US",
        "user_id": "3",
        "category_id": "74",
        "post_type_id": "1",
        "title": "ASAP: Editor\/Proofreader",
        "description": "Dicta libero non autem rem eum. Beatae et et odio qui. Aliquam qui laudantium nihil ut. Minus quae sequi eum neque ut.\n\nA molestias eius maiores in repellendus nisi placeat voluptates. Eius illo ut eum consectetur amet. Neque facilis quia qui quisquam corporis dolorem.",
        "tags": "non,nihil,atque",
        "price": "29999.00",
        "negotiable": "1",
        "contact_name": "Admin Demo",
        "email": "admin@demosite.com",
        "phone": "+3581876675678",
        "phone_hidden": "0",
        "address": null,
        "city_id": "46913",
        "lat": "43.22",
        "lon": "-78.39",
        "ip_addr": "49.24.194.161",
        "visits": 1341,
        "tmp_token": null,
        "email_token": null,
        "phone_token": "demoFaker",
        "verified_email": "1",
        "verified_phone": "1",
        "accept_terms": "1",
        "accept_marketing_offers": "0",
        "is_permanent": "0",
        "reviewed": "1",
        "featured": "0",
        "archived": "0",
        "archived_at": "2021-06-25T16:48:56.000000Z",
        "deletion_mail_sent_at": null,
        "fb_profile": null,
        "partner": null,
        "created_at": "2021-03-06T20:41:38.000000Z",
        "updated_at": "2021-06-25T16:48:56.000000Z",
        "slug": "asap-editor-proofreader",
        "created_at_formatted": "Mar 6th, 2021 at 15:41",
        "user_photo_url": "https:\/\/secure.gravatar.com\/avatar\/6c58d4583a9550a6e363976bc15caf67.jpg?s=150&d=http%3A%2F%2Fdemo.laraclassifier.local%2Fimages%2Fuser.jpg&r=g"
    },
    "extra": {
        "fields": {
            "headers": {},
            "original": {
                "success": true,
                "message": null,
                "result": [
                    {
                        "id": 18,
                        "belongs_to": "posts",
                        "name": "Start Date",
                        "type": "date",
                        "max": "50",
                        "default_value": "2021-03-22",
                        "required": "0",
                        "use_as_filter": "1",
                        "help": "",
                        "active": "1",
                        "options": []
                    },
                    {
                        "id": 19,
                        "belongs_to": "posts",
                        "name": "Company",
                        "type": "text",
                        "max": "100",
                        "default_value": "minus",
                        "required": "1",
                        "use_as_filter": "0",
                        "help": "",
                        "active": "1",
                        "options": []
                    },
                    {
                        "id": 20,
                        "belongs_to": "posts",
                        "name": "Work Type",
                        "type": "select",
                        "max": null,
                        "default_value": "160",
                        "required": "1",
                        "use_as_filter": "1",
                        "help": "",
                        "active": "1",
                        "options": [
                            {
                                "id": 159,
                                "field_id": "20",
                                "value": "Full-time",
                                "parent_id": null,
                                "lft": "317",
                                "rgt": "318",
                                "depth": null
                            },
                            {
                                "id": 160,
                                "field_id": "20",
                                "value": "Part-time",
                                "parent_id": null,
                                "lft": "319",
                                "rgt": "320",
                                "depth": null
                            },
                            {
                                "id": 161,
                                "field_id": "20",
                                "value": "Temporary",
                                "parent_id": null,
                                "lft": "321",
                                "rgt": "322",
                                "depth": null
                            },
                            {
                                "id": 162,
                                "field_id": "20",
                                "value": "Internship",
                                "parent_id": null,
                                "lft": "323",
                                "rgt": "324",
                                "depth": null
                            },
                            {
                                "id": 163,
                                "field_id": "20",
                                "value": "Permanent",
                                "parent_id": null,
                                "lft": "325",
                                "rgt": "326",
                                "depth": null
                            }
                        ]
                    }
                ]
            },
            "exception": null
        }
    }
}
```
<div id="execution-results-GETapi-posts--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts--id-"></code></pre>
</div>
<div id="execution-error-GETapi-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts--id-"></code></pre>
</div>
<form id="form-GETapi-posts--id-" data-method="GET" data-path="api/posts/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-posts--id-" onclick="tryItOut('GETapi-posts--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-posts--id-" onclick="cancelTryOut('GETapi-posts--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-posts--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/posts/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="id" data-endpoint="GETapi-posts--id-" data-component="url"  hidden>
<br>
The post's ID.
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-posts--id-" data-component="query"  hidden>
<br>
Comma-separated list of the listing relationships for Eager Loading. Possible values: user,category,postType,city,latestPayment,savedByLoggedUser,pictures
</p>
<p>
<b><code>detailed</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="GETapi-posts--id-" hidden><input type="radio" name="detailed" value="1" data-endpoint="GETapi-posts--id-" data-component="query" ><code>true</code></label>
<label data-endpoint="GETapi-posts--id-" hidden><input type="radio" name="detailed" value="0" data-endpoint="GETapi-posts--id-" data-component="query" ><code>false</code></label>
<br>
Allow to get the post's details with all its relationships (No need to set the 'embed' parameter).
</p>
</form>


## Store post

<small class="badge badge-darkred">requires authentication</small>

For both types of post's creation (Single step or Multi steps).
Note: The field 'admin_code' is only available when the post's country's 'admin_type' column is set to 1 or 2 and the 'admin_field_active' column is set to 1.

> Example request:

```bash
curl -X POST \
    "https://demo.laraclassifier.local/api/posts" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs" \
    -F "category_id=1" \
    -F "post_type_id=1" \
    -F "title=John Doe" \
    -F "description=Beatae placeat atque tempore consequatur animi magni omnis." \
    -F "contact_name=John Doe" \
    -F "email=john.doe@domain.tld" \
    -F "phone=+17656766467" \
    -F "city_id=1" \
    -F "accept_terms=" \
    -F "country_code=US" \
    -F "admin_code=0" \
    -F "price=5000" \
    -F "negotiable=" \
    -F "phone_hidden=" \
    -F "ip_addr=dolorum" \
    -F "accept_marketing_offers=" \
    -F "is_permanent=" \
    -F "tags=car,automotive,tesla,cyber,truck" \
    -F "package_id=2" \
    -F "payment_method_id=5" \
    -F "captcha_key=qui" \
    -F "pictures[]=@/private/var/folders/r0/k0xbnx757k3fnz09_6g9rp6w0000gn/T/phpxJmqpB" 
```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/posts"
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
body.append('category_id', '1');
body.append('post_type_id', '1');
body.append('title', 'John Doe');
body.append('description', 'Beatae placeat atque tempore consequatur animi magni omnis.');
body.append('contact_name', 'John Doe');
body.append('email', 'john.doe@domain.tld');
body.append('phone', '+17656766467');
body.append('city_id', '1');
body.append('accept_terms', '');
body.append('country_code', 'US');
body.append('admin_code', '0');
body.append('price', '5000');
body.append('negotiable', '');
body.append('phone_hidden', '');
body.append('ip_addr', 'dolorum');
body.append('accept_marketing_offers', '');
body.append('is_permanent', '');
body.append('tags', 'car,automotive,tesla,cyber,truck');
body.append('package_id', '2');
body.append('payment_method_id', '5');
body.append('captcha_key', 'qui');
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
    'https://demo.laraclassifier.local/api/posts',
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
                'name' => 'category_id',
                'contents' => '1'
            ],
            [
                'name' => 'post_type_id',
                'contents' => '1'
            ],
            [
                'name' => 'title',
                'contents' => 'John Doe'
            ],
            [
                'name' => 'description',
                'contents' => 'Beatae placeat atque tempore consequatur animi magni omnis.'
            ],
            [
                'name' => 'contact_name',
                'contents' => 'John Doe'
            ],
            [
                'name' => 'email',
                'contents' => 'john.doe@domain.tld'
            ],
            [
                'name' => 'phone',
                'contents' => '+17656766467'
            ],
            [
                'name' => 'city_id',
                'contents' => '1'
            ],
            [
                'name' => 'accept_terms',
                'contents' => ''
            ],
            [
                'name' => 'country_code',
                'contents' => 'US'
            ],
            [
                'name' => 'admin_code',
                'contents' => '0'
            ],
            [
                'name' => 'price',
                'contents' => '5000'
            ],
            [
                'name' => 'negotiable',
                'contents' => ''
            ],
            [
                'name' => 'phone_hidden',
                'contents' => ''
            ],
            [
                'name' => 'ip_addr',
                'contents' => 'dolorum'
            ],
            [
                'name' => 'accept_marketing_offers',
                'contents' => ''
            ],
            [
                'name' => 'is_permanent',
                'contents' => ''
            ],
            [
                'name' => 'tags',
                'contents' => 'car,automotive,tesla,cyber,truck'
            ],
            [
                'name' => 'package_id',
                'contents' => '2'
            ],
            [
                'name' => 'payment_method_id',
                'contents' => '5'
            ],
            [
                'name' => 'captcha_key',
                'contents' => 'qui'
            ],
            [
                'name' => 'pictures[]',
                'contents' => fopen('/private/var/folders/r0/k0xbnx757k3fnz09_6g9rp6w0000gn/T/phpxJmqpB', 'r')
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (422):

```json
{
    "success": false,
    "message": "An error occurred while validating the data.",
    "errors": {
        "accept_terms": [
            "The terms must be accepted."
        ]
    }
}
```
<div id="execution-results-POSTapi-posts" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-posts"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-posts"></code></pre>
</div>
<div id="execution-error-POSTapi-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-posts"></code></pre>
</div>
<form id="form-POSTapi-posts" data-method="POST" data-path="api/posts" data-authed="1" data-hasfiles="1" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"multipart\/form-data","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-posts', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-posts" onclick="tryItOut('POSTapi-posts');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-posts" onclick="cancelTryOut('POSTapi-posts');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-posts" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/posts</code></b>
</p>
<p>
<label id="auth-POSTapi-posts" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-posts" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>category_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="category_id" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The category's ID.
</p>
<p>
<b><code>post_type_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="post_type_id" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The listing type's ID.
</p>
<p>
<b><code>title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="title" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The post's title.
</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="description" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The post's description.
</p>
<p>
<b><code>contact_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="contact_name" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The post's author name.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The post's author email address (required if mobile phone number doesn't exist).
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The post's author mobile number (required if email doesn't exist).
</p>
<p>
<b><code>city_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="city_id" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The city's ID.
</p>
<p>
<b><code>accept_terms</code></b>&nbsp;&nbsp;<small>boolean</small>  &nbsp;
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="accept_terms" value="true" data-endpoint="POSTapi-posts" data-component="body" required ><code>true</code></label>
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="accept_terms" value="false" data-endpoint="POSTapi-posts" data-component="body" required ><code>false</code></label>
<br>
Accept the website terms and conditions.
</p>
<p>
<b><code>country_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country_code" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The code of the user's country.
</p>
<p>
<b><code>admin_code</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="admin_code" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The administrative division's code.
</p>
<p>
<b><code>price</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="price" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The price.
</p>
<p>
<b><code>negotiable</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="negotiable" value="true" data-endpoint="POSTapi-posts" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="negotiable" value="false" data-endpoint="POSTapi-posts" data-component="body" ><code>false</code></label>
<br>
Negotiable price or no.
</p>
<p>
<b><code>phone_hidden</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="phone_hidden" value="true" data-endpoint="POSTapi-posts" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="phone_hidden" value="false" data-endpoint="POSTapi-posts" data-component="body" ><code>false</code></label>
<br>
Mobile phone number will be hidden in public or no.
</p>
<p>
<b><code>ip_addr</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ip_addr" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The post's author IP address.
</p>
<p>
<b><code>accept_marketing_offers</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="accept_marketing_offers" value="true" data-endpoint="POSTapi-posts" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="accept_marketing_offers" value="false" data-endpoint="POSTapi-posts" data-component="body" ><code>false</code></label>
<br>
Accept to receive marketing offers or no.
</p>
<p>
<b><code>is_permanent</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="is_permanent" value="true" data-endpoint="POSTapi-posts" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="is_permanent" value="false" data-endpoint="POSTapi-posts" data-component="body" ><code>false</code></label>
<br>
Is it permanent listing or no.
</p>
<p>
<b><code>tags</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="tags" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
Comma-separated tags list.
</p>
<p>
<b><code>pictures</code></b>&nbsp;&nbsp;<small>file[]</small>  &nbsp;
<input type="file" name="pictures.0" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<input type="file" name="pictures.1" data-endpoint="POSTapi-posts" data-component="body" hidden>
<br>
The post's pictures.
</p>
<p>
<b><code>package_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="package_id" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The package's ID.
</p>
<p>
<b><code>payment_method_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="payment_method_id" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The payment method's ID (required when the selected package's price is > 0).
</p>
<p>
<b><code>captcha_key</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="captcha_key" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
Key generated by the CAPTCHA endpoint calling (Required if the CAPTCHA verification is enabled from the Admin panel).
</p>

</form>


## Update post

<small class="badge badge-darkred">requires authentication</small>

Note: The fields 'pictures', 'package_id' and 'payment_method_id' are only available with the single step listing edition.
The field 'admin_code' is only available when the post's country's 'admin_type' column is set to 1 or 2 and the 'admin_field_active' column is set to 1.

> Example request:

```bash
curl -X PUT \
    "https://demo.laraclassifier.local/api/posts/quo" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs" \
    -F "category_id=1" \
    -F "post_type_id=1" \
    -F "title=John Doe" \
    -F "description=Beatae placeat atque tempore consequatur animi magni omnis." \
    -F "contact_name=John Doe" \
    -F "email=john.doe@domain.tld" \
    -F "phone=+17656766467" \
    -F "city_id=19" \
    -F "accept_terms=" \
    -F "country_code=US" \
    -F "admin_code=0" \
    -F "price=5000" \
    -F "negotiable=" \
    -F "phone_hidden=" \
    -F "ip_addr=accusamus" \
    -F "accept_marketing_offers=" \
    -F "is_permanent=1" \
    -F "tags=car,automotive,tesla,cyber,truck" \
    -F "package_id=2" \
    -F "payment_method_id=5" \
    -F "pictures[]=@/private/var/folders/r0/k0xbnx757k3fnz09_6g9rp6w0000gn/T/phpYQ3NZP" 
```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/posts/quo"
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
body.append('category_id', '1');
body.append('post_type_id', '1');
body.append('title', 'John Doe');
body.append('description', 'Beatae placeat atque tempore consequatur animi magni omnis.');
body.append('contact_name', 'John Doe');
body.append('email', 'john.doe@domain.tld');
body.append('phone', '+17656766467');
body.append('city_id', '19');
body.append('accept_terms', '');
body.append('country_code', 'US');
body.append('admin_code', '0');
body.append('price', '5000');
body.append('negotiable', '');
body.append('phone_hidden', '');
body.append('ip_addr', 'accusamus');
body.append('accept_marketing_offers', '');
body.append('is_permanent', '1');
body.append('tags', 'car,automotive,tesla,cyber,truck');
body.append('package_id', '2');
body.append('payment_method_id', '5');
body.append('pictures[]', document.querySelector('input[name="pictures[]"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'https://demo.laraclassifier.local/api/posts/quo',
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
                'name' => 'category_id',
                'contents' => '1'
            ],
            [
                'name' => 'post_type_id',
                'contents' => '1'
            ],
            [
                'name' => 'title',
                'contents' => 'John Doe'
            ],
            [
                'name' => 'description',
                'contents' => 'Beatae placeat atque tempore consequatur animi magni omnis.'
            ],
            [
                'name' => 'contact_name',
                'contents' => 'John Doe'
            ],
            [
                'name' => 'email',
                'contents' => 'john.doe@domain.tld'
            ],
            [
                'name' => 'phone',
                'contents' => '+17656766467'
            ],
            [
                'name' => 'city_id',
                'contents' => '19'
            ],
            [
                'name' => 'accept_terms',
                'contents' => ''
            ],
            [
                'name' => 'country_code',
                'contents' => 'US'
            ],
            [
                'name' => 'admin_code',
                'contents' => '0'
            ],
            [
                'name' => 'price',
                'contents' => '5000'
            ],
            [
                'name' => 'negotiable',
                'contents' => ''
            ],
            [
                'name' => 'phone_hidden',
                'contents' => ''
            ],
            [
                'name' => 'ip_addr',
                'contents' => 'accusamus'
            ],
            [
                'name' => 'accept_marketing_offers',
                'contents' => ''
            ],
            [
                'name' => 'is_permanent',
                'contents' => '1'
            ],
            [
                'name' => 'tags',
                'contents' => 'car,automotive,tesla,cyber,truck'
            ],
            [
                'name' => 'package_id',
                'contents' => '2'
            ],
            [
                'name' => 'payment_method_id',
                'contents' => '5'
            ],
            [
                'name' => 'pictures[]',
                'contents' => fopen('/private/var/folders/r0/k0xbnx757k3fnz09_6g9rp6w0000gn/T/phpYQ3NZP', 'r')
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
    "message": "Page Not Found."
}
```
<div id="execution-results-PUTapi-posts--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-posts--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-posts--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-posts--id-"></code></pre>
</div>
<form id="form-PUTapi-posts--id-" data-method="PUT" data-path="api/posts/{id}" data-authed="1" data-hasfiles="1" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"multipart\/form-data","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-posts--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-posts--id-" onclick="tryItOut('PUTapi-posts--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-posts--id-" onclick="cancelTryOut('PUTapi-posts--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-posts--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/posts/{id}</code></b>
</p>
<p>
<label id="auth-PUTapi-posts--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-posts--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-posts--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>category_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="category_id" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The category's ID.
</p>
<p>
<b><code>post_type_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="post_type_id" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The listing type's ID.
</p>
<p>
<b><code>title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="title" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The post's title.
</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="description" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The post's description.
</p>
<p>
<b><code>contact_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="contact_name" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The post's author name.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="email" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The post's author email address (required if mobile phone number doesn't exist).
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The post's author mobile number (required if email doesn't exist).
</p>
<p>
<b><code>city_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="city_id" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The city's ID.
</p>
<p>
<b><code>accept_terms</code></b>&nbsp;&nbsp;<small>boolean</small>  &nbsp;
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="accept_terms" value="true" data-endpoint="PUTapi-posts--id-" data-component="body" required ><code>true</code></label>
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="accept_terms" value="false" data-endpoint="PUTapi-posts--id-" data-component="body" required ><code>false</code></label>
<br>
Accept the website terms and conditions.
</p>
<p>
<b><code>country_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country_code" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The code of the user's country.
</p>
<p>
<b><code>admin_code</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="admin_code" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The administrative division's code.
</p>
<p>
<b><code>price</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="price" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The price.
</p>
<p>
<b><code>negotiable</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="negotiable" value="true" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="negotiable" value="false" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>false</code></label>
<br>
Negotiable price or no.
</p>
<p>
<b><code>phone_hidden</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="phone_hidden" value="true" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="phone_hidden" value="false" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>false</code></label>
<br>
Mobile phone number will be hidden in public or no.
</p>
<p>
<b><code>ip_addr</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ip_addr" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The post's author IP address.
</p>
<p>
<b><code>accept_marketing_offers</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="accept_marketing_offers" value="true" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="accept_marketing_offers" value="false" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>false</code></label>
<br>
Accept to receive marketing offers or no.
</p>
<p>
<b><code>is_permanent</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="is_permanent" value="true" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="is_permanent" value="false" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>false</code></label>
<br>
Is it permanent listing or no.
</p>
<p>
<b><code>tags</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="tags" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
Comma-separated tags list.
</p>
<p>
<b><code>pictures</code></b>&nbsp;&nbsp;<small>file[]</small>  &nbsp;
<input type="file" name="pictures.0" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<input type="file" name="pictures.1" data-endpoint="PUTapi-posts--id-" data-component="body" hidden>
<br>
The post's pictures.
</p>
<p>
<b><code>package_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="package_id" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The package's ID.
</p>
<p>
<b><code>payment_method_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="payment_method_id" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The payment method's ID (required when the selected package's price is > 0).
</p>

</form>


## Delete post(s)

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://demo.laraclassifier.local/api/posts/odit" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/posts/odit"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=",
    "X-AppType": "docs",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'https://demo.laraclassifier.local/api/posts/odit',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
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
<div id="execution-results-DELETEapi-posts--ids-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-posts--ids-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-posts--ids-"></code></pre>
</div>
<div id="execution-error-DELETEapi-posts--ids-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-posts--ids-"></code></pre>
</div>
<form id="form-DELETEapi-posts--ids-" data-method="DELETE" data-path="api/posts/{ids}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-posts--ids-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-posts--ids-" onclick="tryItOut('DELETEapi-posts--ids-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-posts--ids-" onclick="cancelTryOut('DELETEapi-posts--ids-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-posts--ids-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/posts/{ids}</code></b>
</p>
<p>
<label id="auth-DELETEapi-posts--ids-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-posts--ids-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>ids</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="ids" data-endpoint="DELETEapi-posts--ids-" data-component="url" required  hidden>
<br>
The ID or comma-separated IDs list of post(s).
</p>
</form>


## Email: Re-send link


Re-send email verification link to the user

> Example request:

```bash
curl -X GET \
    -G "https://demo.laraclassifier.local/api/posts/quis/verify/resend/email?entitySlug=users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/posts/quis/verify/resend/email"
);

let params = {
    "entitySlug": "users",
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
    'https://demo.laraclassifier.local/api/posts/quis/verify/resend/email',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'entitySlug'=> 'users',
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
<div id="execution-results-GETapi-posts--id--verify-resend-email" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts--id--verify-resend-email"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts--id--verify-resend-email"></code></pre>
</div>
<div id="execution-error-GETapi-posts--id--verify-resend-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts--id--verify-resend-email"></code></pre>
</div>
<form id="form-GETapi-posts--id--verify-resend-email" data-method="GET" data-path="api/posts/{id}/verify/resend/email" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts--id--verify-resend-email', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-posts--id--verify-resend-email" onclick="tryItOut('GETapi-posts--id--verify-resend-email');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-posts--id--verify-resend-email" onclick="cancelTryOut('GETapi-posts--id--verify-resend-email');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-posts--id--verify-resend-email" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/posts/{id}/verify/resend/email</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-posts--id--verify-resend-email" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>entitySlug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="entitySlug" data-endpoint="GETapi-posts--id--verify-resend-email" data-component="query"  hidden>
<br>
The slug of the entity to verify ('users' or 'posts').
</p>
</form>


## SMS: Re-send code


Re-send mobile phone verification token by SMS

> Example request:

```bash
curl -X GET \
    -G "https://demo.laraclassifier.local/api/posts/sapiente/verify/resend/sms?entitySlug=users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/posts/sapiente/verify/resend/sms"
);

let params = {
    "entitySlug": "users",
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
    'https://demo.laraclassifier.local/api/posts/sapiente/verify/resend/sms',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'entitySlug'=> 'users',
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
<div id="execution-results-GETapi-posts--id--verify-resend-sms" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts--id--verify-resend-sms"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts--id--verify-resend-sms"></code></pre>
</div>
<div id="execution-error-GETapi-posts--id--verify-resend-sms" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts--id--verify-resend-sms"></code></pre>
</div>
<form id="form-GETapi-posts--id--verify-resend-sms" data-method="GET" data-path="api/posts/{id}/verify/resend/sms" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts--id--verify-resend-sms', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-posts--id--verify-resend-sms" onclick="tryItOut('GETapi-posts--id--verify-resend-sms');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-posts--id--verify-resend-sms" onclick="cancelTryOut('GETapi-posts--id--verify-resend-sms');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-posts--id--verify-resend-sms" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/posts/{id}/verify/resend/sms</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-posts--id--verify-resend-sms" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>entitySlug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="entitySlug" data-endpoint="GETapi-posts--id--verify-resend-sms" data-component="query"  hidden>
<br>
The slug of the entity to verify ('users' or 'posts').
</p>
</form>


## Verification


Verify the user's email address or mobile phone number

> Example request:

```bash
curl -X GET \
    -G "https://demo.laraclassifier.local/api/posts/verify/laborum/et?entitySlug=users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://demo.laraclassifier.local/api/posts/verify/laborum/et"
);

let params = {
    "entitySlug": "users",
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
    'https://demo.laraclassifier.local/api/posts/verify/laborum/et',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'entitySlug'=> 'users',
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
<div id="execution-results-GETapi-posts-verify--field---token--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts-verify--field---token--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts-verify--field---token--"></code></pre>
</div>
<div id="execution-error-GETapi-posts-verify--field---token--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts-verify--field---token--"></code></pre>
</div>
<form id="form-GETapi-posts-verify--field---token--" data-method="GET" data-path="api/posts/verify/{field}/{token?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts-verify--field---token--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-posts-verify--field---token--" onclick="tryItOut('GETapi-posts-verify--field---token--');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-posts-verify--field---token--" onclick="cancelTryOut('GETapi-posts-verify--field---token--');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-posts-verify--field---token--" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/posts/verify/{field}/{token?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>field</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="field" data-endpoint="GETapi-posts-verify--field---token--" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>token</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="token" data-endpoint="GETapi-posts-verify--field---token--" data-component="url"  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>entitySlug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="entitySlug" data-endpoint="GETapi-posts-verify--field---token--" data-component="query"  hidden>
<br>
The slug of the entity to verify ('users' or 'posts').
</p>
</form>



