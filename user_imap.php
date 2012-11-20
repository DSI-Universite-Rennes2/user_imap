<?php

/**
 * ownCloud - user_imap
 *
 * @author Bruno Mathieu
 * @author Scott Shambarger
 * @copyright 2012 Bruno Mathieu 
 * @copyright 2012 Scott Shambarger devel@shambarger.net
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

class OC_USER_IMAP extends OC_User_Backend {

       // cached settings
        protected $imap_host;
        protected $imap_port;
        protected $imap_ssl;

       public function __construct() {
                $this->imap_host = OCP\Config::getAppValue('user_imap', 'imap_host','');
                $this->imap_port = OCP\Config::getAppValue('user_imap', 'imap_port', OC_USER_BACKEND_IMAP_DEFAULT_PORT);
                $this->imap_ssl = OCP\Config::getAppValue('user_imap', 'imap_ssl', false);
       }

       /**
        * @brief Check if the password is correct
        * @param $uid The username
        * @param $password The password
        * @returns true/false
        *
        * Check if the password is correct without logging in the user
        */
       public function checkPassword($uid, $password){
		OC_Log::write('OC_USER_IMAPAUTH', 'Entering checkPassword uid:'.$uid,3);
                $pos = strpos($uid,"@");
                $host = substr($uid, $pos+1);
                try
                {
                       $url = $this->imap_host.":".$this->imap_port;
                       if ($this->imap_ssl) {
		               $url .= "/imap/ssl/notls/novalidate-cert";
                               error_log("========= $url ====");
                       }
                        $imap = imap_open("{".$url."}",$uid,$password,OP_HALFOPEN,1);
                }
                catch (Exception $e)
                {
                        return false;
                }
                if ($imap === FALSE) 
                {
                        return false;
                }

               return $uid;
       }

       /**
        * @brief Get a list of all users
        * @returns array with all uids
        *
        * Get a list of all users.
        */
/*
       public function getUsers($search = '', $limit = null, $offset = null){
		OC_Log::write('OC_USER_IMAPAUTH', 'Entering getUsers',3);

 
                $users = array();
                // we only know about logged in users
                if (isset($_SESSION['user_id']) AND $_SESSION['user_id'] ){
                        $users[] = $_SESSION['user_id'];
                }

		
                return $users;
       }
*/
       /**
        * @brief check if a user exists
        * @param string $uid the username
        * @return boolean
        */

       public function userExists($uid){
		OC_Log::write('OC_USER_IMAP', 'Entering userExists',3);
                return(isset($_SESSION['user_id']) &&
                $_SESSION['user_id'] == $uid);
       }

}

?>
