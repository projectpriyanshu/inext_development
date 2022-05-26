<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/') }}css/Style.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;1,400;1,800&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/2c62f2db61.js" crossorigin="anonymous"></script>
    <title>Inext</title>
    <link rel="stylesheet" href="{{ asset('/') }}css/vendors.min.css">
    <!-- Autocomplete -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <!-- Autocomplete -->
    @stack('css')
</head>

<body>
    @include('includes.header')
    @yield('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script> --}}

    <!-- Added script --->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendor Js -->
    <script src="{{ asset('/') }}js/vendors.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript">
        // function verifyGstStatewise() {
        //     var gst = $('#gstno').val();
        //     var statecode = $('#state_code').val();
        //     var state = $('#state').val();
        //     if (statecode.length < 1 || state.length < 1) {
        //         alert('State Code and state is required!');
        //         $('#state').focus();
        //         $('#gstno').val('');
        //         return false;
        //     }

        //     $.ajax({
        //         'url': "{{ route('verify.gst.statewise') }}",
        //         'method': "post",
        //         'data': {
        //             _token: '{{ csrf_token() }}',
        //             state: state,
        //             statecode: statecode,
        //             gst: gst
        //         },
        //         success: function(response) {
        //             if (response.status == false) {
        //                 alert(response.message);
        //             }

        //         }
        //     });

        // }

        function checkPan() {
            var pan = $("input[name='pan_no']").val();
            var pan_check = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
            if (!pan_check.test(pan)) {
                alert("Permanent Account Number is not yet valid!");
                return false;
            }
        }

        function checkAadhar() {
            var adhar = $("input[name='aadhar_no']").val();
            if (adhar.length != 12) {
                alert('Aadhar no is required and must be 12 digits');
                return false;
            }
        }

        //Search Country
        function deleteCountry() {
            var data = $('#country').val();
            if (data.length > 1) {
                $('#country_code').val('');
            }
        }
        var token = "{{ csrf_token() }}";
        $("#country").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('search.country') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: token,
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#country').val(ui.item.label);
                $('#country_code').val(ui.item.country_code);
                return false;
            }
        });

        //Search State
        function searchState() {
            var country = $('#country').val();
            var ccode = $('#country_code').val();
            if (country.length < 1 || ccode.length < 1) {
                alert('Please enter Country and Country Code');
                $('#country').focus();
                $('#state').val('');
                return false;
            }
            var data = $('#state').val();
            if (data.length > 1) {
                $('#state_code').val('');
            }
        }
        $("#state").autocomplete({
            source: function(request, response) {
                var country = $('#country').val();
                var ccode = $('#country_code').val();
                $.ajax({
                    url: "{{ route('search.state') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: token,
                        search: request.term,
                        country: country,
                        ccode: ccode
                    },
                    success: function(data) {
                        console.log(data);
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#state').val(ui.item.label);
                $('#state_code').val(ui.item.state_code);
                return false;
            }
        });
        //Search City
        function searchCity() {
            var country = $('#country').val();
            var ccode = $('#country_code').val();

            var state = $('#state').val();
            var scode = $('#state_code').val();

            var data = $('#city').val();
            if (data.length > 1) {
                $('#city_code').val('');
            }

            if (state.length < 1 || scode.length < 1) {
                alert('Please enter State and State Code');
                $('#state').focus();
                $('#city').val('');
                return false;
            }
        }
        $("#city").autocomplete({
            source: function(request, response) {
                var country = $('#country').val();
                var ccode = $('#country_code').val();

                var state = $('#state').val();
                var scode = $('#state_code').val();
                $.ajax({
                    url: "{{ route('search.city') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: token,
                        search: request.term,
                        state: state,
                        scode: scode,
                        country: country,
                        ccode: ccode
                    },
                    success: function(data) {
                        console.log(data);
                        response( data );
                     }       
                  });
               },
               select: function (event, ui) {
                  $('#city').val(ui.item.label); 
                  $('#city_code').val(ui.item.city_code); 
                  return false;
               }
            });

        $(".fromcountry").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('search.from.country') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: '{{ csrf_token() }}',
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data);
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('.fromcountry').val(ui.item.label);
                return false;
            }
        });

        $(".tocountry").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('search.from.country') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: '{{ csrf_token() }}',
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data);
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('.tocountry').val(ui.item.label);
                return false;
            }
        });


        $(".fromstate").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('search.from.state') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: '{{ csrf_token() }}',
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data);
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('.fromstate').val(ui.item.label);
                return false;
            }
        });

        $(".tostate").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('search.from.state') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: '{{ csrf_token() }}',
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data);
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('.tostate').val(ui.item.label);
                return false;
            }
        });

        $(".fromcity").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('search.from.city') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: '{{ csrf_token() }}',
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data);
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('.fromcity').val(ui.item.label);
                return false;
            }
        });

            $( ".tocity" ).autocomplete({
                   source: function( request, response ) {
                      $.ajax({
                         url:"{{route('search.from.city')}}",
                         type: 'post',
                         dataType: "json",
                         data: { _token: '{{csrf_token()}}',
                            search: request.term},
                         success: function( data ) {
                            console.log(data);
                            response( data );
                         }       
                      });
                },
                select: function (event, ui) {
                      $('.tocity').val(ui.item.label);
                      return false;
                   }
            });
         // city without state country
       $( "#citynoparam" ).autocomplete({
               source: function( request, response ) {
                  $.ajax({
                     url:"{{route('search.city.with.no.param')}}",
                     type: 'post',
                     dataType: "json",
                     data: { _token: token,search: request.term},
                     success: function( data ) {
                        console.log(data);
                        response( data );
                     }       
                  });
               },
               select: function (event, ui) {
                  $('#citynoparam').val(ui.item.label); 
                  $('#city_codenoparam').val(ui.item.city_code);
                  return false;
               }
            });

            //customer 

            $("#customer_name").autocomplete({
               source: function( request, response ) {
                  $.ajax({
                     url:"{{route('search.customer')}}",
                     type: 'post',
                     dataType: "json",
                     data: { _token: token,search: request.term},
                     success: function( data ) {
                        console.log(data);
                        response( data );
                     }       
                  });
               },
               select: function (event, ui) {
                  $('#customer_name').val(ui.item.label); 
                  $('#customer_code').val(ui.item.customer_code);
                  return false;
               }
            });
            
            

            function sendOnboardingMail(id){
                $.ajax({
                     url:"{{route('client.onboarding.send.mail')}}",
                     type: 'post',
                     data: { _token: '{{csrf_token()}}',id:id},
                     success: function( response ) {
                        // console.log(response);
                        if(response.status == true){
                            $("input[name='name']").val(response.data.client_name);
                            $("input[name='email']").val(response.data.email);
                            $("input[name='mobile_no']").val(response.data.mobile);
                            $("#typedrp").val(response.data.client_type);
                            $("#id").val(response.data.id);
                            var docsArr = response.data.docs.split(",");
                            for(var i=0; i < docsArr.length; i++){
                                $("input[value='"+docsArr[i]+"']").prop('checked', true);
                            }
                        }
                     }       
                  });

            }

    </script>
    @stack('js')
</body>
</html>
