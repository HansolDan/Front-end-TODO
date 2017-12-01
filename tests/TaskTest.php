
<?php

if (! class_exists('PHPUnit_Framework_TestCase')) {
	class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

require_once '../application/models/Task.php';

class TaskTest extends PHPUnit_Framework_TestCase
{
    private $CI;
    private $task;

    public function setUp()
    {
        $this->CI = &get_instance();
        $this->task = new Task;
    }

	/*
	 * numeric|greater than 0
	 */
    public function testSetId()
    {
       // Valid test Id
        $this->task->Id = 2;
        $this->assertEquals(2, $this->task->id);

        // Invalid test Id (No numeric type)
        $this->task->Id = "test";
        $this->assertNotEquals("test", $this->task->id);
    }

	/*
	 * alpha_numeric_spaces|max_length[64]
	 */
    public function testSetTask() {
	    // testing a valid entry
	    // should expect equals
	    $value = "valid task entry";
	    $this->task->Task = $value;
	    $this->assertEquals( $value, $this->task->task );

	    // alpha-numeric, 64 characters, spaces don't count
	    // should expect equals
	    $limit = "S crT45RaAIha59hNu6h5e6auwgCXpYUWntOGqq7FxkXv1h8q3NK8qefbWvV8FZa6";
	    $this->task->Task = $limit;
	    $this->assertEquals( $limit, $this->task->task );

	    // 1 character over limit (65 chars)
	    // should expect not equals
	    $tooLong = "1 S c r T 4 5 RaAIha59hNu6h5e6auwgCXpYUWntOGqq7FxkXv1h8q3NK8qefbWvV8FZa6";
	    $this->task->Task = $tooLong;
	    $this->assertNotEquals( $tooLong, $this->task->task );

	    // empty string
	    // should expect not equals
	    $empty = "";
	    $this->task->Task = $empty;
	    $this->assertNotEquals( $empty, $this->task->task );

    }

	/*
	 * integer|less_than[4]
	 */
    public function testSetPriority()
    {
        // 3 Valid Priority
        $this->task->Priority = 3;
        $this->assertEquals(3, $this->task->priority);

        // string invalid priority - not a number
        $this->task->Priority = "not a number";
        $this->assertNotEquals("not a number", $this->task->priority);

        // 4 is invalid priority.
        $this->task->Priority = 4;
        $this->assertNotEquals(4, $this->task->priority);

        // -1 is invalid priority
        $this->task->Priority = -1;
        $this->assertNotEquals(-1, $this->task->priority);
    }


	/*
	 * integer|less_than[4]
	 */
    public function testSetSize()
    {
        // 3 valid size.
        $this->task->Size = 3;
        $this->assertEquals(3, $this->task->size);

        // string is invalid  size - not a number
        $this->task->Size = "not a number";
        $this->assertNotEquals("not a number", $this->task->size);

        // 4 is invalid  size.
        $this->task->Size = 4;
        $this->assertNotEquals(4, $this->task->size);

        // -1 is invalid size
        $this->task->Size = -1;
        $this->assertNotEquals(-1, $this->task->size);
    }


	/*
	 * integer|less_than[5]
	 */
	public function testSetGroup()
	{
		// 4 is valid group.
		$this->task->Group = 4;
		$this->assertEquals(4, $this->task->group);

		// 1 is valid group.
		$this->task->Group = 1;
		$this->assertEquals(1, $this->task->group);

		// non-numeric string is invalid group - not a number
		$this->task->Group = "not a number";
		$this->assertNotEquals("not a number", $this->task->group);

		// 5 is invalid  group
		$this->task->Group= 5;
		$this->assertNotEquals(5, $this->task->group);

		// -1 is invalid  group
		$this->task->Group = -1;
		$this->assertNotEquals(-1, $this->task->group);
	}

	/*
	 * no set rule
	 */
	public function testSetDeadline()
	{
		$valid = "2017-11-05";
		$this->task->Deadline = $valid;
		$this->assertEquals($valid, $this->task->deadline);

		$alsoValid = "Sunday, October 5th 2017";
		$this->task->Deadline = $alsoValid;
		$this->assertEquals($alsoValid, $this->task->deadline);
	}

	/*
	 * either 1 or 2
	 */
	public function testSetStatus()
	{
		// 2 is valid Status.
		$this->task->Status = 2;
		$this->assertEquals(2, $this->task->status);

		// non-numeric string is invalid Status - not a number
		$this->task->Status = "not a number";
		$this->assertNotEquals("not a number", $this->task->status);

		// 3 is invalid Status
		$this->task->Status = 3;
		$this->assertNotEquals(3, $this->task->status);

		// -1 is invalid Status
		$this->task->Status = -1;
		$this->assertNotEquals(-1, $this->task->status);

	}

	/*
	 * has to be 1
	 */
	public function testSetFlag()
	{
		// 1 is valid Flag.
		$this->task->Flag = 1;
		$this->assertEquals(1, $this->task->flag);

		// non-numeric string is invalid Flag - not a number
		$this->task->Flag = "not a number";
		$this->assertNotEquals("not a number", $this->task->flag);

		// 3 is invalid Flag
		$this->task->Flag = 3;
		$this->assertNotEquals(3, $this->task->flag);
	}
}
