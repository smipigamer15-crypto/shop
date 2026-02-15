<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Редагування продукту</title>
</head>
<body>

<h1>Редагувати продукт</h1>

@if($errors->any())
    <div style="color:red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Назва:</label>
    <input type="text" name="name" value="{{ $product->name }}">

    <br><br>

    <label>Ціна:</label>
    <input type="number" step="0.01" name="price" value="{{ $product->price }}">

    <br><br>

    <button type="submit">Оновити</button>
</form>

<br>
<a href="{{ route('products.index') }}">Назад</a>

</body>
</html>
