@extends('layouts.main')
@section('content')

<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="flightmaster" role="tabpanel" aria-labelledby="flightmaster-tab">
                        <div class="detail_edit">
                            <fieldset class="form-group border p-3">
                                <legend>FLIGHT MASTER</legend>
                                <!-- @php
                                foreach ($errors->all('<li>:message</li>') as $message)
                                    {
                                        echo $message;
                                    }
                                @endphp -->
                                <form class="" action="{{url('flight-add')}}" method="post">
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
                                                <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Code</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="code" id="code" class="form-control">
                                                                <div class="d-flex">
                                                                <button type="button" class="btn btn-common rounded-0 save-btn" id="check_code">
                                                                    <span><i class="fa fa-search"></i></span>
                                                                </button>
                                                                </div>
                                                            </div>
                                                            @if($errors->has('code'))
                                                     <div class="error">{{ $errors->first('code') }}</div>
                                                  @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Name</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="name" id="name" class="form-control">
                                                            </div>
                                                            @if($errors->has('name'))
                                                     <div class="error">{{ $errors->first('name') }}</div>
                                                  @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Flight No</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="flight_no" id="flight_no" class="form-control">
                                                            </div>
                                                            @if($errors->has('flight_no'))
                                                     <div class="error">{{ $errors->first('flight_no') }}</div>
                                                  @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-right">
                                                    <input type="hidden" name="id" id="id" value="">
                                                    <a href="{{url('flight-list')}}" class="btn btn-secondary save-btn mr-3"> List
                                                    <i class="fa fa-list ms-2"></i>
                                                    </a>
                                                    
                                                    <button type="button" class="btn btn-secondary save-btn mr-3" id="edit_flight"> Edit
                                                    <i class="fa fa-edit ms-2"></i>
                                                    </button>
                                                    <button class="btn btn-success save-btn" onclick="return validate()">Save
                                                    <i class="fa fa-save ms-2"></i>
                                                    </button>
                                                    </div>
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
            url: baseurl + "/flight-index", 
            data: {'_token':token,'code':code,'id':id},
            success: function(result){
               var flight = jQuery.parseJSON( result );
               $('#id').val(flight.id);
               $('#code').val(flight.code).prop('disabled', true);
               $('#name').val(flight.name).prop('disabled', true);
               $('#flight_no').val(flight.flight_no).prop('disabled', true);
               if(flight.status == '400')
               {
                  $('#id').val();
                  $('#code').val();
                  $('#name').val();
                  $('#alert-danger').text(flight.message);
               }
            }  
         });
      });

      $('#edit_flight').click(function() 
      {
        $('#id').prop('disabled', false);
         $('#code').prop('disabled', false);
         $('#name').prop('disabled', false);
         $('#flight_no').prop('disabled', false);
        
      })
   });
</script>
@endpush