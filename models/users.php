<?php

// classe utilisant la table des utilisateurs, permettant la création, lecture , modification
// et suppression des utilisateurs


class User extends Database{
  public $id;
  public $pseudo;
  public $lastname;
  public $firstname;
  public $birthdate;
  public $mail;
  public $phone;
  

  public function __construct() {
    parent::__construct();
  }


  // méthode permettant d'ajouter un nouvel utilisateur
  /**
  *
  * @return boolean
  */
  public function addUser(){
    $query = 'INSERT INTO `UTILISATEURS`(`pseudo`, `lastname`, `firstname`, `birthdate`, `mail`, `phone`, `password`) VALUES (:pseudo, :lastname, :firstname, :birthdate, :mail, :phone, :password)';
    $addUser = $this->db->prepare($query);
    $addUser->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
    $addUser->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
    $addUser->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
    $addUser->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
    $addUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
    $addUser->bindValue(':phone', $this->phone, PDO::PARAM_STR);
    $addUser->bindValue(':password', $this->password, PDO::PARAM_STR);
    return $addUser->execute();

  }

  // Méthode permettant de faire la connexion de l'utilisateur
  /**
  *
  * @return boolean
  */
  public function connection() {
    $state = false;
    $query = 'SELECT * FROM `UTILISATEURS` '
    . 'WHERE `mail` = :mail';
    $result = $this->db->prepare($query);
    $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
    // On vérifie que la requête s'est bien exécutée
    if ($result->execute()) {
      $selectResult = $result->fetch(PDO::FETCH_OBJ);
      // On vérifie que l'on a bien trouvé un utilisateur
      if (is_object($selectResult)) {
        // On hydrate
        $this->id = $selectResult->id;
        $this->pseudo = $selectResult->pseudo;
        $this->firstname = $selectResult->firstname;
        $this->lastname = $selectResult->lastname;
        $this->birthdate = $selectResult->birthdate;
        $this->mail = $selectResult->mail;
        $this->phone = $selectResult->phone;
        $this->password = $selectResult->password;

        $state = true;
      }
    }
    return $state;
  }

  //méthode permettant à d'afficher les informations de l'utilisateur
  /**
  *
  * @return type
  */
  public function displayProfil(){
    $query = 'SELECT * FROM `UTILISATEURS`';
    $display = $this->db->query($query);
    $displayTable = $display->fetchAll(PDO::FETCH_OBJ);
    return $displayTable;
  }

  // Méthode permettant de mettre à jour les infos utilisateurs
  /**
  *
  * @return type
  */
  public function updateUser()
  {
    $query = 'UPDATE `UTILISATEURS` '
    . 'SET `pseudo` = :pseudo, `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `mail` = :mail, `phone` = :phone '
    . 'WHERE `id` = :id';
    $updateUser = $this->db->prepare($query);
    $updateUser->bindValue(':id', $this->id, PDO::PARAM_INT);
    $updateUser->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
    $updateUser->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
    $updateUser->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
    $updateUser->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
    $updateUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
    $updateUser->bindValue(':phone', $this->phone, PDO::PARAM_STR);
    return $updateUser->execute();
  }

  // Méthode permettant de vérifier si l'email existe déjà
  /**
  *
  * @return type
  */
  public function checkIfEmailExist() {
    $state = false;
    $query = 'SELECT COUNT(`id`) AS `count` FROM `UTILISATEURS` WHERE `mail` = :mail';
    $result = $this->db->prepare($query);
    $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
    if ($result->execute()) {
      $selectResult = $result->fetch(PDO::FETCH_OBJ);
      $state = $selectResult->count;
    }
    return $state;
  }


  //  // Méthode permettant de vérifier si le pseudo existe déjà

  /**
  *
  * @return type
  */
  public function checkIfPseudoExist() {
    $state = false;
    $query = 'SELECT COUNT(`id`) AS `count` FROM `UTILISATEURS` WHERE `pseudo` = :pseudo';
    $result = $this->db->prepare($query);
    $result->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
    if ($result->execute()) {
      $selectResult = $result->fetch(PDO::FETCH_OBJ);
      $state = $selectResult->count;
    }
    return $state;
  }

  //Méthode permettant de supprimer un utilisateur
  /**
  *
  * @return type
  */
  public function deleteUser() {
    $query = 'DELETE FROM `UTILISATEURS` '
    . 'WHERE `id` = :id';
    $deleteUser = $this->db->prepare($query);
    $deleteUser->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $deleteUser->execute();
  }

}
