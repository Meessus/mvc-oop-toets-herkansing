<?php
class Richestpeoples extends Controller
{

  public function __construct()
  {
    $this->countryModel = $this->model('Richestpeople');
  }

  public function index()
  {
    $richests = $this->countryModel->getRichestpeoples();

    $rows = '';
    foreach ($richests as $value) {
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

  public function delete($Id)
  {
    $this->countryModel->deleteRichest($Id);

    $data = [
      'deleteStatus' => "<h1>(Record is succesvol verwijderd)</h1>"
    ];
    $this->view("richestpeoples/delete", $data);
    header("Refresh:2; url=" . URLROOT . "/richestpeoples/index");
  }
}
