<?php
/**
 * arcosa plugin for Craft CMS 3.x
 *
 * Connecting plugin for Craft projects
 *
 * @link      https://dustinwalker.com
 * @copyright Copyright (c) 2021 Dustin Walker
 */

namespace arcosashoring\arcosa\variables;

use arcosashoring\arcosa\Arcosa;

use Craft;

/**
 * arcosa Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.arcosa }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    Dustin Walker
 * @package   Arcosa
 * @since     1.0.0
 */
class ArcosaVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.arcosa.exampleVariable }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.arcosa.exampleVariable(twigValue) }}
     *
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
