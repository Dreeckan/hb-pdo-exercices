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
    echo 'Connexion échouée : ' . $e->getMessage();
}
```

- Une requête directe :

```php
    $sql = "INSERT INTO `computer`(`name`) VALUES ('ASTUS Rogue One'), ('Sansong Galaxy Truc')";
    $count = $connection->exec($sql);
```

- Une requête préparée :

```php
    $sql = "INSERT INTO `component`(`name`, `brand`) VALUES (:name, :brand)";
    $name = 'Pièce de la mort';
    $brand = 'ASTUS';
    $statement = $connection->prepare($sql);
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':brand', $brand, PDO::PARAM_STR);
    $statement->execute();
```

- Faire un select (requête préparée) :

```php
    $sql = "SELECT * FROM computer";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
```

## Préparer notre base de données

Pour cet exercice, nous allons créer une base de données `computer_selling`
- [ ] Créer la base de données
- [ ] y importer le fichier `computer_selling.sql`
  
## Connexion à la base de données

- [ ] Créer un fichier `includes/connect.php`
- [ ] Se connecter à la base de données grâce à PDO
  - [ ] Vérifier que la connexion fonctionne (grâce à un try/catch)

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

## Mise à jour de données

- [ ] Créer un fichier `update.php`
  - [ ] Y appeler nos deux fichiers `includes/connect.php` et `includes/autoload.php`
  
- [ ] On va ajouter (avec une requête de type `ALTER TABLE`) un champ `type` de type VARCHAR(32), qui peut être `NULL` dans les tables `computer`, `component` et `device` (qui va nous permettre de distinguer le type réel, et donc l'objet à utiliser)
  - [ ] pour `components` ce champ va pouvoir avoir les valeurs `cpu`, `graphicCard`, `motherBoard`, `ram`
  - [ ] pour `computer` ce champ va pouvoir avoir les valeurs `desktop`, `laptop`, `tablet`
  - [ ] pour `device` ce champ va pouvoir avoir les valeurs `keyboard`, `mouse`, `speaker`
- [ ] Mettre à jour nos entrées pour leur ajouter un type valide, en utilisant PDO (je vous conseille d'ajouter le type un peu aléatoirement) et des requêtes préparées
  
- [ ] Faire une requête (directe ou préparée) avec PDO pour récupérer ce que vous avez inséré et vérifier vos données
  - [ ] Afficher toutes les données
