<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un temps fort</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <br>
    <h2>Modifier un temps fort</h2>
    <form action="<?= base_url('/modifierTempsFort/'.$tempsFort->id) ?>" method="post">
        <label for="libelle">Titre :</label>
        <input type="text" name="libelle" value="<?= esc($tempsFort->libelle) ?>" required>

        <label for="description">Description :</label>
        <textarea name="description" required><?= esc($tempsFort->description) ?></textarea>

        <label for="date_debut">Date début :</label>
        <input type="date" name="date_debut" value="<?= esc($tempsFort->date_debut) ?>" required>

        <label for="date_fin">Date fin :</label>
        <input type="date" name="date_fin" value="<?= esc($tempsFort->date_fin) ?>" required>

        <label for="participant_max">Nombre max de participants :</label>
        <input type="number" name="participant_max" value="<?= esc($tempsFort->participant_max) ?>" required>

        <button type="submit">Enregistrer</button>
    </form>
</div> 
</body>
</html>




































<style>

form {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 90%;
    max-width: 600px;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #007bff;
}

label {
    font-weight: bold;
    color: #333;
}

input[type="text"],
input[type="date"],
input[type="number"],
textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

textarea {
    resize: vertical;
    min-height: 100px;
}

button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    align-self: center;
    width: 100%;
}

button:hover {
    background-color: #0056b3;
}

/* Responsive */
@media (max-width: 600px) {
    form {
        padding: 15px;
    }

    input, textarea, button {
        font-size: 14px;
    }
}
</style>
