<?php

namespace App\Respositories;

use App\Models\Support;
use App\Models\User;

class SupportRepository
{
    protected $entity;

    public function __construct(Support $model)
    {
        $this->entity = $model;
    }

    public function getSupports(array $filters = [])
    {
        return $this->getUserAuth()
            ->supports()
            ->where(function ($query) use ($filters) {
                if (isset($filters['lesson'])) {
                    $query->where('lesson_id', $filters['lesson']);
                }
                if (isset($filters['status'])) {
                    $query->where('status', $filters['status']);
                }
                if (isset($filters['filter'])) {
                    $filter = $filters['filter'];
                    $query->where('description', 'LIKE', "%{$filter}%");
                }
            })
            ->orderBy('updated_at')
            ->get();
    }

    public function createNewSupport(array $data): Support
    {
        $support = $this->getUserAuth()
            ->supports()
            ->create([
                'lesson_id' => $data['lesson'],
                'description' => $data['description'],
                'status' => $data['status']
            ]);

        return $support;
    }

    public function createReplyToSupportid(string $suportId, array $data)
    {
        $user = $this->getUserAuth();

        return $this->getSupport($suportId)
            ->replies()
            ->create([
                'user_id' => $user->id,
                'description' => $data['description'],
            ]);
    }

    public function getSupport(string $id)
    {
        return $this->entity->findOrFail($id);
    }

    private function getUserAuth()
    {
        //return auth()->user()->first();
        return User::first();
    }
}
