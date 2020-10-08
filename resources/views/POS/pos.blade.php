<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700,400&display=swap" rel="stylesheet">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"> --}}
    <link type="text/css" href="{{ asset('vendor/OverlayScrollbars/css/OverlayScrollbars.css') }}" rel="stylesheet" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="{{ asset('icons/css/all.css')}}" rel="stylesheet">
    <link href="{{ asset('css/sample.css')}}" rel="stylesheet">
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/DataTables/datatables.min.css" />
    <script type="text/javascript" src="{{ asset('vendor/OverlayScrollbars/js/OverlayScrollbars.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
</head>

<body class="pos-terminal">

    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">

            <ul class="list-unstyled components">

                <li class="pos-nav-li">
                    <a href="#" id="addexpense">Add Expense</a>
                </li>
                <li class="pos-nav-li">
                    <a href="#">Mark Attendance</a>
                </li>
                <li class="pos-nav-li">
                    <a href="#" id="addService">Add Service</a>
                </li>
                <li class="pos-nav-li">
                    <a href="#">About</a>
                </li>


            </ul>

        </nav>
        <!-- Page Content -->
        <div id="content">

            <header>
                <div class="header pos-header">
                    <div class="header-content">


                        <button type="button" id="sidebarCollapse" class="btn-nav">
                            <i class="fas fa-align-left"></i>
                        </button>


                        <div class="header-store">Leatherline</div>
                        <div class="header-time">
                            <livewire:time />
                        </div>
                        <div class="header-user pos-header-user">
                            <i class="fas fa-user-circle header-icon"></i> Rishard Akram
                        </div>
                    </div>
                </div>
            </header>


            <div class="pos">

                <livewire:product-dropdown />

            </div>



        </div>
    </div>


    @livewireScripts
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            OverlayScrollbars(document.querySelectorAll(".product-overlay"), {});
        });

        $(document).ready(function() {
            // Search Salesman
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".dropdown-menu li").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            // Search Products
            $("#prdSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".dropdown-menu tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            //Search Customers
            $("#cusSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".dropdown-menu li").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // $(document).on("keyup",function(){
            //     $('#prdSearch').focus();
            //     $("#prdSearch").attr("aria-expanded","true");
            //     $('.dropdown-menu').addClass('show');
            // })

        });
    </script>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
   <script>
        $(document).ready(function() {

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
            //Expense Model
            $('#addexpense').on('click', function() {
                $('#posSubExpense').toggleClass('block');
                $('#fadeBg').toggleClass('block');
                $('#sidebar').removeClass('active');
            });
            $('#closeBtn').on('click', function() {
                $('#posSubExpense').removeClass('block');
                $('#fadeBg').removeClass('block');

            });
            //Pay Model
            $('#payBtn').on('click', function() {
                var t = $('#amnt-total').html(total);

                $('#posSubPay').toggleClass('block');
                $('#fadeBgPay').toggleClass('block');



            });
            $('#amnt-tend').on('keyup',function(){
                   calculateBalance();
            });

            function calculateBalance(){
                var amountTend = $('#amnt-tend').val();
                    var t = $('#amnt-total').html();
                    var balance = amountTend - t;
                    $('#balance').html(balance);
            }

            $('#closeBtnSize').on('click', function() {
                $('#selectSize').hide();
            });
            $('#closeBtnColor').on('click', function() {
                $('#selectColour').hide();
            });
            $('#closeBtnPay').on('click', function() {
                $('#posSubPay').removeClass('block');
                $('#fadeBgPay').removeClass('block');

            });

            //Service model

            $('#addService').on('click', function() {
                $('#posSubService').toggleClass('block');
                $('#fadeBgService').toggleClass('block');
                $('#sidebar').removeClass('active');
                $('#serviceId').val(serviceId);
            });
            $('#closeBtnService').on('click', function() {
                $('#posSubService').removeClass('block');
                $('#fadeBgService').removeClass('block');

            });

            var voucherId = 1000;



            //Get Voucher index
            $.get("voucherid", function(data, status){
                     voucherId = data;
                     voucherId++;
            });

            // $.get("serviceid", function(data, status){
            //         console.log(data);
            //          serviceId = data;
            //          serviceId++;
            // });


            //Voucher Model
             $('#voucher').on('click', function() {

                $('#vou_id').val(voucherId);
                $('#vou_amount').val("");
                $('#posSubVoucher').toggleClass('block');
                $('#fadeBgVoucher').toggleClass('block');
            });
            $('#closeBtnVoucher').on('click', function() {
                $('#posSubVoucher').removeClass('block');
                $('#fadeBgVoucher').removeClass('block');

            });

            $(".discount-plus").click(function() {
                    $('.pos-discount').toggle();
                    $('#discountBg').toggle();
                    applyDiscount();
            });

            $(".pos-discount").click(function(){

                if($("#percentage").is(':checked')){
                        $("#amount").hide();
                        $("#percents").show();
                }else{
                        $("#percents").hide();
                          $("#amount").show();
                }
            })
            // $(".pos-discount").focusout(function() {
            //         $('.pos-discount').hide();
            // });
            $('#discountBg').click(function(){
                $('.pos-discount').hide();
                $('#discountBg').hide();

                applyDiscount();

            });

            $(document).ready(function(){




                $("#productSearchTable tr").click(function(){
                    var table = document.getElementById("productSearchTable");
                    var i = $(this).index();
                    var pid = table.rows[i].cells[4].innerHTML;
                    var qty = table.rows[i].cells[2].innerHTML;
                    addProducts(pid,qty);
                });
            });
            // function productDropdown(product){
            //     var table = document.getElementById("productSearchTable");
            //     console.log(product);
            //     product.forEach(function(index, value, array){
            //             var row = table.insertRow();
            //             // row.onclick = addProducts(array[value]['id']);
            //             // row.className = 'item-table-row';
            //             var cell1 = row.insertCell(0);
            //             cell1.className = "pr-code";
            //             var cell2 = row.insertCell(1);
            //             cell2.className = "pr-name";
            //             var cell3 = row.insertCell(2);
            //             cell3.className = "pr-qty";
            //             var cell4 = row.insertCell(3);
            //             cell4.className = "pr-price";
            //             var cell5 = row.insertCell(4);
            //             cell5.className = "none";

            //             cell1.innerHTML = array[value]['pcode'];
            //             cell2.innerHTML = array[value]['name'];
            //             cell3.innerHTML = array[value]['Qty'];
            //             cell4.innerHTML = "Rs." + array[value]['sellingPrice'];
            //             cell5.innerHTML = array[value]['id'];


            //     });
            // }
            // add Voucher
            $('#addVoucherBtn').click(function(){

                if($('#vou_id').val().length == 0){
                    alert("Please enter an id");
                }else if($('#vou_amount').val().length == 0){
                    alert("Please enter an amount");
                }else if($('#vou_exp').val().length == 0){
                    alert("Please select an expiry date");
                }else{

                $('#posSubVoucher').removeClass('block');
                $('#fadeBgVoucher').removeClass('block');
                voucherId++;

                var table = document.getElementById("selectedProducts");

                var row = selectedProducts.insertRow();
                        row.className = 'item-table-row';
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        var cell4 = row.insertCell(3);
                        var cell5 = row.insertCell(4);
                        var cell6 = row.insertCell(5);
                        var cell7 = row.insertCell(6);
                        var cell8 = row.insertCell(7);
                        var cell9 = row.insertCell(8);
                        var cell10 = row.insertCell(9);
                        var cell11 = row.insertCell(10);
                        var index = num;
                        var id = $('#vou_id').val();
                        var price = $('#vou_amount').val();
                        var exp = $('#vou_exp').val()
                        var discount = 0;
                        cell1.innerHTML = ++num;
                        cell2.innerHTML = $('#vou_id').val();
                        cell3.innerHTML = 'Voucher' ;
                        cell4.innerHTML = '<input type="text" value="1" class="table-qty" disabled/>';
                        cell5.innerHTML = price;
                        cell6.innerHTML = '<input type="text" value="'+discount+'" class="table-discount"/>';
                        cell7.innerHTML = price - discount;
                        cell8.innerHTML = size;
                        cell8.className = 'none';
                        cell9.innerHTML = color;
                        cell9.className = 'none';
                        cell10.innerHTML = '';
                        cell10.className = 'none';
                        cell11.innerHTML = '<i class="fas fa-times cancel" id="remove"></i>';
                        // arr.push([array[value]['id'],price-discount,array[value]['discount'],size,color,1]);
                        // console.log(arr);
                        voucher.push([id,price,exp,0]);
                        console.log(voucher);
                        updateStats();
                }
            });




            $("#exchange").click(function(){
            var table = document.getElementById("selectedProducts");
            var x = table.rows.length;

            for(i=1;i<x;i++){

                var price = 0 - parseInt(table.rows[i].cells[4].innerHTML);
                table.rows[i].cells[4].innerHTML = price;
                var total = 0 - parseInt(table.rows[i].cells[6].innerHTML);
                table.rows[i].cells[6].innerHTML = total;
                arr[table.rows[i].cells[9].innerHTML][1] = total;

            }

            updateStats();
        });


            $('#payBtn1').click(function(){

                if($('#adds').is(":visible")){
                    alert("Please select a Salesman")
                }else{

                let items = JSON.stringify(arr);
                let vou = JSON.stringify(voucher)
                let customer = cus;
                let staff = emp;
                let tot = total;
                let disc = discount;
                let _token   = $('meta[name="csrf-token"]').attr('content');
                updateProductSearchQuantity(items);
                $("tr").remove(".item-table-row");
                        updateStats();
                        arr.splice(0,arr.length);
                        voucher.splice(0,voucher.length);
                        num = 0;
                        $('#adds').show();
                        $('#emp').hide();
                        $('#addc').show();
                        $('#cus').hide();
                        cus = 0;
                        emp = 0;

                $.ajax({
                    url:"/pos",
                    type:"POST",
                    data:{
                        item : items,
                        customer:customer,
                        staff:staff,
                        total:tot,
                        discount:disc,
                        voucher:vou,
                        _token:_token
                    },
                    success:function(response){

                    },
                });


            //Get Voucher index
            $.get("voucherid", function(data, status){
                     voucherId = data;
                     voucherId++;
            });
            // var d;
            // $.get("posproduct", function(data, status){
            //     updateProductSearchQuantity(data);
            // });

            }

            });

            $('#posSearch').submit(function(e){
                e.preventDefault();
                var barcode = $('#prdSearch').val();
                barcode = barcode.replace("#", '');
                var id;
                var product = <?php echo json_encode($prd); ?>;
                product.forEach(function(index,value,array){

                    if (array[value]['barcode'] == barcode) {
                        id = array[value]['id'];
                    }

                });

                addProducts(id);
                $("#prdSearch").attr("aria-expanded","false");
                $('.dropdown-menu').removeClass('show');
                $("#prdSearch").val('');


            })




            $(document).ready(function() {
                $('.mdb-select').materialSelect();


            });

        });

        function updateProductSearchQuantity(data){

            var table = document.getElementById("productSearchTable");
            var x = table.rows.length;

            var temp = JSON.parse(data);
            temp.forEach(function(index,value,array){
                // console.log(array[value][0]);
                var i;
                for(i =0; i < x; i++){
                    if(table.rows[i].cells[4].innerHTML == array[value][0]){

                        var q = table.rows[i].cells[2].innerHTML;
                        table.rows[i].cells[2].innerHTML = q - array[value][5];
                    }
                }



            });

        }
        function applyDiscount(){
            if($("#percentage").is(':checked')){

        if($('#percentageDisc').val() != "" && $('#percentageDisc').val() > 0  ){
            var subtotal = $('#subtotal').html().slice(3);
            discount = $('#percentageDisc').val();
            discount = (subtotal*discount)/100;
            total = subtotal - discount;

            discount = Math.abs(discount);
            //Set Discount Value
            $('#discount').html('Rs.'+discount);
            $('#total').html('Rs.'+total);
            $('#paytotal').html('Rs.'+total);

        }
        }else{

        if($('#discamnt').val() != "" && $('#discamnt').val() > 0  ){
            var subtotal = $('#subtotal').html().slice(3);
            discount = $('#discamnt').val();
            if(subtotal < 0){
                total = parseInt(subtotal)  + parseInt(discount) ;
            }else{
                total = subtotal - discount;
            }

            //Set Discount Value
            $('#discount').html('Rs.'+discount);
            if(total<0 && subtotal > 0){
                $('#total').html('Rs.'+0);
                $('#paytotal').html('Rs.'+0);
                total = 0;
            }else{
                $('#total').html('Rs.'+total);
                $('#paytotal').html('Rs.'+total);
            }
        }
            }
        }
        function addCustomers(id){
                cus = id;
                var customer = <?php echo json_encode($cust); ?>;
                customer.forEach(function(index, value, array){

                    if (array[value]['id'] == id) {
                        $('#addc').hide();
                        $('#cus').show();
                        $('#cid').html(array[value]['phone']);
                        $('#cname').html(array[value]['firstname']+' '+array[value]['lastname']);
                    }
                });
        }
        function addEmployee(id){
                emp = id;
                var employee = <?php echo json_encode($emp); ?>;
                employee.forEach(function(index, value, array){

                    if (array[value]['id'] == id) {
                        $('#adds').hide();
                        $('#emp').show();
                        $('#sid').html(array[value]['id']);
                        $('#sname').html(array[value]['fname']+' '+array[value]['lname']);
                    }
                });
        }

        function addServiceCustomer(id){

                serviceCus = id;
                var customer = <?php echo json_encode($cust); ?>;
                customer.forEach(function(index, value, array){

                    if (array[value]['id'] == id) {
                        $('#serviceCustomer').val(array[value]['firstname']+' '+array[value]['lastname']);
                    }
                });
        }

        function addService(){

                if($('#serviceCustomer').val().length == 0){
                    alert("Please select a Customer");
                }else if($('#serviceCost').val().length == 0){
                    alert("Please enter a Cost");
                }else  if($('#serviceDescription').val().length == 0){
                    alert("Please enter a Description");
                }else{



                $('#posSubService').removeClass('block');
                $('#fadeBgService').removeClass('block');


                let id = $('#serviceId').val();
                let customer_id = serviceCus;
                let return_date = $('#serviceReturn').val();
                let description = $('#serviceDescription').val();
                let cost = $('#serviceCost').val();
                let user = 22;
                let _token   = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url:"/service",
                    type:"POST",
                    data:{
                        id : id,
                        customer_id:customer_id,
                        return_date:return_date,
                        service_description:description,
                        cost:cost,
                        user_id:user,
                        _token:_token
                    },
                    success:function(response){

                    },
                });

                $('#serviceId').val('');
                $('#serviceDescription').val('');
                $('#serviceCustomer').val('');
                $('#serviceCost').val('');
                serviceId++;
                serviceCus = '';
                }
        }

        var num = 0;
        var del = 0;
        var arr = [];
        var size = [];
        var disSize = [];
        var disColor = [];
        var color = [];
        var voucher = [];
        var distColors;
        var disabledSize;
        var disabledColor;
        var distSize;
        var seledSize;
        var cus;
        var emp;
        var serviceCus;
        var serviceId = {{$serviceId}};
        var qty,discount,price,total;

        function showSize() {
            $("#selectSize").show();
            $("button").remove(".varSize");
            // Displays Sizes that have qty > 0
            for (i = 0; i < distSize.length; i++) {
                var btn = document.createElement("BUTTON");
                btn.innerHTML = distSize[i];
                btn.className = "var-btn varSize";
                document.getElementById("sizeContent").appendChild(btn);
            }
            // Removes the sizes which have different quantities for fidferent colors from the disabled array
            var j;
            for(i = 0; i < disSize.length; i++){
                for(j = 0; j<disabledSize.length;j++){
                    if(disSize[i] == disabledSize[j]){
                        disabledSize.splice(j,1);
                    }
                }
            }
            // Displays sizes whose qty = 0
            for (i = 0; i < disabledSize.length; i++) {
                var btn = document.createElement("BUTTON");
                btn.innerHTML = disabledSize[i];
                btn.disabled = true;
                btn.className = "var-btn varSize var-disabled";
                document.getElementById("sizeContent").appendChild(btn);
            }

        }

        function showColor() {
            $("#selectColour").show();
            $("button").remove(".varColor");
            for (i = 0; i < distColors.length; i++) {
                var btn = document.createElement("BUTTON");
                btn.innerHTML = distColors[i];
                btn.className = "var-btn varColor ";
                document.getElementById("colorContent").appendChild(btn);
            }


            for (i = 0; i < disabledColor.length; i++) {
                var btn = document.createElement("BUTTON");
                btn.innerHTML = disabledColor[i];
                btn.disabled = true;
                btn.className = "var-btn varColor var-disabled";
                document.getElementById("colorContent").appendChild(btn);
            }


        }



        function updateStats(){
            var table = document.getElementById("selectedProducts");
            var x = table.rows.length;
            qty = 0,discount = 0,price = 0,total = 0;
            for(i=1;i<x;i++){
                qty = qty +  parseInt($(table.rows[i].cells[3]).find('.table-qty').val());
                discount = discount + parseInt($(table.rows[i].cells[5]).find('.table-discount').val());
                price = price + parseInt(table.rows[i].cells[4].innerHTML);
            }
            if(price > 0)
                total = price - discount;
            else
                total = price + discount;

            $('#nitems').html(qty);
            $('#discount').html('Rs.'+discount);
            $('#subtotal').html('Rs.'+price);
            $('#total').html('Rs.'+ total);
            $('#paytotal').html('Rs.'+ total);
        }

        function addProducts(id,qty) {

            // var qty = 10;
            // console.log($(this).parent().index());

            if(qty==0){
                alert("Product is out of stock");
            }else{

            size.splice(0, size.length);
            color.splice(0, color.length);
            disSize.splice(0,disSize.length);
            disColor.splice(0,disColor.length);

            var variant = <?php echo json_encode($var); ?>;
            variant.forEach(variantFunction);


            function variantFunction(index, value, array) {

                if (array[value]['product_id'] == id) {
                    if(array[value]['quantity'] != 0){
                        size.push(array[value]['size']);
                        color.push(array[value]['color']);
                    }else{
                        disSize.push(array[value]['size']);
                        disColor.push(array[value]['color']);
                    }
                }
            }
            distSize = [...new Set(size)];
            distColors = [...new Set(color)];
            disabledSize = [...new Set(disSize)];
            disabledColor = [...new Set(disColor)];


            if (distSize.length > 0 && distSize != ""  || disSize.length > 0 && disabledSize != "") {
                showSize();
            } else if (distColors.length > 0 && distColors != "" || disColor.length > 0 && disColor != "") {
                showColor();
            }else{
                addProductsRow(id);
            }
        }
            $(".varColor").click(function() {
                    var selectedColor = $(this).html();
                    $("#selectColour").hide();
                    addProductsRow(id, null, selectedColor);
            });

            $(".varSize").click(function() {
                selectedSize = $(this).html();
                var availableColors = [];
                disColor.splice(0,disColor.length);
                $("#selectSize").hide();
                variant.forEach(function(index, value, array) {
                    if (array[value]['product_id'] == id && array[value]['size'] == selectedSize) {
                        if(array[value]['quantity'] > 0){
                            availableColors.push(array[value]['color']);
                        }else{
                            disColor.push(array[value]['color']);
                        }

                    }
                });

                if (availableColors.length > 0 && availableColors != "") {
                    distColors = [...new Set(availableColors)];
                    disabledColor = [...new Set(disColor)];
                    showColor();
                } else {
                    addProductsRow(id, selectedSize);
                }

                $(".varColor").click(function() {
                    var selectedColor = $(this).html();
                    $("#selectColour").hide();
                    addProductsRow(id, selectedSize, selectedColor);

                });
            });
        }

        function addProductsRow(id, size, color) {

            var product = <?php echo json_encode($prd); ?>;
            product.forEach(myFunction);

            function myFunction(index, value, array) {

                var selectedProducts = document.getElementById("selectedProducts");
                var x = selectedProducts.rows.length;
                var check = false;

                if (array[value]['id'] == id) {


                    for (i = 1; i < x; i++) {

                        if (array[value]['pcode'] == selectedProducts.rows[i].cells[1].innerHTML) {

                            if(size == selectedProducts.rows[i].cells[7].innerHTML || size == null){
                               if( color == selectedProducts.rows[i].cells[8].innerHTML || color == null ){
                                var qty = $(selectedProducts.rows[i].cells[3]).find('.table-qty').val();
                                qty = parseInt(qty) + 1;
                                $(selectedProducts.rows[i].cells[3]).find('.table-qty').val(qty);
                                var price = array[value]['sellingPrice'];
                                price = parseInt(price) * qty;
                                selectedProducts.rows[i].cells[4].innerHTML = price;
                                var discount = array[value]['discount'];
                                discount = parseInt(discount) * qty;
                                $(selectedProducts.rows[i].cells[5]).find('.table-discount').val(discount);
                                selectedProducts.rows[i].cells[6].innerHTML = price - discount;

                                var pid = selectedProducts.rows[i].cells[11].innerHTML;
                                var s = selectedProducts.rows[i].cells[7].innerHTML;
                                var c = selectedProducts.rows[i].cells[8].innerHTML;
                                var j;

                                for(j = 0; j < arr.length ; j++){
                                    if(c === 'undefined' && s === 'undefined'){
                                        if(arr[j][0] == pid){
                                            arr[j][5] = qty;
                                            arr[j][2] = discount;
                                            arr[j][1] = price - discount;
                                        }
                                    }else if(c.length == 0 && s.length == 0){
                                        if(arr[j][0] == pid && arr[j][3] == s && arr[j][4] === c){
                                            arr[j][5] = qty;
                                            arr[j][2] = discount;
                                            arr[j][1] = price - discount;
                                        }

                                    }else if(s.length > 0){
                                        if(arr[j][0] == pid && arr[j][3] == s ){
                                            arr[j][5] = qty;
                                            arr[j][2] = discount;
                                            arr[j][1] = price - discount;
                                        }
                                    }else if(c.length > 0){
                                        if(arr[j][0] == pid && arr[j][4] === c){
                                            arr[j][5] = qty;
                                            arr[j][2] = discount;
                                            arr[j][1] = price - discount;
                                        }
                                    }

                                }

                                check = true;

                               }
                            }

                        }

                    }

                    if (check == false) {

                        var row = selectedProducts.insertRow();
                        row.className = 'item-table-row';
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        var cell4 = row.insertCell(3);
                        var cell5 = row.insertCell(4);
                        var cell6 = row.insertCell(5);
                        var cell7 = row.insertCell(6);
                        var cell8 = row.insertCell(7);
                        var cell9 = row.insertCell(8);
                        var cell10 = row.insertCell(9);
                        var cell11 = row.insertCell(10);
                        var cell12 = row.insertCell(11);
                        var index = num;
                        var price = array[value]['sellingPrice'];
                        var discount = array[value]['discount'];
                        cell1.innerHTML = ++num;
                        cell2.innerHTML = array[value]['pcode'];

                        if(size != null && color != null){
                            cell3.innerHTML = array[value]['name'] + '<div class="size">'+size+'/'+color+'</div>';
                        }else if(size != null){
                            cell3.innerHTML = array[value]['name'] + '<div class="size">'+size+'</div>' ;
                        }else if(color != null){
                            cell3.innerHTML = array[value]['name'] + '<div class="size">'+color+'</div>' ;
                        }else{
                            cell3.innerHTML = array[value]['name'] ;
                        }
                        cell4.innerHTML = '<input type="text" value="1" class="table-qty"/>';
                        cell5.innerHTML = array[value]['sellingPrice'];
                        cell6.innerHTML = '<input type="text" value="'+array[value]['discount']+'" class="table-discount"/>';
                        cell7.innerHTML = price - discount;
                        cell8.innerHTML = size;
                        cell8.className = 'none';
                        cell9.innerHTML = color;
                        cell9.className = 'none';
                        cell10.innerHTML = index;
                        cell10.className = 'none';
                        cell11.innerHTML = '<i class="fas fa-times cancel" id="remove"></i>';
                        cell12.innerHTML = array[value]['id'];
                        cell12.className = 'none';
                        arr.push([array[value]['id'],price-discount,array[value]['discount'],size,color,1]);


                    }
                    updateStats();
                }
            }
        }
        $("#selectedProducts").on('change','.table-qty',function() {
                var table = document.getElementById("selectedProducts");
                var qty = $(this).val();
                var i = $(this).parent().parent().index();
                var product = <?php echo json_encode($prd); ?>;
                product.forEach(function(index,value,array){
                        if (array[value]['pcode'] == table.rows[i].cells[1].innerHTML){
                             var price = array[value]['sellingPrice'];
                                price = parseInt(price) * qty;
                                table.rows[i].cells[4].innerHTML = price;
                                var discount = array[value]['discount'];
                                discount = parseInt(discount) * qty;
                                $(table.rows[i].cells[5]).find('.table-discount').val(discount);
                                table.rows[i].cells[6].innerHTML = price - discount;

                                var pid = table.rows[i].cells[11].innerHTML;
                                var s = table.rows[i].cells[7].innerHTML;
                                var c = table.rows[i].cells[8].innerHTML;
                                var j;

                                for(j = 0; j < arr.length ; j++){
                                    if(c === 'undefined' && s === 'undefined'){
                                        if(arr[j][0] == pid){
                                            arr[j][5] = qty;
                                            arr[j][2] = discount;
                                            arr[j][1] = price - discount;
                                        }
                                    }else if(c.length == 0 && s.length == 0){
                                        if(arr[j][0] == pid && arr[j][3] == s && arr[j][4] === c){
                                            arr[j][5] = qty;
                                            arr[j][2] = discount;
                                            arr[j][1] = price - discount;
                                        }

                                    }else if(s.length > 0){
                                        if(arr[j][0] == pid && arr[j][3] == s ){
                                            arr[j][5] = qty;
                                            arr[j][2] = discount;
                                            arr[j][1] = price - discount;
                                        }
                                    }else if(c.length > 0){
                                        if(arr[j][0] == pid && arr[j][4] === c){
                                            arr[j][5] = qty;
                                            arr[j][2] = discount;
                                            arr[j][1] = price - discount;
                                        }
                                    }

                                }



                        }
                });

                        updateStats();
            });

            $("#selectedProducts").on('change','.table-discount',function() {
                var table = document.getElementById("selectedProducts");
                var discount = $(this).val();
                var i = $(this).parent().parent().index();

                var price = table.rows[i].cells[4].innerHTML;
                table.rows[i].cells[6].innerHTML = price - discount;

                if(table.rows[i].cells[2].innerHTML === "Voucher"){
                    var voucherId = table.rows[i].cells[1].innerHTML;
                    var j;
                    for(j = 0; j < voucher.length ; j++){
                        if(voucher[j][0] == voucherId){
                             voucher[j][3] = discount;
                        }
                    }

                }else{


                    var pid = table.rows[i].cells[11].innerHTML;
                    var s = table.rows[i].cells[7].innerHTML;
                    var c = table.rows[i].cells[8].innerHTML;
                    var j;

                    for(j = 0; j < arr.length ; j++){
                        if(c === 'undefined' && s === 'undefined'){
                            if(arr[j][0] == pid){
                                arr[j][2] = discount;
                                arr[j][1] = price - discount;
                            }
                        }else if(c.length == 0 && s.length == 0){
                            if(arr[j][0] == pid && arr[j][3] == s && arr[j][4] === c){
                                arr[j][2] = discount;
                                arr[j][1] = price - discount;
                            }

                        }else if(s.length > 0){
                            if(arr[j][0] == pid && arr[j][3] == s ){
                                arr[j][2] = discount;
                                arr[j][1] = price - discount;
                            }
                        }else if(c.length > 0){
                            if(arr[j][0] == pid && arr[j][4] === c){
                                arr[j][2] = discount;
                                arr[j][1] = price - discount;
                            }
                        }

                    }
                }

                updateStats();
            });
        $('#selectedProducts').on('click', '#remove', function(e){

                var index = $(this).closest('tr').index();
                var table = document.getElementById("selectedProducts");
                var delrow = table.rows[index].cells[9].innerHTML;

                if(table.rows[index].cells[2].innerHTML === "Voucher"){
                    var voucherId = table.rows[index].cells[1].innerHTML;
                    var i;
                    for(i = 0; i < voucher.length ; i++){
                        if(voucher[i][0] == voucherId){
                             voucher.splice(i,1);
                        }
                    }
                }else{

                    var pid = table.rows[index].cells[11].innerHTML;
                    var s = table.rows[index].cells[7].innerHTML;
                    var c = table.rows[index].cells[8].innerHTML;
                    var i;


                    for(i = 0; i < arr.length ; i++){
                        if(c === 'undefined' && s === 'undefined'){
                            console.log("1");
                            if(arr[i][0] == pid){
                                arr.splice(i,1);}
                        }else if(c.length == 0 && s.length == 0){
                            console.log("2");
                            if(arr[i][0] == pid && arr[i][3] == s && arr[i][4] === c)
                                arr.splice(i,1);
                        }else if(s.length > 0){
                            if(arr[i][0] == pid && arr[i][3] == s )
                                arr.splice(i,1);
                        }else if(c.length > 0){
                            if(arr[i][0] == pid && arr[i][4] === c)
                                arr.splice(i,1);
                        }
                    }
                    // arr.splice(delrow,1);
                }
                $(this).closest('tr').remove();
               var x = table.rows.length;
                num = 0;
                updateStats();
                for(i=1; i<x;i++){
                    table.rows[i].cells[0].innerHTML = ++num;
                    table.rows[i].cells[9].innerHTML = num-1;
                }
});
//pay Model

