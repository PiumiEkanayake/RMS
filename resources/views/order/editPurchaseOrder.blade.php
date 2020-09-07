@extends('layouts.main')
@section('content')

<div class="pg-heading">
  <a href="{{ route('purchase.index') }}"><i class="fa fa-arrow-left pg-back"></i></a>
  <div class="pg-title">Create Order</div>
</div>

<div class="section" style="height: 100%;width:100%"> {{-- Start of Section--}}
  <div class="section-title">
      Edit Order Details
      <hr>
  </div>
  <div class="section-content" > {{-- Start of sectionContent--}}
      {{-- Start of Form --}}

    <form method="post" action="{{route('purchase.update',$purchase->id)}}" >
      @csrf
      @method('PATCH')
              <div class="row">
                <div class="col">
                  <input type="date" id="date" name="date" value="{{ $purchase->date }}" class="form-control" placeholder="Date" />
                  <label for="username" class="float-label">Date</label>
                </div>
                <div class="col">
                    <input type="date" class="form-control" name="expectedDate" value="{{ $purchase->expectedDate }}" placeholder="Expected Date">
                    <label class="float-label">Expected Date</label>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <input type="text" id="qty" name="qty" value="{{ $purchase->qty }}" class="form-control" placeholder="Qty" />
                  <label for="username" class="float-label">Quantity</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="supplyPrice" value="{{ $purchase->supplyPrice }}" placeholder="Supply price">
                    <label class="float-label">Supply price</label>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <input  type="text" class="form-control" name="note" value="{{ $purchase->note }}" placeholder="Enter note here...">
                  <label class="float-label">Note</label>
                </div>
                <div class="col">
                  <input  type="text" class="form-control" name="vendorID" value="{{ $purchase->vendorID}}" placeholder="Vendor ID">
                  <label class="float-label">Vendor ID</label>
                </div>
              </div>

              <hr>
              <div class="form-group">
                <input type="search" name="add_products" id="add_products" class="form-control input-lg" placeholder="Enter Product Name" style="width: 50%" />
                
              </div>
              <br>

              <table class="table hover table-striped table-borderless table-hover all-table">
                <thead class="table-head">
                    <tr>
                      <th>Product ID</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Supply Price</th>
                      <th>Cost Price</th>
                      <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>Row 1 Data 1</td>
                      <td>Row 1 Data 2</td>
                      <td>Row 1 Data 1</td>
                      <td>Row 1 Data 2</td>
                      <td></td>
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