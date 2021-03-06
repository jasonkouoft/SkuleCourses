<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('admindepartment/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<fieldset><legend>Edit Department</legend>
<?php else: ?>
<fieldset><legend>New Department</legend>
<?php endif; ?>

  <table> 
     <tfoot>
     <tr><td colspan="2"><?php echo $form->renderHiddenFields() ?></td></tr>
     <tr class="t_foot">
        <td> 
          <?php if (!$form->getObject()->isNew()): ?>
          &nbsp;<a href="<?php echo url_for('admindepartment/index') ?>">Cancel</a>
          <?php endif; ?>
        </td>
        <td>  
          <input type="submit" value="Save" />
          
        </td>
      </tr>
     
     </tfoot>
     <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <?php if ($form->getObject()->isNew()): ?>
      <tr>
        <th>Abbreviations</th>
        <td><?php echo $form['id'] ?></td>
         <td><?php echo $form['id']->renderError() ?></td>
      </tr>
      <?php else: ?>
      <tr>
        <th>Abbreviations</th>
        <td><?php echo $form->getObject()->getId() ?></td>
         <td></td>
      </tr>
      <?php endif; ?>
      <tr>
        <th>Title</th>
        <td>
          <?php echo $form['descr']->renderError() ?>
          <?php echo $form['descr'] ?>
        </td>
      </tr>
      </tbody>
      
  </table>
</fieldset>
</form>
