<?php

namespace Apiship\Api;

use Apiship\Entity\Account as AccountEntity;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 */
class Account extends AbstractApi
{
    /**
     * @return AccountEntity
     */
    public function getUserInformation()
    {
        $account = $this->adapter->get(sprintf('%s/account', self::ENDPOINT));
        $account = json_decode($account);

        return new AccountEntity($account->account);
    }
}
