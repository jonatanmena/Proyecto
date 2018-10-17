<?php
    namespace Daos;
    
    class ListCalendarDao extends SingletonDao implements ICalendarDao
    {
      private $CalendarList;

      public function __construct()
      {
          if (isset($_SESSION['Calendar List'])) {
              $this->CalendarList = &$_SESSION['Calendar List'];
          } else {
              $_SESSION['Calendar List'] = array();
          }
      }

      public function add($Calendar)
      {
          array_push($this->CalendarList, $Calendar);
      }

      public function getAll()
      {
        return $this->CalendarList;
      }

      public function GetByCalendarCode($CalendarCode)
      {
        $CalendarObject = null;
          foreach ($this->CalendarList as $Calendar)
          {
              if($Calendar->getID()==$CalendarCode)
              {
                $CalendarObject = $Calendar;
                break;
              }
          }
        return $CalendarObject;
      }

      public function delete($CalendarCode)
      {
        $i=0;

        foreach ($this->CalendarList as $Calendar)
        {
            if($Calendar->getID() == $CalendarCode)
            {
                unset($this->CalendarList[$i]);
            }
            $i++;
        }
        $this->CalendarList = array_values($this->CalendarList);
      }
    }
 ?>
