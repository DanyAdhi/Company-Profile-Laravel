<?php

use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about = new \App\About;
        $about->caption = '<p>Selamat datang di [Nama Agen Travel], agen travel terpercaya yang berlokasi di jantung budaya Indonesia, Jogjakarta. Berdiri sejak tahun 1945, kami telah melayani wisatawan dari seluruh penjuru dunia dengan dedikasi dan semangat yang tak pernah pudar.</p><p>Sejak didirikan, kami berkomitmen untuk memberikan pengalaman perjalanan terbaik dengan berbagai pilihan paket wisata yang menarik dan beragam. Kami bangga menjadi bagian dari sejarah pariwisata Jogjakarta dan telah tumbuh bersama kota ini selama lebih dari tujuh dekade.</p><p>Visi kami adalah untuk terus menjadi agen travel yang inovatif, memberikan layanan yang berkualitas, dan menciptakan kenangan tak terlupakan bagi setiap pelanggan. Dengan tim profesional dan berpengalaman, kami siap membantu Anda menjelajahi keindahan alam, kekayaan budaya, dan warisan sejarah yang ada di Jogjakarta dan sekitarnya.</p><p>Terima kasih telah mempercayakan perjalanan Anda kepada kami. Mari bersama-sama menciptakan petualangan yang luar biasa dan memori yang abadi.</p>';
        $about->image = '1580829269_journey.svg';
        $about->save();
        $this->command->info("About berhasil di insert");
    }
}
