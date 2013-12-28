History.Adapter.bind(window,'statechange',function() {
	var State = History.getState();
});

$(document).ready(function() {
	$('#sidebar').affix({
	      offset: {
	        top: 230,
	        bottom: 100
	      }
	});
		
	$('#sections li a').on('click', function() {
		var which = $(this).attr('id');
		var url = $(this).data('url');
		var title = $(this).attr('data-title');
		
		$('#sections li a').each(function() {
			$(this).removeClass( 'active' );
		});
		
		$(this).addClass( 'active' );
		History.pushState( null, null, url );
		
		document.title = title;
				
		$('#top-stories').animate({left: -470, opacity: 0.1});
		
		$('#new-content').load( url, function() {
			var t_url = WPTDY.url + which + '/';
			$('#top-stories').load( t_url ).fadeIn().animate({"left": "+=470px", opacity: 1.0}, 500);
		});
				
		return false;
	});
	
	$('body').on('click', '.cats a', function() {
		var which = $(this).attr('id');
		var url = $(this).data('url');
		var title = $(this).attr('data-title');

		$('#sections li a').each(function() {
			$(this).removeClass( 'active' );
		});
		
		$('#' + which).addClass( 'active' );
		History.pushState( null, null, url );
		
		document.title = title;
		
		$('#new-content').load( url, function() {
			var t_url = WPTDY.url + which + '/';
			$('#top-stories').load( t_url ).fadeIn();
		});
				
		return false;
	});
	
	$('body').on('click', '.post_link', function() {
		var url = $(this).attr('data-url');
		var title = $(this).attr('data-title');
		$('.modal-header h4').html( title );
		
		History.pushState( null, null, url );
		document.title = title;
		
		$('.modal-body').hide().css('min-height', '700px').html('').load( url ).fadeIn();
	});
	
	$('body').on('click', '.related_link', function() {
		var url = $(this).attr('data-url');
		var title = $(this).attr('data-title');
		
		History.pushState( null, null, url );
		
		document.title = title;
		$('.modal-header h4').html( title );
		$('.modal-body').hide().css('min-height', '700px').html('').load( url ).fadeIn();
		
		return false;
	});
	
	$('#myModal').on('hidden.bs.modal', function (e) {
		History.pushState( null, null, WPTDY.url );
	});
});

$(window).ready(function() {
	var url = $('#sections li a:first').data('url');
	var which = $('#sections li a:first').attr('id');
	var t_url = WPTDY.url + which + '/';
	var address = window.location;
	var bits = address.pathname.split('/');
		
	bits = $.grep(bits, function(n) { return(n) });
		
	var cat = bits.pop();
	var type = bits.pop();
		
	if( type != 'category' ) {
		$('#new-content').hide().load( url, function() {	
			$('#top-stories').hide().load( t_url ).fadeIn();
		}).fadeIn();
	}
		
	if ( $.inArray( address.href, WPTDY.non_poppers ) === -1 ) {
		document.title = WPTDY.entity_title;

		var which = 'section-' + type;
		
		$('#sections li a').each(function() {
			$(this).removeClass( 'active' );
		});
		
		$('#' + which).addClass( 'active' );
		var t_url = WPTDY.url + which + '/';
		
		$('#new-content').hide().load( url, function() {	
			$('#top-stories').hide().load( t_url ).fadeIn();
		}).fadeIn();

		$('.modal-header h4').html( WPTDY.entity_title );
		$('.modal-body').hide().css('min-height', '700px').html('').load( address.href ).fadeIn();
		$('#myModal').modal('toggle');
	}
	
	if( type === 'category' ) {
		var which = 'section-' + cat;
		
		$('#sections li a').each(function() {
			$(this).removeClass( 'active' );
		});
		
		$('#' + which).addClass( 'active' );

		document.title = WPTDY.entity_title;
				
		$('#new-content').load( address.href, function() {
			var t_url = WPTDY.url + which + '/';
			$('#top-stories').load( t_url ).fadeIn();
		});
	}
});