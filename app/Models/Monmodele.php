<?php
namespace App\Models;
use CodeIgniter\Model;
class Monmodele extends Model{
    protected $db;

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

    // Permet de s'incrire à un temps fort
    public function inscriptionTempsFort($data)
{
    $db = \Config\Database::connect();
    $builder = $db->table('reservation');
    $resultat = false;
    
    try {
        $builder->insert($data);
        $resultat = $db->affectedRows() > 0;

        if ($resultat) { 
            
            $id_temps_fort = $data['id_temps_fort'];
            $nbAccompagnateurs = isset($data['accompagnateur']) ? (int) $data['accompagnateur'] : 0;
            
            //calculer le nombre total de participants à soustraire (utilisateur + accompagnateurs)
            $placesReservees = 1 + $nbAccompagnateurs;

            // Mettre à jour le nombre de places restantes
            $db->query("
                UPDATE temps_fort 
                SET participant_max = GREATEST(participant_max - ?, 0) 
                WHERE id = ?
            ", [$placesReservees, $id_temps_fort]); //GREATEST permet de ne pas descendre en dessous de 0
        }
    } catch (\Exception $e) {
        log_message('error', 'Erreur insertion réservation: ' . $e->getMessage());
    } finally {
        $db->close();
    }

    return $resultat;
}


    public function verifInscriptionTempsFort($data){
        $db = \Config\Database::connect();
    
        $sql = "SELECT COUNT(*) as nb FROM reservation WHERE id_temps_fort = ? AND id_utilisateur = ? AND date = ?";
        $query = $db->query($sql, [
            $data['id_temps_fort'],
            $data['id_utilisateur'],
            $data['date']
        ]);
    
        $row = $query->getRow(); //retourne le nombre de lignes
        $nbInscriptions = $row ? $row->nb : 0; //si aucune ligne n'est retournée, on retourne 0
    
        return $nbInscriptions;
    }


    public function creerTempsFort($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('temps_fort');
        $builder->insert($data);
        $db->close();
    }


    public function getTempsFortById($id) {
        $db = \Config\Database::connect();
        $builder = $db->table('temps_fort');
        $builder->where('id', $id);
        $query = $builder->get();
        return $query->getRow();
    }

    public function supprimerTempsFort($id) {
        $db = \Config\Database::connect();
        $builder = $db->table('temps_fort');
        $builder->where('id', $id);
        return $builder->delete();
    }

    public function getAllTempsForts() {
        return $this->db->table('temps_fort')->get()->getResult();
    }
    
    public function updateTempsFort($id, $data) {
        return $this->db->table('temps_fort')->where('id', $id)->update($data);
    }
    
    public function deleteTempsFort($id) {
        return $this->db->table('temps_fort')->where('id', $id)->delete();
    }
    
    
    

    

    
    

    


}
?>