@extends('anyUsersAdvancedPages.layouts.content')

@section('contentAnyUsersAdvancedPages')

    <section class="content-header">
        <div class="col-md-12" >
            <h3 align="center">Upload Image in Laravel using Ajax</h3>
            <br />
            <div class="alert" id="message" style="display: none"></div>
            <form  id="upload_form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <table class="table">
                        <tr>
                            <td width="40%" align="right"><label>Select File for Upload</label></td>
                            <td width="30"><input type="file" name="select_file" id="select_file" /></td>
                            <td width="30%" align="left"><input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload"></td>
                        </tr>
                        <tr>
                            <td width="40%" align="right"></td>
                            <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                            <td width="30%" align="left"></td>
                        </tr>
                    </table>
                </div>
            </form>
            <br />
            <span id="uploaded_image"></span>
        </div>
    </section>

@endsection


@section('scripts')
    <script src="jquery-3.0.0.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

           // var form= $('#imge').serialize();
           // var form= new FormData(this);
            $('#upload_form').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ route('ajaxupload.action') }}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        $('#message').css('display', 'block');
                        $('#message').html(data.message);
                        $('#message').addClass(data.class_name);
                        $('#uploaded_image').html(data.uploaded_image);
                    }
                })
            });

        });

    </script>
@endsection
