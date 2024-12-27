# Zoo Arcadia

**Zoo Arcadia** est un projet de gestion d'un zoo, offrant un système complet de gestion des employés, vétérinaires, animaux, habitats, services et rapports vétérinaires. Ce projet est une reprise d'un ancien contrôle (ECF) restructuré avec une architecture MVC. Il comprend des fonctionnalités pour l'admin, les vétérinaires, les employés et les visiteurs, permettant de gérer efficacement toutes les opérations liées au zoo.

---

## Fonctionnalités

### Côté **Admin** :
- Créer un compte vétérinaire ou employé
- Créer, modifier et supprimer des animaux
- Modifier les horaires du zoo
- Modifier, ajouter et supprimer des habitats
- Créer et supprimer des services
- Voir les rapports vétérinaires et les consultations par animal

### Côté **Vétérinaire** :
- Créer un rapport par animal
- Créer un rapport par habitat
- Consulter la consommation par animal, saisi par l'employé

### Côté **Employé** :
- Créer une consommation par animal
- Modifier les services disponibles
- Traiter les avis clients et répondre aux mails

### Côté **Visiteurs** :
- Voir tous les habitats, services et animaux du zoo
- Contacter les services par mail
- Laisser un avis

---

## Prérequis

Avant de pouvoir installer et exécuter ce projet, vous devez avoir les outils suivants installés sur votre machine :

- **PHP**
- **MySQL** (ou une autre base de données compatible pour la gestion des données)
- **MongoDB** (pour les rapports et les consultations vétérinaires)
- **Composer** (pour la gestion des dépendances PHP, y compris MongoDB et PHPMailer)

---

## Installation

### Étapes pour installer et démarrer le projet localement

1. Clonez ce dépôt sur votre machine locale :

    ```bash
    git clone https://github.com/EKreir/dossierProjet.git
    ```

2. Entrez dans le répertoire du projet :

    ```bash
    cd dossierProjet
    ```

3. Installez les dépendances PHP via Composer : (si besoin reagrder la documentation Compser)

    ```bash
    composer install
    ```

4. Assurez-vous que votre serveur web local (comme **XAMPP** ou **WAMP**) est configuré pour exécuter PHP et que la base de données MySQL/MongoDB est en place.

5. Créez et configurez la base de données dans **MySQL** et **MongoDB**. Les informations nécessaires sont disponibles dans les fichiers de configuration (`config/`).

6. Importez les fichiers de structure de la base de données (si nécessaire) pour initialiser les tables et collections.

7. Démarrez et testez votre serveur web local dans votre navigateur.

---

## Technologies utilisées

Ce projet utilise les technologies suivantes :

- **Frontend** : HTML, CSS, JavaScript, Bootstrap
- **Backend** : PHP
- **Base de données** : MySQL (pour les animaux, services, employés, vétérinaires et admin) et MongoDB (pour les consultations)
- **Librairies PHP** :
  - **MongoDB** (pour interagir avec MongoDB)
  - **PHPMailer** (pour l'envoi d'emails via le système de contact)
- **Architecture** : MVC (Model-View-Controller)

---

## Description du projet

Ce projet a été développé dans le cadre d'un contrôle (ECF) et restructuré avec l'architecture **MVC** pour garantir une organisation claire et efficace du code. Il permet de gérer l'ensemble des fonctionnalités d'un zoo, allant de la gestion des employés et vétérinaires à la gestion des animaux, habitats et services. Le côté visiteur offre une interface simple et intuitive pour explorer le zoo et interagir avec les services, tandis que le côté administrateur et employé permet une gestion approfondie des opérations.

---

## Licence

Ce projet est sous la licence MIT - voir le fichier [LICENSE](LICENSE) pour plus de détails.
