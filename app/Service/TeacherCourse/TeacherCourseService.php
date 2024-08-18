<?php

namespace App\Service\TeacherCourse;

use App\Repositories\TeacherCourseRepositoryInterface;
use Illuminate\Http\Request;

class TeacherCourseService
{
    public function __construct(
        readonly TeacherCourseRepositoryInterface $teacherCourseRepositoryInterface,
        readonly Request $request
    ){}

    public function getTeacherCourses()
    {
        return $this->teacherCourseRepositoryInterface->index();
    }

    public function createTeacherCourse()
    {
        return $this->teacherCourseRepositoryInterface->store($this->data());
    }


    public function updateTeacherCourse(int $id)
    {
        return $this->teacherCourseRepositoryInterface->update($this->data(), $id);
    }

    public function destroyTeacherCourse(int $id)
    {
        return $this->teacherCourseRepositoryInterface->destroy($id);
    }


    public function data()
    {
        $data = [
            'name' => $this->request->get('name'),
            'cv' => $this->request->get('cv'),
            'evidence' => $this->request->get('evidence'),
            'user_id' => $this->request->get('user_id'),
        ];

        return $data;
    }
}
