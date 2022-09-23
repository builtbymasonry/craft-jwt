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

    /**
     * @param null $optional
     * @return string
     */
    public function exampleVariable($optional = null)
    {
        $result = "And away we go to the Twig template...";
        if ($optional) {
            $result = "I'm feeling optional today...";
        }
        return $result;
    }
}
