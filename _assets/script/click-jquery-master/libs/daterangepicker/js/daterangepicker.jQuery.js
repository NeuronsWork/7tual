/**
 * --------------------------------------------------------------------
 * jQuery-Plugin "daterangepicker.jQuery.js"
 * by Scott Jehl, scott@filamentgroup.com
 * http://www.filamentgroup.com
 * reference article: http://www.filamentgroup.com/lab/update_date_range_picker_with_jquery_ui/
 * demo page: http://www.filamentgroup.com/examples/daterangepicker/
 * 
 * Copyright (c) 2008 Filament Group, Inc
 * Dual licensed under the MIT (filamentgroup.com/examples/mit-license.txt) and GPL (filamentgroup.com/examples/gpl-license.txt) licenses.
 *
 * Dependencies: jquery, jquery UI datepicker, date.js library (included at bottom), jQuery UI CSS Framework
 * Version: 2.0, 01.04.09
 * Changelog:
 * 	10.23.2008 initial Version
 *  11.12.2008 changed dateFormat option to allow custom date formatting (credit: http://alexgoldstone.com/)
 *  01.04.09 updated markup to new jQuery UI CSS Framework
 * --------------------------------------------------------------------
 */
jQuery.fn.daterangepicker = function(settings){
	jQuery.each(this,
			function(i,n){
				$(n).daterangepickerbuilder(settings);
			}
		);
	return this;
};

