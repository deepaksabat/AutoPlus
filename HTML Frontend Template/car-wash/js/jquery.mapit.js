/**
 * MapIt
 *
 * @copyright	Copyright 2013, Dimitris Krestos
 * @license		Apache License, Version 2.0 (http://www.opensource.org/licenses/apache2.0.php)
 * @link			http://vdw.staytuned.gr
 * @version		v0.2.2
 */

/* Available options
 *
 * Map type: 	ROADMAP, SATELLITE, HYBRID, TERRAIN
 * Map styles: false, GRAYSCALE
 *
 */
/* Sample html structure
	<div id='map_canvas'></div>
*/


document.write('<scr'+'ipt type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false" ></scr'+'ipt>');

;(function($, window, undefined) {
	"use strict";

	$.fn.mapit = function(options) {

		var defaults = {
			latitude: 	 37.970996,
			longitude: 	 23.730542,
			zoom: 			 16,
			type: 			 'ROADMAP',
			scrollwheel: false,
			marker: {
				latitude: 	37.977996,
				longitude: 	23.733542,
				icon: 			'images/icons/map.png',
				title: 			'Map',
				open: 			false,
				center: 		true
			},
			address: '<div class="infobox-wrap clearfix"><div class="infobox-figure"><div class="mct-map-popup-block"><img src="images/location-01.jpg" class="img-responsive" alt="location-1"><h5 class="mct-popup-heading">Your Heading</h5><p>Give us a brief description of the service that you are promoting. Try keep it short so that it is easy for people to scan your page.</p><p>Give us a brief description of the service that you are promoting.</p><a class="mct-read-more">Read More</a></div></div></div>',
			styles: 'ICEBLUE',
			locations: [
				[37.979252, 23.731353, 'images/icons/map.png', 'listing', '<div class="infobox-wrap clearfix"><div class="infobox-figure"><div class="mct-map-popup-block"><img src="images/location-01.jpg" class="img-responsive" alt="location-1"><h5 class="mct-popup-heading">Your Heading</h5><p>Give us a brief description of the service that you are promoting. Try keep it short so that it is easy for people to scan your page.</p><p>Give us a brief description of the service that you are promoting.</p><a class="mct-read-more">Read More</a></div></div></div>', false, '0'],
				[37.976104, 23.745001, 'images/icons/map.png', 'listing', '<div class="infobox-wrap clearfix"><div class="mct-map-popup-block"><img src="images/location-01.jpg" class="img-responsive" alt="location-1"><h5 class="mct-popup-heading">Your Heading</h5><p>Give us a brief description of the service that you are promoting. Try keep it short so that it is easy for people to scan your page.</p><p>Give us a brief description of the service that you are promoting.</p><a class="mct-read-more">Read More</a></div><div class="infobox-figure"></div></div>', false, '0'],
				[37.979408, 23.743982, 'images/icons/map.png', 'listing', '<div class="infobox-wrap clearfix"><div class="mct-map-popup-block"><img src="images/location-01.jpg" class="img-responsive" alt="location-1"><h5 class="mct-popup-heading">Your Heading</h5><p>Give us a brief description of the service that you are promoting. Try keep it short so that it is easy for people to scan your page.</p><p>Give us a brief description of the service that you are promoting.</p><a class="mct-read-more">Read More</a></div><div class="infobox-figure"></div></div>', false, '0'],
				[37.973563, 23.732041, 'images/icons/map.png', 'listing', '<div class="infobox-wrap clearfix"><div class="infobox-figure"><div class="mct-map-popup-block"><img src="images/location-01.jpg" class="img-responsive" alt="location-1"><h5 class="mct-popup-heading">Your Heading</h5><p>Give us a brief description of the service that you are promoting. Try keep it short so that it is easy for people to scan your page.</p><p>Give us a brief description of the service that you are promoting.</p><a class="mct-read-more">Read More</a></div></div></div>', false, '0'],
				[37.977436, 23.739695, 'images/icons/map.png', 'listing', '<div class="infobox-wrap clearfix"><div class="infobox-figure"><div class="mct-map-popup-block"><img src="images/location-01.jpg" class="img-responsive" alt="location-1"><h5 class="mct-popup-heading">Your Heading</h5><p>Give us a brief description of the service that you are promoting. Try keep it short so that it is easy for people to scan your page.</p><p>Give us a brief description of the service that you are promoting.</p><a class="mct-read-more">Read More</a></div></div></div>', false, '0'],
				[37.979630, 23.736751, 'images/icons/map.png', 'listing', '<div class="infobox-wrap clearfix"><div class="infobox-figure"><div class="mct-map-popup-block"><img src="images/location-01.jpg" class="img-responsive" alt="location-1"><h5 class="mct-popup-heading">Your Heading</h5><p>Give us a brief description of the service that you are promoting. Try keep it short so that it is easy for people to scan your page.</p><p>Give us a brief description of the service that you are promoting.</p><a class="mct-read-more">Read More</a></div></div></div>', false, '0'],
				[37.976104, 23.72341811, 'images/icons/map.png', 'listing', '<div class="infobox-wrap clearfix"><div class="infobox-figure"><div class="mct-map-popup-block"><img src="images/location-01.jpg" class="img-responsive" alt="location-1"><h5 class="mct-popup-heading">Your Heading</h5><p>Give us a brief description of the service that you are promoting. Try keep it short so that it is easy for people to scan your page.</p><p>Give us a brief description of the service that you are promoting.</p><a class="mct-read-more">Read More</a></div></div></div>', false, '0'],
				[37.974630, 23.734751, 'images/icons/map.png', 'listing', '<div class="infobox-wrap clearfix"><div class="infobox-figure"><div class="mct-map-popup-block"><img src="images/location-01.jpg" class="img-responsive" alt="location-1"><h5 class="mct-popup-heading">Your Heading</h5><p>Give us a brief description of the service that you are promoting. Try keep it short so that it is easy for people to scan your page.</p><p>Give us a brief description of the service that you are promoting.</p><a class="mct-read-more">Read More</a></div></div></div>', false, '0'],
				[37.979104, 23.72341811, 'images/icons/map.png', 'listing', '<div class="infobox-wrap clearfix"><div class="infobox-figure"><div class="mct-map-popup-block"><img src="images/location-01.jpg" class="img-responsive" alt="location-1"><h5 class="mct-popup-heading">Your Heading</h5><p>Give us a brief description of the service that you are promoting. Try keep it short so that it is easy for people to scan your page.</p><p>Give us a brief description of the service that you are promoting.</p><a class="mct-read-more">Read More</a></div></div></div>', false, '0'],
			],
			origins: [
				['37.936294', '23.947394'],
				['37.975669', '23.733868']
			]
		};

		var options = $.extend(defaults, options);

		$(this).each(function() {

			var $this = $(this);

				// Init Map
				var directionsDisplay = new google.maps.DirectionsRenderer();

				var mapOptions = {
					scrollwheel: options.scrollwheel,
					scaleControl: false,
					center: 			options.marker.center ? new google.maps.LatLng(options.marker.latitude, options.marker.longitude) : new google.maps.LatLng(options.latitude, options.longitude),
					zoom: 				options.zoom,
					mapTypeId: 		eval('google.maps.MapTypeId.' + options.type)
				};
				var map = new google.maps.Map(document.getElementById($this.attr('id')), mapOptions);
				directionsDisplay.setMap(map);

				// Styles
				if (options.styles) {
					var GRAYSCALE_style = [{featureType:"all",elementType:"all",stylers:[{saturation: -100}]}];
					var MIDNIGHT_style	= [{featureType:'water',stylers:[{color:'#021019'}]},{featureType:'landscape',stylers:[{color:'#08304b'}]},{featureType:'poi',elementType:'geometry',stylers:[{color:'#0c4152'},{lightness:5}]},{featureType:'road.highway',elementType:'geometry.fill',stylers:[{color:'#000000'}]},{featureType:'road.highway',elementType:'geometry.stroke',stylers:[{color:'#0b434f'},{lightness:25}]},{featureType:'road.arterial',elementType:'geometry.fill',stylers:[{color:'#000000'}]},{featureType:'road.arterial',elementType:'geometry.stroke',stylers:[{color:'#0b3d51'},{lightness:16}]},{featureType:'road.local',elementType:'geometry',stylers:[{color:'#000000'}]},{elementType:'labels.text.fill',stylers:[{color:'#ffffff'}]},{elementType:'labels.text.stroke',stylers:[{color:'#000000'},{lightness:13}]},{featureType:'transit',stylers:[{color:'#146474'}]},{featureType:'administrative',elementType:'geometry.fill',stylers:[{color:'#000000'}]},{featureType:'administrative',elementType:'geometry.stroke',stylers:[{color:'#144b53'},{lightness:14},{weight:1.4}]}]
					var BLUE_style			= [{featureType:'water',stylers:[{color:'#46bcec'},{visibility:'on'}]},{featureType:'landscape',stylers:[{color:'#f2f2f2'}]},{featureType:'road',stylers:[{saturation:-100},{lightness:45}]},{featureType:'road.highway',stylers:[{visibility:'simplified'}]},{featureType:'road.arterial',elementType:'labels.icon',stylers:[{visibility:'off'}]},{featureType:'administrative',elementType:'labels.text.fill',stylers:[{color:'#444444'}]},{featureType:'transit',stylers:[{visibility:'off'}]},{featureType:'poi',stylers:[{visibility:'off'}]}]
					var GRAY_style			= [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]					
					var ICEBLUE_style		= [{"stylers":[{"hue":"#2c3e50"},{"saturation":250}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":50},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]}]
					var ORANGE_style		= [{"featureType":"all","elementType":"geometry.fill","stylers":[{"weight":"2.00"}]},{"featureType":"all","elementType":"geometry.stroke","stylers":[{"color":"#9c9c9c"}]},{"featureType":"all","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f3f3f3"}]},{"featureType":"landscape.man_made","elementType":"labels.icon","stylers":[{"color":"#f7941d"},{"weight":"1.00"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#fbdfbd"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"},{"color":"#f7941d"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#a0bfcb"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#c7d3d1"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#070707"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"saturation":"-29"},{"lightness":"-4"}]}]   
					var BLUEGRAY_style		= [{"featureType":"all","elementType":"geometry","stylers":[{"saturation":"-37"},{"hue":"#006cff"},{"lightness":"20"},{"weight":"1.00"},{"visibility":"on"}]},{"featureType":"all","elementType":"labels.text","stylers":[{"visibility":"off"},{"saturation":"23"},{"hue":"#001fff"},{"lightness":"-9"}]},{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":57}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"lightness":24}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]}]    
					var mapType = new google.maps.StyledMapType(eval(options.styles + '_style'), { name: options.styles });
					map.mapTypes.set(options.styles, mapType);
					map.setMapTypeId(options.styles);
				}

				// Home Marker
				var home = new google.maps.Marker({
					map: 			map,
					position: new google.maps.LatLng(options.marker.latitude, options.marker.longitude),
					icon: 		new google.maps.MarkerImage(options.marker.icon),
					title: 		options.marker.title
				});

				// Add info on the home marker
				var info = new google.maps.InfoWindow({
					content: options.address
				});

				// Open the info window immediately
				if (options.marker.open) {
					info.open(map, home);
				} else {
					google.maps.event.addListener(home, 'click', function() {
						info.open(map, home);
					});
				};

				// Create Markers (locations)
				var infowindow = new google.maps.InfoWindow();
				var marker, i;
				var markers = [];

				for (i = 0; i < options.locations.length; i++) {

					// Add Markers
					marker = new google.maps.Marker({
						position: new google.maps.LatLng(options.locations[i][0], options.locations[i][1]),
						map: 			map,
						icon: 		new google.maps.MarkerImage(options.locations[i][2] || options.marker.icon),
						title: 		options.locations[i][3]
					});

					// Create an array of the markers
					markers.push(marker);

					// Init info for each marker
					google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function() {
							infowindow.setContent(options.locations[i][4]);
							infowindow.open(map, marker);
						}
					})(marker, i));

				};

				// Directions
				var directionsService = new google.maps.DirectionsService();

				$this.on ('route', function(event, origin) {
					var request = {
						origin: 			new google.maps.LatLng(options.origins[origin][0], options.origins[origin][1]),
						destination: 	new google.maps.LatLng(options.marker.latitude, options.marker.longitude),
						travelMode: 	google.maps.TravelMode.DRIVING
					};
					directionsService.route(request, function(result, status) {
						if (status == google.maps.DirectionsStatus.OK) {
							directionsDisplay.setDirections(result);
						};
					});
				});

				// Hide Markers Once (helper)
				$this.on ('hide_all', function() {
					for (var i=0; i<options.locations.length; i++) {
						markers[i].setVisible(false);
					};
				});

				// Show Markers Per Category (helper)
				$this.on ('show', function(event, category) {
					$this.trigger('hide_all');
					$this.trigger('reset');

					// Set bounds
					var bounds = new google.maps.LatLngBounds();
					for (var i=0; i<options.locations.length; i++) {
						if (options.locations[i][6] == category) {
							markers[i].setVisible(true);
						};

						// Add markers to bounds
						bounds.extend(markers[i].position);
					};

					// Auto focus and center
					map.fitBounds(bounds);
				});

				// Hide Markers Per Category (helper)
				$this.on ('hide', function(event, category) {
					for (var i=0; i<options.locations.length; i++) {
						if (options.locations[i][6] == category) {
							markers[i].setVisible(false);
						};
					};
				});

				// Clear Markers (helper)
				$this.on ('clear', function() {
					if (markers) {
						for (var i = 0; i < markers.length; i++ ) {
							markers[i].setMap(null);
						};
					};
				});

				$this.on ('reset', function() {
					map.setCenter(new google.maps.LatLng(options.latitude, options.longitude), options.zoom);
				});

				// Hide all locations once
				//$this.trigger('hide_all');

		});

	};

	$(function () { $('[data-toggle="mapit"]').mapit(); });

})(jQuery);