<?php

namespace Drupal\ddd_attendees\Model;

/**
 * Class Person
 */
class Person {

  /**
   * @var string
   */
  private $name;

  /**
   * @var array
   */
  private $answers;

  /**
   * @var bool
   */
  private $individualSponsor;

  /**
   * @var bool
   */
  private $attended;

  /**
   * @var string
   */
  private $email;

  /**
   * Attendee constructor.
   *
   * @param string $name
   * @param string $email
   * @param array $answers
   * @param bool $individualSponsor
   */
  public function __construct($name, $email, array $answers, $attended = TRUE, $individualSponsor = FALSE) {
    $this->name = $name;
    $this->email = $email;
    $this->answers = $answers;
    $this->attended = $attended;
    $this->individualSponsor = $individualSponsor;
  }

  /**
   * @return mixed
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @return string
   */
  public function getEmail() {
    return $this->email;
  }

  /**
   * @return mixed
   */
  public function getAvatar() {
    $hash = md5(strtolower(trim($this->getEmail())));
    return "http://www.gravatar.com/avatar/{$hash}?d=identicon";
  }

  /**
   * @return array
   */
  public function getAnswers() {
    return $this->answers;
  }

  /**
   * @return array
   */
  public function getAnswer($question) {
    return isset($this->answers[$question]) ? $this->answers[$question] : '';
  }

  /**
   * @return boolean
   */
  public function isAttended() {
    return $this->attended;
  }

  /**
   * @return boolean
   */
  public function isIndividualSponsor() {
    return $this->individualSponsor;
  }
}
