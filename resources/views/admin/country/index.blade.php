@extends('layouts.main')
@section('content')
<div class="row background_image">
    <div class="col-md-12">
        <div class="card-body">
            <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
            <div class=" mt-5">
                <!-- <div class="tab-pane fade show active" id="country" role="tabpanel" aria-labelledby="country-tab"> -->
                <form action="{{url('country-add')}}" method="post">
                    @csrf()
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2 text-dark">Country Master</legend>
                            <!-- <br> -->
                            <div class="form card mt-2">
                                <div class="card-body">
                                    <div class="row">

                                        @if(session()->has('success'))
										<div class="alert alert-success">
										  {{ session()->get('success') }}
										</div>
										@endif

                                        @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                        </div>
                                         @endif
                                        <span id="alert-success" style="color: green;"></span>
                                        <span id="alert-danger" style="color: red;"></span>

                                        <div class="col-md-6">
                                            <div class="row code form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label">Search</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control"
                                                            placeholder="Search here..." name="search" id="search">
                                                        <button type="button" class="btn btn-common rounded-0 save-btn" id="search_btn">
                                                            <span><i class="fa fa-search"></i></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-8">
                                                    <hr class="yellow_line">
                                                </div>
                                            </div>
                                            <div class="row code form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Code</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control" name="code" id="code" value="{{old('code')}}">
                                                        <button type="button" class="btn btn-common rounded-0 save-btn" id="check_code">
                                                            <span><i class="fa fa-search"></i></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row text-end mb-3">
                                                @if($errors->has('code'))
                                                     <div class="error">{{ $errors->first('code') }}</div>
                                                  @endif
                                            </div>

                                            <div class="row name form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row text-end mb-3">
                                                @if($errors->has('name'))
                                                     <div class="error">{{ $errors->first('name') }}</div>
                                                  @endif
                                            </div>

                                            <div class="row isocode form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">ISO
                                                        Code</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control" name="iso_code" id="iso_code" value="{{old('iso_code')}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row text-end mb-3">
                                                @if($errors->has('iso_code'))
                                                      <div class="error">{{ $errors->first('iso_code') }}</div>
                                                   @endif
                                             </div>

                                            <div class="row form-group">
                                                <div class="col-md-4">

                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <input type="hidden" name="id" id="id" value="">
                                    <a href="{{url('country-list')}}" class="btn btn-secondary save-btn mr-3"> List
                                    <i class="fa fa-list ms-2"></i>
                                    </a>
                                    <button type="button" class="btn btn-secondary save-btn mr-3" id="edit_country"> Edit
                                        <i class="fa fa-edit ms-2"></i>
                                    </button>

                                    <button class="btn btn-success save-btn"  onclick="return validate()">Save
                                        <i class="fa fa-save ms-2"></i>
                                    </button>

                                </div>
                            </div>

                        </fieldset>

                    </div>
                

                </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
@endsection

 @push('js')
<script type="text/javascript">

function validate(){
    var cde = $("input[name='code']").val();
    if(cde.length < 1){
        alert('The code field is required');
        $("input[name='code']").focus();
        return false;
    }
    var nme = $("input[name='name']").val();
    if(nme.length < 1){
        alert('The name field is required');
        $("input[name='name']").focus();
        return false;
    }
    var isod = $("input[name='iso_code']").val();
    if(isod.length < 1){
        alert('The iso_code field is required');
        $("input[name='iso_code']").focus();
        return false;
    }
}

   $(document).ready(function(){
      $('#check_code').click(function(){
         var id = $('#id').val();
         var code = $('#code').val();
         var baseurl = "{{url('/')}}";
         var token = "{{csrf_token()}}";
         $.ajax({
            url: baseurl + "/country-index", 
            data: {'_token':token,'code':code,'id':id},
            success: function(result){
               var country = jQuery.parseJSON( result );
               $('#id').val(country.id);
               $('#name').val(country.name).prop('disabled', true);
               $('#code').val(country.code).prop('disabled', true);
               $('#iso_code').val(country.iso_code).prop('disabled', true);
               
               if(country.status == '400')
               {
                  $('#id').val();
                  $('#name').val();
                  $('#iso_code').val();
                  $('#code').val();

                  $('#iso_code').prop('disabled', false);
                  $('#code').prop('disabled', false);
                  $('#name').prop('disabled', false);
                 
                  $('#alert-danger').text(country.message);
               }
            }  
         });
      });

      $('#search_btn').click(function(){
         var search = $('#search').val();
         var baseurl = "{{url('/')}}";
         var token = "{{csrf_token()}}";
         $.ajax({
            url: baseurl + "/country-index", 
            data: {'_token':token,'search':search},
            success: function(result){
               var country = jQuery.parseJSON( result );
               $('#id').val(country.id);
               $('#iso_code').val(country.iso_code).prop('disabled', true);
               $('#code').val(country.code).prop('disabled', true);
               $('#name').val(country.name).prop('disabled', true);
              
               if(country.status == '400')
               {
                  $('#id').val();
                  $('#code').val();
                  $('#name').val();
                  $('#iso_code').val();
                
                  $('#code').prop('disabled', false);
                  $('#iso_code').prop('disabled', false);
                  $('#name').prop('disabled', false);
                 
                  $('#alert-danger').text(country.message);
               }
            }  
         });
      });

      $('#edit_country').click(function() 
      {
         $('#code').prop('disabled', false);
         $('#name').prop('disabled', false);
         $('#iso_code').prop('disabled', false);
      })

      
   });
</script>
@endpush   