$('#cardbtn').click(function(){
    $('#cardOptions').toggle();
    $('#voucherOptions').hide();
    $('#splitOptions').hide();
    $('.pay-model-btn').toggle();
    $('#cardOptions2').hide();
    $('#voucherOptions2').hide();
    $('#cardOptions1').hide();
    $('#voucherOptions1').hide();
})
$('#voucherbtn').click(function(){
    $('#cardOptions').hide();
    $('#voucherOptions').toggle();
    $('#splitOptions').hide();
    $('.pay-model-btn').toggle();
    $('#cardOptions2').hide();
    $('#voucherOptions2').hide();
    $('#cardOptions1').hide();
    $('#voucherOptions1').hide();
})
$('#loyaltybtn').click(function(){
    $('#pay-col').addClass('col-md-8');
    $('.pos-pay').addClass('pos-loyalty-width');
    $('.pay-customer').show();
    $('#loyaltyOptions').toggle();
    $('#loyaltyOptions .pay-model-btn').toggle();
})

$('#splitbtn').click(function(){
    // $('#cardOptions').hide();
    $('#splitOptions').toggle();
    $('#voucherOptions').hide();
    $('#cardOptions').hide();
    $('#cardOptions2').hide();
    $('#voucherOptions2').hide();
    $('#cardOptions1').hide();
    $('#voucherOptions1').hide();
    $('.pay-model-btn').toggle();
})


