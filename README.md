# pat_gotop
A "Go Top" feature plugin for Textpattern front-end webites

This simple plugin allows you to add a "Go Top" button into your Textpattern websites. An handcrafted code in vanilla javascript without any dependencies and these different features:

* Choose to display the button on page load or choose to hide it;
* Visual "fade in" and "fade out" animations on the user's scrolling event througout the page;
* Choose to restablish the button appearence when a distance is reached: from the top of the page or from the bottom of the page (in pixels);
* Feature detection in order to use the scrooling animation by default within modern browsers;
* Fallback as a simple link for old browsers.

Final weight: only 1.79 additional KBytes into you pages.

## Usage

Place this tag where you want your "Go Top" button:

`<txp:pat_gotop />`

Then, add an id with the top attribute into your body HTML tag:

`<body id="top">`

## Attributes

> * `title` string (optional): the tooltip content for the button. Default: `Go Top`.
> * `label` the fallback text for the button displayed within old browsers. Default: `Top`.
> * `showme` boolean (optional): Display the button on page load (`1` = Yes, `0` = no). Default: `1` (true)
> * `from_top` boolean (optional): Choose where to calculate the distance to display the button from the top of the page or from the bottom of the page. Default: `1` (true).
> * `distance` integer (optional): The distance in pixels when the button appears (from the top or from the bottom of the page, see above). Default: `750`.
> * `adjust` integer (optional): Adjustment in pixels to reach the top of the page. Default: `100`.

## Custom CSS

The current plugin needs some CSS rules.

First of all, add this into your body CSS properties:


    body {
        scroll-behavior: smooth;
    }

This ensures you to use the default scrolling event in all modern browsers.

Second, include this link into your templates:

`<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/cara-tm/pat_gotop@0.1.0/pat_gotop.min.css">`

...Or, if you want to minize the number of requests, here is the default style rules for the link to add into your CSS file:

***

    /*! pat_gotop plugin styles */
    #pat_gotop {
        display: block;
        visibility: hidden;
        position: absolute;
        position: fixed;
        position: sticky;
        z-index: -1;
        right: 0;
        bottom: 15%;
        float: right;
        width: 3em;
        height: 3.375em;
        margin-right: -.5em;
        text-decoration: none;
        outline: none;
        color: #333;
        font: normal normal normal 1em/1.5 'Helvetica Neue', 'HelveticaNeue', Helvetica, Arial, sans-serif;
        touch-action: none;
        cursor: pointer;
        zoom: 1;

        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=0)";
        filter: alpha(opacity=0);
        -khtml-opacity: 0;
        -moz-opacity: 0;
        opacity: 0;

        -webkit-transform: translate(0, 0) scale(.8);
        -ms-transform: translate(0, 0) scale(.8);
        transform: translate(0, 0) scale(.8);

        -webkit-transition-property: opacity, transform;
        -o-transition-property: opacity, transform;
        transition-property: opacity, transform;
        -webkit-transition-duration: .5s;
        -o-transition-duration: .5s;
        transition-duration: .5s;

        -webkit-transition-timing-function: cubic-bezier(.68,-0.55,.27,1.55);
        -o-transition-timing-function: cubic-bezier(.68,-0.55,.27,1.55);
        transition-timing-function: cubic-bezier(.68,-0.55,.27,1.55)
    }
    html #pat_gotop.visible {
        visibility: visible;
        display: table-cell;
        display: block;
        display: inline-block;
        z-index: 1000;

        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=100)";
        filter: alpha(opacity=100);
        -khtml-opacity: 1;
        -moz-opacity: 1;
        opacity: 1;

        -webkit-transform: translate(0, 0) scale(1);
        -ms-transform: translate(0, 0) scale(1);
        transform: translate(0, 0) scale(1)
    }

***
## History

* 5th May 2018: version 0.1.0.
