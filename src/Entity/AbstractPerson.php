<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/graphqlite-sandbox created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace App\Entity;

use Gpupo\PackSymfonyCommon\Graphql\TypeAnnotatedGeneratorInterface;
use Symfony\Component\Validator\Constraints as Assert;
use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\Type;

/**
 * @Type()
 */
abstract class AbstractPerson extends AbstractType implements TypeAnnotatedGeneratorInterface
{
    /**
     * @Field()
     * @Assert\NotBlank
     * @Assert\Length(max=64)
     */
    public function getName(): ?string
    {
        return $this->get('name');
    }

    /**
     * @Field()
     * @Assert\Email
     * @Assert\Length(max=64)
     */
    public function getEmail(): ?string
    {
        return $this->get('email');
    }

    /**
     * @Field()
     * @Assert\NotBlank
     * @Assert\Length(min=11, max=16)
     */
    public function getDocument(): ?string
    {
        return $this->get('document');
    }

    /**
     * @Field()
     * @Assert\Choice({"individual", "company"})
     */
    public function getType(): ?string
    {
        return $this->get('type');
    }

    /**
     * @Field()
     * @Assert\Choice({"male", "female"})
     */
    public function getGender(): ?string
    {
        return $this->get('gender');
    }

    /**
     * @Field()
     */
    public function getStatus(): ?string
    {
        return $this->get('status');
    }
}
