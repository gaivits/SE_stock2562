<html>
 <head>
  <title>Test</title>
 
 </head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <img src="{{ asset('asset/image/KUSRC.png') }}" width="200" height="130"> </img>
 
 <body>
  <p class="username">Welcome Aonlee</p>
  <br />
  <div class="container">
   <br />
   <div class = "table-form" align="center">
    <table  border="1" >
     <tr>
      <th>id</th>
      <th>ชื่อจริง</th>
      <th>นามสกุล</th>
      <th>อุปกรณ์</th>
      <th>จำนวน</th>
      <th>ลบ</th>
      <th>แก้ไข</th>
     </tr>
     @foreach($user_data as $u)
     <tr class="table-from-db">
      <td class="uid">{{ $u->id }}</td>
      <td>{{ $u->firstname }}</td> 
      <td>{{ $u->lastname }}</td>
      <td>{{ $u->item }}</td>
      <td>{{ $u->amount }}</td>
      <td><a href="/delete/{{$u->id}}"><button>Delete</button></a></td>
      <td><a href="edit/{{$u->id}}"><button>Edit</button></a></td>
     </tr>
     @endforeach
    </table>
    <br>
    <button><a href="{{ route('excel') }}">Excel</a></button>
   </div>
  
    <style>
    body
    {
      background-color: #98FB98;
    }
    .table-from-db
    {
      text-align: center;
    }
    .uid
    {
      font-weight: bold;
    }
    p.username
    {
      margin-left:1080px;
      margin-top: -50px; 
      font-size: 20;
      font-style: italic;
    }
   
  </style>
  </div>

 </body>
</html>