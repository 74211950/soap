<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Clima</title>
    
</head>
<body>
    <h2>Consulta de Clima</h2>
    <form action="http://192.168.43.250:8080/soap/datos.txt" method="post">
        <input type="hidden" name="action" value="ver_clima">
        <button type="submit">Ver Clima</button>
    </form>
</body>
</html>