# TODO phase1

1. 要件定義に記載された各エンドポイントに対するアクセスについてのテストを.tests/Feature/ProductTest.php関数に実装する.テスト項目は以下の通り.また各テスト用関数は,ステータスコード200のHTTPレスポンスを返却する.
    - api/productsにGETメソッドでアクセスできる
        canAccessApiProductsByGET()
    - api/productsにPOSTメソッドでアクセスできる
        canAccessApiProductsByPOST()
    - api/products/{product_id}にGETメソッドでアクセスできる
        canAccessApiProductsProduct_idByGET()
    - api/products/{product_id}にPUTメソッドでアクセスできる
        canAccessApiProductsProduct_idByPUT()
    - api/products/{product_id}にDELETEメソッドでアクセスできる
        canAccessApiProductsProduct_idByDELETE()
    - api/shopsにGETメソッドでアクセスできる
        canAccessApiShopsByGET()
    - api/shopsにPOSTメソッドでアクセスできる
        canAccessApiShopsWithByPOST()
    - api/shops/{shop_id}にGETメソッドでアクセスできる
        canAccessApiShopsShop_idByGET()
    - api/shops/{shop_id}にPUTメソッドでアクセスできる
        canAccessApiShopsShop_idByPUT()
    - api/shops/{shop_id}にDELETEメソッドでアクセスできる
        canAccessApiShopsShop_idByDELETE()
    finished all at 7/24 13:55

2. 上記関数に対応するように,routes/api.phpに各エンドポイントに対する処理を記述する.まず簡単にclosureで記述する.
    関数に実際の処理は記述しない.
    finished all at 7/24 14:05

3. テスト用にデータベースを作成する.
    - テスト用データベースを２種類作成(Products, shops)
    - 要件通り各カラムを設定
    - fakerを利用してseederを作成.テスト用seederの要件は以下の通り.
        - productは10品目,shopは5店舗存在する.
    finished all at 7/24 16:30

4. データベースに関するテストを実装して検証する。検証する要件は以下の通り
    - api/productsにGETメソッドでアクセスするとJSONで商品情報が10件返却される.より粒度を細かくすると以下の通り.
        - api/productsにGETメソッドでアクセスするとJSONが返却される
            responseFromApiProductsByGETIsJSON()
        - api/productsにGETメソッドでアクセスして返却されるJSONは要件通りである
            JSONFromApiProductsByGETSatisfyRequirements()
        - api/productsにGETメソッドでアクセスして返却される商品情報は10件である
            ProductsCountFromApiProductsByGETIs10()

    - api/shopsにGETメソッドでアクセスするとJSONで店舗情報が5件返却される.より粒度を細かくすると以下の通り.
        - api/shopsにGETメソッドでアクセスするとJSONが返却される
            responseFromApiShopsByGETIsJSON()
        - api/shopsにGETメソッドでアクセスして返却されるJSONは要件通りである
            JSONFromApiShopsByGETSatisfyRequirements()
        - api/shopsにGETメソッドでアクセスして返却される店舗情報は5件である
            ProductsCountFromApiShopsByGETIs5()

    finished all at 7/25 11:00