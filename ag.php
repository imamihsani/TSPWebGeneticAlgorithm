<?php
class AG
{
    var $TITIK = array(); //nama titik
    var $num_crommosom; //jumlah kromosom awal yang dibangkitkan
    var $data = array(); //jarak antar titik
    var $generation = 0; //generasi ke....
    var $max_generation = 100; //maksimal generasi
    var $crommosom = array(); //array kromosom sesuai $num_cromosom 
    var $success = false; //keadaan jika sudah ada sulosi terbaik
    var $debug = true; //menampilkan debug jika diset true;  
    var $fitness = array(); //nilai fitness setiap kromosom
    var $console = ""; //menyimpan proses algoritma 

    var $total_fitness = 0; //menyimpan total fitness untuk masing-masing kromosom
    var $probability  = array(); //menyimpan probabilitas fitness masing-masing kromosom
    var $com_pro = array(); //menyimpan fitness komulatif untuk masing masing kromosom
    var $rand = array(); //menyimpan bilangan rand())
    var $parent = array(); //menyimpan parent saat crossover

    var $best_fitness = 0; //menyimpan nilai fitness tertinggi
    var $best_cromossom = array(); //menyimpan kromosom dengan fitness tertinggi 

    var $crossover_rate = 75; //prosentase kromosom yang akan dipindah silang
    var $mutation_rate = 25; //prosentase kromosom yang akan dimutasi

    var $time_start; //menyimpan waktu mulai proses algotitma
    var $time_end; //menyimpan waktu selesai proses algoritma

    var $fitness_history = array(); //histori fitness

    var $temp = array(); //variabel sementara

    var $titik_awal = ''; //titik awal

    /**
     * konstruktor ketiga pertama kali memanggil class AG
     * @param array $data Jarak antar titik dalam km
     * @param string $titik_awal Titik awal rute
     * @param array $titik Nama titik
     */
    function __construct($data, $titik_awal, $titik)
    {
        $this->TITIK = $titik;
        $this->data = $data;
        $this->titik_awal = $titik_awal;

        // mengatur fitness terbaik dengan nilai terbesar (jumlah semua jarak titik)
        foreach ($data as $key => $val) {
            $this->best_fitness += array_sum($val);
        }
    }
    /**
     * mulai memproses algoritma     
     */
    function generate()
    {
        $this->time_start = microtime(true); //seting watu awal eksekusi        
        $this->generate_crommosom();
        /**
         * proses algoritma akan diulang sampai memperoleh nilai 1
         * atau sudah mencapai maksimum generasi (sesuai yang diinputkan)
         */
        while (($this->generation < $this->max_generation) && $this->success == false) {
            $this->generation++;
            $this->console .= "<h4>Generasi ke-$this->generation</h4>";
            $this->show_crommosom();
            $this->calculate_all_fitness();
            $this->show_fitness();

            if (!$this->success) { //jika fitness terbaik belum mencapai 0, dilanjutkan ke proses seleksi
                $this->get_com_pro();
                $this->selection();
                $this->show_crommosom();
                $this->calculate_all_fitness();
                $this->show_fitness();
            }
            if (!$this->success) { //jika fitness terbaik belum mencapai 1, dilanjutkan ke proses crossover
                $this->crossover();
                $this->show_crommosom();
                $this->calculate_all_fitness();
                $this->show_fitness();
            }
            if (!$this->success) { //jika fitness terbaik belum mencapai 1, dilanjutkan ke proses mutasi
                $this->mutation();
                $this->show_crommosom();
                $this->calculate_all_fitness();
                $this->show_fitness();
            }
        }

        //menyimpan waktu selesai
        $this->time_end = microtime(true); //seting waktu akhir eksekusi
        //mencari selisih waktu mulai dan selesai
        $time = $this->time_end - $this->time_start;

        /**
         * menampilan hasil algoritma
         */
        echo "<pre style='font-size:0.8em'>\nFITNESS TERBAIK/RUTE TERPENDEK: $this->best_fitness";
        echo "\nWAKTU EKSEKUSI: $time seconds";
        echo "\nPEMAKAIAN MEMORI: " . memory_get_usage() / 1024 . ' kilo bytes';
        echo "\nHASIL KROMOSOM/REKOMENDASI RUTE TERBAIK:  " . $this->print_cros($this->best_cromossom) . "</pre>";

        //menampilkan proses algoritma                             
        $this->get_debug();
        return $this->best_cromossom;
    }

