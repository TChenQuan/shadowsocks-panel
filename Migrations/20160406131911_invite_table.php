<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class InviteTable extends AbstractMigration
{
    public function change()
    {
        $this->table("invite", array('comment' => '邀请码'))
            ->addColumn('uid', 'integer', ['limit' => 10, 'default' => -1])
            ->addColumn('dateLine', 'integer', ['limit' => 11, 'default' => 0])
            ->addColumn('expiration', 'integer', ['limit' => 3])
            ->addColumn('inviteIp', 'string', ['limit' => 32, 'null' => true])
            ->addColumn('invite', 'string', ['limit' => 60])
            ->addColumn('reguid', 'integer', ['limit' => 10, 'null' => true])
            ->addColumn('regDateLine', 'integer', ['limit' => 11, 'default' => 0])
            ->addColumn('plan', 'string', ['limit' => 4, 'default' => 'A'])
            ->addColumn('status', 'integer', ['limit' => MysqlAdapter::INT_TINY, 'comment' => '-1过期 0-未使用 1-已用'])
            ->addIndex(['invite'], ['unique' => true])
            ->addIndex(['invite', 'uid'], [])
            ->create();
    }
}
