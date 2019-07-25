# TODO phase1

- 要件定義に記載された各エンドポイントに対するアクセスについてのテストを、tests/Feature/ProductTest.php関数に実装する。テスト項目(テスト用関数名に(ほぼ)等しい)は以下の通り。また各テスト用関数は、ステータスコード200のHTTPレスポンスを返却する。
    - api/productsにGETメソッドでアクセスできる
    - api/productsにPOSTメソッドでアクセスできる
    - api/products/{product_id}にGETメソッドでアクセスできる
    - api/products/{product_id}にPUTメソッドでアクセスできる
    - api/products/{product_id}にDELETEメソッドでアクセスできる
    - api/shopsにGETメソッドでアクセスできる
    - api/shopsにPOSTメソッドでアクセスできる
    - api/shops/{shop_id}にGETメソッドでアクセスできる
    - api/shops/{shop_id}にPUTメソッドでアクセスできる
    - api/shops/{shop_id}にDELETEメソッドでアクセスできる
    finished all at 7/24 13:55


- 上記関数に対応するように、routes/api.phpに各エンドポイントに対する処理を記述する。まず簡単にclosureで記述する。
    finished all at 7/24 14:05


- テスト用にデータベースを作成する。
    - テスト用データベースを２種類作成(Products, shops)
    - 要件通り各カラムを設定
    - fakerを利用してseederを作成
    finished all at 7/24 16:30
