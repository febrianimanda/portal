<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user extends CI_Migration {

	public function up() {
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
			'password' => array(
				'type'				=> 'varchar',
				'constraint'	=> 50,
			),
			'role' => array(
				'type'				=> 'int',
				'constraint'	=> 1,
				'default'			=> 3
			),
			'date_created' => array(
				'type'		=> 'timestamp',
			),
			'date_updated' => array(
				'type'		=> 'timestamp',
			),
			'is_deleted' => array(
				'type'				=> 'int',
				'constraint'	=> 1
			),
		));
		
		$this->dbforge->add_key('user_id');
		$this->dbforge->create_table('user');
	}

	public function down() {
		$this->dbforge->drop_table('user');
	}

}

?>