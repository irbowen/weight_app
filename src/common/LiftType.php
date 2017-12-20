<?php declare(strict_types = 1);

/*
 * Describes all the information we want to keep about a single
 * type of lift/exercise you can perform. For now, this just keeps
 * track of the name, but will latter have body weight scale factors
 * and other information unqiue to the lift
 * 
 * @author Isaac Bowen bowen.isaac@gmail.com
 */
class LiftType {

    private $short_name;
    private $full_name;
    private $description;

    public function __construct(string $short_name, 
            string $full_name, string $description) {
        $this->short_name = $short_name;
        $this->full_name = $full_name;
        $this->description = $description;
    }

    public function getShortName(): string {
        return $this->short_name;
    }

    public function getFullName(): string {
        return $this->full_name;
    }

    public function getDescription(): string {
        return $this->description;
    }

}
