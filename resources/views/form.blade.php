@extends('main')
@section('screen')
    <div class="head">
        <a href="{{ route('product') }}">
        <button id="backBtn">
            <i class="fas fa-arrow-left"></i>
        </button></a>
        <h2> Add product </h2>
    </div>
    <br>
    <div id="display"> </div>
    <br>
    <form id="main-div" action="{{ route('createproduct') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="column">
            <div id="form1">
                <label for="title"> Title </label> <br>
                <input type="text" placeholder="Short sleeve t-shirt" id="title" name="title" value="{{ old('title')}} "/>
                <div id="titleErr" class="formErr"> @error('title') {{$message}} @enderror </div><br>
                <label for="description"> Description </label> <br>
                <textarea rows="10" style="resize: none;" id="description" name="description"> {{ old('description')}} </textarea>
                <div id="descriptionErr" class="formErr"> @error('description') {{$message}} @enderror </div>
            </div>
            <div id="form3">
                <p> Pricing </p>
                <div class="pricing-container">
                    <label for="price"> Price
                        <div class="value">
                            <i class="fas fa-rupee-sign"></i>
                            <input type="text" placeholder="0.00" id="price" name="price" value="{{ old('price')}} ">
                        </div>
                        <span id="priceErr" class="formErr"> @error('price') {{$message}} @enderror </span>
                    </label>
                    <label for="compare"> Compare at price
                        <div class="value">
                            <i class="fas fa-rupee-sign"></i>
                            <input type="text" placeholder="0.00" id="compare" name="compare_price" value="{{ old('compare_price')}} ">
                        </div>
                        <span id="com_priceErr" class="formErr"> @error('compare_price') {{$message}} @enderror </span>
                    </label>
                </div>
                <br>
                <hr> <br>
                <div class="calculation-container">
                    <label for="cost" style="width: 96%;"> Cost per item
                        <div class="value">
                            <i class="fas fa-rupee-sign"></i>
                            <input type="text" placeholder="0.00" id="cost" name="cost_price" value="{{ old('cost_price')}} ">
                        </div>
                    </label>
                    <div class="price-margin">
                        <div>
                            <p> Margin </p>
                            <span id="margin"> - </span>
                        </div>
                        <div>
                            <p> Profit </p>
                            <span id="profit"> - </span>
                        </div>
                    </div>
                </div>
                <span class="formErr"> @error('cost_price') {{$message}} @enderror </span>
                <br>
                <label for="charge">
                    <input type="checkbox" id="charge" value="1" name="charge_tax">
                    Charge tax on this product
                </label>
            </div>
            <input type="submit" value="Add" id="submit_pro" />
        </div>
        <br>
        <div class="column">
            <div action="" id="form2">
                <p> <small> SALES CHANNELS AND APPS </small></p>
                <p id="selector">Select all</p>
                <hr>
                <label for="store">
                    <input type="checkbox" class="messageCheck" value="Online Store" name="sale_channels[]" />
                    Online Store
                </label>
                <label for="schedule">
                    <p id="schedule"> Schedule availability </p>
                </label>
                <hr>
                <label for="sale">
                    <input type="checkbox" class="messageCheck" value="Point of Sale" name="sale_channels[]" />
                    Point of Sale
                </label>
                <hr>
                <label for="buy">
                    <input type="checkbox" class="messageCheck" value="Buy Button" name="sale_channels[]" />
                    Buy Button
                </label>
                <div id="channelErr" class="formErr"> @error('sale_channels') {{$message}} @enderror </div>
            </div>
            <div id="form4">
                <p class="form-head"> Organisation </p>
                <label for="vendor">
                    Vendor
                </label> <br>
                <div class="vendor">

                    <input type="text" class="input-vendor" value="" name="vendor" autocomplete="off" value="{{ old('vendor')}} "/>

                    <div class="dropdown1">
                        <p id="addDrop"> Add
                            <span id="newDrop"></span>
                        </p>
                        <p class="vendor_list"> Firefox </p>
                        <p class="vendor_list"> Chrome </p>
                        <p class="vendor_list"> Mozilla </p>
                        <p class="vendor_list"> Edge </p>
                        <p class="vendor_list"> Opera </p>
                        <p class="vendor_list"> Safari </p>
                    </div>
                </div>
                <div id="vendorErr" class="formErr"> @error('vendor') {{$message}} @enderror </div>
                <br>
                <label for="tags" class="input-head" style="font-weight: bold; font-size: 15px;"> TAGS </label> <br>
                <div id="tag">
                    <input type="text" id="tag-input" autocomplete="off">
                    <div id="dropdown">
                        <div id="add-btn"> Add
                            <span id="new"></span>
                        </div>
                        <p>
                            <input type="checkbox" value="Firefox" class="drop-check" name="tags[]" />
                            Firefox
                        </p>
                        <p>
                            <input type="checkbox" value="Chrome" class="drop-check" name="tags[]" />
                            Chrome
                        </p>
                        <p>
                            <input type="checkbox" value="Opera" class="drop-check" name="tags[]" />
                            Opera
                        </p>
                        <p>
                            <input type="checkbox" value="Safari" class="drop-check" name="tags[]" />
                            Safari
                        </p>
                        <p>
                            <input type="checkbox" value="Mozilla" class="drop-check" name="tags[]" />
                            Mozilla
                        </p>
                        <p>
                            <input type="checkbox" value="Edge" class="drop-check" name="tags[]" />
                            Edge
                        </p>
                    </div>
                    <div id="display-tag">
                    </div>
                </div>
                <div id="tagsErr" class="formErr"> @error('tags') {{$message}} @enderror </div>
            </div>
            <div id="form5">
                <h3> Upload image </h3>
                <span>
                    <input type="file" name="image" id="file" class="input_file">
                </span>
                <div id="imgErr" class="formErr"> @error('image') {{$message}} @enderror </div>
            </div>
        </div>
    </form>
    <div id="bgCalendar">
        <div id="popCalendar">
            <div> <span> Schedule Online Store availability </span> <span id="close"> <i class="fas fa-times"></i>
                </span> </div> <br>
            <input type="text" id="dateCalendar">
            <input type="text" id="timepcr" value="">
            <div id="picker"></div>
            <button id="Cancle_date"> Cancle </button>
            <button id="select_date"> Select </button>
        </div>
    </div>
    <script src="{{ asset('/javascript/demo.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            
            let dates = jQuery("#picker").datepicker({
                numberOfMonths: 2,
                altField: "#dateCalendar",
                altFormat: "dd-mm-yy",
                datwFormate: "dd-mm-yy",
            });

            let storageDate = localStorage.getItem("date");

            if (storageDate && storageDate !== " ") {
                $("#dateCalendar").val(storageDate);
                $("#schedule").css("display", "block")
                document.getElementById("store").checked = true;

                jQuery("#picker").datepicker("setDate", $.datepicker.parseDate("dd-mm-yy", storageDate));
            }

            $("#dateCalendar").on("keyup", function() {
                let val = $("#dateCalendar").val();
                if (val.length == 10) {
                    jQuery("#picker").datepicker("setDate", $.datepicker.parseDate("dd-mm-yy", val));
                }
            });

            jQuery("#schedule").on("click", function() {
                jQuery("#bgCalendar").css({
                    "visibility": "visible"
                });
            });

            jQuery("#close,#Cancle_date").on("click", function() {
                jQuery("#bgCalendar").css({
                    "visibility": "hidden"
                });
                localStorage.setItem("date", " ");
            });

            jQuery("#select_date").on("click", function() {
                let input_date = $("#dateCalendar").val();

                localStorage.setItem("date", input_date);
                jQuery("#bgCalendar").css({
                    "visibility": "hidden"
                });
            });
        });
    </script>
@endsection