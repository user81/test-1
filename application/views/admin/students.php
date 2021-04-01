<div class="text-center list">
<?php if (isset($students) && !empty($students)):?>
  <div class="table-responsive">
    <table class="table table-dark table-striped">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Group</th>
        <th>Faculty</th>
        <th colspan="2" style="text-align: center;">Action</th>
      </tr>
      <?foreach ($students as $value): ?>
        <tr>
          <td><?= $value['id']; ?></td>
          <td nowrap><?= htmlspecialchars($value['name'], ENT_QUOTES); ?></td>
          <td nowrap><?= htmlspecialchars($value['surname'], ENT_QUOTES); ?></td>
          <td nowrap><?= htmlspecialchars($value['gender'], ENT_QUOTES); ?></td>
          <td nowrap><?= htmlspecialchars($value['age'], ENT_QUOTES); ?></td>
          <td nowrap><?= htmlspecialchars($value['learning_group'], ENT_QUOTES); ?></td>
          <td nowrap><?= htmlspecialchars($value['faculty'], ENT_QUOTES); ?></td>
          <td><button type="button" class="btn btn-outline-primary" onclick='location.href="/admin/edit/<?= $value['id']; ?>"'>EDIT</button></td>
          <td><button type="button" class="btn btn-outline-danger" onclick='location.href="/admin/delete/<?= $value['id']; ?>"'>DELETE</button></td>
        </tr>
      <?php endforeach;?>
    </table>
  </div>
<?php else:?>
    <h3>List empty</h3>
<?php endif;?>
  <button type="button" class="btn btn-outline-info" onclick='location.href="/admin/add"'>Add student</button>
</div>
