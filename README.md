# pat_gotop
A "Go Top" feature plugin for Textpattern front-end webites

This simple plugin allows you to add a "Go Top" button into your Textpattern websites. An handcrafted code in vanilla javascript without any dependencies and these different features:

* Choose to display the button on page load or choose to hide it;
* Visual "fade in" and "fade out" animations on the user's scrolling event througout the page;
* Choose to restablish the button appearence when a distance is reached: from the top of the page or from the bottom of the page (in pixels);
* Fallback as a simple link for old browsers.

Tested successfully within these different browsers into the Four Point Seven default theme:

* Firefox 1.0.8 (and all other versions)
* Google Chromium 1 (and all other versions)
* Safari 5.x PC
* Opera 12 (and all other versions)
* Internet Explorer 6 (and all other versions)
* Mindori 0.3.3. (and all other versions)
* Netscape Navigator 7.1 (and all other versions)

Final weight: only 988 additional bytes into you pages.

## Usage

Place this tag where you want your "Go Top" button:

`<txp:pat_gotop />`

Then, add an id with the top attribute into your body HTML tag:

`<body id="top">`

## Attributes


> * `id` string (optional): the HTML unique attribute #ID of the link. Default: `pat_gotop`
> * `title` string (optional): the tooltip content for the button. Default: `Go Top`.
> * `label` the fallback label text for the button displayed within old browsers. Default: `↑ Top`
> * `show_me` boolean (optional): Display the button on page load (`1` = Yes, `0` = no). Default: `1` (true)
> * `from_top` boolean (optional): Choose where to calculate the distance to display the button from the top of the page (after the viewport's height) or from the bottom of the page. Default: `1` (true)
> * `distance` integer (optional): The distance in pixels when the button appears (from the top or from the bottom of the page, see above). Default: `750`
> * `adjust` integer (optional): Adjustment in pixels that affect the scroll calculation into the page (can be a negative value). Default: `100` (i.e. + 100 px)
> * `color` string (optional): The fill color (HEX code) of the SVG icon path. Default: `currentColor`.
> * `debug` boolean (optional): If set to `1` displays some infos into your javascript console: the distance in pixels when the script affects the visibility applied on the button (from the top or the bottom border of the visible browser's window). Useful for this plugin adjustement. Default: `0` (do not display the results into your console).

Notice: keep in mind that the CSS positioning property may change the distance where the button apears into the HTML page and can be different of the scroll position detected.

## Custom CSS

The current plugin needs some CSS rules, here is a starting base of style rules for the link to add into your CSS file:

Include this link into your templates:

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/cara-tm/css/pat_gotop@0.1.2/pat_gotop.min.css">`

...Or, if you want to minize the number of requests, here is the default style rules for the link to add into your CSS file:

***

    /*! pat_gotop plugin CSS rules */
    #pat_gotop {
	display: block;
	visibility: hidden;
	overflow: visible;
	position: absolute;
	z-index: -1;
	top: auto;
	top: calc(100% - 48px);
	right: 0;
	bottom: auto;
	left: auto;
	float: right;
	width: auto;
	height: 3em;
    /* Change the margin-top value depending of your needs:
    -48px corresponds of the button's height above the bottom of the page  */
	margin-top: -48px;
	text-decoration: none;
	text-align: center;
	outline: none;
	font: normal normal normal 1em/1.5 'Helvetica Neue', 'HelveticaNeue', Helvetica, Arial, sans-serif;
	touch-action: none;
	cursor: pointer;
	zoom: 1;

	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=0)";
	filter: alpha(opacity=0);
	-khtml-opacity: 0;
	-o-opacity: 0;
	-moz-opacity: 0;
	opacity: 0;

	-webkit-transform: translate(0, 0) scale(0.5);
	-ms-transform: translate(0, 0) scale(.5);
	transform: translate(0, 0) scale(.5);

	-webkit-animation: opacity 200ms ease-in-out, transform 500ms ease-in-out;
	-webkit-transition-property: opacity, transform;
	transition-property: opacity, transform;
	-webkit-transition-duration: 200ms, 500ms;
	transition-duration: 200ms, 500ms;
	-webkit-transition-timing-function: linear, ease-in-out;
	transition-timing-function: linear, ease-in-out
    }

    /* IE6 fixed position support: can be removed if you don't need it */
    * html #pat_gotop {
	position: absolute; right: 20px; bottom: 15%;
	left: expression( ( 0 + ( ignoreMe2 = document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft ) ) + 'px' );
	top: expression( ( 0 + ( ignoreMe = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop ) ) + 'px' );
    }
    /* End IE 6 support */

    /*! For modern browsers only (do not remove):
    avoids ugly display within very old browsers;
    the link will be set as absolute positionnng
    with a pretty good fallback.
    Note: checking for fixed position support
          don't give exepected results within
          some old Opera browsers versions */
    @supports (position: sticky) {

	#pat_gotop{
		position: fixed;
		right: 20px
	}

    }

    html #pat_gotop.visible {
	visibility: visible;
	display: table-cell;
	display: block;
	display: inline-block;
	z-index: 999999;

	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=100)";
	filter: alpha(opacity=100);
	-khtml-opacity: 1;
	-o-opacity: 1;
	-moz-opacity: 1;
	opacity: 1;

	-webkit-transform: translate(0, 0) scale(1);
	-ms-transform: translate(0, 0) scale(1);
	transform: translate(0, 0) scale(1)
    }

    #pat_gotop svg path {fill: #333}

    #pat_gotop,
	#pat_gotop svg foreignObject {color: #333}

    #pat_gotop span {vertical-align: middle}

    /*! Needed for some old Webkit browsers */
    html #pat_gotop.visible svg {visibility: visible}

