<h1>Paginas List</h1>

<table>
  <thead>
    <tr>
      <th>Pag</th>
      <th>Pag nombre</th>
      <th>Pag identificador</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($paginas as $pagina): ?>
    <tr>
      <td><a href="<?php echo url_for('pagina/show?pag_id='.$pagina->getPagId()) ?>"><?php echo $pagina->getPagId() ?></a></td>
      <td><?php echo $pagina->getPagNombre() ?></td>
      <td><?php echo $pagina->getPagIdentificador() ?></td>
      <td><?php echo $pagina->getCreatedAt() ?></td>
      <td><?php echo $pagina->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('pagina/new') ?>">New</a>
