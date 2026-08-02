<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Article;
use App\Models\CaseStudy;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CmsContentSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->seedServices();
        $this->seedTeamMembers();
        $this->seedCaseStudies();
        $this->seedArticles();
    }

    private function seedServices(): void
    {
        $services = [
            [
                'title' => 'Audit & Asurans',
                'slug' => 'audit-asurans',
                'icon' => 'audit',
                'summary' => 'Audit laporan keuangan sesuai standar, audit internal, review, dan jasa asurans untuk memastikan kepatuhan SAK & regulasi.',
                'content' => '<p>Memberikan keyakinan kepada pemangku kepentingan bahwa laporan keuangan Anda akurat, leng, dan sesuai standar yang berlaku.</p>'
                    .'<ul>'
                    .'<li>Audit laporan keuangan (SAK)</li>'
                    .'<li>Audit internal</li>'
                    .'<li>Review laporan keuangan</li>'
                    .'<li>Audit khusus &amp; investigatif</li>'
                    .'<li>Due diligence (M&amp;A)</li>'
                    .'<li>Jasa asurans terkait</li>'
                    .'</ul>',
            ],
            [
                'title' => 'Perpajakan',
                'slug' => 'perpajakan',
                'icon' => 'tax',
                'summary' => 'Perencanaan pajak, perhitungan PPh & PPN, penyusunan SPT Tahunan, hingga pendampingan pemeriksaan pajak.',
                'content' => '<p>Tim pajak bersertifikat BKP kami memastikan Anda patuh dan memanfaatkan seluruh insentif fiskal secara legal.</p>'
                    .'<ul>'
                    .'<li>PPh 21, 22, 23, 25, 26</li>'
                    .'<li>PPN &amp; e-Faktur</li>'
                    .'<li>SPT Tahunan PPh Badan &amp; OP</li>'
                    .'<li>Perencanaan pajak (tax planning)</li>'
                    .'<li>Pendampingan pemeriksaan</li>'
                    .'<li>Banding &amp; keberatan pajak</li>'
                    .'<li>Tax review &amp; health check</li>'
                    .'</ul>',
            ],
            [
                'title' => 'Konsultasi Bisnis',
                'slug' => 'konsultasi-bisnis',
                'icon' => 'consulting',
                'summary' => 'Konsultasi manajemen, evaluasi pengendalian internal, penyusunan SOP, dan strategi pengembangan usaha.',
                'content' => '<p>Mendampingi Anda menyusun strategi, merapikan proses, dan mengambil keputusan bisnis yang lebih baik dengan data yang akurat.</p>'
                    .'<ul>'
                    .'<li>Konsultasi manajemen</li>'
                    .'<li>Evaluasi pengendalian internal</li>'
                    .'<li>Penyusunan SOP &amp; sistem</li>'
                    .'<li>Analisis kelayakan &amp; investasi</li>'
                    .'<li>Pendampingan pengembangan usaha</li>'
                    .'<li>Pendampingan perolehan pembiayaan</li>'
                    .'</ul>',
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                [
                    'title' => $service['title'],
                    'icon' => $service['icon'],
                    'summary' => $service['summary'],
                    'content' => $service['content'],
                    'is_active' => true,
                ]
            );
        }
    }

    private function seedTeamMembers(): void
    {
        $members = [
            [
                'name' => 'Drs. Chaeroni',
                'position' => 'Managing Partner · Ak., CPA',
                'bio' => 'Berpengalaman lebih dari 25 tahun di bidang audit, perpajakan, dan konsultasi bisnis. Berkomitmen menghadirkan layanan  yang profesional, kompeten, dan berintegritas.',
                'certifications' => ['Audit', 'Strategi'],
            ],
            [
                'name' => 'Siti Rahmawati',
                'position' => 'Partner Audit · CA',
                'bio' => 'Memimpin tim audit untuk 100+ klien korporasi, spesialis sektor manufaktur & properti.',
                'certifications' => ['Audit', 'SAK'],
            ],
            [
                'name' => 'Budi Santoso',
                'position' => 'Kepala Perpajakan · BKP',
                'bio' => 'Ahli pajak dengan rekam jejak penanganan pemeriksaan & keberatan senilai miliaran rupiah.',
                'certifications' => ['PPh', 'PPN', 'Sengketa'],
            ],
            [
                'name' => 'Dewi Lestari',
                'position' => 'Senior Auditor · CA',
                'bio' => 'Berpengalaman lebih dari 8 tahun menangani audit laporan keuangan berbagai sektor industri.',
                'certifications' => ['Audit', 'SAK'],
            ],
            [
                'name' => 'Rizky Hidayat',
                'position' => 'Senior Konsultan Bisnis · CPA',
                'bio' => 'Spesialis financial modelling, valuasi, dan pendampingan pengembangan usaha.',
                'certifications' => ['Strategi', 'Modelling'],
            ],
            [
                'name' => 'Maya Puspita',
                'position' => 'Konsultan Perpajakan · BKP',
                'bio' => 'Menangani kepatuhan pajak bulanan hingga SPT Tahunan untuk klien lintas sektor.',
                'certifications' => ['PPh', 'PPN'],
            ],
        ];

        foreach ($members as $index => $member) {
            TeamMember::updateOrCreate(
                ['slug' => $member['slug'] ?? $this->slugify($member['name'])],
                [
                    'name' => $member['name'],
                    'position' => $member['position'],
                    'bio' => $member['bio'],
                    'certifications' => $member['certifications'],
                    'sort_order' => $index,
                    'is_active' => true,
                ]
            );
        }
    }

    private function seedCaseStudies(): void
    {
        $studies = [
            [
                'client_name' => 'PT Nusa Tex',
                'industry' => 'Manufaktur',
                'challenge' => 'Perusahaan tekstil dengan 3 pabrik dan 2.000+ karyawan. Pembukuan manual menyulitkan rekonsiliasi dan closing memakan 2 minggu. Tim kami merancang ulang chart of accounts dan mengimplementasikan ERP keuangan.',
                'solution' => 'Restrukturisasi sistem pembukuan dan implementasi ERP keuangan terintegrasi.',
                'results' => 'Closing laporan kini selesai dalam hitungan hari dengan data yang sepenuhnya traceable.',
                'metrics' => ['Efisiensi biaya admin' => '+35%', 'Closing lebih cepat' => '3x', 'Traceable' => '100%'],
                'is_featured' => true,
            ],
            [
                'client_name' => 'Garda Bakti Retail',
                'industry' => 'Ritel',
                'challenge' => 'Ritel 20 cabang ingin memperoleh kredit ekspansi namun laporan tidak bankable. Kami melakukan rekonstruksi pembukuan 2 tahun, audit review, dan menyusun laporan sesuai standar perbankan.',
                'solution' => 'Penataan laporan keuangan selama 2 tahun dan penyusunan laporan bankable.',
                'results' => 'Kredit ekspansi disetujui dan ekspansi 20 cabang berjalan sesuai rencana.',
                'metrics' => ['Kredit disetujui' => 'Rp 25M', 'Audit lulus' => '6 bln', 'Cabang baru' => '20'],
                'is_featured' => true,
            ],
            [
                'client_name' => 'Segara Teknologi',
                'industry' => 'Teknologi',
                'challenge' => 'Startup SaaS menghadapi potensi koreksi fiskal saat due diligence investor. Kami menormalisasi pencatatan, menyusun tax provision, dan mendampingi seluruh proses hingga penandatanganan.',
                'solution' => 'Normalisasi pencatatan keuangan dan penyusunan tax provision sesuai standar investor.',
                'results' => 'Pendanaan Seri A tercapai dengan tingkat kepatuhan pajak 100%.',
                'metrics' => ['Pendanaan Seri A' => 'US$ 2J', 'Compliance' => '100%', 'Koreksi fiskal' => '0'],
                'is_featured' => true,
            ],
            [
                'client_name' => 'Prima Log',
                'industry' => 'Logistik',
                'challenge' => 'Perusahaan logistik ekspor-impor kehilangan potensi restitusi PPN akibat dokumen tidak leng. Kami merapikan arsip, menyusun klaim restitusi, dan berhasil mengembalikan kas ke perusahaan.',
                'solution' => 'Perapian arsip dokumen dan penyusunan klaim restitusi PPN.',
                'results' => 'Restitusi PPN berhasil dikembalikan dan beban pajak turun signifikan.',
                'metrics' => ['Restitusi berhasil' => 'Rp 8,7M', 'Proses restitusi' => '60 hr', 'Beban pajak' => '-18%'],
            ],
            [
                'client_name' => 'Alam Sinar',
                'industry' => 'Jasa',
                'challenge' => 'Perusahaan manufaktur dengan 3 pabrik menghadapi potensi koreksi pajak saat pemeriksaan. Kami melakukan tax review, merapikan pembukuan sesuai ketentuan, dan menyiapkan dokumentasi pendukung sehingga klien terhindar dari sengketa.',
                'solution' => 'Tax review menyeluruh dan penyusunan dokumentasi pendukung pemeriksaan.',
                'results' => 'Klien terhindar dari sengketa dengan penghematan pajak yang signifikan.',
                'metrics' => ['Penghematan pajak' => 'Rp 2,4M', 'Risiko koreksi' => '-60%', 'Sengketa pajak' => '0'],
            ],
            [
                'client_name' => 'Mitra Jaya',
                'industry' => 'Konstruksi',
                'challenge' => 'Kontraktor dengan 5 entitas anak menghadapi beban pajak tinggi dan risiko sengketa. Kami menyusun transfer pricing document dan strategi konsolidasi yang menghemat miliaran rupiah secara legal.',
                'solution' => 'Penyusunan transfer pricing documentation dan strategi konsolidasi entitas.',
                'results' => 'Beban pajak turun secara legal dan seluruh entitas tertata rapi.',
                'metrics' => ['Penghematan pajak' => 'Rp 3,2M', 'Entitas ditata' => '5', 'Sengketa pajak' => '0'],
            ],
        ];

        foreach ($studies as $study) {
            CaseStudy::updateOrCreate(
                ['slug' => $this->slugify($study['client_name'])],
                [
                    'client_name' => $study['client_name'],
                    'industry' => $study['industry'],
                    'challenge' => $study['challenge'],
                    'solution' => $study['solution'],
                    'results' => $study['results'],
                    'metrics' => $study['metrics'],
                    'nda_compliant' => true,
                    'is_featured' => $study['is_featured'] ?? false,
                    'is_active' => true,
                ]
            );
        }
    }

    private function seedArticles(): void
    {
        $articles = [
            [
                'title' => 'Cara Menghitung PPh 21 Terbaru 2026: Panduan Leng untuk HR & Finance',
                'category' => 'Perpajakan',
                'published_at' => '2026-07-15 08:00:00',
                'excerpt' => 'Regulasi tarif efektif PPh 21 berubah setiap tahun. Pelajari metode TER (Tarif Efektif Rata-rata), contoh perhitungan gaji bulanan, dan kesalahan umum yang sering terjadi.',
                'body' => '<p>Pemotongan PPh 21 adalah kewajiban yang paling sering dihadapi perusahaan setiap bulannya. Sayangnya, perubahan regulasi tarif efektif sering membuat HR dan finance kebingungan. Artikel ini akan memandu Anda langkah demi langkah.</p>'
                    .'<h2>Apa Itu Tarif Efektif Rata-rata (TER)?</h2>'
                    .'<p>Sejak diterapkannya PER-2/PJ/2024, penghitungan PPh 21 bulanan menggunakan metode Tarif Efektif Rata-rata (TER). Metode ini menyederhanakan perhitungan dengan menerapkan persentase tarif langsung pada penghasilan bruto bulanan, kemudian dikoreksi pada masa pajak terakhir (Desember).</p>'
                    .'<p>Rumus dasar: <strong>PPh 21 Bulanan = Penghasilan Bruto × Tarif Efektif</strong> (berdasarkan kategori TER A/B/C).</p>'
                    .'<h2>Contoh Perhitungan Gaji Bulanan</h2>'
                    .'<p>Berikut contoh kasus karyawan berstatus lajang tanpa tanggungan (TK/0) dengan gaji Rp 10.000.000 per bulan. Dengan tunjangan tetap Rp 1.000.000, penghasilan bruto menjadi Rp 11.000.000. Menggunakan TER A untuk TK/0 sebesar 6%, PPh 21 yang dipotong per bulan adalah <strong>Rp 660.000</strong>.</p>'
                    .'<h2>an Menggunakan TER A, B, atau C?</h2>'
                    .'<p>Penentuan kategori bergantung pada status PTKP dan penghasilan bruto bulanan. Secara umum, penghasilan di bawah Rp 10 juta per bulan menggunakan kategori A atau B, sementara kategori C berlaku untuk penghasilan di atas Rp 13,9 juta per bulan.</p>'
                    .'<h2>Kesalahan Umum yang Sering Terjadi</h2>'
                    .'<ul>'
                    .'<li>Menerapkan tarif lama (tarif progresif bulanan) pada penghitungan bulanan.</li>'
                    .'<li>Salah menentukan kategori TER karena status PTKP tidak diperbarui.</li>'
                    .'<li>Melupakan koreksi di masa pajak Desember menggunakan tarif progresif sebenarnya.</li>'
                    .'<li>Tidak merekonsiliasi data gaji dengan bukti potong 1721-A1.</li>'
                    .'</ul>'
                    .'<h2>Kesimpulan</h2>'
                    .'<p>Metode TER memang membuat perhitungan bulanan lebih sederhana, tetapi tetap memerlukan ketelitian pada masa pajak Desember dan saat menyusun bukti potong tahunan. Jika Anda merasa perhitungan pajak mulai rumit, tim pajak  Drs. Chaeroni &amp; Rekan siap membantu.</p>',
            ],
            [
                'title' => '7 Tips Pembukuan Sederhana untuk UMKM yang Baru Mulai',
                'category' => 'Akuntansi',
                'published_at' => '2026-07-08 08:00:00',
                'excerpt' => 'Tidak perlu software mahal. Ini cara membukukan arus kas dengan benar meski hanya pakai spreadsheet.',
                'body' => '<p>Banyak pemilik UMKM menganggap pembukuan itu rumit dan mahal. Padahal, dengan disiplin dan cara yang benar, pembukuan sederhana bisa dilakukan hanya dengan spreadsheet.</p>'
                    .'<h2>1. Pisahkan Keuangan Pribadi dan Usaha</h2>'
                    .'<p>Langkah pertama yang paling penting adalah memiliki rekening bank terpisah untuk usaha. Ini memudahkan Anda melacak arus kas dan menghindari masalah pajak di kemudian hari.</p>'
                    .'<h2>2. Catat Setiap Transaksi</h2>'
                    .'<p>Catat pemasukan dan pengeluaran setiap hari. Konsistensi jauh lebih penting daripada kerumitan.</p>'
                    .'<h2>3. Kelompokkan Pengeluaran</h2>'
                    .'<p>Buat kategori sederhana seperti pembelian bahan, gaji, transportasi, dan operasional agar laporan laba rugi mudah disusun.</p>'
                    .'<h2>4. Simpan Semua Bukti Transaksi</h2>'
                    .'<p>Simpan struk, invoice, dan bukti transfer secara rapi. Ini penting saat rekonsiliasi dan pemeriksaan pajak.</p>'
                    .'<h2>5. Rutin Rekonsiliasi Bank</h2>'
                    .'<p>Bandingkan catatan kas dengan mutasi bank setiap bulan untuk memastikan tidak ada selisih.</p>'
                    .'<h2>6. Sisihkan Pajak sejak Awal</h2>'
                    .'<p>Alokasikan estimasi pajak dari setiap penjualan agar tidak terkejut saat jatuh tempo.</p>'
                    .'<h2>7. Evaluasi Bulanan</h2>'
                    .'<p>Gunakan laporan sederhana untuk mengevaluasi kesehatan keuangan dan merencanakan langkah berikutnya.</p>',
            ],
            [
                'title' => 'Mengenal Regulasi PPN Terbaru dan Dampaknya pada Bisnis Anda',
                'category' => 'Perpajakan',
                'published_at' => '2026-07-01 08:00:00',
                'excerpt' => 'Perubahan tarif dan perluasan objek PPN memengaruhi harga jual dan arus kas. Simak analisis dampaknya.',
                'body' => '<p>Regulasi PPN terus berkembang. Perubahan tarif dan perluasan objek pajak berdampak langsung pada harga jual, arus kas, dan margin bisnis Anda.</p>'
                    .'<h2>Apa Saja yang Berubah?</h2>'
                    .'<p>Perubahan regulasi umumnya mencakup tarif PPN, kategori barang kena pajak, serta tata cara pelaporan e-Faktur. Pelaku usaha perlu memastikan transisi ini berjalan mulus.</p>'
                    .'<h2>Dampak pada Bisnis</h2>'
                    .'<ul>'
                    .'<li>Penyesuaian harga jual agar margin tetap terjaga.</li>'
                    .'<li>Pengelolaan arus kas atas kewajiban PPN keluaran.</li>'
                    .'<li>Pembaruan sistem akuntansi dan faktur pajak.</li>'
                    .'</ul>'
                    .'<h2>Langkah yang Bisa Dilakukan</h2>'
                    .'<p>Lakukan tax health check secara berkala, pastikan e-Faktur terisi benar, dan pertimbangkan skema restitusi PPN bagi perusahaan dengan PPN masukan lebih besar.</p>'
                    .'<p>Tim perpajakan kami siap membantu Anda memahami dan menyesuaikan bisnis dengan regulasi PPN terbaru.</p>',
            ],
            [
                'title' => '5 Kesalahan Fiskal yang Sering Dilakukan Startup Sebelum Fundraising',
                'category' => 'Keuangan',
                'published_at' => '2026-06-24 08:00:00',
                'excerpt' => 'Due diligence investor akan membongkar masalah pajak. Antisipasi 5 kesalahan ini sejak dini.',
                'body' => '<p>Fundraising adalah momen krusial bagi startup. Sebelum investor menandatangani, tim due diligence akan memeriksa seluruh catatan pajak dan keuangan Anda.</p>'
                    .'<h2>1. Pencatatan Keuangan Tidak Rapi</h2>'
                    .'<p>Menggunakan satu rekening untuk operasional dan pribadi membuat audit internal menjadi sulit.</p>'
                    .'<h2>2. Terlambat Menyetor Pajak</h2>'
                    .'<p>Keterlambatan penyetoran PPh dan PPN memicu sanksi bunga yang terlihat saat due diligence.</p>'
                    .'<h2>3. Salah Klasifikasi Pengeluaran</h2>'
                    .'<p>Pengeluaran yang tidak didukung bukti akan dikoreksi dan berpotensi menaikkan beban pajak.</p>'
                    .'<h2>4. Pajak Karyawan Tidak Dilaporkan</h2>'
                    .'<p>Kesalahan menghitung PPh 21 atau tidak melaporkan SPT Tahunan karyawan menjadi temuan umum.</p>'
                    .'<h2>5. Tidak Ada Tax Provision</h2>'
                    .'<p>Tanpa estimasi pajak yang jelas, angka laba di laporan keuangan bisa menyesatkan investor.</p>'
                    .'<p>Antisipasi semua hal di atas sebelum fundraising agar proses berjalan cepat dan nilai perusahaan terjaga.</p>',
            ],
            [
                'title' => 'Audit Internal vs Audit Eksternal: Apa Bedanya dan an Anda Membutuhkannya?',
                'category' => 'Audit',
                'published_at' => '2026-06-17 08:00:00',
                'excerpt' => 'Keduanya punya tujuan berbeda. Pahami perannya agar anggaran audit Anda tepat sasaran.',
                'body' => '<p>Banyak perusahaan bingung membedakan audit internal dan audit eksternal. Keduanya sama-sama penting, tetapi memiliki tujuan dan pelaksana yang berbeda.</p>'
                    .'<h2>Apa Itu Audit Internal?</h2>'
                    .'<p>Audit internal dilakukan oleh tim internal perusahaan untuk mengevaluasi efektivitas pengendalian internal, manajemen risiko, dan kepatuhan terhadap kebijakan perusahaan.</p>'
                    .'<h2>Apa Itu Audit Eksternal?</h2>'
                    .'<p>Audit eksternal dilakukan oleh kantor akuntan publik independen untuk memberikan opini atas kewajaran laporan keuangan sesuai standar audit.</p>'
                    .'<h2>Perbedaan Utama</h2>'
                    .'<ul>'
                    .'<li>Pelaksana: internal vs independen ().</li>'
                    .'<li>Tujuan: perbaikan proses vs opini laporan keuangan.</li>'
                    .'<li>Pengguna hasil: manajemen vs pemangku kepentingan eksternal.</li>'
                    .'</ul>'
                    .'<p>Perusahaan yang sehat biasanya menjalankan keduanya secara komplementer.</p>',
            ],
            [
                'title' => 'Strategi Penghematan Pajak yang Legal (Tax Planning) untuk Perusahaan',
                'category' => 'Perpajakan',
                'published_at' => '2026-06-10 08:00:00',
                'excerpt' => 'Menghemat pajak bukan berarti melanggar aturan. Ini 8 strategi tax planning yang aman dan efektif.',
                'body' => '<p>Tax planning yang legal (tax avoidance) berbeda dengan penggelapan pajak (tax evasion). Dengan strategi yang tepat, perusahaan dapat menekan beban pajak secara sah.</p>'
                    .'<h2>Strategi yang Bisa Diterapkan</h2>'
                    .'<ul>'
                    .'<li>Memanfaatkan seluruh insentif fiskal yang tersedia.</li>'
                    .'<li>Menata struktur transaksi antar-entitas secara efisien.</li>'
                    .'<li>Menggunakan skema penyusutan yang optimal.</li>'
                    .'<li>Memastikan dokumentasi transfer pricing leng.</li>'
                    .'<li>Rutin melakukan tax review dan health check.</li>'
                    .'</ul>'
                    .'<h2>Catatan Penting</h2>'
                    .'<p>Seluruh strategi harus didasari prinsip kepatuhan dan didukung dokumentasi yang memadai. Konsultasikan dengan konsultan pajak terdaftar untuk memastikan keamanannya.</p>',
            ],
            [
                'title' => 'Cara Menyiapkan Dokumen Keuangan Perusahaan agar Siap Diaudit',
                'category' => 'Keuangan',
                'published_at' => '2026-06-02 08:00:00',
                'excerpt' => 'Checklist leng dokumen yang harus selalu siap: kontrak, invoice, bukti bayar, dan rekonsiliasi.',
                'body' => '<p>Perusahaan yang siap diaudit adalah perusahaan yang tertib dokumen. Persiapan yang baik mempercepat proses audit dan menghindari temuan yang tidak perlu.</p>'
                    .'<h2>Checklist Dokumen Penting</h2>'
                    .'<ul>'
                    .'<li>Kontrak dan perjanjian bisnis.</li>'
                    .'<li>Invoice penjualan dan pembelian.</li>'
                    .'<li>Bukti pembayaran dan transfer.</li>'
                    .'<li>Rekonsiliasi bank setiap bulan.</li>'
                    .'<li>Daftar aset dan skema penyusutan.</li>'
                    .'<li>Laporan pajak dan bukti setor.</li>'
                    .'</ul>'
                    .'<h2>Tips Menyusun Dokumentasi</h2>'
                    .'<p>Susun dokumen secara kronologis, beri penomoran yang konsisten, dan simpan dalam sistem yang mudah diakses. Evaluasi kelengan dokumen secara berkala, bukan hanya saat menjelang audit.</p>',
            ],
        ];

        foreach ($articles as $index => $article) {
            Article::updateOrCreate(
                ['slug' => $this->slugify($article['title'])],
                [
                    'title' => $article['title'],
                    'excerpt' => $article['excerpt'],
                    'body' => $article['body'],
                    'category' => $article['category'],
                    'tags' => ['pajak', 'UMKM'],
                    'is_published' => true,
                    'published_at' => $article['published_at'],
                ]
            );
        }
    }

    private function slugify(string $value): string
    {
        return strtolower(preg_replace('/[^A-Za-z0-9]+/', '-', $value) ?? '');
    }
}
