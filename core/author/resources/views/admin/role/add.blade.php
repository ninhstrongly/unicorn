@extends('author::admin.master.master')
@section('content')
  <section id="main-content">
      <section class="wrapper">
          <!-- /row -->
          <div class="row mt">
          <div class="col-lg-12">
              <h4><i class="fa fa-angle-right"></i>Thêm tài khoản</h4>
              <div class="form-panel">
              <div class="form">
                  <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="{{ route('role.add') }}">
                  @csrf
                  <div class="form-group ">
                      <label for="firstname" class="control-label col-lg-2">Name</label>
                      <div class="col-lg-10">
                      <input class=" form-control" id="firstname" name="name" type="text" />
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="lastname" class="control-label col-lg-2">Display Name</label>
                      <div class="col-lg-10">
                      <input class=" form-control" id="lastname" name="display_name" type="text" />
                      </div>
                  </div>
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Danh sách quyền</th>
                          <th scope="col">List</th>
                          <th scope="col">Add</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Del</th>
                          <th scope="col">Import</th>
                          <th scope="col">Export</th>
                          <th scope="col">Order Product</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Product</td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="prd-list"></td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="prd-add"></td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="prd-edit"></td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="prd-del"></td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="prd-import"></td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="prd-export"></td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="prd-order"></td>
                        </tr>
                        <tr>
                          <td>User</td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="user-list"></td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="user-add"></td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="user-edit"></td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="user-del"></td>
                        </tr>
                        <tr>
                          <td>Category</td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="ctg-list"></td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="ctg-add"></td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="ctg-edit"></td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="ctg-del"></td>
                          </tr>
                          <tr>
                          <td>Role</td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="role-list"></td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="role-add"></td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="role-edit"></td>
                          <td><input type="checkbox" class="form-check-input" name="permission[]" value="role-del"></td>
                          </tr>
                      </tbody>
                    </table>
                  <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit">Thêm</button>
                      <button class="btn btn-theme04" type="button">Hủy</button>
                      </div>
                  </div>
                  </form>
              </div>
              </div>
              <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
          </div>
          <!-- /row -->
      </section>
      <!-- /wrapper -->
      </section>
@stop
