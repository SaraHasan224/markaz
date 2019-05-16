@extends('layouts.header-1')

@section('styles') 
<style type="text/css">
.my-own-header-bar{
  position: relative;
}
.my-container-fluid{
  padding: 0px;
}
</style>
<link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
@endsection
@section('content')


<!--- Address ---->
<div class="container">
	<div class="row dash-top-margin">
    	
        <div class="col-md-12">
        	<h4>{{$page_title}}</h4>
            <div class="row address-top-margin">
            	<div class="col-md-7 col-md-offset-3">
                    <div class="contact-info">
                        <h6>Default Billing Address</h6>
                        <a href="#" class="pull-right">Edit</a>
                    </div>
                    <div class="contact-info-name contact-info-name-padding">
                        <div class="row contact-info-name-margin-bottom">
                            <div class="col-md-6">
                                <p>Username</p>
                            </div>
                            <div class="col-md-6">
                                <p>Jay Jordan</p>
                            </div>
                        </div>
                        <div class="row contact-info-name-margin-bottom">
                            <div class="col-md-6">
                                <p>Company Name</p>
                            </div>
                            <div class="col-md-6">
                                <p>MailBox</p>
                            </div>
                        </div>
                        <div class="row contact-info-name-margin-bottom">
                            <div class="col-md-6">
                                <p>Telephone</p>
                            </div>
                            <div class="col-md-6">
                                <p>413-787-3378</p>
                            </div>
                        </div>
                        <div class="row contact-info-name-margin-bottom">
                            <div class="col-md-6">
                                <p>Street Address</p>
                            </div>
                            <div class="col-md-6">
                                <p>1076 Trouser Leg Road</p>
                            </div>
                        </div>
                        <div class="row contact-info-name-margin-bottom">
                            <div class="col-md-6">
                                <p>Street Add Line 2</p>
                            </div>
                            <div class="col-md-6">
                                <p></p>
                            </div>
                        </div>
                        <div class="row contact-info-name-margin-bottom">
                            <div class="col-md-6">
                                <p>City</p>
                            </div>
                            <div class="col-md-6">
                                <p>Springfield</p>
                            </div>
                        </div>
                        <div class="row contact-info-name-margin-bottom">
                            <div class="col-md-6">
                                <p>State/Province</p>
                            </div>
                            <div class="col-md-6">
                                <p>Massachusetts</p>
                            </div>
                        </div>
                        <div class="row contact-info-name-margin-bottom">
                            <div class="col-md-6">
                                <p>Zip/Postal Code</p>
                            </div>
                            <div class="col-md-6">
                                <p> 01103</p>
                            </div>
                        </div>
                        <div class="row contact-info-name-margin-bottom">
                            <div class="col-md-6">
                                <p>Country</p>
                            </div>
                            <div class="col-md-6">
                                <p>United States</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row top-margin-30 ab-check">
            	<div class="col-md-6 col-md-offset-3">
                	<div class="form-group">
                      <input type="checkbox" id="default-billing-address">
                      <label class="address-label" for="default-billing-address">Use as my default billing address</label>
                    </div>
                	<div class="form-group">
                      <input type="checkbox" id="default-shipping-address">
                      <label class="address-label" for="default-shipping-address">Use as my default shipping address</label>
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="col-md-6 col-md-offset-3">
                	<button class="btn btn-save-address pull-right">Save Address</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')

    @foreach(Cart::content() as $con)

        <script>
            var url = '{{ url('/') }}';
            $(document).ready(function () {
                $(document).on("click", '#btnMinus{{$con->rowId}}', function (e) {
                    var qty = $('#qty{{ $con->id }}').val();
                    $.get(url + '/update-cart-item/' + '{{ $con->rowId }}'+'/'+qty,function (data) {
                        var result = $.parseJSON(data);
                        if (result['cartError'] == "yes"){
                            toastr.warning(result['cartErrorMessage']);
                        }else{
                            toastr.success('Cart Updated Successfully.');
                            $('#cartShow').empty();
                            $('#cartShow').append(result['cartShow']);
                            $('#cartFullView').empty();
                            var div = document.getElementById('cartFullView');
                            div.innerHTML = result['fullShow'];
                        }
                    });
                });
                $(document).on("click", '#btnPlus{{$con->rowId}}', function (e) {
                    var qty = $('#qty{{ $con->id }}').val();
                    $.get(url + '/update-cart-item/' + '{{ $con->rowId }}'+'/'+qty,function (data) {
                        var result = $.parseJSON(data);
                        if (result['cartError'] == "yes"){
                            toastr.warning(result['cartErrorMessage']);
                        }else{
                            toastr.success('Cart Updated Successfully.');
                            $('#cartShow').empty();
                            $('#cartShow').append(result['cartShow']);
                            $('#cartFullView').empty();
                            var div = document.getElementById('cartFullView');
                            div.innerHTML = result['fullShow'];
                        }
                    });
                });

            });
        </script>

    @endforeach

@endsection
