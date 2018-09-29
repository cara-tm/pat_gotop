<?php
/**
 * pat_gotop plugin: Create a 'Go to top' page link with animations and cross browsers support.
 * @author:  Patrick LEFEVRE.
 * @link:    https://github.com/cara-tm/pat_gotop
 * @type:    Public
 * @prefs:   no
 * @order:   5
 * @version: 0.1.3
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
 * Register function when public pages are rendering.
 *
 */
if (txpinterface === 'public') {
	/**
	 * Main plugin function.
	 *
	 * @param  $atts   string This plugin attributes
	 * @return string
	 */
	function pat_gotop($atts)
	{
		extract(lAtts(array(
			'id'        => 'pat_gotop',
			'title'     => 'Go Top',
			'label'     => 'Top',
			'show_me'   => 1,
			'distance'  => '750',
			'from_top'  => 1,
			'adjust'    => '100',
			'color'     => null,
			'debug'     => 0,
		), $atts));
		return '<a role="button" aria-hidden="true" href="#top" title="'.$title.'" class="'.($show_me ? 'visible' : '').'" id="'.$id.'"><svg aria-hidden="true" role="img" width="48" height="48" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M16 0C7.2 0 0 7.2 0 16c0 8.8 7.2 16 16 16 8.8 0 16-7.2 16-16C32 7.2 24.8 0 16 0zM16 30C8.3 30 2 23.7 2 16 2 8.3 8.3 2 16 2c7.7 0 14 6.3 14 14C30 23.7 23.7 30 16 30z" fill="'.($color ? $color : 'currentColor').'"/><path d="M16.7 11.3c-0.4-0.4-1-0.4-1.4 0l-7 6.9c-0.4 0.4-0.4 1 0 1.4 0.4 0.4 1 0.4 1.4 0l6.3-6.2 6.3 6.2c0.4 0.4 1 0.4 1.4 0 0.4-0.4 0.4-1 0-1.4L16.7 11.3z" fill="'.($color ? $color : 'currentColor').'"></path><switch><foreignObject width="90" height="54"><span>↑&thinsp;'.$label.'</span></foreignObject></switch></svg></a>'."\n".'<script>/*! Simple animated "Go to Top" scroll by cara-tm.com, MIT license. */ ;(function GoTop(){"use strict";var link="'.$id.'",D=document,_dis=Math.max(D.body.scrollHeight,D.documentElement.scrollHeight,D.body.offsetHeight,D.documentElement.offsetHeight,D.body.clientHeight,D.documentElement.clientHeight,D.body.scrollHeight),_el=document.getElementById(link);_el.className='.$show_me.'?"visible":"";"undefined"!=typeof _el&&null!=_el&&(window.onscroll=function(){if('.$from_top.'==true){_el.className=(window.pageYOffset||D.documentElement.scrollTop)+window.innerHeight>='.$distance.'+'.$adjust.'+48?"visible":"";}else{_el.className=(window.pageYOffset||D.documentElement.scrollTop)>=_dis-'.$distance.'-48+'.$adjust.'?"visible":"";}},_el.onclick=function(){var isSmoothScrollSupported="scrollBehavior" in document.documentElement.style;function a(){if(!isSmoothScrollSupported){h=new Date().getTime()-m,b>h&&(c.scrollTop=n-n*(1-Math.cos(h/b*Math.PI))/1,e=setTimeout(function(){a();},0));}else{window.scrollTo({behavior:"smooth","top":0,"right":0});}}var b=500,c="BackCompat"==D.compatMode?D.body:D.documentElement;0===c.scrollTop&&(c=D.body);var e,h,i=c.scrollTop,m=new Date().getTime(),n=i;return clearTimeout(e),a(),!1;});'.($debug?'{var _rs=_dis+48-'.$distance.'-'.$adjust.';console.log("pat_gotop: "+'.($from_top?'('.$distance.'+48)':'_rs').'+"px")};':'').'})();</script>';
	}
}
