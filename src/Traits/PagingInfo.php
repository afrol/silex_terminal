<?php

namespace App\Traits;

trait PagingInfo
{
    protected $offset = 0;
    protected $limit = 50;
    protected $page = 1;
    protected $total = 0;

    protected function generatePagingInfo()
    {
        if (!empty($_REQUEST['limit']) && $_REQUEST['limit'] > 0) {
            $this->limit = (int) $_REQUEST['limit'];
        }

        if (!empty($_REQUEST['page']) && $_REQUEST['page'] > 0) {
            $this->page = (int) $_REQUEST['page'];
        } elseif (isset($_REQUEST['off']) && $_REQUEST['off'] >= 0) {
            $this->page = $_REQUEST['off'] == 0 ? 1 : (int) $_REQUEST['off'] + 1;
        }

        $this->offset = ($this->page - 1) * $this->limit;
    }

    /**
     * @param int $limit
     */
    protected function setLimit($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return int
     */
    protected function getLimit()
    {
        return $this->limit;
    }

    protected function getOffset()
    {
        return $this->offset;
    }

    protected function getPage()
    {
        return $this->page;
    }

    protected function getPagingInfo()
    {
        return [
            'page' => $this->getPage(),
            'limit' => $this->getLimit(),
            'offset' => $this->getOffset(),
            'total' => $this->getTotal()
        ];
    }

    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }
}
