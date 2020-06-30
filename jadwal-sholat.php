<?php
/*
Plugin Name: Mits Jadwal Sholat
Plugin URI: http://adisucipto.net
Description: shortcode jadwal sholat dengan api dari api.banghasan.com
Version: 0.0.1
Author: adi sucipto
Author URI: https://adisucipto.
*/

// First register resources with init 
function mits_shortcode_resource() {
	wp_register_script("mits-shortcode-script", plugin_dir_url(__FILE__)."js/jadwal.js", array('jquery'));
	wp_register_style("mits-shortcode-style", plugin_dir_url(__FILE__)."css/style.css", array());
}
add_action( 'init', 'mits_shortcode_resource' );

add_shortcode( 'mits_shortcode_jadwal', 'mits_jadwal_shortcode' );
function mits_jadwal_shortcode() {
	
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script("mits-shortcode-script",array('jquery') , '1.0', true);
	wp_enqueue_style("mits-shortcode-style");

	$jadwal ="";

	$jadwal .= '<div class="jadwal-sholat">';
    $jadwal .= '    <div class="jadwal-sholat__inner">';
    $jadwal .= '        <div class="jadwal-sholat__inner-top row justify-content-around">';
    $jadwal .= '            <div class="">';
    $jadwal .= '                <h3 class="entry__meta-kanal" style="color: #ffffff;">Jadwal Shalat</h3>';
    $jadwal .= '            </div>';
    $jadwal .= '            <div class="select-group" style="width: 150px;">';
    $jadwal .= '                <select class="select-form" id="kota" style="margin: 0px; height: 25px;">';
    $jadwal .= '                    <option id="AMBON" value="968">AMBON</option>';
    $jadwal .= '                    <option id="BALIKPAPAN" value="875">BALIKPAPAN</option>';
    $jadwal .= '                    <option id="BANDA ACEH" value="530">BANDA ACEH</option>';
    $jadwal .= '                    <option id="BANDAR LAMPUNG" value="649">BANDAR LAMPUNG</option>';
    $jadwal .= '                    <option id="BANDUNG" value="697">BANDUNG</option>';
    $jadwal .= '                    <option id="BANGKALAN" value="741">BANGKALAN</option>';
    $jadwal .= '                    <option id="BANJARMASIN" value="864">BANJARMASIN</option>';
    $jadwal .= '                    <option id="BANYUWANGI" value="742">BANYUWANGI</option>';
    $jadwal .= '                    <option id="BEKASI" value="699">BEKASI</option>';
    $jadwal .= '                    <option id="BENGKULU" value="635">BENGKULU</option>';
    $jadwal .= '                    <option id="BOGOR" value="700">BOGOR</option>';
    $jadwal .= '                    <option id="BUKITTINGI" value="582">BUKITTINGI</option>';
    $jadwal .= '                    <option id="BULUNGAN" value="867">BULUNGAN</option>';
    $jadwal .= '                    <option id="CIREBON" value="703">CIREBON</option>';
    $jadwal .= '                    <option id="DENPASAR" value="792">DENPASAR</option>';
    $jadwal .= '                    <option id="DEPOK" value="703">DEPOK</option>';
    $jadwal .= '                    <option id="GRESIK" value="746">GRESIK</option>';
    $jadwal .= '                    <option id="GORONTALO" value="952">GORONTALO</option>';
    $jadwal .= '                    <option id="JAKARTA" value="667" selected>JAKARTA</option>';
    $jadwal .= '                    <option id="JAMBI" value="608">JAMBI</option>';
    $jadwal .= '                    <option id="JAYAPURA" value="1008">JAYAPURA</option>';
    $jadwal .= '                    <option id="JOMBANG" value="748">JOMBANG</option>';
    $jadwal .= '                    <option id="KENDARI" value="944">KENDARI</option>';
    $jadwal .= '                    <option id="KUPANG" value="824">KUPANG</option>';
    $jadwal .= '                    <option id="LHOKSEUMAWE" value="533">LHOKSEUMAWE</option>';
    $jadwal .= '                    <option id="MAKASSAR" value="930">MAKASSAR</option>';
    $jadwal .= '                    <option id="MALANG" value="775">MALANG</option>';
    $jadwal .= '                    <option id="MAMUJU" value="953">MAMUJU</option>';
    $jadwal .= '                    <option id="MANADO" value="892">MANADO</option>';
    $jadwal .= '                    <option id="MANOKWARI" value="1013">MANOKWARI</option>';
    $jadwal .= '                    <option id="MATARAM" value="801">MATARAM</option>';
    $jadwal .= '                    <option id="MEDAN" value="560">MEDAN</option>';
    $jadwal .= '                    <option id="PADANG" value="580">PADANG</option>';
    $jadwal .= '                    <option id="PALANGKARAYA" value="852">PALANGKARAYA</option>';
    $jadwal .= '                    <option id="PALEMBANG" value="662">PALEMBANG</option>';
    $jadwal .= '                    <option id="PALU" value="908">PALU</option>';
    $jadwal .= '                    <option id="PANGKAL PINANG" value="657">PANGKAL PINANG</option>';
    $jadwal .= '                    <option id="PEKANBARU" value="597">PEKANBARU</option>';
    $jadwal .= '                    <option id="PEKANBARU" value="737">PEKALONGAN</option>';
    $jadwal .= '                    <option id="PONTIANAK" value="837">PONTIANAK</option>';
    $jadwal .= '                    <option id="SAMARINDA" value="874">SAMARINDA</option>';
    $jadwal .= '                    <option id="SEMARANG" value="735">SEMARANG</option>';
    $jadwal .= '                    <option id="SERANG" value="676">SERANG</option>';
    $jadwal .= '                    <option id="SURABAYA" value="770">SURABAYA</option>';
    $jadwal .= '                    <option id="SURAKARTA" value="739">SURAKARTA</option>';
    $jadwal .= '                    <option id="TANGERANG" value="677">TANGERANG</option>';
    $jadwal .= '                    <option id="TASIKMALAYA" value="705">TASIKMALAYA</option>';
    $jadwal .= '                    <option id="TANJUNG PINANG" value="663">TANJUNG PINANG</option>';
    $jadwal .= '                    <option id="TEGAL" value="740">TEGAL</option>';
    $jadwal .= '                    <option id="TERNATE" value="978">TERNATE</option>';
    $jadwal .= '                    <option id="YOGYAKARTA" value="783">YOGYAKARTA</option>';
    $jadwal .= '                </select>';
    $jadwal .= '            </div>';
    $jadwal .= '        </div>';
    $jadwal .= '        <div class="jadwal-sholat__inner-main" id="jadwal_container">';
    $jadwal .= '            <table class="table-jadwal">';
    $jadwal .= '                <thead>';
    $jadwal .= '                <tr>';
    $jadwal .= '                    <td>SUBUH</td>';
    $jadwal .= '                    <td>DUHA</td>';
    $jadwal .= '                    <td>ZUHUR</td>';
    $jadwal .= '                    <td>ASAR</td>';
    $jadwal .= '                    <td>MAGRIB</td>';
    $jadwal .= '                    <td>ISYA</td>';
    $jadwal .= '                </tr>';
    $jadwal .= '                </thead>';
    $jadwal .= '                <tbody>';
    $jadwal .= '                <tr>';
    $jadwal .= '                    <td id="subuh"></td>';
    $jadwal .= '                    <td id="dhuha"></td>';
    $jadwal .= '                    <td id="zhuhur"></td>';
    $jadwal .= '                    <td id="ashar"></td>';
    $jadwal .= '                    <td id="maghrib"></td>';
    $jadwal .= '                    <td id="isya"></td>';
    $jadwal .= '                </tr>';
    $jadwal .= '                </tbody>';
    $jadwal .= '            </table>';
    $jadwal .= '        </div>';
    $jadwal .= '    </div>';
    $jadwal .= '</div>';


	return $jadwal;
}