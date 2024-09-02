<?php

namespace App\Service\Course;

use App\Repositories\CourseRepositoryInterface;
use Illuminate\Http\Request;

class CourseService
{
    public function __construct(
        readonly CourseRepositoryInterface $courseRepositoryInterface,
        readonly Request $request
    ){}
    public function getCourses()
    {
        return $this->courseRepositoryInterface->index();
    }

    public function getCoursesOnline()
    {
        return $this->courseRepositoryInterface->indexOnline();
    }

    public function getCourse(int $id)
    {
        return $this->courseRepositoryInterface->show($id);
    }

    public function getCourseOnline(int $id)
    {
        return $this->courseRepositoryInterface->showOnline($id);
    }

    public function createCourse()
    {
        return $this->courseRepositoryInterface->store($this->data());
    }

    public function updateCourse(int $id)
    {
        return $this->courseRepositoryInterface->update($this->data(), $id);
    }

    public function destroyCourse(int $id)
    {
        return $this->courseRepositoryInterface->destroy($id);
    }

    public function data()
    {
        $data = [
            'title' => $this->request->get('title'),
            'description' => $this->request->get('description'),
            'price' => $this->request->get('price'),
            'duration_course' => $this->request->get('duration_course'),
            'method_holding' => $this->request->get('method_holding'),
            'course_teacher_id' => $this->request->get('course_teacher_id'),
        ];

        return $data;
    }
}
