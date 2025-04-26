<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use PharIo\Manifest\Type;

class MigrationKebakaranTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"=> ['type' => 'INT', 'auto_increment' => true],
            'name'=> ['type'=> 'VARCHAR','constraint' => 255],
            'email'=> ['type'=> 'VARCHAR','constraint' => 255],
            'gender'=> ['type'=> 'ENUM','constraint' => ['Male', 'Female']],
            'hobbies'=> ['type'=> 'TEXT','null' => true],
            'country'=> ['type'=> 'VARCHAR','constraint'=> 100],
            'status'=> ['type'=> 'BOOLEAN','default'=> 1],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('ins_kebakaran');
    }

    public function down()
    {
        $this->forge->dropTable('ins_kebakaran');
    }
}
