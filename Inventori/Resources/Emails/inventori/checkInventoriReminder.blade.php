<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<p>Check Inventori : {{ $viewData['inventori']->nama_inventaris }}</p>

		<p>Terakhir Check Inventori  Pada Tanggal : {{ $viewData['inventori']->created_at->toDateTimeString() }}</p>
</body>
</html>