<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	Language variable for the admin control panel
 */

$lang['yes']								= 'Ya';
$lang['no']									= 'Tidak';
$lang['pages']								= 'Laman';
$lang['blog']								= 'Blog';

// Settings
$lang['settings_help_txt']					= "Pengaturan memampukan Anda untuk mengubah bagaimana situs web melakukan tindakan dan informasi dasar seperti nama situs.";
$lang['allow_comments_label']				= "Izinkan komentar";
$lang['allow_comments_desc']				= "Apakah Anda ingin mengijinkan komentar pada pos di blog Anda?";
$lang['base_controller_label']				= "Base Controller (BETA)";
$lang['base_controller_desc']				= "Pilih beranda anda adalah...";
$lang['blog_description_label']				= "Deskripsi Blog";
$lang['blog_description_desc']				= "Masukkan deskripsi singkat (atau tag line) untuk blog Anda.";
$lang['category_list_limit_label']			= "Batas Kategori";
$lang['category_list_limit_desc']			= "Pilih berapa banyak daftar kategori yang ingin Anda ditampilkan di Beranda.";
$lang['enable_atom_comments_label']			= "Aktifkan Komentar ATOM";
$lang['enable_atom_comments_desc']			= "Apakah Anda ingin mengaktifkan umpan komentar ATOM untuk blog Anda?";
$lang['enable_atom_posts_label']			= "Aktifkan Pos ATOM";
$lang['enable_atom_posts_desc']				= "Apakah Anda ingin mengaktifkan umpan pos ATOM untuk blog Anda?";
$lang['enable_rss_comments_label']			= "Aktifkan Komentar RSS";
$lang['enable_rss_comments_desc']			= "Apakah Anda ingin mengaktifkan umpan komentar RSS untuk blog Anda?";
$lang['enable_rss_posts_label']				= "Aktifkan Pos RSS";
$lang['enable_rss_posts_desc']				= "Apakah Anda ingin mengaktifkan umpan pos RSS untuk blog Anda?";
$lang['links_per_box_label']				= "Batas Tautan";
$lang['links_per_box_desc']					= "Pilih berapa banyak item yang Anda ingin tujukan ketika memposting tautan pada beranda.";
$lang['mod_non_user_comments_label']		= "Moderasi Komentar dari bukan pengguna";
$lang['mod_non_user_comments_desc']			= "Do you want to moderate non-users and non-logged in users?";
$lang['mod_user_comments_label']			= "Moderasi Komentar Pengguna";
$lang['mod_user_comments_desc']				= "Do you want to moderate logged in users?";
$lang['months_per_archive_label']			= "Batas Arsip";
$lang['months_per_archive_desc']			= "Pilih berapa banyak daftar arsip yang Anda ingin tujukan di Beranda";
$lang['posts_per_page_label']				= "Post per Batas Laman";
$lang['posts_per_page_desc']				= "Berapa banyak pos blog yang Anda ingin tampilkan di setiap laman blog Anda?";
$lang['recaptcha_private_key_label']		= "Private Key Google Recaptcha";
$lang['recaptcha_private_key_desc']			= "Masukan PRIVATE Key yang disediakan oleh google.";
$lang['recaptcha_site_key_label']			= "Site Key Google Recaptcha";
$lang['recaptcha_site_key_desc']			= "Masukan SITE key yang disediakan oleh google";
$lang['site_name_label']					= "Nama Situs";
$lang['site_name_desc']						= "Masukan nama situs anda.";
$lang['theme_image_label']					= "";
$lang['theme_image_desc']					= "";
$lang['use_recaptcha_label']				= "Aktifkan Recaptcha";
$lang['use_recaptcha_desc']					= 'Apakah Anda ingin mengaktifkan Google Recaptcha untuk situs Anda untuk membantu menghilangkan SPAM dan moderasi komentar? <a href="https://www.google.com/recaptcha/intro/" target="_blank">Info Selengkapnya <sup><i class="fa fa-external-link"></i></sup></a>';
$lang['use_honeypot_label']					= "Aktifkan Honey Pots Form";
$lang['use_honeypot_desc']					= "Untuk membantu mencegah SPAM, Anda dapat menggunakan Honey Pots, SPAMmer mengisi field tersembunyi yang tidak seharusnya. Ini akan membantu melindungi bentuk komentar dan pendaftaran Anda dari robot tetapi tidak dari manusia. ";
$lang['mail_protocol_label']				= "Mail Protocol";
$lang['mail_protocol_desc']					= "Pilih mail protokol yang Anda inginkan untuk mengirim email.";
$lang['smtp']								= 'SMTP (Membutuhkan akun email SMTP Contoh: server, google, yahoo, dll)';
$lang['mail']								= 'MAIL (Mudah digunakan, Tapi buruk untuk daftar penerima yang banyak)';
$lang['sendmail']							= "SENDMAIL (Beberapa server tidak mengizinkan menggunakan protokol 'mail')";
$lang['sendmail_path_label']				= "Path Sendmail";
$lang['sendmail_path_desc']					= "(Diperlukan jika menggunakan Sendmail) Masukkan jalur sendmail. Biasanya ditemukan di panel kontrol server Anda.";
$lang['smtp_user_label']					= "User SMTP";
$lang['smtp_user_desc']						= "(Diperlukan jika menggunakan SMTP) Masukkan username untuk akun SMTP Anda";
$lang['smtp_host_label']					= "Host SMTP";
$lang['smtp_host_desc']						= "(Diperlukan jika menggunakan SMTP) Masukkan Host SMTP untuk akun Anda. (Contoh: google.com, mail.yourdomain.com, dll)";
$lang['smtp_pass_label']					= "Password SMTP";
$lang['smtp_pass_desc']						= "(Diperlukan jika menggunakan SMTP) Masukkan Password SMTP untuk username Anda";
$lang['smtp_port_label']					= "Port SMTP";
$lang['smtp_port_desc']						= "(Diperlukan jika menggunakan SMTP) Masukkan nomor Port SMTP yang disediakan oleh host Anda.";
$lang['admin_email_label']					= "Admin Email";
$lang['admin_email_desc']					= "Alamat email di mana Anda ingin menerima pemberitahuan dari situs web.";
$lang['server_email_label']					= "Server Email";
$lang['server_email_desc']					= "Alamat email di mana Anda ingin server untuk ditetapkan sebagai 'Dari'. Bisa diisi dengan 'noreply@' atau alamat email Anda sehingga orang dapat menjawabnya";


