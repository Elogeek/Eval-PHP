<?php
namespace App\Entity;

use App\Entity\User;

class Message {

    private ?int $id;
    private ?string $date;
    private ?int  $user_fk;
    private ?string $content;

    /**
     * Message constructor.
     * @param int|null $id
     * @param string|null $date
     * @param int|null $user_fk
     * @param string|null $content
     */
    public function __construct(int $id = null, string $date = null, int $user_fk = null, string $content = null) {
        $this->id = $id;
        $this->date = $date;
        $this->user_fk = $user_fk;
        $this->content = $content;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string {
        return $this->date;
    }

    /**
     * @param string|null $date
     */
    public function setDate(?string $date): void {
        $this->date = $date;
    }

    /**
     * @return int|null
     */
    public function getUserFk(): ?int {
        return $this->user_fk;
    }

    /**
     * @param int|null $user_fk
     */
    public function setUserFk(?int $user_fk): void {
        $this->user_fk = $user_fk;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string {
        return $this->content;
    }

    /**
     * @param string|null $content
     */
    public function setContent(?string $content): void {
        $this->content = $content;
    }

}