    /**
     * menampilkan print out dari proses algoritma
     */
    function get_debug()
    {
        if ($this->debug)
            echo "<pre style='font-size:0.8em'>$this->console</pre>";
    }
    /**
     * proses mutasi pada AG
     * mutasi dilakukan sesuai prosentase "Mutation Rate" yang diinputkan
     */
    function mutation()
    {
        $this->console .= "<h5>Mutasi generasi ke-$this->generation</h5>";
        //jumlah gen per kromosom (jumlah titik dipilih)
        $gen_per_cro = count($this->data) - 1;
        //total semua gen dalam semua kromosom
        $total_gen = count($this->crommosom) * $gen_per_cro;
        //total mutasi sesuai MR
        $total_mutation = ceil($this->mutation_rate / 100 * $total_gen);

        //melakukan mutasi sejumlah total mutasi
        for ($a = 1; $a <= $total_mutation; $a++) {
            $val = rand(1, $total_gen);

            $cro_index = ceil($val / $gen_per_cro) - 1;
            $gen_index1 = (($val - 1)  % $gen_per_cro) + 1;
            $gen_index2 = rand(0, $gen_per_cro - 1) + 1;

            $gen1 = $this->crommosom[$cro_index][$gen_index1];
            $gen2 = $this->crommosom[$cro_index][$gen_index2];


            $this->console .= "rand($val): [$cro_index, $gen_index1 x $gen_index2] = " . implode(',', $this->kode_to_nama($this->crommosom[$cro_index]));

            //menukar gen terpilih untuk mutasi secara acak
            $this->crommosom[$cro_index][$gen_index1] = $gen2;
            $this->crommosom[$cro_index][$gen_index2] = $gen1;

            $this->console .= " = " . implode(',', $this->kode_to_nama($this->crommosom[$cro_index])) . " \n";
        }
        return false;
    }
    //mencari nilai crossover dari dua induk
    function get_crossover($key1, $key2)
    {

        $this->temp['induk'] .= "chro[$key1] x chro[$key2] \n";

        $cro1 = (array) $this->crommosom[$key1];
        $cro2 = (array) $this->crommosom[$key2];

        $jumlah_gen = count($cro1);

        //menentukan titik persilangan
        $offspring = rand(1, $jumlah_gen - 2);

        //mengambil gen sebelum titik persilangan di induk 1
        foreach ($cro1 as $key => $val) {
            if ($key <= $offspring)
                $new_cro[$key] = $val;
        }

        //mengambil gen sisanya di induk2
        foreach ($cro2 as $key => $val) {
            if (!in_array($val, $new_cro))
                $new_cro[] = $val;
        }
        $new_cro[] = $cro1[0];

        $this->temp['point'] .= "C[$key1] = $offspring \n";
        $this->temp['detail'] .= "Offspring[$key1] = chromosome[$key1] x chromosome[$key2] \n";
        $this->temp['detail'] .= '            = [' . implode(',', $this->kode_to_nama($cro1)) . '] x [' . implode(',', $this->kode_to_nama($cro2)) . "] \n";
        $this->temp['detail'] .= '            = [' . implode(',', $this->kode_to_nama($new_cro)) . "] \n";

        return $new_cro;
    }
    /**
     * proses Crossover (pindah silang pada AG)
     */
    function crossover()
    {
        $this->console .= "<h5>Pindah silang generasi ke-$this->generation</h5>";
        $parent = array();

        //menentukan kromosom mana saja sebagai induks
        //jumlahnya berdasarkan crossover rate 

        $this->console .= "Pertama kita bangkitkan bilangan acak R sebanyak jumlah populasi";
        foreach ($this->crommosom as $key => $val) {
            $rnd = mt_rand() / mt_getrandmax();
            $this->console .= "\nrand([$key]) : " . round($rnd, 3);
            if ($rnd <= $this->crossover_rate / 100)
                $parent[] = $key;
        }

        //menampilkan parent/induk setiap pindah silang        
        foreach ($parent as $key => $val) {
            $this->console .= "Parent[$key] : $val \n";
            $this->console .= "Ofspring[$val] : ";
        }

        $parent = $parent;
        $c = count($parent);

        //mulai proses pindah silang sesuai jumlah induk
        $this->temp['induk'] = '';
        $this->temp['detail'] = '';
        $this->temp['point'] = '';
        if ($c > 1) {
            for ($a = 0; $a < $c - 1; $a++) {
                $new_cro[$parent[$a]] = $this->get_crossover($parent[$a],  $parent[$a + 1]);
            }
            $this->console .= "Ofspring[" . $parent[($c - 1)] . "] = chromosome[" . $parent[($c - 1)] . "] x chromosome[$parent[0]] \n";
            $new_cro[$parent[$c - 1]] = $this->get_crossover($parent[$c - 1],  $parent[0]);

            //menyimpan kromosom hasil pindah silang dan fitnessnya
            foreach ($new_cro as $key => $val) {
                $this->crommosom[$key] = $val;
            }
        }

        $this->console .= "\nInduk crossover: \n" . $this->temp['induk'];
        $this->console .= "Point: \n" . $this->temp['point'];
        $this->console .= "Proses crossover: \n" . $this->temp['detail'];
        $this->console .= "Dengan demikian populasi chromosome setelah melalui proses crossover adalah: \n";
    }

