<?php

namespace Anaxago\CoreBundle\Entity\Traits;



trait AmountTrait
{
    /**
     *
     * @param integer $status
     *
     * @return Project
     */
    public function setAmount(int $amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     *
     * @return integer
     */
    public function getAmount() : int
    {
        return $this->amount;
    }
}