$lang['email_activation_label']					= "Aktivasi Email";
$lang['email_activation_desc']					= "Apakah Anda ingin pengguna baru untuk memverifikasi email mereka sebelum diizinkan untuk login dan berkomentar? (Direkomendasikan ON)";
$lang['manual_activation_label']				= "Aktivasi Manual";
$lang['manual_activation_desc']					= "Apakah Anda ingin secara manual memverifikasi setiap pengguna yang mendaftar?";
$lang['allow_registrations_label']				= "Memperbolehkan Mendaftar";
$lang['allow_registrations_desc']				= "Apakah Anda ingin memperbolehkan pengguna untuk membuat akun di blog Anda?";







// Links
$lang['links_hdr']							= "Tautan";
$lang['link_remove_btn']					= "Hapus Tautan";
$lang['link_edit_btn']						= "Ubah Tautan";
$lang['index_add_new_link']					= "Tambah Tautan Baru";
$lang['add_link_subheading']				= "Silakan tambahkan informasi tautan di bawah ini. Ini adalah tautan eksternal, pastikan untuk tambahkan http:// atau https:// untuk tautan url anda.";
$lang['link_form_name']						= "Nama Tautan";
$lang['link_form_url']						= "http://";
$lang['link_form_desc']						= "Deskripsi";
$lang['link_form_position']					= "Urutan";
$lang['link_form_target']					= "Target";
$lang['link_form_visibility']				= "Kenampakan";
$lang['blank_window']						= "Buka di jendela baru";
$lang['same_window']						= "Buka di jendela yang sama";
$lang['visible']							= "Terlihat";
$lang['not_visible']						= "Tersembunyi";
$lang['save_link_btn']						= "Simpan Tautan";
$lang['link_added_success_resp']			= "Tautan berhasil ditambah";
$lang['link_added_fail_resp']				= "Tautan tidak bisa ditambah.  Silakan coba lagi.";
$lang['link_removed_success_resp']			= "Tautan berhasil dihapus";
$lang['link_removed_fail_resp']				= "Tautan tidak bisa dihapus.  Silakan coba lagi.";
$lang['link_update_success_resp']			= "Tautan telah berhasil diperbarui";
$lang['link_update_fail_resp']				= "Tautan tidak bisa diperbaharui.  Silakan coba lagi.";



