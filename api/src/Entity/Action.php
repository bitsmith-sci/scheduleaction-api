<?php

declare(strict_types=1);

namespace App\Entity;

use App\Enum\ActionStatusType;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * An action performed by a direct agent and indirect participants upon a direct object. Optionally happens at a location with the help of an inanimate instrument. The execution of the action may produce a result. Specific action sub-type documentation specifies the exact expectation of each argument/role.\\n\\nSee also \[blog post\](http://blog.schema.org/2014/04/announcing-schemaorg-actions.html) and \[Actions overview document\](http://schema.org/docs/actions.html).
 *
 * @see http://schema.org/Action Documentation on Schema.org
 *
 * @ORM\Entity
 */
class Action
{
    /**
     * @var int|null
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null indicates the current disposition of the Action
     *
     * @ORM\Column(nullable=true)
     * @Assert\Choice(callback={"ActionStatusType", "toArray"})
     */
    private $actionStatus;

    /**
     * @var Thing|null The direct performer or driver of the action (animate or inanimate). e.g. \*John\* wrote a book.
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Thing")
     */
    private $agent;

    /**
     * @var Thing|null Other co-agents that participated in the action indirectly. e.g. John wrote a book with \*Steve\*.
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Thing")
     */
    private $participant;

    /**
     * @var Thing|null The object upon which the action is carried out, whose state is kept intact or changed. Also known as the semantic roles patient, affected or undergoer (which change their state) or theme (which doesn't). e.g. John read \*a book\*.
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Thing")
     */
    private $object;

    /**
     * @var Thing|null The result produced in the action. e.g. John wrote \*a book\*.
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Thing")
     */
    private $result;

    /**
     * @var Thing|null The object that helped the agent perform the action. e.g. John wrote a book with \*a pen\*.
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Thing")
     */
    private $instrument;

    /**
     * @var \DateTimeInterface|null The startTime of something. For a reserved event or service (e.g. FoodEstablishmentReservation), the time that it is expected to start. For actions that span a period of time, when the action was performed. e.g. John wrote a book from \*January\* to December.\\n\\nNote that Event uses startDate/endDate instead of startTime/endTime, even when describing dates with times. This situation may be clarified in future revisions.
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $startTime;

    /**
     * @var \DateTimeInterface|null The endTime of something. For a reserved event or service (e.g. FoodEstablishmentReservation), the time that it is expected to end. For actions that span a period of time, when the action was performed. e.g. John wrote a book from January to \*December\*.\\n\\nNote that Event uses startDate/endDate instead of startTime/endTime, even when describing dates with times. This situation may be clarified in future revisions.
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $endTime;

    /**
     * @var string|null the location of for example where the event is happening, an organization is located, or where an action takes place
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $location;

    /**
     * @var Thing|null for failed actions, more information on the cause of the failure
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Thing")
     */
    private $error;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setActionStatus(?string $actionStatus): void
    {
        $this->actionStatus = $actionStatus;
    }

    public function getActionStatus(): ?string
    {
        return $this->actionStatus;
    }

    public function setAgent(?Thing $agent): void
    {
        $this->agent = $agent;
    }

    public function getAgent(): ?Thing
    {
        return $this->agent;
    }

    public function setParticipant(?Thing $participant): void
    {
        $this->participant = $participant;
    }

    public function getParticipant(): ?Thing
    {
        return $this->participant;
    }

    public function setObject(?Thing $object): void
    {
        $this->object = $object;
    }

    public function getObject(): ?Thing
    {
        return $this->object;
    }

    public function setResult(?Thing $result): void
    {
        $this->result = $result;
    }

    public function getResult(): ?Thing
    {
        return $this->result;
    }

    public function setInstrument(?Thing $instrument): void
    {
        $this->instrument = $instrument;
    }

    public function getInstrument(): ?Thing
    {
        return $this->instrument;
    }

    public function setStartTime(?\DateTimeInterface $startTime): void
    {
        $this->startTime = $startTime;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->startTime;
    }

    public function setEndTime(?\DateTimeInterface $endTime): void
    {
        $this->endTime = $endTime;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }

    public function setLocation(?string $location): void
    {
        $this->location = $location;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setError(?Thing $error): void
    {
        $this->error = $error;
    }

    public function getError(): ?Thing
    {
        return $this->error;
    }
}