    /**
     * memilih berdasarkan bilangan random yang diinputkan
     * */
    function choose_selection($rand_numb = 0)
    {
        foreach ($this->com_pro as $key => $val) {
            if ($rand_numb <= $val)
                return $key;
        }
    }
    /**
     * Membuat bilangan acak sesuai jumlah kromosom
     */
    function get_rand()
    {
        $this->rand = array();
        foreach ($this->fitness as $key => $val) {
            $r = mt_rand() / mt_getrandmax();
            $this->rand[] = $r;
            $this->console .= "R[$key] : $r \n";
        }
    }
    /**
     * proses seleksi, memilih gen secara acak
     * dimana fitness yang besar mendapatkan kesempata yang lebih besar
     */
    function selection()
    {
        $this->console .= "<h5>Seleksi generasi ke-$this->generation</h5>";
        $this->get_rand();
        $new_cro = array();
        //melakukan proses seleksi sesuai bilangan random
        foreach ($this->rand as $key => $val) {
            $k = $this->choose_selection($val);
            $new_cro[$key] = $this->crommosom[$k];
            //mengisi nilai fitness sesuai kromosom yang diseleksi
            $this->fitness[$key] = $this->fitness[$k];
            $this->console .= "K[$key] = rand(" . round($val, 3) . ") = K[$k] \n";
        }
        $this->crommosom = $new_cro;
    }

