<?php
/**
 * Craft JWT plugin for Craft CMS 3.x
 *
 * Generate a JWT
 *
 * @link      builtbymasonry.com
 * @copyright Copyright (c) 2022 Masonry
 */

namespace masonry\craftjwt\variables;

use masonry\craftjwt\CraftJwt;

use Craft;

/**
 * @author    Masonry
 * @package   CraftJwt
 * @since     0.0.1
 */
class CraftJwtVariable
{
    // Public Methods
    // =========================================================================
    // {% set payload = { 'deployment':'string-from-octopart', 'exp':'24hr' } %}
    // {{ craft.craftJwt.generate($payload, 'secret-from-octopart') }}

    /**
     * @param null $optional
     * @return string
     */
    public function generate($payload, $secret)
    {
        //build the headers
        $headers = ['alg'=>'HS256','typ'=>'JWT'];
        $headers_encoded = rtrim(strtr(base64_encode(json_encode($headers))), '+/', '-_'), '=');

        //build the payload
        $payload_encoded = rtrim(strtr(base64_encode(json_encode($payload))), '+/', '-_'), '=');

        //build the signature
        $signature = hash_hmac('sha256',"$headers_encoded.$payload_encoded",$secret,true);
        $signature_encoded = rtrim(strtr(base64_encode($signature)), '+/', '-_'), '=');

        //build and return the token
        $token = "$headers_encoded.$payload_encoded.$signature_encoded";

        return $token;
    }
}
