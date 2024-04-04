<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Tenda;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Sastrawi\Stemmer\StemmerFactory;

class RekomendasiController extends Controller
{
    // AUTH
    //form register
    public function formRegister(){
        return view('auth.formRegister');
    }

    // action register
    public function actionRegister(Request $req){
        $validasi = $req->validate([
            'namaLengkap' => 'required|string|max:255',
            'username'=>'required|string|unique:users',
            'password'=>'required|string|min:8'
        ]);

        $pass = Hash::make($validasi['password']);
        
        $user = User::create([
            'nama' => $validasi['namaLengkap'],
            'username'=>$validasi['username'],
            'password'=>$pass,
            'role'=>$req->role,
        ]);

        if($user){
            session()->flash('success', 'Registrasi Berhasil');
            return redirect('/auth/formRegistrasi');
        }else{
            session()->flash('failed', 'Registrasi Gagal');
            return redirect('/auth/formRegistrasi');
        }
    }

    //form login
    public function formLogin(){
        if (Auth::check()) {
            if(Auth::user()->role == "Admin"){
                return redirect('/admin/dashboardAdmin');
            }else if(Auth::user()->role == "User"){
                $data = Tenda::all();
                $rekomendasi = $this->distance();
                return redirect('/user/dashboardUser')->with(['prediksi'=>$rekomendasi, 'datas'=> $data ]);
            }
            
        }else{
            return view('auth.formLogin');
        }
        
    }
    
    //actionLogin
    public function actionLogin(Request $req){
        $data = Tenda::all();
        $validasi = $req->validate([
            'username'=>'required|string',
            'password'=>'required|string|min:8'
        ]);

        if (Auth::Attempt($validasi)) {
            if(Auth::user()->role == 'Admin'){
                return redirect('/admin/dashboardAdmin');
            }else if(Auth::user()->role == 'User'){
                return redirect('/user/dashboardUser');
            }
        }else{
            session()->flash('error', 'Email atau Password Salah');
            return redirect('/');
        }

    }

    // logout
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    // ADMIN
    // dashboard admin
    public function indexAdmin() {
        $data = Tenda::all();
        return view('Admin.dashboardAdmin',['datas' => $data]);
    }

    // form tambah tenda
    public function formTambah(){
        $getTenda = Tenda::all();
        return view('Admin.formTambah',['data'=>$getTenda]);
        
    }
    // aksi tambah
    public function actionTambah(Request $req) {
        // Validasi inputan
        $validasi = $req->validate([
            'namaTenda' => 'required|string',
            'kpst' => 'required|string',
            'ukuran'=>'required|array|min:1',
            'harga'=>'required|string',
            'kebutuhan' => 'required|string',
            'file' => 'required|image|mimes:jpeg,jpg,png',
        ]);
        
        // menyimpan data file yang diupload ke variabel $file
        $file = $req->file('file');
        $nama_file = $file->getClientOriginalName();
        //dd($file);
        $tujuan_upload = 'assets/images';
        $file->move($tujuan_upload,$file->getClientOriginalName());

        $pilUkuran = $validasi['ukuran'];
        $strUkuran = implode(',',$pilUkuran);
        $desc = Str::of($validasi['kpst'])->append(' ')->append($strUkuran)->append(' ')->append($validasi['harga'])->append(' ')->append($validasi['kebutuhan']);
        // Membuat data baru dalam tabel Tenda
        $tendaBaru = Tenda::create([
            'nama_tenda' => $validasi['namaTenda'],
            'kapasitas'=>$validasi['kpst'],
            'ukuran' => $strUkuran,
            'harga' => $validasi['harga'],
            'kebutuhan'=>$validasi['kebutuhan'],
            'deskripsi'=> $desc,
            'path_gambar' => $nama_file,
        ]);
        return redirect('/admin/tambahTenda');
    }
    // delete tenda
    public function deleteTenda($getId){
        Tenda::where('id', $getId)->delete();
        return redirect('tambahTenda');
    }
    // update Tenda
    public function updateTenda(Request $req, $id){
        $pilUkuran = $req->ukuran;
        $strUkuran = implode(',',$pilUkuran);
        $desc = Str::of($req->kpst)->append(' ')->append($strUkuran)->append(' ')->append($req->harga)->append(' ')->append($req->kebutuhan);
        Tenda::find($id)->update([
        // Membuat data baru dalam tabel Tenda
            'nama_tenda' => $req->namaTenda,
            'kapasitas'=>$req->kpst,
            'ukuran' => $strUkuran,
            'harga' => $req->harga,
            'kebutuhan'=>$req->kebutuhan,
            'deskripsi'=> $desc,
        ]);

        if($req->hasFile('file')){
            $file = $req->file('file');
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'assets/images';
            $file->move($tujuan_upload,$file->getClientOriginalName());
            Tenda::find($id)->update([
                'path_gambar'=>$nama_file,
            ]);
        }
        
        return redirect('tambahTenda');
    }

