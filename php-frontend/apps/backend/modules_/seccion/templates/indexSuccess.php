<h1>Seccions List</h1>

<table>
  <thead>
    <tr>
      <th>Sec</th>
      <th>Pag</th>
      <th>Sec identificador</th>
      <th>Sec nombre</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($seccions as $seccion): ?>
    <tr>
      <td><a href="<?php echo url_for('seccion/show?sec_id='.$seccion->getSecId()) ?>"><?php echo $seccion->getSecId() ?></a></td>
      <td><?php echo $seccion->getPagId() ?></td>
      <td><?php echo $seccion->getSecIdentificador() ?></td>
      <td><?php echo $seccion->getSecNombre() ?></td>
      <td><?php echo $seccion->getCreatedAt() ?></td>
      <td><?php echo $seccion->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('seccion/new') ?>">New</a>
