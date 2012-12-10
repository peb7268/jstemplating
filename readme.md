#Tools For Modern JS Development


## The Snippet
```markdown
//1
require(["global"], function() {
		
		$('document').ready(function(){
			//2 Underscore.js
			//Use handlebars style template tags 		//a
			_.templateSettings = {
			  interpolate : /\{\{(.+?)\}\}/g
			};
			var source   = $("#listing").html();		//b
			var html 	 = _.template(source, resp);	//c
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

## Some Background
We will be using require.js for this project ( and most future projects coming ).
It is a client side way of writing modular javascript code and including it. If that doesn't make sense
or ring any bells lets talk about it another way. Think of PHP include / require statements. They are great.
JavaScript hasn't had anything like that. Until now. Require.js is like PHP include statements on steroids. It 
not only allow you to load / include files, but it does it async style. In additon, it also lets you specify 
dependencies and order or loading.

You can find it at: 
`` http://requirejs.org/

Using require you can either ** require ** or ** define ** modules.
#### Define is for registering a module to load immediately but also set it up for use in other parts of your app as a dependency.
#### Require is for immideately loading and using a file / module and nothing more.

Most often scripts you load will be loaded as modules using the * define keyword * so they can be set as dependencies. 
Require loads modules that use the AMD compatible module pattern. These are scripts that are wrapped in a module wrapper that conforms
to a reccomended module pattern style. For older scripts that do not conform to this it is essential to use the [config shim](http://requirejs.org/docs/api.html#config-shim) to specify load oreder for those older ghetto modules. An example of this can be seen in none other than jQuery source itself.

```markdown

(function( window, undefined ) { 
	....... 
	//A bunch of code here .....


//The end - Expose jQuery to the global object
window.jQuery = window.$ = jQuery;

// Expose jQuery as an AMD module, but only for AMD loaders that
// understand the issues with loading multiple versions of jQuery
// in a page that all might call define(). The loader will indicate
// they have special allowances for multiple jQuery versions by
// specifying define.amd.jQuery = true. Register as a named module,
// since jQuery can be concatenated with other files that may use define,
// but not use a proper concatenation script that understands anonymous
// AMD modules. A named AMD is safest and most robust way to register.
// Lowercase jquery is used because AMD module names are derived from
// file names, and jQuery is normally delivered in a lowercase file name.
// Do this after creating the global so that if an AMD module wants to call
// noConflict to hide this version of jQuery, it will work.

if ( typeof define === "function" && define.amd && define.amd.jQuery ) {
	define( "jquery", [], function () { return jQuery; } );
}

})( window );

```

## 1) The Setup Explanation
The statement `` require(["global"], function() { `` simply says load the global.js script in the main scripts directory 
( what was defined in data-main when you loaded require ). ** If global.js has dependencies as set with the * define method * ** then 
the function callback here will not execute until all of those scripts are loaded.

Items defined as dependencies in the first param of define / require can be referenced in the callback function as arguments. These are expected to be referenced in the callback in the order in which they were set in the dependency.

## 2) 
//a 
The first example uses the underscore.js library for templating. I considered this to be the framework of choice for a lot of projects im thinking of using 
going forward since it is a hard dependency of backbone.js anyway. No sense in loading extra needless stuff. I do like the templating syntax of mustache better though and since laravel uses it too for blade I figured the first step would be just converting the `` <%= `` notation that is default to the `` {{ myvar }} `` syntax that mustache and laravel use.

//b
The second thing we do is grab the inline template from index.php

//c
The third step and fourth step I combined into one. This step is the heart of the templating approach.
`` var html 	 = _.template(source, resp); ``
The `` _.tempate `` method accepts the template you want to use. It then returns a function that you can reuse for compilation of data. If you pass the `` _.tempate ``a second paramater of data it will immediately compile and just return the results of the compilation instead of a method. This is what we did in this case. If you wanted to do it with the 2 step approach ( in case you wanted to reuse the compiler template ) then you would do: 

```markdown  
	
	var compiler = _.tempate(source);
	var html 	 = compiler(resp);

```

The last thing you would do in this step would be to add the compiled template to the DOM.
``` $('#listing').append(html); ```

Another popular approach that I really like is mustach.js. You can see how it would be implemented [here](https://github.com/peb7268/jstemplating/blob/master/mustache.md)


