<?php
/**
 * pat_gotop plugin: Create a 'Go to top' page link with animations and cross browsers support.
 * @author:  Patrick LEFEVRE.
 * @link:    https://github.com/cara-tm/pat_gotop
 * @type:    Public
 * @prefs:   no
 * @order:   5
 * @version: 0.1.2
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

		return '<a role="button" aria-hidden="true" href="#top" title="'.$title.'" class="'.($show_me ? 'visible' : '').'" id="'.$id.'"><svg width="48" height="48" aria-hidden="true" role="img" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="m16 0c-8.8 0-16 7.2-16 16s7.2 16 16 16 16-7.2 16-16-7.2-16-16-16zm0 30c-7.7 0-14-6.3-14-14s6.3-14 14-14 14 6.3 14 14-6.3 14-14 14z" fill="currentColor"/><path d="m16.7 11.3c-0.4-0.4-1-0.4-1.4 0l-7 6.9c-0.4 0.4-0.4 1 0 1.4s1 0.4 1.4 0l6.3-6.2 6.3 6.2c0.4 0.4 1 0.4 1.4 0s0.4-1 0-1.4l-7-6.9z" fill="'.($color ? $color : 'currentColor').'"></path><switch><foreignObject width="90" height="54"><span>↑&thinsp;'.$label.'</span></foreignObject></switch></svg></a>'."\n".'<script>/*! Simple animated "Go to Top" scroll by cara-tm.com, MIT license. */ ;(function GoTop(){"use strict";var link="'.$id.'",D=document,_dis=Math.max(D.body.scrollHeight,D.documentElement.scrollHeight,D.body.offsetHeight,D.documentElement.offsetHeight,D.body.clientHeight,D.documentElement.clientHeight,D.body.scrollHeight),_el=document.getElementById(link);_el.className='.$show_me.'?"visible":"";"undefined"!=typeof _el&&null!=_el&&(window.onscroll=function(){if('.$from_top.'==true){_el.className=(window.pageYOffset||D.documentElement.scrollTop)+window.innerHeight>='.$distance.'+'.$adjust.'+48?"visible":"";}else{_el.className=(window.pageYOffset||D.documentElement.scrollTop)>=_dis-'.$distance.'-48+'.$adjust.'?"visible":"";}},_el.onclick=function(){function a(){h=new Date().getTime()-m,b>h&&(c.scrollTop=n-n*(1-Math.cos(h/b*Math.PI))/1,e=setTimeout(function(){a()},0));}var b=500,c="BackCompat"==D.compatMode?D.body:D.documentElement;0===c.scrollTop&&(c=D.body);var e,h,i=c.scrollTop,m=new Date().getTime(),n=i;return clearTimeout(e),a(),!1;});'.($debug?'{var _rs=_dis+48-'.$distance.'-'.$adjust.';console.log("pat_gotop: "+'.($from_top?'('.$distance.'+48)':'_rs').'+"px")}':'').'})();</script>';

	}

}
