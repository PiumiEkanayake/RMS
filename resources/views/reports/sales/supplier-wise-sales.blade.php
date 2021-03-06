@extends('layouts.main')
@section('content')

    <div class="pg-heading">
        <a href="{{ route('reports.index') }}">
            <i class="fa fa-arrow-left pg-back"></i>
        </a>
        <div class="pg-title">Supplier-wise Sales Report</div>
    </div>

    <div class="section">

        <div class="section-content">
            <form action="{{ route('reports.export-supplier-wise-sales') }}" target="_blank" method="POST">
                @csrf
                <input type="hidden" name="start_date" id="start_date">
                <input type="hidden" name="end_date" id="end_date">

                <table id="data_table" class="table table-striped table-borderless table-hover all-table">
                    <button type="submit" class="add-btn">Export Report</button>
                    <div class="float-right pr-3" style="padding-top: 8px;">
                        <h5 class="d-inline-block text-secondary" id="start_date_text"></h5>
                        <h5 class="d-inline-block text-secondary" id="to">&nbsp;to&nbsp;</h5>
                        <h5 class="d-inline-block text-secondary" id="end_date_text"></h5>
                    </div>

                    <thead class="table-head">
                        <tr>
                            <th>Supplier Name</th>
                            <th>Company</th>
                            <th>Quantity Sold</th>
                            <th>Total Sales (Incl. Tax)</th>
                            <th>Total Sales (Excl. Tax)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales_vendors as $sales_vendor)
                            <tr>
                                <td>{{ $sales_vendor->last_name . ', ' . $sales_vendor->first_name }}</td>
                                <td>{{ $sales_vendor->company_name }}</td>
                                <td class="text-right">{{ $sales_vendor->qty_sum }}</td>
                                <td class="text-right">{{ $sales_vendor->sales_sum + $sales_vendor->sale->taxes }}</td>
                                <td class="text-right">{{ $sales_vendor->sales_sum }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#data_table').DataTable({
                "order": []
                , "dom": '<"top"f><t><"bottom"lip>'
                , language: {
                    search: "_INPUT_"
                    , searchPlaceholder: "???? Search"
                }
            });

            $('#start_date').val("{{ date('Y-m-d', strtotime($start_date)) }}");
            $('#end_date').val("{{ date('Y-m-d', strtotime($end_date)) }}");
            $('#start_date_text').html("{{ date('Y-m-d', strtotime($start_date)) }}");
            $('#end_date_text').html("{{ date('Y-m-d', strtotime($end_date)) }}");
        });
    </script>

@endsection
