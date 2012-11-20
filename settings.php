<?php

/**
 * ownCloud - user_imap
 *
 * @author Dominik Schmidt
 * @copyright 2011 Dominik Schmidt dev@dominik-schmidt.de
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
$params = array('imap_host', 'imap_port', 'imap_ssl');

OCP\Util::addscript('user_imap', 'settings');

if ($_POST) {
       foreach($params as $param){
               if(isset($_POST[$param])){
                       OCP\Config::setAppValue('user_imap', $param, $_POST[$param]);
               }
               elseif('imap_ssl' == $param) {
                       // unchecked checkboxes are not included in the post paramters
                       OCP\Config::setAppValue('user_imap', $param, 0);
               }
       }
}

// fill template
$tmpl = new OCP\Template( 'user_imap', 'settings');
foreach($params as $param){
       $value = htmlentities(OCP\Config::getAppValue('user_imap', $param,''));
       $tmpl->assign($param, $value);
}

// settings with default values
$tmpl->assign( 'imap_host', OCP\Config::getAppValue('user_imap', 'imap_host', OC_USER_BACKEND_IMAP_DEFAULT_HOST));
$tmpl->assign( 'imap_port', OCP\Config::getAppValue('user_imap', 'imap_port', OC_USER_BACKEND_IMAP_DEFAULT_PORT));

return $tmpl->fetchPage();
