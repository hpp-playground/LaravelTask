# TODO phase2

testコードは
tests/Feature/EachIdTest

1. api/products, api/shopsに対するGET,PUT,DELETEメソッドでのアクセスに対する応答を実装する.まずは以下の機能を実装する.
    - api/products/1にGETメソッドでアクセスすると,id=1の商品情報JSONで返却される
        - api/products/1にGETメソッドで取得できる商品情報はJSONである
            responseFromApiProductsProduct_idByGETIsJSON()
        - api/products/1にGETメソッドで取得できる商品情報のJSONは要件通りである
            JSONFromApiProductsProduct_idByGETSatisfyRequirements()
        - api/products/1にGETメソッドで取得できる商品情報の件数は１件である
            ProductsCountFromApiProductsProduct_idByGETIs1()
    - api/products/1にPUTメソッドでJSONを送信すると,id=1の商品情報が変更される
        canChangeId1OfProductToAccessApiProductsProduct_idByPUT()
    - api/products/1にDELETEメソッドでアクセスすると,id=1の商品情報が削除される
        canDeleteId1OfProductToAccessApiProductsProduct_idByDELETE()

    - api/shops/1にGETメソッドでアクセスすると,id=1の店舗情報JSONで返却される
        - api/shops/1にGETメソッドで取得できる店舗情報はJSONである
            responseFromApiShopsShop_idByGETIsJSON()
        - api/shops/1にGETメソッドで取得できる店舗情報のJSONは要件通りである
            JSONFromApiShopsShop_idByGETSatisfyRequirements()
        - api/shops/1にGETメソッドで取得できる店舗情報の件数は１件である
            ProductsCountFromApiShopsShop_idByGETIs1()
    - api/shops/1にPUTメソッドでJSONを送信すると,id=1の店舗情報が変更される
        canChangeId1OfShopToAccessApiShopsShop_idByPUT()
    - api/shops/1にDELETEメソッドでアクセスすると,id=1の店舗情報が削除される
        canDeleteId1OfShopToAccessApiShopsShop_idByDELETE()



2. 