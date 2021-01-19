@extends('anyUsersAdvancedPages.layouts.content')

@section('contentAnyUsersAdvancedPages')

    <section id="pageContent" class="content" >
        <div class="row">
            <div  class="col-md-12 animate-box " data-animate-effect="fadeInLeft">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#AllTyperooms" data-toggle="tab">All TypeRooms</a></li>
                        <li><a href="#addnew" data-toggle="tab">Add New</a></li>
                        <li><a href="#edit" data-toggle="tab">Edit</a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="active tab-pane" id="AllTyperooms">
                            <div class="col-md-12" style="margin-top: 10px;">
                                <div class="row">
                                    <div class="col-md-12  ftco-animate">
                                        <div class="box">
                                            <div class="box-header">

                                                <div class="col-md-12 ">
                                                    <input type='text' id='search' name='search' placeholder='Enter userid '><input type='button' value='SearchById' id='but_search'>
                                                    <input type='button' value='FetchAllRecordsById' id='but_fetchall'>
                                                    <input type='button' value='FetchByLike' id='but_fetchByLike'>
                                                </div>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="table-responsive">
                                                <table  id="tableshowdata" class="table table-bordered table-striped" id="dataTable">
                                                    <thead>
                                                    <tr>
                                                        <th >No.</th>
                                                        <th>Type</th>
                                                    </tr>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @isset($alltyperooms)
                                                    <?php  $i=1; ?>
                                                    @foreach ($alltyperooms as $typerooms)
                                                        <tr class="user_record" id="record_">
                                                            <td  id="number">{{ $i++ }}</td>
                                                            <td id="nn"> </td>
                                                        </tr>
                                                    @endforeach

                                                        @endisset
                                                    </tbody>

                                                </table>


                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane" id="addnew">

                            <form id="typerooms" class="typeroom" >
                                {{ csrf_field() }}
                            <div class="input-group col-md-6" >

                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input  value="{{ old('fname') }}" type="text" class="form-control form-control-user" name="fname" placeholder="First Name">
                            </div>
                            </br>


                            <div class="form-group">
                                <button id="add_typerooms" class="btn btn-primary "  value="Add" >Add</button>
                            </div>


</form>
                        </div>



                        <div class="tab-pane" id="edit">
                            <form  id="editUser" class="user">
                                {{ csrf_field() }}
                                <div class="input-group col-md-6" >

                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input   value="{{ old('num') }}" type="text" class="form-control form-control-user" name="editnum" id="numuser" >
                                </div>
                                </br>
                                <div class="input-group col-md-6">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input   value="{{ old('Id') }}" type="text" class="form-control form-control-user" name="editid" id="iduser" >
                                </div>
                                </br>
                                <div class="input-group col-md-6">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input value="{{ old('editfname') }}" type="text" class="form-control form-control-user" name="editfname" id="fnameuser" placeholder="First Name">
                                </div>

                                <div class="form-group">
                                    <button id="edit_typerooms" class="btn btn-primary "  value="Edit" >Edit</button>
                                </div>


                            </form>
                        </div>




                    </div>
                </div>
            </div>


            <div class="modal modal-info fade" id="show">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Info Modal</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">ID :</label>
                                <b id="showid"/>
                            </div>
                            <div class="form-group">
                                <label for="">First Name :</label>
                                <b id="showfname"/>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->


        </div>
    </section>


@endsection
@section('scripts')
    <script src="{{URL::asset('jquery-3.0.0.min.js')}}"></script>


    <script type="text/javascript">



    </script>
@endsection
