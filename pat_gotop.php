<?php
/**
 * pat_gotop plugin. Create a Go to top page link with animations.
 * @author:  Patrick LEFEVRE.
 * @link:    https://github.com/cara-tm/pat_gotop
 * @type:    Public
 * @prefs:   no
 * @order:   5
 * @version: 0.1.0
 * @license: GPLv2
*/

/**
 * This plugin tag registry.
 */
if (class_exists('\Textpattern\Tag\Registry')) {
	Txp::get('\Textpattern\Tag\Registry')
		->register('pat_gotop');
}

/**
 * Register callback when public pages are rendering.
 *
 */
if (txpinterface === 'public') {
	// Loads a callback function for public context.
	register_callback('pat_gotop', 'textpattern');
}

/**
 * Main plugin function.
 *
 * @param  $atts   string This plugin attributes
 * @param  $thing  string
 * @return string
 */
function pat_gotop($atts)
{
	extract(lAtts(array(
		'title'     => 'Go Top',
		'label'     => 'Top',
		'showme'    => 1,
		'distance'  => '750',
		'from_top'  => 1,
		'adjust'    => '100',
	), $atts));

	return '<a href="#top" title="'.$title.'" class="visible" id="pat_gotop"><svg aria-hidden="true" role="img" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 512 512" class="svg-inline--w-16" font-size="1em"><path d="M8 256C8 119 119 8 256 8s248 111 248 248-111 248-248 248S8 393 8 256zm231-113.9L103.5 277.6c-9.4 9.4-9.4 24.6 0 33.9l17 17c9.4 9.4 24.6 9.4 33.9 0L256 226.9l101.6 101.6c9.4 9.4 24.6 9.4 33.9 0l17-17c9.4-9.4 9.4-24.6 0-33.9L273 142.1c-9.4-9.4-24.6-9.4-34 0z" fill="currentColor"></path><foreignObject><span>↑&thinsp;'.$label.'</span></foreignObject></svg></a>'."\n".'<script>/*! Simple animated "Go to Top" scroll by cara-tm.com, MIT license. */ (function GoTop(){"use strict";var showme='.$showme.',distance='.$distance.',fromTop='.$from_top.',link="pat_gotop",adjust='.$adjust.',D=document,_h=D.body.clientHeight||D.documentElement.clientHeight,_dis=Math.max(D.body.scrollHeight,D.documentElement.scrollHeight,D.body.offsetHeight,D.documentElement.offsetHeight,D.body.clientHeight,D.documentElement.clientHeight,D.body.scrollHeight),_el=document.getElementById(link),isSmoothScrollSupported="scrollBehavior" in document.documentElement.style;_el.className=showme?"visible":"";"undefined"!=typeof _el&&null!=_el&&(window.onscroll=function(){if(fromTop==true){_el.className=(window.pageYOffset||D.documentElement.scrollTop)>distance?"visible":"";}else{_el.className=(window.pageYOffset||D.documentElement.scrollTop)>=_dis-distance-adjust?"visible":""}},_el.onclick=function(){if(!isSmoothScrollSupported){function a(){h=new Date().getTime()-m,b>h&&(c.scrollTop=n-n*(1-Math.cos(h/b*Math.PI))/0.2,e=setTimeout(function(){a()},10))}var b=_h+(window.innerHeight-window.outerHeight||adjust),c="BackCompat"==D.compatMode?D.body:D.documentElement;0===c.scrollTop&&(c=D.body);var e,h,i=c.scrollTop,m=new Date().getTime(),n=i;return clearTimeout(e),a(),!1}});})();</script>';

}