$('#pay-method1').click(function(){
    if($("#pay-method1 #cash").is(':selected')){
        $('#cardOptions1').hide();
        $('#voucherOptions1').hide();
    }
    if($("#pay-method1 #card").is(':selected')){
        $('#voucherOptions1').hide();
        $('#cardOptions1').show();
    }
    if($("#pay-method1 #voucherSelect").is(':selected')){
        $('#voucherOptions1').show();
        $('#cardOptions1').hide();
    }
})
$('#pay-method2').click(function(){
    if($("#pay-method2 #cash").is(':selected')){
        $('#cardOptions2').hide();
        $('#voucherOptions2').hide();
    }
    if($("#pay-method2 #card").is(':selected')){
        $('#cardOptions2').show();
        $('#voucherOptions2').hide();
    }
    if($("#pay-method2 #voucherSelect").is(':selected')){
        $('#cardOptions2').hide();
        $('#voucherOptions2').show();
    }
})
//setup before functions
let typingTimer;                //timer identifier
let doneTypingInterval = 1000;  //time in ms (5 seconds)
let myInput = document.getElementById('voucherCode');

//on keyup, start the countdown
myInput.addEventListener('keyup', () => {
    clearTimeout(typingTimer);
    if (myInput.value) {
        typingTimer = setTimeout(getAmount, doneTypingInterval);
    }
});

