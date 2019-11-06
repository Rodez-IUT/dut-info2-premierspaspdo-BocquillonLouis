<!DOCTYPE html>
<hmtl lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Activité 2</title>
    </head>

    <body>
        <!-- Connexion à la BD -->
        <?php
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
    </body>
</hmtl>