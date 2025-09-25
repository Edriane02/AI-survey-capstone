@extends('layouts.app-sidebar')
@section('title', 'User Management')


@section('contents')

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <!-- Tabs -->
                                <div class="d-flex m-3 border-bottom">  
                                    <ul class="nav nav-tabs rounded card-header-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#studentTab" role="tab">
                                                <span class="d-none d-sm-block">Student</span> 
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#facultyTab" role="tab">
                                                <span class="d-none d-sm-block">Faculty</span> 
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#adminTab" role="tab">
                                                <span class="d-none d-sm-block">Admin</span>   
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Tab Content -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-shadow m-3">
                                    <div class="card-body">
                                        <!-- Controls -->
                                        <div class="d-flex m-2">
                                            <div class="p-2">
                                                <button type="button" class="btn btn-light">
                                                    <span class="mdi mdi-filter-outline"></span>&nbsp;Filter
                                                </button>
                                            </div>
                                            <div class="input-group p-2 w-50">
                                                <button class="btn btn-light" type="button"><i class="bx bx-search-alt align-middle"></i></button>
                                                <input type="text" class="form-control" placeholder="Search...">
                                            </div>
                                            <div class="p-2 justify-content-right ms-auto">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUser">
                                                    <span class="mdi mdi-account-plus-outline"></span>&nbsp;Add User
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Tabs content -->
                                        <div class="tab-content">
                                            <!-- Student Tab -->
                                            <div class="tab-pane fade show active" id="studentTab" role="tabpanel">
                                                <div class="table-responsive">
                                                    <table class="table table-editable table-nowrap align-middle">
                                                        <thead class="table-primary">
                                                            <tr>
                                                                <th style="width: 50px;">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="checkAllStudent">
                                                                    </div>
                                                                </th>
                                                                <th>Student ID</th>
                                                                <th>Name</th>
                                                                <th>User Status</th>
                                                                <th>Survey Taken</th>
                                                                <th>Program</th>
                                                                <th>Year Level</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if($studentUser->count() > 0)
                                                        @foreach($studentUser as $user)
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox">
                                                                    </div>
                                                                </td>
                                                                <td>{{ $user->studentProfile->student_id ?? 'Null' }}</td>
                                                                <td>
                                                                    <strong>{{ $user->studentProfile->fullName ?? 'Null' }}</strong><br />
                                                                    <span class="text-muted">{{ $user->email }}</span>
                                                                </td>
                                                                <td>{{ $user->user_status}}</td>
                                                                <td></td>
                                                                <td>{{ $user->studentProfile->program->program_name ?? 'Null' }}</td>
                                                                <td>{{ $user->studentProfile->year_level ?? 'Null' }}</td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-outline-primary" href="#" data-bs-toggle="modal" data-bs-target="#editUser"><span class="mdi mdi-pencil-outline"
                                                                    data-id="{{ $user->studentProfile->student_id }}" data-email="{{ $user->email }}" data-user-type="{{ $user->user_type }}"
                                                                    ></span></a>
                                                                    <a class="btn btn-sm btn-outline-danger" href="#" data-bs-toggle="modal" 
                                                                       data-bs-target="#deleteUser" data-id="{{ $user->id }}" data-name="{{ $user->studentProfile->fullName ?? 'Null' }}" 
                                                                       data-email="{{ $user->email }}">
                                                                    <span class="mdi mdi-trash-can-outline"></span></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        @else
                                                                <tr>
                                                                    <td colspan="7" class="text-center">No student users found.</td>
                                                                </tr>
                                                        @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- Faculty Tab -->
                                            <div class="tab-pane fade" id="facultyTab" role="tabpanel">
                                                <div class="table-responsive">
                                                    <table class="table table-editable table-nowrap align-middle">
                                                        <thead class="table-primary">
                                                            <tr>
                                                                <th style="width: 50px;">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="checkAllFaculty">
                                                                    </div>
                                                                </th>
                                                                <th>Faculty ID</th>
                                                                <th>Name</th>
                                                                <th>User Status</th>
                                                                <th>Survey Taken</th>
                                                                <th>Survey Recieved</th>
                                                                <th>Department</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if($facultyUser->count() > 0)
                                                        @foreach($facultyUser as $user)
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox">
                                                                    </div>
                                                                </td>
                                                                <td>{{ $user->facultyProfile->faculty_id ?? 'Null' }}</td>
                                                                <td>
                                                                    <strong>{{ $user->facultyProfile->fullName() ?? 'Null' }}</strong><br />
                                                                    <span class="text-muted">{{ $user->email }}</span>
                                                                </td>
                                                                <td>{{ $user->user_status }}</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>{{ $user->facultyProfile->department ?? 'Null' }}</td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-outline-primary" href="#" data-bs-toggle="modal" data-bs-target="#editUser"><span class="mdi mdi-pencil-outline"></span></a>
                                                                    <a class="btn btn-sm btn-outline-danger" href="#" data-bs-toggle="modal" 
                                                                       data-bs-target="#deleteUser" data-id="{{ $user->id }}" data-name="{{ $user->facultyProfile->fullName ?? 'Null' }}" 
                                                                       data-email="{{ $user->email }}">
                                                                    <span class="mdi mdi-trash-can-outline"></span></a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="7" class="text-center">No faculty users found.</td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- Admin Tab -->
                                            <div class="tab-pane fade" id="adminTab" role="tabpanel">
                                                <div class="table-responsive">
                                                    <table class="table table-editable table-nowrap align-middle">
                                                        <thead class="table-primary">
                                                            <tr>
                                                                <th style="width: 50px;">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="checkAllAdmin">
                                                                    </div>
                                                                </th>
                                                                <th>Name</th>
                                                                <th>User Status</th>
                                                                <th>Survey Taken</th>
                                                                <th>Survey Recieved</th>
                                                                <th>Department</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if($adminUser->count() > 0)
                                                        @foreach($adminUser as $user)
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <strong>{{ $user->facultyProfile->fullName() ?? 'Null' }}</strong><br />
                                                                    <span class="text-muted">{{ $user->email }}</span>
                                                                </td>
                                                                <td>{{ $user->user_status }}</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>{{ $user->facultyProfile->department }}</td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-outline-primary" href="#" data-bs-toggle="modal" data-bs-target="#editUser"><span class="mdi mdi-pencil-outline"></span></a>
                                                                    <a class="btn btn-sm btn-outline-danger" href="#" data-bs-toggle="modal" 
                                                                       data-bs-target="#deleteUser" data-id="{{ $user->id }}" data-name="{{ $user->facultyProfile->fullName() ?? 'Null' }}" 
                                                                       data-email="{{ $user->email }}">
                                                                    <span class="mdi mdi-trash-can-outline"></span></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        @else
                                                                <tr>    
                                                                    <td colspan="7" class="text-center">No admin users found.</td>
                                                                </tr>
                                                        @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <!-- container-fluid -->


                    <!-- create User modal -->
                    <div class="modal fade" id="createUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editProfileModalLabel">Add User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('management.add.users', ) }}">
                                <div class="modal-body">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">User's Email</label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email...">
                                        </div>
                                        <div  id="userProfile">

                                        </div>
                                        <div class="mb-3">
                                            <label for="userType" class="form-label">User Type</label>
                                            <select class="form-select" name="user_type" id="userType">
                                                <option value="">Select User Type...</option>
                                                <option data-value="student" value="Student">Student</option>
                                                <option data-value="faculty" value="Faculty">Faculty</option>
                                                <option data-value="admin" value="Admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add User</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end create User modal -->


                    <!-- edit User modal -->
                    <div class="modal fade" id="editUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editProfileModalLabel">Edit User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">User's Email</label>
                                            <input type="text" class="form-control" id="email" placeholder="Email...">
                                        </div>
                                        <div  id="userProfile">

                                        </div>
                                        <div class="mb-3">
                                            <label for="department" class="form-label" action="onclick()">User Status</label>
                                            <select class="form-select" us id="department">
                                                <option value="">Select User Type...</option>
                                                <option value="Student">Student</option>
                                                <option value="Faculty">Faculty</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end edit User modal -->


                    <!-- delete User modal -->
                    <div class="modal fade" id="deleteUser" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete User</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        <form id="deleteUserForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <div id="deleteUserForm" class="modal-body">
                              <h5>Are you sure you want to delete this user? This action cannot be undone.</h5>
                              <br>
                              <p id="deleteUserInfo"></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-danger">Delete User</button>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>
                    <!-- end delete User modal -->


                <script>

                    document.addEventListener('DOMContentLoaded', function () {

                        const userTypeSelect = document.querySelector('select[name="user_type"]');

                        userTypeSelect.addEventListener('change', function () {
                            const selectedType = userTypeSelect.value;
                            const profileSelect = document.getElementById('userProfile');

                            if (selectedType === 'Student') {
                                profileSelect.className = "mb-3";
                                profileSelect.innerHTML = `
                                    <label for="student_id" class="form-label">Student ID</label>
                                    <input class="form-select" name="student_id" id="student_id"></input>`;
                            } else if (selectedType === 'Faculty' || selectedType === 'Admin') {
                                profileSelect.element.className = "mb-3";
                                profileSelect.innerHTML = `
                                    <label for="faculty_id" class="form-label">Faculty ID</label>
                                    <input class="form-select" name="faculty_id" id="faculty_id"></input>`;
                            } else {
                                profileSelect.element.className = "";
                                profileSelect.innerHTML = '';
                                return; // Exit if no valid type is selected  
                            }
                        });

                        const editUserModal =  document.getElementById('editUSer');

                        editUserModal.addEventListener('show.bs.modal', function (event) {

                        });
                

                        const deleteUserModal = document.getElementById('deleteUser');

                        deleteUserModal.addEventListener('show.bs.modal', function (event) {
                            const button = event.relatedTarget;
                            const userId = button.getAttribute('data-id');
                            const userName = button.getAttribute('data-name');
                            const userEmail = button.getAttribute('data-email');

                               // Set form action
                            document.getElementById('deleteUserForm').action = `/management/users/delete/${userId}`;
                            
                            // Update confirmation message
                            document.getElementById('deleteUserInfo').textContent = `${userName} (${userEmail})`;
                        });
                    });
                </script>

@endsection