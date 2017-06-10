<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Initial_data extends CI_Migration {

	public function up(){
		// Inisialisasi Data Tabel Info FIM
		$dataInfoFIM = array(
			array('keterangan' => 'Alumni FIM'),
			array('keterangan' => 'Keluarga'),
			array('keterangan' => 'Teman'),
			array('keterangan' => 'Social Media FIM'),
		);

		// Inisialisasi Data Tabel Agama, Berdasarkan refensi agama di Indonesia yang tertulis di https://id.wikipedia.org/wiki/Agama
		$dataAgama = array(
			array('agama' => 'Islam'),
			array('agama' => 'Katolik'),
			array('agama' => 'Kristen Protestan'),
			array('agama' => 'Hindu'),
			array('agama' => 'Buddha'),
			array('agama' => 'Khonghucu'),
			array('agama' => 'Lainnya'),
		);

		// Inisialisasi Data Tabel Jalur
		$dataJalur = array(
			array(
				'key' => 'nextgen',
				'details' => 'Next Generation',
				'percentage' => 70
			),
			array(
				'key' => 'young',
				'details' => 'Young Proffesional',
				'percentage' => 3
			),
			array(
				'key' => 'influencer',
				'details' => 'Influencer',
				'percentage' => 3
			),
			array(
				'key' => 'military',
				'details' => 'Military',
				'percentage' => 3
			),
			array(
				'key' => 'campus',
				'details' => 'Campus Leader',
				'percentage' => 3
			),
			array(
				'key' => 'talent',
				'details' => 'Talent Scout',
				'percentage' => 10
			),
			array(
				'key' => 'civil',
				'details' => 'Civil Organization',
				'percentage' => 3
			),
			array(
				'key' => 'servant',
				'details' => 'Public Servant',
				'percentage' => 3
			),
		);

		$dataProvinsi = array(
			array('key' => 'AC', 'nama_provinsi' => 'Aceh'),
			array('key' => 'BA', 'nama_provinsi' => 'Bali'),
			array('key' => 'BT', 'nama_provinsi' => 'Banten'),
			array('key' => 'BE', 'nama_provinsi' => 'Bengkulu'),
			array('key' => 'GO', 'nama_provinsi' => 'Gorontalo'),
			array('key' => 'JK', 'nama_provinsi' => 'Jakarta'),
			array('key' => 'JA', 'nama_provinsi' => 'Jambi'),
			array('key' => 'JB', 'nama_provinsi' => 'Jawa Barat'),
			array('key' => 'JT', 'nama_provinsi' => 'Jawa Tengah'),
			array('key' => 'JI', 'nama_provinsi' => 'Jawa Timur'),
			array('key' => 'KB', 'nama_provinsi' => 'Kalimantan Barat'),
			array('key' => 'KS', 'nama_provinsi' => 'Kalimantan Selatan'),
			array('key' => 'KT', 'nama_provinsi' => 'Kalimantan Tengah'),
			array('key' => 'KI', 'nama_provinsi' => 'Kalimantan Timur'),
			array('key' => 'KU', 'nama_provinsi' => 'Kalimantan Utara'),
			array('key' => 'BB', 'nama_provinsi' => 'Kepulauan Bangka Belitung'),
			array('key' => 'KR', 'nama_provinsi' => 'Kepulauan Riau'),
			array('key' => 'LA', 'nama_provinsi' => 'Lampung'),
			array('key' => 'MA', 'nama_provinsi' => 'Maluku'),
			array('key' => 'MU', 'nama_provinsi' => 'Maluku Utara'),
			array('key' => 'NB', 'nama_provinsi' => 'Nusa Tenggara Barat'),
			array('key' => 'NT', 'nama_provinsi' => 'Nusa Tenggara Timur'),
			array('key' => 'PA', 'nama_provinsi' => 'Papua'),
			array('key' => 'PB', 'nama_provinsi' => 'Papua Barat'),
			array('key' => 'RI', 'nama_provinsi' => 'Riau'),
			array('key' => 'SR', 'nama_provinsi' => 'Sulawesi Barat'),
			array('key' => 'SN', 'nama_provinsi' => 'Sulawesi Selatan'),
			array('key' => 'ST', 'nama_provinsi' => 'Sulawesi Tengah'),
			array('key' => 'SG', 'nama_provinsi' => 'Sulawesi Tenggara'),
			array('key' => 'SU', 'nama_provinsi' => 'Sulawesi Utara'),
			array('key' => 'SB', 'nama_provinsi' => 'Sumatera Barat'),
			array('key' => 'SS', 'nama_provinsi' => 'Sumatera Selatan'),
			array('key' => 'SU', 'nama_provinsi' => 'Sumatera Utara'),
			array('key' => 'YO', 'nama_provinsi' => 'Yogyakarta'),
		);

		$this->db->insert_batch('info_fim', $dataInfoFIM);
		$this->db->insert_batch('jalur', $dataJalur);
		$this->db->insert_batch('agama', $dataAgama);
		$this->db->insert_batch('provinsi', $dataProvinsi);

	}

	public function down(){
		$this->db->truncate('provinsi');
		$this->db->truncate('agama');
		$this->db->truncate('jalur');
		$this->db->truncate('info_fim');
	}

}