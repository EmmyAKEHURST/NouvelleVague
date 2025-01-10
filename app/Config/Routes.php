<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->setDefaultNamespace('App\Controllers');
 $routes->setDefaultController('Connexioncontroleur');
 $routes->setDefaultMethod('index');
 $routes->setTranslateURIDashes(false);
 $routes->set404Override();


$routes->get('/', 'Connexioncontroleur::index');

$routes->get('/Connexioncontroleur', 'Connexioncontroleur::index');
$routes->post('/Connexioncontroleur/connexion', 'Connexioncontroleur::connexion');
$routes->post('/Connexioncontroleur/inscription', 'Connexioncontroleur::inscription');
/*
$routes->get('/Controleurmain', 'Controleurmain::index');
$routes->get('Controleurmain/afficher', 'Controleurmain::afficher');
$routes->get('Controleurmain/nbcontacts', 'Controleurmain::nbcontacts');
$routes->get('Controleurmain/ajouter', 'Controleurmain::ajouter');
$routes->post('Controleurmain/ajoutervalider', 'Controleurmain::ajoutervalider');
$routes->get('Controleurmain/supprimer', 'Controleurmain::supprimer');
$routes->post('Controleurmain/supprimervalider', 'Controleurmain::supprimervalider');
*/