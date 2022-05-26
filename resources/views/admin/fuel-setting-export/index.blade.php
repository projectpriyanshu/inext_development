@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
<div class=" background_image">
        <div class="">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="mt-5">
                    <!-- <div class="tab-pane fade show active" id="fuelsetting" role="tabpanel"
                        aria-labelledby="fuelsetting-tab"> -->
                    <!-- <h5 class="card-title">Fuel Setting Master (Export)</h5> -->
                        <div class="detail_edit">
                            <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2 text-dark">Fuel Detail</legend>
                                <form class="" action="{{route('fuel-setting-add')}}" method="post">
                                    @csrf
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
                                                <div class="row form-group">
                                                    <div class="col-md-4">
                                                        <label for="name" class="form-label ">Search</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <input type="text" class="form-control"
                                                                placeholder="Search Network..." name="search" id="search">
                                                            <button type="button" class="btn btn-common rounded-0 search-btn" id="search_btn">
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
                                                        <label for="name" class="form-label ">Client</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <div class="row form-row">
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="client_code" id="client_code" readonly value="{{old('client_code')}}">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="client_name" id="client_name" placeholder="Search Client.." value="{{old('client_name')}}" onkeyup ="deleteData()" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row text-end mb-3">
                                                @if($errors->has('client_name'))
                                                    <div class="error">{{ $errors->first('client_name') }}</div>
                                                @endif
                                                </div>
                                                <div class="row name form-group">
                                                    <div class="col-md-4">
                                                        <label for="name" class="form-label ">Network<label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <input type="text" class="form-control" name="network" id="network" placeholder="Search Network.." value="{{old('network')}}"> &nbsp;&nbsp;
                                                            <span style="color: red; font-weight: bold;">*</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row text-end mb-3">
                                                @if($errors->has('network'))
                                                    <div class="error">{{ $errors->first('network') }}</div>
                                                @endif
                                                </div>
                                                <div class="row name form-group">
                                                    <div class="col-md-4">
                                                        <label for="name" class="form-label ">Amount<label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <input type="text" class="form-control" name="amount" id="amount" placeholder="0.0" value="{{old('amount')}}">
                                                            &nbsp;&nbsp;
                                                            <span>(%)</span> &nbsp;
                                                            <span style="color: red; font-weight: bold;">*</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row text-end mb-3">
                                                @if($errors->has('amount'))
                                                    <div class="error">{{ $errors->first('amount') }}</div>
                                                @endif
                                                </div>
                                                <div class="row name form-group">
                                                    <div class="col-md-4">
                                                        <label for="name" class="form-label ">From Date</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <input type="date" class="form-control" name="from_date" id="from_date" value="{{old('from_date')}}"> &nbsp;&nbsp;
                                                            <span style="color: red; font-weight: bold;">*</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row text-end mb-3">
                                                @if($errors->has('from_date'))
                                                    <div class="error">{{ $errors->first('from_date') }}</div>
                                                @endif
                                                </div>
                                                <div class="row name form-group">
                                                    <div class="col-md-4">
                                                        <label for="name" class="form-label">To Date</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <input type="date" class="form-control" name="to_date" id="to_date" value="{{old('to_date')}}"> &nbsp;&nbsp;
                                                            <span style="color: red; font-weight: bold;">*</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row text-end mb-3">
                                                @if($errors->has('to_date'))
                                                    <div class="error">{{ $errors->first('to_date') }}</div>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="btn_group text-center button_media">
                                        <input type="hidden" id="id" name="id">
                                            <button type="button" class="btn btn-warning rounded-0" id="edit_fuel">Edit
                                                <i class="fa fa-pencil-alt"></i>
                                            </button>

                                            <button type="submit" class="btn btn-primary rounded-0" onclick="return validate()">Add
                                                <i class="fa fa-folder-plus"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger rounded-0
                                            " id="delete_fuel">Delete
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <button type="button" class="btn btn-dark rounded-0" id="refresh_btn">Refresh
                                                <i class="fa fa-refresh"></i>
                                            </button>
                                            <a href="{{route('fuel-setting-list')}}" class="btn btn-success rounded-0"> List
                                            <i class="fa fa-eye"></i>
                                            </a>
                                            
                                        </div><br>
                                        <div>
                                            <textarea class="text" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </fieldset>
                        </div>
                    
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
    function validate(){
    var client = $("input[name='client_name']").val();
    if(client.length < 1){
        alert('Please Select Client Name from the list');
        $("input[name='client_name']").focus();
        return false;
    }
    var net = $("input[name='network']").val();
    if(net.length < 1){
        alert('network is required');
        $("input[name='network']").focus();
        return false;
    }
    var amt = $("input[name='amount']").val();
    if(amt.length < 1|| isNaN(amt)){
        alert('Amount is required and must be number');
        $("input[name='amount']").focus();
        return false;
    }
    var dte = $("input[name='from_date']").val();
    if(dte.length < 1){
        alert('from_date is required');
        $("input[name='from_date']").focus();
        return false;
    }
    var date = $("input[name='to_date']").val();
    if(date.length < 1){
        alert('to_date is required');
        $("input[name='to_date']").focus();
        return false;
    }
    }
   $(document).ready(function(){
      $('#search_btn').click(function(){
         var search = $('#search').val();
         var token = "{{csrf_token()}}";
         $.ajax({
            url: "{{route('fuel-setting-index')}}", 
            data: {'_token':token,'search':search},
            success: function(result){
               var fuel_export = jQuery.parseJSON( result );
               $('#id').val(fuel_export.id);
               $('#client_name').val(fuel_export.client_name).prop('disabled', true);
               $('#client_code').val(fuel_export.client_code).prop('disabled', true);
               $('#network').val(fuel_export.network).prop('disabled', true);
               $('#amount').val(fuel_export.amount).prop('disabled', true);
               $('#from_date').val(fuel_export.from_date).prop('disabled', true);
               $('#to_date').val(fuel_export.to_date).prop('disabled', true);
               if(fuel_export.status == '400')
               {
                $('#id').val();
                  $('#client_name').val();
                  $('#network').val();
                  $('#client_code').prop('disabled', false);
                  $('#client_name').prop('disabled', false);
                  $('#network').prop('disabled', false);
                  $('#amount').prop('disabled', false);
                  $('#from_date').prop('disabled', false);
                  $('#to_date').prop('disabled', false);
                  $('#alert-danger').text(fuel_export.message);
               }
            }  
         });
      });

      $('#refresh_btn').click(function(){
          location.reload();
      })
      $('#delete_fuel').click(function() 
      {
        var id = $('#id').val();
         var token = "{{csrf_token()}}";
         $.ajax({
            url: "{{route('fuel-setting-export-delete')}}", 
            data: {'_token':token,'id':id},
            success: function(){
                alert('Fuel Export Deleted Successfully!')
                location.reload();
            }
      })
   });

      $('#edit_fuel').click(function() 
      {
         $('#client_name').prop('disabled', false);
         $('#client_code').prop('disabled', false);
         $('#network').prop('disabled', false);
         $('#amount').prop('disabled', false);
         $('#from_date').prop('disabled', false);
         $('#to_date').prop('disabled', false);
      })

      // Client Search
      var token = "{{csrf_token()}}";
        $( "#client_name" ).autocomplete({
        source: function( request, response ) {
          $.ajax({
            url:"{{route('search-client')}}",
            type: 'post',
            dataType: "json",
            data: {
               _token: token,
               search: request.term
            },
            success: function( data ) {
               response( data );
            }       
          });
        },
        
        select: function (event, ui) {
           $('#client_name').val(ui.item.label); 
           $('#client_code').val(ui.item.client_code); 
           return false;
        }
      });

      // Network Search
      var token = "{{csrf_token()}}";
        $( "#network" ).autocomplete({
        source: function( request, response ) {
          $.ajax({
            url:"{{route('search-network')}}",
            type: 'post',
            dataType: "json",
            data: {
               _token: token,
               search: request.term
            },
            success: function( data ) {
               response( data );
            }       
          });
        },
        
        select: function (event, ui) {
           $('#network').val(ui.item.label); 
           return false;
        }
      });
   });
   function deleteData(){
          var data = $('#client_name').val();
          if(data.length > 1)
          {
              $('#client_code').val(''); 
            
          }
      }
</script>
@endpush