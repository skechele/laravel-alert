<?php

/*
 * This file is part of Laravel Alert.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vinkla\Alert;

use Illuminate\Session\Store;

/**
 * This is the alert class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Alert
{
    /**
     * The session storage instance.
     *
     * @var \Illuminate\Session\Store
     */
    protected $session;

    /**
     * Create a new alert instance.
     *
     * @param \Illuminate\Session\Store $session
     *
     * @return void
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Flash an alert.
     *
     * @param string $message
     * @param string $style
     *
     * @return \Vinkla\Alert\Alert
     */
    public function flash($message, $style = 'info')
    {
        $this->session->flash('alert.message', $message);
        $this->session->flash('alert.style', $style);

        return $this;
    }

    /**
     * Flash a danger alert.
     *
     * @param string $message
     *
     * @return \Vinkla\Alert\Alert
     */
    public function danger($message)
    {
        return $this->flash($message, 'danger');
    }

    /**
     * Flash an error alert.
     *
     * @param string $message
     *
     * @return \Vinkla\Alert\Alert
     */
    public function error($message)
    {
        return $this->flash($message, 'danger');
    }

    /**
     * Flash a info alert.
     *
     * @param string $message
     *
     * @return \Vinkla\Alert\Alert
     */
    public function info($message)
    {
        return $this->flash($message, 'info');
    }

    /**
     * Flash a success alert.
     *
     * @param string $message
     *
     * @return \Vinkla\Alert\Alert
     */
    public function success($message)
    {
        return $this->flash($message, 'success');
    }

    /**
     * Flash a warning alert.
     *
     * @param string $message
     *
     * @return \Vinkla\Alert\Alert
     */
    public function warning($message)
    {
        return $this->flash($message, 'warning');
    }
}