***

## Full fallback with javascript disabled

If you want a full availability of your button, you could take advantage to add a js feature detection into the `<head>` part of your page templates:

    <script>
    if(document.documentElement){document.documentElement.className='JS';}
    </script>

Then, use these custom CSS rules instead of the previous ones:

***

    /*! pat_gotop plugin styles */
    #pat_gotop {
	display: block;
	overflow: visible;
	position: absolute;
	/* Modern browsers fallback if @supports query fails */
	position: sticky;
	/* End fallback */
	z-index: 999999;
	top: auto;
	top: calc(100% - 48px);
	right: 0;
	bottom: auto;
	left: auto;
	float: right;
	width: auto;
	height: auto;
	/* Change the margin-top value depending of your needs:
	    -48px corresponds of the button's height above the bottom of the page  */
	margin-top: -48px;
	text-decoration: none;
	text-align: center;
	outline: none;
	font: normal normal normal 1em/1.5 'Helvetica Neue', 'HelveticaNeue', Helvetica, Arial, sans-serif;
	touch-action: none;
	cursor: pointer;
	zoom: 1;

	-webkit-animation: opacity 200ms ease-in-out, transform 500ms ease-in-out;
	-webkit-transition-property: opacity, transform;
	transition-property: opacity, transform;
	-webkit-transition-duration: 200ms, 500ms;
	transition-duration: 200ms, 500ms;
	-webkit-transition-timing-function: linear, ease-in-out;
	transition-timing-function: linear, ease-in-out
    }

    .JS #pat_gotop {
	z-index: -1;
	visibility: hidden;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=0)";
	filter: alpha(opacity=0);
	-khtml-opacity: 0;
	-o-opacity: 0;
	-moz-opacity: 0;
	opacity: 0;

	-webkit-transform: translate(0, 0) scale(0.5);
	-ms-transform: translate(0, 0) scale(.5);
	transform: translate(0, 0) scale(.5)
    }

    /* IE6 fixed position support: can be removed if you don't need it */
    * html #pat_gotop {
	position: absolute; right: 20px; bottom: 15%;
	left: expression( ( 0 + ( ignoreMe2 = document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft ) ) + 'px' );
	top: expression( ( 0 + ( ignoreMe = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop ) ) + 'px' );
    }
    /* End IE 6 support */

    /*! For modern browsers only (do not remove):
    avoids ugly display within very old browsers;
    the link will be set as absolute positionnng
    without any animations but with a good fallback.
    Note: checking for fixed position support
          don't give exepected results within
          some old Opera browsers versions */
    @supports (position: sticky) {

	#pat_gotop{
		position: fixed;
		right: 20px
	}

    }

    #pat_gotop.visible {
	visibility: visible;
	display: table-cell;
	display: block;
	display: inline-block;
	z-index: 999999;

	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=100)";
	filter: alpha(opacity=100);
	-khtml-opacity: 1;
	-o-opacity: 1;
	-moz-opacity: 1;
	opacity: 1;

	-webkit-transform: translate(0, 0) scale(1);
	-ms-transform: translate(0, 0) scale(1);
	transform: translate(0, 0) scale(1)
    }

    #pat_gotop svg path {fill: #333}

    #pat_gotop,
	#pat_gotop svg foreignObject {color: #333}

    #pat_gotop span {vertical-align: middle}

    /*! Needed for some old Webkit browsers */
    html #pat_gotop.visible svg {visibility: visible}

***

## History

* 24th May 2018: v 0.1.2.
* 17th May 2018: version 0.1.1.
* 5th May 2018: version 0.1.0.
