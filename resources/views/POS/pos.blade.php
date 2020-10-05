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
                    <a href="#">About</a>
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
            // //Pay Model
            // $('#payBtn').on('click', function() {
            //     $('#posSubPay').toggleClass('block');
            //     $('#fadeBgPay').toggleClass('block');

            // });
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
            var voucherId = 0;



            //Get Voucher index
            $.get("voucherid", function(data, status){
                     voucherId = data;
                     voucherId++;
            });
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

            $('#addVoucherBtn').click(function(event){

                $('#posSubVoucher').removeClass('block');
                $('#fadeBgVoucher').removeClass('block');
                voucherId++;
                event.preventDefault();
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

                        cell4.innerHTML = '<input type="text" value="1" class="table-qty"/>';
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


            $('#payBtn').click(function(){

                let items = JSON.stringify(arr);
                let vou = JSON.stringify(voucher)
                let customer = cus;
                let staff = emp;
                let tot = total;
                let disc = discount;
                let _token   = $('meta[name="csrf-token"]').attr('content');

                $("tr").remove(".item-table-row");
                        updateStats();
                        arr.splice(0,arr.length);
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

            });




            $(document).ready(function() {
                $('.mdb-select').materialSelect();


            });

        });
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
        var num = 0;
        var del = 0;
        var arr = [];
        var size = [];
        var color = [];
        var voucher = [];
        var distColors;
        var distSize;
        var seledSize;
        var cus;
        var emp;
        var qty,discount,price,total;
        function showSize() {
            $("#selectSize").show();
            $("button").remove(".varSize");
            for (i = 0; i < distSize.length; i++) {
                var btn = document.createElement("BUTTON");
                btn.innerHTML = distSize[i];
                btn.className = "var-btn varSize";
                document.getElementById("sizeContent").appendChild(btn);
            }
        }

        function showColor() {
            $("#selectColour").show();
            $("button").remove(".varColor");
            for (i = 0; i < distColors.length; i++) {

                var btn = document.createElement("BUTTON");
                btn.innerHTML = distColors[i];
                btn.className = "var-btn varColor";
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

        function addProducts(id) {

            size.splice(0, size.length);
            color.splice(0, color.length);

            var variant = <?php echo json_encode($var); ?>;
            variant.forEach(variantFunction);


            function variantFunction(index, value, array) {

                if (array[value]['product_id'] == id) {
                    size.push(array[value]['size']);
                    color.push(array[value]['color']);
                }
            }
            distSize = [...new Set(size)];
            distColors = [...new Set(color)];

            if (distSize.length > 0 && distSize != "") {
                showSize();
            } else if (distColors.length > 0 && distColors != "") {
                showColor();
            }else{
                addProductsRow(id);
            }
            $(".varColor").click(function() {
                    var selectedColor = $(this).html();
                    $("#selectColour").hide();
                    addProductsRow(id, null, selectedColor);
            });

            $(".varSize").click(function() {
                selectedSize = $(this).html();
                var availableColors = [];
                $("#selectSize").hide();
                variant.forEach(function(index, value, array) {
                    if (array[value]['product_id'] == id && array[value]['size'] == selectedSize) {
                        availableColors.push(array[value]['color']);
                    }
                });

                if (availableColors.length > 0 && availableColors != "") {
                    distColors = [...new Set(availableColors)];
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

                                arr[selectedProducts.rows[i].cells[9].innerHTML][5] = qty;
                                arr[selectedProducts.rows[i].cells[9].innerHTML][2] = discount;
                                arr[selectedProducts.rows[i].cells[9].innerHTML][1] = price - discount;
                                check = true;
                                console.log(arr);
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
                        arr.push([array[value]['id'],price-discount,array[value]['discount'],size,color,1,array[value]['pcode']]);
                        console.log(arr);

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

                                arr[table.rows[i].cells[9].innerHTML][5] = qty;
                                arr[table.rows[i].cells[9].innerHTML][2] = discount;
                                arr[table.rows[i].cells[9].innerHTML][1] = price - discount;
                        }
                });
                        console.log(arr);
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
                    console.log(voucher);
                }else{
                    var pid = table.rows[i].cells[1].innerHTML

                    arr[table.rows[i].cells[9].innerHTML][2] = discount;
                    arr[table.rows[i].cells[9].innerHTML][1] = price - discount;
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
                    arr.splice(delrow,1);
                }
                $(this).closest('tr').remove();
                var x = table.rows.length;
                num = 0;
                updateStats();
                for(i=1; i<x;i++){
                    table.rows[i].cells[0].innerHTML = ++num;
                    table.rows[i].cells[9].innerHTML = num-1;
                    console.log(table.rows[i].cells[9].innerHTML);
                }
});
    </script>
</body>

</html>
