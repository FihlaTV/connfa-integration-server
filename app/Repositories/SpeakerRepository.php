<?php

namespace App\Repositories;

use App\Models\Speaker;

class SpeakerRepository extends BaseRepository
{

    public function model()
    {
        return Speaker::class;
    }

    /**
     * Get speakers with deleted since $since param if passed
     *
     * @param string|bool $since
     * @return mixed
     */
    public function getSpeakersWithDeleted($since = false)
    {
        if ($since) {
            return $this->model->withTrashed()->where('updated_at', '>=', $since->toDateTimeString())->get();
        }

        return $this->model->withTrashed()->get();
    }

    /**
     * Get limit last updated speakers
     *
     * @param int $conferenceId
     * @param int $limit
     *
     * @return mixed
     */
    public function getLimitLastUpdated($conferenceId, $limit = 5)
    {
        return $this->model
            ->whereHas('events', function ($query) use ($conferenceId) {
                $query->where('conference_id', $conferenceId);
            })
            ->orderBy('updated_at', 'DESC')
            ->limit($limit)
            ->get();
    }

}
