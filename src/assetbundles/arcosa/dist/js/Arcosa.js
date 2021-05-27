/**
 * arcosa plugin for Craft CMS
 *
 * arcosa JS
 *
 * @author    Dustin Walker
 * @copyright Copyright (c) 2021 Dustin Walker
 * @link      https://dustinwalker.com
 * @package   Arcosa
 * @since     1.0.0
 */
const $field = document.querySelector('#fields-siteUrl');
const handleFieldChange = ($field) => {
    if($field.length < 1) {
        return;
    }
    const $url = $field.value;
    const $validate = '/actions/arcosa/default/check-url?validate=' + $url
    let code = '';
    let message = '';
    checkUrl($validate, $field);
}

if(typeof($field) !== 'undefined' && $field) {
    $field.addEventListener('onkeyup', handleFieldChange($field));
}


function checkUrl($validate, $field) {
    fetch($validate).then(function(response) {
        response.json().then(data => {
            let element = document.createElement('span');
            let content = document.createTextNode(`${data.code} - ${data.message}`);
            element.classList.add(data.class);
            element.appendChild(content);
            $field.insertAdjacentHTML('afterEnd', element.outerHTML)
        });
    });
}