<?php

namespace App\Entity;

use App\Repository\TickettingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TickettingRepository::class)
 */
class Ticketting
{
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->society . $this->repair;
    }

    public function __construct()
    {
//        Give date for ticket
        $this->date = new \DateTime('now');

//        take ip address of the computer who make the ticket
        $interfaces = ['wlan', 'eth', 'en'];
        $found = 0;
        $interfaces_text = '';
        $interfaces_text_short = '';

        foreach ($interfaces as $interface) {

            for ($i = 0;$i < 5;++$i) {

                $command = '/sbin/ifconfig '.$interface.$i." | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'";
                $localIP = exec($command);

                if ($localIP != '') {

                    $interfaces_text .= '('.$interface.$i.')'.$localIP;
                    $interfaces_text_short .= '('.$interface.$i.') '.$localIP;
                    ++$found;

                } else {

                    $command = '/sbin/ifconfig '.$interface.$i." | grep 'inet' | cut -d: -f2 | awk '{ print $2}'";
                    $localIP = exec($command);

                    if ($localIP != '') {

                        $interfaces_text .= '('.$interface.$i.')'.$localIP;
                        $interfaces_text_short .= '('.$interface.$i.') '.$localIP;
                        ++$found;

                    }
                }
            }
        }

        $this->ip_address = $interfaces_text;

    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $society;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @ORM\Column(type="text")
     */
    private $comment;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $repair;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $treated;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSociety(): ?string
    {
        return $this->society;
    }

    public function setSociety(string $society): self
    {
        $this->society = $society;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getRepair(): ?bool
    {
        return $this->repair;
    }

    public function setRepair(bool $repair): self
    {
        $this->repair = $repair;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getTreated(): ?bool
    {
        return $this->treated;
    }

    public function setTreated(?bool $treated): self
    {
        $this->treated = $treated;

        return $this;
    }
}
