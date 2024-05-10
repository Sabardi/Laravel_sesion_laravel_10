#  Membuat Session
Terdapat beberapa cara untuk membuat session di Laravel, antara lain:
 Menggunakan function helper session(<session_name>,<session_value>)
 Melalui method $request->session()->put(<session_name>,<session_value>) dari
Request object
 Melalui method Session::put(<session_name>,<session_value>) dari Session facade
Sebagai contoh, untuk membuat session bernama hakAkses yang berisi string 'admin', bisa
menggunakan salah satu kode berikut:
 session(['hakAkses' => 'admin']);
 $request->session()->put('hakAkses','admin');
 Session::put('hakAkses','admin');

Untuk cara pertama, yakni dari function session(), bisa langsung kita tulis ke dalam
controller:
    public function buatSession()
    {
        session(['hakAkses' => 'admin']);
    }

 Cara kedua adalah melalui Request object, sehingga kita harus menulis type hint Request
$request sebagai argument method:
    public function buatSession(Request $request)
    {
        $request->session()->put('hakAkses','admin');
    }

Cara ketiga menggunakan facade Session::put(), sehingga kita juga harus menambah
perintah import use Illuminate\Support\Facades\Session di bagian atas controller:

 use Illuminate\Support\Facades\Session;

 public function buatSession()
 {
     Session::put('hakAkses','admin');
 }


Ketiga cara ini bisa dipakai, namun dengan function session() penulisannya jadi lebih singkat.
Jika kita ingin membuat beberapa session sekaligus, bisa ditulis dalam bentuk array:
 session(['hakAkses' => 'admin','nama' => 'Anto']);
 $request->session()->put(['hakAkses' => 'admin','nama' => 'Anto']);
 Session::put(['hakAkses' => 'admin','nama' => 'Anto']);


    public function buatSession(){
        // session(['hakAkses' => 'admin']);
        session(['hakAkses' => 'admin','nama' => 'antonym']);

        return "session sudah di byaran";


    }


# Membaca Session
Sama seperti pembuatan, proses pembacaan session juga bisa dilakukan dengan beberapa
cara:

 Menggunakan function helper session(<session_name>)
 Melalui method $request->session()->get(<session_name>) dari Request object
 Melalui method Session::get(<session_name>) dari Session facade

untuk mengakses kedua session yang sudah kita buat sebelumnya, bisa
menggunakan

  public function aksesSession( Request $request ){


        if (session()->has('hakAkses'))
         {
             echo "Session 'hakAkses' terdeteksi: ". session('hakAkses');
         }

        $IsiSesion = $request->session()->get('kota', 'jakarta');
        echo  "isi sesion adalah $IsiSesion";
        // Menggunakan helper function
        echo session('hakAkses');
        echo session('nama');
        echo '<hr>';

        // Dari Request object
        echo $request->session()->get('hakAkses');
        echo $request->session()->get('nama');

        echo '<hr>';

        // Menggunakan facade Session
        echo Session::get('hakAkses');
        echo Session::get('nama');
    }


Fitur lanjutan method get() adalah, bisa memberikan nilai default. Jika sebuah session tidak
ditemukan, nilai inilah yang akan dipakai. Nilai default ditulis sebagai argument kedua dari
method get():

        $IsiSesion = $request->session()->get('kota', 'jakarta');
        echo  "isi sesion adalah $IsiSesion";


Dalam beberapa situasi, kita ingin melakukan pemeriksaan session terlebih dahulu, yakni jika
session ada, jalankan kode tertentu. Ada atau tidaknya sebuah session bisa diperiksa
562
Session
menggunakan method session()->has() 

if (session()->has('hakAkses'))
         {
             echo "Session 'hakAkses' terdeteksi: ". session('hakAkses');
         }


# Menghapus Session
Untuk menghapus session juga bisa dilakukan dengan 3 cara:
 Menggunakan function helper session->forget(<session_name>)
 Melalui method $request->session()->forget(<session_name>) dari Request object
 Melalui method Session::forget(<session_name>) dari Session facade

Tentunya kita tidak harus menggunakan ketiga cara ini secara bersamaan, tapi cukup pilih
salah satu saja.
Laravel juga menyediakan method flush() untuk menghapus semua session

        // Menghapus 1 session menggunakan helper function
        session()->forget('hakAkses');
        // Menghapus 1 session menggunakan Request object
         $request->session()->forget('hakAkses');
         // Menghapus 1 session menggunakan facade Session
         Session::forget('hakAkses');
         echo "Session hakAkses sudah dihapus";

#  Flash Session
Flash session adalah sebutan untuk session yang hanya bisa diakses 1 kali saja, setelah itu
isinya langsung terhapus. Flash session ini sebenarnya sudah pernah kita pakai saat
menampilkan flash data di bab CRUD.
Untuk membuat flash session, juga bisa dengan 3 cara berikut:
 Menggunakan function helper session()->flash(<session_name>,<session_value>)
 Melalui method $request->session()->flash(<session_name>,<session_value>) dari
Request object
 Melalui method Session::flash(<session_name>,<session_value>) dari Session
facade