jQuery.fn.daterangepickerbuilder = function(settings){
	var rangeInput = jQuery(this);
	//defaults
	var options = jQuery.extend({
		presetRanges: [
			{text: 'Today', dateStart: 'today', dateEnd: 'today' },
			{text: 'Last 7 days', dateStart: 'today-7days', dateEnd: 'today' },
			{text: 'Month to date', dateStart: function(){ return Date.parse('today').moveToFirstDayOfMonth();  }, dateEnd: 'today' },
			{text: 'Year to date', dateStart: function(){ var x= Date.parse('today'); x.setMonth(0); x.setDate(1); return x; }, dateEnd: 'today' }
			//extras:
			//{text: 'Yesterday', dateStart: 'yesterday', dateEnd: 'yesterday' },
			//{text: 'Tomorrow', dateStart: 'Tomorrow', dateEnd: 'Tomorrow' },
			//{text: 'Ad Campaign', dateStart: '03/07/08', dateEnd: 'Today' },
			//{text: 'Last 30 Days', dateStart: 'Today-30', dateEnd: 'Today' },
			//{text: 'Next 30 Days', dateStart: 'Today', dateEnd: 'Today+30' },
			//{text: 'Our Ad Campaign', dateStart: '03/07/08', dateEnd: '07/08/08' }
		], 
		//presetRanges: array of objects for each menu preset. 
		//Each obj must have text, dateStart, dateEnd. dateStart, dateEnd accept date.js string or a function which returns a date object
		presets: ['Specific Date', 'All Dates Before', 'All Dates After', 'Date Range'],
		rangeStartTitle: 'Start date:',
		rangeEndTitle: 'End date:',
		earliestDate: Date.parse('-15years'), //earliest date allowed 
		latestDate: Date.parse('+15years'), //latest date allowed 
		rangeSplitter: '-', //string to use between dates in single input
		dateFormat: 'm/d/yy', // date formatting. Available formats: http://docs.jquery.com/UI/Datepicker/%24.datepicker.formatDate
		closeOnSelect: true, //if a complete selection is made, close the menu
		arrows: false,
		posX: null,
		posY: null,
		appendTo: '#picker_'+rangeInput.attr('id'),
		onClose: function(){},
		onOpen: function(){},
		datepickerOptions: null //object containing native UI datepicker API options
	}, settings);
	

	//custom datepicker options, extended by options
	var datepickerOptions = {
		onSelect: function() { 
				if(rp.find('.ui-daterangepicker-SpecificDate').is('.ui-state-active')){
					rp.find('.range-end').datepicker('setDate', rp.find('.range-start').datepicker('getDate') ); 
				}
				var rangeA = fDate( rp.find('.range-start').datepicker('getDate') );
				var rangeB = fDate( rp.find('.range-end').datepicker('getDate') );
				
				//send back to input or inputs
				if(rangeInput.length == 2){
					rangeInput.eq(0).val(rangeA);
					rangeInput.eq(1).val(rangeB);
				}
				else{
					rangeInput.val((rangeA != rangeB) ? rangeA+' '+ options.rangeSplitter +' '+rangeB : rangeA);
				}
				//if closeOnSelect is true
				if(options.closeOnSelect){
					if(!rp.find('li.ui-state-active').is('.ui-daterangepicker-DateRange') && !rp.is(':animated') ){
						hideRP();
					}
				}				
			},
			defaultDate: +0
	};
	
	//datepicker options from options
	options.datepickerOptions = (settings) ? jQuery.extend(datepickerOptions, settings.datepickerOptions) : datepickerOptions;
	
	//Capture Dates from input(s)
	var inputDateA, inputDateB = Date.parse('today');
	var inputDateAtemp, inputDateBtemp;
	if(rangeInput.size() == 2){
		inputDateAtemp = Date.parse( rangeInput.eq(0).val() );
		inputDateBtemp = Date.parse( rangeInput.eq(1).val() );
		if(inputDateAtemp == null){inputDateAtemp = inputDateBtemp;} 
		if(inputDateBtemp == null){inputDateBtemp = inputDateBtemp;} 
	}
	else {
		inputDateAtemp = Date.parse( rangeInput.val().split(options.rangeSplitter)[0] );
		inputDateBtemp = Date.parse( rangeInput.val().split(options.rangeSplitter)[1] );
		if(inputDateBtemp == null){inputDateBtemp = inputDateBtemp;} //if one date, set both
	}
	if(inputDateAtemp != null){inputDateA = inputDateAtemp;}
	if(inputDateBtemp != null){inputDateB = inputDateBtemp;}

		
	//build picker and 
	var rp = jQuery('<div id="'+rangeInput.attr('id')+'" class="ui-daterangepicker ui-widget ui-helper-clearfix ui-widget-content ui-corner-all"></div>');
	var rpPresets = (function(){
		var ul = jQuery('<ul class="ui-widget-content"></ul>').appendTo(rp);
		jQuery(options.presetRanges).each(function(){
			jQuery('<li class="ui-daterangepicker-'+ this.text.replace(/ /g, '') +' ui-corner-all"><a href="#">'+ this.text +'</a></li>')
			.data('dateStart', this.dateStart)
			.data('dateEnd', this.dateEnd)
			.appendTo(ul);
		});
		jQuery(options.presets).each(function(i){
			jQuery('<li class="ui-daterangepicker-'+ this.replace(/ /g, '') +' preset_'+ i +' ui-helper-clearfix ui-corner-all"><span class="ui-icon ui-icon-triangle-1-e"></span><a href="#">'+ this +'</a></li>')
			.appendTo(ul);
		});
		
		ul.find('li').hover(
				function(){
					jQuery(this).addClass('ui-state-hover');
				},
				function(){
					jQuery(this).removeClass('ui-state-hover');
				})
			.click(function(){
				rp.find('.ui-state-active').removeClass('ui-state-active');
				jQuery(this).addClass('ui-state-active').clickActions(rp, rpPickers);
				return false;
			});
		return ul;
	})();
				
	//function to format a date string        
	function fDate(date){
	   if(!date.getDate()){return '';}
	   var day = date.getDate();
	   var month = date.getMonth();
	   var year = date.getFullYear();
	   month++; // adjust javascript month
	   var dateFormat = options.dateFormat;
	   return jQuery.datepicker.formatDate( dateFormat, date ); 
	}
	
	
	jQuery.fn.restoreDateFromData = function(){
		if(jQuery(this).data('saveDate')){
			jQuery(this).datepicker('setDate', jQuery(this).data('saveDate')).removeData('saveDate'); 
		}
		return this;
	}
	jQuery.fn.saveDateToData = function(){
		if(!jQuery(this).data('saveDate')){
			jQuery(this).data('saveDate', jQuery(this).datepicker('getDate') );
		}
		return this;
	}
	
	//show, hide, or toggle rangepicker
	function showRP(){
		rp.fadeIn(300);
		options.onOpen();
	}
	function hideRP(){
	 if(rp.is(':visible')){
		rp.fadeOut(300, function(){options.onClose(rangeInput);});
		}
	}

	function toggleRP(){
		if(rp.is(':visible')){ hideRP(); }
		else { showRP(); }
	}
	
					
	//preset menu click events	
	jQuery.fn.clickActions = function(rp, rpPickers){
		
		if(jQuery(this).is('.ui-daterangepicker-SpecificDate')){
			doneBtn.hide();
			rpPickers.show();
			rp.find('.title-start').text('Specific Date:');
			rp.find('.range-start').restoreDateFromData().show(400);
			rp.find('.range-end').restoreDateFromData().hide(400);
			setTimeout(function(){doneBtn.fadeIn();}, 400);
		}
		else if(jQuery(this).is('.ui-daterangepicker-AllDatesBefore')){
			doneBtn.hide();
			rpPickers.show();
			rp.find('.title-end').text('All Dates Before:');
			rp.find('.range-start').saveDateToData().datepicker('setDate', options.earliestDate).hide(400);
			rp.find('.range-end').restoreDateFromData().show(400);
			setTimeout(function(){doneBtn.fadeIn();}, 400);
		}
		else if(jQuery(this).is('.ui-daterangepicker-AllDatesAfter')){
			doneBtn.hide();
			rpPickers.show();
			rp.find('.title-start').text('All Dates After:');
			rp.find('.range-start').restoreDateFromData().show(400);
			rp.find('.range-end').saveDateToData().datepicker('setDate', options.latestDate).hide(400);
			setTimeout(function(){doneBtn.fadeIn();}, 400);
		}
		else if(jQuery(this).is('.ui-daterangepicker-DateRange')){
			doneBtn.hide();
			rpPickers.show();
			rp.find('.title-start').text(options.rangeStartTitle);
			rp.find('.title-end').text(options.rangeEndTitle);
			rp.find('.range-start').restoreDateFromData().show(400);
			rp.find('.range-end').restoreDateFromData().show(400);
			setTimeout(function(){doneBtn.fadeIn();}, 400);
		}
		else {
			//custom date range
				doneBtn.hide();
				rp.find('.range-start, .range-end').hide(400, function(){
					rpPickers.hide();
				});
				var dateStart = (typeof jQuery(this).data('dateStart') == 'string') ? Date.parse(jQuery(this).data('dateStart')) : jQuery(this).data('dateStart')();
				var dateEnd = (typeof jQuery(this).data('dateEnd') == 'string') ? Date.parse(jQuery(this).data('dateEnd')) : jQuery(this).data('dateEnd')();
				rp.find('.range-start').datepicker('setDate', dateStart).find('.ui-datepicker-current-day').trigger('click');
				rp.find('.range-end').datepicker('setDate', dateEnd).find('.ui-datepicker-current-day').trigger('click');
		}
		
		return false;
	}	
	

	//picker divs
	var rpPickers = jQuery('<div class="ranges ui-widget-header ui-corner-all ui-helper-clearfix"><div class="range-start"><span class="title-start">Start Date</span></div><div class="range-end"><span class="title-end">End Date</span></div></div>').appendTo(rp);
	rpPickers.find('.range-start, .range-end').datepicker(options.datepickerOptions);
	rpPickers.find('.range-start').datepicker('setDate', inputDateA);
	rpPickers.find('.range-end').datepicker('setDate', inputDateB);
	var doneBtn = jQuery('<button class="btnDone ui-state-default ui-corner-all">Done</button>')
	.click(function(){
		rp.find('.ui-datepicker-current-day').trigger('click');
		//hideRP();
	})
	.hover(
			function(){
				jQuery(this).addClass('ui-state-hover');
			},
			function(){
				jQuery(this).removeClass('ui-state-hover');
			}
	)
	.appendTo(rpPickers);
	
	
	
	
	//inputs toggle rangepicker visibility
	jQuery(this).click(function(){
		toggleRP();
		return false;
	});
	//hide em all
	rpPickers.css('display', 'none').find('.range-start, .range-end, .btnDone').css('display', 'none');
	
	//inject rp
	jQuery(options.appendTo).append(rp);
	
	//wrap and position
	rp.wrap('<div class="ui-daterangepickercontain"></div>');
	if(options.posX){
		rp.parent().css('left', options.posX);
	}
	if(options.posY){
		rp.parent().css('top', options.posY);
	}

	//add arrows (only available on one input)
	if(options.arrows && rangeInput.size()==1){
		jQuery(this)
		.addClass('ui-rangepicker-input ui-widget-content')
		.wrap('<div class="ui-daterangepicker-arrows ui-widget ui-widget-header ui-helper-clearfix ui-corner-all"></div>')
		.before('<a href="#" class="ui-daterangepicker-prev ui-corner-all" title="Prev"><span class="ui-icon ui-icon-circle-triangle-w">Prev</span></a><a href="#" class="ui-daterangepicker-next ui-corner-all" title="Next"><span class="ui-icon ui-icon-circle-triangle-e">Next</span></a>')
		.parent().find('a').click(function(){
			var dateA = rpPickers.find('.range-start').datepicker('getDate');
			var dateB = rpPickers.find('.range-end').datepicker('getDate');
			var diff = Math.abs( new TimeSpan(dateA - dateB).getTotalMilliseconds() ) + 86400000; //difference plus one day
			if(jQuery(this).is('.ui-daterangepicker-prev')){ diff = -diff; }
			
			rpPickers.find('.range-start, .range-end ').each(function(){
					var thisDate = jQuery(this).datepicker( "getDate");
					if(thisDate == null){return false;}
					jQuery(this).datepicker( "setDate", thisDate.add({milliseconds: diff}) ).find('.ui-datepicker-current-day').trigger('click');
			});
			
			return false;
		})
		.hover(
			function(){
				jQuery(this).addClass('ui-state-hover');
			},
			function(){
				jQuery(this).removeClass('ui-state-hover');
			})
		;
	}
	
	
	jQuery(document).click(function(){
		if (rp.is(':visible')) {
			//hideRP();
			rp.fadeOut(300);
		}
	}); 

	rp.click(function(){return false;}).hide();
	return this;
};