// Categories
$lang['cats_hdr']							= "Kategori";
$lang['cat_remove_btn']						= "Hapus Kategori";
$lang['cat_edit_btn']						= "Ubah Kategori";
$lang['index_add_new_cat']					= "Tambah Kategori Baru";
$lang['add_cat_subheading']					= "Silakan tambahkan informasi kategori di bawah ini.";
$lang['cat_form_name']						= "Nama Kategori";
$lang['cat_form_url']						= "(sama seperti di atas, dalam huruf kecil, tanpa spasi)";
$lang['cat_form_desc']						= "Deskripsi";
$lang['blank_window']						= "Buka di jendela baru";
$lang['same_window']						= "Buka di jendela yang sama";
$lang['visible']							= "Terlihat";
$lang['not_visible']						= "Tersembunyi";
$lang['save_cat_btn']						= "Simpan Kategori";
$lang['cat_added_success_resp']				= "Kategori Berhasil Ditambahkan";
$lang['cat_added_fail_resp']				= "Tidak Bisa Menambahkan Kategori. Silahkan coba lagi.";
$lang['cat_removed_success_resp']			= "Kategori Berhasil Di Hapus";
$lang['cat_removed_fail_resp']				= "Tidak bisa menghapus Kategori. Silakan coba lagi.";
$lang['cat_update_success_resp']			= "Kategori Berhasil Di Ubah";
$lang['cat_update_fail_resp']				= "Tidak bisa mengubah Kategori. Silakan coba lagi.";


// pages
$lang['pages_hdr']							= "Laman";
$lang['optional_hdr']						= "Optional";
$lang['optional_help_text']					= "Walaupun opsi di bawah ini adalah opsional, tetapi opsi ini sangat dianjurkan dan sangat membantu Search Engine Optimization (SEO). Jugaa akan menghasilkan meta tag untuk facebook dan twitter";
$lang['page_remove_btn']					= "Hapus Laman";
$lang['page_edit_btn']						= "Ubah Laman";
$lang['index_add_new_page']					= "Tambah Laman Baru";
$lang['index_edit_page']					= "Ubah Laman";
$lang['save_page_btn']						= "Simpan Laman";
$lang['page_added_success_resp']			= "Laman berhasil ditambahkan";
$lang['page_added_fail_resp']				= "Tidak dapat menambahkan laman.  Silakan coba lagi.";
$lang['page_removed_success_resp']			= "Laman berhasil dihapus";
$lang['page_removed_fail_resp']				= "Tidak dapat menghapus laman.  Silakan coba lagi.";
$lang['page_update_success_resp']			= "Laman berhasil diperbaharui";
$lang['page_update_fail_resp']				= "tidak bisa memperbaharui Laman.  Silakan coba lagi.";
$lang['page_form_title_text']				= "Judul";
$lang['page_form_title_help_text']			= "Masukan Judul Laman Anda.";
$lang['page_form_status_text']				= "Status";
$lang['page_form_status_help_text']			= "Pilih laman menjadi Live atau Konsep.";
$lang['page_form_status_active']			= "Live";
$lang['page_form_status_inactive']			= "Konsep";
$lang['page_form_content_text']				= "Konten Laman";
$lang['page_form_content_help_text']		= "Masukkan konten laman Anda di bawah ini. Gunakan editor untuk membantu Anda memformat dengan Markdown.";
$lang['page_form_meta_title_text']			= "META Title";
$lang['page_form_meta_title_help_text']		= "Biasanya sama dengan judul laman Anda, tetapi Anda dapat memasukkan judul yang berbeda di sini.";
$lang['page_form_meta_keywords_text']		= "META Keywords";
$lang['page_form_meta_keywords_help_text']	= "Masukkan kata kunci untuk laman ini dipisahkan dengan koma.";
$lang['page_form_meta_desc_text']			= "META Description";
$lang['page_form_meta_desc_help_text']		= "Masukkan deskripsi untuk laman ini. Untuk hasil terbaik antara 50 dan 100 karakter.";
$lang['page_form_home_text']				= "Beranda";
$lang['page_form_home_help_text']			= "Centang kotak jika ingin menjadikan laman ini sebagai Beranda. Anda harus memilih Laman menjadi default controller di Pengaturan. Laman lain yang saat ini ditandai sebagai beranda akan dihapus sebagai beranda.";
$lang['page_form_url_title_text']			= "Judul URL";
$lang['page_form_url_title_help_text']		= "Ini adalah 'slug' ditampilkan di URL laman Anda. Jika Anda mengubah ini, JANGAN ada spasi di dalam kata-kata, gunakan tanda hubung untuk menggantikan spasi. <br>Contoh: judul-url-baru";
$lang['page_form_redirect_text']			= "Pengalihan";
$lang['page_form_redirect_help_text']		= "Jika Anda mengubah Judul URL di atas, secara otomatis judul_url lama akan dialihkan ke judul_url baru secara HTTP 301 (permanen). Di sini, Anda dapat mengganti pengaturan default.";
$lang['page_form_redirect_none']			= "Jangan Alihkan Judul URL lama";
$lang['page_form_redirect_perm']			= "Alihkan permanen ke Judul URL baru";
$lang['page_form_redirect_temp']			= "Alihkan permanen ke Judul URL lama";



