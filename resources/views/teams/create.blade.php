@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method='post' action='/employees/create'>
{{csrf_field()}}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="name" class="form-control" id="name" name="name" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="p_email">Personal Email</label>
    <input type="text" class="form-control" id="p_email"  name="p_email"placeholder="Enter Personal Email">
  </div>
  <div class="form-group">
    <label for="b_email">Business Email</label>
    <input type="text" class="form-control" id="b_email"  name="b_email" placeholder="Enter Business Email">
  </div>
  <div class="form-group">
    <label for="pass">Password</label>
    <input type="password" class="form-control" name="pass"  id="pass"placeholder="Password">
  </div>
  <div class="form-group">
    <label for="p_skype">Personal Skype</label>
    <input type="text" class="form-control" id="p_skype" name="p_skype" placeholder="Enter Personal Skype">
  </div>
  <div class="form-group">
    <label for="b_skype">Business Skype</label>
    <input type="text" class="form-control" id="b_skype" name="b_skype" placeholder="Enter Business Skype">
  </div>
  <div class="form-group">
    <label for="ph_no">Phone NO</label>
    <input type="text" class="form-control" id="ph_no"  name="ph_no" placeholder="Enter Phone no">
  </div>
  <div class="form-group">
    <label for="bday">Bday</label>
    <input type="text" class="form-control" id="Bday" name="Bday" placeholder="Enter Bday">
  </div>
  <div class="form-group">
    <label for="doj">doj</label>
    <input type="text" class="form-control" id="doj" name="doj" placeholder="Enter doj">
  </div>
  <div class="form-group">
    <label for="padd">padd</label>
    <input type="text" class="form-control" name="padd"  id="padd"placeholder="Enter padd">
  </div>
  <div class="form-group">
    <label for="cadd">cadd</label>
    <input type="text" class="form-control" id="cadd" name="cadd" placeholder="Enter cadd">
  </div>
  <div class="form-group">
    <label for="role">role</label>
    <input type="text" class="form-control" id="role"  name="role" placeholder="Enter role">
  </div>

  <button type="submit" class="btn btn-primary">CREATE</button>
</form>