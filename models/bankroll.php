<?php

// classe utilisant la table des utilisateurs, permettant création, lecture , modification
// et suppression des utilisateurs


class Bankroll extends Database{
  public $bankroll;


  public function __construct() {
    parent::__construct();
  }

  /**
   *
   * @return boolean
   */
    public function addBankroll(){
      $query = 'INSERT INTO `PORTEFEUILLE`(`bankroll`, `pseudo`, `id`) VALUES (:bankroll, :pseudo, :id)';
      $addBankroll = $this->db->prepare($query);
      $addBankroll->bindValue(':bankroll', $this->bankroll, PDO::PARAM_STR);
      $addBankroll->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
      $addBankroll->bindValue(':id', $this->id, PDO::PARAM_STR);
       return $addBankroll->execute();
    }
    }

    public function userBankroll()
      {
          $query = 'SELECT `PORTEFEUILLE`.`idportefeuille`, `PORTEFEUILLE`.`pseudo`, `PORTEFEUILLE`.`bankroll`,
                   `pseudo` FROM `UTILISATEURS` INNER JOIN `PORTEFEUILLE` ON `UTILISATEURS` . `id` = `PORTEFEUILLE`
                    .`id` WHERE `UTILISATEURS` . `id` = :id';
          $userBankroll = $this->pdo->prepare($query);
          $userBankroll->bindValue(':pseudo', $this->pseudo, PDO::PARAM_INT);
          $userBankroll->bindValue(':bankroll', $this->bankroll, PDO::PARAM_INT);
          $userBankroll->bindValue(':id', $this->id, PDO::PARAM_INT);
          $userBankroll->execute();
          if (is_object($userBankroll))
          {
              $isObjectResult = $userBankroll->fetchAll(PDO::FETCH_OBJ);
          }
          return $isObjectResult;
      }
