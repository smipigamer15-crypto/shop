<h2>Кошик</h2>

@if(empty($cart))
    <p>Кошик порожній</p>
@else
    <table>
        <tr>
            <th>Назва</th>
            <th>Кількість</th>
            <th>Ціна</th>
            <th>Сума</th>
        </tr>
        @php $total = 0; @endphp
        @foreach($cart as $item)
            @php $total += $item['price'] * $item['quantity']; @endphp
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ $item['price'] }} грн</td>
                <td>{{ $item['price'] * $item['quantity'] }} грн</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3"><strong>Разом:</strong></td>
            <td><strong>{{ $total }} грн</strong></td>
        </tr>
    </table>
@endif
