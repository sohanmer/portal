<?php

namespace App\Models\HR;

use Illuminate\Database\Eloquent\Model;
use App\Models\HR\Evaluation\Segment as EvaluationSegment;
use App\Models\HR\Evaluation\Parameter as EvaluationParameter;

class Round extends Model
{
    protected $fillable = ['name', 'guidelines', 'confirmed_mail_template', 'rejected_mail_template'];

    protected $table = 'hr_rounds';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'confirmed_mail_template' => 'array',
        'rejected_mail_template' => 'array',
    ];

    public static function isTrialRound($id){
        return Round::find($id)->name == 'Trial Program';
    }

    public static function inPreparatoryRounds($id){
        return Round::whereIn('name', ['Preparatory-1', 'Preparatory-2', 'Preparatory-3', 'Preparatory-4', 'Warmup'])->pluck('id')->contains($id);
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'hr_jobs_rounds', 'hr_round_id', 'hr_job_id')->withPivot('hr_job_id', 'hr_round_id', 'hr_round_interviewer');
    }

    public function evaluationParameters()
    {
        return $this->belongsToMany(EvaluationParameter::class, 'hr_round_evaluation', 'round_id', 'evaluation_id');
    }

    public function evaluationSegments()
    {
        return $this->hasMany(EvaluationSegment::class, 'round_id');
    }
}