// posts
$lang['posts_hdr']							= "Pos";
$lang['optional_hdr']						= "Opsional";
$lang['optional_help_text']					= "Walaupun opsi di bawah ini adalah opsional, tetapi opsi ini sangat dianjurkan dan sangat membantu Search Engine Optimization (SEO). Jugaa akan menghasilkan meta tag untuk facebook dan twitter";
$lang['post_remove_btn']					= "Hapus Pos";
$lang['post_edit_btn']						= "Sunting Pos";
$lang['index_add_new_post']					= "Tambah Pos Baru";
$lang['index_edit_post']					= "Sunting Pos";
$lang['save_post_btn']						= "Simpan Pos";
$lang['post_added_success_resp']			= "Pos berhasil ditambah";
$lang['post_added_fail_resp']				= "Tidak dapat menambahkan pos.  Silakan coba lagi.";
$lang['post_removed_success_resp']			= "Pos berhasil dihapus";
$lang['post_removed_fail_resp']				= "Tidak dapat menghapus.  Silakan coba lagi.";
$lang['post_update_success_resp']			= "Pos berhasil diperbarui";
$lang['post_update_fail_resp']				= "Tidak bisa memperbarui pos.  Silakan coba lagi.";
$lang['post_form_title_text']				= "Judul Pos";
$lang['post_form_title_help_text']			= "Masukan judul pos anda.";
$lang['post_form_status_text']				= "Status";
$lang['post_form_status_help_text']			= "Pilih laman menjadi Live atau Konsep.";
$lang['post_form_status_active']			= "Live";
$lang['post_form_status_inactive']			= "Konsep";
$lang['post_form_content_text']				= "Konten Pos";
$lang['post_form_content_help_text']		= "Masukkan konten pos Anda di bawah ini. Gunakan editor untuk membantu Anda memformat dengan Markdown.";
$lang['post_form_excerpt_text']				= "Kutipan Pos";
$lang['post_form_excerpt_help_text']		= "Masukkan sekitar ~200 karakter kutipan (teaser) dari posting Anda di bawah ini.";
$lang['post_form_cats_help_text']			= "Pilih kategori apapun. Untuk memilih beberapa kategori tekan CMD/CTRL + Klik pilihan Anda.";
$lang['post_form_meta_title_text']			= "META Title";
$lang['post_form_meta_title_help_text']		= "Biasanya sama dengan judul pos Anda, tetapi Anda dapat memasukkan judul yang berbeda di sini.";
$lang['post_form_meta_keywords_text']		= "META Keywords";
$lang['post_form_meta_keywords_help_text']	= "Masukkan kata kunci untuk pos ini dipisahkan dengan koma.";
$lang['post_form_meta_desc_text']			= "META Description";
$lang['post_form_meta_desc_help_text']		= "Masukkan deskripsi untuk pos ini. Untuk hasil terbaik antara 50 dan 100 karakter..";
$lang['post_form_home_text']				= "Beranda";
$lang['post_form_home_help_text']			= "Centang kotak jika ingin menjadikan pos ini sebagai Beranda. Anda harus memilih pos menjadi default controller di Pengaturan. Pos lain yang saat ini ditandai sebagai beranda akan dihapus sebagai beranda.";
$lang['post_form_url_title_text']			= "Judul URL";
$lang['post_form_url_title_help_text']		= "Ini adalah 'slug' ditampilkan di URL pos Anda. Jika Anda mengubah ini, JANGAN ada spasi di dalam kata-kata, gunakan tanda hubung untuk menggantikan spasi. <br>Contoh: judul-url-baru";
$lang['post_add_form_url_title_help_text']	= "Ini adalah 'slug' ditampilkan di URL pos Anda. Jika Anda mengubah ini, JANGAN ada spasi di dalam kata-kata, gunakan tanda hubung untuk menggantikan spasi. Anda dapat meninggalkannya kosong dan kami akan membuatkanya untuk Anda berdasarkan judul posting Anda. <br>Contoh: judul-url-baru";

