<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

/*
---------------------------------------
Kirby Configuration
---------------------------------------
*/

c::set('license', 'put your license key here');
// c::set('debug', true);
// c::set('panel.install', true);

/*
---------------------------------------
Plugins Configuration
---------------------------------------
*/
// c::set('autopublish.templates', array('artwork', 'text'));

/*
---------------------------------------
Routes Configuration
---------------------------------------
*/
c::set('routes', array(
  array(
    'pattern' => '(:any)',
    'action'  => function( $slug ) {

      $page = page( $slug );
      if(!$page) $page = page( 'artwork/' . $slug );
      if(!$page) $page = page( 'texts/' . $slug );
      if(!$page) $page = site()->errorPage();

      return site()->visit( $page );

    }
  )
));


