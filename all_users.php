<!DOCTYPE html>
<hmtl lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Activité 2</title>
<<<<<<< HEAD
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
=======
>>>>>>> 56e22a5330ccaa563f8c6b92aa01bcb70f302d80
    </head>

    <body>
        <!-- Connexion à la BD -->
        <?php
<<<<<<< HEAD
        // Connexion à la BD
=======
>>>>>>> 56e22a5330ccaa563f8c6b92aa01bcb70f302d80
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
<<<<<<< HEAD
        
            // Préparation requête
            $stmt = $pdo->query('SELECT users.id AS user_id, username, email, s.name AS status FROM users JOIN status s ON users.status_id = s.id ORDER BY username');
            
            // Entête tableau
            echo"<h1>All users</h1>";
            echo "<table border=\"1px\">";
            echo "<tr>";
            echo "<th>Id</th>";
            echo "<th>Username</th>";
            echo "<th>Email</th>";
            echo "<th>Status</th>";
            echo "</tr>";

            // Récupération des données
            while($row = $stmt->fetch()){

                // Récupération des données et affichage
                echo "<tr>";
                echo "<td>".$row['user_id']."</td>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['status']."</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
=======
        ?>
        <h1>All Users :</h1>

        <table>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
            <!-- TODO la suite du tableau avec les données de la base -->
            <?php
                $user = array('');

                $stmt = $pdo -> query('SELECT * FROM users');

                $i = 0;
                while ($row = $stmt -> fetch()) {
                    array_push($user, $row['username']);
                    $i++;
                }

                sort($user);

            ?>
        </table>
>>>>>>> 56e22a5330ccaa563f8c6b92aa01bcb70f302d80
    </body>
</hmtl>