Let's assume the name of table is "products"

1. $products = DB::table('products')
    ->select('ProductName', 'QuantityPerUnit')
    ->get();

2. $products = DB::table('products')
    ->select('ProductID', 'ProductName')
    ->get();
3. $products = DB::table('products')
    ->select('ProductName', 'UnitPrice')
    ->where('UnitPrice', DB::raw('(SELECT MAX(UnitPrice) FROM products)'))
    ->orWhere('UnitPrice', DB::raw('(SELECT MIN(UnitPrice) FROM products)'))
    ->get();

4. $products = DB::table('products')
    ->select('ProductName', 'UnitPrice')
    ->where('Unitprice', '>', DB::raw('(SELECT AVG(UnitPrice) FROM products)'))
    ->get();

5. $products = DB::table('products')
    ->select('ProductID', 'ProductName', 'UnitPrice')
    ->where('UnitPrice', '<', 20.00)
    ->get();

6. $products = DB::table('products')
    ->select('ProductName', 'UnitsOnOrder', 'UnitsInStock')
    ->where('UnitsInStock', '<', DB::raw('UnitsOnOrder'))
    ->get();