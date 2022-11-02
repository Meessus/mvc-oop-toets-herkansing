<?php
class Richestpeoples extends Controller
{

  public function __construct()
  {
    $this->countryModel = $this->model('Richestpeople');
  }

  public function index()
  {
    /*
     * Haal via de method getFruits() uit de model Fruit de records op
     * uit de database
     */
    $countries = $this->countryModel->getCountries();

    /*
     * Maak de inhoud voor de tbody in de view
     */
    $rows = '';
    foreach ($countries as $value) {
      $rows .= "<tr>
                  <td>$value->Id</td>
                  <td>" . htmlentities($value->Name, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . number_format($value->Nettoworth, 0, ',', '.') . "</td>
                  <td>" . htmlentities($value->Age, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->Company, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td><a href='" . URLROOT . "/richestpeoples/delete/$value->Id'>delete</a><td
                </tr>";
    }


    $data = [
      'title' => '<h1>De vijf rijkste mensen ter wereld</h1>',
      'countries' => $rows
    ];
    $this->view('richestpeoples/index', $data);
  }
}
