<html lang="uk-UA">
    <head>
	<title>Лабораторна з MongoDB</title>
    </head>
    <body>
<p>
<form action="income.php" method="get">
    <label for="date">Отриманий дохід з прокату станом на обрану дату:</label>
    <br>
    <input type="date" name="date" id="date" value="2021-12-14">
    <input type="time" name="time" id="time" value="11:00">
    <button type="submit">Отримати</button>
</form>
    <button OnClick="GetResult('date')">Збережений результат</button>
</p>

<p>
<form action="mileage.php" method="get">
    <label for="mileage">Автомобілі з пробігом, меншим за вказаний:</label>
    <br>
    <input type="number" name="mileage" id="mileage" value="5000">
    <button type="submit">Отримати</button>
</form>
    <button OnClick="GetResult('mileage')">Збережений результат</button>
</p>

<p>
<form action="models.php" method="get">
    <label for="vendor">Наявні в цьому пункті пробігу марки автомобілів:</label>
    <br id='models' value='models'>
    <button type="submit">Отримати</button>
</form>
    <button OnClick="GetResult('models')">Збережений результат</button>
</p>

<p id='result'></p>

</body>

<script>
function GetResult(id)
{
    var input = document.getElementById(id);
    key = input.value;
    if (id === 'models') key = id;
    var result = localStorage.getItem(key);
    if (result === null) result = "<br>Ще немає результату";
    document.getElementById('result').innerHTML = "<b>Збережений результат:</b>" + result;
}
</script>
