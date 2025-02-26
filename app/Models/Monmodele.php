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

    // Permet de recuperer l'utilisateur avec son login -->
    public function getUserByLogin($login)
    {
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM utilisateur WHERE login = ?";
        $query = $db->query($sql, [$login]);
        $db->close();
        return $query->getRow(); 
    }

    // Permet de recuperer l'utilisateur avec son id -->
    public function getUserById($id)
    {
        // Connexion à la base de données
        $db = \Config\Database::connect();
        
        // Exécution de la requête SQL
        $query = $db->query('SELECT * FROM utilisateur WHERE id = ?', [$id]);
        
        // Retourner le premier résultat
        return $query->getRow();
    }
    
    // Permet de mettre a jour le profil grace a l'id -->
    public function updateUser($id, $data)
    {
        // Connexion à la base de données
        $db = \Config\Database::connect();
        
        // Mettre à jour l'utilisateur dans la table 'utilisateur' en utilisant la méthode 'update' de CodeIgniter
        return $db->table('utilisateur')->update($data, ['id' => $id]);
    }
    
    

    


}
?>