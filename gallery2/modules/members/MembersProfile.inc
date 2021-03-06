<?php
/*
 * $RCSfile: MembersProfile.inc,v $
 *
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2005 Bharat Mediratta
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street - Fifth Floor, Boston, MA  02110-1301, USA.
 */

/**
 * @version $Revision: 1.11 $ $Date: 2005/08/23 03:49:45 $
 * @package Members
 * @subpackage UserInterface
 * @author Robert Balousek <rbalousek@hotmail.com>
 */

/**
 * This view will allow users to view a members profile
 *
 * @package Members
 * @subpackage UserInterface
 */
class MembersProfileView extends GalleryView {

    /**
     * @see GalleryView::loadTemplate
     */
    function loadTemplate(&$template, &$form) {
	global $gallery;

	GalleryCoreApi::relativeRequireOnce('modules/members/classes/GalleryMembersHelper.class');
	list ($ret, $result) =
	    GalleryMembersHelper::canViewMembersModule($gallery->getActiveUserId());
	if ($ret->isError()) {
	    return array($ret->wrap(__FILE__, __LINE__), null);
	}
	if (!$result) {
	    return array(GalleryStatus::success(),
			 array('redirect' => array('view' => 'core.ShowItem')));
	}

	$userId = GalleryUtilities::getRequestVariables('userId');
	if (empty($userId)) {
	    return array(GalleryStatus::error(ERROR_BAD_PARAMETER, __FILE__, __LINE__), null);
	}

	if ($form['formName'] != 'MembersProfile') {
	    /* Set some defaults */
	    $form['formName'] = 'MembersProfile';
	}

	$MembersProfile = array();

	/* Bring in the root album information for the breadcrumb */
	list ($ret, $rootAlbumId) =
	    GalleryCoreApi::getPluginParameter('module', 'core', 'id.rootAlbum');
	if ($ret->isError()) {
	    return array($ret->wrap(__FILE__, __LINE__), null);
	}
	list ($ret, $rootAlbum) = GalleryCoreApi::loadEntitiesById($rootAlbumId);
	if ($ret->isError()) {
	    return array($ret->wrap(__FILE__, __LINE__), null);
	}
	$MembersProfile['rootAlbum'] = $rootAlbum->getMemberData();

	list ($ret, $user) = GalleryCoreApi::loadEntitiesById($userId);
	if ($ret->isError()) {
	    return array($ret->wrap(__FILE__, __LINE__), null);
	}
	$MembersProfile['user'] = $user->getMemberData();

	list ($ret, $lastItems) =
	   GalleryMembersHelper::fetchLastUserItems($user->getId(), 0, 5, ORDER_DESCENDING);
	if ($ret->isError()) {
	    return array($ret->wrap(__FILE__, __LINE__), null);
	}

	$MembersProfile['lastItems'] = array();
	foreach ($lastItems as $item) {
	    $MembersProfile['lastItems'][] = $item->getMemberData();
	}

	list ($ret, $daysSinceCreation) = GalleryMembersHelper::daysSinceCreation($user->getId());
	if ($ret->isError()) {
	    return array($ret->wrap(__FILE__, __LINE__), null);
	}
	$MembersProfile['daysSinceCreation'] = $daysSinceCreation;

	list ($ret, $canViewProfileEmail) =
	    GalleryMembersHelper::canViewProfileEmail($gallery->getActiveUserId());
	if ($ret->isError()) {
	    return array($ret->wrap(__FILE__, __LINE__), null);
	}
	$MembersProfile['canViewProfileEmail'] = $canViewProfileEmail;

	$template->setVariable('MembersProfile', $MembersProfile);

	list ($ret, $module) = GalleryCoreApi::loadPlugin('module', 'members');
	if ($ret->isError()) {
	    return array($ret->wrap(__FILE__, __LINE__), null);
	}

	$template->title($module->translate('Members Profile'));
	return array(GalleryStatus::success(),
		     array('body' => 'modules/members/templates/MembersProfile.tpl'));
    }
}
?>