$lang['post_form_redirect_text']			= "Pengalihan";
$lang['post_form_redirect_help_text']		= "Jika Anda mengubah Judul URL di atas kita secara otomatis mengatur HTTP 301 (permanen) mengarahkan untuk Anda sehingga url_title pos lama akan di arahkan ke  url_title pos baru. Di sini, Anda dapat mengganti pengaturan standar.";
$lang['post_form_redirect_none']			= "Jangan Alihkan Judul URL lama";
$lang['post_form_redirect_perm']			= "Alihkan permanen ke Judul URL baru";
$lang['post_form_redirect_temp']			= "Alihkan permanen ke Judul URL lama";
$lang['post_form_feature_image_text']		= "Gambar Andalan";
$lang['post_add_form_feature_image_help_text']		= "Unggah gambar andalan atau biarkan kosong.";
$lang['post_edit_form_feature_image_help_text']		= "Unggah gambar andalan untuk menggantikan gambar saat ini atau biarkan kosong untuk menggunakan gambar yang sama.";
$lang['post_new_post_notification_sbj']		= "Pos Baru";
$lang['post_new_post_notification_msg']		= "Hai! Kami baru saja menambahkan konten baru. Berikut adalah pos baru kami. <br><br>";
$lang['post_new_post_notification_msg_foot']		= "<br><br>Anda menerima email ini karena Anda meminta kami mengirimkanya ketika kami memposting konten baru. ";


