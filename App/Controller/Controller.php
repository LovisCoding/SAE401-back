<?php

namespace App\Controller;

abstract class  Controller
{
	// HTTP headers for JSON responses
	const CONTENT_TYPE_JSON = "Content-Type: application/json; charset=UTF-8";
	const ACCESS_CONTROL_ALLOW_ORIGIN = "Access-Control-Allow-Origin: http://localhost:8080";
	const CACHE_CONTROL_NO_CACHE = "Cache-Control: no-cache, must-revalidate";
	const EXPIRES_HEADER = "Expires: Mon, 26 Jul 1997 05:00:00 GMT"; // Expired date for immediate expiry
	const PRAGMA_NO_CACHE = "Pragma: no-cache"; // No-cache policy
	const Access_Control_Allow_Credentials = "Access-Control-Allow-Credentials: true";
	const ACCES_CONTROL_ALLOW_HEADERS = "Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With";
	const ACCESS_CONTROL_ALLOW_METHODS = "Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS";

	/**
	 * Sends a JSON response with the provided data.
	 *
	 * @param mixed $data The data to be sent as JSON.
	 * @param int $statusCode The HTTP status code for the response (default is 200).
	 */
	public static function sendJSONResponse($data, int $statusCode = 200): void
	{
		self::setResponseHeaders();
		http_response_code($statusCode);
		// Convert data to JSON and immediately send the response
		exit(json_encode($data, JSON_PRETTY_PRINT));
	}
	public static function receiveJSONRequest() : array
    {
		
        // Get the raw data from the request
        $jsonData = file_get_contents('php://input');
        // Decode the JSON data and return an associative array
        return json_decode($jsonData, true);
    }

	/**
	 * Sets the standard HTTP headers for JSON responses.
	 */
	private static function setResponseHeaders(): void
	{
		// Allow requests from any origin
		header(self::ACCESS_CONTROL_ALLOW_ORIGIN);
		// Specify response type and character encoding
		header(self::CONTENT_TYPE_JSON);
		// No caching policies
		header(self::CACHE_CONTROL_NO_CACHE);
		header(self::EXPIRES_HEADER);
		header(self::PRAGMA_NO_CACHE);
		header(self::Access_Control_Allow_Credentials);
		header(self::ACCES_CONTROL_ALLOW_HEADERS);
		header(self::ACCESS_CONTROL_ALLOW_METHODS);
	}
	
}