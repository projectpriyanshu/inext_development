@extends('layouts.main')
@section('content')
<div class="row background_image">
    <div class="col-md-12">
        <div class="card-body">
            <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
            <div class="mt-5">
                <!-- <div class="tab-pane fade show active" id="service" role="tabpanel" aria-labelledby="service-tab"> -->

                	@if(Session::has('success'))
                	<div class="col-md-6 offset-md-3">
                		<div class="alert alert-success alert-dismissible">
						    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
						    <strong>Success!</strong> {{Session::get('success')}}
						</div>
                	</div>
                	
                	@endif

                <form method="post" action="{{route('forwarder.service.add')}}">
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2 text-dark">FORWARDER SERVICE MASTER</legend>

                            <div class="form card mt-2">
                        		@csrf
                                <div class="card-body">
                                    <div class="row">
                                    	
                                        <div class="col-md-6">
                                        	<div id="message" class="text-danger text-center"></div>
                                            <div class="row code form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Search</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input id="search" type="text" class="form-control"
                                                            placeholder="Search here...">
                                                        <button id="search-btn" type="button" class="btn btn-common rounded-0 save-btn">
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
                                                        <input id="code" type="text" class="form-control" name="code" value="{{old('code')}}">
                                                        <button id="search-code" type="button" class="btn btn-common rounded-0 save-btn">
                                                            <span><i class="fa fa-search"></i></span>
                                                        </button>
                                                    </div>
                                                    @if($errors->has('code'))
						                              <div class="error text-end">{{ $errors->first('code') }}</div>
						                           	@endif
                                                </div>
                                            </div>
                                            <div class="row name form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}">
                                                    </div>
                                                    @if($errors->has('name'))
						                              	<div class="error text-end">{{ $errors->first('name') }}</div>
						                           	@endif
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Forwarder</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <div class="row form-row">
                                                            <div class="col-md-4">
                                                                <input id="fcode" type="text" class="form-control" name="forwarder_code" value="{{old('forwarder_code')}}">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input id="fname" type="text" class="form-control" name="forwarder_name" placeholder="Search Forwarder" autocomplete="off" onkeyup="searchForwarder()" value="{{old('forwarder_name')}}">

                                                                <div class="bg-dark search-suggestion">
                                                                    
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                	<input type="hidden" name="id" id="id" value="">
                                	<a href="{{route('forwarder.service.list')}}" class="btn btn-secondary save-btn mr-3"> List
		                           		<i class="fa fa-list ms-2"></i>
		                           	</a>
                                    <button id="edit-btn" type="button" class="btn btn-secondary save-btn mr-3"> Edit
                                        <i class="fa fa-edit ms-2"></i>
                                    </button>
                                    <button class="btn btn-success save-btn" type="submit">Save
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
    $('.search-suggestion').hide();
    function searchForwarder(){
        var key = $('#fname').val();
        if(key.length < 1){
            $('.search-suggestion').hide();
            return false;
        }
        $.ajax({
            url: "{{route('search.forwarder')}}",
            method: "POST",
            data: {'_token':'{{csrf_token()}}','key':key},
            success: function(response){
                console.log(response)
                $('#fcode').val('');
                $('.search-suggestion').replaceWith(response.data);
            }
        });
    }

    function searchData(name,code){
        $('#fcode').val(code);
        $('#fname').val(name);
        $('.search-suggestion').hide();
    }

   $(document).ready(function(){
   	
      $('#search-code').click(function(){
      	var searchkey = $('#code').val();
         $.ajax({
            url: "{{route('search.service.master')}}",
            method: "POST",
            data: {'_token':'{{csrf_token()}}','searchcode':searchkey},
            success: function(response){
            	console.log(response);
               if(response.status == 200){
               		$('#code').val(response.data.code).prop('disabled', true);
               		$('#name').val(response.data.name).prop('disabled', true);
               		$('#id').val(response.data.id);
               }else if(response.status == 400){
               		$('#code').val('');
               		$('#name').val('');
               		$('#id').val('');
               		$('#message').html(response.message).show();
               }else{
               		$('#message').show();	
               		$('#message').html('Unknown Error!');
               }
            }  
         });
      });

      $('#search-btn').click(function(){
      	var searchkey = $('#search').val();
         $.ajax({
            url: "{{route('search.forwarder.service')}}",
            method: "POST",
            data: {'_token':'{{csrf_token()}}','searchkey':searchkey},
            success: function(response){
            	console.log(response);
               if(response.status == 200){
               		$('#code').val(response.data.code).prop('disabled', true);
               		$('#name').val(response.data.name).prop('disabled', true);
                    $('#fcode').val(response.data.forwarder_code).prop('disabled', true);
                    $('#fname').val(response.data.forwarder_name).prop('disabled', true);
               		$('#id').val(response.data.id);
               }else if(response.status == 400){
               		$('#code').val('');
               		$('#name').val('');
                    $('#fcode').val('');
                    $('#fname').val('');
               		$('#id').val('');
               		$('#message').html(response.message).show();
               }else{
               		$('#message').show();	
               		$('#message').html('Unknown Error!');
               }
            }  
         });
      });

      $('#edit-btn').click(function() 
      {
         $('#code').prop('disabled', false);
         $('#name').prop('disabled', false);
         $('#fname').prop('disabled', false);
         $('#fcode').prop('disabled', false);
      })
      
   });
</script>
@endpush