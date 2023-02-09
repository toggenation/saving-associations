<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTables extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $this->table('devices')
            ->addColumn('device_status_id', 'integer')
            ->addColumn('name', 'string')
            ->create();

        $this->table('modules')
            ->addColumn('name', 'string')
            ->addColumn('module_state_id', 'integer')
            ->addColumn('module_class_id', 'integer')
            ->addColumn('module_type_id', 'integer')
            ->addColumn('device_id', 'integer')
            ->create();

        $this->table('ports')
            ->addColumn('physical_port', 'string')
            ->addColumn('port_unit_id', 'integer')
            ->addColumn('port_identity', 'string')
            ->addColumn('name', 'string')
            ->create();

        $this->table('modules_ports')
            ->addColumn('port_id', 'integer')
            ->addColumn('module_id', 'integer')
            ->addColumn('extra_data', 'string', ['default' => ''])
            ->create();
    }
}
