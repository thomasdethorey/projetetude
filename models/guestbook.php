<?php

// classe utilisant la table des utilisateurs, permettant création, lecture , modification
// et suppression des utilisateurs


class User extends Database{
  public $id;
  public $pseudo;
  public $lastname;
  public $firstname;
  public $birthdate;
  public $mail;
  public $phone;
  public $password;


  public function __construct() {
    parent::__construct();
  }
