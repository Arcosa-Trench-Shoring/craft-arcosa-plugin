<?php
/**
 * arcosa plugin for Craft CMS 3.x
 *
 * Connecting plugin for Craft projects
 *
 * @link      https://dustinwalker.com
 * @copyright Copyright (c) 2021 Dustin Walker
 */

namespace arcosashoring\arcosa\models;

use arcosashoring\arcosa\Arcosa;

use Craft;
use craft\base\Model;

/**
 * Arcosa Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    Dustin Walker
 * @package   Arcosa
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Some field model attributec
     *
     * @var string
     */
    public $accessKey = '';
    public $broadcast = false;
    public $syncFrequency = 1;

    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['accessKey', 'string'],
            ['syncFrequency', 'number'],
            ['accessKey', 'default', 'value' => ''],
            ['broadcast', 'string'],
            ['broadcast', 'default', 'value' => false],
        ];
    }
}
