<!DOCTYPE html>
<html>
<head>
    <title>Створити товар</title>
</head>
<body>
<h1>Новий товар</h1>

<form method="POST" action="{{ route('products.store') }}">
    @csrf

    <input type="text" name="name" placeholder="Назва товару">
    <br><br>

    <input type="number" name="price" placeholder="Ціна">
    <br><br>

    <button type="submit">Зберегти</button>
</form>
</body>
</html>

