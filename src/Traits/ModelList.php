<?php
namespace App\Traits;

use App\Models\{Branch, Manufacturer, Terminal};

trait ModelList
{
    /**
     * @param $db
     * @return array
     */
    protected function getBranchList($db)
    {
        return (new Branch($db))->getBranchList();
    }

    /**
     * @param $db
     * @return array
     */
    protected function getManufacturerList($db)
    {
        return (new Manufacturer($db))->getManufacturerList();
    }

    /**
     * @param $db
     * @return array
     */
    protected function getTerminalList($db)
    {
        return (new Terminal($db))->getTerminalList();
    }

    /**
     * @return array
     */
    protected function getTerminalStatusList()
    {
        return array_combine(Terminal::getStatus(), Terminal::getStatus());
    }
}
