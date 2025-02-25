<?php
namespace App\Models;
use CodeIgniter\Model;
class Monmodele extends Model{
    protected $db;

    /*public function getLesContacts(){
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM contact";
        $results = $db->query($sql);
        $db->close();
        return $results->getResultArray();
    }

    public function nbContacts(){
        $db = \Config\Database::connect();
        $sql = "SELECT COUNT(*) as nb FROM contact";
        $results = $db->query($sql);
        $db->close();
        return $results->getRow()->nb;
    }

    public function ajouterContact($data){
        $db = \Config\Database::connect();
        $sql = "INSERT INTO contact (nomContact, prenomContact, emailContact, numeroContact, commentaireContact) VALUES (:nom:, :prenom:, :email:, :telephone:, :commentaire:)";
        $db->query($sql, [
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'telephone' => $data['numero'],
            'commentaire' => $data['commentaire'] ?? null
        ]);
        $db->close();
    }

    public function supprimerContact($data){
        $db = \Config\Database::connect();
        $sql = "DELETE FROM contact WHERE numeroContact = :num:";
        $db->query($sql, ['num' => $data['numero']]);
        $db->close();
    }

    public function connexion($data){
        $db = \Config\Database::connect();
        $sql = "";
    }*/

    // Permet de vérifier si le mail est déjà utilisé -->
    public function verifmail($data){
        $db = \Config\Database::connect();

        $sql = "SELECT COUNT(*) as nb FROM utilisateur where mail = ?";
        $result = $db->query($sql, [
            $data['mail']
        ]);
        $db->close();
        return $result->getRow()->nb;
    }

    // Permet de valider linscription -->
    public function inscriptionValider($data){
        $db = \Config\Database::connect();
        
        $builder = $db->table('utilisateur');
        $builder->insert([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'login' => $data['login'],
            'mail' => $data['mail'],
            'mdp' => password_hash($data['motdepasse'], PASSWORD_DEFAULT)
        ]);
    
        $db->close();
    }
    // Permet de récupérer les temps forts -->
    public function getTempsForts(){
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM temps_fort";
        $results = $db->query($sql);
        $db->close();
        return $results->getResultArray();
    }

}
?>