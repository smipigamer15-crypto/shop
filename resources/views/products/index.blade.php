<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Список продуктів</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        th {
            background: #f5f5f5;
        }
        a, button {
            padding: 6px 12px;
            text-decoration: none;
            background: #3490dc;
            color: white;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }
        button {
            background: #38c172;
        }
        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>

<div class="top">
    <h1>Продукти</h1>

    <a href="{{ route('products.create') }}">➕ Додати продукт</a>
</div>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if($products->count())
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Назва</th>
            <th>Ціна</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }} ₴</td>
                <td>
                    <div class="actions">

                        <!-- Редагувати -->
                        <a href="{{ route('products.edit', $product->id) }}">✏️ Редагувати</a>

                        <!-- Видалити -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Ви впевнені, що хочете видалити?')">
                                ❌ Видалити
                            </button>
                        </form>

                        <!-- В кошик -->
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit">🛒 В кошик</button>
                        </form>

                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Продуктів поки немає 😢</p>
@endif

</body>
</html>
