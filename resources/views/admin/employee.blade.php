@extends("layout.adminApp")

@section("content")

<section class="flights-content">
    <h1>Available Employee</h1>


  @if (isset($msgError))
  <div class="error-message">
    {{$msgError}}
  </div>
  @endif

  <a class="book-btn" >Add Employee</a> 


    <table class="flight-table">
      <thead>
        <tr>
          <th>Employee Name</th>
          <th>Address</th>
          <th>Phone</th>
          <th>passport</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($employees as $employee)
            <tr>
                <td>{{$employee->name}}</td>
                <td>{{$employee->address}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->passport}}</td>
            
                <td>
                    <a class="book-btn" >Delete</a> 
                    <a class="book-btn" >Edit</a> 
                </td>
            </tr>
        @endforeach

      </tbody>
    </table>
  </section>

@endsection