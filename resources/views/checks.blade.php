<html>
 <head>
  <title>Test</title>
 
 </head>
 <body>
  <br />
  <div class="container">
   
   <div align="center">
    <a href="{{ route('excel') }}">Excel</a>
   </div>
   <br />
   <div  align="center">
    <table  border="2">
     <tr>
      <td>id</td>
      <td>firstname</td>
      <td>lastname</td>
      <td>stationery</td>
      <td>amount</td>
      <td>delete</td>
      <td>edit</td>
     </tr>
     @foreach($user_data as $u)
     <tr>
      <td>{{ $u->id }}</td> 
      <td>{{ $u->firstname }}</td> 
      <td>{{ $u->lastname }}</td>
      <td>{{ $u->stationery }}</td>
      <td>{{ $u->amount }}</td>
      <td><a href="/delete/{{$u->id}}"><button>Delete</button></a></td>
      <td><a href="edit/{{$u->id}}"><button>Edit</button></a></td>
     </tr>
     @endforeach
    </table>
   </div>
   
  </div>
 </body>
</html>