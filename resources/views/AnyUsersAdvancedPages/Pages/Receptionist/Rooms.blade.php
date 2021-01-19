@extends('anyUsersAdvancedPages.layouts.content')

@section('contentAnyUsersAdvancedPages')

<section class="content-header " >

    @if(App::isLocale('ar'))
        <h1 class=" pull-right">
            {{__('pageContent.aside_dashboard')}}
            <small>{{__('pageContent.controlPanel')}}</small>
        </h1>
    @elseif(App::isLocale('en'))
        <h1 class=" pull-left">
            {{__('pageContent.aside_dashboard')}}
            <small>{{__('pageContent.controlPanel')}}</small>
        </h1>

    @endif


</section>
<br>
<br>
<!-- Main content -->
<section class="content">


    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">

                        @foreach($rooms as $room)
                    <div class="tableshowdata" id="any">
                        <div class="col-sm col-md-6 col-lg-4 ftco-animate" >
                            <div class="room">
                                <a href="rooms-single.html" class="img d-flex justify-content-center align-items-center" style="background-image: url({{URL::asset('images/rooms/'.$room->image)}});">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="icon-search2"></span>
                                    </div>
                                </a>
                                <div class="text p-3 text-center">
                                    @if($room->roomtype_id == 1)
                                    <h3 class="mb-3"><a href="">Classic Room</a></h3>
                                    @elseif($room->roomtype_id == 2)
                                        <h3 class="mb-3"><a href="">Luxury Room</a></h3>
                                    @elseif($room->roomtype_id == 3)
                                        <h3 class="mb-3"><a href="">Deluxe Room</a></h3>
                                    @elseif($room->roomtype_id == 4)
                                        <h3 class="mb-3"><a href="">Superior Room</a></h3>
                                    @elseif($room->roomtype_id == 5)
                                        <h3 class="mb-3"><a href="">Suite</a></h3>
                                    @elseif($room->roomtype_id == 6)
                                        <h3 class="mb-3"><a href="">Family Room</a></h3>
                                    @endif
                                    <p><span class="price mr-2">{{$room->price}}</span> <span class="per">{{$room->price_per}}</span></p>
                                    <ul class="list">
                                        <li><span>Max:</span> {{$room->MaximumPerson}} Persons</li>
                                        <li><span>Size:</span> {{$room->RoomSize}} m2</li>
                                        <li><span>View:</span> {{$room->RoomView}}</li>
                                        <li><span>Bed:</span> {{$room->BedNumber}}</li>
                                    </ul>
                                    <hr>
                                    <p class="pt-1"><a href="" class="btn-custom">Book Now <span class="icon-long-arrow-right"></span></a></p>
                                </div>
                            </div>
                        </div>
                </div>
                            @endforeach



                    </div>
                </div>
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-wrap bg-light ftco-animate">
                        <h3 class="heading mb-4">Advanced Search</h3>
                        <form >
                            <div class="fields">
                                <div class="form-group">
                                    <div class="select-wrap one-third">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select  value="{{ old('typeroom') }}" id='typeroomval' name="typeroom"  class="form-control">
                                            <option value="0">Choose Room Type</option>
                                            <option value="5">Suite</option>
                                            <option value="6">Family Room</option>
                                            <option value="3">Deluxe Room</option>
                                            <option value="1">Classic Room</option>
                                            <option value="4">Superior Room</option>
                                            <option value="2">Luxury Room</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="select-wrap one-third">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select  value="{{ old('adult') }}" id='adultVal' name="adult"  class="form-control">
                                            <option value="0">Choose Number Adults</option>
                                            <option value="1">1 Adult</option>
                                            <option value="2">2 Adult</option>
                                            <option value="3">3 Adult</option>
                                            <option value="4">4 Adult</option>
                                            <option value="5">5 Adult</option>
                                            <option value="6">6 Adult</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input id='but_search' type="button" value="Search" class="btn btn-primary py-3 px-5">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-wrap bg-light ftco-animate">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#new" data-toggle="tab">New User</a></li>
                                <li><a href="#exist" data-toggle="tab">Existing User</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="active tab-pane" id="new">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</section>
