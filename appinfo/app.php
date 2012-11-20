<?php

/**
* ownCloud - user_imap
*
* @author Bruno Mathieu
* @copyright 2011 Bruno Mathieu bruno@ahennezel.info
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

require_once('apps/user_imap/user_imap.php');

OCP\App::registerAdmin('user_imap','settings');

// define IMAP_DEFAULTs
define('OC_USER_BACKEND_IMAP_DEFAULT_HOST', 'localhost');
define('OC_USER_BACKEND_IMAP_DEFAULT_PORT', 143);

// register user backend
OC_User::useBackend( 'IMAP' );

