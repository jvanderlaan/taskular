/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

// Register a templates definition set named "default".
CKEDITOR.addTemplates( 'default', {
	// The name of sub folder which hold the shortcut preview images of the
	// templates.
	imagesPath: CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'templates' ) + 'templates/images/' ),

	// The templates definitions.
	templates: [ {
		title: 'Site Survey',
		image: 'template1.gif',
		description: 'Items relavent to a site survey.',
		html: '<p>' +
				'<b>On-Site</b>' +
			'</p>' +
			'<ul>' +
				'<li>' +
					'Start Day:' +
				'</li>' +
				'<li>' +
					'End Day:' +
				'</li>' +
				'<li>' +
					'Start Time:' +
				'</li>' +
			'</ul>' +
			'<p>' +
				'<b>Standards</b>' +
			'</p>' +
			'<ul>' +
				'<li>' +
					'Data ' +
				'</li>' +
				'<li>' +
					'Voice ' +
				'</li>' +
				'<li>' +
					'LBS' +
				'</li>' +
				'<li>' +
					'-XX dBm single AP coverage [2.4 GHz]' +
				'</li>' +
				'<li>' +
					'-XX dBm single AP coverage [5 GHz]' +
				'</li>' +
				'<li>' +
					'-XX dBm second AP coverage [2.4 GHz]' +
				'</li>' +
				'<li>' +
					'-XX dBm second AP coverage [5 GHz]' +
				'</li>' +
				'<li>' +
					'-XX dBm third AP coverage [2.4 GHz]' +
				'</li>' +
				'<li>' +
					'-XX dBm third AP coverage [5 GHz]' +
				'</li>' +
			'</ul>' +
			'<p>' +
				'<b>Survey Hardware</b>' +
			'</p>' +
			'<ul>' +
				'<li>' +
					'AP Model 1' +
				'</li>' +
				'<li>' +
					'AP Model 2 ' +
				'</li>' +
				'<li>' +
					'Antenna Model 1' +
				'</li>' +
				'<li>' +
					'Antenna Model 2' +
				'</li>' +
				'<li>' +
					'Tripod' +
				'</li>' +
				'<li>' +
					'Hi Hi Roller' +
				'</li>' +
			'</ul>' +
			'<p>' +
				'<b>Deliverables</b>' +
			'</p>' +
			'<ul>' +
				'<li>' +
					'AP locations in Visio' +
				'</li>' +
				'<li>' +
					'Mounting notes in Visio' +
				'</li>' +
				'<li>' +
					'Photos of all new locations' +
				'</li>' +
				'<li>' +
					'AirMagnet survey and path data files' +
				'</li>' +
				'<li>' +
					'Spectrum analysis file' +
				'</li>' +
			'</ul>' +
			'<p>' +
				'<b>Lift</b>' +
			'</p>' +
			'<ul>' +
				'<li>' +
					'Reservation #:' +
				'</li>' +
				'<li>' +
					'Rental Contact:' +
				'</li>' +
			'</ul>' +
			'<p>' +
				'<b>Notes</b>' +
			'</p>' +
			'<ul>' +
				'<li>' +
					'Notes start here...' +
				'</li>' +
			'</ul>'
	},
	{
		title: 'Validation Survey',
		image: 'template1.gif',
		description: 'Items relavent to a validation survey.',
		html: '<h3>' +
			// Use src=" " so image is not filtered out by the editor as incorrect (src is required).
			'<img src=" " alt="" style="margin-right: 10px" height="100" width="100" align="left" />' +
			'On-site Dates' +
			'</h3>' +
			'<p>' +
			'Start Time' +
			'</p>'
	},
	{
		title: 'Site & Validation Survey',
		image: 'template2.gif',
		description: 'Items relavent to both types of on-site surveys.',
		html: '<div style="width: 80%">' +
			'<h3>' +
				'Title goes here' +
			'</h3>' +
			'<table style="width:150px;float: right" cellspacing="0" cellpadding="0" border="1">' +
				'<caption style="border:solid 1px black">' +
					'<strong>Table title</strong>' +
				'</caption>' +
				'<tr>' +
					'<td>Something</td>' +
					'<td>Something</td>' +
					'<td>Something</td>' +
				'</tr>' +
				'<tr>' +
					'<td>Something</td>' +
					'<td>Something</td>' +
					'<td>Something</td>' +
				'</tr>' +
				'<tr>' +
					'<td>Something</td>' +
					'<td>Something</td>' +
					'<td>Something</td>' +
				'</tr>' +
			'</table>' +
			'<p>' +
				'Type the text here' +
			'</p>' +
			'</div>'
	} ]
} );
