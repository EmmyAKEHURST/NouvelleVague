<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->setDefaultNamespace('App\Controllers');
 $routes->setDefaultController('Controleurmain');
 $routes->setDefaultMethod('index');
 $routes->setTranslateURIDashes(false);
 $routes->set404Override();


$routes->get('/', 'Controleurmain::index');
$routes->post('/connexion', 'Controleurmain::connexion');
$routes->post('/inscription', 'Controleurmain::inscription');
$routes->get('/pgInscription', 'Controleurmain::pgInscription');
$routes->get('/pgConnexion', 'Controleurmain::pgConnexion');
$routes->get('/deconnexion', 'Controleurmain::deconnexion');



/*
$routes->get('/Controleurmain', 'Controleurmain::index');
$routes->get('Controleurmain/afficher', 'Controleurmain::afficher');
$routes->get('Controleurmain/nbcontacts', 'Controleurmain::nbcontacts');
$routes->get('Controleurmain/ajouter', 'Controleurmain::ajouter');
$routes->post('Controleurmain/ajoutervalider', 'Controleurmain::ajoutervalider');
$routes->get('Controleurmain/supprimer', 'Controleurmain::supprimer');
$routes->post('Controleurmain/supprimervalider', 'Controleurmain::supprimervalider');
*/