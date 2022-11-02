<?php
class Richestpeople
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getCountries()
  {
    $this->db->query("SELECT * FROM `richestpeople`;");

    $result = $this->db->resultSet();

    return $result;
  }
  public function getSingleCountry($Id)
  {
    $this->db->query("SELECT * FROM richestpeople WHERE Id = :Id");
    $this->db->bind(':Id', $Id, PDO::PARAM_INT);
    return $this->db->single();
  }
  // Delete
  public function deleteCountry($Id)
  {
    $this->db->query("DELETE FROM richestpeople WHERE Id = :Id");
    $this->db->bind(":Id", $Id, PDO::PARAM_INT);
    return $this->db->execute();
  }
}
