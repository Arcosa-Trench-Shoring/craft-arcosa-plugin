<?php
/**
 * Arcosa plugin for Craft CMS 3.x
 *
 * Shared helper plugin
 *
 * @link      https://dustinwalker.com
 * @copyright Copyright (c) 2021 Dustin Walker
 */

namespace arcosa\arcosa\services;

use arcosa\arcosa\Arcosa;

use Craft;
use craft\base\Component;

/**
 * ArcosaService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Dustin Walker
 * @package   Arcosa
 * @since     1.0.0
 */
class ArcosaService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     Arcosa::$plugin->arcosaService->exampleService()
     *
     * @return mixed
     */
    public function exampleService()
    {
        $result = 'something';
        // Check our Plugin's settings for `someAttribute`
        if (Arcosa::$plugin->getSettings()->someAttribute) {
        }

        return $result;
    }
}
