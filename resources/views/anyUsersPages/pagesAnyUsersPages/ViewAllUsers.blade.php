 
                  <div class="col-md-12" style="margin-top: 10px;">
            <div class="row">
       <div class="col-md-12  ftco-animate">
                
                         

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables All Users</h1>
          <p class="mb-4">DataTables Of All Users In System (Accountant , Receptionist , HouseKeeping) <a target="_blank" href="https://datatables.net"></a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-12">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Users</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Fname</th>
                      <th>Mname</th>
                      <th>Lname</th>
                      <th>Email</th>
                      <th>Balance</th>
                      <th>Type</th>
                      <th>SSN</th>
                      <th>Age</th>
                      <th>BirthDate</th>
                      <th>WorkHours</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                   {{csrf_field}}
                    <?php  $i=1; ?>
                  @foreach ($allusers as $user)
                    <tr>
                       <td>{{ $i++ }}</td>
                      <td>{{$user->fname}} </td>
                      <td>{{$user->mname}} </td>
                      <td>{{$user->lname}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->balance}}</td>
                      <td>{{$user->type_id}}</td>
                      <td>{{$user->ssn}} </td>
                      <td>{{$user->age}} </td>
                      <td>{{$user->birthdate}}</td>
                      <td>{{$user->workhours}}</td>
                      <td>{{$user->phone}}</td>
                      <td>{{$user->Address}}</td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
                 {!! $allusers->links() !!}
              </div>
            </div>
          </div>  
                         

              </div>
            </div>
          </div>
           






