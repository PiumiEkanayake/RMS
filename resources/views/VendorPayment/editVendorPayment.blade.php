@extends('layouts.main')
@section('content')

<div class="pg-heading">
  <a href="{{ route('vendorPayment.index') }}"><i class="fa fa-arrow-left pg-back"></i></a>
  <div class="pg-title">Edit Vendor Payment</div>
</div>

<div class="section" style="height: 50%;width:50%"> {{-- Start of Section--}}
  <div class="section-title">
      Edit Payment for Vendor's
      <hr>
  </div>
  <div class="section-content" > {{-- Start of sectionContent--}}
      {{-- Start of Form --}}

    <form method="post" action="{{route('vendorPayment.update',$vendorPayment->id)}}" >
        @csrf
        @method('PATCH')
              <div class="row">
                <div class="col">
                  <input type="text" id="vendorId" name="vendorID" value="{{ $vendorPayment->vendorID }}" class="form-control" placeholder="Vendor ID" />
                  <label for="vendorId" class="float-label">Vendor ID</label>
                </div>
                  <div class="col">
                      <input type="text" class="form-control" name="paymentType" value="{{ $vendorPayment->paymentType }}" placeholder="Payment Type">
                      <label class="float-label">Payment Type</label>
                  </div>
              </div>
              <div class="row">
                <div class="col">
                  <input type="number" id="amount" name="amount" value="{{ $vendorPayment->amount }}" class="form-control" placeholder="Amount" />
                  <label for="paymentId" class="float-label">Amount</label>
              </div>
                <div class="col">
                    <input type="date" class="form-control" name="date" value="{{ $vendorPayment->date }}" placeholder="Date">
                    <label class="float-label">Date</label>
                </div>
              </div>
              


              <hr>
              <div class="form-group">
                <input type="search" name="add_products" id="add_products" class="form-control input-lg" placeholder="Enter Vendor Name..." style="width: 50%" />
                
              </div>
              <br>

              <table class="table hover table-striped table-borderless table-hover all-table">
                <thead class="table-head">
                    <tr>
                        <th>Vendor ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td class="action-icon">
                            <a href="#"><i class="fas fa-pen"></i></a>
                            <a href="#"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>


              <div class="row submit-row">
                  <div class="col">
                      <input class="btn-submit" type="submit" value="Edit">
                  </div>
              </div>

              
          </form>


        </div> {{-- End  of sectionContent--}}
      </div> {{-- End  of section--}}
      

@endsection