<!-- /.content -->

@endsection



@section('scripts')
    <script src="jquery-3.0.0.min.js"></script>


    <script type="text/javascript">


        // Fetch all records

    // Fetch all records
    /* $('#search').keypress(function(){
     fetchRecords(0);
     });*/

    // Search by userid
    $('#but_search').click(function(){
        var roomtype = Number($('#typeroomval').val().trim());
        var adult = Number($('#adultVal').val().trim());
        // Search by userid
        /* $('#search').keypress(function(){
         var userid = Number($('#search').val().trim());*/

        if(roomtype > 0){
            fetchRecords(roomtype , adult);
        }else if(adult > 0){
            fetchRecords(roomtype ,adult);
        }else if(roomtype > 0 && adult > 0)
        {
            fetchRecords(roomtype ,adult);
        }
        else {
            fetchRecords(0);
        }

    });


    function fetchRecords(roomtype , adult){
        var roomtype = Number($('#typeroomval').val().trim());
        var adult = Number($('#adultVal').val().trim());
        $.ajax({
            url: 'getRoomByType/'+roomtype +'/'+ adult,
            type: 'get',
            dataType: 'json',
            success: function(response){

                var len = 0;
                $('.tableshowdata').empty();
                if(response['data'] != null){
                    len = response['data'].length;
                }

                if(len > 0){
                    for(var i=0; i<len; i++){
                        var roomtype_id = response['data'][i].roomtype_id;
                        var state_id = response['data'][i].state_id;
                        var state_clean_id = response['data'][i].state_clean_id;
                        var price = response['data'][i].price;
                        var price_per = response['data'][i].price_per;
                        var MaximumPerson = response['data'][i].MaximumPerson;
                        var RoomSize = response['data'][i].RoomSize;
                        var BedNumber = response['data'][i].BedNumber;
                        var RoomView = response['data'][i].RoomView;
                        var image = response['data'][i].image;

                        var img = "images/rooms/";

                        var type = "";
                        if(roomtype_id == 1) {
                            type="Classic Room";
                        }else if(roomtype_id == 2){
                            type="Luxury Room";
                        }else if(roomtype_id == 3){
                            type="Deluxe Room";
                        }else if(roomtype_id == 4){
                            type="Superior Room";
                        }else if(roomtype_id == 5){
                            type="Suite";
                        }else if(roomtype_id == 6){
                            type="Family Room";
                        }

                        var result_str =  " <div class='col-sm col-md-6 col-lg-4 ftco-animate'>" +
                                           " <div class='room'>"+
                            " <a href='rooms-single.html' class='img d-flex justify-content-center align-items-center'  style='background-image: url("+img+""+image+");' >"+

                                " <div class='icon d-flex justify-content-center align-items-center'>"+
                                " <span class='icon-search2'></span>"+
                                " </div>"+
                                " </a>"+
                                " <div class='text p-3 text-center'>"+
                                " <h3 class='mb-3'><a href=''>"+type+"</a></h3>"+
                                "  <p><span class='price mr-2'> "+price +"</span> <span class='per'>" +price_per+"</span></p>"+
                                "<ul class='list'>"+
                                "  <li><span>Max:</span> " + MaximumPerson +  " Persons</li>"+
                                " <li><span>Size:</span> "+RoomSize +" m2</li>"+
                                "<li><span>View:</span>"+RoomView+" </li>"+
                                " <li><span>Bed:</span>"+BedNumber+ "</li>"+
                                "</ul>"+
                                "<hr>" +
                                " <p class='pt-1'><a href='' class='btn-custom'>Book Now <span class='icon-long-arrow-right'></span></a></p>" +
                                " </div>"+
                                          "</div>"+
                                          " </div>";

                        $("#any").append(result_str);
                        }
                }else{

                }

            }
        });
    }
</script>
@endsection