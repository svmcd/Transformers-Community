<?php

use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;
use Website\Controllers\LoginController;

SimpleRouter::setDefaultNamespace( 'Website\Controllers' );

SimpleRouter::group( [ 'prefix' => site_url() ], function () {

	// START: Zet hier al eigen routes (alle URL's die je op je website hebt) en welke controller en functie deze pagina afhandelt
	// Lees de docs, daar zie je hoe je routes kunt maken: https://github.com/skipperbent/simple-php-router#routes

	SimpleRouter::get( '/', 'WebsiteController@home' )->name( 'home' );
	SimpleRouter::get( '/gebruikers/{gebruikersnaam}', 'GebruikersController@gebruikers' )->name( 'gebruikers' );
	SimpleRouter::get( '/registratie', 'RegistratieController@form' )->name('registratie.form');
	SimpleRouter::post( '/registratie/verwerken', 'RegistratieController@verwerking')->name('registratie.verwerking');
	SimpleRouter::get( '/delen', 'BerichtController@plaats_bericht' )->name('bericht.delen');
	SimpleRouter::post( '/delen', 'BerichtController@opslaan_bericht' )->name('bericht.opslaan');
	SimpleRouter::get( '/login', 'LoginController@login_form' )->name('login.form');
	SimpleRouter::get( '/logout', 'LoginController@logout' )->name('logout');
	SimpleRouter::post( '/login/verwerken', 'LoginController@handleLoginForm' )->name('login.handle');
	SimpleRouter::get( '/feed', 'FeedController@feed' )->name('feed');
	SimpleRouter::get( '/admin', 'AdminController@admin' )->name('admin');
	SimpleRouter::get( '/test', 'TestController@testen' );

	// STOP: Tot hier al je eigen URL's zetten, dit stukje laat de 4040 pagina zien als een route/url niet kan worden gevonden.
	SimpleRouter::get( '/not-found', function () {
		http_response_code( 404 );

		$template_engine = get_template_engine();
        echo $template_engine->render('notfound');
	} );

} );


// Dit zorgt er voor dat bij een niet bestaande route, de 404 pagina wordt getoond (die hierboven als route staat ingesteld)
SimpleRouter::error( function ( Request $request, \Exception $exception ) {
	if ( $exception instanceof NotFoundHttpException && $exception->getCode() === 404 ) {
		response()->redirect( site_url() . '/not-found' );
	}

} );

