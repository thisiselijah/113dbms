# 資料庫專題

### To-do List
- [x] 連接資料庫
- [x] build api
- [x] 登入/登出
- [x] 將商品加入購物車
- [x] 渲染購物車內容
- [ ] 從購物車移除商品
- [x] 加總購物車商品總數及金額
- [x] 渲染商品頁
- [x] 渲染單一商品頁
- [x] 商品分類側邊欄
- [x] 商品頁切換
- [x] 評論及評分
- [x] 搜尋商品
- [ ] 送出訂單
- [ ] 查看訂單
- [ ] 註冊

### Intro
---
資料庫系統期末專題，傢俱購物網站。

### How to start it?
---
1. 啟動 apache and mysql server in XAMPP
2. clone this repo to path: xampp/htdocs
3. cd into repo dir path
4. create an *```.env```* file in path: *```app/```*
5. 開啟 phpMyadmin 匯入 *```FERNITURE_DB.sql```*
7. 在 Browser 輸入 http://127.0.0.1/113DBMS/public/?url=home

### In the *```.env```* file
---
You need to type the following content:

```
DB_TYPE=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_NAME=FURNITURE_DB
DB_USER=[your_username]
DB_PASS=[your_password]
```