    /**
     * mencari probabilitas untuk setiap fitness
     * rumusnya adalah  fitness / total fitness
     */
    function get_probability()
    {
        $this->probability = array();
        $arr = array();
        foreach ($this->fitness as $key => $val) {
            $arr[$key] = $val == 0 ? 0 : 1 / $val;
        }
        foreach ($arr as $key => $val) {
            $x = (array_sum($arr) == 0) ? 0 : $val / array_sum($arr);
            $this->probability[] = $x;
            $this->console .= "P[$key] : $x \n";
        }
        $this->console .= "Total Probabilitas: " . array_sum($this->probability) . "\n";
        return $this->probability;
    }
    /**
     * mencari nilai probabilitas komulatif
     * 
     * */
    function get_com_pro()
    {
        $this->get_probability();
        $this->com_pro = array();
        $x = 0;
        foreach ($this->probability as $key => $val) {
            //menambahkan terus probabilitas 
            $x += $val;
            $this->com_pro[] = $x;
            $this->console .= "PK[$key] : $x \n";
        }
        $this->com_pro;
    }
    /**
     * menghitung total fitness dari semua kromosom
     */
    function get_total_fitness()
    {
        $this->total_fitness = 0;
        foreach ($this->fitness as $key => $val) {
            $this->total_fitness += $val;
        }
        return $this->total_fitness;
    }
    /**
     * menampilkan nilai fitnes untuk masing-masing kromosom
     */
    function show_fitness()
    {
        foreach ($this->fitness as $key => $val) {
            $this->console .= "F[$key]: $val \n";
        }
        $this->get_total_fitness();
        //menampilkan total fitness
        $this->console .= "Total Fitness: " . $this->total_fitness . "\n";
    }
    /**
     * mengecek apakah algoritma berhenti
     */
    function is_stop()
    {
        //batas fitness sama adalah 10, artinya jika sudah 10 kali tetap sama fitness terbaik, maka stop
        $total = 10;

        //jika jumlah fitness histori masih kurang dari 10 maka belum berhenti
        if (count($this->fitness_history) < $total)
            return false;
        $this->fitness_history = array_values($this->fitness_history);
        unset($this->fitness_history[0]);
        $arr =  $this->fitness_history;
        //jika sama semua maka stop
        if (count(array_unique($arr)) == 1) {
            return true;
        }
        return false;
    }
    /**
     * menghitung fitnes pada kromosom tertentu
     * fitness adalah jarak tempuk antar titik di kromosom 
     */
    function calculate_fitness($key)
    {
        $cro = (array)$this->crommosom[$key];
        $data = $this->data;
        $fitness = 0;
        for ($a = 1; $a < count($cro); $a++) {
            $fitness += $data[$cro[$a - 1]][$cro[$a]];
        }
        $this->fitness[$key] = $fitness;
        return $fitness;
    }
    /**
     * menghitung fitness pada semua kromosom
     */
    function calculate_all_fitness()
    {
        //memanggil fungsi hitung fitness untuk semua kromosom
        foreach ($this->crommosom as $key => $val) {
            $this->calculate_fitness($key);
        }
        //mencari nilai terkecil fitness
        $min = min($this->fitness);
        $key = array_keys($this->fitness, min($this->fitness));
        $key = $key[0];
        //menyimpan indeks fitness terkecil ke fitness histori
        $this->fitness_history[] = $min;

        //jika fitness terkecil lebih bagus dari fitness terbaik global
        if ($min < $this->best_fitness) {
            //simpan fitness terbaik 
            $this->best_fitness = $min;
            //simpan kromosom terbaik
            $this->best_cromossom = $this->crommosom[$key];
        }
        //menampilkan fitness histori
        $this->console .= "SEKUMPULAN FITNESS TERBAIK: " . implode(",", $this->fitness_history) . "\n";
        if ($this->is_stop()) // jika sudah optimal maka berhenti
            $this->success = true;
    }
    /**
     * Mengubah kode titik menjadi nama
     */
    function kode_to_nama($kode)
    {
        $arr = array();
        foreach ((array) $kode as $val) {
            $arr[] = $this->TITIK[$val];
        }
        return $arr;
    }
    /**
     * menampilkan satu kromosom
     */
    function print_cros($cro)
    {
        //menampilkan gen di kromosom dipisahkan dengan koma
        return implode(', ', $this->kode_to_nama($cro));
    }

    /**
     * menampilkan semua kromosom 
     */
    function show_crommosom()
    {
        $a = array();
        foreach ($this->crommosom as $key => $val) {
            //menampilkan kromosom dipisahkan dengan enter
            $a[] =  "Cro $key: " . $this->print_cros($val);
        }
        $this->console .= implode(" \n", $a) . "\n";
    }

    /**
     * membuat kromoson random(acak)
     */
    function get_rand_crommosom()
    {
        //gen kromosom pertama adalah titik awal
        $arr = array($this->titik_awal);
        $x = $this->data;
        //menghilangkan titik tujuan yang sama dengan titik awal
        unset($x[$this->titik_awal]);
        $keys = array_keys($x);
        //mengacak urutan titik tujuan
        shuffle($keys);
        //menggabungkan titik awal dan titik tujuan
        return array_merge($arr, $keys, $arr);
    }
    /**
     * membuat kromosom awal sesuai jumlah kromosom yang diinputkan
     */
    function generate_crommosom()
    {
        $i = 0;
        while ($i < $this->num_crommosom) { //diulang sesuai jumlah kromosom yang diinputkan
            $cro = $this->get_rand_crommosom();
            $this->crommosom[] = $cro;
            $this->fitness[] = 0; //fitness awal diberik nilai 0
            $i++;
        }
    }
}
