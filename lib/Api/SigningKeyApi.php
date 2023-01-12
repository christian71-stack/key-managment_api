<?php
/**
 * SigningKeyApi
 * PHP version 5
 *
 * @category Class
 * @package  Cbdesk\EbayKeyManagment\Api
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Key Management API
 *
 * Due to regulatory requirements applicable to our EU/UK sellers, for certain APIs, developers need to add digital signatures to the respective HTTP call. The Key Management API creates keypairs that are required when creating digital signatures for the following APIs:<ul><li>All methods in the <a href=\"/api-docs/sell/finances/resources/methods \" target=\"_blank \">Finances API</a></li><li><a href=\"/api-docs/sell/fulfillment/resources/order/methods/issueRefund \" target=\"_blank \">issueRefund</a> in the Fulfillment API</li><li><a href=\"/Devzone/XML/docs/Reference/eBay/GetAccount.html \" target=\"_blank \">GetAccount</a> in the Trading API</li><li>The following methods in the Post-Order API:<ul><li><a href=\"/Devzone/post-order/post-order_v2_inquiry-inquiryid_issue_refund__post.html \" target=\"_blank \">Issue Inquiry Refund</a></li><li><a href=\"/Devzone/post-order/post-order_v2_casemanagement-caseid_issue_refund__post.html \" target=\"_blank \">Issue case refund</a></li><li><a href=\"/Devzone/post-order/post-order_v2_return-returnid_issue_refund__post.html \" target=\"_blank \">Issue return refund</a></li><li><a href=\"/Devzone/post-order/post-order_v2_return-returnid_decide__post.html \" target=\"_blank \">Process Return Request</a></li><li><a href=\"/devzone/post-order/post-order_v2_cancellation-cancelid_approve__post.html \" target=\"_blank \">Approve Cancellation Request</a></li><li><a href=\"/devzone/post-order/post-order_v2_cancellation__post.html \" target=\"_blank \">Create Cancellation Request</a></li></ul></li></ul><span class=\"tablenote\"><b>Note:</b> For additional information about keypairs and creating Message Signatures, refer to <a href= \"/develop/guides/digital-signatures-for-apis \" target= \"_blank \">Digital Signatures for APIs</a>.</span>
 *
 * OpenAPI spec version: v1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.36
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Cbdesk\EbayKeyManagment\Api\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Cbdesk\EbayKeyManagment\Api\ApiException;
use Cbdesk\EbayKeyManagment\Api\Configuration;
use Cbdesk\EbayKeyManagment\Api\HeaderSelector;
use Cbdesk\EbayKeyManagment\Api\ObjectSerializer;

/**
 * SigningKeyApi Class Doc Comment
 *
 * @category Class
 * @package  Cbdesk\EbayKeyManagment\Api
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SigningKeyApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation createSigningKey
     *
     * @param  \Cbdesk\EbayKeyManagment\Api\Model\CreateSigningKeyRequest $body body (optional)
     *
     * @throws \Cbdesk\EbayKeyManagment\Api\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cbdesk\EbayKeyManagment\Api\Model\SigningKey
     */
    public function createSigningKey($body = null)
    {
        list($response) = $this->createSigningKeyWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation createSigningKeyWithHttpInfo
     *
     * @param  \Cbdesk\EbayKeyManagment\Api\Model\CreateSigningKeyRequest $body (optional)
     *
     * @throws \Cbdesk\EbayKeyManagment\Api\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cbdesk\EbayKeyManagment\Api\Model\SigningKey, HTTP status code, HTTP response headers (array of strings)
     */
    public function createSigningKeyWithHttpInfo($body = null)
    {
        $returnType = '\Cbdesk\EbayKeyManagment\Api\Model\SigningKey';
        $request = $this->createSigningKeyRequest($body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cbdesk\EbayKeyManagment\Api\Model\SigningKey',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createSigningKeyAsync
     *
     * 
     *
     * @param  \Cbdesk\EbayKeyManagment\Api\Model\CreateSigningKeyRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createSigningKeyAsync($body = null)
    {
        return $this->createSigningKeyAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createSigningKeyAsyncWithHttpInfo
     *
     * 
     *
     * @param  \Cbdesk\EbayKeyManagment\Api\Model\CreateSigningKeyRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createSigningKeyAsyncWithHttpInfo($body = null)
    {
        $returnType = '\Cbdesk\EbayKeyManagment\Api\Model\SigningKey';
        $request = $this->createSigningKeyRequest($body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createSigningKey'
     *
     * @param  \Cbdesk\EbayKeyManagment\Api\Model\CreateSigningKeyRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createSigningKeyRequest($body = null)
    {

        $resourcePath = '/signing_key';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getSigningKey
     *
     * @param  string $signing_key_id The system-generated eBay ID of the keypairs being requested. (required)
     *
     * @throws \Cbdesk\EbayKeyManagment\Api\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cbdesk\EbayKeyManagment\Api\Model\SigningKey
     */
    public function getSigningKey($signing_key_id)
    {
        list($response) = $this->getSigningKeyWithHttpInfo($signing_key_id);
        return $response;
    }

    /**
     * Operation getSigningKeyWithHttpInfo
     *
     * @param  string $signing_key_id The system-generated eBay ID of the keypairs being requested. (required)
     *
     * @throws \Cbdesk\EbayKeyManagment\Api\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cbdesk\EbayKeyManagment\Api\Model\SigningKey, HTTP status code, HTTP response headers (array of strings)
     */
    public function getSigningKeyWithHttpInfo($signing_key_id)
    {
        $returnType = '\Cbdesk\EbayKeyManagment\Api\Model\SigningKey';
        $request = $this->getSigningKeyRequest($signing_key_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cbdesk\EbayKeyManagment\Api\Model\SigningKey',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getSigningKeyAsync
     *
     * 
     *
     * @param  string $signing_key_id The system-generated eBay ID of the keypairs being requested. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSigningKeyAsync($signing_key_id)
    {
        return $this->getSigningKeyAsyncWithHttpInfo($signing_key_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getSigningKeyAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $signing_key_id The system-generated eBay ID of the keypairs being requested. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSigningKeyAsyncWithHttpInfo($signing_key_id)
    {
        $returnType = '\Cbdesk\EbayKeyManagment\Api\Model\SigningKey';
        $request = $this->getSigningKeyRequest($signing_key_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getSigningKey'
     *
     * @param  string $signing_key_id The system-generated eBay ID of the keypairs being requested. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getSigningKeyRequest($signing_key_id)
    {
        // verify the required parameter 'signing_key_id' is set
        if ($signing_key_id === null || (is_array($signing_key_id) && count($signing_key_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $signing_key_id when calling getSigningKey'
            );
        }

        $resourcePath = '/signing_key/{signing_key_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($signing_key_id !== null) {
            $resourcePath = str_replace(
                '{' . 'signing_key_id' . '}',
                ObjectSerializer::toPathValue($signing_key_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getSigningKeys
     *
     *
     * @throws \Cbdesk\EbayKeyManagment\Api\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cbdesk\EbayKeyManagment\Api\Model\QuerySigningKeysResponse
     */
    public function getSigningKeys()
    {
        list($response) = $this->getSigningKeysWithHttpInfo();
        return $response;
    }

    /**
     * Operation getSigningKeysWithHttpInfo
     *
     *
     * @throws \Cbdesk\EbayKeyManagment\Api\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cbdesk\EbayKeyManagment\Api\Model\QuerySigningKeysResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getSigningKeysWithHttpInfo()
    {
        $returnType = '\Cbdesk\EbayKeyManagment\Api\Model\QuerySigningKeysResponse';
        $request = $this->getSigningKeysRequest();

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cbdesk\EbayKeyManagment\Api\Model\QuerySigningKeysResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getSigningKeysAsync
     *
     * 
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSigningKeysAsync()
    {
        return $this->getSigningKeysAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getSigningKeysAsyncWithHttpInfo
     *
     * 
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSigningKeysAsyncWithHttpInfo()
    {
        $returnType = '\Cbdesk\EbayKeyManagment\Api\Model\QuerySigningKeysResponse';
        $request = $this->getSigningKeysRequest();

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getSigningKeys'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getSigningKeysRequest()
    {

        $resourcePath = '/signing_key';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}