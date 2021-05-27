<?php
/**
 * arcosa plugin for Craft CMS 3.x
 *
 * Connecting plugin for Craft projects
 *
 * @link      https://dustinwalker.com
 * @copyright Copyright (c) 2021 Dustin Walker
 */

namespace arcosashoring\arcosa\controllers;

use arcosashoring\arcosa\Arcosa;

use Craft;
use craft\web\Controller;

/**
 * Default Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    Dustin Walker
 * @package   Arcosa
 * @since     1.0.0
 */
class DefaultController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index', 'check-url'];

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/arcosa/default
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'Welcome to the DefaultController actionIndex() method';

        return $result;
    }

    /**
     * Handle a request going to our plugin's actionDoSomething URL,
     * e.g.: actions/arcosa/default/do-something
     *
     * @return mixed
     */
    public function actionCheckUrl()
    {
        $url = Craft::$app->request->getParam('validate');
        if(!$this->_urlExists($url)) {
            return json_encode([
                "code" => 404,
                "message" => 'Unknown Error',
                "class" => 'detect-links--bad'
            ]);
        }
        try {
            $headers = get_headers(Craft::$app->request->getParam('validate'), 1);
            $code = $headers[0];
            $response = $this->_returnInfo($code);
            return json_encode($response);
        }
        catch (exception $e) {
            return json_encode([
                "code" => 404,
                "message" => 'Unknown Error',
                "class" => 'detect-links--bad'
            ]);
        }
    }

    private function _urlExists($url) {
        $handle = curl_init($url);
        curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($handle);
        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if($httpCode >= 200 && $httpCode <= 400) {
            return true;
        } else {
            return false;
        }
        curl_close($handle);
    }

    private function _returnInfo($headerCode) {
        if(str_contains($headerCode, '301')) {
            return [
                "code" => 301,
                "message" => 'Redirects',
                "class" => 'detect-links--good'
            ];
        }
        if(str_contains($headerCode, '404')) {
            return [
                "code" => 404,
                "message" => 'Missing Page',
                "class" => 'detect-links--bad'
            ];
        }
        if(str_contains($headerCode, '403')) {
            return [
                "code" => 403,
                "message" => 'Error',
                "class" => 'detect-links--bad'
            ];
        }
        if(str_contains($headerCode, '200')) {
            return [
                "code" => 200,
                "message" => 'Valid',
                "class" => 'detect-links--good'
            ];
        }
        return [
            "code" => 404,
            "message" => 'Unknown Error',
            "class" => 'detect-links--bad'
        ];
    }
}