// navigation
$lang['nav_hdr']							= "Navigasi";
$lang['nav_new_hdr']						= "Buat item navigasi";
$lang['nav_right_side_hdr']					= "Tautan Navigasi";
$lang['nav_right_side_desc']				= "Di bawah ini Anda dapat menautkan ke laman atau pos tertentu. Tinggalkan semua opsi kosong untuk merujuk ke Beranda situs Anda.";
$lang['index_add_new_nav']					= "Tambahkan Item Navigasi";
$lang['tab_all_nav_items']					= "Semua Item Navigasi";
$lang['tab_nav_redirects']					= "Pengalihan";
$lang['nav_hdr']							= "Navigasi";
$lang['index_nav_desc']						= "Seret dan Turunkan item untuk menyusun ulang tautan yang akan ditampilkan pada navigasi depan situs Anda.";
$lang['index_redirect_desc']				= "Tabel di bawah menunjukkan pengalihan untuk posting &amp; laman di situs Anda. Hal ini juga termasuk jenis (laman atau posting) dan jenis pengalihan (301 - Permanen atau 302 - Sementara). <b>Pengubahan dan Menghapusan Pengalihan harus dilakukan oleh pengguna yang berpengalaman</b>.";
$lang['nav_no_redirects_found']				= "Pengalihan Tidak Ditemukan";
$lang['redir_edit_btn']						= "Sunting Pengalihan";
$lang['redir_remove_btn']					= "Hapus Pengalihan";
$lang['nav_edit_btn']						= "Sunting";
$lang['nav_remove_btn']						= "Hapus";
$lang['nav_edit_hdr']						= "Sunting Item Navigasi";
$lang['nav_save_btn']						= "Simpan Item Navigasi";
$lang['nav_form_title_text']				= "Judul";
$lang['nav_form_title_help_text']			= "Ini adalah teks yang ditampilkan pada panel navigasi yang dapat dilihat dan diklik oleh pengunjung.";
$lang['nav_form_desc_text']					= "Deskripsi";
$lang['nav_form_desc_help_text']			= "Ini adalah deskripsi dari tautan ini dan ini digunakan untuk ruas judul. Pengunjung melihat ini ketika melayangkan mouse di atas teks tautan.";
$lang['nav_form_url_text']					= "URI";
$lang['nav_form_url_help_text']				= "Ini adalah bagian URI dari tautan anda. Kami secara otomatis menambahkan URL situs Anda untuk Anda saat membuat tautan.";
$lang['nav_form_url_text_example']			= "tentang   <-- contoh penggunaan";
$lang['nav_form_redirect_text']				= "Pengalihan";
$lang['nav_form_redirect_help_text']		= "Jika Anda mengubah ruas 'Pilih Sebuah Laman' atau 'Pilih Sebuah Pos' kami secara otomatis mengatur HTTP 301 (permanen) yang mengarahkan Anda mengalihkan URI lama ke URI laman baru. Di sini, Anda dapat mengganti pengaturan standar.";
$lang['nav_form_redirect_text']				= "Pengalihan";
$lang['nav_form_type_text']					= "Tipe";
$lang['nav_form_type_help_text']			= "Jika Anda mengubah 'Pilih Sebuah Laman' atau 'Pilih Sebuah Pos', silahkan pilih apakah item menu ini mengarah ke laman atau pos. Kita perlu ini untuk memastikan pengalihan.";
$lang['nav_form_type_page']					= "Ini adalah Laman";
$lang['nav_form_type_post']					= "Ini adalah Pos";
$lang['nav_update_success_resp']			= "Berhasil memperbarui item navigasi";
$lang['nav_update_fail_resp']				= "Tidak dapat memperbarui item navigasi. Silakan coba Lagi.";
$lang['nav_form_choose_page']				= "Pilih Sebuah Laman";
$lang['nav_form_choose_page_help_text']		= "Pilih dari Laman yang sudah ada.";
$lang['nav_form_choose_post']				= "Pilih Sebuah Pos";
$lang['nav_form_choose_post_help_text']		= "Pilih dari post blog yang sudah ada.";
$lang['pages_index_controller_label']		= "Laman Ditandai Sebagai Beranda";

// redirection
$lang['nav_redir_edit_hdr']					= "Mengubah Pengalihan";
$lang['nav_redir_edit_subheading']			= "<b><em>Penting</em></b>:  Hanya pengguna yang berpengalaman yang seharusnya menyunting atau menghapus item pengalihan. Mengubah ini dapat memiliki dampak negatif pada SEO dan jumlah kesalahan 404 kepada pengunjung. Gunakan fungsi ini dengan hati-hati.";

$lang['nav_redirect_removed_success_resp']	= "Pengalihan Berhasil Dihapus";
$lang['nav_redirect_removed_fail_resp']		= "Tidak dapat menghapus Item Pengalihan. Silakan coba lagi.";
$lang['nav_redirect_edit_success_resp']		= "Pengalihan telah berhasil diperbarui";
$lang['nav_redirect_edit_fail_resp']		= "Tidak dapat memperbarui Item Pengalihan. Silakan coba lagi.";
$lang['nav_redir_form_old_slug_text']		= "Dari";
$lang['nav_redir_form_old_slug_desc']		= "Ruas Dari adalah segmen URI lama.";
$lang['nav_redir_form_new_slug_text']		= "Ke";
$lang['nav_redir_form_new_slug_desc']		= "Ruas Ke adalah segmen URI baru, dimana pengunjung akan diarahkan ke tautan tersebut";
$lang['nav_redir_form_type_text']			= "Tipe";
$lang['nav_redir_form_type_desc']			= "Apakah ini adalah Laman atau Pos";
$lang['nav_redir_form_code_text']			= "Jenis pengalihan HTTP";
$lang['nav_redir_form_code_desc']			= "Apakah dialihkan secara Permanen (301) atau Sementara (302)?";

