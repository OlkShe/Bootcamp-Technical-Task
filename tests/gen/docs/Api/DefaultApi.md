# OpenAPI\Client\DefaultApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**apiV1CollectionsGet()**](DefaultApi.md#apiV1CollectionsGet) | **GET** /api/v1/collections | Get a list of collections |
| [**apiV1CollectionsIdContributorsGet()**](DefaultApi.md#apiV1CollectionsIdContributorsGet) | **GET** /api/v1/collections/{id}/contributors | Get contributors of a collection |
| [**apiV1CollectionsIdDelete()**](DefaultApi.md#apiV1CollectionsIdDelete) | **DELETE** /api/v1/collections/{id} | Delete a collection |
| [**apiV1CollectionsIdGet()**](DefaultApi.md#apiV1CollectionsIdGet) | **GET** /api/v1/collections/{id} | Get details of a collection |
| [**apiV1CollectionsIdPut()**](DefaultApi.md#apiV1CollectionsIdPut) | **PUT** /api/v1/collections/{id} | Update a collection |
| [**apiV1CollectionsPost()**](DefaultApi.md#apiV1CollectionsPost) | **POST** /api/v1/collections | Create a new collection |


## `apiV1CollectionsGet()`

```php
apiV1CollectionsGet()
```

Get a list of collections

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $apiInstance->apiV1CollectionsGet();
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->apiV1CollectionsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `apiV1CollectionsIdContributorsGet()`

```php
apiV1CollectionsIdContributorsGet($id)
```

Get contributors of a collection

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 'id_example'; // string

try {
    $apiInstance->apiV1CollectionsIdContributorsGet($id);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->apiV1CollectionsIdContributorsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `apiV1CollectionsIdDelete()`

```php
apiV1CollectionsIdDelete($id)
```

Delete a collection

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 'id_example'; // string

try {
    $apiInstance->apiV1CollectionsIdDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->apiV1CollectionsIdDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `apiV1CollectionsIdGet()`

```php
apiV1CollectionsIdGet($id)
```

Get details of a collection

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 'id_example'; // string

try {
    $apiInstance->apiV1CollectionsIdGet($id);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->apiV1CollectionsIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `apiV1CollectionsIdPut()`

```php
apiV1CollectionsIdPut($id, $api_v1_collections_get_request)
```

Update a collection

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 'id_example'; // string
$api_v1_collections_get_request = new \OpenAPI\Client\Model\ApiV1CollectionsGetRequest(); // \OpenAPI\Client\Model\ApiV1CollectionsGetRequest

try {
    $apiInstance->apiV1CollectionsIdPut($id, $api_v1_collections_get_request);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->apiV1CollectionsIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **api_v1_collections_get_request** | [**\OpenAPI\Client\Model\ApiV1CollectionsGetRequest**](../Model/ApiV1CollectionsGetRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `apiV1CollectionsPost()`

```php
apiV1CollectionsPost($api_v1_collections_get_request)
```

Create a new collection

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_v1_collections_get_request = new \OpenAPI\Client\Model\ApiV1CollectionsGetRequest(); // \OpenAPI\Client\Model\ApiV1CollectionsGetRequest

try {
    $apiInstance->apiV1CollectionsPost($api_v1_collections_get_request);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->apiV1CollectionsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **api_v1_collections_get_request** | [**\OpenAPI\Client\Model\ApiV1CollectionsGetRequest**](../Model/ApiV1CollectionsGetRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
