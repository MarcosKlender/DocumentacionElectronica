<!DOCTYPE html>
<html>
<head>
	<title>XML</title>
</head>
<body>
	@foreach($xml as $value)
	{{ $value->xml_documento }}
    @endforeach
</body>
</html>