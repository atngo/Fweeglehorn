<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ThreadRepository")
 */
class Thread
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
	 * @ORM\Column(type="text", length=100)
	 */
	 private $title;

	  /**
	 * @ORM\Column(type="text")
	 */
	 private $body;

	 /**
	 * @ORM\Column(type="text")
	 */
	// private $username;

	 /**
	 * @ORM\Column(type="text")
	 */
	private $category;

	 //Getters & Setters
	 public function getId() {
	 	 return $this->id;
	 }

	 public function getTitle() {
	 	 return $this->title;
	 }
	 public function setTitle($title){
		$this->title = $title;
	 }
	 public function getBody(){
	 	 return $this->body;
	 }
	 public function setBody($body){
		 $this->body = $body;
	 }

	 public function getCategory() {
		return $this->category;
	}
	
	public function setCategory($category){
		$this->category = $category;
	 }
	 
}