// Comments
$lang['comments_hdr']						= "Kelola Komentar";
$lang['comments_no_comments_found_mod']		= "Tidak ada komentar yang ditemukan untuk dimoderasi";
$lang['comments_no_comments_found_act']		= "Tidak ada komentar yang diterbitkan";
$lang['comments_tab_moderated']				= "Telah dimoderasi";
$lang['comments_tab_active']				= "Telah diterbitkann";
$lang['comments_btn_edit']					= "Sunting";
$lang['comments_btn_remove']				= "Hapus";
$lang['comments_btn_view']					= "Rincian";
$lang['comments_btn_accept']				= "Terima";
$lang['comments_btn_hide']					= "Sembunyikan";
$lang['comments_tbl_hdr_post_title']		= "Post Title";
$lang['comments_tbl_hdr_author']			= "Penulis";
$lang['comments_tbl_hdr_date']				= "Tanggal";
$lang['comments_tbl_hdr_short_excerpt']		= "Kutipan Singkat";
$lang['comments_reg_user']					= "Pengguna terdaftar";
$lang['comment_removed_success_resp']		= "Komentar Berhasil Dihapus";
$lang['comment_removed_fail_resp']			= "Tidak dapat menghapus komentar. Silakan coba lagi.";
$lang['comment_accept_success_resp']		= "Komentar Berhasil Diterima";
$lang['comment_accept_fail_resp']			= "Tidak dapat menerima komentar. Silakan coba lagi.";
$lang['comment_hide_success_resp']			= "Komentar Berhasil Disembunyikan";
$lang['comment_hide_fail_resp']				= "Tidak dapat menyembunyikan komentar. Silakan coba lagi.";
$lang['comment_update_success_resp']		= "Komentar Berhasil Diperbarui";
$lang['comment_update_fail_resp']			= "Tidak dapat memperbarui komentar. Silakan coba lagi.";
$lang['comment_form_field_content']			= "Konten";
$lang['comment_form_field_content_hlp_txt']	= "Anda dapat menyunting isi dari komentar pengguna di bawah ini.";
$lang['comment_edit_hdr']					= "Edit Komentar";
$lang['comment_edit_subheading']			= "";
$lang['comment_details_hdr']				= "Rincian";
$lang['comments_save_btn']					= "Simpan Komentar";
$lang['comments_blog_post_hdr']				= "Pos Blog";
$lang['comments_comment_id']				= "ID Komentar";
$lang['comments_author']					= "Penulis";
$lang['comments_date_posted']				= "Tanggal Diterima";
$lang['comments_current_status']			= "Status saat ini";

// updates
$lang['updates_hdr']						= "Pembaruan";
$lang['updates_subheader']					= "Anda dapat memperbarui Open Blog dan framework CodeIgniter. Di bawah ini adalah status instalasi Anda.";
$lang['updates_failed_connection']			= "Gagal menyambungkan ke API open-blog.org.";
$lang['updates_update_available']			= "Tersedia Pembaruan! <br><b><em>CATATAN PENTING: Buat Cadangan basis data dan berkas-berkas Anda sebelum memperbarui!</em></b>";
$lang['updates_update_not_available']		= "Instalasi Open Blog anda sudah terbaru.";
$lang['updates_ob_install_text']			= "Instalasi Open Blog Anda";
$lang['updates_ob_current_stable_text']		= "Rilis Stabil saat ini";
$lang['updates_install_up_to_date_text']	= "Instalasi Open Blog anda sudah terbaru.  Anda tidak perlu melakukan apapun.";
$lang['updates_update_now_btn']				= "Pembarui Sekarang";
$lang['updates_update_success_resp']		= "Pembaruan Selesai. Pastikan untuk memeriksa pengaturan anda";
$lang['updates_update_failed_resp']			= "Tidak dapat memperbaharui Open Blog.  Silakan coba lagi atau cari bantuan di website Open Blog.";
$lang['updates_download_btn']				= "Unduh Pembaruan";




// themes
$lang['themes_hdr']							= "Tema";
$lang['themes_subheader']					= 'Dibawah ini adalah daftar tema yang terpasang.  Untuk mencari tema lain dan instruksi pemasangan, kunjungi kami di <a href="http://open-blog.org" target="_blank">Open Blog website</a>.';
$lang['themes_theme_in_use']				= "Tema ini Aktif";
$lang['themes_theme_not_in_use']			= "Tema ini TIDAK aktif.";
$lang['theme_author_title']					= "Penulis";
$lang['theme_author_email']					= "Email Dukungan";
$lang['theme_version']						= "Versi";
$lang['themes_activate_theme']				= "Aktifkan Tema";
$lang['themes_theme_type_desc']				= "Tipe Tema";
$lang['themes_type_admin']					= "Admin";
$lang['themes_type_front']					= "Regular";
$lang['themes_activated_success_resp']		= "Tema telah berhasil diaktifkan";
$lang['themes_activated_fail_resp']			= "Tidak bisa mengaktifkan tema. Silakan coba lagi.";



