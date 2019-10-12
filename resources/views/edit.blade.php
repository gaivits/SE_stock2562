<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class = "updates" align="center">	
		<form action = "/update/{{$user_id->id}}" method = "post">
			{{csrf_field()}}
			{{ method_field('PATCH') }}
			
			<input type="text" name="firstname" placeholder="ชื่อจริง" required="true" value="{{$user_id->firstname}}">*<br>
			<input type="text" name="lastname"  placeholder = "นามสกุล" required="true"value="{{$user_id->lastname}}"  >*<br>
			<input type="text" name="stationery"placeholder='เครื่องเขียน' required="true" value="{{$user_id->stationery}}"><br>
			<input type="number" name="amount" placeholder="จำนวน" value="{{$user_id->amount}}" ><br>
			<input type="submit" value="save">
		</form>
	<div>	
</body>
</html>