require(["global"], function() {
    //This function is called when global.js is loaded.
    //If global.js calls define(), then this function is not fired until
    //util's dependencies have loaded, and the function argument will hold
    //the module value for whatever is passed to it from global.js.

    //var img = $("<img />").attr("src", resp.map_url).height(300).width(300);
		
		$('document').ready(function(){
			//$("#listings").append(img);
			//Underscore.js
			//Use handlebars style template tags
			_.templateSettings = {
			  interpolate : /\{\{(.+?)\}\}/g
			};
			var source   = $("#listing").html();		//Grab the precompiled template version
			var html 	 = _.template(source, resp);	//Grabs a template structure post compilation

			//Handlebars Example
			/*
			var source   = $("#listing").html();
			//var template = Handlebars.compile(source);
			var context = resp;
			var context = test;
			var html    = template(context);
			*/
			$("#listings").append(html);

			$("#stats li").on('click', function(){
				$(this).find('div').slideDown('fast', function(){
					$('body').on('click', function(){
						$('#stats li div').slideUp().off('body').removeClass('active');
					});	
				}).addClass('active');
			});
		});

});