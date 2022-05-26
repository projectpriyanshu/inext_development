<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<p>Hi, {{$name}}</p>

<p>Please submit Forllowing Documents for verification!</p>
@php $d = explode(',',$docs) @endphp
@for($i=0; $i < count($d); $i++)
<p>{{$d[$i]}}</p>
@endfor


<h5>Thanks & Regards</h5>
<p>Team Inext</p>
</body>
</html>