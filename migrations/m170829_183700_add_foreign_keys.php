<?php

use yii\db\Migration;

class m170829_183700_add_foreign_keys extends Migration
{
    public function Up()
    {
        $this->addForeignKey(group_ibfk_1, groups, teacher_id, teachers, id);
        $this->addForeignKey(students_ibfk_1, students, group_id, groups, id);
    }

    public function Down()
    {
        $this->dropForeignKey(groups, teacher_id);
        $this->dropForeignKey(students, group_id);
    }
}
