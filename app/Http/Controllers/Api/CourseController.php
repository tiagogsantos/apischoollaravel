<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Respositories\CourseRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $repository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->repository = $courseRepository;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return CourseResource::collection($this->repository->getAllCourses());
    }

    public function show($id): \Illuminate\Http\Resources\Json\JsonResource
    {
        return new CourseResource($this->repository->getCourse($id));
    }
}
