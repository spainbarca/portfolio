<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mensaje recibido</title>
</head>
<body>
	<p>Recibiste un mensaje de: {{ $msg['name'] }} - {{ $msg['email'] }}</p>
	<p><strong>Asunto:</strong> {{ $msg['subject'] }}</p>
	<p><strong>Contenido:</strong> {{ $msg['content'] }}</p>
</body>
</html>