  
<!DOCTYPE html>
<html>
<head>
	<title>category</title>
</head>
<body>
	<form method="POST" action="storecategory">
		@csrf
		<input type="text" name="title">
		<button>add category</button>
	</form>
</body>
</html>