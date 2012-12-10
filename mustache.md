```markdown
#MustacheJS Templating

require(["global"], function() {
    	
		$('document').ready(function(){

			//Handlebars Example
			
			var source   = $("#listing").html();
			var template = Handlebars.compile(source);
			var context = resp;
			//var context = test;
			var html    = template(context);
			
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
```

### The takeaway
The process for this and underscore templating is very similar with the exception of 1 part, step 3.
1. You grab the HTML template.
2. You compile the source
3. ** You set the context **
4. You call the template method passing it the data.
5. You append the result to DOM.

In step 3, you set the data to be used. Mustache calls this the context. Thats it kids.