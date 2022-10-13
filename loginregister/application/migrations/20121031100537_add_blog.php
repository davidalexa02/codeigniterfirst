<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_blog extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
            ),
            'status' => array(
                'type' => 'VARCHAR',
                'constraint' => 11
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('blog');
    }

    public function down()
    {
        $this->dbforge->drop_table('blog');
    }
}
