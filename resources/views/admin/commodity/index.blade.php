@extends('layouts.main')
@section('content')
<div class="row background_image">
    <div class="col-md-12">
        <div class="card-body">
            <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
            <div class=" mt-5">
                <!-- <div class="tab-pane fade show active" id="country" role="tabpanel" aria-labelledby="country-tab"> -->
                <form action="{{route('commodity.add')}}" method="post">
                    @csrf()
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2 text-dark">Commodity Master</legend>
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
                                       		
                                       		<div class="text-danger message"></div>

                                        <div class="col-md-6">
                                            <div class="row code form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Search</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control"
                                                            placeholder="Search here..." name="search" id="search">
                                                        <button type="button" class="btn btn-common rounded-0 save-btn search_btn">
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
                                                    <label for="name" class="form-label ">Status{{old('status')}}</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <select class="form-control status" name='status'>
                                                        	<option value="">--Select Status--</option>
                                                        	<option value="1" @if(old('status') == '1') selected @endif>Enable</option>
                                                        	<option value="0" @if(old('status') == '0') selected @endif>Disable</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row text-end mb-3">
                                                @if($errors->has('status'))
                                                      <div class="error">{{ $errors->first('status') }}</div>
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
                                    <a href="{{route('commodity.list')}}" class="btn btn-secondary save-btn mr-3"> List
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
    var isod = $(".status").val();
    if(isod.length < 1){
        alert('The status field is required');
        $(".status").focus();
        return false;
    }
}

   $(document).ready(function(){
      $('#check_code').click(function(){
         var search = $('#code').val();
         if(search.length < 1){
         	alert('Please enter keyword to search');
         	$('#search').focus();
         	return false;
         }
         $.ajax({
            url: "{{route('commodity.search')}}", 
            method : 'post',
            data: {'_token':'{{csrf_token()}}','code':search},
            success: function(response){
            	console.log(response);
            	if(response.status == true){
            		$("input[name='code']").val(response.data.code).attr("disabled",true);
            		$("input[name='name']").val(response.data.name).attr("disabled",true);;
            		$(".status").val(response.data.status).attr("disabled",true);;
            		$("#id").val(response.data.id).attr("disabled",true);
            	}else{
            		$("input[name='code']").val('').attr("disabled",false);
            		$("input[name='name']").val('').attr("disabled",false);
            		$(".status").val('').attr("disabled",false);
            		$("#id").val('').attr("disabled",false);
            		$('.message').html(response.message);
            	}
            }  
         });
         
      });

      $('.search_btn').click(function(){
      	$('.message').html('');
         var search = $('#search').val();
         if(search.length < 1){
         	alert('Please enter keyword to search');
         	$('#search').focus();
         	return false;
         }
         $.ajax({
            url: "{{route('commodity.search')}}", 
            method : 'post',
            data: {'_token':'{{csrf_token()}}','search':search},
            success: function(response){
            	console.log(response);
            	if(response.status == true){
            		$("input[name='code']").val(response.data.code).attr("disabled",true);
            		$("input[name='name']").val(response.data.name).attr("disabled",true);;
            		$(".status").val(response.data.status).attr("disabled",true);;
            		$("#id").val(response.data.id).attr("disabled",true);
            	}else{
            		$("input[name='code']").val('').attr("disabled",false);
            		$("input[name='name']").val('').attr("disabled",false);
            		$(".status").val('').attr("disabled",false);
            		$("#id").val('').attr("disabled",false);
            		$('.message').html(response.message);
            	}
            }  
         });
      });

      $('#edit_country').click(function() 
      {
         $('#code').prop('disabled', false);
         $('#name').prop('disabled', false);
         $('.status').prop('disabled', false);
         $('#id').prop('disabled', false);
      })

      
   });
</script>
@endpush   