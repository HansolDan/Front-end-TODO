<?php

require_once '../application/core/Entity.php';

/**
 * Task entity class, with setter methods for each task property from tasks.csv
 * id,task,priority,size,group,deadline,status,flag
 */
class Task extends Entity
{
    var $id,
        $task,
        $priority,
        $size,
        $group,
        $deadline,
        $status,
        $flag;

    public function __construct()
	{
		parent::__construct();
	}

	public function setId($value)
	{
		if ((is_numeric($value)) && ($value > 0))
		{
			$this->id = $value;
		}
	}

	public function setTask($value)
	{
		// alphanumeric, below 64 characters
		// strip spaces
		$formatted = str_replace(' ', '', $value);
		if ((ctype_alnum($formatted)) && (strlen($formatted) <= 64))
		{
			$this->task = $value;
			return true;
		}
	}

	public function setPriority($value)
	{
		// integer, positive, less than 4
		if ((is_numeric($value)) && ($value > 0) && ($value < 4))
		{
            $this->priority = $value;
        }
	}

	public function setSize($value)
	{
		// integer, positive, less than 4
		if ((is_numeric($value)) && ($value > 0) && ($value < 4))
		{
            $this->size = $value;
        }
	}

	public function setGroup($value)
	{
		// integer, positive, less than 5
		if ((is_numeric($value)) && ($value > 0) && ($value < 5))
		{
			$this->group = $value;
		}
	}

	public function setDeadline($value)
	{
		$this->deadline = $value;
	}

	public function setStatus($value)
	{
		// has to be either 1 or 2
		if ((is_numeric($value)) && ($value > 0) && ($value < 3))
		{
            $this->status = $value;
        }
	}

	public function setFlag($value)
	{
		if ((is_numeric($value)) && ($value == 1))
		{
            $this->flag = $value;
        }
	}
}
