<?php

 if (!defined('BASEPATH')) {
     exit('No direct script access allowed');
 }

// ------------------------------------------------------------------------

/**
 * Session Class.
 *
 * @category	Sessions
 *
 * @author		ExpressionEngine Dev Team
 *
 * @see		http://codeigniter.com/user_guide/libraries/sessions.html
 */
class MY_Session extends CI_Session
{
    // Set new custom var to declare
    // max expire on remember me = 30 days
    public $sess_remember_expiration = 2592000;

    // --------------------------------------------------------------------

    /**
     * Fetch the current session data if it exists.
     *
     * @return bool
     */
    public function sess_read()
    {
        // Fetch the cookie
        $session = $this->CI->input->cookie($this->sess_cookie_name);

        // No cookie?  Goodbye cruel world!...
        if (false === $session) {
            log_message('debug', 'A session cookie was not found.');

            return false;
        }

        // Decrypt the cookie data
        if (true == $this->sess_encrypt_cookie) {
            $session = $this->CI->encrypt->decode($session);
        } else {
            // encryption was not used, so we need to check the md5 hash
            $hash = substr($session, strlen($session) - 32); // get last 32 chars
            $session = substr($session, 0, strlen($session) - 32);

            // Does the md5 hash match?  This is to prevent manipulation of session data in userspace
            if ($hash !== md5($session.$this->encryption_key)) {
                log_message('error', 'The session cookie data did not match what was expected. This could be a possible hacking attempt.');
                $this->sess_destroy();

                return false;
            }
        }

        // Unserialize the session array
        $session = $this->_unserialize($session);

        // Is the session data we unserialized an array with the correct format?
        if (!is_array($session) or !isset($session['session_id']) or !isset($session['ip_address']) or !isset($session['user_agent']) or !isset($session['last_activity'])) {
            $this->sess_destroy();

            return false;
        }

        // Does the IP Match?
        if (true == $this->sess_match_ip and $session['ip_address'] != $this->CI->input->ip_address()) {
            $this->sess_destroy();

            return false;
        }

        // Does the User Agent Match?
        if (true == $this->sess_match_useragent and trim($session['user_agent']) != trim(substr($this->CI->input->user_agent(), 0, 120))) {
            $this->sess_destroy();

            return false;
        }

        // Is there a corresponding session in the DB?
        if (true === $this->sess_use_database) {
            $this->CI->db->where('session_id', $session['session_id']);

            if (true == $this->sess_match_ip) {
                $this->CI->db->where('ip_address', $session['ip_address']);
            }

            if (true == $this->sess_match_useragent) {
                $this->CI->db->where('user_agent', $session['user_agent']);
            }

            $query = $this->CI->db->get($this->sess_table_name);

            // No result?  Kill it!
            if (0 == $query->num_rows()) {
                $this->sess_destroy();

                return false;
            }

            // Is there custom data?  If so, add it to the main session array
            $row = $query->row();
            if (isset($row->user_data) and '' != $row->user_data) {
                $custom_data = $this->_unserialize($row->user_data);

                if (is_array($custom_data)) {
                    foreach ($custom_data as $key => $val) {
                        $session[$key] = $val;
                    }
                }
            }
        }

        if (isset($session['remember_me']) && true === $session['remember_me']) {
            $expiration = $this->sess_remember_expiration;
        } else {
            $expiration = $this->sess_expiration;
        }

        // Is the session current?
        if (($session['last_activity'] + $expiration) < $this->now) {
            $this->sess_destroy();

            return false;
        }

        // Session is valid!
        $this->userdata = $session;
        unset($session);

        return true;
    }

    // --------------------------------------------------------------------

    /**
     * Write the session cookie
     * this code is modified to enable "remember me" option on login page.
     *
     * @param null|mixed $cookie_data
     */
    public function _set_cookie($cookie_data = null)
    {
        if (is_null($cookie_data)) {
            $cookie_data = $this->userdata;
        }

        $remember = $this->userdata('remember_me');

        if (true === $remember) {
            $expire = $this->sess_remember_expiration + time();
        } else {
            $expire = (true === $this->sess_expire_on_close) ? 0 : $this->sess_expiration + time();
        }

        // Serialize the userdata for the cookie
        $cookie_data = $this->_serialize($cookie_data);

        if (true == $this->sess_encrypt_cookie) {
            $cookie_data = $this->CI->encrypt->encode($cookie_data);
        } else {
            // if encryption is not used, we provide an md5 hash to prevent userside tampering
            $cookie_data = $cookie_data.md5($cookie_data.$this->encryption_key);
        }

        // Set the cookie
        setcookie(
            $this->sess_cookie_name,
            $cookie_data,
            $expire,
            $this->cookie_path,
            $this->cookie_domain,
            $this->cookie_secure
        );
    }
}
// END Session Class

// End of file Session.php
// Location: ./system/libraries/Session.php
