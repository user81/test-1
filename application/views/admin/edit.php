<div class="add-from">
  <form action="/admin/edit/<?= $data['id']; ?>" method="post">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" id="login" name="name" value="<?= htmlspecialchars($data['name'], ENT_QUOTES);?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Surname</label>
          <input type="text" class="form-control" id="login" name="surname" value="<?= htmlspecialchars($data['surname'], ENT_QUOTES);?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Gender</label>
          <input readonly type="text" class="form-control" id="login" name="gender" value="<?= htmlspecialchars($data['gender'], ENT_QUOTES);?>">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="mb-3">
          <label class="form-label">Age</label>
          <input type="number" class="form-control" id="login" name="age" value="<?= $data['age'];?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Faculty</label>
          <select id="faculty" class="form-select" aria-label="Default select example" name="faculty">
            <option value="Faculty of Law">Faculty of Law</option>
            <option value="Faculty of Medicine">Faculty of Medicine</option>
            <option value="Faculty of Dentistry">Faculty of Dentistry</option>
            <option value="Faculty of Music">Faculty of Music</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Group</label>
          <select id="group" class="form-select" aria-label="Default select example" name="group">
            <option value="First group">First group</option>
            <option value="Second group">Second group</option>
            <option value="Third group">Third group</option>
          </select>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-success btn-authorize">Save change</button>
  </form>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $(document).ready(function() {
            $('#faculty option:contains("<?php echo $data['faculty']; ?>")').prop('selected', true);
        });
    });
    $(document).ready(function(){
        $(document).ready(function() {
            $('#group option:contains("<?php echo $data['learning_group']; ?>")').prop('selected', true);
        });
    });
</script>