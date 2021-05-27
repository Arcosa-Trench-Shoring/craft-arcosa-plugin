<?php
/**
 * arcosa plugin for Craft CMS 3.x
 *
 * Connecting plugin for Craft projects
 *
 * @link      https://dustinwalker.com
 * @copyright Copyright (c) 2021 Dustin Walker
 */

namespace arcosashoring\arcosa\utilities;

use arcosashoring\arcosa\Arcosa;
use arcosashoring\arcosa\assetbundles\arcosautilityutility\ArcosaUtilityUtilityAsset;

use Craft;
use craft\base\Utility;

/**
 * arcosa Utility
 *
 * Utility is the base class for classes representing Control Panel utilities.
 *
 * https://craftcms.com/docs/plugins/utilities
 *
 * @author    Dustin Walker
 * @package   Arcosa
 * @since     1.0.0
 */
class ArcosaUtility extends Utility
{
    // Static
    // =========================================================================

    /**
     * Returns the display name of this utility.
     *
     * @return string The display name of this utility.
     */
    public static function displayName(): string
    {
        return Craft::t('arcosa', 'ArcosaUtility');
    }

    /**
     * Returns the utility’s unique identifier.
     *
     * The ID should be in `kebab-case`, as it will be visible in the URL (`admin/utilities/the-handle`).
     *
     * @return string
     */
    public static function id(): string
    {
        return 'arcosa-arcosa-utility';
    }

    /**
     * Returns the path to the utility's SVG icon.
     *
     * @return string|null The path to the utility SVG icon
     */
    public static function iconPath()
    {
        return Craft::getAlias("@arcosashoring/arcosa/assetbundles/arcosautilityutility/dist/img/ArcosaUtility-icon.svg");
    }

    /**
     * Returns the number that should be shown in the utility’s nav item badge.
     *
     * If `0` is returned, no badge will be shown
     *
     * @return int
     */
    public static function badgeCount(): int
    {
        return 0;
    }

    /**
     * Returns the utility's content HTML.
     *
     * @return string
     */
    public static function contentHtml(): string
    {
        Craft::$app->getView()->registerAssetBundle(ArcosaUtilityUtilityAsset::class);

        $someVar = 'Have a nice day!';
        return Craft::$app->getView()->renderTemplate(
            'arcosa/_components/utilities/ArcosaUtility_content',
            [
                'someVar' => $someVar
            ]
        );
    }
}
