<?php

use WHMCS\User\Alert;
use Illuminate\Database\Capsule\Manager as Capsule;

add_hook('ClientAlert', 1, function($client) {
	$client = Menu::context('client');
	$salutation = Capsule::table('tblcustomfieldsvalues')->where('fieldid','57')->where('relid',$client->id)->value('value');
	$alertstring = "Dear Client,<br>Some users are reporting fraudulent emails sent by us. If you receive an email requesting to change your password, do not click on it unless you have requested.<br>We are working on fixing this problem as soon as possible.<br>XM Hosts Staff ";
	$alertlevel = "info";
	$alertlink = "https://blog.xmhosts.com/fradulentemails";
	return new Alert($alertstring,$alertlevel,$alertlink);
});