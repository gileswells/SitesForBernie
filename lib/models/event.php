<?php

namespace SandersForPresident\Wordpress\Models;

class EventModel extends PostModel {
  var $location;
  var $date;
  var $time;
  var $title;
  var $description;


  function __construct ($postID = false) {
    parent::__construct($postID);
    $this->location = get_field('location', $this->postID);
    $this->date = get_field('date', $this->postID);
    $this->time = get_field('time', $this->postID);
  }

  function getDate() {
    return date('l F n, Y', strtotime($this->date));
  }

  function hasTime() {
    return !empty($this->time);
  }

  function hasLocation() {
    return !empty($this->location);
  }

  function getLocationCopy() {
    return $this->location['address'];
  }

}
