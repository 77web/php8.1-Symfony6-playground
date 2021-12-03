<?php
declare(strict_types=1);

namespace App\Domain\Data;

class Contact
{
    private ?string $name = null;
    private ?string $age = null;
    private ?array $interests = [];
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
     * @return string|null
     */
    public function getAge(): ?string
    {
        return $this->age;
    }

    /**
     * @param string|null $age
     * @return Contact
     */
    public function setAge(?string $age): self
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