    // USER
    // dashboard user
    public function indexUser() {
        $data = Tenda::all();
        $rekomendasi = $this->distance();
        return view('user.dashboardUser', ['prediksi'=>$rekomendasi, 'datas'=>$data]);
    }
    // form rating
    public function indexRating(){
        $userLogin = Auth::user();
        $ratingUserLogin = $userLogin->ratings->pluck('tenda_id');
        $datas = Tenda::whereNotIn('id',$ratingUserLogin)->get();
        
       
        return view('user.ratingUser',['data'=>$datas]);
    }

     // action rating
    public function actionRating(Request $req){
        $userId = Auth::user()->id;
        Rating::create([
            'user_id'=> $userId,
            'tenda_id'=>$req->tendaId,
            'rating' => $req->starRating,
        ]);

        return redirect()->back();
        
    }
    
    // form kebutuhan user
    public function formKebutuhan(){
        return view('user.formKebutuhan');
    }

    // form edit user
    public function formEditProfil(){
        return view('user.formEditProfil');
    }

    // action edit profil user
    public function actionEditProfil(Request $req){
        $userId = Auth::user()->id;
        User::find($userId)->update([
            'nama' => $req->nama_user,
            'username' => $req->username,
        ]);

        return redirect('/user/dashboardUser');;
    }

    
    // LOGIKA REKOMENDASI
    // CONTENT BASED FILTERING
    public function contentBased(Request $req){
        // simpan inputan user dalam variabel
        $key_kebutuhan = $req->key_kebutuhan;
        $key_harga = $req->key_harga;
        if($req->spesifikasi_radio == "ukuran"){
            $key_ukuran = $req->key_ukuran;
            // menggabungkan kebutuhan pengguna untuk dijadikan query
            $inputText = Str::of($key_kebutuhan)->append(' ')->append($key_ukuran)->append(' ')->append($key_harga); 
        }elseif($req->spesifikasi_radio == "kapasitas"){
            $key_kapasitas = $req->key_kapasitas;
            // menggabungkan kebutuhan pengguna untuk dijadikan query
            $inputText = Str::of($key_kebutuhan)->append(' ')->append($key_kapasitas)->append(' ')->append($key_harga); 
        }
        // Ambil Semua Data di tenda di database
        $documents = Tenda::all();

        // PREPROCESSING QUERY (INPUTAN PENGGUNA)
        // CASE FOLDING
        $inputText = strtolower($inputText);
        // REMOVE SPECIAL KARAKTER
        $inputText = preg_replace('/[^a-zA-Z0-9\s]/', ' ', $inputText);
        // echo $dokumenToken;
        // STEMMING
        $stemmer = new StemmerFactory($inputText);
        $stem = $stemmer->createStemmer();
        $inputText = $stem->stem($inputText);
        //echo $inputText;
        // FILTERING
        $stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory(); 
        $stopword = $stopWordRemoverFactory->createStopWordRemover(); 
        $inputText = $stopword->remove($inputText);
        // TOKENIZING
        $inputTokens = explode(' ', $inputText);

        // hitung tf-idf query
        // hitung tf setian token dalam query
        $tfScoresQuery = [];
        foreach ($inputTokens as $token) {
            if (in_array($token, $inputTokens)) { //cek apakah $token ada didalam $inputToken
                $tfScoresQuery[$token] = count(array_keys($inputTokens, $token)); //simpan nilai tf dalam setiap token kedalam variabel (hanya menghitung nilai yang sesuai inputan saja)
            } else {
                $tfScoresQuery[$token] = 0; // Jika token tidak ditemukan, set skornya menjadi 0
            }

            //echo "Kata Kunci : $token, TF : $tfScoresQuery[$token] <br>";
        }  

        // idf query
        $idfScoresQuery = [];
            foreach ($inputTokens as $token) {
                $df = 0; //variabel untuk menyimpan nilai df
                foreach ($documents as $doc) {
                     // cek apakah token berada dalam deskripsi tenda, jika iya maka df ditambah
                    if (stripos($doc->deskripsi, $token) !== false) {
                        $df++;
                    }else{
                        $df = 0;
                    }
                }
                // hitung idf token dalam setiap query dengan rumus log(N/(DF+1))+1
                $idfScoresQuery[$token] = log10(count($documents) / ($df+1))+1;

                //echo "Kata Kunci : $token, IDF : $idfScoresQuery[$token] <br>";
            }
        
        // tfidf query
        $tfidfScoresQuery = [];
        foreach ($inputTokens as $token) {
            $tfidfScoresQuery[$token] = $tfScoresQuery[$token] * $idfScoresQuery[$token];
            //echo "Kata Kunci : $token, IDF : $tfidfScoresQuery[$token] <br>";
        }
        

        // hitung tfidf dokumen
        foreach($documents as $documen){
            // PREPROCESSING DOKUMEN
            // case folding
            $docText = strtolower($documen->deskripsi);
            // REMOVE SPECIAL KARAKTER
            $docText = preg_replace('/[^a-zA-Z0-9\s]/', ' ', $docText);
            // STEMMING
            $stemmer = new StemmerFactory($docText);
            $stem = $stemmer->createStemmer();
            $docText = $stem->stem($docText);
            // FILTERING
            $stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory(); 
            $stopword = $stopWordRemoverFactory->createStopWordRemover(); 
            $docText = $stopword->remove($docText);
            // TOKENIZING
            $documentTokens = explode(' ', strtolower($docText));
            
             // Hitung TF setiap token dalam dokumen
            $tfScoresDoc = [];
            foreach ($inputTokens as $token) {
                if (in_array($token, $documentTokens)) {
                    $tfScoresDoc[$token] = count(array_keys($documentTokens, $token));
                } else {
                    $tfScoresDoc[$token] = 0; // Jika token tidak ditemukan, set skornya menjadi 0
                }
            }  

            // hitung IDF setiap token dalam dokumen
            $idfScoresDoc = [];
            foreach ($inputTokens as $token) {
                $df = 0;
                foreach ($documents as $doc) {
                    if (stripos($doc->deskripsi, $token) !== false) {
                        $df++;
                    }
                }
                
                // hitung idf token dalam setiap dokumen
                if ($df > 0) {
                    $idfScoresDoc[$token] = log10(count($documents) / ($df+1))+1;
                } else {
                    $idfScoresDoc[$token] = 0; // Jika token tidak ditemukan dalam dokumen mana pun, set skornya menjadi 0
                }
            }

            //Menghitung TF-IDF untuk setiap token dalam dokumen
            $tfidfScoresDoc = [];
            foreach ($inputTokens as $token) {
                $tfidfScoresDoc[$token] = $tfScoresDoc[$token] * $idfScoresDoc[$token];
                //echo "Kata : $token, TFIDF : $tfidfScoresDoc[$token] <br>";
            }

            // hitung similarity
            // dot product dokumen antara nilai tfidf query dengan tfidf tiap dokumen
            $dotProduct = 0;
            foreach($inputTokens as $token) {
                $dotProduct += $tfidfScoresDoc[$token] * $tfidfScoresQuery[$token];
            }

             // penyebut query
            $queryNorm = 0;
            foreach($inputTokens as $token) {
                $queryNorm += $tfidfScoresQuery[$token]*$tfidfScoresQuery[$token];
            }
            $queryNorm = sqrt($queryNorm);

             // penyebut dokumen
            $docNorm = 0;
            foreach($inputTokens as $token) {
                $docNorm+= $tfidfScoresDoc[$token]*$tfidfScoresDoc[$token];
            }   
            $docNorm = sqrt($docNorm);

            // cosine similarity
            if($queryNorm !=0 && $docNorm !=0) {
                $cosineSimilarity[$documen->id] = $dotProduct/($queryNorm*$docNorm);
            }else{
                $cosineSimilarity[$documen->id] = 0;
            }

            // urutkan nilai cosine similarity dari yang paling besar
            //arsort($cosineSimilarity);
            // ambil 3 nilai similarity paling besar
            $top3Documents = array_slice($cosineSimilarity, 0, 3, true);

            

        }
            return $top3Documents;
    }
    
