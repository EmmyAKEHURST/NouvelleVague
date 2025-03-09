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

    public function veriflogin($data){
        $db = \Config\Database::connect();

        $sql = "SELECT COUNT(*) as nb FROM utilisateur where login = ?";
        $result = $db->query($sql, [
            $data['login']
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

    public function getLeTempsFort($idTempsFort){
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM temps_fort WHERE id = ?";
        $results = $db->query($sql, [$idTempsFort]);
        $db->close();
        return $results->getRow();
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

    //permet de s'incrire à un temps fort
    public function inscriptionTempsFort($data, $participant_max)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('reservation');
        $resultat = false;
        
        try {
            if($data['accompagnateur'] + 1 < $participant_max) {
                $builder->insert($data);
                $resultat = $db->affectedRows() > 0;

                if ($resultat) { 
                    $db->query(
                        "UPDATE temps_fort 
                        SET participant_max = participant_max - ? - 1 
                        WHERE id = ?",
                        [$data['accompagnateur'], $data['id_temps_fort']]
                    );
                }
            }
            
        } catch (\Exception $e) {
            log_message('error', 'Erreur insertion réservation: ' . $e->getMessage());
        } finally {
            $db->close();
        }

        return $resultat;
    }

      //Permet de se désinscrire d'un temps fort
    public function desinscriptionTempsFort($data)
    {
        $db = \Config\Database::connect();

        $builder = $db->table('reservation');
        $builder->delete([
            'id_utilisateur' => $data['id_utilisateur'],
            'id_temps_fort' => $data['id_temps_fort'],
            'date' => $data['date'],
            'accompagnateur' => $data['accompagnateur']
        ]);
        
        $db->query(
            "UPDATE temps_fort 
            SET participant_max = participant_max + ? + 1 
            WHERE id = ?",
            [$data['accompagnateur'], $data['id_temps_fort']]
        );

        $db->close();
    }

    // Permet de recuperer les inscriptions d'un utilisateur
    public function getLesInscriptionsId($id_utilisateur)
    {
        $db = \Config\Database::connect();
        $sql = "SELECT id_temps_fort, libelle, reservation.date, accompagnateur, id_utilisateur 
        FROM reservation
        JOIN temps_fort ON reservation.id_temps_fort = temps_fort.id
        WHERE reservation.id_utilisateur = ?";
        $results = $db->query($sql, [$id_utilisateur]);
        $db->close();
        return $results->getResultArray();
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
    
        // Supprimer les réservations associées
        $db->table('reservation')->where('id_temps_fort', $id)->delete();
    
        // Supprimer le temps fort
        $db->table('temps_fort')->where('id', $id)->delete();
    
        return true;
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
    
    public function getParticipantsByTempsFort($id_temps_fort) {
        return $this->db->table('reservation')
            ->select('utilisateur.nom, utilisateur.prenom, utilisateur.mail, reservation.date, reservation.accompagnateur')
            ->join('utilisateur', 'utilisateur.id = reservation.id_utilisateur')
            ->where('reservation.id_temps_fort', $id_temps_fort)
            ->get()
            ->getResultArray();
    }

    public function getAllParticipants() {
        return $this->db->table('reservation')
            ->select('temps_fort.libelle, utilisateur.nom, utilisateur.prenom, utilisateur.mail, reservation.date, reservation.accompagnateur')
            ->join('utilisateur', 'utilisateur.id = reservation.id_utilisateur')
            ->join('temps_fort', 'temps_fort.id = reservation.id_temps_fort')
            ->orderBy('temps_fort.libelle', 'ASC')
            ->get()
            ->getResultArray();
    }
    
    
    
    

    


}
?>