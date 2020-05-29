<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * Class Mark
 *
 * @package App
 * @property string $course
 * @property string $student
 * @property string $lesson
 * @property string $question
 * @property integer $correct
 * @property integer $score
 * @property string $mark
 *  @property string $test
*/
class Mark extends Model
{
    use SoftDeletes;

    protected $fillable = ['course', 'lesson','mark','course_id','lessons_id','test_id','student_id','tests_result','created_at ','updated_at','deleted_at'];
    protected $casts = [
        'type' => 'array',
 ];

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCourseIdAttribute($input)
    {
        $this->attributes['course_id'] = $input ? $input : null;

    }

    public function setTestsIdAttribute($input)
    {
        $this->attributes['test_id'] = $input ? $input : null;
    }
    
    public function setStudentIdAttribute($input)
    {

        $this->attributes['student_id'] = $input ? $input : null;
    }
    public function setTestResultIdAttribute($input)
    {
        $this->attributes['test_result'] = $input ? $input : null;
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id')->withTrashed();
    }

    public function lessons()
    {
        return $this->belongsTo(Lesson::class, 'lessons_id')->withTrashed();
    }
    public function test() {
        return $this->belongsTo(Test::class, 'test_id')->withTrashed();
    }

    public function students()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function testresult()
    {
        return $this->belongsTo(TestsResult::class, 'tests_result');
    }
    
}
