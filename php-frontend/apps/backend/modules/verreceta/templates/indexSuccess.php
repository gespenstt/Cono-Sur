<h1>Recetas List</h1>

<table>
  <thead>
    <tr>
      <th>Rec</th>
      <th>Rec nombre receta</th>
      <th>Rec ingredientes</th>
      <th>Rec instrucciones</th>
      <th>Rec vino</th>
      <th>Rec nombre blogger</th>
      <th>Rec email blogger</th>
      <th>Rec url blogger</th>
      <th>Rec estado</th>
      <th>Rec eliminado</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($recetas as $receta): ?>
    <tr>
      <td><a href="<?php echo url_for('verreceta/show?rec_id='.$receta->getRecId()) ?>"><?php echo $receta->getRecId() ?></a></td>
      <td><?php echo $receta->getRecNombreReceta() ?></td>
      <td><?php echo $receta->getRecIngredientes() ?></td>
      <td><?php echo $receta->getRecInstrucciones() ?></td>
      <td><?php echo $receta->getRecVino() ?></td>
      <td><?php echo $receta->getRecNombreBlogger() ?></td>
      <td><?php echo $receta->getRecEmailBlogger() ?></td>
      <td><?php echo $receta->getRecUrlBlogger() ?></td>
      <td><?php echo $receta->getRecEstado() ?></td>
      <td><?php echo $receta->getRecEliminado() ?></td>
      <td><?php echo $receta->getCreatedAt() ?></td>
      <td><?php echo $receta->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('verreceta/new') ?>">New</a>
