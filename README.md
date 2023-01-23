# Ecommerce (Codeigniter 4)

Ini adalah project kedua yang saya buat setelah inventory-app :smile:. Project ini dibuat untuk mengasah skill yang sudah saya punya yakni bahasa pemrograman PHP. Project ini masih jauh dari kata sempurna, dikarenakan saya juga masih baru belajar pemrograman. Dan itu alasannya saya beri nama project ini simple-ecommerce karena project ini memang simple :sweat_smile:

<h4>Berikut cara configurasi projectnya : </h4>

1. Pastikan kalian mempunyai XAMPP.
2. Setelah clone atau sudah mendownload source code nya, kalian bisa file projectnya dimana saja.
3. Lalu buat databasenya dengan nama ecommerce_ci4
4. Lalu import table-table nya dari file ecommerce_ci4.sql yang ada di dalam folder projectnya.
5. Sebelum projectnya di run, harus ada configurasi pada XAMPP nya. Kalian bisa ke folder XAMPP(Tergantung install xampp nya dimana) yang ada di directory C:. Lalu ke folder php, kemudian cari file php.ini lalu buka file tersebut menggunakan Notepad. 
6. Lalu cari menggunakan Ctrl + F, lalu cari kata berikut : 
   ```javascript
    ;extension=intl
   ```
   Kemudian hapus tanda titik koma nya (;), sehingga seperti berikut : 
   ```javascript
    extension=intl
   ```
   Baru kemudian jalankan XAMPP nya.
   (Konfigurasi tersebut dilakukan ketika project tersebut tidak bisa di run, tetapi jika kalian run project nya tidak ada error maka konfigurasi tersebut tidak harus dilakukan :no_mouth:)
   
7. Setelah itu project nya baru bisa di run, dengan mengetikkan perintah berikut pada git bash atau cmd :
   ```javascript
    php spark serve
   ```
   
   
<h4>List user untuk login : </h4>

1. User 1
- Email = admin@gmail.com  
- Name = Administrator
- Username = admin
- Role : Admin
- Password = eazystore123

2. User 2
- Email = staff@gmail.com
- Name = Staff Admin
- Username = staff
- Role : Staff
- Password = passwordstaff123

3. User 3
- Email = user@gmail.com
- Name = User
- Username = user
- Role : User
- Password = eazystore12345
