<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PortsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PortsTable Test Case
 */
class PortsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PortsTable
     */
    protected $Ports;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Ports',
        'app.Modules',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ports') ? [] : ['className' => PortsTable::class];
        $this->Ports = $this->getTableLocator()->get('Ports', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Ports);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PortsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
