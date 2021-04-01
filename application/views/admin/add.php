<div class="add-from">
  <form action="/admin/add" method="post">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" id="login" name="name">
        </div>
        <div class="mb-3">
          <label class="form-label">Surname</label>
          <input type="text" class="form-control" id="login" name="surname">
        </div>
        <div class="mb-3">
          <label class="form-label">Gender</label>
          <select class="form-select" aria-label="Default select example" name="gender">
            <option disabled selected>Choose</option>
            <option value="Man">Man</option>
            <option value="Woman">Woman</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="mb-3">
          <label class="form-label">Age</label>
          <input type="number" class="form-control" id="login" name="age">
        </div>
        <div class="mb-3">
          <label class="form-label">Faculty</label>
          <select class="form-select" aria-label="Default select example" name="faculty">
            <option disabled selected>Choose Faculty</option>
            <option value="Faculty of Law">Faculty of Law</option>
            <option value="Faculty of Medicine">Faculty of Medicine</option>
            <option value="Faculty of Dentistry">Faculty of Dentistry</option>
            <option value="Faculty of Music">Faculty of Music</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Group</label>
          <select class="form-select" aria-label="Default select example" name="group">
            <option disabled selected>Choose Group</option>
            <option value="First group">First group</option>
            <option value="Second group">Second group</option>
            <option value="Third group">Third group</option>
          </select>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-success btn-authorize">Adding Student</button>
  </form>
</div>