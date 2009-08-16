<?PHP

class helperFunctions
{
  /**
   * Searches a string for potentially malicious keywords that could cripple a database
   *
   * @param       string $in String to be searched
   * @return      True if keywords found, False otherwise
   */
  public static function isMaliciousString($in){
    $string = strtoupper($in);
    $token = strtok($string, " ");
    while ($token !== false)
    {
      if ($token=="DROP" or $token=="ALTER" or $token=="CREATE" or $token=="INSERT" or
        $token=="DELETE" or $token=="UPDATE" or $token=="TABLE" or $token=="SELECT"
        or $token=="EXEC")
      {
        return true;
      }
      $token = strtok(" ");
    }
      return false;
  }

  public static function getYearOfStudy($numerical)
  {
    switch ($numerical)
    {
      case 0:
        return "All";
      case 1:
        return "First Year";
      case 2:
        return "Second Year";
      case 3:
        return "Third Year";
      case 4:
        return "Fourth Year";
    }
  }

  public static function isLoggedIn(sfWebRequest $request)
  {
    return ($request->getCookie("username") && $request->getCookie("sid"));
  }
  
  public static function translateTerm($term)
  {
    switch ($term)
    {
      case 4:
        return "Winter";
      case 8:
        return "Summer";
      case 12:
        return "Fall";
      default:
        throw new Exception("unknown term");
    }
  }


  /**
   * Finds the mean value from an array, with indices being values and 
   * associated values being weights
   * e.g. {1=>31, 2=>53, 3=>15}
   *
   * @param       int $minIndex start index (min value)
   *              int $maxIndex end index (max value)
   *              array $array the array being used
   * @return      the weighted mean
   */
  public static function findMean($minIndex, $maxIndex, $array)
  {
    $total = 0;
    $weight = 0;
    for ($i=$minIndex; $i<$maxIndex; $i++){
      $total += $array[$i] * $i;
      $weight += $array[$i];
    }
    return $total / $weight;
  }

  /**
   * Finds the median value from an array with indices being values and
   * associated values being weights
   * e.g. {1=>31, 2=>53, 3=>15}
   *
   * @param       int $minIndex start index (min value)
   *              int $maxIndex end index (max value)
   *              array $array the array being used
   * @return      the median value
   */
  public static function findMedian($minIndex, $maxIndex, $array)
  {
    $total = 0;
    for ($i=$minIndex; $i<$maxIndex; $i++){
      $total += $array[$i];
    }
    $med = ($total+1)/2;

    $total = 0;
    for ($i=$minIndex; $i<=$maxIndex; $i++){
      $total += $array[$i];
      if (($total+0.5) == $med) {
        return ($i*2+1)/2;
      } else if ($total >= $med) {
        return $i;
      }
    }
  }
}