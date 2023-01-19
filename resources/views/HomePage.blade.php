
@extends('layout')
@section('content') 

<div class="container w-75 my-5">
<h2 class="text-center my-4 border">Manage Employes</h2>
  <div class="d-flex flex-row-reverse">


      <!-- create button -->


    <a class="btn btn-dark my-3 " href="/create">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="yellow" class="bi bi-person-rolodex" viewBox="0 0 16 16">
  <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
  <path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1H1Zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1V2Z"/>
</svg>

      + Employe</a>
  </div>
    <h4 class="text-center"> Total: {{ count($emps) }}</h4>
  <table class="table table-bordered">
  <thead class="thead">
    <tr>
    <th scope="col" class='text-center'>Employe N°</th>
      <th scope="col">Profile</th>
      <th scope="col">Code</th>
      <th scope="col">Noun</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col-3" class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @if(count($employes) > 0)
        @foreach($employes as $employe)
            <tr>
                <td class='text-center'>{{ $employe->id }}</td>
                <td class="text-center"><img src="/images/{{$employe->profile }}" width="150px" height="150px"></td>
                <td>{{ $employe['code'] }}</td>
                <td>{{ $employe->Noun }}</td>
                <td>{{ $employe->Address }}</td>
                <td>{{ $employe->phone }}</td>
                <td width="100px">

                  <!-- view button -->

                
                  <a class="btn btn-primary mt-2" href="{{ url('/show/' . $employe->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                  </svg>
                  </a>


                  <!-- edit button -->



                  <a href="" class="btn btn-warning mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                      <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                    </svg>
                  </a>


                    <!-- delete button -->

                    <form action="{{ route('destroy', $employe->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                      <button class="btn btn-danger mt-2" type="submit" onclick="return confirm('Are you sure ?')" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                        </svg>
                      </button>
                    </form>
                  
                </td>
            </tr>
        @endforeach
  </tbody>
</table>
    @else
        <p class="text-center">{{ "No Data at the moment" }}</p>
    @endif
{{ $employes->links() }}
</div>

@endsection