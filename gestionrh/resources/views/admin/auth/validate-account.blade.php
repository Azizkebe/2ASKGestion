<link rel="stylesheet" href="{{asset('admin/css/validate.min.css')}}">
<div class="container mt-3">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
      <div class="card border border-light-subtle rounded-3 shadow-sm">
        <div class="card-body p-3 p-md-4 p-xl-5">
          <div class="text-center mb-3">
            <div>
              @if (session('success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert"
                      aria-hidden="true">x</button>
                      {{session('success')}}
                  </div>
              @endif
          </div>
          </div>
          <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Validation du Compte</h2>
          <form action="{{route('submitaccessdefine', $email)}}" method="POST">
            @csrf
            @method('POST')

            <div class="row gy-2 overflow-hidden">
              <div class="col-12">
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" name="email" id="email" value="{{$email}}" readonly>
                  <label for="email" class="form-label">Email</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                  <label for="password" class="form-label">Mot de Passe</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="" placeholder="confirm_password" required>
                  <label for="password" class="form-label">Confirmation du Mot de Passe</label>
                </div>
              </div>
              <div class="col-12">
                <div class="d-grid my-3">
                  <button class="btn btn-primary btn-lg" type="submit">Validation du Compte</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
