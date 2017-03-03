<?php

/*
 * This file is part of Laravel Alert.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Vinkla\Alert\Alert;

if (!function_exists('alert')) {
    /**
     * Flash an alert.
     *
     * @param string|null $message
     * @param string|null $style
     *
     * @return \Vinkla\Alert\Alert
     */
    function alert($message = null, $style = 'info')
    {
        $alert = app('alert');

        if (is_null($message)) {
            return $alert;
        }

        return $alert->flash($message, $style);
    }
}
