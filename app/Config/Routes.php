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
$routes->get('/pgProfil', 'Controleurmain::pgProfil');
$routes->post('/profil/modifier', 'Controleurmain::modifierProfil');
$routes->get('/profilModifier', 'Controleurmain::profilModifier');
$routes->get('/pgGestionTempsFort', 'Controleurmain::pgGestionTempsFort');
$routes->post('/creerTempsFort', 'Controleurmain::creerTempsFort');
$routes->get('/tempsForts', 'Controleurmain::tempsForts');
$routes->post('/tempsFortInscription', 'Controleurmain::tempsFortInscription');
$routes->get('/tempsForts', 'Controleurmain::tempsForts');
$routes->post('/tempsFortsInscription', 'Controleurmain::tempsFortsInscription');
$routes->post('/inscriptionEnvoieTF', 'Controleurmain::inscriptionEnvoieTF');
$routes->get('/modifierTempsFort/(:num)', 'Controleurmain::modifierTempsFort/$1');
$routes->post('/modifierTempsFort/(:num)', 'Controleurmain::modifierTempsFort/$1');
$routes->get('/supprimerTempsFort/(:num)', 'Controleurmain::supprimerTempsFort/$1');
$routes->get('/pgConsultationInscriptions', 'Controleurmain::pgConsultationInscriptions');
$routes->post('/desinscriptionTempsFort', 'Controleurmain::desinscriptionTempsFort');



/*
$routes->get('/Controleurmain', 'Controleurmain::index');
$routes->get('Controleurmain/afficher', 'Controleurmain::afficher');
$routes->get('Controleurmain/nbcontacts', 'Controleurmain::nbcontacts');
$routes->get('Controleurmain/ajouter', 'Controleurmain::ajouter');
$routes->post('Controleurmain/ajoutervalider', 'Controleurmain::ajoutervalider');
$routes->get('Controleurmain/supprimer', 'Controleurmain::supprimer');
$routes->post('Controleurmain/supprimervalider', 'Controleurmain::supprimervalider');
*/