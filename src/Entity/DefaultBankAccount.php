<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Entity;

use Gpupo\PackSymfonyCommon\Graphql\TypeInterface;
use Symfony\Component\Validator\Constraints as Assert;
use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\Type;

/**
 * @Type()
 */
class DefaultBankAccount extends AbstractType implements TypeInterface
{
    /**
     * @Field()
     * @Assert\Length(max=30)
     */
    public function getHolderName(): string
    {
        return $this->get('holder_name');
    }

    /**
     * @Field()
     */
    public function getHolderDocument(): string
    {
        return $this->get('holder_type');
    }

    /**
     * @Field()
     */
    public function getBank(): int
    {
        return $this->get('bank');
    }

    /**
     * @Field()
     */
    public function getBranchNumber(): int
    {
        return $this->get('branch_number');
    }

    /**
     * @Field()
     */
    public function getBranchCheckDigit(): int
    {
        return $this->get('branch_check_digit');
    }

    /**
     * @Field()
     */
    public function getAccountNumber(): int
    {
        return $this->get('account_number');
    }

    /**
     * @Field()
     */
    public function getAccountCheckDigit(): int
    {
        return $this->get('account_check_digit');
    }

    /**
     * @Field()
     */
    public function getType(): string
    {
        return $this->get('type');
    }

    /**
     * @Field()
     */
    public function getStatus(): string
    {
        return $this->get('status');
    }

    /**
     * @Field()
     */
    public function getChecking(): string
    {
        return $this->get('checking');
    }

    /**
     * @Field()
     */
    public function getActive(): string
    {
        return $this->get('active');
    }
}
