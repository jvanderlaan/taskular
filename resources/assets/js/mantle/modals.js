
/*/////////////////////////////////////////
// -------------- Modals --------------- //
/////////////////////////////////////////*/

var modals = (function() {

	'use strict';

	// Cached DOM elements container
	var DOM = {};
	
	// Module scope variables
	var modalActive = false;


	/* ============ Private Methods ============ */

	// Cache DOM elements
	function cacheDOM() {
		DOM.$modal           = $('.modal');
		DOM.$modalToggle     = $('.modal-toggle');
		DOM.$modalClose      = $('.modal-close');
		DOM.$modalBackground = $('.modal-background');
		DOM.$modalContent    = $('.modal-content');
		DOM.$body            = $('body');
		DOM.$nav             = $('.nav');
	}

	// Bind events
	function bindEvents() {
		DOM.$modalToggle.click(toggleModal);
		DOM.$modalClose.click(closeModalButton);
		DOM.$modalBackground.on('click', closeModalBackground);
		DOM.$modalContent.on('click', exceptModalContent);
	}

	// Handle events
	function toggleModal(e) {

		var modalToToggle = "#" + $(this).attr('id');

		$(modalToToggle + '.modal').toggleClass('toggled');
		if (DOM.$body.height() > $(window).height()) {
			DOM.$body.toggleClass('modal-active');
			DOM.$nav.toggleClass('modal-active');
		}
		modalActive = true;
		e.stopPropagation();
	}

	function closeModalButton(e) {

		var modalToClose = "#" + $(this).parents().eq(1).attr('id');

		$(modalToClose + '.modal').toggleClass('toggled');
		if (DOM.$body.height() > $(window).height()) {
			DOM.$body.toggleClass('modal-active');
			DOM.$nav.toggleClass('modal-active');
		}
		modalActive = false;
		e.stopPropagation();
	}

	function closeModalBackground() {
		if (modalActive == false) {
			return;
		}

		var modalToClose = "#" + $(this).parents().eq(0).attr('id');

		$(modalToClose + '.modal').toggleClass('toggled');
		if (DOM.$body.height() > $(window).height()) {
			DOM.$body.toggleClass('modal-active');
			DOM.$nav.toggleClass('modal-active');
		}
		modalActive = false;
	}

	function exceptModalContent(e) {
		e.stopPropagation();
	}


	/* ============ Public Methods ============ */

	// Initialization method
	function init() {
		cacheDOM();
		bindEvents();
	}


	/* ======== Export Public Methods ========= */

	return {
		init: init
	};

}());