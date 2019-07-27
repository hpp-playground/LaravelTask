# TODO phase2

testコード:
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

    - api/shops/1にGETメソッドでアクセスすると,id=xの店舗情報JSONで返却される
        - api/shops/{$shop_id}にGETメソッドで取得できる店舗情報はJSONである
            responseFromApiShopsShop_idByGETIsJSON()
        - api/shops/{$shop_id}にGETメソッドで取得できる店舗情報のJSONは要件通りである
            JSONFromApiShopsShop_idByGETSatisfyRequirements()
    - api/shops/{$shop_id}にPUTメソッドでJSONを送信すると,id=xの店舗情報が変更される
        canChangeIdxOfShopToAccessApiShopsShop_idByPUT()
    - api/shops/{$shop_id}にDELETEメソッドでアクセスすると,id=xの店舗情報が削除される
        canDeleteIdxOfShopToAccessApiShopsShop_idByDELETE()

    finished all at 7/26 14:30

2. 存在しないproduct_id, shop_idに対して問い合わせを行なった場合,HTTPレスポンス404を返却する
    - api/products/product_idに対してGETメソッドでアクセスした際に404NOT_FOUNDを返却する
        ifThereIsNoResouceOnApiProductsProduct_idThenReturn404ByGET()
    - api/products/product_idに対してPUTメソッドでアクセスした際に404NOT_FOUNDを返却する
        ifThereIsNoResouceOnApiProductsProduct_idThenReturn404ByPUT()
    - api/products/product_idに対してDELETEメソッドでアクセスした際に404NOT_FOUNDを返却する
        ifThereIsNoResouceOnApiProductsProduct_idThenReturn404ByDELETE()
    - api/shops/shop_idに対してGETメソッドでアクセスした際に404NOT_FOUNDを返却する
        ifThereIsNoResouceOnApiProductsProduct_idThenReturn404ByGET()
    - api/shops/shop_idに対してPUTメソッドでアクセスした際に404NOT_FOUNDを返却する
        ifThereIsNoResouceOnApiProductsProduct_idThenReturn404ByPUT()
    - api/shops/shop_idに対してDELETEメソッドでアクセスした際に404NOT_FOUNDを返却する
        ifThereIsNoResouceOnApiProductsProduct_idThenReturn404ByDELETE()

    finished all at 7/26 15:15

3. product_id, shop_idに対して不正な値がPUTされた際に,Response::HTTP_UNPROCESSABLE_ENTITYを返却する
    - 空文字がPUTされるケース
       - api/products/{$product_id}に対してtitle==空文字がPUTされた時HTTP_UNPROCESSABLE_ENTITYを返却する
           ifTitleIsNullOnApiProductsProduct_idThenReturn422ByPUT()
       - api/products/{$product_id}に対してdescription==空文字がPUTされた時HTTP_UNPROCESSABLE_ENTITYを返却する
           ifDescriptionIsNullOnApiProductsProduct_idThenReturn422ByPUT()
       - api/products/{$product_id}に対してprice==空文字がPUTされた時HTTP_UNPROCESSABLE_ENTITYを返却する
           ifPriceIsNullOnApiProductsProduct_idThenReturn422ByPUT()
       - api/shops/{$shop_id}に対してname==空文字がPUTされた時HTTP_UNPROCESSABLE_ENTITYを返却する
           ifNameIsNullOnApiProductsProduct_idThenReturn422ByPUT()

    finished all at 7/26 16:00

    要件を満たさない値がPUTされるケース
        - api/products/{$product_id}に対して,100文字を超えるtitleがPUTされた時
            ifTitleIsOver100OnApiProductsProduct_idThenReturn422ByPUT()
        - api/products/{$product_id}に対して,500文字を超えるtitleがPUTされた時
            ifDescriptionIsOver500OnApiProductsProduct_idThenReturn422ByPUT()
        - api/products/{$product_id}に対して,負の値であるpriceがPUTされた時
            ifPriceOfNegativeIntegerOnApiProductsProduct_idThenReturn422ByPUT()
        - api/products/{$product_id}に対して,小数のpriceがPUTされた時
            ifPriceOfFloatOnApiProductsProduct_idThenReturn422ByPUT()
        - api/products/{$product_id}に対して,数字出ない文字列がpriceとしてPUTされた時
            ifPriceOfNotNumberOnApiProductsProduct_idThenReturn422ByPUT()
        - api/shops/{$shop_id}に対して,100文字を超えるnameがPUTされた時
            ifNameIsOver100OnApiShopsShop_idThenReturn422ByPUT()

    finished all at 7/26 17:00

4. 各idに対するGET,PUT,DELETEメソッドによるアクセスに対応する処理をコントローラへ委譲する

    finished all at 7/27 9:00

5. 各コントローラ内の処理をコントローラとサービスに分割する