// social
$lang['social_hdr']							= "Sosial";
$lang['social_hdr_help_txt']				= "Tambahkan, Ubah, atau Hapus Tautan ke akun sosial media anda.";
$lang['social_add_new']						= "Tambah";
$lang['social_edit_btn']					= "Ubah";
$lang['social_remove_btn']					= "Hapus";
$lang['social_removed_success_resp']		= "Tautan Sosial Media telah berhasil dihapus";
$lang['social_removed_fail_resp']			= "Tidak bisa menghapus tautan sosial media. Silakan coba lagi.";
$lang['index_add_new_social']				= "Tambah Tautan Sosial Media";
$lang['social_form_name']					= "Nama";
$lang['social_form_url']					= "URL";
$lang['social_form_active']					= "Aktif";
$lang['add_social_subheading']				= "Menambahkan tautan sosial media baru. Cukup masukkan Nama layanan media sosial, URL lengkap (termasuk http: //) jika Anda ingin menjadikannya aktif. link aktif akan ditampilkan di halaman publik dari situs Anda..";
$lang['save_social_btn']					= "Simpan Tautan Sosial";
$lang['social_update_success_resp']			= "Link Sosial Berhasil diperbarui";
$lang['social_update_fail_resp']			= "Tidak dapat memperbarui Tautan Sosial. Silakan coba lagi.";
$lang['social_added_success_resp']			= "Tautan Sosial Berhasil Ditambahkan";
$lang['social_added_fail_resp']				= "Tidak dapat menambahkan Tautan Sosial. Silakan coba lagi.";


// languages
$lang['languages_hdr']						= "Bahasa";
$lang['languages_hdr_help_txt']				= "Aktifkan, Nonaktifkan, dan menetapkan bahasa sebagai standar. bahasa yang diaktifkan akan ditawarkan kepada pengunjung situs.";
$lang['languages_disable_btn']				= "Nonaktifkan";
$lang['languages_enable_btn']				= "Aktifkan";
$lang['languages_make_default_btn']			= "Jadikan Standar";
$lang['languages_disable_success_resp']		= "Bahasa Berhasil Dinonaktifkan";
$lang['languages_disable_fail_resp']		= "Tidak bisa menonaktifkan bahasa. Silakan coba lagi.";
$lang['languages_enable_success_resp']		= "Bahasa Berhasil Diaktifkan";
$lang['languages_enable_fail_resp']			= "Tidak dapat mengaktifkan bahasa. Silakan coba lagi.";
$lang['languages_default_success_resp']		= "Berhasil mengubah bahasa standar";
$lang['languages_default_fail_resp']		= "Tidak bisa mengubah bahasa bawaan. Silakan coba lagi.";
$lang['languages_help_text']				= 'Catatan: "Standar" diatur secara otomatis ketika pengunjung melihat website Anda. Mereka dapat mengubah bahasa ke "Aktif" apapun yang mereka sukai. Ini <b> TIDAK </ b> akan merubah teks Yang dimasukan di Blog Anda.';
$lang['languages_table_lang_h']				= "Bahasa";
$lang['languages_table_abbr_h']				= "Singkatan";
$lang['languages_table_is_default_h']		= "Standar";
$lang['languages_table_enabled_h']			= "Aktifkan";


$lang['save_settings']						= "Simpan Pengaturan";

//

// form action responses
$lang['settings_update_success']			= "Pengaturan telah berhasil diperbarui";
$lang['settings_update_failed']				= "Pengaturan gagal diperbaharui.  Silakan coba lagi.";


// permissions
$lang['permission_check_failed']			= "Anda harus masuk log dan memiliki izin untuk melihat laman ini.";

// installer directory warning
$lang['installer_dir_warning_notice']		= "Direktori /installer/ masih ada.  Untuk keamanan yang lebih baik, Anda harus menghapus direktori installer/ dan isi itu segera!";


