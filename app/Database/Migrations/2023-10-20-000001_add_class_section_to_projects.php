<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddClassSectionToProjects extends Migration
{
    public function up()
    {
        $this->forge->addColumn('projects', [
            'class_section' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
                'after'      => 'team_members'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('projects', 'class_section');
    }
}