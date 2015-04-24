<h1>Parametros List</h1>

<table>
  <thead>
    <tr>
      <th>Par</th>
      <th>Sec</th>
      <th>Par identificador</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($parametros as $parametro): ?>
    <tr>
      <td><a href="<?php echo url_for('parametro/show?par_id='.$parametro->getParId()) ?>"><?php echo $parametro->getParId() ?></a></td>
      <td><?php echo $parametro->getSecId() ?></td>
      <td><?php echo $parametro->getParIdentificador() ?></td>
      <td><?php echo $parametro->getCreatedAt() ?></td>
      <td><?php echo $parametro->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('parametro/new') ?>">New</a>
