# TODO phase3

1. products, shopsの一覧ページを作成する.

2. products, shopsに対してPOSTした際に正常に処理が終了した場合、元のページへリダイレクトするように処理を変更
    - api/productsに対して正常なデータでPOSTを行なった場合、レスポンスコード302が返却される
    - api/shopsに対して正常なデータでPOSTを行なった場合、レスポンスコード302が返却される

    finished all at 7/27 23:30

3. products/product_id, shops/shop_idに対してPUT,DELETEした際に正常に処理が終了した場合、元のページへリダイレクトするように処理を変更
    - api/products/product_idに対して正常なデータでPUTを行なった場合、レスポンスコード302が返却される
    - api/products/product_idに対して正常なデータでDELETEを行なった場合、レスポンスコード302が返却される
    - api/shops/shop_idに対して正常なデータでPUTを行なった場合、レスポンスコード302が返却される
    - api/shops/shop_idに対して正常なデータでDELETEを行なった場合、レスポンスコード302が返却される

    finished all at 7/27 23:30

4. 画像投稿機能を実装
    - view部分に画像投稿用フォームを作成する
    - POSTされてきた画像をAWS S3に保存する
    - S3に保存する際のURLをデータベースに保存するように設計を変更(キツかった...)
    - 各テストを画像投稿可能なように変更していく