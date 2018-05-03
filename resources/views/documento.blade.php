<!DOCTYPE html>
<html>
<head>
	<title>XML</title>
</head>
<body>
	@foreach($xml as $value)
	{{ $value-> numero_documento }}
	{{ $value->xml_documento }}
    @endforeach
</body>
</html>