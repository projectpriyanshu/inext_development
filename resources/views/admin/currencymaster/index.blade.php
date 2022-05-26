@extends('layouts.main')
@section('content')

<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="currencymaster" role="tabpanel" aria-labelledby="currencymaster-tab">
                        <div class="detail_edit">
                            <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2 text-dark">CURRENCY MASTER</legend>
                                <form class="" method="POST" action="{{url('currencymaster-add')}}">
                                  @csrf
                                    <div class="card">
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
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label">Code</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="code" id="code" class="form-control" value="{{old('code')}}">
                                                                <div class="d-flex">
                                                                    <button type="button" class="btn btn-dark" id="check_code" >
                                                                    <span><i class="fa fa-search"></i></span>
                                                                </button>
                                                                </div>
                                                                
                                                            </div>
                                                            @if($errors->has('code'))
						                                        <div class="error text-end">{{ $errors->first('code') }}</div>
						                                       	@endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label">Name<label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                                                            </div>
                                                            @if($errors->has('name'))
						                                     <div class="error text-end">{{ $errors->first('name') }}</div>
						                           	        @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="btn_group">
                                                <input type="hidden" name="id" id="id">
                                                <a href="{{url('currencymaster-list')}}" class="btn btn-secondary save-btn mr-3"> List
                                                <i class="fa fa-list ms-2"></i>
                                                </a>
                                                <button type="button" class="btn btn-secondary" id="edit_currencymaster"> Edit
                                                <i class="fa fa-edit ms-2"></i>
                                                </button>
                                                  <button type="submit" class="btn btn-success" onclick="return validate()">Save
                                                 <i class="fa fa-save ms-2"></i>
                                                   </button>
                                                <button type="reset" class="btn btn-dark" id="delete_currency"> Remove
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <!-- <button class="btn btn-danger">Close
                                                    <i class="fa fa-close"></i>
                                                </button> -->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
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
         }


   $(document).ready(function(){
      $('#check_code').click(function(){
         var id = $('#id').val();
         var code = $('#code').val();
         var baseurl = "{{url('/')}}";
         var token = "{{csrf_token()}}";
         $.ajax({
            url: "{{route('currencymaster-index')}}", 
            data: {'_token':token,'code':code,'id':id},
            success: function(result){
               var currencymaster = jQuery.parseJSON( result );
               $('#id').val(currencymaster.id);
               $('#name').val(currencymaster.name).prop('disabled', true);
               if(currencymaster.status == '400')
               {
                  $('#id').val();
                  $('#name').val();
                  $('#name').prop('disabled', false);
                  $('#alert-danger').text(currencymaster.message);
               }
            }  
         });
      });

      $('#search-btn').click(function(){
         var searchkey = $('#search-input').val();
         $.ajax({
            method:"GET",
            url: "{{route('currencymaster-index')}}", 
            data: {'_token':"{{csrf_token()}}",'searchkey':searchkey},
            success: function(result){
               console.log(result);
                var currencymaster = jQuery.parseJSON(result);
                $('#id').val(currencymaster.id);
                $('#code').val(currencymaster.code).prop('disabled', true);
                $('#name').val(currencymaster.name).prop('disabled', true);
               if(currencymaster.status == '400')
               {
                  $('#id').val();
                  $('#code').val();
                  $('#name').val();
                  $('#gst_state_code').val();
                  $('#name').prop('disabled', false);
                  $('#alert-danger').text(currencymaster.message);
               }
            }  
         });
      });

      $('#edit_currencymaster').click(function() 
      {
         $('#code').prop('disabled', false);
         $('#name').prop('disabled', false);
         
      })
      $('#delete_currency').click(function() 
      {
        var id = $('#id').val();
         var token = "{{csrf_token()}}";
         $.ajax({
            url: "{{route('currencymaster-delete')}}", 
            data: {'_token':token,'id':id},
            success: function(){
                alert('Currency Master Deleted Successfully!')
                location.reload();
            }
      })
   });
   });
</script>
@endpush