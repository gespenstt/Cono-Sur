<table>
  <tbody>
    <tr>
      <th>Sec:</th>
      <td><?php echo $seccion->getSecId() ?></td>
    </tr>
    <tr>
      <th>Pag:</th>
      <td><?php echo $seccion->getPagId() ?></td>
    </tr>
    <tr>
      <th>Sec identificador:</th>
      <td><?php echo $seccion->getSecIdentificador() ?></td>
    </tr>
    <tr>
      <th>Sec nombre:</th>
      <td><?php echo $seccion->getSecNombre() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $seccion->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $seccion->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('seccion/edit?sec_id='.$seccion->getSecId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('seccion/index') ?>">List</a>
