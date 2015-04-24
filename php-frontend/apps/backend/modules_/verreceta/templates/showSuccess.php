<table>
  <tbody>
    <tr>
      <th>Rec:</th>
      <td><?php echo $receta->getRecId() ?></td>
    </tr>
    <tr>
      <th>Rec nombre receta:</th>
      <td><?php echo $receta->getRecNombreReceta() ?></td>
    </tr>
    <tr>
      <th>Rec ingredientes:</th>
      <td><?php echo $receta->getRecIngredientes() ?></td>
    </tr>
    <tr>
      <th>Rec instrucciones:</th>
      <td><?php echo $receta->getRecInstrucciones() ?></td>
    </tr>
    <tr>
      <th>Rec vino:</th>
      <td><?php echo $receta->getRecVino() ?></td>
    </tr>
    <tr>
      <th>Rec nombre blogger:</th>
      <td><?php echo $receta->getRecNombreBlogger() ?></td>
    </tr>
    <tr>
      <th>Rec email blogger:</th>
      <td><?php echo $receta->getRecEmailBlogger() ?></td>
    </tr>
    <tr>
      <th>Rec url blogger:</th>
      <td><?php echo $receta->getRecUrlBlogger() ?></td>
    </tr>
    <tr>
      <th>Rec estado:</th>
      <td><?php echo $receta->getRecEstado() ?></td>
    </tr>
    <tr>
      <th>Rec eliminado:</th>
      <td><?php echo $receta->getRecEliminado() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $receta->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $receta->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('verreceta/edit?rec_id='.$receta->getRecId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('verreceta/index') ?>">List</a>
