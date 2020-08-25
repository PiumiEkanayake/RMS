@extends('layouts.main')
@section('content')

<div class="pg-heading">

    <div class="pg-title">All Employees</div>
</div>

<div class="section"> {{-- Start of Section--}}

    <div class="section-content"> {{-- Start of sectionContent--}}

        <table id="myTable" class="table hover table-striped table-borderless table-hover all-table">
            <div class="add-btn">
                <a href="{{ route('employee.create') }}">Add Employee</a>
            </div>
            <thead class="table-head">
                <tr>
                    <th>Name</th>
                   
                    <th>NIC</th>
                    <th>Address</th>
                    <th>Phone(Mobile)</th>
                   
                    <th>Birthday</th>
                    
                    <th>Target</th>
                    <th>Salary</th>
                   
                    <th>Commission</th>
                    <th>Actions</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($employee as $emp)

               {{--  {{ $emp->emp_id }} --}}
                <tr>
                    
                    <td>{{ $emp->fname }} {{ $emp->lname }}</td>
                   
                    <td>{{ $emp->nic }}</td>
                    <td>{{ $emp->address }}</td>
                    <td>{{ $emp->mobile }}</td>
                   
                    <td>{{ $emp->birthday }}</td>
                 
                    <td>{{ $emp->target }}</td>
                    <td>{{ $emp->salary }}</td>
                  
                    <td>{{ $emp->commission }}</td>
                    
                    <td class="action-icon">
                        <a href="{{ route('employee.edit',$emp->emp_id) }}"><i class="fas fa-pen"></i></a>
                        <form method="POST" class="dlt-form" action="{{ route('employee.destroy',$emp->emp_id) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="dlt-btn"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                 </tbody>
                
        </table>

    </div> {{-- End  of sectionContent--}}
</div> {{-- End  of section--}}

@endsection
