# Utilisation de PDO

Pour cet exercice, nous allons créer une base de données `computer_selling`
- [ ] Créer la base de données
- [ ] Créer une table `computer` avec les champs suivants :
  - [ ] `id` (int, auto-increment, clé primaire)
  - [ ] `name` (string)
- [ ] Créer une table `component` avec les champs suivants :
  - [ ] `id` (int, auto-increment, clé primaire)
  - [ ] `brand` (string)
  - [ ] `name` (string)
- [ ] Créer une table `device` avec les champs suivants :
  - [ ] `id` (int, auto-increment, clé primaire)
  - [ ] `brand` (string)
  - [ ] `name` (string)
- [ ] Créer une table `computer_has_component` 
  - avec les champs suivants :
    - [ ] `computer_id` (clé étrangère `computer.id`)
    - [ ] `component_id` (clé étrangère `component.id`)
  - [ ] avec pour clé primaire la combinaison des deux champs `computer_id` et `component_id`
- [ ] Créer une table `computer_has_device` avec les champs suivants : 
  - avec les champs suivants :
    - [ ] `computer_id` (clé étrangère vers `computer.id`)
    - [ ] `device_id` (clé étrangère `device.id`)
  - [ ] avec pour clé primaire la combinaison des deux champs `computer_id` et `device_id`
  
## Insertion de données

- [ ] Créer un fichier `insert.php`
- [ ] Se connecter à la base de données grâce à PDO
  - [ ] Vérifier que la connexion fonctionne (grâce à un try/catch)
- [ ] Ajouter un ou des scripts qui vont ajouter des entrées dans toutes les tables
  - [ ] Utiliser une requête directe au format
  - [ ] Utiliser une requête préparée pour d'autres entrées
  