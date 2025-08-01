@extends('layouts.backend')

@section('content')
   <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title text-primary" style="font-weight:bold;">{{ $total_users ?? 0}} : Administrators</h3>
              <button class="btn btn-primary btn-sm" style="float: right;" data-toggle="modal" data-target="#uploadFileModal">
                <i class="fa fa-upload"></i> Upload
              </button>
              <button class="btn btn-success btn-sm" style="float: right;" data-toggle="modal" data-target="#addUserModal">
                <i class="fa fa-user-plus"></i> Add New User
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Fullname</th>
                  <th>Phonenumber</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                </thead>
              <tbody>
                @foreach($users as $key=>$user)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                  <td>{{ $user->phonenumber }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->address }}</td>
                  <td>{{ $user->role }}</td>
                  <td>
                      <div class="btn-group">
                      <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">
                        More Action <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <center><li><b>More Action</b></li></center>
                        <li class="divider"></li>
                        <li><a href="#" class="text-green" data-toggle="modal" data-target="#UpdateUserModal{{ $user->id }}">
                            <i class="fa fa-edit"></i> Update</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="text-red" data-toggle="modal" data-target="#deleteUserModal{{ $user->id }}">
                        <i class="fa fa-trash"></i> Delete</a></li>
                      </ul>
                  </div>
                </td>
              </tr>

            <!-- Update User Modal -->
            <div class="modal fade" id="UpdateUserModal{{ $user->id }}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title text-primary" style="font-weight:bold;"><i class="fa fa-user-edit"></i> Updating User: {{ $user->firstname ?? 'NA' }} {{ $user->lastname ?? 'NA' }}</h5>
                  </div>
                  <form method="POST" action="{{ route('adminUpdateUser') }}">
                    @csrf
                  <div class="modal-body">
                    <input type="text" name="id" value="{{ $user->id }}" hidden="true">
                    <div class="form-group">
                        <label>Firstname</label>
                        <input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}" required>
                    </div>
                    <div class="form-group">
                        <label>Lastname</label>
                        <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="form-group">
                        <label>Phonenumber</label>
                        <input type="text" class="form-control" name="phonenumber" value="{{ $user->phonenumber }}" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="{{ $user->address }}" required>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role" required>
                            <option value="{{$user->role}}">{{$user->role}}</option>
                            <option value="Admin">Admin</option>
                            <option value="Customer">Customer</option>
                            <option value="Data_clerk">Data Clerk</option>
                        </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- End Update User Modal -->

            <!-- Delete User Modal -->
            <div class="modal fade" id="deleteUserModal{{ $user->id }}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5>Are you sure you want to delete this record?</h5>
                  </div>
                  <form method="POST" action="{{ route('adminDeleteUser') }}">
                    @csrf
                  <div class="modal-body">
                    <input type="text" name="id" value="{{ $user->id }}" hidden="true">
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Delete</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- End Delete User Modal -->
                @endforeach
              </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

      <!-- Upload File Modal -->
      <div class="modal fade" id="uploadFileModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" action="{{ route('uploadFile') }}" enctype="multipart/form-data">
              @csrf
              <div class="modal-header">
                <h5 class="modal-title text-primary" style="font-weight:bold;"><i class="fa fa-upload"></i> Upload Users</h5>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Upload CSV File</label>
                  <input type="file" class="form-control" name="file" accept=".csv" required>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <p>Download File</p>
                  </div>
                  <div class="col-md-6">
                    <a href="{{ route('downloadFile', ['filename' => 'users.csv']) }}" class="btn btn-primary btn-xs">click here to download the file</a>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- End Upload File Modal -->

      <!-- Add User Modal -->
      <div class="modal fade" id="addUserModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" action="{{ route('adminAddUser') }}">
              @csrf
              <div class="modal-header">
                <h5 class="modal-title text-primary" style="font-weight:bold;">
                  <i class="fa fa-user-plus"></i> Add New User
                </h5>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Firstname</label>
                  <input type="text" class="form-control" name="firstname" required autofocus>
                </div>
                <div class="form-group">
                  <label>Lastname</label>
                  <input type="text" class="form-control" name="lastname" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                  <label>Phonenumber</label>
                  <input type="text" class="form-control" name="phonenumber" required>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" name="address" required>
                </div>
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="role" required>
                    <option value="">Select ...</option>
                    <option value="Admin">Admin</option>
                    <option value="Customer">Customer</option>
                    <option value="Data_clerk">Data Clerk</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- End Add User Modal -->
    </section>
    <!-- /.content -->
@endsection