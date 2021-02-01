# Utilisation de PDO

Rappel de ce qu'on a vu dans le cours : 

- Se connecter à la base de données :

```php
$dsn = 'mysql:dbname=cours;host=127.0.0.1';
$user = 'root'; // Utilisateur par défaut
$password = ''; // Par défaut, pas de mot de passe sur Wamp

try {
    $connection = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    exit('Connexion échouée : ' . $e->getMessage());
}
```

- Une requête directe :

```php
    $sql = "INSERT INTO `computer`(`name`) VALUES ('ASTUS Rogue One'), ('Sansong Galaxy Truc')";
    $count = $connection->exec($sql);
```

```php
    $sql = "SELECT * FROM computer";
    $statement = $connection->query($sql); // Récupération d'un objet PDOStatement
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    // équivalent (mais en récupérant des objets) à : while ($result = $statement->fetch(PDO::FETCH_OBJ)) {}
```

- Une requête préparée :

```php
    $sql = "INSERT INTO component(name, brand) VALUES (:name, :brand)";
    
    $donnees = [
        ['Pièce de la mort', 'ASTUS'],
        ['Pièce de la mort', 'ASTUS'],
        ['Pièce de la mort', 'ASTUS'],
    ];
    $statement = $connection->prepare($sql);
    
    foreach ($donnees as $donnee) {
        $statement->bindParam(':name', $donnee[0], PDO::PARAM_STR);
        $statement->bindParam(':brand', $donnee[1], PDO::PARAM_STR);
        $isDone = $statement->execute();
        
        if (!$isDone) {
            throw new Exception('Erreur');
        }
    }
```

- Faire un select (requête préparée) :

```php
    $sql = "SELECT * FROM computer";
    $statement = $connection->prepare($sql);
    $isDone = $statement->execute();

    if (!$isDone) {
        throw new Exception('Erreur');
    }
    // équivalent à : $results = $statement->fetchAll(PDO::FETCH_ASSOC); 
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $results = $statement->fetchAll();
```

- Last insert id :

```php
    $sql = "INSERT INTO `computer`(`name`) VALUES ('ASTUS Rogue One'), ('Sansong Galaxy Truc')";
    $count = $connection->exec($sql);

    $idComputer = $connection->lastInsertId(); // Contient l'identifiant de l'ordinateur : 'Sansong Galaxy Truc'
```

- Traiter/nettoyer des données, des fonctions PHP utiles :
  - [htmlspecialchars](https://www.php.net/manual/fr/function.htmlspecialchars) ([table de conversion des caractères ](https://alexandre.alapetite.fr/doc-alex/alx_special.html)) Convertit les caractères spéciaux en entités HTML (comme `<`)
  - [strip_tags](https://www.php.net/manual/fr/function.strip-tags) supprimer tout ou partie du html d'une chaine de caractères
  - [nl2br](https://www.php.net/manual/fr/function.nl2br.php) passer des sauts de ligne (`\n` et consorts) à des sauts de lignes html
  - [password_hash](https://www.php.net/manual/fr/function.password-hash.php) pour encoder un mot de passe


## Préparer notre base de données

Pour cet exercice, nous allons créer une base de données `computer_selling`
- [ ] Créer la base de données
- [ ] y importer le fichier `computer_selling.sql`
  
## Connexion à la base de données

- [ ] Créer un fichier `includes/connect.php`
- [ ] Se connecter à la base de données grâce à PDO
  - [ ] Vérifier que la connexion fonctionne (grâce à un try/catch)
  
### Pour faire plus propre

Afin de ne pas partager nos identifiants et autres informations sensibles avec d'autres personnes, nous pouvons les mettre dans un fichier que nous n'allons pas versionner avec Git. Chaque personne qui fera un clone du projet **devra** alors le créer et y entrer ses propres valeurs.

- [ ] Créer le fichier `includes/config.inc.php`
- [ ] Y ajouter les variables `$dbName`, `$dbHost`, `$dbUser` et `$dbPass`
- [ ] Les utiliser dans `includes/connect.php` à la place des valeurs "en dur"

## Insertion de données (requête directe)

- [ ] Créer un fichier `insert.php`
  - [ ] Y appeler nos deux fichiers `includes/connect.php` et `includes/autoload.php`
- [ ] Ajouter des entrées dans les tables `computer`, `component` et `device`
  - [ ] Utiliser une requête directe pour insérer des ordinateurs (`computer`)
  - [ ] Utiliser une requête directe pour insérer des composants (`component`)
  - [ ] Utiliser une requête directe pour insérer des périphériques (`device`)
- [ ] Vérifier que vos données sont insérées dans PhpMyAdmin
- [ ] Vérifier que vos données sont insérées avec une requête (directe)
  - [ ] Afficher toutes les données

## Insertion de données (requête préparée)

- [ ] Dans `insert.php`, utiliser une boucle (for pour générer des données) pour :
  - Ajouter des entrées dans les tables `computer`, `component` et `device`
    - [ ] Utiliser une requête directe pour insérer des ordinateurs (`computer`)
    - [ ] Utiliser une requête directe pour insérer des composants (`component`)
    - [ ] Utiliser une requête directe pour insérer des périphériques (`device`)
  - [ ] Vérifier que vos données sont insérées dans PhpMyAdmin
  - [ ] Vérifier que vos données sont insérées avec une requête (préparée)
    - [ ] Afficher toutes les données
  

## Gérer les tables de relation
  