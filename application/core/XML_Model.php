<?php

class XML_Model extends Memory_Model
{
	protected $xml = null;

	function __construct($origin = null, $keyfield = 'id', $entity = null)
	{
		parent::__construct();

		if (file_exists('../data/tasks.xml')) {
			$this->xml = simplexml_load_file('../data/tasks.xml');
		} else {
			exit('Failed to open tasks.xml.');
		}

		// remember the other constructor fields
		$this->_keyfield = $keyfield;

		// start with an empty collection
		$this->_data = array(); // an array of objects
		$this->_fields = array(); // an array of strings
		// and populate the collection
		$this->load();
	}

	/**
	 * Load the collection state appropriately, depending on persistence choice.
	 * OVER-RIDE THIS METHOD in persistence choice implementations
	 */
	protected function load()
	{
		//---------------------
		$data = $this->xml;
		$first = true;
		foreach ($data as $task)
		{
			if ($first)
			{
				// populate field names from first row
				foreach ($task as $name)
				{
					array_push($this->_fields, $name->getName());
				}
				$first = false;
			}
			// build object from a row
			$record = new stdClass();
			for ($i = 0; $i < count($this->_fields); $i ++)
			{
				$record->{$this->_fields[$i]} = (string) $task->{$this->_fields[$i]};
			}
			$key = $record->{$this->_keyfield};
			$this->_data[$key] = $record;
		}
		// --------------------
		// rebuild the keys table
		 $this->reindex();
	}

	/**
	 * Store the collection state appropriately, depending on persistence choice.
	 * OVER-RIDE THIS METHOD in persistence choice implementations
	 */
    protected function store()
    {
        // rebuild the keys table
        $this->reindex();

        if (($handle = fopen('../data/tasks.xml', "w")) !== FALSE)
        {
            $xmlDoc = new DOMDocument( "1.0");
            $xmlDoc->preserveWhiteSpace = false;
            $xmlDoc->formatOutput = true;
            $data = $xmlDoc->createElement("tasks");

            foreach($this->_data as $key => $value)
            {

                $task  = $xmlDoc->createElement("taskObject");

                foreach ($value as $tasksTitle => $record ){

                    $task_element = $xmlDoc->createElement($tasksTitle, htmlspecialchars($record));
                    $task->appendChild($task_element);

                }
                $data->appendChild($task);
            }

            $xmlDoc->appendChild($data);
            $xmlDoc->saveXML($xmlDoc);
            $xmlDoc->save('../data/tasks.xml');
        }
    }
}
