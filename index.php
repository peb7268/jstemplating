<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="ie6"> <![endif]-->
<!--[if IE 7]>         <html class="ie7"> <![endif]-->
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html>         <!--<![endif]-->

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>Requirejs | YP API Example</title>
	<link rel="stylesheet" href="./styles/styles.css" type="text/css" media="screen" title="no title" charset="utf-8">

	<script type="text/javascript" src="js/libs/require.js" data-main="./js/main"></script>
</head>

<script type="x-handlebars-template" id="listing">
	<header>
		<h1>Welcome To A RequireJS and YP API Example APP Listing</h1>
	</header>
	<img src="{{ map_url }}" height="300" width="300" /> 
	<ul id="stats">
		<li>{{ BusinessListing.Name }}</li>
		<li>General Info <div class="GeneralInfo">{{ BusinessListing.GeneralInfo }}</div></li>
		<li>{{ BusinessListing.Address }} <br> {{ BusinessListing.City }}, {{ BusinessListing.Zip }} </li>
		<li>Phone: {{ BusinessListing.PhoneNumber }}</li>
	</ul><!-- #stats -->
</script>

<body>
	<section id="listings">
		<!-- this section is populated by the template and data context ( name of the object ) -->
	</section><!-- #Listings -->

</body>
</html>