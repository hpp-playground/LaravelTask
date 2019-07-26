# TODO phase2

testコードは
tests/Feature/EachIdTest

1. api/products, api/shopsに対するGET,PUT,DELETEメソッドでのアクセスに対する応答を実装する.まずは以下の機能を実装する.
    - api/products/1にGETメソッドでアクセスすると,id=xの商品情報JSONで返却される
        - api/products/{$product_id}にGETメソッドで取得できる商品情報はJSONである
            responseFromApiProductsProduct_idByGETIsJSON()
        - api/products/{$product_id}にGETメソッドで取得できる商品情報のJSONは要件通りである
            JSONFromApiProductsProduct_idByGETSatisfyRequirements()
    - api/products/{$product_id}にPUTメソッドでJSONを送信すると,id=xの商品情報が変更される
        canChangeIdxOfProductToAccessApiProductsProduct_idByPUT()
    - api/products/{$product_id}にDELETEメソッドでアクセスすると,id=xの商品情報が削除される
        canDeleteIdxOfProductToAccessApiProductsProduct_idByDELETE()

    finished all at 7/26 14:00

    - api/shops/1にGETメソッドでアクセスすると,id=1の店舗情報JSONで返却される
        - api/shops/{$shop_id}にGETメソッドで取得できる店舗情報はJSONである
            responseFromApiShopsShop_idByGETIsJSON()
        - api/shops/{$shop_id}にGETメソッドで取得できる店舗情報のJSONは要件通りである
            JSONFromApiShopsShop_idByGETSatisfyRequirements()
    - api/shops/{$shop_id}にPUTメソッドでJSONを送信すると,id=1の店舗情報が変更される
        canChangeId1OfShopToAccessApiShopsShop_idByPUT()
    - api/shops/{$shop_id}にDELETEメソッドでアクセスすると,id=1の店舗情報が削除される
        canDeleteId1OfShopToAccessApiShopsShop_idByDELETE()


2. 存在しないproduct_id, shop_idに対して問い合わせを行なった場合,HTTPレスポンス404を返却する
    - api/products/product_idに対してGETメソッドでアクセスした際に404NOT_FOUNDを返却する
    - api/products/product_idに対してPUTメソッドでアクセスした際に404NOT_FOUNDを返却する
    - api/products/product_idに対してDELETEメソッドでアクセスした際に404NOT_FOUNDを返却する
    - api/shops/shop_idに対してGETメソッドでアクセスした際に404NOT_FOUNDを返却する
    - api/shops/shop_idに対してPUTメソッドでアクセスした際に404NOT_FOUNDを返却する
    - api/shops/shop_idに対してDELETEメソッドでアクセスした際に404NOT_FOUNDを返却する