<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>المنتجات</title>
</head>
<body>
    <h1>المنتجات</h1>
    <a href="{{ route('products.create') }}">إضافة منتج جديد</a>

    <table>
        <thead>
            <tr>
                <th>المعرف</th>
                <th>الاسم</th>
                <th>الكمية</th>
                <th>الصورة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td><img src="{{ asset('storage/' . $product->image) }}" width="100" alt="صورة المنتج"></td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}">تعديل</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
