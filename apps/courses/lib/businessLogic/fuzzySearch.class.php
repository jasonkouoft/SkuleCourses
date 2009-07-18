<?php

/**
 * Search by any fuzzy parameter
 *
 * @author     Jimmy Lu
 */
class fuzzySearch
{
  private $_profList;
  private $_courseList;
  
  public function getInstructorList()
  {
    return $this->_profList;
  }
  
  public function getCourseList()
  {
    return $this->_courseList;
  }
  
  public function query($query, $propelConnection)
  {
    $refQuery = trim($query);
    if (count_chars($refQuery) < 3)
    {
      throw new Exception("Too few characters in the query string");
    }
    else 
    {
      // search for courses
      $c = new Criteria();
      $idCrit = $c->getNewCriterion(CoursePeer::ID, $refQuery."%", Criteria::LIKE);
      $nameCrit = $c->getNewCriterion(CoursePeer::DESCR, "%".$refQuery."%", Criteria::LIKE);
      $idCrit->addOr($nameCrit);
      $c->addAnd($idCrit);
      $c->setDistinct();
      $c->addAscendingOrderByColumn(CoursePeer::ID);
      $this->_courseList = CoursePeer::doselect($c, $propelConnection);
      
      // search for professors
      $c = new Criteria();
      $firstNameCrit = $c->getNewCriterion(InstructorPeer::FIRST_NAME, "%".$refQuery."%", Criteria::LIKE);
      $lastNameCrit = $c->getNewCriterion(InstructorPeer::LAST_NAME, "%".$refQuery."%", Criteria::LIKE);
      $firstNameCrit->addOr($lastNameCrit);
      $c->addAnd($firstNameCrit);
      $c->setDistinct();
      $c->addAscendingOrderByColumn(InstructorPeer::LAST_NAME);
      $this->_profList = InstructorPeer::doSelect($c, $propelConnection);
    }
  }
}