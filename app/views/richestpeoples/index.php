<?php echo $data["title"]; ?>
<table>
  <thead>
    <th>Id</th>
    <th>Name</th>
    <th>Nettoworth</th>
    <th>Age</th>
    <th>Company</th>
    <th>Delete</th>
  </thead>
  <tbody>
    <?= $data['richestpeoples'] ?>
  </tbody>
</table>
<a href="<?= URLROOT; ?>/homepages/index">terug</a>