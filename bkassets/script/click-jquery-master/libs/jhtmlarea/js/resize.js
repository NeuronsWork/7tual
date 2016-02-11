$(document).ready(function() {
	// Set specific variable to represent all iframe tags.
	var iFrames = document.getElementsByTagName('.jHtmlArea div iframe');

	// Resize heights.
	function iResize()
	{
	 $('.jHtmlArea div iframe').each( function(i,e)
	 {
			height = Math.max(parseInt($(e).css('height')), e.contentWindow.document.body.offsetHeight +50);
			$(e).css('height', height + 'px');
	 });
	}

	// Check if browser is Safari or Opera.
	if ($.browser.safari || $.browser.opera)
	{
		// Start timer when loaded.
		$('.jHtmlArea div iframe').load(function()
			{
				setTimeout(iResize, 0);
			}
		);

		// Safari and Opera need a kick-start.
		$('.jHtmlArea div iframe').each( function(i,e)
		{
			var iSource = iFrames[i].src;
			e.src = '';
			e.src = iSource;
		});
	}
	else
	{
		// For other good browsers.
		$('.jHtmlArea div iframe').load(function()
			{
				// Set inline style to equal the body height of the iframed content.
				this.style.height = this.contentWindow.document.body.offsetHeight + 'px';
			}
		);
	}
	setInterval(iResize, 250);
});