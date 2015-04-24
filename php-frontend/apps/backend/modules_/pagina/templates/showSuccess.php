<table>
  <tbody>
    <tr>
      <th>Pag:</th>
      <td><?php echo $pagina->getPagId() ?></td>
    </tr>
    <tr>
      <th>Pag nombre:</th>
      <td><?php echo $pagina->getPagNombre() ?></td>
    </tr>
    <tr>
      <th>Pag identificador:</th>
      <td><?php echo $pagina->getPagIdentificador() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $pagina->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $pagina->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('pagina/edit?pag_id='.$pagina->getPagId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('pagina/index') ?>">List</a>
