<?php
class Richestpeoples extends Controller
{

  public function __construct()
  {
    $this->countryModel = $this->model('Richestpeople');
  }

  public function index()
  {
    $countries = $this->countryModel->getCountries();

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
      'richestpeoples' => $rows
    ];
    $this->view('richestpeoples/index', $data);
  }
  // Delete
  public function delete($Id)
  {
    $this->countryModel->deleteCountry($Id);

    $data = [
      'deleteStatus' => "<h1>Het record met Id = $Id is verwijderd</h1>"
    ];
    $this->view("richestpeoples/delete", $data);
    header("Refresh:2; url=" . URLROOT . "/richestpeoples/index");
  }
}
