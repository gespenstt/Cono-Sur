<table>
  <tbody>
    <tr>
      <th>Par:</th>
      <td><?php echo $parametro->getParId() ?></td>
    </tr>
    <tr>
      <th>Sec:</th>
      <td><?php echo $parametro->getSecId() ?></td>
    </tr>
    <tr>
      <th>Par identificador:</th>
      <td><?php echo $parametro->getParIdentificador() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $parametro->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $parametro->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('parametro/edit?par_id='.$parametro->getParId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('parametro/index') ?>">List</a>
