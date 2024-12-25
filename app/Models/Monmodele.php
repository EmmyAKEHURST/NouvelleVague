<?php
namespace App\Models;
use CodeIgniter\Model;
class Monmodele extends Model{

    public function getLesContacts(){
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

}
?>