<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<img src="{{ asset('asset/image/KUSRC.png') }}" width="200" height="130"> </img>
	
	<p class="username">Welcome Aonlee</p>
	<div class = "updates" align="center">	
		<form action = "/update/{{$user_id->id}}" method = "post" class="update-box">
			{{csrf_field()}}
			{{ method_field('PATCH') }}
			
			ชื่อจริง :<input type="text" name="firstname" placeholder="ชื่อจริง" required="true" value="{{$user_id->firstname}}">*<br>
			<br>
			นามสกุล :<input type="text" name="lastname"  placeholder = "นามสกุล" value="{{$user_id->lastname}}"><br>
			<br>
			อุปกรณ์ : <input type="text" name="item"placeholder='เครื่องเขียน' required="true" value="{{$user_id->item}}">*<br>
			<br>
			จำนวน : <input type="number" name="amount" placeholder="จำนวน" value="{{$user_id->amount}}" ><br>
			<br>
			<input type="submit" value="save">
		</form>
	<div>
	<style>
    body
    {
      background-color: #98FB98;
    }
    p.username
    {
     margin-left:1080px;
     margin-top: -50px; 
	 font-size: 20;
	 font-style: italic;
     }
   
   	</style>
</body>
</html>