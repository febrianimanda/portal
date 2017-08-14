<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Initial_schema extends CI_Migration {

	public function up() {
		# == Table User == 
		$this->dbforge->add_field(array(
			'user_id'	=> array(
				'type'						=> 'int',
				'constraint'			=> 5,
				'unsgined'				=> TRUE,
				'auto_increment'	=> TRUE
			),
			'email' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
				'unique'			=> TRUE
			),
			'username' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
				'unique'			=> TRUE
			),
			'password' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
			),
			'role' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 3
			),
			'jalur' => array(
				'type'				=> 'varchar',
				'constraint'	=> 30,
				'default'			=> NULL
			),
			'daftar_fim' => array(
				'type'				=> 'int',
				'constraint'	=> 2
			),
			'date_updated' => array(
				'type'			=> 'timestamp',
			),
			'date_created' => array(
				'type'					=> 'timestamp',
				'default'				=> 'current_timestamp'
			),
			'hash' => array(
				'type'				=> 'varchar',
				'constraint'	=> 32
			),
			'is_verified' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
			'is_deleted' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
		));
		$this->dbforge->add_key('user_id', TRUE);
		$this->dbforge->create_table('user');
		# ==== ==== ==== ==== ==== ==== ==== ==== ==== 
		# == Table Agama == 
		$this->dbforge->add_field(array(
			'agama_id'	=> array(
				'type'						=> 'int',
				'constraint'			=> 4,
				'unsgined'				=> TRUE,
				'auto_increment'	=> TRUE
			),
			'agama' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
			),
			'jumlah' => array(
				'type'				=> 'int',
				'constraint'	=> 4,
				'default'			=> 0
			),
			'date_updated' => array(
				'type'			=> 'timestamp',
			),
			'date_created' => array(
				'type'					=> 'timestamp',
				'default'				=> 'current_timestamp'
			),
			'is_deleted' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
		));
		$this->dbforge->add_key('agama_id', TRUE);
		$this->dbforge->create_table('agama');
		# ==== ==== ==== ==== ==== ==== ==== ==== ==== 
		# == Table Info FIM == 
		$this->dbforge->add_field(array(
			'info_id'	=> array(
				'type'						=> 'int',
				'constraint'			=> 5,
				'unsgined'				=> TRUE,
				'auto_increment'	=> TRUE
			),
			'keterangan' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
			),
			'jumlah' => array(
				'type'				=> 'int',
				'constraint'	=> 5,
				'default'			=> 0
			),
			'date_updated' => array(
				'type'			=> 'timestamp',
			),
			'date_created' => array(
				'type'					=> 'timestamp',
				'default'				=> 'current_timestamp'
			),
			'is_deleted' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
		));
		$this->dbforge->add_key('info_id', TRUE);
		$this->dbforge->create_table('info_fim');
		# ==== ==== ==== ==== ==== ==== ==== ==== ====
		# == Table Institusi == 
		$this->dbforge->add_field(array(
			'institusi_id'	=> array(
				'type'						=> 'int',
				'constraint'			=> 4,
				'unsgined'				=> TRUE,
				'auto_increment'	=> TRUE
			),
			'nama_institusi' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
			),
			'jumlah' => array(
				'type'				=> 'int',
				'constraint'	=> 4,
				'default'			=> 0
			),
			'date_updated' => array(
				'type'			=> 'timestamp',
			),
			'date_created' => array(
				'type'					=> 'timestamp',
				'default'				=> 'current_timestamp'
			),
			'is_deleted' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
		));
		$this->dbforge->add_key('institusi_id', TRUE);
		$this->dbforge->create_table('institusi');
		# ==== ==== ==== ==== ==== ==== ==== ==== ====
		# == Table Komitmen == 
		$this->dbforge->add_field(array(
			'komitmen_id'	=> array(
				'type'						=> 'int',
				'constraint'			=> 1,
				'unsgined'				=> TRUE,
				'auto_increment'	=> TRUE
			),
			'peserta_id' => array(
				'type'				=> 'int',
				'constraint'	=> 5,
			),
			'pilihan' => array(
				'type'				=> 'varchar',
				'constraint'	=> 10,
			),
			'penempatan' => array(
				'type'				=> 'varchar',
				'constraint'	=> 200,
			),
			'jumlah' => array(
				'type'				=> 'int',
				'constraint'	=> 4,
				'jumlah'			=> 0
			),
			'date_updated' => array(
				'type'			=> 'timestamp',
			),
			'date_created' => array(
				'type'					=> 'timestamp',
				'default'				=> 'current_timestamp'
			),
			'is_deleted' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
		));
		$this->dbforge->add_key('komitmen_id', TRUE);
		$this->dbforge->create_table('komitmen');
		# ==== ==== ==== ==== ==== ==== ==== ==== ====
		# == Table Regional == 
		$this->dbforge->add_field(array(
			'regional_id'	=> array(
				'type'						=> 'int',
				'constraint'			=> 2,
				'unsgined'				=> TRUE,
				'auto_increment'	=> TRUE
			),
			'keyword'	=> array(
				'type'				=> 'varchar',
				'constraint'	=> 20,
			),
			'area'	=> array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
			),
			'jumlah' => array(
				'type'				=> 'int',
				'constraint'	=> 4,
				'jumlah'			=> 0
			),
			'date_updated' => array(
				'type'			=> 'timestamp',
			),
			'date_created' => array(
				'type'					=> 'timestamp',
				'default'				=> 'current_timestamp'
			),
			'is_deleted' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
		));
		$this->dbforge->add_key('regional_id', TRUE);
		$this->dbforge->create_table('regional');
		# ==== ==== ==== ==== ==== ==== ==== ==== ====
		# == Table Provinsi == 
		$this->dbforge->add_field(array(
			'provinsi_id'	=> array(
				'type'						=> 'int',
				'constraint'			=> 4,
				'unsgined'				=> TRUE,
				'auto_increment'	=> TRUE
			),
			'key' => array(
				'type'				=> 'varchar',
				'constraint'	=> 2,
				'unique'			=> TRUE
			),
			'nama_provinsi'	=> array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
			),
			'jumlah' => array(
				'type'				=> 'int',
				'constraint'	=> 4,
				'default'			=> 0
			),
			'date_updated' => array(
				'type'			=> 'timestamp',
			),
			'date_created' => array(
				'type'					=> 'timestamp',
				'default'				=> 'current_timestamp'
			),
			'is_deleted' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
		));
		$this->dbforge->add_key('provinsi_id', TRUE);
		$this->dbforge->create_table('provinsi');
		# ==== ==== ==== ==== ==== ==== ==== ==== ====
		# == Table Peserta == 
		$this->dbforge->add_field(array(
			'peserta_id'	=> array(
				'type'						=> 'int',
				'constraint'			=> 5,
				'unsgined'				=> TRUE,
				'auto_increment'	=> TRUE
			),
			'email' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
				'unique'			=> TRUE
			),
			'username' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
				'unique'			=> TRUE
			),
			'fullname' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
			),
			'nickname' => array(
				'type'				=> 'varchar',
				'constraint'	=> 20,
			),
			'gender' => array(
				'type'	=> 'enum("laki-laki","perempuan")',
			),
			'birthdate' => array(
				'type'	=> 'date',
			),
			'country' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
			),
			'provinsi' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50
			),
			'kota' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50
			),
			'alamat' => array(
				'type'				=> 'varchar',
				'constraint'	=> 100
			),
			'agama' => array(
				'type'				=> 'varchar',
				'constraint'	=> 20
			),
			'handphone' => array(
				'type'				=> 'varchar',
				'constraint'	=> 20
			),
			'hobi' => array(
				'type'				=> 'varchar',
				'constraint'	=> 255
			),
			'emergency_number' => array(
				'type'				=> 'varchar',
				'constraint'	=> 20
			),
			'golongan_darah' => array(
				'type'				=> 'varchar',
				'constraint'	=> 5
			),
			'alergi_makanan' => array(
				'type'				=> 'varchar',
				'constraint'	=> 10
			),
			'info_fim' => array(
				'type'				=> 'varchar',
				'constraint'	=> 30
			),
			'pertunjukan' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50
			),
			'institusi' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50
			),
			'angkatan' => array(
				'type'				=> 'varchar',
				'constraint'	=> 4
			),
			'profpic_path' => array(
				'type'				=> 'varchar',
				'constraint'	=> 100
			),
			'ktp_path' => array(
				'type'				=> 'varchar',
				'constraint'	=> 100
			),
			'fb' => array(
				'type'				=> 'varchar',
				'constraint'	=> 70
			),
			'line' => array(
				'type'				=> 'varchar',
				'constraint'	=> 30
			),
			'twitter' => array(
				'type'				=> 'varchar',
				'constraint'	=> 70
			),
			'instagram' => array(
				'type'				=> 'varchar',
				'constraint'	=> 70
			),
			'blog' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50
			),
			'biodata_singkat' => array(
				'type'				=> 'varchar',
				'constraint'	=> 160
			),
			'video_profile'	=> array(
				'type'				=> 'varchar',
				'constraint'	=> 100,
			),
			'date_updated' => array(
				'type'			=> 'timestamp',
			),
			'date_created' => array(
				'type'					=> 'timestamp',
				'default'				=> 'current_timestamp'
			),
			'is_ready' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
			'is_completed' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
			'is_deleted' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
		));
		$this->dbforge->add_key('peserta_id', TRUE);
		$this->dbforge->create_table('peserta');
		# ==== ==== ==== ==== ==== ==== ==== ==== ====
		# == Table Pencapaian == 
		$this->dbforge->add_field(array(
			'pencapaian_id'	=> array(
				'type'						=> 'int',
				'constraint'			=> 5,
				'unsgined'				=> TRUE,
				'auto_increment'	=> TRUE
			),
			'peserta_id'	=> array(
				'type'				=> 'int',
				'constraint'	=> 5,
			),
			'indeks' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
			),
			'nama_pencapaian'	=> array(
				'type'				=> 'varchar',
				'constraint'	=> 100
			),
			'waktu_durasi' => array(
				'type'				=> 'varchar',
				'constraint'	=> 20,
			),
			'penyelenggara' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
			),
			'cakupan' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
			),
			'peran' => array(
				'type'				=> 'varchar',
				'constraint'	=> 30,
			),
			'narahubung' => array(
				'type'				=> 'varchar',
				'constraint'	=> 30,
			),
			'alasan' => array(
				'type'	=> 'text',
			),
			'platform' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
			),
			'nama_akun' => array(
				'type'					=> 'varchar',
				'constraint'		=> 50,
			),
			'genre' => array(
				'type'					=> 'varchar',
				'constraint'		=> 50,
			),
			'portofolio' => array(
				'type'					=> 'varchar',
				'constraint'		=> 50,
			),
			'date_updated' => array(
				'type'			=> 'timestamp',
			),
			'date_created' => array(
				'type'					=> 'timestamp',
				'default'				=> 'current_timestamp'
			),
			'is_ready' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
			'is_deleted' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
		));
		$this->dbforge->add_key('pencapaian_id', TRUE);
		$this->dbforge->create_table('pencapaian');
		# ==== ==== ==== ==== ==== ==== ==== ==== ====
		# == Table Perekomendasi == 
		$this->dbforge->add_field(array(
			'perekomendasi_id'	=> array(
				'type'						=> 'int',
				'constraint'			=> 5,
				'unsgined'				=> TRUE,
				'auto_increment'	=> TRUE
			),
			'peserta_id'	=> array(
				'type'				=> 'int',
				'constraint'	=> 5,
			),
			'nama_perekomendasi'	=> array(
				'type'				=> 'varchar',
				'constraint'	=> 50
			),
			'file_rekomendasi_path'	=> array(
				'type'				=> 'varchar',
				'constraint'	=> 50
			),
			'date_updated' => array(
				'type'			=> 'timestamp',
			),
			'date_created' => array(
				'type'					=> 'timestamp',
				'default'				=> 'current_timestamp'
			),
			'is_ready' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
			'is_deleted' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
		));
		$this->dbforge->add_key('perekomendasi_id', TRUE);
		$this->dbforge->create_table('perekomendasi');
		# ==== ==== ==== ==== ==== ==== ==== ==== ====
		# == Table Project == 
		$this->dbforge->add_field(array(
			'project_id'	=> array(
				'type'						=> 'int',
				'constraint'			=> 5,
				'unsgined'				=> TRUE,
				'auto_increment'	=> TRUE
			),
			'peserta_id'	=> array(
				'type'				=> 'int',
				'constraint'	=> 5,
			),
			'nama_project' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
			),
			'sumberdaya' => array(
				'type'				=> 'varchar',
				'constraint'	=> 100,
			),
			'peran' => array(
				'type'				=> 'varchar',
				'constraint'	=> 20,
			),
			'jenis' => array(
				'type'				=> 'varchar',
				'constraint'	=> 30,
			),
			'lokasi' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
			),
			'hasil_magang' => array(
				'type'				=> 'text',
			),
			'kegiatan' => array(
				'type'				=> 'text',
			),
			'timeline' => array(
				'type'				=> 'text',
			),
			'supported_fim' => array(
				'type'				=> 'text',
			),
			'date_updated' => array(
				'type'			=> 'timestamp',
			),
			'date_created' => array(
				'type'					=> 'timestamp',
				'default'				=> 'current_timestamp'
			),
			'is_ready' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
			'is_deleted' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
		));
		$this->dbforge->add_key('project_id', TRUE);
		$this->dbforge->create_table('project');
		# ==== ==== ==== ==== ==== ==== ==== ==== ====
		# == Table Essay == 
		$this->dbforge->add_field(array(
			'essay_id'	=> array(
				'type'						=> 'int',
				'constraint'			=> 5,
				'unsgined'				=> TRUE,
				'auto_increment'	=> TRUE
			),
			'peserta_id'	=> array(
				'type'				=> 'int',
				'constraint'	=> 5,
			),
			'konten' => array(
				'type'	=> 'text',
			),
			'date_updated' => array(
				'type'			=> 'timestamp',
			),
			'date_created' => array(
				'type'					=> 'timestamp',
				'default'				=> 'current_timestamp'
			),
			'is_ready' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
			'is_deleted' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
		));
		$this->dbforge->add_key('essay_id', TRUE);
		$this->dbforge->create_table('essay');
		# ==== ==== ==== ==== ==== ==== ==== ==== ====
		# == Table Rekruter == 
		$this->dbforge->add_field(array(
			'rekruter_id'	=> array(
				'type'						=> 'int',
				'constraint'			=> 3,
				'unsgined'				=> TRUE,
				'auto_increment'	=> TRUE
			),
			'is_koor'	=> array(
				'type'		=> 'boolean',
				'default'	=> FALSE
			),
			'email' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
			),
			'jumlah_koreksi' => array(
				'type'				=> 'int',
				'constraint'	=> 4,
			),
			'koor_id' => array(
				'type'				=> 'int',
				'constraint'		=> 3,
				'null'				=> TRUE
			),
			'date_updated' => array(
				'type'			=> 'timestamp',
			),
			'date_created' => array(
				'type'					=> 'timestamp',
				'default'				=> 'current_timestamp'
			),
			'is_deleted' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
		));
		$this->dbforge->add_key('rekruter_id', TRUE);
		$this->dbforge->create_table('rekruter');
		# ==== ==== ==== ==== ==== ==== ==== ==== ====
		# == Table Penilaian == 
		$this->dbforge->add_field(array(
			'peserta_id'	=> array(
				'type'				=> 'int',
				'constraint'	=> 5,
			),
			'rekruter_id'	=> array(
				'type'				=> 'int',
				'constraint'	=> 3,
			),
			'nilai_cv'	=> array(
				'type'		=> 'decimal(5,2)',
				'default'	=> 0
			),
			'nilai_esai'	=> array(
				'type'	=> 'decimal(5,2)',
				'default'	=> 0
			),
			'nilai_project'	=> array(
				'type'	=> 'decimal(5,2)',
				'default'	=> 0
			),
			'nilai_kelengkapan' => array(
				'type'	=> 'decimal(5,2)',
				'default'	=> 0
			),
			'nilai_total'	=> array(
				'type'	=> 'decimal(5,2)',
				'default'	=> 0
			),
			'keterangan_rekruter' => array(
				'type'	=> 'text',
			),
			'kepo_rekruter' => array(
				'type'	=> 'text',
			),
			'kesesuaian_regional' => array(
				'type'	=> 'text',
			),
			'date_updated' => array(
				'type'			=> 'timestamp',
			),
			'date_created' => array(
				'type'					=> 'timestamp',
				'default'				=> 'current_timestamp'
			),
			'is_deleted' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
		));
		$this->dbforge->create_table('penilaian');
		# ==== ==== ==== ==== ==== ==== ==== ==== ====
		# == Table Token == 
		$this->dbforge->add_field(array(
			'token_id' => array(
				'type'						=> 'int',
				'constraint'			=> 5,
				'unsgined'				=> TRUE,
				'auto_increment'	=> TRUE
			),
			'user_id' => array(
				'type'				=> 'int',
				'constraint'	=> 5,
			),
			'token' => array(
				'type'				=> 'varchar',
				'constraint'	=> 255,
			),
			'is_expired' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0,
			),
			'date_updated' => array(
				'type'			=> 'timestamp',
			),
			'date_created' => array(
				'type'					=> 'timestamp',
				'default'				=> 'current_timestamp'
			),
			'is_deleted' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
		));
		$this->dbforge->add_key('token_id', TRUE);
		$this->dbforge->create_table('token');
		# ==== ==== ==== ==== ==== ==== ==== ==== ====
		# == Table Jalur == 
		$this->dbforge->add_field(array(
			'jalur_id' => array(
				'type'						=> 'int',
				'constraint'			=> 5,
				'unsgined'				=> TRUE,
				'auto_increment'	=> TRUE
			),
			'key' => array(
				'type'				=> 'varchar',
				'constraint'	=> 20,
			),
			'details' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
			),
			'percentage' => array(
				'type'				=> 'int',
				'constraint'	=> 2,
			),
			'jumlah' => array(
				'type'				=> 'int',
				'constraint'	=> 4,
				'default'			=> 0,
			),
			'date_updated' => array(
				'type'			=> 'timestamp',
			),
			'date_created' => array(
				'type'					=> 'timestamp',
				'default'				=> 'current_timestamp'
			),
			'is_deleted' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
		));
		$this->dbforge->add_key('jalur_id', TRUE);
		$this->dbforge->create_table('jalur');
		# ==== ==== ==== ==== ==== ==== ==== ==== ====
		# == Table Country == 
		$this->dbforge->add_field(array(
			'country_id' => array(
				'type'						=> 'int',
				'constraint'			=> 3,
				'unsgined'				=> TRUE,
				'auto_increment'	=> TRUE
			),
			'country' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
			),
			'jumlah' => array(
				'type'				=> 'int',
				'constraint'	=> 4,
				'default'			=> 0,
			),
			'date_updated' => array(
				'type'			=> 'timestamp',
			),
			'date_created' => array(
				'type'					=> 'timestamp',
				'default'				=> 'current_timestamp'
			),
			'is_deleted' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 0
			),
		));
		$this->dbforge->add_key('country_id', TRUE);
		$this->dbforge->create_table('country');
	}

	public function down() {
		$this->dbforge->drop_table('penilaian');
		$this->dbforge->drop_table('essay');
		$this->dbforge->drop_table('project');
		$this->dbforge->drop_table('pencapaian');
		$this->dbforge->drop_table('perekomendasi');
		$this->dbforge->drop_table('provinsi');
		$this->dbforge->drop_table('info_fim');
		$this->dbforge->drop_table('komitmen');
		$this->dbforge->drop_table('regional');
		$this->dbforge->drop_table('agama');
		$this->dbforge->drop_table('rekruter');
		$this->dbforge->drop_table('peserta');
		$this->dbforge->drop_table('token');
		$this->dbforge->drop_table('user');
		$this->dbforge->drop_table('jalur');
		$this->dbforge->drop_table('country');
	}

}

?>