<?php
declare(strict_types=1);

namespace App\Domain\Data;

use App\Domain\Enum\Age;
use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    #[Assert\NotBlank]
    private ?string $name = null;

    #[Assert\NotBlank]
    private ?Age $age = null;

    #[Assert\Count(min: 1)]
    private ?array $interests = [];

    #[Assert\NotBlank]
    private ?string $opinion = null;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Contact
     */
    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Age|null
     */
    public function getAge(): ?Age
    {
        return $this->age;
    }

    /**
     * @param Age|null $age
     * @return Contact
     */
    public function setAge(?Age $age): self
    {
        $this->age = $age;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getInterests(): ?array
    {
        return $this->interests;
    }

    /**
     * @param array|null $interests
     * @return Contact
     */
    public function setInterests(?array $interests): self
    {
        $this->interests = $interests;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOpinion(): ?string
    {
        return $this->opinion;
    }

    /**
     * @param string|null $opinion
     * @return Contact
     */
    public function setOpinion(?string $opinion): self
    {
        $this->opinion = $opinion;
        return $this;
    }
}
