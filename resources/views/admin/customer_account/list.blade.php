@extends('layouts.main')
@section('content')
<div class="background_image">
    <div class="card-body">
        <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
        <div class="mt-5">
            <!-- <div class="tab-pane fade show active" id="clientlist" role="tabpanel" -->
            <!-- aria-labelledby="clientlist-tab"> -->
            <!-- <h5 class="card-title">Customer List</h5> -->
            <div class="detail_edit">
                <fieldset class="form-group border p-3">
                    <legend class="w-auto px-2 text-dark">Search Customer Data</legend>
                    <form class="">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                	<div class="col-md-7">
                                        <div class="row  form-group align-items-start">
                                            <div class="col-md-12">
                                                <div class="bind_input align-items-start">
                                                    <div class="d-md-flex">
                                                        <!-- <div class="me-md-2">
                                                            <input id="name" type="text" class="form-control" placeholder="name">
                                                        </div> -->
                                                        <div class="me-md-2">
                                                            <input id="aadhar" type="text" class="form-control" placeholder="Aadhar">
                                                        </div>
                                                        <div class="me-md-2">
                                                            <input id="gst" type="text" class="form-control" placeholder="GST">
                                                        </div>
                                                        
                                                        <div class="">
                                                            <button type="button" class="btn btn-success rounded-0" onclick="searchClient()">
                                                            	Search
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-5 text-end">
                                       {{-- <button type="button" class="btn btn-success rounded-0">Show &nbsp; <i
                                                    class="fa fa-eye"></i></button>
                                            &nbsp;&nbsp;
                                            --}}
                                    
                                            <button onclick ="getRequestData()" type="button" class="btn btn-primary rounded-0" >Download Excel &nbsp; <i
                                                    class="fa fa-download"></i></button>
                                            
                                            &nbsp;&nbsp;
                                            <button onclick="history.go(0);" type="button" class="btn btn-danger rounded-0">Close &nbsp; <i
                                                    class="fa fa-times"></i></button>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="retAjax"></div>
                                    </div>
                                </div>
                    </form>
                </fieldset>
            </div>
            <!-- </div> -->
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
	
	function searchClient(){
		var aadhar = $('#aadhar').val();
		var gst = $('#gst').val();
        $.ajax({
            url: "{{route('search.customer.account.list')}}",
            method: "POST",
            data: {'_token':'{{csrf_token()}}','aadhar':aadhar,'gst':gst},
            success: function(response){
                console.log(response);
                // if(response.status == 200){
                // 	alert('Data found!')
                // }else{
                // 	alert(response.message);
                // }
                $('.retAjax').replaceWith(response);
            }
        });
	}
    function getRequestData(){
        var query = {
        aadhar: $('#aadhar').val(),
        gst: $('#gst').val(),
    } 
    var url = "{{route('customer-data-export')}}?" + $.param(query)
    window.location = url;  
    }

</script>