let cusMobile = document.getElementById('cusMobile');
cusMobile.addEventListener('keyup', () => {
    clearTimeout(typingTimer);
    if (cusMobile.value) {
        typingTimer = setTimeout(getCustomer, doneTypingInterval);
    }
});
//user is "finished typing," do something


function getAmount(){
    var vcode = $('#voucherCode').val();
    var url = "voucheramount/"+vcode;
    console.log(url);
    $('.load-spinner').show();
    $.get(url, function(data, status){

        if(data != -1){
            $('#voucherAmount').val(data);
            $('#amnt-tend').val(data);
            $('.load-spinner').hide();
            var amountTend = $('#amnt-tend').val();
            var t = $('#amnt-total').html();
            var balance = amountTend - t;
            $('#balance').html(balance);
        }else{
            alert("Voucher Expired!");
            $('.load-spinner').hide();
        }

    }).fail(function(err,status){
        $('#voucherAmount').val('Voucher not Found');
        $('.load-spinner').hide();
    });
}
function getCustomer(){
    var mobile = $('#cusMobile').val();
    var url = "customermobile/"+mobile;
    // console.log(url);
    $('.load-spinner-cus').show();
    $('.pay-customer').addClass('opacity4');
    $.get(url, function(data, status){

        if(data.length != 0){
            $('#fname').html(data[0]['firstname']);
            $('#lname').html(data[0]['lastname']);
            $('#mobile').html(data[0]['phone']);
            $('#city').html(data[0]['city']);
            $('.load-spinner-cus').hide();
            $('.pay-customer').removeClass('opacity4');
        }else{
            $('.load-spinner-cus').hide();
            $('.pay-customer').removeClass('opacity4');
            alert("Customer not found");
        }


        // if(data != -1){
        //     $('#voucherAmount').val(data);
        //     $('#amnt-tend').val(data);
        //     $('.load-spinner').hide();
        //     var amountTend = $('#amnt-tend').val();
        //     var t = $('#amnt-total').html();
        //     var balance = amountTend - t;
        //     $('#balance').html(balance);
        // }else{
        //     alert("Voucher Expired!");
        //     $('.load-spinner').hide();
        // }

    }).fail(function(err,status){
        $('.load-spinner-cus').hide();
        $('.pay-customer').removeClass('opacity4');
        alert("Customer not found");
    });
}

    </script>
</body>

</html>
