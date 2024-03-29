<!DOCTYPE html>
<hmtl lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Activité 2</title>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
    </style>
    </head>

    <body>
        <!-- Connexion à la BD -->
        <?php
        // Connexion à la BD

            $host = 'localhost';
            $db   = 'my_activities';
            $user = 'root';
            $pass = 'root';
            $charset = 'utf8';
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            try {
                 $pdo = new PDO($dsn, $user, $pass, $options);
            } catch (PDOException $e) {
                 throw new PDOException($e->getMessage(), (int)$e->getCode());
            }
        ?>

        <!-- Formulaire -->
        <form method="post" action="all_users - 2.php" ID="formRecherche">
            Première lettre du prénom : <input type="text" name="lettre"><br>
            Status du compte :
            <select name="status">
                <option value="2">Active account</option>
                <option value="1">Waiting for account validation</option>
                <option value="3">Waiting for account deletion</option>
            </select>
            <br/><input type="submit" value="Effectuer la recherche">
        </form>

        <?php
            // Vérifier qu'on est passés par le formulaire
            if (isset($_POST['status']) && isset($_POST['lettre'])) {

                $status = $_POST['status'];
                $lettre = $_POST['lettre'].'%';

                // Préparation requête
                $sql = "SELECT users.id AS user_id, username, email, s.name AS status FROM users JOIN status s ON users.status_id = s.id WHERE s.id = :status AND username LIKE :lettre ORDER BY username";
                // On enlève traite la chaîne pour que la requête SQL se passe bien
                $stmt = $pdo->prepare($sql);
                // On exécute la requête
                $stmt->execute(['lettre' => $lettre, 'status' => $status]);

            // Sinon on affiche le tableau par défaut avec tous les utilisateurs
            } else {
                $stmt = $pdo->query("SELECT users.id AS user_id, username, email, s.name AS status FROM users JOIN status s ON users.status_id = s.id ORDER BY username");
            }

            // Afficher le tableau
            // Entête tableau
            echo"<h1>All users</h1>";
            echo "<table border=\"1px\">";
            echo "<tr>";
            echo "<th>Id</th>";
            echo "<th>Username</th>";
            echo "<th>Email</th>";
            echo "<th>Status</th>";
            echo "<th>Deletion</th>";
            echo "</tr>";

            // Récupération des données
            while($row = $stmt->fetch()){

                // Récupération des données et affichage
                echo "<tr>";
                echo "<td>".$row['user_id']."</td>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['status']."</td>";
                if ($row['status'] != "Waiting for account deletion") {
                    echo "<td>Ask Deletion</td>";
                } else {
                    echo "<td>/</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>
        </table>
    </body>
</hmtl>