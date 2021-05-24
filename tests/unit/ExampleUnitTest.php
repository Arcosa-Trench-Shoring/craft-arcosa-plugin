<?php
/**
 * Arcosa plugin for Craft CMS 3.x
 *
 * Shared helper plugin
 *
 * @link      https://dustinwalker.com
 * @copyright Copyright (c) 2021 Dustin Walker
 */

namespace arcosa\arcosatests\unit;

use Codeception\Test\Unit;
use UnitTester;
use Craft;
use arcosa\arcosa\Arcosa;

/**
 * ExampleUnitTest
 *
 *
 * @author    Dustin Walker
 * @package   Arcosa
 * @since     1.0.0
 */
class ExampleUnitTest extends Unit
{
    // Properties
    // =========================================================================

    /**
     * @var UnitTester
     */
    protected $tester;

    // Public methods
    // =========================================================================

    // Tests
    // =========================================================================

    /**
     *
     */
    public function testPluginInstance()
    {
        $this->assertInstanceOf(
            Arcosa::class,
            Arcosa::$plugin
        );
    }

    /**
     *
     */
    public function testCraftEdition()
    {
        Craft::$app->setEdition(Craft::Pro);

        $this->assertSame(
            Craft::Pro,
            Craft::$app->getEdition()
        );
    }
}