    // COLLABORATIVE FILTERING
    public function distance(){
        //get user yang login
        $user1 = Auth::user();
        // get preferensi rating user login
        $userRating = $user1->ratings->pluck('rating','tenda_id');
        // get user lain yang selain admin dan bukan user yang login
        $otherUsers = User::where('role','!=', 'Admin')->where('id','!=',$user1->id)->get();
        // variabel untuk menyimpan nilai similaritas
        $similarities = [];

        // looping user lain selain user yang login dan user yang admin 
        foreach($otherUsers as $otherUser){
            // get preferensi rating user selain user yg login dan admin
            $otherRating = $otherUser->ratings->pluck('rating','tenda_id');
            
            //Menghitung sum/pembilang dari rating yang ada untuk euclidean distance
            $sum = 0;
            // looping user1/user yang login udah merating tenda mana saja
            foreach($userRating as $tendaIdUser => $valRatingUser){
                // looping user lain yg di looping di otherUser udah rating tenda mana aja
                foreach($otherRating as $tendaIdOther => $valRatingOther){
                    // jika tendaIdUser === $tendaIdOther diasumsikan bahwa user1 telah merating item yg sama dengan user lain
                    if($tendaIdUser === $tendaIdOther){
                        $sum += pow($valRatingUser - $valRatingOther,2);
                    }else{
                        $sum+=0;
                    }
                }
            }
            
            //Menghitung Euclidean Distance
            $euclideanDistance = sqrt($sum);
            // menghitung similarity
            $similarity = 1/(1+sqrt($euclideanDistance));
            //Menyimpan similarity antar user1 dengan user lain ke dalam array
            $similarities[$otherUser->id] = $similarity;
            
            //Mengurutkan similarities dari yang terbesar
            arsort($similarities);
            // echo "NILAI SUM $user1->username dan $otherUser->username : $sum, NILAI EUCLIDEAN DISTANCE : $euclideanDistance, NILAI SIMILARITY : ";
            // echo $similarities[$otherUser->id];
            // echo "<br>";
        }
        
        
        $pembilangWeighted = [];
        $totalSimilarity = [];
        $prediksiRating = [];
        foreach ($similarities as $userId => $valSimilarity) {
            // Ambil preferensi rating user lain
            $otherUser = User::find($userId);
            $otherRating = $otherUser->ratings->pluck('rating', 'tenda_id');
            // Looping rating user lain
            foreach ($otherRating as $tendaId => $valRatingOther) {
                // Jika tenda ini belum dirating oleh user yang sedang login
                if (!isset($userRating[$tendaId])) {
                    // Jika tenda belum ada dalam daftar tenda yang belum dirating
                    if (!isset($pembilangWeighted[$tendaId])) {
                        // Tambahkan ke weighted sum
                        $pembilangWeighted[$tendaId] = $valSimilarity * $valRatingOther;
                        $totalSimilarity[$tendaId] = $valSimilarity;
                    } else {
                        // Jika tenda sudah ada dalam daftar, tambahkan nilai weighted sum
                        $pembilangWeighted[$tendaId] += $valSimilarity * $valRatingOther;
                        $totalSimilarity[$tendaId] += $valSimilarity; 
                    }
                }
            }
           
        }
        
        foreach ($pembilangWeighted as $tendaId => $weightedSum) {
            // Jika total similarity tidak nol, hitung nilai prediksi rating
            if ($totalSimilarity != 0) {
                $prediksiRating[$tendaId] = $weightedSum / $totalSimilarity[$tendaId];
            } else {
                $prediksiRating[$tendaId] = 0; // Atau nilai default yang sesuai
            }
        }
        
        // foreach ($pembilangWeighted as $tendaId => $weightedSum) {
        //     $datas = Tenda::find($tendaId);
        //     echo "$user1->username, $datas->nama_tenda = Pembilang $weightedSum, Penyebut ";
        //     echo $totalSimilarity[$tendaId];
        //     echo " Rating : ";
        //     echo round($prediksiRating[$tendaId]);
        //     echo "<br>";
            
        // }
        arsort($prediksiRating);
        return $prediksiRating;
        
    }

    // HYBRID FILTERING
    public function testHybrid(Request $req){
        $collaborativePred = $this->distance();
        $contentBasedSim = $this->contentBased($req);
        $mixedPredictions = [];
        $dataTenda = Tenda::all();
    
        // Looping melalui similarity dari content-based
        foreach ($contentBasedSim as $userId => $similarity) {
            // Cek apakah user memiliki prediksi dari collaborative filtering
            if (isset($collaborativePred[$userId])) {
                // Hitung prediksi gabungan dengan bobot similarity
                $mixedPredictions[$userId] = $collaborativePred[$userId] + $similarity;
            }else{
                $mixedPredictions[$userId] = $similarity;
            }
        }
        
        arsort($mixedPredictions);
        // Kembalikan prediksi gabungan
        return view('test',['datas' => $mixedPredictions, 'tendas' => $dataTenda] );
    }
    
}